<?php include_once 'navi-page.php'; ?>


<link rel="stylesheet" href="css/table.css">
<div style="width: 500px; " class="table-container">
    <?php displayMessage(); ?>
</div>
<div class="table-container">
    
    <h1 class="heading">Leaderboard</h1>
		<table class="table1">
			<thead>
				<tr>
					<th>Test Name</th>
					<th>User Email</th>
					
					<th>Score</th>

					
					
				</tr>
			</thead>
			<tbody>
				<?php foreach($usersScores as $u): ?>
          		<tr>
            		<form action="removequiz.php" method="POST">
              			<td><?php echo $u->test_name ?></td>
              			<td><?php echo $u->user_email ?></td>
              			
              			<td><?php echo $u->score ?></td>           	
            		</form>
          		</tr>
        		<?php endforeach; ?>
				
			</tbody>
		</table>
		

        
  </div>

