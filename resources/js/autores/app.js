new Vue({
    el: "#content",
    created: function () {
        this.getAutores();
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
        autores: [],
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0,
        },
        newAutor: {
            'Nombre':'',
            'Apellidos':'',
            'Existe':1
        },
        offset: 3,
        errors: [],
        search: '',
        fillAutor:{
            'IdAutor':'',
            'Nombre':'',
            'Apellidos':''
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
            var from = this.pagination.current_page - this.offset//TODO offset
            if(from < 1){
                from = 1;
            }
            var to = from + (this.offset * 2);// TODO offset
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
            this.getAutores(page);
        },
        getAutores: function (page) {
            var url = 'autors?page=' + page+'&search='+this.search;
            //var url = 'autors';
            axios.get(url).then(response => {
                //this.autores = response.data;
                this.autores = response.data.autores.data;
                this.pagination = response.data.pagination;
            }).catch(error =>{
                toastr.error(error.response.data.message, "Error!");
            });
        },
        createAutor: function () {
            var url = 'autors';
            axios.post(url, this.newAutor)
            .then(response => {
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
        editAutor: function (autor) {
            this.fillAutor.IdAutor = autor.IdAutor;
            this.fillAutor.Nombre = autor.Nombre;
            this.fillAutor.Apellidos = autor.Apellidos;
            $('#edit').modal('show');
        },
        updateAutor: function (id) {
            var url = 'autors/'+id;
            axios.put(url, this.fillAutor)
            .then(response => {
                this.getAutores();
                this.fillAutor = {
                    'IdAutor':'',
                    'Nombre':'',
                    'Apellidos':''
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
            if (confirm('¿Esta seguro de eliminar al autor ' + autor.Nombre + ' ' + autor.Apellidos + '?')) {
                var url = "autors/" + autor.IdAutor;
                axios.delete(url).then(response => {
                    this.getAutores();
                    toastr.success("Autor eliminado con exito.", "Tarea completada!");
                }).catch(ex => {
                    toastr.error(ex.response.data.message, "Error!");
                });
            }
        },
        searchAutor: function () {
            this.search = $('#search').val();
            this.getAutores();
        }
    }
});
