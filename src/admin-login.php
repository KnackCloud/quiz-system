<?php include_once 'config/init.php'; ?>

<?php 
	$job = new Job;

	if(isset($_POST['admin-submit']))
	{
		$data = array();
		$data['email'] = $_POST['email'];
		$data['password'] = md5(trim($_POST['password']));
		if($job->authAdmin($data))
		{
			$_SESSION['logged_in_UDR'] = true;
			$template = new Template('adminhome.php');
			echo $template;
		}
		else reDirect('login.php','Incorrect login details','error');

	}
	else if(isset($_GET['home']) && $_SESSION['logged_in_UDR'] )
	{
		$template = new Template('templates/adminnavi-page.php');
		echo $template;
	}
	else
	{
		$template = new Template('templates/admin-login-page.php');
		echo $template;

	}



?>