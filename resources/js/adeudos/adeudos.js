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
            'fullname': '',
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
        fechaFinal: '',
        tipo: 0,
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
            //console.log('Folios');
            this.getAdeudos();
        },
        filtrarFecha: function () {
            if (this.fechaInicio && this.fechaFinal) {
                //console.log('Fechas');
                this.getAdeudos();
            }
        },
        filtrarTipo: function(){
            var filtro = $('#tipo').val();
            //this.tipo = filtro;
            this.getAdeudos();
        },
        clearDataInput: function() {
            this.fechaInicio = '';
            this.fechaFinal = '';
            this.getAdeudos();
        },
        //Modulo Carreras
        getAdeudos: function (page) { //param: page
            //console.log('Index');
            let inicio = '';
            let final = '';
            if (this.fechaInicio && this.fechaFinal) {
                inicio = new Date(this.fechaInicio).toUTCString();
                final = new Date(this.fechaFinal).toUTCString();
            }
            var url = this.urlAdeudos+'?page=' + page + '&search=' + this.search + '&fechaInicio='+ inicio+'&fechaFinal='+final +'&tipo=' + this.tipo;
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
            if(adeudo.fecha_entrega != null){
                this.fillAdeudos.fecha_entrega = adeudo.fecha_entrega;
            }else{
                this.fillAdeudos.fecha_entrega = 'No Entrego';
            }
            this.fillAdeudos.renovaciones = adeudo.renovaciones;
            this.fillAdeudos.existe = adeudo.existe;
            this.fillAdeudos.monto = adeudo.monto;
            this.fillAdeudos.fullname = adeudo.nombre+' '+adeudo.apellidos;
            $('#detalles').modal('show');
        },
    }
});
