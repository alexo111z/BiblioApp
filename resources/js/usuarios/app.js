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
            Password: '',
            Tipo: 1,
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
            this.user.Tipo = parseInt(this.userType);
        },
        onEdit: function(user) {
            this.clearModal();

            this.modal.operation = 'edit';
            this.modal.title = 'Editar Usuario';

            this.modalUser = this.userType;

            this.user.IdUsuario = user.IdUsuario;
            this.user.Nombre = user.Nombre;
            this.user.Apellidos = user.Apellidos;
            this.user.Password = user.Password;
            this.user.Tipo = parseInt(this.userType);

            if (this.userType == 1
                || this.userType == 2) {
                this.user.Nick = user.Nick;
            } else if (this.userType == 3) {
                this.user.Telefono = user.Telefono;
                this.user.Correo = user.Correo;
                this.user.NoNomina = user.NoNomina;
            } else if (this.userType == 4) {
                this.user.Telefono = user.Telefono;
                this.user.Correo = user.Correo;
                this.user.NoControl = user.NoControl;
                this.user.IdCarrera = user.IdCarrera;
            } else if (this.userType == 5) {
                this.user.Telefono = user.Telefono;
                this.user.Correo = user.Correo;
                this.user.NoNomina = user.NoNomina;
                this.user.Puesto = user.Puesto;
            }
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
            this.user.Password = '';
            this.user.Tipo = parseInt(this.userType);
        },
        buildUser: function(user) {

            if (this.userType == 1 || this.userType == 2) {
                return {
                    IdUsuario: user.IdUsuario,
                    Nick: user.Nick,
                    Nombre: user.Nombre,
                    Apellidos: user.Apellidos,
                };
            } else if (this.userType == 3) {
                return {
                    IdUsuario: user.IdUsuario,
                    NoNomina: user.NoNomina,
                    Nombre: user.Nombre,
                    Apellidos: user.Apellidos,
                    Telefono: user.Telefono,
                    Correo: user.Correo,
                };
            } else if (this.userType === 4) {
                return {
                    IdUsuario: user.IdUsuario,
                    NoControl: user.NoControl,
                    Nombre: user.Nombre,
                    Apellidos: user.Apellidos,
                    Telefono: user.Telefono,
                    Correo: user.Correo,
                    IdCarrera: user.IdCarrera,
                };
            } else if (this.userType === 5) {
                return {
                    IdUsuario: user.IdUsuario,
                    NoNomina: user.NoNomina,
                    Nombre: user.Nombre,
                    Apellidos: user.Apellidos,
                    Telefono: user.Telefono,
                    Correo: user.Correo,
                    Puesto: user.Puesto,
                };
            }
        },
        add: function() {
            const endpointUrl = 'usuarios';
            let userToSend = Object.assign({}, this.user);

            userToSend = _.pickBy(userToSend, _.identity);

            userToSend.userType = this.userType;
            userToSend.Existe = 1;
            
            axios.post(
                endpointUrl,
                userToSend
            ).then((response) => {
                let userCreated = response.data.user;

                toastr.success('El usuario fue creado exitosamente', 'Todo bien');

                userCreated.Tipo = '';
                userCreated.Existe = '';
                userCreated = _.pickBy(userCreated, _.identity);

                this.users.unshift(
                    this.buildUser(userCreated)
                );
                this.users.pop();
            }).catch(() => {
                toastr.error('El usuario pudo ser creado, intenta de nuevo', '¡Error!');
            });
        },
        edit: function() {
            console.log('Editing user');
        },
        remove: function(user) {
            const endpointUrl = 'usuarios/remove';

            axios.post(
                endpointUrl,
                {
                    userType: this.userType,
                    IdUsuario: user.IdUsuario,
                }
            ).then(() => {
                toastr.success('El usuario ha sido eliminado exitosamente', 'Todo bien');

                this.users = _.remove(this.users, (_user) => {
                    return _user.IdUsuario !== user.IdUsuario;
                });

                if (this.users.length === 0) {
                    this.getUsers();
                }
            }).catch(() => {
                toastr.error('El usuario no pudo ser eliminado, intenta de nuevo', '¡Error!');
            });
        },
    },
});
