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
            'ISBN':'',
            'Titulo':'',
            'IdAutor':'',
            'IdEditorial':'',
            'IdCarrera':'',
            'dewey':'',
            'Edicion':'',
            'Year':'',
            'Volumen':'',
            'Ejemplares':''
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
            'Ejemplares':''
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
                    'ISBN':'',
                    'Titulo':'',
                    'IdAutor':'',
                    'IdEditorial':'',
                    'IdCarrera':'',
                    'dewey':'',
                    'Edicion':'',
                    'Year':'',
                    'Volumen':'',
                    'Ejemplares':''
                };
                this.errors = [];
                $("#create").modal('hide');
                toastr.success("Libro registrado con éxito.", "Tarea completada!");
                console.log(response.data);
                
            }).catch(error => {
                toastr.error("ISBN duplicado, por favor corrija el dato registrado");
            });
        },

        showLibro: function (libro) {
            this.fillLibro.ISBN = libro.ISBN;
            this.fillLibro.Titulo = libro.Titulo;
            this.fillLibro.IdAutor = libro.Nombre + " "+ libro.Ape;
            this.fillLibro.IdEditorial = libro.Editorial;
            this.fillLibro.IdCarrera = libro.Carrera;
            this.fillLibro.dewey = libro.Dewey;
            this.fillLibro.Edicion = libro.Edicion;
            this.fillLibro.Year = libro.Year;
            this.fillLibro.Volumen = libro.Volumen;
            this.fillLibro.Ejemplares = libro.Ejemplares;
            this.fillLibro.EjemDisp = libro.EjemDisp;
            this.fillLibro.FechaRegistro = libro.FechaRegistro;
            console.log(this.fillLibro);
            $('#show').modal('show');
        },

        getShow: function () {
            var url = 'libros/getShow/' + this.fillLibro.ISBN;
            axios.get(url).then(response => {
                this.libros = response.data
            }).catch(error => {
                console.log(error.response.data.message);
            });
        },


        editLibro: function (libro) {
            this.fillLibro.ISBN = libro.ISBN;
            this.fillLibro.Titulo = libro.Titulo;
            this.fillLibro.IdAutor = libro.IdAutor;
            this.fillLibro.IdEditorial = libro.IdEditorial;
            this.fillLibro.IdCarrera = libro.IdCarrera;
            this.fillLibro.dewey = libro.dewey;
            this.fillLibro.Edicion = libro.Edicion;
            this.fillLibro.Year = libro.Year;
            this.fillLibro.Volumen = libro.Volumen;
            this.fillLibro.Ejemplares = libro.Ejemplares;
            this.fillLibro.EjemDisp = libro.EjemDisp;
            this.fillLibro.FechaRegistro = libro.FechaRegistro;
            console.log(this.fillLibro);
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
            if (confirm('¿Esta seguro de eliminar el libro ' + libro.Titulo + '?')) {
                var url = 'libro/' + libro.ISBN;
                axios.delete(url).then(response => {
                    this.getLibros();
                    toastr.success("Libro eliminado con exito.", "Tarea completada!");
                }).catch(ex => {
                    toastr.error("No es posible eliminar el libro ya que cuenta con ejemplares disponibles, por favor elimine los ejemplares primero!");
                });
            }
        },

        searchLibro: function () {
            this.search = $('#search').val();
            this.getLibros();
        }
    }
});