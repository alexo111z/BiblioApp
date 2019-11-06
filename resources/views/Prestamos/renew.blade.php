<form method="POST" v-on:submit.prevent="renewmoredays(fillrenew.folio)">
    <div class="modal fade" id="renew">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <h4 style="text-align:center">Renovar Prestamo Para</h4>
                    <h4 style="text-align:center">@{{fillrenew.nombre+' '+fillrenew.apellidos}}</h4>
                </div>
                <div class="modal-body">

                    <h4 style="text-align:center;">Fecha Actual De Vencimiento</h4>
                    <input type="text" class="form-control" v-model="fillrenew.fecha_final" readonly>
                    <br />

                    <h4 style="text-align:center;">Renovar Prestamo Por:</h4>

                    <select id="selectdays" class="form-control" style="text-align:center">
                        <option value="1">1 Día</option>
                        <option value="2">2 Días</option>
                        <option value="3">3 Días</option>
                    </select>
                    <br />

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="background-color: #6d356c;"><i class="fa fa-save"></i> Renovar Prestamo</button>
                    </div>
                </div>
            </div>
        </div>
</form>