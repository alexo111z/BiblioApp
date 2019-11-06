<form method="POST" v-on:submit.prevent="createkeep">
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

              <div class="form-group group control">
                <label for="full_name_id" class="control-label">Numero De Control</label>
                <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="Num. de control/Num. de nomina">
              </div>
              <br />

              <div class="form-group">
                <label for="street1_id" class="control-label">Fecha De Inicio</label>
                <input type="text" class="form-control" id="f_inicio" name="street1" value="{{$ldate = date('d-m-Y')}}" placeholder="{{$ldate = date('d-m-Y')}}" readonly>
              </div>
              <br />
              <div class="form-group">
                <label for="diasselect">Dias De prestamo</label>
                <select class="form-control button-md " name="diasselect">
                  <option value="1">1 día</option>
                  <option value="2">2 días</option>
                  <option value="3">3 días</option>
                </select>
              </div>
              <br />
              <div class="wrapper " style="text-align:center ">
                <button type="submit " class="btn btn-primary ">Prestar Libros</button>
              </div>

            </div>

            <div class="col-md-9" id="col1 ">
              <form>
                <div class="form-group">
                  <label for="exampleInputEmail1">Buscar Libro:</label>
                  <input type="text" class="form-control" id="codigolibro" aria-describedby="emailHelp" placeholder="Codigo de libro">
                </div>
              </form>

            

<div class="row">

  <div class="col-md-4 col-md-4">
    <div class="thumbnail "> 
    <button type="button" class="close" style="margin-bottom:8px;" onclick="alert('¿Desea Quitar Libro?')">
            <span>&times;</span>
          </button>     
      <img src="https://images-na.ssl-images-amazon.com/images/I/81LeWXJMmIL.jpg" alt="...">
      <div class="caption">
        <h4 style="font-weight:bold;">50 Sombras De Grey</h4>
        <hr>
        <h5>Codigo Libro: 144453454</h5>
        <h5>Editorial: Purrua</h5>
        <h5>Autor: john Green</h5>
        <h5>Año: 1997</h5>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-md-4">
    <div class="thumbnail ">
    <button type="button" class="close" style="margin-bottom:8px;" onclick="alert('¿Desea Quitar Libro?')">
            <span>&times;</span>
          </button>       
      <img src="https://www.rollingstone.com/wp-content/uploads/2019/10/Alaska.jpg?resize=900,600&w=450" alt="...">
      <div class="caption">
        <h4 style="font-weight:bold;">Los Amigos Magicos</h4>
        <hr>
        <h5>Codigo Libro: 144453454</h5>
        <h5>Editorial: Purrua</h5>
        <h5>Autor: john Green</h5>
        <h5>Año: 1997</h5>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-md-4">
    <div class="thumbnail">
    <button type="button" class="close" style="margin-bottom:8px;" onclick="alert('¿Desea Quitar Libro?')">
            <span>&times;</span>
          </button>       
      <img src="https://images-na.ssl-images-amazon.com/images/I/71iR7BPeGHL.jpg" alt="...">
      <div class="caption">
        <h4 style="font-weight:bold;">Raza Vaga Locochona</h4>
        <hr>
        <h5>Codigo Libro: 144453454</h5>
        <h5>Editorial: Purrua</h5>
        <h5>Autor: john Green</h5>
        <h5>Año: 1997</h5>
      </div>
    </div>
  </div>



</div><!--fincard-->






              </div>
              <!-- columna 2 -->

            </div>
          </div>
        </div>
      </div>
    </div>
</form>