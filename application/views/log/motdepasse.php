<html>
<head>
      <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
     <title>Modification mot de passe</title>
</head>
<body>
    
<h2 align="center"> Vous souhaitez modifier votre mot de passe ? </h2>  

<?php $this->load->view('templates/bouttons'); ?>

<br><br>

<?= form_open('password') ?>

<label for="mdp">Mot de passe actuel</label>
<input type="text" name="password" />
<?= form_error('password') ?>
<br><br>
<label for="new_mdp">Nouveau mot de passe</label>
<input type="text" name="new_password" />          
<?= form_error('new_password') ?>
<br><br>
<label for="conf_mdp">Confirmation du mot de passe</label>
<input type="text" name="conf_password" value="" size="25" />          
<?= form_error('conf_password') ?>
<br><br>
<div align="center"><input type="submit" value="Envoyer" /></div> 

<?= form_close() ?>

</body>
</html>


