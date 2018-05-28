<?php
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "dube.siddhant2@gmail.com";
 
    $email_subject = "Your email subject line";
     
 
    $first_name = $_POST['first_name']; // required
 
    $last_name = $_POST['last_name']; // required
 
    $email_from = $_POST['email']; // required
 
    $telephone = $_POST['telephone']; // required
 
    $comments = $_POST['comments']; // not required
 
     
 

    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
 
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Mobile No.: ".clean_string($telephone)."\n";
 
    $email_message .= "Message: ".clean_string($comments)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
if(@mail($email_to, $email_subject, $email_message, $headers))
{
	
	?>
	<script>
	  if(!alert("Thank you for contacting us. We will be in touch with you very soon.")) document.location = '../index.php';
	</script>
	<?php

}

else
{
	
	?>
	<script>
	  if(!alert("Error")) document.location = '../index.php';
	</script>
	<?php

} 



}
 
?>