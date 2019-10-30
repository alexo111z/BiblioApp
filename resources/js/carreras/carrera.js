// var modCarrera = new Vue({
//     el: '#CarrerasCRUD',
//     created: function () {
//         this.getCarreras();
//     },
//     data: {
//         carreras: []
//     },
//     methods: {
//         getCarreras: function () {
//             var urlCarreras = 'carreras';
//             axios.get(urlCarreras).then(response => {
//                 this.carreras = response.data
//             });
//         },
//     },
// });

// new Vue({
//     el: '#CarrerasCRUD',
//     created: function () {
//         this.getCarreras();
//         toastr.options ={
//             showMethod: 'fadeIn', //fadeIn, slideDown, and show are built into jQuery
//             showDuration: 500,
//             showEasing: 'swing',
//             hideMethod: 'fadeOut',
//             hideDuration: 1000,
//             hideEasing: 'swing',
//             onHidden: undefined,
//             closeMethod: false,
//             closeDuration: false,
//             closeEasing: false,
//             closeOnHover: true,
//             progressBar: true
//         };
//         $('[data-toggle="tooltip"]').tooltip();
//
//     },
//     data: {
//         carreras: [],
//         pagination: {
//             'total': 0,
//             'current_page': 0,
//             'per_page': 0,
//             'last_page': 0,
//             'from': 0,
//             'to': 0,
//         },
//         nombre: '',
//         offset: 2, //3
//         errors: [],
//         search: '',
//         fillCarrera:{
//             'Clave':'',
//             'Nombre':''
//         }
//     },
//     computed: {
//         isActived: function () {
//             return this.pagination.current_page;
//         },
//         pageNumber: function () {
//             if (!this.pagination.to) {
//                 return [];
//             }
//             var from = this.pagination.current_page - this.offset//TODO offset
//             if (from < 1) {
//                 from = 1;
//             }
//             var to = from + (this.offset * 2);// TODO offset
//             if (to >= this.pagination.last_page) {
//                 to = this.pagination.last_page;
//             }
//
//             var pagesArray = [];
//             while (from <= to) {
//                 pagesArray.push(from);
//                 from++;
//             }
//             return pagesArray;
//         },
//
//
//     },
//     methods: {
//         getCarreras: function (page) {
//             var url = 'carreras?page=' + page + "&search=" + this.search;
//             axios.get(url).then(response => {
//                 this.autores = response.data.carreras.data;
//                 this.pagination = response.data.pagination;
//             });
//         },
//         editCarrera: function (carrera) {
//             this.fillAutor.Clave = carrera.Clave;
//             this.fillAutor.Nombre = carrera.Nombre;
//             $('#edit').modal('show');
//         },
//         updateCarrera: function (id) {
//             var url = 'carreras/'+id;
//             axios.put(url, this.fillCarrera)
//                 .then(response => {
//                     this.getCarreras();
//                     this.fillCarrera = {
//                         'Clave':'',
//                         'Nombre':''
//                     };
//                     this.errors = [];
//                     $("#edit").modal("hide");
//                     toastr.success("Carrera actualizada con exito.", "Tarea completada!");
//                 })
//                 .catch(error =>{
//                     this.errors = error.response.data;
//                     toastr.error(error.response.data.message, "Error!");
//                 });
//         },
//         deleteCarrera: function (carrera) {
//             if (confirm('¿Esta seguro de eliminar esta carrera ' + carrera.Nombre + '?')) {
//                 var url = "carreras/" + carrera.Clave;
//                 axios.delete(url).then(response => {
//                     this.getCarreras();
//                     swal.close();
//                     toastr.success("Carrera eliminada con exito.", "Tarea completada!");
//                 }).catch(ex => {
//                     toastr.error(ex.response.data.message, "Error!");
//                 });
//             }
//         },
//         createCarrera: function () {
//             var url = 'carreras';
//             axios.post(url, {
//                 Clave: this.Clave,
//                 Nombre: this.Nombre
//             }).then(response => {
//                 this.getCarreras();
//                 this.Clave = '';
//                 this.Nombre = '';
//                 this.errors = [];
//                 $("#create").modal('hide');
//                 toastr.success("Carrera registrada con exito.", "Tarea completada!");
//             }).catch(error => {
//                 this.errors = error.response.data;
//             });
//         },
//         changePage: function (page) {
//             this.pagination.current_page = page;
//             this.getCarreras(page);
//         },
//         searchAutor: function () {
//             var search = $("#search").val();
//             this.search = search;
//             this.getCarreras();
//         },
//     }
// });
