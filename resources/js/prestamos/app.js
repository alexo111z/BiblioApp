new Vue({

    el: '#prestamosindex',

    created: function () {

        this.getkeeps();
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
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0,
        },
        
        colalibros: [],
        keeps: [],
        detailsdata: [],
        listlibros: [],
        listcontrol: [],
        cardlibros: [],
        newkeep: '',
        fillkeep: {
            'folio': '',
            'renovaciones': ''
        },
        fillrenew: {
            'folio': '',
            'days': '',
            'fecha_final': '',
            'nombre': '',
            'apellidos': '',
            'renovaciones': ''
        },
        offset: 3,
        filldetails: {
            'folio': '',
            'days': '',
            'fecha_final': '',
            'fecha_inicial': '',
            'fecha_entrega': '',
            'nombre': '',
            'apellidos': '',
            'estado': '',
            'renovaciones': ''
        },
        fillcreate: {
            'codigos': '',
            'ncontrol': '',
            'fecha_inicial': '',
            'dias': ''
        },
        errors: [],
        control: '',
        codigolibro: '',
        numcontrol: '',
        cuantoslibros: 0,
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
            this.getkeeps(page);
        },


        limpiartodo: function () {
            this.limpiardatos();
            this.limpiarselecteds();
            $('#control').val("");
        },
        limpiardatos: function () {
            this.listlibros = [];
            this.listcontrol = [];
            $('#codigolibro').val("");
        },
        limpiarselecteds: function (card) {

            var index = this.colalibros.indexOf(card.codigo);
            if (index !== -1) this.colalibros.splice(index, 1);
            var urlselectedbook = 'prestamos/getselectedbook/' + this.colalibros;
            axios.get(urlselectedbook).then(response => {
                this.cardlibros = response.data
            }).catch(error => {
                console.log(error.response.data.message);
            });
        },

        getkeeps: function (page) {            
            var urlkeeps = 'tasks?page=' + page+'&search='+this.control;
            axios.get(urlkeeps).then(response => {
                this.keeps = response.data.prestamos.data;
                this.pagination = response.data.pagination;
            }).catch(error => {
                console.log(error.response.data.message);
            });
        },

        searchprestamo: function () {
            console.log(event.key);
            var search1 = $('#control').val();
            this.control = search1;
            this.getkeeps();
        },




        getselectedbook: function (libro) {
            if (this.colalibros.length < 3) {
                let yes = 1;
                for (i = 0; i < this.colalibros.length; i++) {
                    if (this.colalibros[i] == libro.Codigo) {
                        alert('No puede seleccionar 2 veces el mismo ejemplar');
                        this.limpiardatos();
                        yes = 0;
                    }
                }
                if (yes == 1) {
                    this.colalibros.push(libro.Codigo);
                    var urlselectedbook = 'prestamos/getselectedbook/' + this.colalibros;
                    axios.get(urlselectedbook).then(response => {
                        this.limpiardatos();
                        this.cardlibros = response.data
                    }).catch(error => {
                        console.log(error.response.data.message);
                    });
                }

            } else {
                alert('El limite de libros por prestatario son 3');
                this.limpiardatos();
            }
        },

        searchlibros: function () {
            this.listcontrol = [];

            var search2 = $('#codigolibro').val();
            this.codigolibro = search2;
            this.getlistbooks();
        },

        getlistbooks: function () {
            var urllistbooks = 'prestamos/getlistbooks/' + this.codigolibro;
            axios.get(urllistbooks).then(response => {
                this.listlibros = response.data

            }).catch(error => {
                console.log(error.response.data.message);
            });
        },

        getctrl: function () {
            this.listlibros = [];
            this.fillcreate.ncontrol = '';
            var searchcontrol = $('#searchcontrol').val();
            this.numcontrol = searchcontrol;
            this.getlistcontrol();
        },



        getlistcontrol: function () {
            var urllistcontrol = 'prestamos/getlistcontrol/' + this.numcontrol;
            axios.get(urllistcontrol).then(response => {
                this.listcontrol = response.data
            }).catch(error => {
                console.log(error.response.data.message);
            });
        },

        getselectedcontrol: function (control) {
            $('#searchcontrol').val(control.control1);
            this.fillcreate.ncontrol = control.id;
            this.limpiardatos();
        },




        editkeep: function (keep) {
            this.fillkeep.folio = keep.folio;
            this.fillkeep.renovaciones = keep.renovaciones;
            $('#detalles').modal('show');
        },

        renew: function (keep) {
            this.fillrenew.folio = keep.folio;
            this.fillrenew.fecha_final = keep.fecha_final;
            this.fillrenew.nombre = keep.nombre;
            this.fillrenew.apellidos = keep.apellidos;
            this.fillrenew.renovaciones = keep.renovaciones;
            $('#renew').modal('show');
        },

        renewmoredays: function (folio) {
            var url = 'tasks/' + folio;
            var days = $("#selectdays").val();
            this.fillrenew.days = days;
            axios.patch(url, this.fillrenew).then(response => {
                this.getkeeps();
                this.fillrenew = {
                    'folio': '',
                    'days': '',
                    'fecha_final': '',
                    'nombre': '',
                    'apellidos': '',
                    'renovaciones': ''
                };
                this.errors = [];
                $('#renew').modal('hide');
                toastr.success('Actualizado correctamente');
            }).catch(error => {
                this.errors = error.response.data;
                toastr.error('no se Pudo actualizar');
            });
        },


        details: function (keep) {
            this.filldetails.folio = keep.folio;
            this.filldetails.fecha_inicio = keep.fecha_inicio;
            this.filldetails.fecha_final = keep.fecha_final;
            this.filldetails.fecha_entrega = keep.fecha_entrega;
            this.filldetails.nombre = keep.nombre;
            this.filldetails.apellidos = keep.apellidos;
            this.filldetails.estado = keep.Estado;
            this.filldetails.renovaciones = keep.renovaciones;
            this.getdetails();
            $('#detalles').modal('show');
        },

        getdetails: function () {
            var urlkeeps = 'prestamos/getdetails/' + this.filldetails.folio;
            axios.get(urlkeeps).then(response => {
                this.detailsdata = response.data
            }).catch(error => {
                console.log(error.response.data.message);
            });
        },

        terminarprestamo: function (folio) {
            var urlkeeps = 'prestamos/endprestamo/' + folio;
            axios.get(urlkeeps).then(response => {
                this.getkeeps();
                $('#detalles').modal('hide');
                alert("Libros devueltos correctamente");
                //console.log(response.data.entrega);
                //toastr.warning(response.data.entrega);
            }).catch(error => {
                alert(error.response.data.message);
                console.log(error.response.data.message);
                //toastr.error(error.response.data.message);
            });
        },


        renovarprestamo: function (keep) {
            var url = 'tasks/' + keep.folio;
            console.log(url);

            axios.delete(url).then(response => {
                this.getkeeps();
                toastr.success('Eliminado correctamente');
            }).catch(error => {
                console.log(this.errors);
                this.errors = error.response.data;

            });
        },

        crearprestamo: function () {
            var iduser = $("#searchcontrol").val();
            var fecha_i = $("#f_inicio").val();
            var diass = $("#diasselect").val();
            if (iduser == "") {
                toastr.warning('Agregue un prestatario');
                return;
            } else {
                if (this.fillcreate.ncontrol == "") {
                    toastr.warning('Seleccione un prestatario de la lista');
                    return;
                } else {
                    if (this.colalibros.length < 1) {
                        toastr.warning('Favor de agregar uno O más libros por prestar');
                        return;
                    } else {
                        var url = 'tasks';

                        axios.post(url, {
                            iduser: this.fillcreate.ncontrol,
                            codigos: this.colalibros,
                            fecha_i: fecha_i,
                            dias: diass

                        }).then(response => {
                            
                            console.log(response.data.id);

                            if (response.data.id === '1') {
                                this.colalibros = [];
                                this.limpiardatos();
                                this.getkeeps();
                                this.cardlibros = [];
                                $('#searchcontrol').val("");
                                $('#create').modal('hide');
                                toastr.success('Prestamo realizado correctamente');

                            } else {
                                alert(response.data.id);
                                console.log(response.data.id);
                            }

                            
                        }).catch(error => {
                            console.log(error.response.data.message);
                            this.errors = error.response.data.message;
                            toastr.error(error.response.data.message);
                        })
                    }

                }



            }


        },

    }
});
