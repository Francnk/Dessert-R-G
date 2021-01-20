<div class="modal fade" id="edit_<?php echo $row['matricula']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">EDITAR ALUMNO</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
            <div class="container-fluid">
			<form method="POST" action="EditarRegistro.php?id=<?php echo $row['matricula']; ?>">
			
			<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:10px;">Periodo:</label>
					</div>
					<div class="col-sm-8">
						<?php
							require_once "conexion.php";
							$conexion=conexion();

									$sql="CALL Select_periodo";
									//if-else statement in executing our quersy
									// $db->exec($sql);
									$result=mysqli_query($conexion,$sql);
								
						?>
						<select id="id_periodo" class="form-control input-sm "name="id_periodo">
							
						<option value="0" name=" "><?php echo $row['periodo']; ?></option>

									<?php
										while($ver=mysqli_fetch_row($result)): 

									?>
										<option value="<?php echo $ver[0] ?>">
											<?php echo $ver[1]?>
										</option>

									<?php endwhile; ?>

						</select>
								<script type="text/javascript">
								$(document).ready(function(){
									$('#id_periodo').select();

								});
						    	</script>
					</div>
				</div>
				
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:10px;">Programa Educativo:</label>
					</div>
					<div class="col-sm-8">
						<?php
							require_once "conexion.php";
							$conexion=conexion();

									$sql="CALL Select_programa_educativo";
									//if-else statement in executing our quersy
									// $db->exec($sql);
									$result=mysqli_query($conexion,$sql);
								
						?>
						<select id="id_programa" class="form-control input-sm " name="id_programa">
							
						<option value="0"name=" "><?php echo $row['id_programa']; ?></option>

									<?php
										while($ver=mysqli_fetch_row($result)): 

									?>
										<option value="<?php echo $ver[0] ?>">
											<?php echo $ver[1]?>
										</option>

									<?php endwhile; ?>

						</select>
								<script type="text/javascript">
								$(document).ready(function(){
									$('#id_programa').select();

								});
						    	</script>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:10px;">Asignatura:</label>
					</div>
					<div class="col-sm-8">
						<?php
							require_once "conexion.php";
							$conexion=conexion();

									$sql="CALL Select_asignatura";
									//if-else statement in executing our quersy
									// $db->exec($sql);
									$result=mysqli_query($conexion,$sql);
								
						?>
						<select id="id_asignatura" class="form-control input-sm "name="id_asignatura">
							
						<option value="0"name="id_asignatura"><?php echo $row['asignatura']; ?></option>

									<?php
										while($ver=mysqli_fetch_row($result)): 

									?>
										<option value="<?php echo $ver[0] ?>">
											<?php echo $ver[1]?>
										</option>

									<?php endwhile; ?>

						</select>
								<script type="text/javascript">
								$(document).ready(function(){
									$('#id_asignatura').select();

								});
						    	</script>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:10px;">Cuatrimestre y grupo:</label>
					</div>
					<div class="col-sm-8">
						<?php
							require_once "conexion.php";
							$conexion=conexion();

									$sql="CALL Select_cuatri_grupo";
									//if-else statement in executing our quersy
									// $db->exec($sql);
									$result=mysqli_query($conexion,$sql);
								
						?>
						<select id="id_cuatri_grupo" class="form-control input-sm "name="id_cuatri_grupo">
							
						<option value="0"name="id_cuatri_grupo"><?php echo $row['id_cuatri_grupo']; ?></option>

									<?php
										while($ver=mysqli_fetch_row($result)): 

									?>
										<option value="<?php echo $ver[0] ?>">
											<?php echo $ver[0]?>
										</option>

									<?php endwhile; ?>

						</select>
								<script type="text/javascript">
								$(document).ready(function(){
									$('#id_cuatri_grupo').select();

								});
						    	</script>
					</div>
				</div>


                <div class="row form-group">
                    <div class="col-sm-3" >
						<label class="control-label" style="position:relative; top:-10px;">Matricula:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="matricula"value="<?php echo $row['matricula']; ?>">
					</div>
					<div class="col-sm-3" >
						<label class="control-label" style="position:relative; top:-10px;">Nueva Matricula:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="newid"value="<?php echo $row['matricula']; ?>">
					</div>
                    <div class="col-sm-3">
                        <label class="control-label" style="position:relative; top:7px;">Nombre:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre']; ?>">
					</div>
					<div class="col-sm-3">
                        <label class="control-label" style="position:relative; top:7px;">Contraseña:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="contrasena" value="<?php echo $row['contrasena']; ?>">
					</div>
                  
                    
                    <div class="col-sm-3">
						<label class="control-label" style="position:relative; top:10px;">Brigrada:</label>
					</div>
					<div class="col-sm-8">
						<?php
							require_once "conexion.php";
							$conexion=conexion();

									$sql="CALL Select_brigada";
									//if-else statement in executing our quersy
									// $db->exec($sql);
									$result=mysqli_query($conexion,$sql);
								
						?>
						<select id="id_brigada" class="form-control input-sm "name="id_brigada">
							
						<option value="0"name="id_brigada"><?php echo $row['id_brigada']; ?></option>

									<?php
										while($ver=mysqli_fetch_row($result)): 

									?>
										<option value="<?php echo $ver[0] ?>">
											<?php echo $ver[0]?>
										</option>

									<?php endwhile; ?>

						</select>
								<script type="text/javascript">
								$(document).ready(function(){
									$('#id_brigada').select();

								});
								</script>
								
					</div>    
                </div>
 
            </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn text-white" style="background:#5daa49" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
                <button type="submit" name="editar" class="btn btn text-white" style="background:#be1e2d"><span class="glyphicon glyphicon-check"></span>Actualizar</a>
            </form>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['matricula']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <center><h4 class="modal-title" id="myModalLabel">BORRAR ALUMNO</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">    
                <p class="text-center">¿Esta seguro de borrar la asignatura? </p>
                <h2 class="text-center"><?php echo $row['matricula'].' '.$row['nombre'].' '.$row['contrasena'].' '.$row['id_cuatri_grupo']; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn text-white" style="background:#5daa49"data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
                <a href="BorrarRegistro.php?id=<?php echo $row['matricula']; ?>" class="btn btn text-white"style="background:#be1e2d" ><span class="glyphicon glyphicon-trash"></span>Si</a>
            </div>

        </div>
    </div>
</div>