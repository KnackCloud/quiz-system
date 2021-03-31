<?php include_once 'navi-page.php'; ?>


<link rel="stylesheet" href="css/table.css">
<div style="width: 500px; " class="table-container">
    <?php displayMessage(); ?>
</div>
<div class="table-container">
    
    <h1 class="heading">History</h1>
		<table class="table1">
			<thead>
				<tr>
					<th>Test Name</th>
					<th>User Email</th>					
					<th>Score</th>
					<th>Date and Time</th>

					
					
				</tr>
			</thead>
			<tbody>
				<?php foreach($history as $h): ?>
          		<tr>
            		
              			<td><?php echo $h->test_name ?></td>
              			<td><?php echo $h->user_email ?></td>
              			
              			<td><?php echo $h->score ?></td>
              			<td><?php echo $h->date_and_time ?></td>           	
            		
          		</tr>
        		<?php endforeach; ?>
				
			</tbody>
		</table>
		

        
  </div>

