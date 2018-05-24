<head>
    <meta charset = "utf-8">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
    
    <script>
        function reload(){
            var select = document.getElementById('selectResa').value;
            document.location.href = "<?= base_url('index.php/reservations/afficher/') ?>"+select;
        }
    
    </script>

</head>

    <?php if ($this->session->userdata('admin')) { ?>

<h1 align="center">Liste des réservations pour un client </h1>
<?php $this->load->view('templates/bouttons'); ?>
<select id="selectResa">
    <?php foreach($clients as $client){
        if($client->idClient == $num){
            echo '<option value='.$client->idClient.' selected="true" >'.$client->idClient .' - '.$client->nom .' - '.$client->prenom.'</option>';        
        }else{
            echo '<option value='.$client->idClient.' >'.$client->idClient .' - '.$client->nom .' - '.$client->prenom.'</option>';        
        }        
    }     
    ?> 
</select>
<input type="button" onclick="reload();" value="Chercher" /> <br><br>

    <?php } else {?>

<h1 align="center">Mes Réservations </h1>
<?php $this->load->view('templates/bouttons'); ?>
    
    <?php }?>

        <br><br>
<!-- affiche les résultats sous forme de tableau-->
<table border="5">
<tr> <!--1ère ligne, les titres de chaque colonne-->
        <th>idReservation</th>
        <th>Date Reservation</th>
        <th>date Arrivee</th>
        <th>date Depart</th>
        <th>nombre de Personnes</th>
        <th>menage fin de séjour</th>
        <th>Pension Complète</th>
        <th>Demi-Pension</th>
        <th>Etat Reservation</th>
        <th>idClient</th>
        <?php if ($this->session->userdata('admin')) { ?>
        <th>Valider</th>
        <?php }?>
        <th>Modifier</th>
        <th>Supprimer</th>
</tr>

<?php foreach ($reservation as $reserv): ?>
<!-- resultats -->
        <tr>
        <td><?= $reserv->idReservation ?></td>
        <td><?= $reserv->dateReservation ?></td>
        <td><?= $reserv->dateArrivee ?></td>
        <td><?= $reserv->dateDepart ?></td>
        <td><?= $reserv->nbPersonnes ?></td>
        <td><?= $reserv->menage ?></td>
        <td><?= $reserv->pensionComplete ?></td>
        <td><?= $reserv->demiPension ?></td>
        <td><?= $reserv->etatReservation ?></td>
        <td><?= $reserv->idClient ?></td>
        <?php if ($this->session->userdata('admin')) { ?>
        <td><a href="<?= base_url('index.php/reservations') ?>"><button><img src="http://cvvenphp.22web.org/image/valider.png?i=1" width="25" height="25"></button></a></td>
        <?php }?>
        <td><a href="<?= base_url('index.php/reservations') ?>"><button><img src="http://cvvenphp.22web.org/image/modif.png?i=1" width="25" height="25"></button></a></td>
        <td><a href="<?= base_url('index.php/reservations') ?>"><button><img src="http://cvvenphp.22web.org/image/supprimer.png?i=1" width="25" height="25"></button></a></td>
 </tr>
<?php endforeach; ?>

</table>


