<?php include_once 'config/init.php'; ?>

<?php 

  $job = new Job;

  if(isset($_SESSION['logged_in_UDR']) && $_SESSION['logged_in_UDR']){
  	
  		$template = new Template('templates/history-page.php');
	    $template->history = $job->getHistory($_SESSION['email']);
	    echo $template;

  	
    

    

  }
  else{
    
    $template = new Template('templates/login-page.php');
    echo $template;

  }





?>