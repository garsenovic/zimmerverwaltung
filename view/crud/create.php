<?php

require 'model/class.customer.php';

if ( !empty($_POST)) {
	// keep track validation errors
	$dateError = null;
	$descriptionError = null;
	$paxError = null;
	$mailError = null;
	$prenameError = null;
	$lastnameError = null;

	$startDate = $_POST['startdate'];
	$endDate = $_POST['enddate'];
	$description = $_POST['description'];
	$pax = $_POST['pax'];
	$mail = $_POST['mail'];
	$prename = $_POST['prename'];
	$lastname = $_POST['lastname'];

	// validate input
	$valid = true;
	if (empty($startDate)) {
		$dateError = 'Please enter a Date';
		$valid = false;
	}
	if (empty($mail)) {
		$mailError = 'Please enter a E-Mail';
		$valid = false;
	}
	if (empty($prename)) {
		$prenameError = 'Please enter a Name';
		$valid = false;
	}
	if (empty($lastname)) {
		$lastnameError = 'Please enter a Name';
		$valid = false;
	}

	if (empty($description)) {
		$descriptionError = 'Please enter a description';
		$valid = false;
	}

	if (empty($pax)) {
		$paxError = 'Please enter PAX';
		$valid = false;
	}

	// insert data
	if ($valid) {
		$customer = new Customer($startDate, $endDate, $description, $pax, $mail, $prename, $lastname);
		$customer->id = $customer->create();
		//echo $customer->id;
		Database::disconnect();
		header("Location: success.php");
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link   href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="js/validate.js" type="text/javascript"></script>
	<script>
		$( function() {
			$( "#datepicker" ).datepicker();
		} );
		$( function() {
			$( "#datepicker2" ).datepicker();
		} );
	</script>
</head>

<body>
<div class="container">

	<div class="span10 offset1">
		<div class="row">
			<h3>Reservierungsanfrage</h3>
		</div>

		<form class="form-horizontal" method="post" action="create.php">
			<div class="control-group <?php echo !empty($dateError)?'error':'';?>">
				<label class="control-label">Von</label>
				<div class="controls">
					<input id="datepicker" name="startdate" type="text"  value="<?php echo !empty($startDate)?$startDate:'';?>">
					<?php if (!empty($dateError)): ?>
						<span class="help-inline"><?php echo $dateError;?></span>
					<?php endif; ?>
					<div id="datepickerinfo" class="info"></div>
					<br />
				</div>
			</div>
			<div class="control-group <?php echo !empty($dateError)?'error':'';?>">
				<label class="control-label">Bis</label>
				<div class="controls">
					<input id="datepicker2" name="enddate" type="text"  value="<?php echo !empty($endDate)?$endDate:'';?>">
					<?php if (!empty($dateError)): ?>
						<span class="help-inline"><?php echo $dateError;?></span>
					<?php endif; ?>
					<div id="datepickerinfo" class="info"></div>
					<br />
				</div>
			</div>
			<div class="control-group <?php echo !empty($nameError)?'error':'';?>">
				<label class="control-label">Vorname</label>
				<div class="controls">
					<input id="description" name="prename" type="text" value="<?php echo !empty($prename)?$prename:'';?>">
					<?php if (!empty($nameError)): ?>
						<span class="help-inline"><?php echo $nameError;?></span>
					<?php endif;?>
					<div id="descriptioninfo" class="info"></div>
					<br />
				</div>
			</div>
			<div class="control-group <?php echo !empty($nameError)?'error':'';?>">
				<label class="control-label">Nachname</label>
				<div class="controls">
					<input id="description" name="lastname" type="text" value="<?php echo !empty($lastname)?$lastname:'';?>">
					<?php if (!empty($nameError)): ?>
						<span class="help-inline"><?php echo $nameError;?></span>
					<?php endif;?>
					<div id="descriptioninfo" class="info"></div>
					<br />
				</div>
			</div>
			<div class="control-group <?php echo !empty($mailError)?'error':'';?>">
				<label class="control-label">E-Mail</label>
				<div class="controls">
					<input id="description" name="mail" type="text" value="<?php echo !empty($mail)?$mail:'';?>">
					<?php if (!empty($mailError)): ?>
						<span class="help-inline"><?php echo $mailError;?></span>
					<?php endif;?>
					<div id="descriptioninfo" class="info"></div>
					<br />
				</div>
			</div>
			<div class="control-group <?php echo !empty($descriptionError)?'error':'';?>">
				<label class="control-label">Wunsch</label>
				<div class="controls">
					<input id="description" name="description" type="text" value="<?php echo !empty($description)?$description:'';?>">
					<?php if (!empty($descriptionError)): ?>
						<span class="help-inline"><?php echo $descriptionError;?></span>
					<?php endif;?>
					<div id="descriptioninfo" class="info"></div>
					<br />
				</div>
			</div>
			<div class="control-group <?php echo !empty($paxError)?'error':'';?>">
				<label class="control-label">Anzahl der Personen</label>
				<div class="controls">
					<input id="price" name="pax" type="number" step="1" min="1" value="<?php echo !empty($pax)?$pax:'';?>">
					<?php if (!empty($paxError)): ?>
						<span class="help-inline"><?php echo $paxError;?></span>
					<?php endif;?>
					<div id="priceinfo" class="info"></div>
					<br />
				</div>
			</div>
			<!--<div class="form-actions">
                <button type="submit" class="btn btn-success">Create</button>
                <a class="btn" href="index.php">Back</a>
            </div>-->
		</form>
		<div class="form-actions">
			<button id="absenden" type="submit" class="btn btn-success">Create</button>
			<button id="zurueck" class="btn">Zurücksetzen</button>
<!--			<a class="btn" href="index.php">Back</a>-->
		</div>

	</div>

</div> <!-- /container -->
</body>
</html>