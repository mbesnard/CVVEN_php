<head>
    <meta charset = "utf-8">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
    <title>Configuration</title>
    <script>
        function reload() {
            var select = document.getElementById('selectResa').value;
            document.getElementById('username').value = select;
        }

        function deleteUser() {
            alert('Vous etes sur ?');
            var select = document.getElementById('selectResa').value;
            const req = new XMLHttpRequest();
            req.open('POST', 'user/deleteUser', false);
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            req.send("loginUser="+select);
            if (req.status === 200) {
                console.log("Réponse reçue: %s", req.responseText);
                location.reload(); 
            } else {
                console.log("Status de la réponse: %d (%s)", req.status, req.statusText);
            }
        }

    </script>

</head>

<h2 align="center"> Configuration </h2>  
<?php $this->load->view('templates/bouttons'); ?>

<br><br>

<?php if ($isAdmin) { ?>
<div align="center">    
    <select id="selectResa">
        <?php
        foreach ($clients as $client) {
            if ($client->idClient == $num) {
                echo '<option value=' . $client->login . ' selected="true" >' . $client->idClient . ' - ' . $client->nom . ' - ' . $client->prenom . '</option>';
            } else {
                echo '<option value=' . $client->login . ' >' . $client->idClient . ' - ' . $client->nom . ' - ' . $client->prenom . '</option>';
            }
        }
        ?> 
    </select>
<input type="button" onclick="reload();" value="Choisir" />
</div>
<?php } ?>
    
<br><br>
    
<h3 align="center">Vous souhaitez modifier votre Login ?</h3>
<?= form_open('user') ?>
<label for="mdp">Login</label>
<input id="username" type="text" name="login" value="<?php echo $login ?>" />
<?= form_error('login') ?>
<br><br>
<div align="center"><input type="submit" value="Envoyer" /></div> 
<?= form_close() ?>
<br><br>
<div align="center"><input  type="button" onclick="deleteUser();" value="Supprimer le compte" /></div>

