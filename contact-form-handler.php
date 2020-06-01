<?php 
$errors = '';
$myemail = 'shekhar.himanshu1717@gmail.com';
if(empty($_POST['name'])  || 
   empty($_POST['batch']) || 
   empty($_POST['company']) ||
   empty($_POST['city']) ||
   empty($_POST['contact']) ||
   empty($_POST['email']) ||
   empty($_POST['feedback']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$batch = $_POST['batch']; 
$company = $_POST['company']; 
$city = $_POST['city']; 
$contact = $_POST['contact']; 
$email_address = $_POST['email']; 
$feedback = $_POST['feedback']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Contact form submission: $name";
	$email_body = "You have received a new message. ".
	" Here are the details:\n Name: $name \n Batch: $batch \n Company: $company \n City: $city \n Contact: $contact \n Email: $email_address \n Feedback: \n $feedback"; 
	
	$headers = "From: NIFFT Racing \n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	header('Location: index.html');
} 
?>
<!DOCTYPE HTML> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<?php
echo nl2br($errors);
?>


</body>
</html>