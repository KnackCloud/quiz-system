<?php include_once 'config/init.php'; ?>

<?php 
	$job = new Job;

	if(isset($_POST['submit']))
	{
		$data = array();
		$data['email'] = $_POST['email'];
		$data['password'] = md5(trim($_POST['password']));
		$res = $job->auth2($data);

 		if($res == 1){
 					
 			
	    	$_SESSION['logged_in_UDR'] = true;

 			$_SESSION['email'] = $data['email'];
 			reDirect('index.php','', '');
	    	
	    }
	    else if($res == 2){
	    	reDirect('index.php','Email or password is incorrect', 'error');
	    }
	    else if($res == 3){
	    	reDirect('index.php','Email is not registered', 'error');
	    }


	}
	



?>