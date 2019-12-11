
<div class="col-xs-12" style="background-color: #FFF; padding: 1rem; box-shadow: 0px 0px 5px 0px rgba(194,194,194,1); border-radius:5px;">
    <div class="row">
        <div class="col-sm-4">
            <h3 class="page-header">consultar Multas del periodo</h3>
            <div class="row">
                <div class="col-sm-6">
                    <a @click.prevent="consultarMultas" class="btn btn-primary btn-block"style="background-color: #6d356c;">consultar <i class="fa fa-search"></i></a>
                </div>
                <div class="col-sm-6">
                    <form action="{{route('printMultas')}}" target="_blank" method="GET">
                        <input type="hidden" name="inicio" :value="inicio">
                        <input type="hidden" name="fin" :value="fin">
                        <button type="submit" class="btn btn-danger btn-block">Imprimir reporte <i class="fa fa-file-pdf-o"></i></button>
                    </form>
                </div>
            </div>
            <h4 class="page-header">Concentrado</h4>
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Multas</th>
                        <th>Total acumulado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>@{{Multas.lista.length}}</td>
                        <td>$@{{Multas.total}}.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-8">
            <h3 class="page-header">Multas del periodo</h3>
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th style="padding:3px;">Folio</th>
                        <th style="padding:3px;">No. Control/Nomina</th>
                        <th style="padding:3px;">Nombre</th>
                        <th style="padding:3px;">Tipo</th>
                        <th style="padding:3px;">Fecha de prestamo</th>
                        <th style="padding:3px;">Fecha de pago</th>
                        <th style="padding:3px;">Monto</th>
                        <th style="padding:3px;">Comentarios</th>
                    </tr>
                </thead>
                <tbody v-if="Multas.lista.length == 0">
                    <tr>
                        <td colspan="8" class="text-center">Sin resultados...</td>
                    </tr>
                </tbody>
                <tbody v-else v-for="registro in Multas.lista">
                    <tr>
                        <td style="padding:3px;">@{{registro.Folio}}</td>
                        <td style="padding:3px;">@{{registro.NoControl}}</td>
                        <td style="padding:3px;">@{{registro.Nombre}} @{{registro.Apellidos}}</td>
                        <td style="padding:3px;">@{{registro.Tipo}}</td>
                        <td style="padding:3px;">@{{registro.FechaInicio}}</td>
                        <td style="padding:3px;">@{{registro.FechaPago}}</td>
                        <td style="padding:3px;">$@{{registro.Monto}}.00</td>
                        <td style="padding:3px;">@{{registro.Comentarios}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
