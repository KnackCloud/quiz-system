<?php include_once 'config/init.php'; ?>

<?php 
	use PHPMailer\PHPMailer\PHPMailer;
				require_once 'PHPMailer-master/src/PHPMailer.php';
				require_once 'PHPMailer-master/src/SMTP.php';
				require_once 'PHPMailer-master/src/Exception.php';
	
	$job = new Job;
	if(isset($_POST['submit']))
	{
		$data = array();
		$data['email'] = $_POST['email'];
		$data['password'] = trim($_POST['password']);
		$data['cpassword'] = trim($_POST['cpassword']);
		
		$temp = explode('@',$data['email']);

		

 		if($job->auth($data)){
 			if(strlen($data['password'])<6)
 			{
 				reDirect("signup.php","Password must be atleast 6 characters!","error");
 			}

			
			$data['password'] = md5(trim($_POST['password']));
			$data['cpassword'] = md5(trim($_POST['cpassword']));

			if(strcmp(trim($data['password']), trim($data['cpassword'])))
			{
				reDirect("signup.php","Password doesn't match!","error");
				
			}

			

			if($job->enter_user_creds($data))
			{
				

			    $sender = 'udr.notification@gmail.com';
				$senderName = 'UDR';

		// Replace recipient@example.com with a "To" address. If your account
		// is still in the sandbox, this address must be verified.
				$recipient = $data['email'];

		// Replace smtp_username with your Amazon SES SMTP user name.
				$usernameSmtp = 'AKIA6Q7FZIZJZLYHIRXP';

		// Replace smtp_password with your Amazon SES SMTP password.
				$passwordSmtp = 'BLm7O9L66nR1Px547gPzfa7U4fsaqOtlj5ZievocYrK5';

		// Specify a configuration set. If you do not want to use a configuration
		// set, comment or remove the next line.
		// $configurationSet = 'ConfigSet';

		// If you're using Amazon SES in a region other than US West (Oregon),
		// replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP
		// endpoint in the appropriate region.
				$host = 'email-smtp.us-east-1.amazonaws.com';
				$port = 587;

		// The subject line of the email
				$subject = 'Welcome to UDR!';

		// The plain-text body of the email
				// $bodyText =  "Email Test\r\nThis email was sent through the Amazon SES SMTP interface using the PHPMailer class.";

		// The HTML-formatted body of the email
				$bodyHtml = '<h1>Welcome to UDR!</h1>
		    <p>please feel free to explore features of UDR</p>';

				$mail = new PHPMailer(true);

				try {
		    // Specify the SMTP settings.
		    		$mail->isSMTP();
		    		$mail->setFrom($sender, $senderName);
		    		$mail->Username   = $usernameSmtp;
		    		$mail->Password   = $passwordSmtp;
		    		$mail->Host       = $host;
		    		$mail->Port       = $port;
		    		$mail->SMTPAuth   = true;
		    		$mail->SMTPSecure = 'tls';
		    // $mail->addCustomHeader('X-SES-CONFIGURATION-SET', $configurationSet);

		    // Specify the message recipients.
		    		$mail->addAddress($recipient);
		    // You can also add CC, BCC, and additional To recipients here.

		    // Specify the content of the message.
		    		$mail->isHTML(true);
		    		$mail->Subject    = $subject;
		    		$mail->Body       = $bodyHtml;
		    		// $mail->AltBody    = $bodyText;
		    		$mail->Send();
		    		echo "Email sent!" , PHP_EOL;
				} catch (phpmailerException $e) {
		    		echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
				} catch (Exception $e) {
		    		echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
				}
				reDirect("index.php","Please log in to continue!","success");
			}
			else{
				reDirect('index.php','Something went wrong please try again later!','error');
			}

				
		}
		else{
			reDirect("signup.php","Entered email has registered already! please sign-in!","error");

		}
	}
	else{
		$template = new Template('templates/signup-page.php');
		echo $template;

	}
	
	


?>
