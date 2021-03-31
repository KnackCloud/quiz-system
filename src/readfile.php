<?php 
include_once 'config/init.php';	
$job = new Job;
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

if(isset($_SESSION['logged_in_UDR']) && $_SESSION['logged_in_UDR']){



	if(isset($_FILES["fname"])){

		if(isset($_FILES["fname"]) && $_FILES["fname"]["error"] == 0){

		    $allowed = array("xlsx" => "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		    $filename = $_FILES["fname"]["name"];
		    $filetype = $_FILES["fname"]["type"];
		    $filesize = $_FILES["fname"]["size"];

	    	$filename = md5(rand()).'.xlsx';
	    // Verify MYME type of the file
	    	if(in_array($filetype, $allowed)){
	    		if(file_exists("uploads/" . $filename)){
	    			echo $filename . " is already exists.";
	    			} 
	    		else{

	            move_uploaded_file($_FILES["fname"]["tmp_name"], "uploads/" . $filename);
	            } 
	    
	    	}
	    	else{
	        // echo "Error: There was a problem uploading your file. Please try again."; 
	        reDirect('registration.php','There was a problem uploading your file. Please try again.', 'error');
	    	}
		} 
		else{
	    // echo "Error: " . $_FILES["fname"]["error"];
	    reDirect('registration.php',$_FILES["fname"]["error"], 'error');
		}

	$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

	$spreadsheet = $reader->load('./uploads/'.$filename);


	$sheetData = $spreadsheet->getActiveSheet()->toArray();


	unset($sheetData[0]);

	foreach ($sheetData as $t) {
		if(isset($t[0])){
			$data['Question'] = ($t[0] == NULL) ?'--':$t[0];
			$data['A'] = ($t[1] == NULL) ?'--':$t[1];
			$data['B'] = ($t[2] == NULL) ?'--':$t[2];
			$data['C'] = ($t[3] == NULL) ?'--':$t[3];
			$data['D'] = ($t[4] == NULL) ?'--':$t[4];
			$data['Answer'] = ($t[5] == NULL) ?'--':$t[5];
			$data['Description'] = ($t[6] == NULL) ?'--':$t[6];
			$data['Csp'] = $_POST["csp"];
			$data['Topic'] = ($t[7] == NULL) ?'--':$t[7];


			if(!$job->importQuestions($data))
			{
				reDirect('addquiz.php','Something went wrong','error');
			}
			
		}

	}
	unlink("uploads/" . $filename);
	reDirect('addquiz.php','Imported successfully','success');
	}
	else
	{
		reDirect('addquiz.php','Please choose file', 'error');
	}
}
else
{
	$template = new Template('templates/login-page.php');
	echo $template;

}





?>