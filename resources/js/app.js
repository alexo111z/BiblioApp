new Vue({
    el: '#crud',
    created: function () {
        this.getAutores();
        toastr.options ={
            showMethod: 'fadeIn', //fadeIn, slideDown, and show are built into jQuery
                    showDuration: 500,
                    showEasing: 'swing',
                    hideMethod: 'fadeOut',
                    hideDuration: 1000,
                    hideEasing: 'swing',
                    onHidden: undefined,
                    closeMethod: false,
                    closeDuration: false,
                    closeEasing: false,
                    closeOnHover: true,
                    progressBar: true
        };
        $('[data-toggle="tooltip"]').tooltip();

    },
    el: '#CarrerasCRUD',
    created: function () {
        this.getCarreras();
    },
    data: {
        autores: [],
        carreras: [],
        ClaveCarrera: '',
        NombreCarrera: '',
        fillCarrera: {'Clave': '', 'Nombre': ''},
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0,
        },
        nombre: '',
        apellidos: '',
        offset: 3,
        errors: [],
        search: '',
        fillAutor:{
            'idAutor':'',
            'nombre':'',
            'apellidos':''
        }
    },
    computed: {
        isActived: function () {
            return this.pagination.current_page;
        },
        pageNumber: function () {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - this.offset; //TODO offset
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2); //TODO offset
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }

            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        },


    },
    methods: {
        getAutores: function (page) {
            var url = 'autores?page=' + page + "&search=" + this.search;
            axios.get(url).then(response => {
                this.autores = response.data.autores.data;
                this.pagination = response.data.pagination;
            });
        },
        editAutor: function (autor) {
            this.fillAutor.idAutor = autor.idAutor;
            this.fillAutor.nombre = autor.nombre;
            this.fillAutor.apellidos = autor.apellidos;
            $('#edit').modal('show');
        },
        updateAutor: function (id) {
            var url = 'autores/'+id;
            axios.put(url, this.fillAutor)
            .then(response => {
                this.getAutores();
                this.fillAutor = {
                    'idAutor':'',
                    'nombre':'',
                    'apellidos':''
                };
                this.errors = [];
                $("#edit").modal("hide");
                toastr.success("Autor actualizado con exito.", "Tarea completada!");
            })
            .catch(error =>{
                this.errors = error.response.data;
                toastr.error(error.response.data.message, "Error!");
            });
        },
        deleteAutor: function (autor) {
            if (confirm('¿Esta seguro de eliminar al autor ' + autor.nombre + ' ' + autor.apellidos + '?')) {
                var url = "autores/" + autor.idAutor;
                axios.delete(url).then(response => {
                    this.getAutores();
                    swal.close();
                    toastr.success("Autor eliminado con exito.", "Tarea completada!");
                }).catch(ex => {
                    toastr.error(ex.response.data.message, "Error!");
                });
            }
        },
        createAutor: function () {
            var url = 'autores';
            axios.post(url, {
                nombre: this.nombre,
                apellidos: this.apellidos
            }).then(response => {
                this.getAutores();
                this.nombre = '';
                this.apellidos = '';
                this.errors = [];
                $("#create").modal('hide');
                toastr.success("Autor registrado con exito.", "Tarea completada!");
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        changePage: function (page) {
            this.pagination.current_page = page;
            this.getAutores(page);
        },
        searchAutor: function () {
            var search = $("#search").val();
            this.search = search;
            this.getAutores();
        },

        //Modulo Carreras
        getCarreras: function (page) {
            var url = 'carreras?page=' + page;
            axios.get(url).then(response => {
                this.carreras = response.data.carreras.data;
                this.pagination = response.data.pagination;
            });
        },
        deleteCarrera: function (carrera) {
          if (confirm('¿Esta seguro de eliminar la carrera: ' + carrera.Nombre + '?')) {
               var url = 'carreras/' + carrera.Clave;
               axios.delete(url).then(response => {
                   this.getCarreras();
                   swal.close();
                   toastr.success("La carrera ha sido eliminada con exito.", "Tarea completada!");
               }).catch(ex => {
                   toastr.error(ex.response.data.message, "Error!");
               });
          }
        },
        createCarrera: function () {
          var url = 'carreras';
          axios.post(url, {
              Clave: this.ClaveCarrera,
              Nombre: this.NombreCarrera,
              Existe: 1
          }).then(response => {
              this.getCarreras();
              this.ClaveCarrera = '';
              this.NombreCarrera = '';
              this.errors = [];
              $('#createCarrera').modal('hide');
              toastr.success("Carrera registrada con exito.", "Tarea completada!");
          }).catch(error => {
              this.errors = error.response.data;
          });
        },
        editCarrera: function (carrera) {
            this.fillCarrera.Clave  = carrera.Clave;
            this.fillCarrera.Nombre = carrera.Nombre;
            $('#editCarrera').modal('show');
        },
        updateCarrera: function (id) {
            var url = 'carreras/' + id;
            axios.put(url, this.fillCarrera).then(response => {
                this.getCarreras();
                this.fillCarrera = {'Clave': '', 'Nombre': ''};
                this.errors = [];
                $('#editCarrera').modal('hide');
                toastr.success("Carrera actualizada con exito.", "Tarea completada!");
            }).catch(error => {
                this.errors = error.response.data;
            });
        }

    }
});
