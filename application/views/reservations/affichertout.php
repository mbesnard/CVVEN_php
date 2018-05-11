<head>
    <meta charset = "utf-8">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
</head>

<div class="table-title">
<h1>Liste des réservations</h1>
</div>
<?php $this->load->view('templates/bouttons'); ?>
<br><br>
<!-- affiche les résultats sous forme de tableau-->
<table class="table-fill">
<thead>
<tr> <!--1ère ligne, les titres de chaque colonne-->
        <th class="text-left">idReservation</th>
        <th class="text-left">Date reservation</th>
        <th class="text-left">Date arrivee</th>
        <th class="text-left">Date depart</th>
        <th class="text-left">Nombre de personnes</th>
        <th class="text-left">Menage fin de séjour</th>
        <th class="text-left">Pension complète</th>
        <th class="text-left">Demi-pension</th>
        <th class="text-left">Etat reservation</th>
        <th class="text-left">idClient</th>
        <th class="text-left">Valider</th>
        <th class="text-left">Modifier</th>
        <th class="text-left">Supprimer</th>
</tr>
</thead>

<?php
foreach ($reservation as $reserv): ?>
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
        <td><a href="<?= base_url('index.php/reservations') ?>"><button><img src="http://cvvenphp.22web.org/image/valider.png?i=1" width="25" height="25"></button></a></td>
        <td><a href="<?= base_url('index.php/reservations') ?>"><button><img src="http://cvvenphp.22web.org/image/modif.png?i=1" width="25" height="25"></button></a></td>
        <td><a href="<?= base_url('index.php/reservations') ?>"><button><img src="http://cvvenphp.22web.org/image/supprimer.png?i=1" width="25" height="25"></button></a></td>
 </tr>
<?php endforeach; ?>
</div>
</table>