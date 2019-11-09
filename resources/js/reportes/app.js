
new Vue({
    el: '#reportes',
    created: function(){
        this.getClasificacion();
        this.getCarreras();
    },
    data:{
        url:'reporte',
        concentrado:[],
        topic:[],
        carreras:[],
        ConsultaPrestamos:{
            clasificacion: '',
            carrera: ''
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
            console.log(this.ConsultaPrestamos);
        }
    }

});
