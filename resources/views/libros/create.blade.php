<form action="{{url('/libros')}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<label for="ISBN">{{'ISBN'}}</label>
<input type="number" name="ISBN" id="ISBN" value="">
<br/>

<label for="Titulo">{{'Titulo'}}</label>
<input type="text" name="Titulo" id="Titulo" value="">
<br/>

<label for="Autor">{{'Autor'}}</label>
<input type="number" name="Autor" id="Autor" value="">
<br/>

<label for="Editorial">{{'Editorial'}}</label>
<input type="number" name="Editorial" id="Editorial" value="">
<br/>

<label for="Carrera">{{'Carrera'}}</label>
<input type="number" name="Carrera" id="Carrera" value="">
<br/>

<label for="dewey">{{'dewey'}}</label>
<input type="number" name="dewey" id="dewey" value="">
<br/>

<label for="Edicion">{{'Edicion'}}</label>
<input type="number" name="Edicion" id="Edicion" value="">
<br/>

<label for="Year">{{'Año'}}</label>
<input type="date" name="Year" id="Year" value="">
<br/>

<label for="Volumen">{{'Volumen'}}</label>
<input type="number" name="Volumen" id="Volumen" value="">
<br/>

<label for="Ejemplares">{{'Ejemplares'}}</label>
<input type="number" name="Ejemplares" id="Ejemplares" value="">
<br/>

<label for="EjemDisponible">{{'Ejemplares Disponible'}}</label>
<input type="number" name="EjemDisponible" id="EjemDisponible" value="">
<br/>

<label for="Imagen">{{'Imagen'}}</label>
<input type="file" name="Imagen" id="Nombre" value="">
<br/>

<label for="FechaRegistro">{{'Fecha de Registro'}}</label>
<input type="date" name="FechaRegistro" id="FechaRegistro" value="">
<br/>

<input type="submit" value="Agregar">

</form>
