		new Vue({
			el: '#prestamosindex',
			created: function(){
				this.getkeeps();
			},
			data:{
				keeps:[],
				newkeep:'',
				fillkeep:{'folio':'','renovaciones':''},
				fillrenew:{'folio':'','days':'','fecha_final':'','nombre':'','apellidos':'','renovaciones':''},
				errors:[]
			},
			methods:{
				getkeeps:function(){
					var urlkeeps='tasks';
					axios.get(urlkeeps).then(response=>{
						this.keeps= response.data

					});
				},

				searchprestamo:function(){
					var numcontrol = $("#numcontrol").val();					         
					var urlsearch='tasks?id='+numcontrol;
					fillkeep={'folio':'','renovaciones':''};
														
					axios.get(urlsearch).then(response=>{
						this.keeps= response.data
					}).catch(error=>{
						this.errors=error.response.data;
				});
				},

				editkeep: function(keep){
					
						this.fillkeep.folio=keep.folio;
						this.fillkeep.renovaciones=keep.renovaciones;
						$('#edit').modal('show');

				},

				renew: function(keep){
					this.fillrenew.folio=keep.folio;
					this.fillrenew.fecha_final=keep.fecha_final;
					this.fillrenew.nombre=keep.nombre;
					this.fillrenew.apellidos=keep.apellidos;
					this.fillrenew.renovaciones=keep.renovaciones;							
					$('#renew').modal('show');			

			},



			renewmoredays:function(folio){
				var url='tasks/'+folio;	
				var days = $("#selectdays").val();
				this.fillrenew.days=days;				
				axios.patch(url,this.fillrenew).then(response=>{
					this.getkeeps();
					this.fillrenew={'folio':'','days':'','fecha_final':'','nombre':'','apellidos':'','renovaciones':''};
					this.errors=[];
					$('#renew').modal('hide');
					toastr.success('Actualizado Correctamente');
				}).catch(error=>{
						this.errors=error.response.data;
						toastr.error('no se Pudo actualizar');
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

	