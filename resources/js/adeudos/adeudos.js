new Vue({
    el: '#adeudosCRUD',
    created: function () {
        this.getAdeudos();
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
        adeudos: [],
        monto: [],
        fillAdeudos: '',
        urlAdeudos: 'adeudo',
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0,
        },
        offset: 3,
        errors: [],
        search: '',
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
        changePage: function (page) {
            this.pagination.current_page = page;
            this.getAdeudos(page);
        },
        searchAutor: function () {
            var search = $("#search").val();
            this.search = search;
            this.getAdeudos();
        },

        //Modulo Carreras
        getAdeudos: function () { //param: page
            var url = this.urlAdeudos;//?page=' + page;
            axios.get(url).then(response => {
                aux = this.adeudos = response.data;//.carreras.data;
                this.monto.push({
                   ad: "asd",
                });
                //this.pagination = response.data.pagination;
            });
        },
        deleteAdeudo: function (adeudo) {
            if (confirm('¿Desea eliminar el adeudo del Folio: ' + adeudo.Folio + '?')) {
                var url = this.urlAdeudos + '/' + adeudo.Folio;
                axios.delete(url).then(response => {
                    this.getAdeudos();
                    swal.close();
                    toastr.success("El adeudo ha sido eliminado con exito.", "Tarea completada!");
                }).catch(ex => {
                    toastr.error(ex.response.data.message, "Error!");
                });
            }
        },
        // editCarrera: function (carrera) {
        //     this.fillCarrera.Clave  = carrera.Clave;
        //     this.fillCarrera.Nombre = carrera.Nombre;
        //     $('#editCarrera').modal('show');
        // },
        // updateCarrera: function (id) {
        //     var url = 'carreras/' + id;
        //     axios.put(url, this.fillCarrera).then(response => {
        //         this.getCarreras();
        //         this.fillCarrera = {'Clave': '', 'Nombre': ''};
        //         this.errors = [];
        //         $('#editCarrera').modal('hide');
        //         toastr.success("Carrera actualizada con exito.", "Tarea completada!");
        //     }).catch(error => {
        //         this.errors = error.response.data;
        //     });
        // }

    }
});
