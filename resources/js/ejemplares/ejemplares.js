new Vue({
    el: "#ejemplaresCRUD",
    created: function () {
        this.getEjemplares();
        toastr.options = {
            showMethod: 'fadeIn', 
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
        ejemplares: [],
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0,
        },
        newEjemplar: {
            'Codigo':'',
            'ISBN':'',
            'FechaRegistro':'',
            'CD':'',
        },
        offset: 3,
        errors: [],
        search: '',
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
            this.getEjemplares(page);
        },
        getEjemplares: function (page) {
            var url = 'ejemplar?page=' + page +'&search='+this.search;
            axios.get(url).then(response => {
                this.ejemplares = response.data.ejemplar.data;
                this.pagination = response.data.pagination;
            }).catch(error =>{
                toastr.error(error.response.data.message, "Error1!");
            });
        },
        createEjemplar: function () {
            var url = 'ejemplar';
            axios.post(url, this.newEjemplar)
            .then(response => {
                this.getEjemplares();
                this.newEjemplar = {
                    'Codigo':'',
                    'ISBN':'',
                    'FechaRegistro':'',
                    'CD':''
                };
                this.errors = [];
                $("#create").modal('hide');
                toastr.success("Ejemplar registrado con éxito.", "Tarea completada!");
                console.log(response.data);
                
            }).catch(error => {
                toastr.error("Codigo duplicado, por favor corrija el dato registrado");
            });
        },

        editEjemplar: function (ejemplar) {
            this.fillEjemplar.Codigo = ejemplar.Codigo;
            this.fillEjemplar.ISBN = ejemplar.ISBN;
            this.fillEjemplar.FechaRegistro = ejemplar.FechaRegistro;
            this.fillEjemplar.CD = ejemplar.CD;
            console.log(this.fillEjemplar);
            $('#edit').modal('show');
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
                $("#edit").modal("hide");
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
                    toastr.success("Ejemplar eliminado con exito.", "Tarea completada!");
                }).catch(ex => {
                    toastr.error(ex.response.data.message, "Error4!");
                });
            }
        },

        searchEjemplar: function () {
            this.search = $('#search').val();
            this.getEjemplares();
        }
    }
});