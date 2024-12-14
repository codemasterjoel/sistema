<div class="content" id="page-content-wrapper">
    <div class="container card bg-white">
      <div class="section">
        <h2 class="title text-center"></h2>
        <div class="team">
            <div class="rows" style="align-content: center">
              <img src="{{asset('img/logocenso.png')}}" width="200" style="display: block; margin:auto">
            </div>
            <div class="rows">
              <div class="col-sm-3">
                <div class="form-group label-floating">
                  <label class="bmd-label-floating">CÉDULA:</label>
                  <label class="text-dark">{{ $lsb->cedula }}</label>
                </div>
              </div>
              <div class="col-sm-4">
                <table>
                  <tr>
                    <td>                      
                      <ol class="switches">
                        <li>
                          <input type="checkbox" id="estatus" name="estatus" value="1" {{ $lsb->estatus ? 'checked' : '' }} @disabled(true)>
                          <label for="estatus">
                            <span>¿EL LSB SE ENCUENTRA ACTIVO?</span>
                            <span></span>
                          </label>
                        </li>
                      </ol>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="rows">
                <div class="col-sm-5">
                  <div class="form-group">
                    <label>NOMBRES:</label>
                    <label style="margin-top: 25px" id="labelNombreCompleto" name="labelNombreCompleto" class="text-dark">{{ $lsb->NombreCompleto}}</label>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <label>FECHA DE NAC.:</label>
                    <label style="margin-top: 25px" id="labelFechaNac" name="labelFechaNac" class="text-dark">{{ $lsb->fecha_nac }}</label>
                  </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>GENERO:</label>
                        <label style="margin-top: 25px" id="labelGenero" name="labelGenero" class="text-dark">{{ $lsb->genero->nombre }} </label>
                    </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <label>TELEFONO:</label>
                    <label class="text-dark" id="telefono" name="telefono" onkeypress="$(this).mask('(0000) 000-0000')">{{ $lsb->telefono }}</label>
                  </div>
                </div>
            </div>
            <div class="rows">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>ESTADO:</label>
                    <label class="text-dark">{{ $lsb->estado->nombre }}</label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>MUNICIPIO:</label>
                    <label class="text-dark">{{ $lsb->municipio->nombre }}</label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                      <label>PARROQUIA:</label>
                      <label class="text-dark">{{ $lsb->parroquia->nombre }}</label>
                  </div>
                </div>
            </div>
            <div class="rows">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="nivelacademico">NIVEL ACADEMICO:</label>
                        <label class="text-dark">{{ $lsb->nivelAcademico->nombre }}</label>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="responsabilidad">RESPONSABILIDAD:</label>
                        <label class="text-dark">{{ $lsb->responsabilidad->nombre }}</label>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="avanzada">AVANZADA</label>
                        <label class="text-dark">{{ $lsb->avanzada->nombre }}</label>
                    </div>
                </div>
            </div>
            <div class="rows">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="correo">CORREO:</label>
                        <label class="text-dark">{{ $lsb->correo }}</label>
                    </div>
                </div>
            </div><br>
        </div>
      </div>
    </div>
</div>