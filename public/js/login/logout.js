new Vue({
    el: '#app',
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
        onLogOut: function () {
            const redirectTo = '/login';

            toastr.success('Hasta luego, redireccionando...', 'Todo bien');

            localStorage.removeItem('userData');

            setTimeout(() => {
                location.href = location.origin + redirectTo;
            }, 2500);
        },
    },
});
