<form action="{{url('/libros')}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<label for="ISBN">{{'ISBN'}}</label>
<input type="number" name="ISBN" id="ISBN" value="">
<br/>

<label for="Titulo">{{'Titulo'}}</label>
<input type="text" name="Titulo" id="Titulo" value="">
<br/>

<label for="IdAutor">{{'IdAutor'}}</label>
<input type="number" name="IdAutor" id="IdAutor" value="">
<br/>

<label for="IdEditorial">{{'IdEditorial'}}</label>
<input type="number" name="IdEditorial" id="IdEditorial" value="">
<br/>

<label for="IdCarrera">{{'IdCarrera'}}</label>
<input type="number" name="IdCarrera" id="IdCarrera" value="">
<br/>

<label for="deway">{{'deway'}}</label>
<input type="number" name="deway" id="deway" value="">
<br/>

<label for="Edicion">{{'Edicion'}}</label>
<input type="number" name="Edicion" id="Edicion" value="">
<br/>

<label for="Year">{{'Year'}}</label>
<input type="number" name="Year" id="Year" value="">
<br/>

<label for="Volumen">{{'Volumen'}}</label>
<input type="number" name="Volumen" id="Volumen" value="">
<br/>

<label for="Ejemplares">{{'Ejemplares'}}</label>
<input type="number" name="Ejemplares" id="Ejemplares" value="">
<br/>

<label for="EjemDisp">{{'EjemDisp'}}</label>
<input type="number" name="EjemDisp" id="EjemDisp" value="">
<br/>

<label for="Imagen">{{'Imagen'}}</label>
<input type="file" name="Imagen" id="Imagen" value="">
<br/>

<label for="FechaRegistro">{{'FechaRegistro'}}</label>
<input type="date" name="FechaRegistro" id="FechaRegistro" value="">
<br/>

<input type="hidden" name="Existe" id="Existe" value="1">
<br/>

<input type="submit" value="Agregar">

</form>
