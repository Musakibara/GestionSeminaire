<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> cenad | chat</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../CSS/style5.css">
</head>
<body>
    <?php require('menu1.php'); ?>
    <div class="chat">
        <div class="button-email">
            <span>Admin@gmail.com</span>
            <a href="" class="Deconnexion_btn">Deconnexion</a>
        </div>
        <!-- message  -->
        <div class="message_box">
            <div class="message your_message">
                <span>Vous</span>
                <p>Comment ca vas ??</p>
                <p class="date"> 26-12-01 00:25:26</p>
            </div>
            <div class="message others_message">
                <span>Secre@gmail.com</span>
                <p>oui ca va merci</p>
                <p class="date"> 26-12-01 00:25:26</p>
            </div>
            <div class="message others_message">
                <span>Secre@gmail.com</span>
                <p>oui ca va merci</p>
                <p class="date"> 26-12-01 00:25:26</p>
            </div>
            <div class="message others_message">
                <span>Secre@gmail.com</span>
                <p>oui ca va merci</p>
                <p class="date"> 26-12-01 00:25:26</p>
            </div>
            <div class="message others_message">
                <span>Secre@gmail.com</span>
                <p>oui ca va merci</p>
                <p class="date"> 26-12-01 00:25:26</p>
            </div>
            <div class="message others_message">
                <span>Secre@gmail.com</span>
                <p>oui ca va merci</p>
                <p class="date"> 26-12-01 00:25:26</p>
            </div>
        </div>
         <!-- end  message  -->
        <form action="" class="send_message" method="post">
            <textarea name="message" cols="30" rows="2" placeholder="Votre message..."></textarea>
            <input type="submit" value="Envoyer" name="send">
        </form>

    </div>
</body>
</html>