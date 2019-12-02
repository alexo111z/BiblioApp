new Vue({
    el: '#app',
    data: {
        userName: '',
        password: '',
    },
    created: () => {
        toastr.options = {
            showMethod: 'fadeIn',
            showDuration: 500,
            showEasing: 'swing',
            hideMethod: 'fadeOut',
            hideDuration: 500,
            hideEasing: 'swing',
            closeOnHover: true,
            progressBar: true
        };
    },
    methods: {
        onLogin: function () {
            const loginEndpoint = 'login';
            const redirectTo = '/home';

            if (this.userName === ''
                || this.password === ''
                || this.userName === undefined
                || this.password === undefined) {
                toastr.error('Debes llenar todos los campos', '¡Error!');
            } else {
                axios.post(
                    loginEndpoint,
                    {
                        Nick: this.userName,
                        Password: this.password
                    }
                ).then((response) => {
                    const responseData = response.data;

                    localStorage.setItem(
                        'userData',
                        JSON.stringify(responseData.sessionData)
                    );

                    toastr.success(responseData.message, '¡Todo bien!');

                    setTimeout(() => {
                        location.href = location.origin + redirectTo;
                    }, 2500);
                }).catch((error) => {
                    toastr.error(error.response.data.message, '¡Error!');
                });
            }
        },
    },
});
