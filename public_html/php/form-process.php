<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}


// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = $_POST["message"];
}

//Add your email here
$EmailTo = "Robert Gutierrez <robert@ragutierrez.com>";
$Subject = "ragutierrez.com: New Message Received";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Subject: ";
$Body .= $Subject;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

// send email
$headers = array("From: ".$name." <".$email.">",
    "Reply-To: ".$name." <".$email.">",
    "X-Mailer: PHP/" . PHP_VERSION
);
$headers = implode("\r\n", $headers);
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if (!$success) {
        $err_msg = error_get_last();
        print_r($err_msg);
    }
    if($errorMSG == ""){
        echo "Something went wrong :( ".$err_msg['message'];
    } else {
        echo $errorMSG." | ".$err_msg['message'];
    }
}

?>
