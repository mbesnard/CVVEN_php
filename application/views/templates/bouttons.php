<div id="" style="text-align: center;">
    
    <?php if ($this->session->userdata('admin')) { ?>
    <a href="<?= base_url('index.php/reservations/affichertout') ?>">
        <button>Afficher les réservations</button>
    </a>
     <?php }?>
    
   <a href="<?= base_url('index.php/reservations/afficher/'.$this->session->userdata('idClient')) ?>">
        <button>Afficher réservation</button>
    </a>
    <a href="<?= base_url('index.php/reservations/ajouter') ?>">
        <button>Ajouter réservation</button>
    </a>
    <a href= "<?= base_url('index.php/User') ?>">
        <?php if ($this->session->userdata('admin')) { ?>
            <button>Configurer les utilisateurs</button>
        <?php } else {?>
            <button>Configuration</button>
        <?php }?>
    </a>
    <a href= "<?= base_url('index.php/Password') ?>">
        <button>Changer de mot de passe</button>
    </a>  
    <a href= "<?= base_url('index.php/Authentification/logout') ?>">
        <button>Déconnexion</button>
    </a>
    
</div>
