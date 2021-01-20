<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4 class="modal-title" id="myModalLabel">AGREGAR ADMINSTRADOR</h4>
        </center>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <form id="frmAgrega" method="POST" action="AgregarNuevo.php">
          <div class="form-group">
									<label class="font-weight-bold">Nombre del Empleado <span class="text-danger">*</span></label>
									<input type="text" name="signupusername" id="signupusername" class="form-control " placeholder="Nombre completo" data-required>
								</div>
								<div class="form-group">
									<label class="font-weight-bold">No. Empleado <span class="text-danger">*</span></label>
									<input type="text" name="signupusermatricula" id="signupusermatricula" class="form-control "  placeholder="No. Empleado" data-required>
								</div>
								<div class="form-group">
									<label class="font-weight-bold">Email <span class="text-danger">*</span></label>
									<input type="email" name="signupemail" id="signupemail" class="form-control " placeholder="Ingresa un correo valido" data-required>
								</div>
						
								<div class="form-group">
									<label class="font-weight-bold">Contraseña <span class="text-danger">*</span></label>
									<input type="password" name="signuppassword" id="signuppassword" class="form-control " placeholder="***" data-required>
								</div>
								<div class="form-group">
									<label class="font-weight-bold">Confirmar Contraseña <span class="text-danger">*</span></label>
									<input type="password" name="signupcpassword" id="signupcpassword" class="form-control " placeholder="***" data-required>
								</div>
								<div class="form-group">
									<label><input type="checkbox" name="signupcondition" id="signupcondition" value="1" data-required> Acepto los <a href="javascript:;">Terminos &amp; Condiciones.</a></label>
								</div>

        </div>
      </div>
      <div class="modal-footer">
      <button type="submit" name="signupSubmit" id="signupSubmit" class="btn btn-block "style="background:#5daa49 " ><i class="fa-arrow-circle-o-right" ></i> Registrar</button>

        </form>
      </div>

    </div>
  </div>
</div>
<script type="text/javascript">
  $(".letras").keypress(function(key) {
    window.console.log(key.charCode)
    if ((key.charCode < 97 || key.charCode > 122) //letras mayusculas
      &&
      (key.charCode < 65 || key.charCode > 90) //letras minusculas
      &&
      (key.charCode != 45) //retroceso
      &&
      (key.charCode != 241) //ñ
      &&
      (key.charCode != 209) //Ñ
      &&
      (key.charCode != 32) //espacio
      &&
      (key.charCode != 225) //á
      &&
      (key.charCode != 233) //é
      &&
      (key.charCode != 237) //í
      &&
      (key.charCode != 243) //ó
      &&
      (key.charCode != 250) //ú
      &&
      (key.charCode != 193) //Á
      &&
      (key.charCode != 201) //É
      &&
      (key.charCode != 205) //Í
      &&
      (key.charCode != 211) //Ó
      &&
      (key.charCode != 218) //Ú

    )
      return false;
  });
</script>

<script type="text/javascript">
  // Solo permite ingresar numeros.

  function soloNumeros(e) {

    var key = window.Event ? e.which : e.keyCode

    return (key >= 48 && key <= 57)

  }
</script>