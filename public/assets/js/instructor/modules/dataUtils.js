export async function getJWTtoken() {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: '/api/v1/get-jwt-token',
            method: 'GET',
            success: resolve,
            error: reject
        })
    });
}

export async function getCsrfToken() {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: '/api/v1/get-csrf-token',
            method: 'GET',
            success: resolve,
            error: reject
        })
    });
}

export async function my() {
    const data = await getJWTtoken();
    const token = data.token
    return new Promise((resolve, reject) => {
        $.ajax({
            url: '/api/v1/users/my',
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${token}`)
            },
            success: resolve,
            error: reject
        })
    });
}

export async function otherInstructors() {
    const data = await getJWTtoken();
    const token = data.token
    return new Promise((resolve, reject) => {
        $.ajax({
            url: '/api/v1/users/my/others',
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${token}`)
            },
            success: resolve,
            error: reject
        })
    });
}

export async function my_courses() {
    const data = await getJWTtoken();
    const token = data.token
    return new Promise((resolve, reject) => {
        $.ajax({
            url: `/api/v1/users/courses`,
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${token}`)
            },
            success: resolve,
            error: reject
        })
    });
}

export async function my_subjects(params) {
    const course_id = params.course_id;
    const year_id = params.year_id;
    const section_id = params.section_id;

    const data = await getJWTtoken();
    const token = data.token
    return new Promise((resolve, reject) => {
        $.ajax({
            url: `/api/v1/users/subjects?course=${course_id}}&year=${year_id}&section=${section_id}`,
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${token}`)
            },
            success: resolve,
            error: reject
        })
    });
}

export async function post_group() {
    const data = await getJWTtoken();
    const token = data.token
    return new Promise((resolve, reject) => {
        $.ajax({
            url: `/api/v1/post_group`,
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${token}`)
            },
            success: resolve,
            error: reject
        })
    });
}

export async function my_posts(eid, sid, pid) {
    const data = await getJWTtoken();
    const token = data.token
    return new Promise((resolve, reject) => {
        $.ajax({
            url: `/api/v1/posts?eid=${eid}&sid=${sid}&pid=${pid}`,
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${token}`)
            },
            success: resolve,
            error: reject
        })
    });
}

export async function my_assessments(eid, sid, pid) {
    const data = await getJWTtoken();
    const token = data.token
    return new Promise((resolve, reject) => {
        $.ajax({
            url: `/api/v1/posts/assessments?eid=${eid}&sid=${sid}&pid=${pid}`,
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${token}`)
            },
            success: resolve,
            error: reject
        })
    });
}

export async function all_posts(eid, sid) {
    const data = await getJWTtoken();
    const token = data.token
    return new Promise((resolve, reject) => {
        $.ajax({
            url: `/api/v1/posts/all?eid=${eid}&sid=${sid}`,
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${token}`)
            },
            success: resolve,
            error: reject
        })
    });
}

export async function post_attachments(eid, sid, pid) {
    const data = await getJWTtoken();
    const token = data.token
    return new Promise((resolve, reject) => {
        $.ajax({
            url: `/api/v1/posts/attachments?eid=${eid}&sid=${sid}&pid=${pid}`,
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${token}`)
            },
            success: resolve,
            error: reject
        })
    });
}

export async function masterlist(cid, yid, sid) {
    const data = await getJWTtoken();
    const token = data.token
    return new Promise((resolve, reject) => {
        $.ajax({
            url: `/api/v1/users/courses/masterlist?course=${cid}}&year=${yid}&section=${sid}`,
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${token}`)
            },
            success: resolve,
            error: reject
        })
    });
}

export async function getSubmissionList(cid, sid, yid, secid) {
    const data = await getJWTtoken();
    const token = data.token
    return new Promise((resolve, reject) => {
        $.ajax({
            url: `/api/v1/users/subjects/submission/list?course=${cid}&subject=${sid}&year=${yid}&section=${secid}`,
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${token}`)
            },
            success: resolve,
            error: reject
        })
    });
}

export async function getSubmission(eid, sid, pid, subid) {
    const data = await getJWTtoken();
    const token = data.token
    return new Promise((resolve, reject) => {
        $.ajax({
            url: `/api/v1/users/subjects/submission/view?eid=${eid}&sid=${sid}&pid=${pid}&subid=${subid}`,
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${token}`)
            },
            success: resolve,
            error: reject
        })
    });
}

