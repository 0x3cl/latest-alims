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

export async function overviewData() {
    const data = await getJWTtoken();
    const token = data.token
    return new Promise((resolve, reject) => {
        $.ajax({
            url: '/api/v1/overview',
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${token}`)
            },
            success: resolve,
            error: reject
        })
    });
}

export async function studentsData() {
    const data = await getJWTtoken();
    const token = data.token
    return new Promise((resolve, reject) => {
        $.ajax({
            url: '/api/v1/users/students',
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${token}`)
            },
            success: resolve,
            error: reject
        })
    });
}

export async function instructorsData() {
    const data = await getJWTtoken();
    const token = data.token
    return new Promise((resolve, reject) => {
        $.ajax({
            url: '/api/v1/users/instructors',
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${token}`)
            },
            success: resolve,
            error: reject
        })
    });
}

export async function adminData() {
    const data = await getJWTtoken();
    const token = data.token
    return new Promise((resolve, reject) => {
        $.ajax({
            url: '/api/v1/users/administrators',
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${token}`)
            },
            success: resolve,
            error: reject
        })
    });
}

export async function esData() {
    const data = await getJWTtoken();
    const token = data.token
    return new Promise((resolve, reject) => {
        $.ajax({
            url: '/api/v1/users/enrolled/students',
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${token}`)
            },
            success: resolve,
            error: reject
        })
    });
}

export async function eiData() {
    const data = await getJWTtoken();
    const token = data.token
    return new Promise((resolve, reject) => {
        $.ajax({
            url: '/api/v1/users/enrolled/instructors',
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${token}`)
            },
            success: resolve,
            error: reject
        })
    });
}

export async function coursesData() {
    const data = await getJWTtoken();
    const token = data.token
    return new Promise((resolve, reject) => {
        $.ajax({
            url: '/api/v1/courses',
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${token}`)
            },
            success: resolve,
            error: reject
        })
    });
}

export async function subjectsData() {
    const data = await getJWTtoken();
    const token = data.token
    return new Promise((resolve, reject) => {
        $.ajax({
            url: '/api/v1/subjects',
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${token}`)
            },
            success: resolve,
            error: reject
        })
    });
}

export async function yearsData() {
    const data = await getJWTtoken();
    const token = data.token
    return new Promise((resolve, reject) => {
        $.ajax({
            url: '/api/v1/years',
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${token}`)
            },
            success: resolve,
            error: reject
        })
    });
}

export async function sectionsData() {
    const data = await getJWTtoken();
    const token = data.token
    return new Promise((resolve, reject) => {
        $.ajax({
            url: '/api/v1/sections',
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${token}`)
            },
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

export async function otherAdmins() {
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


