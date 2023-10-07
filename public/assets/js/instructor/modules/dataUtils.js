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