<?php

require_once('connect.php');

///gather the form content
$subject = $_POST['subject'];
$name = $_POST['name'];
$email = $_POST['email'];
$msg = $_POST['message'];

$errors = [];

//validate and clean these values

$subject = trim($subject);
$name = trim($name);
$email = trim($email);
$msg = trim($msg);

if(empty($subject)) {
    $errors['subject'] = 'Please include a subject!';
}

if(empty($name)) {
    $errors['name'] = 'Please include your name';
}

if(empty($msg)) {
    $errors['message'] = 'Message field cant be empty';
}

if(empty($email)) {
    $errors['email'] = 'You must provide an email address';
} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['legit_email'] = 'Please try again.';
}

if(empty($errors)) {

    //insert these values as a new row in the contacts table

    $query = "INSERT INTO contacts (subject, name, email, message) VALUES('.$subject.','.$name.','.$email.','.$msg.')";

    if(mysqli_query($connect, $query)) {

//format and send these values in an email

$to = 'nikolai@meijers.ca';
$subject = 'Portfolio (!)';

$message = "You have received a new contact form submission:\n\n";
$message .= "Name: ".$name."\n";
$message .= "Email: ".$email."\n\n";
//build out rest of message body...

mail($to,$subject,$message);

header('Location: index.php');

}else{
    for($i=0; $i < count($errors); $i++) {
        echo $errors[$i].'<br>';
    }
}

}

?>