<?php include_once 'config/init.php'; ?>

<?php
	$job = new Job;
	$template = new Template('templates/signup-page.php');
	require 'vendor/autoload.php';
	use Aws\Ses\SesClient;
	use Aws\Exception\AwsException;
	
	
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
				

			    $SesClient = new SesClient([
                'version' => '2010-12-01',
                'region'  => 'us-east-1'
            ]);

        
$sender_email = 'udr.notification@gmail.com';

$recipient_emails = [strval($data['email'])];


$subject = 'Welcome to KnackCloud!';
$plaintext_body = '' ;
$html_body =  '<h1>Welcome to KnackCloud!</h1><p>please feel free to explore features of KnackCloud</p>';
$char_set = 'UTF-8';

try {
$result = $SesClient->sendEmail([
'Destination' => [
    'ToAddresses' => $recipient_emails,
],
'ReplyToAddresses' => [$sender_email],
'Source' => $sender_email,
'Message' => [
  'Body' => [
      'Html' => [
          'Charset' => $char_set,
          'Data' => $html_body,
      ],
      'Text' => [
          'Charset' => $char_set,
          'Data' => $plaintext_body,
      ],
  ],
  'Subject' => [
      'Charset' => $char_set,
      'Data' => $subject,
  ],
],

]);
$messageId = $result['MessageId'];
echo("Email sent! Message ID: $messageId"."\n");
} catch (AwsException $e) {
// output error message if fails
echo $e->getMessage();
echo("The email was not sent. Error message: ".$e->getAwsErrorMessage()."\n");
echo "\n";
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
