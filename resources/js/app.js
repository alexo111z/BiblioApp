
new Vue({
    el: '#reportes',
    created: function(){
        this.getreportes();
    },
    data:{
        reportes: []
    },
    methods:{
        getreportes: function(){
            var urlreportes='reporte';
            axios.get(urlreportes).then(response =>{
                this.reportes= response.data
            });
        }
    }
   
});




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
    data: {
        autores: [],
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
            var from = this.pagination.current_page - this.offset//TODO offset
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);// TODO offset
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
    }
});
