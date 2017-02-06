<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    		<div class="row">
    			<h3>Liste der Anfragen</h3>
    		</div>
			<div class="row">
				<!--<p>
					<a href="create.php" class="btn btn-success">Create</a>
				</p>-->
				
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
							<th>ID</th>
		                  <th>Von</th>
		                  <th>Bis</th>
		                  <th>PAX</th>
							<th>Vorname</th>
							<th>Nachname</th>
							<th>Email</th>
							<th>Wunsch</th>
							<th>Timestamp</th>
		                  <th>Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   //include 'database.php';
					   require 'model/class.customer.php';

					  $customer = new Customer(null,null,null);
					  $getCustomerList = $customer->getList();
					  foreach ($getCustomerList as $row) {
						  echo '<tr>';
						  echo '<td>' . $row['id'] . '</td>';
						  echo '<td>' . $row['start_date'] . '</td>';
						  echo '<td>' . $row['end_date'] . '</td>';
						  echo '<td>' . $row['persons'] . '</td>';
						  echo '<td>' . $row['prename'] . '</td>';
						  echo '<td>' . $row['lastname'] . '</td>';
						  echo '<td>' . $row['email'] . '</td>';
						  echo '<td>' . $row['wunsch'] . '</td>';
						  echo '<td>' . $row['timestamp'] . '</td>';
						  echo '<td width=250>';
						  echo '<a class="btn" href="read.php?id=' . $row['id'] . '">Read</a>';
						  echo '&nbsp;';
						  echo '<a class="btn btn-success" href="update.php?id=' . $row['id'] . '">Update</a>';
						  echo '&nbsp;';
						  echo '<a class="btn btn-danger" href="delete.php?id=' . $row['id'] . '">Delete</a>';
						  echo '</td>';
						  echo '</tr>';
					  }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
    	</div>
    </div> <!-- /container -->
  </body>
</html>