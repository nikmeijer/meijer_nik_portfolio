<?php
ob_start(); // Start output buffering at the top

require_once('includes/connect.php');

///gather the form content
$name = $_POST['name'];
$form_subject = $_POST['subject'];
$email = $_POST['email'];
$form_message = $_POST['message'];

$errors = [];

//validate and clean these values
if(empty($name)) {
    $errors['name'] = 'Name cant be empty';
}

if(empty($form_subject)) {
    $errors['subject'] = 'Subject cant be empty';
}

if(empty($form_message)) {
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
    
    try {
        $stmt = $connect->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':subject', $form_subject);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $form_message);

        if ($stmt->execute()) {
            // Format and send these values in an email
            $to = 'n_meijer@fanshaweonline.ca';
            $email_subject = 'Message from your Portfolio site!';
            $email_body = "You have received a new contact form submission:\n\n";
            $email_body .= "Name: " . $name . "\n";
            $email_body .= "Email: " . $email . "\n";
            $email_body .= "Subject: " . $form_subject . "\n";
            $email_body .= "Message: " . $form_message . "\n";

            mail($to, $email_subject, $email_body);

            // Clear buffer and redirect
            ob_end_clean();
            header('Location: index.php?success=1#contact');
            exit;
        } else {
            ob_end_clean();
            echo "Database execution failed: " . implode(" - ", $stmt->errorInfo());
        }
    } catch (PDOException $e) {
        ob_end_clean();
        echo "Database error: " . $e->getMessage();
    }
} else {
    ob_end_clean();
    // Show validation errors
    for($i=0; $i < count($errors); $i++) {
        echo $errors[$i].'<br>';
    }
}
?>