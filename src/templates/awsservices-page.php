<?php include_once 'navi-page.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/table.css">
	<title></title>
</head>
<body>
	    <div class="table-container">
		<h1 class="heading">AWS Certifications</h1>
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
					<td >AWS Developer Associate</td>
					<td >65</td>
					<td >1 hour and 10 minutes</td>
					<input type="hidden" name="tname" value="AWS Developer Associate">
					<input type="hidden" name="noq" value="65">
					<input type="hidden" name="time" value="70">
					<td><button class="btn">Start</button></td>
				</tr>
			</form>
				<!-- <tr>
					<td>2</td>
					<td>AWS Solution Architect Associate</td>
					<td>40</td>
					<td>120 minutes</td>
					<td><a href="frontpage.php" class="btn" onclick="cal(awsc,2)">Start</a></td>
				</tr> -->
				</tbody>
		</table>
		

        <h1 class="heading">AWS Services</h1>
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
						<td>Database</td>
						<td>10</td>
						<td>10 minutes</td>
						<input type="hidden" name="topicname" value="Database">
						<input type="hidden" name="noq" value="10">
						<input type="hidden" name="time" value="10">
						<td><button class="btn">Start</button></td>
					
				</tr>
				</form>
				<form action="test.php" method="post">
				<tr>
					
						<td>2</td>
						<td>Storage</td>
						<td>10</td>
						<td>10 minutes</td>
						<input type="hidden" name="topicname" value="Storage">
						<input type="hidden" name="noq" value="10">
						<input type="hidden" name="time" value="10">
						<td><button class="btn">Start</button></td>
					
				</tr>
				</form>
				<form action="test.php" method="post">
				<tr>
					
						<td>3</td>
						<td>CLoud Formation</td>
						<td>10</td>
						<td>10 minutes</td>
						<input type="hidden" name="topicname" value="CloudFormation">
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