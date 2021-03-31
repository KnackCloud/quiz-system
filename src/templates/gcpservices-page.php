<?php include_once 'navi-page.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/table.css">
	<title></title>
</head>
<body>
	    <div class="table-container">
		<h1 class="heading">GCP Certifications</h1>
		<table class="table1">
			<thead>
				<tr>
					<th>S.NO</th>
					<th>Courses</th>
					<th>No of Questions</th>
					<th>Duration</th>
					<th>#</th>
				</tr>
			</thead>
			<tbody>
				<form action="test.php" method="post">				
					<tr>
						<td>1</td>
						<td>Associate Cloud Engineer</td>
						<td>65</td>
						<td>1 hour and 10 minutes</td>
						<input type="hidden" name="time" value="70">
						<input type="hidden" name="noq" value="65">
						<input type="hidden" name="tname" value="Associate Cloud Engineer">
						<td><button class="btn">Start</button></td>
					</tr>

				</form>

				
				</tbody>
		</table>
		

        <h1 class="heading">GCP Services</h1>
		<table class="table2">
			<thead>
				<tr>
					<th>S.NO</th>
					<th>Services</th>
					<th>No of Questions</th>
					<th>Duration</th>
					<th>#</th>
				</tr>
			</thead>
			<tbody>
				<form action="test.php" method="post">
				<tr>
					
						<td>1</td>
						<td>STACKDRIVER</td>
						<td>10</td>
						<td>10 minutes</td>
						<input type="hidden" name="time" value="10">
						<input type="hidden" name="noq" value="10">
						<input type="hidden" name="topicname" value="STACKDRIVER">
						<td><button class="btn">Start</button></td>
					
				</tr>
				</form>
				<form action="test.php" method="post">
				<tr>
					
						<td>2</td>
						<td>Google Kubernetes Engine (GKE)</td>
						<td>10</td>
						<td>10 minutes</td>
						<input type="hidden" name="time" value="10">
						<input type="hidden" name="noq" value="10">
						<input type="hidden" name="topicname" value="GKE">
						<td><button class="btn">Start</button></td>
					
				</tr>
				</form>
				
				<form action="test.php" method="post">
				<tr>
					
						<td>3</td>
						<td>LOAD BALANCING</td>
						<td>10</td>
						<td>10 minutes</td>

						<input type="hidden" name="topicname" value="LOAD BALANCING">
						<input type="hidden" name="noq" value="10">
						<input type="hidden" name="time" value="10">
						<td><button class="btn">Start</button></td>
					
				</tr>
				</form>
				
				
			</tbody>
		</table>
	    </div>

</body>
</html>

<script type="text/javascript" src="js/test.js"></script>