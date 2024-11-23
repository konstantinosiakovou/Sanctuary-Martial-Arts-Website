<?php

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailfrom = $_POST['mail'];
    $message = $_POST['message'];


    $mailTo="sanctuarymartialarts2020@gmail.com";
    $headers = "From: ".$mailfrom; 
    $message ="You have received an e-mail from ".$name.".\n\n".$message;

mail($mailTo, $subject, $message, $headers);
header("Location: contactform.php?mailsend");

$errors = [];

if (!empty($_POST)) {
     
    if (empty($name)) {
        $errors[] = 'Name is empty';
    }

    if (empty($subject)) {
        $errors[] = 'Subject is empty';
    }
 
    if (empty($mailfrom)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($mailfrom, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }
 
    if (empty($message)) {
        $errors[] = 'Message is empty';
    }
    else {
        $errorMessage = 'Oops, something went wrong. Please try again later';
    }
 }

if (mail($mailTo, $subject, $message, $headers)) {
    echo "Mail sent.";
}
else {
    echo "Mail NOT sent, try again later";
}

}
