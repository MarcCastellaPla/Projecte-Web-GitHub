<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Resultats</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body class="final">
        <?php
        $nom = $_POST['nom'];
        $comptador = $_POST['comptador'];
        $puntuacio = $_POST['numanterior'];
        $percentatge = $puntuacio * 10 . '%';
        $encertat = $puntuacio;
        $fallat = 10 - $puntuacio;
        echo "
        <div class=\"percentatge\" id=\"percentatge\">
            <h2>$percentatge</h2>
            <button id=\"continuar\" style=\"margin-bottom: 1vh;\">Continuar</button>
        </div>
        <div class=\"opacidad\" id=\"resultats\">
            <h2>$nom has tret un $puntuacio</h2>
            <h3>Has <span style=\"color: chartreuse;\">encertat $encertat</span>, has <span style=\"color: red;\">fallat $fallat</span> i has trigat $comptador segons</h3>
            <img src=\"images/malament.webp\" class=\"imatgeResultat\">
        </div>
        ";?>
        <script>
            document.getElementById('continuar').addEventListener('click', function(){
                let percentatge = document.getElementById('percentatge')
                let resultats = document.getElementById('resultats')
                
                percentatge.classList.add('opacidad')
                resultats.classList.remove('opacidad')
                resultats.classList.add('resultats')
            })
            
        </script>
    </body>
</html>