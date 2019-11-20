new Vue({
    el: "#materialesCRUD",
    created: function () {
        this.getMateriales();
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
        materiales: [],
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0,
        },
        newMaterial: {
            'Titulo':'',
            'Clave':'',
            'Year':'',
            'Ejemplares':'',
            'Tipo':'',
            'Existe':1
        },
        offset: 3,
        errors: [],
        search: '',
        fillMaterial:{
            'Id':'',
            'Titulo':'',
            'Clave':'',
            'Year':'',
            'Ejemplares':'',
            'Tipo':''
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
            this.getMateriales(page);
        },
        getMateriales: function (page) {
            var url = 'material?page=' + page +'&search='+this.search;
            //var url = 'material';
            axios.get(url).then(response => {
                //this.materiales = response.data;
                this.materiales = response.data.material.data;
                this.pagination = response.data.pagination;
            }).catch(error =>{
                toastr.error(error.response.data.message, "Error1!");
            });
        },
        createMaterial: function () {
            var url = 'material';
            axios.post(url, this.newMaterial)
            .then(response => {
                this.getMateriales();
                this.newMaterial = {
                    'Titulo':'',
                    'Clave':'',
                    'Year':'',
                    'Ejemplares':'',
                    'Tipo':'',
                    'Existe':1
                };
                this.errors = [];
                $("#create").modal('hide');
                toastr.success("Material registrado con exito.", "Tarea completada!");
            }).catch(error => {
                this.errors = error.response.data;
                toastr.error(error.response.data.message, "Error2!");
            });
        },
        editMaterial: function (material) {
            this.fillMaterial.Id = material.Id;
            this.fillMaterial.Titulo = material.Titulo;
            this.fillMaterial.Clave = material.Clave;
            this.fillMaterial.Year = material.Year;
            this.fillMaterial.Ejemplares = material.Ejemplares;
            this.fillMaterial.Tipo = material.Tipo;
            $('#edit').modal('show');
        },
        updateMaterial: function (id) {
            var url = 'material/'+ id;
            axios.put(url, this.fillMaterial)
            .then(response => {
                this.getMateriales();
                this.fillMaterial = {
                    'Id':'',
                    'Titulo':'',
                    'Clave':'',
                    'Year':'',
                    'Ejemplares':'',
                    'Tipo':''
                };alert(url);
                this.errors = [];
                $("#edit").modal("hide");
                toastr.success("Material actualizado con exito.", "Tarea completada!");
            })
            .catch(error =>{
                this.errors = error.response.data;
                toastr.error(error.response.data.message, "Error!");
            });
        },
              
        deleteMaterial: function (material) {
            if (confirm('¿Esta seguro de eliminar el material ' + material.Titulo + '?')) {
                var url = 'material/' + material.Id;
                axios.delete(url).then(response => {
                    this.getMateriales();
                    toastr.success("Material eliminado con exito.", "Tarea completada!");
                }).catch(ex => {
                    toastr.error(ex.response.data.message, "Error4!");
                });
            }
        },

        searchMaterial: function () {
            this.search = $('#search').val();
            this.getMateriales();
        }
    }
});