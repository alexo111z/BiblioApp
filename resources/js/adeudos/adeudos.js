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
        cantidad: [],
        usuario: [],
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
            var from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
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
        totalAdeudo: function () {
            const totales = [];
            this.adeudos.forEach(adeudo => {
                const fechaActual = new Date().getTime();
                const fechaFinal = new Date(adeudo.Fecha_final).getTime();
                const fechaEntrega = new Date(adeudo.Fecha_entrega).getTime();

                const diferencia = adeudo.Fecha_entrega ? fechaEntrega - fechaFinal : fechaActual - fechaFinal;
                const dias = Math.floor(diferencia/(1000*60*60*24));

                let cantidad = 0;
                if (dias > 0) {
                    cantidad = dias * 25;
                }
                if (cantidad > 100) {
                    cantidad = 100;
                }

                totales.push(cantidad);
            });
            return totales;
        },
        contarLibros: function () {
            // var count = [];
            // this.adeudos.forEach(adeudo => {
            //
            //     const url = this.urlAdeudos + '/count/' + adeudo.Folio;
            //     axios.get(url).then(response => {
            //        count.push(response.data);
            //        this.cantidad = count;
            //     });
            //
            // });
            count = this.cantidad;
            return count;
        },
        codUsuario: function () {
            usu = this.usuario;
            return usu;
        }
    },
    methods: {
        changePage: function (page) {
            this.pagination.current_page = page;
            this.getAdeudos(page);
        },
        searchAdeudo: function () {
            var search = $("#search").val();
            this.search = search;
            this.getAdeudos();
        },

        //Modulo Carreras
        getAdeudos: function (page) { //param: page
            var url = this.urlAdeudos+'?page=' + page + '&search=' + this.search;
            axios.get(url).then(response => {
                aux = this.adeudos = response.data.adeudos.data;//.carreras.data;
                this.pagination = response.data.pagination;
                this.getCount();
                this.getUsu();
            });
        },
        getCount: function() {
            var count = [];
            this.adeudos.forEach(adeudo => {
                const url = this.urlAdeudos + '/count/' + adeudo.Folio;
                axios.get(url).then(response => {
                    count.push(response.data);
                    this.cantidad = count;
                });
            });
        },
        getUsu: function() {
            var count = [];
            this.adeudos.forEach(adeudo => {
                const url = this.urlAdeudos + '/usu/' + adeudo.IdPrestatario;
                axios.get(url).then(response => {
                    count.push(response.data);
                    this.usuario = count;
                });
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
        searchAdeudo: function () {
            this.search = $('#search').val();
            this.getAdeudos();
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
