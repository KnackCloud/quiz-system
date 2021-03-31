<?php include_once 'config/init.php'; ?>

<?php 
	require('WriteHTML.php');
	$job = new Job;
	use PHPMailer\PHPMailer\PHPMailer;
	require_once 'PHPMailer-master/src/PHPMailer.php';
	require_once 'PHPMailer-master/src/SMTP.php';
	require_once 'PHPMailer-master/src/Exception.php';

	if(isset($_SESSION['logged_in_UDR']) && $_SESSION['logged_in_UDR']){
		if(isset($_POST['data']))
		{
			$template = new Template('templates/result-page.php');
			$data = array();
			$data['user_email'] = $_SESSION['email'];
			$data['score'] = $_POST['data'];
			$data['test_name'] = $_POST['test_name'];
			$score = $job->findScore($data); 
			
			if($score!=-1 && $score < $_POST['data'])
			{
				$job->updateScore($data);
			}
			else if($score==-1)
			{
				$job->enterScore($data);
			}

			$job->enterIntoHistory($data);

			$temp = $_POST['data'];
			$template->score = round(($temp/$_POST['limit'])*100);
			$template->total = $_POST['limit'];
			$template->uans = $_POST['uans'];
			$min = $_POST['min'];
			$template->min = $min;
			$sec = $_POST['sec'];
			$template->sec = $sec;
			$s = round(($temp/$_POST['limit'])*100);
			$template->correct = $temp;
			$template->wrong = $_POST['limit']-$temp;
			$v = $_POST['limit']-$temp;
			$template->qanda = $_POST['qna'];
			$qd = $_POST['qna'];
			$t = $_POST['qna'];
			$filename = md5(rand()).'.pdf';
			
			ob_start();
			$pdf=new PDF_HTML();
			$pdf->AddPage();
			$pdf->SetFont('Arial');
		
			$i=1;
			// '
			// 	<h1> Your have scored '.$s.' %</h1>
			// 	<h3>Correct : '. $temp .'</h3>
			// 	<h3>Wrong : '.$v.'</h3>

				
			// 	'.
			$pdf->WriteHTML('<h1>Your have scored '.$s.'%</h1><br><h1>Total No Of Questions:'.$_POST['limit'].'</h1><br><h3>Correct : '. $temp .'</h3><br><h3>Wrong : '.$v.'</h3><br>');
			$i=1;
			foreach($t as $q){
				 
				 $pdf->WriteHTML('<h1>Question '.$i.':'.$q[1].'</h1><br><h3>A. '.$q[2].'</h3><br><h3>B. '.$q[3].'</h3><br><h3>C. '.$q[4].'</h3><br><h3>D. '.$q[5].'</h3><br><h3>Answer: '.$q[6].'</h3><br><h3>Description: '.$q[7].'</h3><br><br>');
				 $i++;
							
				
			}
			
			$pdf->Output('F','./uploads/'.$filename);
			ob_end_flush(); 
			$sender = 'udr.notification@gmail.com';
				$senderName = 'UDR';

		
				$recipient = $_SESSION['email'];

		
				$usernameSmtp = 'AKIAZWST5PMD2WDJUPEX';

		
				$passwordSmtp = 'BGbAuYWH6MSOBzQE21x18y7AEGxlHDY4RF+HB/Yyl2vz';

				$host = 'email-smtp.us-east-1.amazonaws.com';
				$port = 587;


				$subject = 'Your Test Report!';



				$bodyHtml = '<h1>Please find the attached Report.</h1>';

				$mail = new PHPMailer(true);

				try {

		    		$mail->isSMTP();
		    		$mail->setFrom($sender, $senderName);
		    		$mail->Username   = $usernameSmtp;
		    		$mail->Password   = $passwordSmtp;
		    		$mail->Host       = $host;
		    		$mail->Port       = $port;
		    		$mail->SMTPAuth   = true;
		    		$mail->SMTPSecure = 'tls';

		    		$mail->addAddress($recipient);
		    		// $mail->addAttachment("uploads/".$filename);
		    		$mail->isHTML(true);
		    		$mail->Subject    = $subject;
		    		$mail->Body       = $bodyHtml;
		    		
		    		// $mail->Send();
		    		unlink("uploads/" . $filename);
		    		echo $template;
				} catch (phpmailerException $e) {
		    		echo "An error occurred. {$e->errorMessage()}", PHP_EOL; 
				} catch (Exception $e) {
		    		echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; 
				}

		}
		else 
		{
			reDirect('index.php','Something went wrong','error');
		}

		

	}
	else{
		
		$template = new Template('templates/login-page.php');
		echo $template;

	}





?>