new Vue({
    el: '#reportes',
    created: function(){
        this.getClasificacion();
        this.getCarreras();
    },
    data:{
        url:'reporte',
        inicio: '',
        fin: '',
        carrera: '',
        concentrado:[],
        topic:[],
        resultados:{
            pcarrera:0,
            pclasificacion:0,
            ptotales:0,
            plista:[]
        },
        resultadosRegistros:{
            ttitulos:0,
            tejemplares:0,
            plista:[]
        },
        catalogo:[],
        tipoPrestatario:'',
        prestamosAdministrativos:[],
        Multas:{
            total:0,
            lista:[]
        },
    },
    methods:{
        getClasificacion: function(){
            var url ="cdewey";
            axios.get(url).then(response => {
                this.concentrado = response.data;
                this.getTopic();
            }).catch(error =>{
                toastr.error(error.response.data.message, "Error!");
            });
        },
        getTopic: function(){
            var clasificacion = $("#clasificacion").val();
            var url ="cdewey/select/"+(clasificacion ? clasificacion : 0);
            axios.get(url).then(response => {
                this.topic = response.data;
            }).catch(error =>{
                toastr.error(error.response.data.message, "Error!");
            });
        },
        getCarreras: function () {
            var url = "reporte/carreras";
            axios.get(url).then(response =>{
                this.carreras = response.data;
            }).catch(error =>{
                toastr.error(error.response.data.message, "Error!");
            });
        },
        obtenerConcentrado: function () {
            var carrera  = $("#carreras").val();
            this.carrera = carrera;
            var clasificacion = $("#topic").val();
            if (this.inicio=='' || this.fin == '') {
                toastr.error("Seleccione un rango de fecha correcto", "Error!");
                return;
            }

            axios.post(this.url+"/consultaprestamos",{
                'carrera':carrera,
                'clasificacion':clasificacion,
                'inicio':this.inicio,
                'fin':this.fin
            })
            .then(response =>{
                this.resultados = response.data;
            });
        },
        obtenerConcentradoRegistros: function () {
            var carrera  = $("#carrerast").val();
            this.carrera = carrera;
            if (this.inicio=='' || this.fin == '') {
                toastr.error("Seleccione un rango de fecha correcto", "Error!");
                return;
            }
            axios.post(this.url+"/consultaRegistrados",{
                'carrera':carrera,
                'inicio':this.inicio,
                'fin':this.fin
            })
            .then(response =>{
                this.resultadosRegistros = response.data;
            });
        },
        obtenercatalogo: function () {
            axios.get(this.url+'/consultaCatalogo')
            .then(response => {
                this.catalogo = response.data;
            });
        },
        consultarPrestatarios: function () {
            var tipo = $("#tipoPrestatario").val();
            this.tipoPrestatario = tipo;
            if (this.inicio=='' || this.fin == '') {
                toastr.error("Seleccione un rango de fecha correcto", "Error!");
                return;
            }
            axios.post(this.url+"/consultaPrestatarios",{
                'prestatario':tipo,
                'inicio':this.inicio,
                'fin':this.fin
            })
            .then(response =>{
                this.prestamosAdministrativos = response.data;
            });
        },
        consultarMultas: function () {
            var monto = 0;
            if (this.inicio=='' || this.fin == '') {
                toastr.error("Seleccione un rango de fecha correcto", "Error!");
                return;
            }
            axios.post(this.url+"/consultaMultas",{
                'inicio':this.inicio,
                'fin':this.fin
            })
            .then(response =>{
                this.Multas = response.data;
            });
        }
    }

});
