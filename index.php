<?php
require_once 'vendor/autoload.php';
$error = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST) )
{
    if (empty($_POST['first-name'])){
        $error = true;
        $firstNameError = "First name is empty";
    }
    if (empty($_POST['last-name'])){
        $error = true;
        $lastNameError = "Last name is empty";
    }
    if (empty($_POST['email'])|| !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
        $error = true;
        $emailError = "Email is empty or invalid";
    }
    if (empty($_POST['your-message'])) {
        $error = true;
        $yourMessageError = "your message is empty";
    }

    if ($error === false){
        // Create the Transport
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
            ->setUsername('composer2702@gmail.com')
            ->setPassword('composer3991')
        ;

// Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

// Create a message
        $message = (new Swift_Message('Wonderful Subject'))
            ->setFrom(['composer2702@gmail.com' => 'manoa brugger'])
            ->setTo([$_POST['email'] => 'manoa brugger'])
            ->setBody('Bonjour' . $_POST[' first-name'] .' nous vous remercions de vous être abonné à la newsletter arnaque.com ')
        ;

// Send the message
        $result = $mailer->send($message);
        header ('Location: /');
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<a>
    <div class="container">
        <h3> Contactez nous!  </h3>
    </div>
    <div class="container">
        <div class="row">
            <form action="" method="POST" class="col-12">
                <div class="form-group">
                    <label for="first-name">First-Name </label>
                    <input name="first-name" <?php if(!empty($_POST['first-name'])) echo "value=".$_POST['first-name']?>  type="text" id="first-name" class="form-control <?php if (isset($firstNameError)) echo 'is-invalid'?> ">
                    <?php if(isset($firstNameError)){ ?>
                        <div class="text-danger"><?= $firstNameError ?> </div>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label for="last-name">Last-name </label>
                    <input name="last-name"  <?php if(!empty($_POST['last-name'])) echo "value=".$_POST['last-name']?> type="text" id="last-name" class="form-control <?php if (isset($lastNameError)) echo 'is-invalid'?> ">
                    <?php if(isset($lastNameError)){ ?>
                        <div class="text-danger"><?= $lastNameError ?> </div>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label for="email">Email </label>
                    <input name="email"  <?php if(!empty($_POST['email'])) echo "value=".$_POST['email']?> type="text" id="email" class="form-control <?php if (isset($emailError)) echo 'is-invalid'?> ">
                    <?php if(isset($emailError)){ ?>
                        <div class="text-danger"><?= $emailError ?> </div>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label for="your-message">Your-message</label>
                    <textarea name="your-message" id="your-message" rows="3" class="form-control <?php if (isset($yourMessageError)) echo 'is-invalid'?> "></textarea>
                    <?php if(isset($yourMessageError)){ ?>
                        <div class="text-danger"><?= $yourMessageError ?> </div>
                    <?php }?>
                </div>
                <button class="btn btn-success" type="submit">Submit form</button>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-2"><a href="https://twitter.com/?lang=fr"><img src="https://image.noelshack.com/fichiers/2019/15/3/1554902999-twitter-1.png" alt="logo.twitter" ></a></div>
            <div class="col-lg-2"><a href="https://fr-fr.facebook.com/"><img src="https://image.noelshack.com/fichiers/2019/15/3/1554903375-facebook-logo.png" alt="logo.facebook" ></a></div>
            <div class="col-lg-2"><a href="https://www.youtube.com/"><img src="https://image.noelshack.com/fichiers/2019/15/3/1554903591-youtube.png" alt="logo.youtube" ></a></div>
            <div class="col-lg-2"><a href="https://www.linkedin.com/"><img src="https://image.noelshack.com/fichiers/2019/15/3/1554903846-linkedin-big-logo.png" alt="logo.linkedin" ></a></div>
            <div class="col-lg-2"><a href="https://www.instagram.com/?hl=fr"><img src="https://image.noelshack.com/fichiers/2019/15/3/1554904043-instagram.png" alt="logo.instagram" ></a></div>
            <div class="col-lg-2"><a href="https://www.pinterest.fr/"><img src="https://image.noelshack.com/fichiers/2019/15/3/1554904814-pinterest.png" alt="logo.pinterest" ></a></div>
        </div>
    </div>
</html>



