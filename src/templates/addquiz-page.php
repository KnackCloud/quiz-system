<?php include 'adminnavi-page.php'; ?>
<link rel="stylesheet" href="css/style.css">

<h2 style="margin-left: 600px;"><?php displayMessage(); ?></h2>
  <div class="wrapper">
  		
      <div class="addquiz">
      	
       <div class="content">
       <form method="post" action="readfile.php" enctype="multipart/form-data">
	   <label for="csp"><b>CSP</b></label><br />
	   <select id="csp" name="csp"><br>
		   <option value="aws">AWS</option>
		   <option value="gcp">GCP</option>
	   </select><br><br>

	   	
	    <label for="fileupload"></label><br>
		<input type="file" name="fname" required /><br><br><br><br>
		<input class="btn-next" type="submit" name="file_submit" value="Import" /><br>
        </form>
	 	
	
</div>
</div>
</div>

