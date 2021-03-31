<?php include_once 'config/init.php'; ?>

<?php 

  $job = new Job;

  if(isset($_SESSION['logged_in_UDR']) && $_SESSION['logged_in_UDR']){
  	if(isset($_POST['delete_user']))
  	{
  		if($job->deleteUser($_POST['user_id']))
  		{
  			reDirect('user.php','Deleted','success');
  		}
  		else
  		{
  			reDirect('user.php','Something went wrong','error');
  		}
  	}
  	else
  	{
  		$template = new Template('templates/user-page.php');
	    $template->users = $job->getAllUsers();
	    echo $template;

  	}
    

    

  }
  else{
    
    $template = new Template('templates/login-page.php');
    echo $template;

  }





?>