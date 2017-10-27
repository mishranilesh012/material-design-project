<?php

	$date = $_POST['date'];
	$email =$_POST['email'];
	$message = $_POST['message'];
	$ran = rand();

	// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
   // $mail->SMTPDebug = 1;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'projectsample0@gmail.com';                 // SMTP username
    $mail->Password = 'sample2017';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('projectsample0@gmail.com', 'MNP-Gov');

    $mail->addAddress($email);     // Add a recipient


    $body = "<p><strong>Acknowledgement</strong>,<br><br> Date:-" . $date ."<br> Complaint ID:- ". $ran . " <br>Message:- ". $message ."</p>";

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Your Complaint has been registered';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
header('Location:response.html')
?>
