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


