<?php include_once 'config/init.php'; ?>

<?php 

  $job = new Job;

  if(isset($_SESSION['logged_in_UDR']) && $_SESSION['logged_in_UDR']){
  	if(isset($_POST['delete_all']))
  	{
      $qn_id = 0;
      $delType = 'All';
  		if($job->deleteQuestions($qn_id,$delType))
  		{
  			reDirect('removequiz.php','Deleted','success');
  		}
  		else
  		{
  			reDirect('removequiz.php','Something went wrong','error');
  		}
  	}
    else if(isset($_POST['delete_question']))
    {
      $qn_id = $_POST['qn_id'];
      $delType = '';
      if($job->deleteQuestions($qn_id,$delType))
      {
        reDirect('removequiz.php','Deleted','success');
      }
      else
      {
        reDirect('removequiz.php','Something went wrong','error');
      }
    }
  	else
  	{
  		$template = new Template('templates/awsremovequiz-page.php');
  		$template->questions = $job->getAllQuestions();
	    echo $template;

  	}
    

    

  }
  else{
    
    $template = new Template('templates/login-page.php');

    echo $template;

  }





?>