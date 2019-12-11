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
        detailsdata: [],
        usuario: [],
        fillAdeudos: {
            'folio': '',
            'control': '',
            'nombre': '',
            'apellidos': '',
            'fecha_inicio': '',
            'fecha_final': '',
            'fecha_entrega': '',
            'renovaciones': '',
            'existe': '',
            'monto': '',
        },

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
        fechaInicio: '',
        fechaFinal: ''
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
                const fechaFinal = new Date(adeudo.fecha_final).getTime();
                const fechaEntrega = new Date(adeudo.fecha_entrega).getTime();

                const diferencia = adeudo.fecha_entrega ? fechaEntrega - fechaFinal : fechaActual - fechaFinal;
                const dias = Math.floor(diferencia/(1000*60*60*24));

                let cantidad = 0;
                if (dias > 0) {
                    cantidad = dias * 25;
                }
                /*if (cantidad > 100) {
                    cantidad = 100;
                }*/

                totales.push(cantidad);
            });
            return totales;
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
            console.log('Folios');
            this.getAdeudos();
        },
        filtrarFecha: function () {
            if (this.fechaInicio && this.fechaFinal) {
                console.log('Fechas');
                this.getAdeudos();
            }
        },
        clearDataInput: function() {
            this.fechaInicio = '';
            this.fechaFinal = '';
            this.getAdeudos();
        },
        //Modulo Carreras
        getAdeudos: function (page) { //param: page
            console.log('Index');
            let inicio = '';
            let final = '';
            if (this.fechaInicio && this.fechaFinal) {
                inicio = new Date(this.fechaInicio).toUTCString();
                final = new Date(this.fechaFinal).toUTCString();
            }
            var url = this.urlAdeudos+'?page=' + page + '&search=' + this.search + '&fechaInicio='+ inicio+'&fechaFinal='+final;
            axios.get(url).then(response => {
                this.adeudos = response.data.adeudos.data;//.carreras.data;
                this.pagination = response.data.pagination;
            });
        },
        deleteAdeudo: function (adeudo, monto, estado,tipoU) {
            if (confirm('¿Desea cambiar el estado de adeudo del Folio: ' + adeudo.folio + '?')) {
                if ( confirm('¿Se entregó los ejemplares prestados?') ){
                    var url = this.urlAdeudos + '/' + adeudo.folio + '/' + monto + '?back=1';
                }else{
                    var url = this.urlAdeudos + '/' + adeudo.folio + '/' + monto + '?back=0';
                }
                //console.log(tipoU);
                if (tipoU == 1){
                    if (estado == 1) {
                        axios.post(url).then(response => {
                            this.getAdeudos();
                            //swal.close();
                            toastr.success("El estado del adeudo se a cambiado con exito.", "Tarea completada!");
                        }).catch(ex => {
                            //ex.response.data
                            toastr.error('Hubo un problema y no se pudo completar la acción', "Error!");
                        });
                    }else{
                        toastr.error('El adeudo ya ha sido pagado.','Aviso!');
                    }
                }else{
                    toastr.error('Los colaboradores no pueden borrar adeudos.','Aviso!');
                }
            }
        },
        showAdeudo: function (adeudo, monto) {
            var url = this.urlAdeudos+'/det/'+adeudo.folio;
            axios.get(url).then(response => {
                this.detailsdata = response.data
            });
            this.fillAdeudos.folio  = adeudo.folio;
            this.fillAdeudos.control = adeudo.control;
            this.fillAdeudos.nombre = adeudo.nombre;
            this.fillAdeudos.apellidos = adeudo.apellidos;
            this.fillAdeudos.fecha_inicio = adeudo.fecha_inicio;
            this.fillAdeudos.fecha_final = adeudo.fecha_final;
            this.fillAdeudos.fecha_entrega = adeudo.fecha_entrega;
            this.fillAdeudos.renovaciones = adeudo.renovaciones;
            this.fillAdeudos.existe = adeudo.existe;
            this.fillAdeudos.monto = adeudo.monto;
            $('#detalles').modal('show');
        },
        /*getAlums: function (page) { //param: page
            var url = this.urlAdeudos+'/get/alum';
            axios.get(url).then(response => {
                this.alumnos = response.data;//.carreras.data;
            });
        },
        getProfs: function (page) { //param: page
            var url = this.urlAdeudos+'/get/prof';
            axios.get(url).then(response => {
                this.docentes = response.data;//.carreras.data;
            });
        },
        getAdms: function (page) { //param: page
            var url = this.urlAdeudos+'/get/adm';
            axios.get(url).then(response => {
                this.administrativos = response.data;//.carreras.data;
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
        },*/
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
