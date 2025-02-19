<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin | Ver Paciente</title>
    <link rel="shortcut icon" href="../../images/logo.jpg" type="image/x-icon">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
	<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
	<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
	<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
	<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/plugins.css">
	<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
</head>

<body>
	<div id="app">
		<?php include('include/sidebar.php'); ?>
		<div class="app-content">
			<?php include('include/header.php'); ?>
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle" style="color: #2dc3cc;font-weight: 600">Admin | Ver Paciente</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Admin</span>
								</li>
								<li class="active">
									<span>Ver Paciente</span>
								</li>
							</ol>
						</div>
					</section>
					<div class="container-fluid container-fullw bg-white">
                        <form role="form" method="post" name="search" action="administrar-paciente.php" class="formulariob">


                            <input type="submit" name="search" id="submit" class="btn btn-success" value="Regresar">

                        </form>
						<div class="row">
							<div class="col-md-12">

								<?php
								if (isset($_POST['search'])) {

									$sdata = $_POST['searchdata'];
								?>
									<h4 align="center" style="color: #2dc3cc">Resultados para la busqueda "<?php echo $sdata; ?>" Palabra Clave</h4>
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">#</th>
                                                <th>DNI Paciente</th>
												<th>Nombre Paciente</th>
												<th>Telefono Paciente</th>
												<th>Sexo Paciente </th>
												<th>Fecha Creacion </th>

												<th>Acción</th>
											</tr>
										</thead>
										<tbody>
											<?php

											$sql = mysqli_query($con, "select * from tblpatient where PatientName like '%$sdata%'|| PatientContno like '%$sdata%'");
											$num = mysqli_num_rows($sql);
											if ($num > 0) {
												$cnt = 1;
												while ($row = mysqli_fetch_array($sql)) {
											?>
													<tr>
														<td class="center"><?php echo $cnt; ?>.</td>
														<td class="hidden-xs"><?php echo $row['dnipaciente']; ?></td>
                                                        <td><?php echo $row['PatientName']; ?></td>
														<td><?php echo $row['PatientContno']; ?></td>
														<td><?php echo $row['PatientGender']; ?></td>
														<td><?php echo $row['CreationDate']; ?></td>

														</td>
														<td>

															<a href="view-patient.php?viewid=<?php echo $row['ID']; ?>"><i class="fa fa-eye"></i></a>
                                                            <a href="manage-doctors.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('Esta seguro de que desea eliminar al paciente?')" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-trash fa fa-white"></i></a>
														</td>
													</tr>
												<?php
													$cnt = $cnt + 1;
												}
											} else { ?>
												<tr>
													<td colspan="8"> No se encontro ningun registro en la Busqueda</td>

												</tr>

										<?php }
										} ?></tbody>
									</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div>
		<!-- start: FOOTER -->
		<?php include('include/footer.php'); ?>
		<!-- end: FOOTER -->

		<!-- start: SETTINGS -->
		<?php include('include/setting.php'); ?>

		<!-- end: SETTINGS -->
	</div>
	<!-- start: MAIN JAVASCRIPTS -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/modernizr/modernizr.js"></script>
	<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="vendor/switchery/switchery.min.js"></script>
	<!-- end: MAIN JAVASCRIPTS -->
	<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
	<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
	<script src="vendor/autosize/autosize.min.js"></script>
	<script src="vendor/selectFx/classie.js"></script>
	<script src="vendor/selectFx/selectFx.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
	<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<!-- start: CLIP-TWO JAVASCRIPTS -->
	<script src="assets/js/main.js"></script>
	<!-- start: JavaScript Event Handlers for this page -->
	<script src="assets/js/form-elements.js"></script>
	<script>
		jQuery(document).ready(function() {
			Main.init();
			FormElements.init();
		});
	</script>
	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>