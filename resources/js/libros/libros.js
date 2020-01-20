new Vue({
    el: "#librosCRUD",
    created: function () {
        this.getLibros();
        this.getAutores();
        this.getEditoriales();
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
        autores: [],
        editoriales: [],
        ejemplares: [],
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
            'Ejemplares':'',
            'Existe':1
        },
        newAutor: {
            'Nombre':'',
            'Apellidos':'',
            'Existe':1
        },
        newEditorial: {
            'Nombre':'',
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
            'Ejemplares':''
        },
        fillEjemplar:{
            'Codigo':'',
            'ISBN':'',
            'FechaRegistro':'',
            'CD':''
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
        getAutores: function () {
            const autoresUrl = 'autores/all';

            this.autores = [];

            axios.get(autoresUrl)
                .then((response) => {
                   this.autores = response.data;
                });
        },
        getEditoriales: function () {
            const editorialesUrl = 'editoriales/all';

            this.editoriales = [];

            axios.get(editorialesUrl)
                .then((response) => {
                    this.editoriales = response.data;
                });
        },
        getEjemplares: function () {
            const ejemplaresUrl = 'ejemplar/' + this.fillLibro.ISBN;

            this.ejemplares = [];

            axios.get(ejemplaresUrl)
                .then((response) => {
                    this.ejemplares = response.data;
                });
        },

        createLibro: function () {
            var url = 'libro';
            axios.post(url, this.newLibro)
            .then(response => {
                open(location.origin + '/libros/descargar/' + this.newLibro.ISBN);

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
                    'Ejemplares':'',
                    'Existe':1
                };
                this.errors = [];
                $("#create2").modal('hide');
                toastr.success("Libro registrado con éxito.", "Tarea completada!");
                console.log(response.data);
            }).catch(() => {
                this.errors = error.response.data;
                toastr.error(error.response.data.message, "Hubo un error al crear este libro, inténtalo de nuevo");
            });
        },
        createAutor: function () {
            var url = 'autors';
            axios.post(url, this.newAutor)
            .then(response => {
                this.newLibro.IdAutor = response.data.id;
                this.getAutores();
                this.newAutor = {
                    'Nombre':'',
                    'Apellidos':'',
                    'Existe':1
                };

                this.errors = [];
                $("#create").modal('hide');
                toastr.success("Autor registrado con exito.", "Tarea completada!");
            }).catch(error => {
                this.errors = error.response.data;
                toastr.error(error.response.data.message, "Error!");
            });
        },
        createEditorial: function () {
            var url = 'editorials';
            axios.post(url, this.newEditorial)
            .then(response => {
                this.getEditoriales();
                this.newEditorial = {
                    'Nombre':'',
                    'Existe':1
                };
                this.newLibro.IdEditorial = response.data.id;

                this.errors = [];
                $("#createEditorials").modal('hide');
                toastr.success("Editorial registrada con exito.", "Tarea completada!");
            }).catch(error => {
                this.errors = error.response.data;
                toastr.error(error.response.data.message, "Error!");
            });
        },

        showLibro: function (libro) {
            this.fillLibro.ISBN = libro.ISBN;
            this.fillLibro.Imagen = libro.Imagen;
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
            this.fillLibro.EjemDisp = this.fillLibro.Ejemplares;
            
            axios.put(url, this.fillLibro)
            .then(response => {

                console.log(response);
                
                const link = document.createElement('a');
                link.setAttribute('href', 'data:application/pdf;base64, ' + encodeURI(response.data));
                link.setAttribute('download', 'test.pdf');
                link.style.display = 'none';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);            


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
                console.log(error);
                // this.errors = error.response.data;
                   toastr.error(error.response.data.message, "No es posible disminuir el número de ejemplares");
            });
        },

        editEjemplar: function (ejemplar) {
            this.fillEjemplar.Codigo = ejemplar.Codigo;
            this.fillEjemplar.ISBN = ejemplar.ISBN;
            this.fillEjemplar.FechaRegistro = ejemplar.FechaRegistro;
            this.fillEjemplar.CD = ejemplar.CD;
            console.log(this.fillEjemplar);
            $('#editE').modal('show');
        },
        updateEjemplar: function (Codigo) {
            var url = 'ejemplar/'+ Codigo;
            axios.put(url, this.fillEjemplar)
            .then(response => {
                this.getEjemplares();
                this.fillEjemplar = {
                    'Codigo':'',
                    'ISBN':'',
                    'FechaRegistro':'',
                    'CD':''
                };
                this.errors = [];
                $("#editE").modal("hide");
                toastr.success("Ejemplar actualizado con exito.", "Tarea completada!");
            })
            .catch(error =>{
                this.errors = error.response.data;
                toastr.error(error.response.data.message, "Error!");
            });
        },
              
        deleteEjemplar: function (ejemplar) {
            if (confirm('¿Esta seguro de eliminar el ejemplar ' + ejemplar.Codigo + '?')) {
                var url = 'ejemplar/' + ejemplar.Codigo;
                axios.delete(url).then(response => {
                    this.getEjemplares();
                    this.getLibros();
                    this.fillLibro.Ejemplares--;
                    this.fillLibro.EjemDisp--;
                    toastr.success("Ejemplar eliminado con exito.", "Tarea completada!");
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

