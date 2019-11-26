
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
        concentrado:[],
        topic:[],
        resultados:{
            pcarrera:0,
            pclasificacion:0,
            ptotales:0,
            plista:[]
        }
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
            var clasificacion = $("#topic").val();

            axios.post(this.url+"/consultaprestamos",{
                'carrera':carrera,
                'clasificacion':clasificacion,
                'inicio':this.inicio,
                'fin':this.fin
            })
            .then(response =>{
                this.resultados = response.data;

            });
        }
    }

});
