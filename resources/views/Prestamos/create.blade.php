<form method="POST" v-on:submit.prevent="crearprestamo">
  <div class="modal fade" id="create">
    <div class="modal-dialog modal-lg" style="width:90%;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
          <h2>Crear Nuevo Prestamo</h2>
        </div>
        <h5 class="font-weight-light" style="margin-left:2rem;">Cree Un Nuevo Prestamo Para Alumno, Docente O Administrativo </h5>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-3" id="col2">
                        
                <div class="form-group">
                  <label for="ctrl111">Buscar Prestatario:</label>
                  <input v-on:keyup="getctrl()" type="text" class="form-control" id="searchcontrol" placeholder="Num. de control/Num. de nomina">
                </div>
                <div style="margin-top:-18px;">
                <div v-for="control in listcontrol">
                      <button v-on:click.prevent="getselectedcontrol(control)" :value="control.control1" class="list-group-item list-group-item-action broder-1">@{{control.nombre+' '+control.apellidos}}</button>
                    </div>
                
                </div>   
                      
              <br />

              <div class="form-group">
                <label for="street1_id" class="control-label">Fecha De Inicio</label>
                <input type="text" class="form-control" id="f_inicio" name="f_inicio" value="{{$ldate = date('Y-m-d')}}" placeholder="{{$ldate = date('d-m-Y')}}" readonly>
              </div>
              <br />
              <div class="form-group">
                <label for="diasselect">Dias De prestamo</label>
                <select class="form-control button-md " name="diasselect" id="diasselect">
                  <option value="1">1 día</option>
                  <option value="2">2 días</option>
                  <option value="3">3 días</option>
                </select>
              </div>
              <br />
              <div class="modal-footer" style="text-align:center;">
                <button type="submit" class="btn btn-primary" style="background-color: #6d356c;"><i class="fa fa-save"></i> Prestar Libros</button>
              </div>

            </div>

            <div class="col-md-9" id="col1 ">
              
                <div class="form-group">
                  <label for="exampleInputEmail1">Buscar Libro:</label>
                  <input v-on:keyup="searchlibros()" type="text" class="form-control" id="codigolibro" aria-describedby="emailHelp" placeholder="Codigo de libro">
                </div>
                <div style="margin-top:-18px;">
                  <div class="listgroup" id="listabusqueda">
                    <div v-for="libro in listlibros">
                      <button v-on:click.prevent="getselectedbook(libro)" :value="libro.codigo" class="list-group-item list-group-item-action broder-1">@{{'Codigo: '+libro.Codigo+' Titulo: '+libro.Titulo}}</button>
                    </div>
                  </div>
                </div>
              



              <div class="row">

                <div v-for="card in cardlibros" class="col-md-4 col-md-4" style="margin-top:10px;">
                  <div class="thumbnail ">
                    <button v-on:click="limpiarselecteds(card)" type="button" class="close" style="margin-bottom:8px;" >
                      <span>&times;</span>
                    </button>
                    <img :src="card.imagen">
                    <div class="caption">
                      <h4 style="font-weight:bold;">@{{card.titulo}}</h4>
                      <hr>
                      <h5>Codigo Libro: @{{card.codigo}}</h5>
                      <h5>Editorial: @{{card.enombre}}</h5>
                      <h5>Autor: @{{card.nautor+' '+card.aautor}}</h5>
                      <h5>Año: @{{card.year}}</h5>
                    </div>
                  </div>
                </div>





              </div>
              <!--fincard-->






            </div>
            <!-- columna 2 -->

          </div>
        </div>
      </div>
    </div>
  </div>
</form>