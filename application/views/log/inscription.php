<html>
<head>
<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
<title>Création d'un compte</title>
</head>
<body>

<h1 align="center"> Création d'un compte utilisateur </h1>    

<?php echo form_open('Inscription'); ?>
    
<?php if(isset($prenom)) { echo $prenom; } ?>    
<fieldset>
	<legend> <i> Informations de connexion </i> </legend>
          
<label for="nom_user">Nom utilisateur<label>
<input type="text" name="login" value="" size="25" />
<?= form_error('login') ?>
<br>
<label for="mdp">Mot de passe</label>
<input type="text" name="password" value="" size="25" />          
<?= form_error('password') ?>
</fieldset>

    <br>   
    
<fieldset>
	<legend> <i> Informations personnelles </i> </legend>
<label for="nom_user">Nom<label>
<input type="text" name="nom" value="" size="25" />
<?= form_error('nom') ?>

<label for="mdp">Prénom</label>
<input type="text" name="prenom" value="" size="25" />          
<?= form_error('prenom') ?>

<label for="date_naiss">Date de naissance</label>
<input type="text" name="datenaissance" value="" size="25" />
<?= form_error('datenaissance') ?>

<label for="adresse">Adresse</label>
<input type="text" name="adresse" value="" size="25" />
<?= form_error('adresse') ?>

<label for="ville">Ville</label>
<input type="text" name="ville" value="" size="25" />
<?= form_error('ville') ?>

<label for="cp">Code Postal</label>
<input type="text" name="codepostal" value="" size="25" />
<?= form_error('codepostal') ?>

<label for="tel">Téléphone</label>
<input type="text" name="telephone" value="" size="25" />
<?= form_error('telephone') ?>

<label for="email">Adresse mail</label>
<input type="text" name="email" value="" size="25" />
<?= form_error('email') ?>
</fieldset>
    
    
<div align="center"><input type="submit" value="Envoyer" /></div> 

<?= form_close() ?>

</body>
</html>

