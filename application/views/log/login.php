<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Authentification</title>
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
    </head>

    <body>

    <div class="form">

        <h2 align="center"> Veuillez vous connecter ou créer un compte pour réserver</h2>
            
        <?= form_open('Authentification') ?>

            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>

            <label>Nom utilisateur</label>
            <input type="text" name="login"/>
            <?= form_error('login') ?>
            <br><br>
            <label>Mot de passe</label>
            <input type="password" name="password"/>         
            <?= form_error('password') ?>
            <br><br>
            <div align="center"><input type="submit" value="Envoyer" /></div> 
            <?= form_close() ?>
            
    <br>
    
    <div align="center">
        <a href= "<?= base_url('index.php/Inscription/') ?>">
        <button>S'inscrire</button>
        </a>
    </div>
    </div>
    <!--load jQuery library-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!--load bootstrap.js-->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
