<?php
if(!isset($_GET['submit']))
{
    //This page should not be accessed directly. Need to submit the form.
    echo "error; you need to submit the form!";
}
$name = $_GET['name'];
$visitor_email = $_GET['email'];
$message = $_GET['message'];

//validate first
if(empty($name)||empty($visitor_email))
{
    echo "Name and email are mandatory!";
    exit;
}

$email_from = 'moovally@gmail.com';
$email_subject = "New Form Submission";
$email_body = "You have recieved a new message from the user $name.\n".
    "email address: $visitor_email\n".
    "Here is the message:\n $message\n";
$to = 'moovally@gmail.com';
$headers = "From: $email_from \r\n";

//send the email
mail($to,$email_subject,$email_body.$headers);
//done
header("Location: index.html");
exit;
?>