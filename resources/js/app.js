		new Vue({
			el: '#prestamosindex',
			created: function(){
				this.getkeeps();
			},
			data:{
				keeps:[],
				newkeep:'',
				fillkeep:{'folio':'','renovaciones':''},
				fillrenew:{'folio':'','days':''},
				errors:[]
			},
			methods:{
				getkeeps:function(){
					var urlkeeps='tasks';
					axios.get(urlkeeps).then(response=>{
						this.keeps= response.data

					});
				},

				editkeep: function(keep){
						this.fillkeep.folio=keep.folio;
						this.fillkeep.renovaciones=keep.renovaciones;
						$('#edit').modal('show');

				},

				renew: function(keep){
					this.fillrenew.folio=keep.folio;
					this.fillrenew.renovaciones=keep.days;								
					$('#renew').modal('show');

			},



			renewprestamo:function(folio){
				var url='tasks/'+folio;					
				axios.patch(url,this.fillkeep).then(response=>{
					this.getkeeps();
					this.fillkeep={'folio':'','dias':''};
					this.errors=[];
					$('#renew').modal('hide');
					toastr.success('Actualizado Correctamente');
				}).catch(error=>{
						this.errors=error.response.data;
				});


			},


				updatekeep:function(folio){
					var url='tasks/'+folio;					
					axios.put(url,this.fillkeep).then(response=>{
						this.getkeeps();
						this.fillkeep={'folio':'','renovaciones':''};
						this.errors=[];
						$('#edit').modal('hide');
						toastr.success('Actualizado Correctamente');
					}).catch(error=>{
							this.errors=error.response.data;
					});


				},

				renovarprestamo: function(keep){
					var url='tasks/' + keep.folio;
					console.log(url);
					
					axios.delete(url).then(response=>{
						this.getkeeps();
						toastr.success('Eliminado Correctamente');
					}).catch(error=>{
						console.log(this.errors);
						this.errors=error.response.data;

					});
				},

				createkeep:function(){
					var url='tasks';
					axios.post(url,{
						Renovation:this.newkeep

					}).then(response=>{
						this.getkeeps();
						this.newkeep='';
						this.errors=[];
						$('#create').modal('hide');
						toastr.success('Nueva Tarea Creada Con Exito');


					}).catch(error=>{
						console.log();
						this.errors=error.response.data;

					})
				}

			}
		});

	