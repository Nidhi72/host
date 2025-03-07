<?php
if (isset($_POST['submit'])) {
   //getting user data
   $firstName = $_POST['firstname'];
   $lastName = $_POST['lastname'];
   $fromEmail = $_POST['email'];
   $phone = $_POST['tel'];
   $message = $_POST['message'];

   //Recipient email, Replace with your email Address
   $mailTo = 'sales@al-ustaz.com';

   //email subject
   $subject = ' General Inquiry From ' . $firstName;

   //email message body
   $htmlContent = '<h2> General Inquiry </h2>
<p> <b>Name: </b> ' . $firstName . " " . $lastName . '</p>
<p> <b>Email: </b> ' . $fromEmail . '</p>
<p> <b>Phone Number: </b> ' . $phone . '</p>
<p> <b>Message: </b> ' . $message . '</p>';

   //header for sender info
   $headers = "From: " . $firstName . "<" . $fromEmail . ">";
   $headers .= "MIME-Version: 1.0\r\n";
   $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

   //PHP mailer function
   $result = mail($mailTo, $subject, $htmlContent, $headers);

   //error checking
   if ($result) {
      $script = "<script>
window.location = 'https://www.wsarabia.com/thankyou.html';</script>";
      echo $script;
   } else {
      $failed = "Error: Message was not sent, Try again Later";
   }
}
?>