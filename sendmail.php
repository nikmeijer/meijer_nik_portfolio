<?php

require_once('includes/connect.php');

///gather the form content
$name = $_POST['name'];
$subject = $_POST['subject'];
$email = $_POST['email'];
$message = $_POST['message'];

$errors = [];

//validate and clean these values


if(empty($name)) {
    $errors['name'] = 'Name cant be empty';
}

if(empty($subject)) {
    $errors['subject'] = 'Subject cant be empty';
}

if(empty($message)) {
    $errors['Message'] = 'Message cant be empty';
}

if(empty($email)) {
    $errors['email'] = 'You must provide an email';
} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['legit_email'] = 'You must provide a REAL email';
}

if(empty($errors)) {

    //insert these values as a new row in the contacts table

    $query = "INSERT INTO contact (name, subject, email, message) VALUES(:name, :subject, :email, :message)";

    $stmt = $connect->prepare($query);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':subject', $subject);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);

    if ($stmt->execute()) {
        // Format and send these values in an email
        $to = 'n_meijer@fanshaweonline.ca';
        $subject = 'Message from your Portfolio site!';

        $message = "You have received a new contact form submission:\n\n";
        $message .= "Name: " . $name . " " . $field . "\n";
        $message .= "Email: " . $email . "\n\n";
        // Build out the rest of the message body...

        mail($to, $subject, $message);

        header('Location: index.php');
        exit;
    } else {


    for($i=0; $i < count($errors); $i++) {
        echo $errors[$i].'<br>';
    }
}
}


?>