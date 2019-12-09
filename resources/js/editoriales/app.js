new Vue({
    el:"#content",
    created:function(){
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
        this.getEditoriales();
    },
    data: {
        editoriales: [],
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0,
        },
        newEditorial: {
            'Nombre':'',
            'Existe':1
        },
        offset: 3,
        errors: [],
        search: '',
        fillEditorial:{
            'Id':'',
            'Nombre':''
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
    methods:{
        changePage: function (page) {
            this.pagination.current_page = page;
            this.getEditoriales(page);
        },
        searchEditorial: function () {
            this.search = $('#search').val();
            this.getEditoriales();
        },
        getEditoriales: function (page) {
            var url = 'editorials?page='+page+"&search="+this.search;
            axios.get(url).then(response =>{
                this.editoriales = response.data.editoriales.data;
                this.pagination = response.data.pagination;
            }).catch(error =>{
                toastr.error(error, "Error!");
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
                this.errors = [];
                $("#create").modal('hide');
                toastr.success("Editorial registrada con exito.", "Tarea completada!");
            }).catch(error => {
                this.errors = error.response.data;
                toastr.error(error.response.data.message, "Error!");
            });
        },
        editEditorial: function (editorial) {
            this.fillEditorial.Id = editorial.Id;
            this.fillEditorial.Nombre = editorial.Nombre;
            $('#edit').modal('show');
        },
        updateEditorial: function (id) {
            var url = 'editorials/'+id;
            axios.put(url, this.fillEditorial)
            .then(response => {
                this.getEditoriales();
                this.fillEditorial = {
                    'Id':'',
                    'Nombre':''
                };
                this.errors = [];
                $("#edit").modal("hide");
                toastr.success("Editorial actualizada con exito.", "Tarea completada!");
            })
            .catch(error =>{
                this.errors = error;
                toastr.error(error, "Error!");
            });
        },
        deleteEditorial: function (editorial) {
            if (confirm('¿Esta seguro de eliminar al autor ' + editorial.Nombre + '?')) {
                var url = "editorials/" + editorial.Id;
                axios.delete(url).then(response => {
                    this.getEditoriales();
                    toastr.success("Editorial eliminada con exito.", "Tarea completada!");
                }).catch(ex => {
                    toastr.error('No puedes eliminar una editorial que tiene titulos asignados.', "Error!");
                });
            }
        },
    }
});
