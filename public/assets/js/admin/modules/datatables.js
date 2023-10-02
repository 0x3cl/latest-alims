import {
    enrollStatus, accountStatus, userRole
} from './utils.js';

import {
    studentsData, instructorsData, adminData, esData, eiData,
    coursesData, subjectsData, yearsData, sectionsData
} from './dataUtils.js';

export function datatablesData() {
    
    function defaultSettingsDataTable() {
        return {
            responsive: true,
            scrollX: true,
            autoWidth: false,
            stateSave: true,
            scrollY: '200',
            scrollCollapse: true,
            paging: true,
        };
    }

    async function studentTable() {
        const response = await studentsData();
        if(response.status == 200) {
            const data = response.data;
            $('#student-table').DataTable({
                ...defaultSettingsDataTable(),
                data: data,
                columns: [
                    {
                    data: null,
                    orderable: false,
                    render: data => {
                        return `<input type="checkbox" class="form-check-input multi-select-single" data-id="${data.id}">`;
                    },
                    },
                    {
                    data: null,
                    render: data => {
                        return '#' + data.id
                    }
                    },
                    {
                    data: null,
                    render: data => {
                        return enrollStatus(data.is_enrolled);
                    },
                    },
                    {
                    data: null,
                    render: data => {
                        return accountStatus(data.is_active);
                    },
                    },
                    { data: 'firstname' },
                    { data: 'lastname' },
                    { data: 'username' },
                    {
                    data: null,
                    render: data => {
                        return userRole(data.role);
                    },
                    },
                    { data: 'gender' },
                    {
                    data: null,
                    render: data => {
                        return `${data.is_active === '1' ? `<a href="javascript:void(0)" id="control" data-type="user" data-action="disable" data-id="${data.id}" class="btn btn-secondary mx-1"><i class="bx bx-hide" style="margin-bottom: 0px;"></i></a>` : `<a href="javascript:void(0)" id="control" data-type="user" data-action="enable" data-id="${data.id}" class="btn btn-secondary mx-1"><i class="bx bx-show" style="margin-bottom: 0px;"></i></a>`}
                        <a href="/admin/account/enroll/user/single/${data.id}" class="btn btn-secondary mx-1" data-id="${data.id}"><i class='bx bx-folder-plus'></i></a>
                        <a href="/admin/account/update/user/single/${data.id}" class="btn btn-secondary mx-1" data-id="${data.id}"><i class="bx bx-edit" style="margin-bottom: 0px;"></i></a>
                        <a href="javascript:void(0)" id="control" data-type="user" data-action="delete" data-id="${data.id}" class="btn btn-danger mx-1"><i class="bx bx-trash bx-tada" style="margin-bottom: 0px;"></i></a>`;
                    },
                    },
                ],
            });
            $('.loader.student').fadeOut();
        }
    }

    async function instructorTable() {
        const response = await instructorsData();
        if(response.status == 200) {
            const data = response.data;
            $('#instructor-table').DataTable({
                ...defaultSettingsDataTable(),
                data: data,
                columns: [
                    {
                        data: null,
                        orderable: false,
                        render: data => {
                        return `<input type="checkbox" class="form-check-input multi-select-single" data-id="${data.id}">`;
                        },
                    },
                    {
                        data: null,
                        render: data => {
                        return '#' + data.id
                        }
                    },
                    {
                        data: null,
                        render: data => {
                        return enrollStatusFormatter(data.is_enrolled);
                        },
                    },
                    {
                        data: null,
                        render: data => {
                        return accountStatusFormatter(data.is_active);
                        },
                    },
                    { data: 'firstname' },
                    { data: 'lastname' },
                    { data: 'username' },
                    {
                        data: null,
                        render: data => {
                        return userRoleFormatter(data.role);
                        },
                    },
                    { data: 'gender' },
                    {
                        data: null,
                        render: data => {
                            return `${data.is_active === '1' ? `<a href="javascript:void(0)" id="control" data-type="user" data-action="disable" data-id="${data.id}" class="btn btn-secondary mx-1"><i class="bx bx-hide" style="margin-bottom: 0px;"></i></a>` : `<a href="javascript:void(0)" id="control" data-type="user" data-action="enable" data-id="${data.id}" class="btn btn-secondary mx-1"><i class="bx bx-show" style="margin-bottom: 0px;"></i></a>`}
                            <a href="/admin/account/enroll/user/single/${data.id}" class="btn btn-secondary mx-1" data-id="${data.id}"><i class='bx bx-folder-plus'></i></a>
                            <a href="/admin/account/update/user/single/${data.id}" class="btn btn-secondary mx-1" data-id="${data.id}"><i class="bx bx-edit" style="margin-bottom: 0px;"></i></a>
                            <a href="javascript:void(0)" id="control" data-type="user" data-action="delete" data-id="${data.id}" class="btn btn-danger mx-1"><i class="bx bx-trash bx-tada" style="margin-bottom: 0px;"></i></a>`;
                        },
                    },
                ], 
            });
            $('.loader.instructor').fadeOut();
        }
    }

    async function adminTable() {
        const response = await adminData();
        if(response.status == 200) {
            const data = response.data;
            $('#admin-table').DataTable({
                ...defaultSettingsDataTable(),
                data: data,
                columns: [
                    {
                    data: null,
                    orderable: false,
                    render: data => {
                        return `<input type="checkbox" class="form-check-input multi-select-single" data-id="${data.id}">`;
                    },
                    },
                    {
                    data: null,
                    render: data => {
                        return '#' + data.id
                    }
                    },
                    {
                    data: null,
                    render: data => {
                        return accountStatus(data.is_active);
                    },
                    },
                    { data: 'firstname' },
                    { data: 'lastname' },
                    { data: 'username' },
                    {
                    data: null,
                    render: data => {
                        return `${data.is_active === '1' ? `<a href="javascript:void(0)" id="control" data-type="admin" data-action="disabled" data-id="${data.id}" class="btn btn-secondary mx-1"><i class="bx bx-hide" style="margin-bottom: 0px;"></i></a>` : `<a href="javascript:void(0)" id="control" data-type="admin" data-action="enable" data-id="${data.id}" class="btn btn-secondary mx-1"><i class="bx bx-show" style="margin-bottom: 0px;"></i></a>`}
                        <a href="/admin/account/update/admin/single/${data.id}" class="btn btn-secondary mx-1" data-id="${data.id}"><i class="bx bx-edit" style="margin-bottom: 0px;"></i></a>
                        <a href="javascript:void(0)" id="control-delete" data-type="admin" data-action="delete" data-id="${data.id}" class="btn btn-danger mx-1"><i class="bx bx-trash bx-tada" style="margin-bottom: 0px;"></i></a>`;
                    },
                    },
                ],
            });
            $('.loader.admin').fadeOut();
        }
    }

    async function esTable() {
        const response = await esData();
        if(response.status == 200) {
            const data = response.data;
            $('#enroll-students-table').DataTable({
                ...defaultSettingsDataTable(),
                data: data,
                columns: [
                    {
                    data: null,
                    render: data => {
                        return `<input type="checkbox" class="form-check-input multi-select-single" data-id="${data.enroll_id}">`;
                    },
                    },
                    {
                    data: null,
                    render: data => {
                        return '#' + data.id
                    }
                    },
                    { 
                    data: null,
                    render: data => {
                        return data.firstname + ' ' + data.lastname 
                    }
                    },
                    { data: 'email' },
                    { data: 'username' },
                    { data: 'course_name' },
                    {
                    data: 'year_name'
                    },
                    {
                    data: 'section_name'
                    },          {
                    data: null,
                    render: data => {
                        return `
                        <a href="/admin/account/enroll/update/user/single/${data.enroll_id}" class="btn btn-secondary mx-1" data-id="${data.id}"><i class="bx bx-edit" style="margin-bottom: 0px;"></i></a>
                        <a href="javascript:void(0)" id="control" data-type="enroll" data-action="delete" data-id="${data.id}" class="btn btn-danger mx-1"><i class="bx bx-trash bx-tada" style="margin-bottom: 0px;"></i></a>`;
                    }
                    },
                ],
            });
            $('.loader.es').fadeOut();
        }
    }

    async function eiTable() {
        const response = await eiData();
        if(response.status == 200) {
            const data = response.data;
            $('#enroll-instructors-table').DataTable({
                ...defaultSettingsDataTable(),
                data: data,
                columns: [
                    {
                    data: null,
                    render: data => {
                        return `<input type="checkbox" class="form-check-input multi-select-single" data-id="${data.enroll_id}">`;
                    },
                    },
                    {
                    data: null,
                    render: data => {
                        return '#' + data.id
                    }
                    },
                    { 
                    data: null,
                    render: data => {
                        return data.firstname + ' ' + data.lastname 
                    }
                    },
                    { data: 'email' },
                    { data: 'username' },
                    { data: 'course_name' },
                    {
                    data: 'year_name'
                    },
                    {
                    data: 'section_name'
                    },    
                    {
                    data: null,
                    render: data => {
                        return `
                        <a href="/admin/account/enroll/update/user/single/${data.enroll_id}" class="btn btn-secondary mx-1" data-id="${data.enroll_id}"><i class="bx bx-edit" style="margin-bottom: 0px;"></i></a>
                        <a href="javascript:void(0)" id="control" data-type="enroll" data-action="delete" data-id="${data.enroll_id}" class="btn btn-danger mx-1"><i class="bx bx-trash bx-tada" style="margin-bottom: 0px;"></i></a>`;
                    }
                    },
                ],
            });
            $('.loader.ei').fadeOut();
        }
    }

    async function coursesTable() {
        const response = await coursesData();
        if(response.status == 200) {
            const data = response.data;
            $('#course-table').DataTable({
                ...defaultSettingsDataTable(),
                data: data,
                columns: [
                    {
                    data: null,
                    render: data => {
                        return `<input type="checkbox" class="form-check-input multi-select-single" data-id="${data.id}">`;
                    },
                    },
                    {
                    data: null,
                    render: data => {
                        return '#' + data.id
                    }
                    },
                    { data: 'code' },
                    { data: 'name' },
                    {
                    data: null,
                    render: data => {
                        return `
                        <a href="/admin/courses/update/single/${data.id}" class="btn btn-secondary mx-1" data-id="${data.id}"><i class="bx bx-edit" style="margin-bottom: 0px;"></i></a>
                        <a href="javascript:void(0)"  id="control" data-type="course" data-action="delete" data-id="${data.id}" class="btn btn-danger mx-1"><i class="bx bx-trash bx-tada" style="margin-bottom: 0px;"></i></a>`;
                    },
                    },
                ],
            });
            $('.loader.courses').fadeOut();
        }
    }

    async function subjectsTable() {
        const response = await subjectsData();
        if(response.status == 200) {
            const data = response.data;
            $('#subject-table').DataTable({
                ...defaultSettingsDataTable(),
                data: data,
                columns: [
                    {
                    data: null,
                    render: data => {
                        return `<input type="checkbox" class="form-check-input multi-select-single" data-id="${data.id}">`;
                    },
                    },
                    {
                    data: null,
                    render: data => {
                        return '#' + data.id
                    }
                    },
                    { data: 'code' },
                    { data: 'name' },
                    { data: 'course' },
                    {
                    data: null,
                    render: data => {
                        return `
                        <a href="/admin/subjects/update/single/${data.id}" class="btn btn-secondary mx-1" data-id="${data.id}"><i class="bx bx-edit" style="margin-bottom: 0px;"></i></a>
                        <a href="javascript:void(0)"  id="control" data-type="subject" data-action="delete" data-id="${data.id}" class="btn btn-danger mx-1"><i class="bx bx-trash bx-tada" style="margin-bottom: 0px;"></i></a>`;
                    },
                    },
                ],
            });
            $('.loader.subjects').fadeOut();
        }
    }

    async function yearsTable() {
        const response = await yearsData();
        if(response.status == 200) {
            const data = response.data;
            $('#year-table').DataTable({
                ...defaultSettingsDataTable(),
                data: data,
                columns: [
                    {
                    data: null,
                    render: data => {
                        return `<input type="checkbox" class="form-check-input multi-select-single" data-id="${data.id}">`;
                    },
                    },
                    {
                    data: null,
                    render: data => {
                        return '#' + data.id
                    }
                    },
                    { data: 'name' },
                    {
                    data: null,
                    render: data => {
                        return `
                        <a href="/admin/years/update/single/${data.id}" class="btn btn-secondary mx-1" data-id="${data.id}"><i class="bx bx-edit" style="margin-bottom: 0px;"></i></a>
                        <a href="javascript:void(0)"  id="control" data-type="year" data-action="delete" data-id="${data.id}" class="btn btn-danger mx-1"><i class="bx bx-trash bx-tada" style="margin-bottom: 0px;"></i></a>`;
                    },
                    },
                ],
            });
            $('.loader.years').fadeOut();
        }
    }

    async function sectionsTable() {
        const response = await sectionsData();
        if(response.status == 200) {
            const data = response.data;
            $('#section-table').DataTable({
                ...defaultSettingsDataTable(),
                data: data,
                columns: [
                    {
                    data: null,
                    render: data => {
                        return `<input type="checkbox" class="form-check-input multi-select-single" data-id="${data.id}">`;
                    },
                    },
                    {
                    data: null,
                    render: data => {
                        return '#' + data.id
                    }
                    },
                    { data: 'name' },
                    {
                    data: null,
                    render: data => {
                        return `
                        <a href="/admin/sections/update/single/${data.id}" class="btn btn-secondary mx-1" data-id="${data.id}"><i class="bx bx-edit" style="margin-bottom: 0px;"></i></a>
                        <a href="javascript:void(0)"  id="control" data-type="section" data-action="delete" data-id="${data.id}" class="btn btn-danger mx-1"><i class="bx bx-trash bx-tada" style="margin-bottom: 0px;"></i></a>`;
                    },
                    },
                ],
            });
            $('.loader.sections').fadeOut();
        }
    }

    studentTable();
    instructorTable();
    adminTable();
    esTable();
    eiTable();
    coursesTable();
    subjectsTable();
    yearsTable();
    sectionsTable();

}