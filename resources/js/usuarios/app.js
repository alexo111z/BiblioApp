new Vue({
    el: "#content",
    created: function () {
        this.getUsers();
        toastr.options = {
            showMethod: 'fadeIn', //fadeIn, slideDown, and show are built into jQuery
            showDuration: 500,
            showEasing: 'swing',
            hideMethod: 'fadeOut',
            hideDuration: 500,
            hideEasing: 'swing',
            closeOnHover: true,
            progressBar: true
        };
    },
    data: {
        users: [],
        user: {
            IdUsuario: '',
            Nombre: '',
            Apellidos: '',
            IdCarrera: '',
            Telefono: '',
            Correo: '',
            Nick: '',
            NoControl: '',
            Puesto: '',
            NoNomina: '',
        },
        userType: 1,
        modalUser: 1,
        pagination: {
            total: 0,
            current_page: 0,
            per_page: 0,
            last_page: 0,
            'from': 0,
            to: 0,
        },
        offset: 5,
        errors: [],
        search: '',
        tableColumns: [
            [
                '#',
                'Nombre de usuario',
                'Nombre',
                'Apellidos',
                'Acciones',
            ],
            [
                '#',
                'Nombre de usuario',
                'Nombre',
                'Apellidos',
                'Acciones',
            ],
            [
                '#',
                'Número de Nómina',
                'Nombre',
                'Apellidos',
                'Teléfono',
                'Correo electrónico',
                'Acciones',
            ],
            [
                '#',
                'Número de Control',
                'Nombre',
                'Apellidos',
                'Teléfono',
                'Correo electrónico',
                'Carrera',
                'Acciones',
            ],
            [
                '#',
                'Número de Nómina',
                'Nombre',
                'Apellidos',
                'Teléfono',
                'Correo electrónico',
                'Puesto',
                'Acciones',
            ],
        ],
        modal: {
            title: 'Agregar Usuario',
            operation: 'add',
        },
    },
    computed: {
        isActived: function() {
            return this.pagination.current_page;
        },
        pageNumber: function() {
            if(this.pagination.to === 0){
                return [];
            }

            let from = this.pagination.current_page - this.offset;

            if(from < 1){
                from = 1;
            }

            let to = from + (this.offset * 2);
            if(to >= this.pagination.last_page){
                to = this.pagination.last_page;
            }

            const pages = [];

            for(;from <= to;) {
                pages.push(from);
                from++;
            }

            return pages;
        },
    },
    methods: {
        changePage: function(page = 1) {
            this.pagination.current_page = page;
            this.getUsers(page);
        },
        getUsers: function(page = 1) {
            const usersEndpoint = 'usuarios/all?page=' + page;

            axios.post(
                usersEndpoint,
                {
                    userType: this.userType,
                }
            ).then((response) => {
                this.users = response.data.users.data;
                this.pagination = response.data.pagination;
            }).catch((error) =>{
                toastr.error('Hubo un error al obtener los usuarios', "¡Error!");
            });
        },
        onAdd: function() {
            this.clearModal();

            this.modal.operation = 'add';
            this.modal.title = 'Agregar Usuario';

            this.modalUser = this.userType;
        },
        onEdit: function(user) {
            this.clearModal();

            this.modal.operation = 'edit';
            this.modal.title = 'Editar Usuario';

            this.modalUser = this.userType;
        },
        clearModal: function() {
            this.user.IdUsuario = '';
            this.user.Nombre = '';
            this.user.Apellidos = '';
            this.user.IdCarrera ='';
            this.user.Telefono = '';
            this.user.Correo = '';
            this.user.Nick = '';
            this.user.NoControl = '';
            this.user.Puesto = '';
            this.user.NoNomina = '';
        },
        add: function() {
            console.log('Creating user');
        },
        edit: function() {
            console.log('Editing user');
        },
        remove: function() {
            console.log('Removing user');
        },
    }
});
