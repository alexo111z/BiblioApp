new Vue({
    el: '#content',
    created: function () {
        this.inflateSelect();
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
    data:{
        url:'cdewey',
        items:[],
        clasificacion:'',
        lista:[],
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0,
        },
        offset: 4,
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
    methods:{
        inflateSelect: function () {
            axios.get(this.url).then(response => {
                this.items = response.data;
            }).catch(error =>{
                toastr.error(error.response.data.message, "Error!");
            });
        },
        CambioClasification: function (page) {
            this.clasificacion = $("#clasificacion").val();
            var url = this.url+'/'+this.clasificacion+"?page="+page;
            axios.get(url).then(response =>{
                this.lista = response.data.lista.data;
                this.pagination = response.data.pagination;
            }).catch(error =>{
                toastr.error(error.response.data.message, "Error!");
            });
        },
        changePage: function (page) {
            this.pagination.current_page = page;
            this.CambioClasification(page);
        }
    }
});
