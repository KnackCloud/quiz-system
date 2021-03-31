<?php include_once 'config/init.php'; ?>

<?php 

	$job = new Job;

	if(isset($_SESSION['logged_in_UDR']) && $_SESSION['logged_in_UDR']){
		if(isset($_POST['tname']))
		{
			$template = new Template('templates/test-page.php');
			$template->tname = $_POST['tname'];
			$template->time = $_POST['time'];
			$template->noq = $_POST['noq'];
			echo $template;

		}
		else if(isset($_POST['topicname']))
		{
			$template = new Template('templates/test-page.php');
			$template->topicname = $_POST['topicname'];
			$template->tname = $_POST['topicname'];
			$template->time = $_POST['time'];
			$template->noq = $_POST['noq'];
			echo $template;

		}
		

		

	}
	else{
		
		$template = new Template('templates/login-page.php');
		echo $template;

	}





?>