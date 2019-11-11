new Vue({
			el: '#prestamosindex',
			created: function(){
				this.getkeeps();
			},
			data:{
				keeps:[],
				detailsdata:[],
				listlibros:[],
				listcontrol:[],
				cardlibros:[],
				newkeep:'',
				fillkeep:{'folio':'','renovaciones':''},
				fillrenew:{'folio':'','days':'','fecha_final':'','nombre':'','apellidos':'','renovaciones':''},
				filldetails:{'folio':'','days':'','fecha_final':'','fecha_inicial':'','nombre':'','apellidos':'','renovaciones':''},
				errors:[],
				control:'',
				codigolibro:'',
				numcontrol:'',
				cuantoslibros:0,
			},
			methods:{
				

				limpiartodo:function(){					
					this.limpiardatos();
					this.limpiarselecteds();
					$('#control').val("");
				},	
				limpiardatos:function(){					
					this.listlibros=[];
					this.listcontrol=[];
					$('#codigolibro').val("");
				},
				limpiarselecteds:function(){					
					this.cardlibros=[];
				},

				getkeeps:function(){					
					var urlkeeps='tasks?search='+this.control;
					axios.get(urlkeeps).then(response=>{
						this.keeps= response.data
					}).catch(error =>{						
						console.log(error.response.data.message);
					});
				},

				searchprestamo:function() {
					console.log(event.key);
					var search1 = $('#control').val();
					this.control=search1;					
					this.getkeeps();
				},

				


				getselectedbook:function(libro){					
					var urlselectedbook='prestamos/getselectedbook/'+libro.Codigo;					
					axios.get(urlselectedbook).then(response=>{
						
						this.limpiardatos();

						this.cardlibros= response.data
						
					}).catch(error =>{						
						console.log(error.response.data.message);
					});
				},

				searchlibros:function() {					
					var search2 = $('#codigolibro').val();
					this.codigolibro=search2;
					this.getlistbooks();
				},

				getlistbooks:function(){					
					var urllistbooks='prestamos/getlistbooks/'+this.codigolibro;
					axios.get(urllistbooks).then(response=>{
						this.listlibros= response.data				

					}).catch(error =>{						
						console.log(error.response.data.message);
					});
				},

				getctrl:function() {			
					var searchcontrol = $('#searchcontrol').val();
					this.numcontrol=searchcontrol;
					this.getlistcontrol();
				},

				

				getlistcontrol:function(){					
					var urllistcontrol='prestamos/getlistcontrol/'+this.numcontrol;
					axios.get(urllistcontrol).then(response=>{
						this.listcontrol= response.data				

					}).catch(error =>{						
						console.log(error.response.data.message);
					});
				},

				getselectedcontrol: function(control){
					$('#searchcontrol').val(control.control1);
					this.limpiardatos();					
										
					
				},


				

				editkeep:function(keep){					
						this.fillkeep.folio=keep.folio;
						this.fillkeep.renovaciones=keep.renovaciones;
						$('#detalles').modal('show');
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


			details: function(keep){
				this.filldetails.folio=keep.folio;
				this.filldetails.fecha_inicio=keep.fecha_inicio;
				this.filldetails.fecha_final=keep.fecha_final;
				this.filldetails.nombre=keep.nombre;
				this.filldetails.apellidos=keep.apellidos;
				this.filldetails.renovaciones=keep.renovaciones;
				this.getdetails();			
				$('#detalles').modal('show');
			},

			getdetails:function(){					
				var urlkeeps='prestamos/getdetails/'+this.filldetails.folio;				
				axios.get(urlkeeps).then(response=>{
					this.detailsdata= response.data
				}).catch(error =>{						
					console.log(error.response.data.message);
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

	