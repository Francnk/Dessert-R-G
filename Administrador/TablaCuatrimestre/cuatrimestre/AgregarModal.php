<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<center><h4 class="modal-title" id="myModalLabel">AGREGAR CUATRIMESTRE</h4></center>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					
					<form id="frmAgrega" method="POST" action="AgregarNuevo.php">
					<div class="row  form-group" style=" border-bottom: 4px #E73C4E solid;">
							<div class="col-sm-4">
								<label class="control-label">Nuevo cuatrimestre:</label>
							</div>
							<div class="col-sm-8">
								<input type="text" style="position:relative; top:0px;" class="soloNumeros form-control" placeholder="Ingresa un nuevo cuatrimestre " name="cuatrimestre">
							</div>
						</div>
						<!--combo simple para traer el periodo-->
						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label" style="position:relative; top:10px;">Periodo:</label>
							</div>
							<div class="col-sm-8">
								<?php
								require_once "conexion.php";
								$conexion=conexion();

								$sql="CALL Select_periodo";

								$result=mysqli_query($conexion,$sql);

								?>
								<select id="idperiodo" class="form-control input-sm"name="idperiodo">

									<option value="0"name="">Selecciona el Periodo</option>

									<?php
									while($ver=mysqli_fetch_row($result)): 

										?>
										<option value="<?php echo $ver[0] ?>">
											<?php echo $ver[1] ?> 
											<?php echo $ver[2] ?> 
										</option>

									<?php endwhile; ?>

								</select>
							</div>
						</div>
						<!--combo simple para traer el periodo-->

						<!--combo simple para traer el programa educativo-->
						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label" style="position:relative; top:10px;">Programa.Educativo:</label>
							</div>
							<div class="col-sm-8">

								<select id="id_programa" class="form-control input-sm" name="id_programa">

								</select>

							</div>
						</div>

						<!--combo simple para traer el programa educativo-->

						<!--caja de texto para el cuatrimestre-->
						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label" style="position:relative; top:10px;">Cuatrimestre:</label>
							</div>
							<div class="col-sm-8">
								<?php
								require_once "conexion.php";
								$conexion = conexion();

								$sql = "CALL Select_cuatrimestre";

								$result = mysqli_query($conexion, $sql);

								?>
								<select id="id_cuatrimestre" class="form-control input-sm" name="id_cuatrimestre">

									<option value="0" name="">Selecciona el Cuatrimestre</option>

									<?php
									while ($ver = mysqli_fetch_row($result)) :

									?>
										<option value="<?php echo $ver[0] ?>">
											<?php echo $ver[1] ?>
										
										</option>

									<?php endwhile; ?>

								</select>
							</div>
						</div>
						<!--caja de texto para el cuatrimestre-->

<!--selectmultiple-->

						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label" style="position:relative; top:10px;">Agregar Grupos:</label>
							</div>

							<div class="col-md-8">

								<!--  <form method="" id="multiple_select_form">-->
									<?php
									require_once "conexion.php";
									$conexion=conexion();

									$sql="CALL Select_grupo";


									$result=mysqli_query($conexion,$sql);

									?>
									<select name="sele" id="sele" class="form-control selectpicker" data-live-search="true" multiple
									title="selecciona los grupos">

										<?php
										while($ver=mysqli_fetch_row($result)): 

											?>
											<option value="<?php echo $ver[0] ?>">
												<?php echo $ver[1]?>  
											</option>

										<?php endwhile; ?>
									</select>

									<br /><br />

									<input type="hidden" name="grupos" id="grupos" />
                                    <!--<input type="submit" name="submit" class="btn btn-info" value="Submit" />
    
                                     </form> -->

                                 </div>
                            </div>
<!--selectmultiple-->

</div> 
</div>



<div class="modal-footer">
	<button type="button" class="btn text-white " style="background:#be1e2d"data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>


	<button id="agregar"
	type="submit" name="agregar"class="btn text-white"style="background:#5daa49"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>




</form>
</div>

</div>
</div>
</div>
<!--agregar todo esto-->
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


<!-- ajax select multiple-->
<script>
$(document).ready(function(){
 $('.selectpicker').selectpicker();

 $('#sele').change(function(){
  $('#grupos').val($('#sele').val());
 });

 $('#frmAgrega').on('agregar', function(event){
  event.preventDefault();
  if($('#sele').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"AgregarNuevo.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     //console.log(data);
     $('#grupos').val('');

     $('.selectpicker').selectpicker('val', '');
     alert(data);
    }
   })
  }
  else
  {
   alert("selecciona por lo menos uno");
   return false;
  }
 });
});
</script>

<!--ajax select multiple-->

<!--select dinamico-->
<script type="text/javascript">
	$(document).ready(function(){
		
		$("#idperiodo").change(function(){

			$("#idperiodo option:selected").each(function(){

				idperiodo= $(this).val(); 
				$.post("getPeriodo.php",{idperiodo:idperiodo},function(data){
					$("#id_programa").html(data);

				});
			});
		});
	});
</script>
<!--select dinamico-->