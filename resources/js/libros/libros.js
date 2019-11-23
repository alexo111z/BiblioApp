new Vue({
    el: "#librosCRUD",
    created: function () {
        this.getLibros();
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
        libros: [],
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0,
        },
        newLibro: {
            'Titulo':'',
            'IdAutor':'',
            'IdEditorial':'',
            'IdCarrera':'',
            'dewey':'',
            'Edicion':'',
            'Year':'',
            'Volumen':'',
            'Ejemplares':'',
            'EjemDisp':'',
            'Imagen':'',
            'FechaRegistro':'',
            'Existe':1
        },
        offset: 3,
        errors: [],
        search: '',
        fillLibro:{
            'ISBN':'',
            'Titulo':'',
            'IdAutor':'',
            'IdEditorial':'',
            'IdCarrera':'',
            'dewey':'',
            'Edicion':'',
            'Year':'',
            'Volumen':'',
            'Ejemplares':'',
            'EjemDisp':'',
            'Imagen':'',
            'FechaRegistro':''
        }
    },
    computed:{
        isActived:function () {
            return this.pagination.current_page;
        },
        pageNumber:function () {
            if(!this.pagination.to){
                return [];
            }
            var from = this.pagination.current_page - this.offset
            if(from < 1){
                from = 1;
            }
            var to = from + (this.offset * 2);
            if(to >= this.pagination.last_page){
                to = this.pagination.last_page;
            }

            var pagesArray = [];
            while(from <= to){
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        },


    },
    methods: {
        changePage: function (page) {
            this.pagination.current_page = page;
            this.getLibros(page);
        },
        getLibros: function (page) {
            var url = 'libro?page=' + page +'&search='+this.search;
            //var url = 'libro';
            axios.get(url).then(response => {
                //this.libros = response.data;
                this.libros = response.data.libro.data;
                this.pagination = response.data.pagination;
            }).catch(error =>{
                toastr.error(error.response.data.message, "Error1!");
            });
        },
        createLibro: function () {
            var url = 'libro';
            axios.post(url, this.newLibro)
            .then(response => {
                this.getLibros();
                this.newLibro = {
                    'Titulo':'',
                    'IdAutor':'',
                    'IdEditorial':'',
                    'IdCarrera':'',
                    'dewey':'',
                    'Edicion':'',
                    'Year':'',
                    'Volumen':'',
                    'Ejemplares':'',
                    'EjemDisp':'',
                    'Imagen':'',
                    'FechaRegistro':'',
                    'Existe':1
                };
                this.errors = [];
                $("#create").modal('hide');
                toastr.success("Libro registrado con exito.", "Tarea completada!");
            }).catch(error => {
                this.errors = error.response.data;
                toastr.error(error.response.data.message, "Error2!");
            });
        },
        editLibro: function (libro) {
            this.fillLibro.ISBN = libro.ISBN;
            this.fillLibro.Titulo = libro.Titulo;
            this.fillLibro.IdAutor = libro.IdAutor;
            this.fillLibro.IdCarrera = libro.IdCarrera;
            this.fillLibro.deway = libro.dewey;
            this.fillLibro.Edicion = libro.Edicion;
            this.fillLibro.Year = libro.Year;
            this.fillLibro.Volumen = libro.Volumen;
            this.fillLibro.Ejemplares = libro.Ejemplares;
            this.fillLibro.EjemDisp = libro.EjemDisp;
            this.fillLibro.Imagen = libro.Imagen;
            this.fillLibro.FechaRegistro = libro.FechaRegistro;
            $('#edit').modal('show');
        },
        updateLibro: function (ISBN) {
            var url = 'libro/'+ ISBN;
            axios.put(url, this.fillLibro)
            .then(response => {
                this.getLibros();
                this.fillLibro = {
                    'ISBN':'',
                    'Titulo':'',
                    'IdAutor':'',
                    'IdEditorial':'',
                    'IdCarrera':'',
                    'dewey':'',
                    'Edicion':'',
                    'Year':'',
                    'Volumen':'',
                    'Ejemplares':'',
                    'EjemDisp':'',
                    'Imagen':'',
                    'FechaRegistro':''
                };
                this.errors = [];
                $("#edit").modal("hide");
                toastr.success("Libro actualizado con exito.", "Tarea completada!");
            })
            .catch(error =>{
                this.errors = error.response.data;
                toastr.error(error.response.data.message, "Error!");
            });
        },
              
        deleteLibro: function (libro) {
            if (confirm('¿Esta seguro de eliminar el Libro ' + libro.Titulo + '?')) {
                var url = 'libro/' + libro.ISBN;
                axios.delete(url).then(response => {
                    this.getLibros();
                    toastr.success("Libro eliminado con exito.", "Tarea completada!");
                }).catch(ex => {
                    toastr.error(ex.response.data.message, "Error4!");
                });
            }
        },

        searchLibro: function () {
            this.search = $('#search').val();
            this.getLibros();
        }
    }
});