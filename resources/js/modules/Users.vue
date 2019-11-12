<template>
    <div id="users">
        <div class="title">
            <h1>Autores <small>Panel de control</small></h1>
        </div>

        <div class="divisor"></div>

        <div class="container inner-section">
            <div class="row">
            <div class="col-sm">
                <button type="button" class="add-button btn btn-primary" @click="onAdd()" data-toggle="modal" data-target="#usersModal">
                    <i class="fa fa-pencil"></i>Registrar Usuario
                </button>
            </div>
        </div>

        <div class="modal fade" id="usersModal" tabindex="-1" role="dialog" aria-labelledby="usersModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{modal.title}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <input type="hidden" name="id" v-bind="modal.inputData.id">
                            <select class="form-control" @change="onSelectModalUser($event)" :value="modal.modalUser" name="user_type">
                                <option value="Administrador" selected>Administrador</option>
                                <option value="Docente">Docente</option>
                                <option value="Colaborador">Colaborador</option>
                                <option value="Alumno">Alumno</option>
                                <option value="Administrativo">Administrativo</option>
                            </select>
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" v-model="modal.inputData.name">
                            </div>
                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" v-model="modal.inputData.email">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" v-model="modal.inputData.password">
                            </div>
                            <div class="form-group" v-if="modal.modalUser === 'Docente' || modal.modalUser === 'Administrativo'">
                                <label for="payroll">Número de nómina</label>
                                <input type="text" class="form-control" id="payroll" name="payroll" v-model="modal.inputData.payroll">
                            </div>
                            <div class="form-group" v-if="modal.modalUser === 'Alumno'">
                                <label for="control_number">Número de control</label>
                                <input type="text" class="form-control" id="control_number" name="control_number" v-model="modal.inputData.control_number">
                            </div>
                            <div class="form-group" v-if="modal.modalUser === 'Alumno'">
                                <label for="career">Carrera</label>
                                <input type="text" class="form-control" id="career" name="career" v-model="modal.inputData.career">
                            </div>
                            <div class="form-group" v-if="modal.modalUser === 'Administrativo'">
                                <label for="position">Puesto</label>
                                <input type="text" class="form-control" id="position" name="position" v-model="modal.inputData.position">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" v-if="modal.operation === 'edit'" @click="edit">Editar</button>
                        <button type="button" class="btn btn-success" v-if="modal.operation === 'add'" @click="add">Crear</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <select class="form-control" @change="onSelectUserType($event)">
                    <option value="Administrador" selected>Administrador</option>
                    <option value="Docente">Docente</option>
                    <option value="Colaborador">Colaborador</option>
                    <option value="Alumno">Alumno</option>
                    <option value="Administrativo">Administrativo</option>
                </select>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th v-for="columnHeader of this.columns[this.userType]">{{columnHeader}}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(user, index) of this.users">
                    <td>{{index + 1}}</td>
                    <td v-for="(value, key) of user" v-if="key !== 'id'">
                        {{value}}
                    </td>
                    <td>
                        <div class="buttons" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-info" @click="onEdit(user)" data-toggle="modal" data-target="#usersModal"><i class="fa fa-pencil-square-o"></i></button>
                            <button type="button" class="btn btn-danger" @click="onDelete(user)"><i class="fa fa-times"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="row">
            <div class="col-sm">
                <pagination :data="paginatorData" :align="'center'" @pagination-change-page="getResults">
                    <span slot="prev-nav">&lt; Atras</span>
                    <span slot="next-nav">Adelante &gt;</span>
                </pagination>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
import ApiUsers from "../util/ApiUsers";

const usersEndpoint = new ApiUsers();

export default {
    name: "UsersModule",
    data() {
        return {
            userType: 'Administrador',
            paginatorData: {},
            users: [],
            columns: {
                Administrador: [
                    '#',
                    'Nombre Completo',
                    'Email',
                    'Acciones',
                ],
                Colaborador: [
                    '#',
                    'Nombre Completo',
                    'Email',
                    'Acciones',
                ],
                Docente: [
                    '#',
                    'Nombre Completo',
                    'Email',
                    'Número de Nómina',
                    'Acciones',
                ],
                Administrativo: [
                    '#',
                    'Nombre Completo',
                    'Email',
                    'Número de Nómina',
                    'Puesto',
                    'Acciones',
                ],
                Alumno: [
                    '#',
                    'Nombre Completo',
                    'Email',
                    'Número de Control',
                    'Carrera',
                    'Acciones',
                ],
            },
            modal: {
                title: 'Agregar Usuario',
                operation: 'add',
                modalUser: 'Administrador',
                inputData: {
                    id: '',
                    user_type: '',
                    name: '',
                    email: '',
                    password: '',
                    payroll: '',
                    control_number: '',
                    career: '',
                    position: '',
                },
            },
        };
    },
    created() {
        this.loadUsersByType(this.userType);
    },
    methods: {
        loadUsersByType(userType) {
            axios.get(usersEndpoint.getAllByType(userType))
                .then((response) => {
                    this.users = [];
                    this.users = response.data.data;
                    this.paginatorData = response.data;
                });
        },
        deleteUser(user) {
            axios.delete(usersEndpoint.byId(user.id))
                .then(() => {
                    swal("¡Eliminado!", `¡El usuario con email ${user.email} ha sido eliminado!`, "success");

                    this.users =_.remove(this.users, (_user) => {
                        return _user.id !== user.id;
                    });

                    if (this.users.length === 0) {
                        this.loadUsersByType(this.userType);
                    }
                })
                .catch(() => {
                    swal("¡Error!", `¡El usuario con email ${user.email} no pudo ser sido eliminado!`, "error");
                });
        },
        onSelectUserType(event) {
            this.userType = event.target.value;

            this.loadUsersByType(this.userType);
        },
        onSelectModalUser(event) {
            this.modal.modalUser = event.target.value;
        },
        getResults(page = 1) {
            axios.get(usersEndpoint.getAllByPageAndType(page, this.userType))
                .then((response) => {
                    this.users = [];
                    this.users = response.data.data;
                    this.paginatorData = response.data;
                });
        },
        serializeData() {
            let user = {
                user_type: this.userType,
                name: this.modal.inputData.name,
                email: this.modal.inputData.email,
                password: this.modal.inputData.password,
                payroll: this.modal.inputData.payroll,
                control_number: this.modal.inputData.control_number,
                career: this.modal.inputData.career,
                position: this.modal.inputData.position,
            };

            return user;
        },
        add() {
            const user = this.serializeData();

            console.log(user);

            axios.post(
                usersEndpoint.baseUrl,
                user
            ).then(() => {
                swal(
                    "¡Agregado!",
                    `¡El usuario ha sido creado correctamente!`,
                    "success"
                ).then(() => {
                    window.location.href = window.location.href;
                });
            }).catch(() => {
                swal("¡Error!", `¡El usuario no pudo ser creado!`, "error");
            });
        },
        edit() {
            axios.put(
                usersEndpoint.byId(this.modal.inputData.id),
                this.serializeData()
            ).then(() => {
                swal("¡Editado!", `¡El usuario ha sido editado correctamente!`, "success");
            }).catch(() => {
                swal("¡Error!", `¡El usuario no pudo ser editado!`, "error");
            });
        },
        onAdd() {
            this.clearModal();

            this.modal.operation = 'add';
            this.modal.title = 'Agregar Usuario';
        },
        onEdit(user) {
            this.clearModal();

            this.modal.operation = 'edit';

            this.modal.title = 'Editar Usuario';
            this.modal.modalUser = this.userType;

            this.modal.inputData.id = user.id;
            this.modal.inputData.user_type = this.userType;
            this.modal.inputData.name = user.name;
            this.modal.inputData.email = user.email;
            this.modal.inputData.password = '' || '';
            this.modal.inputData.payroll = user.payroll || '';
            this.modal.inputData.control_number = user.control_number || '';
            this.modal.inputData.career = user.career || '';
            this.modal.inputData.position = user.position || '';
        },
        clearModal() {
            this.modal.inputData.id = '';
            this.modal.inputData.user_type = '';
            this.modal.inputData.name = '';
            this.modal.inputData.email = '';
            this.modal.inputData.password = '';
            this.modal.inputData.payroll = '';
            this.modal.inputData.control_number = '';
            this.modal.inputData.career = '';
            this.modal.inputData.position = '';
            this.modal.modalUser = 'Administrador';
        },
        onDelete(user) {
            swal({
                title: "Eliminar Usuario",
                text: `¿Estás seguro de que deseas eliminar al usuario con email ${user.email}?`,
                icon: "warning",
                dangerMode: true,
            })
                .then(willDelete => {
                    if (willDelete) {
                        this.deleteUser(user);
                    }
                });
        },
    },
};
</script>
