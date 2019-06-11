<?php

require_once 'vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('74.125.130.108 smtp.gmail.com', 465))
    ->setUsername('manoa9438@gmail.com')
    ->setPassword('mbr39912072')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
    ->setFrom(['manoa9438@gmail.com' => 'Manoa Brugger'])
    ->setTo('manoa9438@gmail.com' )
    ->setBody('Here is the message itself')
;

// Send the message
$result = $mailer->send($message);

var_dump ($result);

