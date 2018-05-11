<!DOCTYPE html> 
<html>
    <head> 
        <meta charset = "utf-8"> 
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
        <title>Bienvenue à CVVEN</title>
    </head>
    
    <style>
        *{padding: 0; margin: 0;}
        #toureiffel{background-image: url('http://cvvenphp.22web.org/image/toureiffel.jpg?i=1'); background-repeat: no-repeat; background-size: cover; width: 100%; position: fixed; height: 100%;}
    </style>
    
    <body>        
    
        <div id="toureiffel" align="center">
            <h1 style="color:black;" align="center">Bienvenue sur le site CVVEN </h1>
            <br>
            <a href= "<?= base_url('index.php/Authentification') ?>"><button>Se connecter</button></a>  
        </div>

</body>

</html>