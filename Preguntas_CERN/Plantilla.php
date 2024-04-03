<!doctype html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Preguntes CERN</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.png" />
	<link rel="stylesheet" type="text/css" href="CSS_General.css" />
</head>

<body>
    <h1>Preguntes sobre el CERN</h1>
    <div class="principal">
        <?php
        // Fer una caixa de text oculta on vagi acumulant la puntuacio
        // Fer un sistema per que envii quina era la pregunta anterior i comprovi si la resposta era correcte.
        // Fer aixo mateix per guardar una llista de les preguntes que ja han sortit, per tal de no repetir-les.
            $llista_preguntes = array(
                "Com es diu l’accelerador de partícules més gran del CERN (i del món)",
                "Que signifiquen les sigles CERN?",
                "Quan va ser format el CERN?",
                "Quina particula fundamental va descubrir el CERN?",
                "A quin país està la seu principal del CERN?",
                "Quin dels següents és el nom d’un dels detectors del LHC?",
                "Quin és el propòsit principal del LHC?",
                "On s’ubica el CERN?",
                "Quins d’aquests experiments han sigut realitzats pel CERN?",
                "Quins països són membres fundadors del CERN?"
            );

            $numanterior = isset($_POST["numanterior"]) ? $_POST["numanterior"] : null;
            $panteriors = isset($_POST["panteriors"]) ? $_POST["panteriors"] : null;
            $operador = isset($_POST["pregunta_cern"]) ? $_POST["pregunta_cern"] : null;
            echo "<h1>$numanterior</h1>";
            $numaleatori = rand(0, 9);
            $lista = str_split($panteriors);
            while (in_array($numaleatori, $lista)) {
                $numaleatori = rand(0, 9); // Generar otro número aleatorio
            }
            $panteriors .= $numaleatori;
            $lista = str_split($panteriors);
            
            
            $pactual = $numaleatori;
            $pregunta = $llista_preguntes[$numaleatori];
            $completat = true;
            for ($i = 0; $i <= 9; $i++) {
                // Verificar si el número está presente en el array
                if (!in_array($i, $lista)) {
                    $completat = false;
                }
            }
            if ($completat) {
                $action = "../index.php";
            } else {
                $action = "Plantilla.php";
            }
            
            
            

            if ($numaleatori == 0) {
                $resposta1 = "ABC";
                $resposta2 = "BPA";
                $resposta3 = "LHC";
                $resposta4 = "PLC";
                $correcte = $resposta1;

            } elseif ($numaleatori == 1) {
                $resposta1 = "Organització a Europa per el Descubriment del Univers";
                $resposta2 = "Organització Europea per la Investigació Nuclear";
                $resposta3 = "Cientifics a la Recerca de Electrons Neurodivergents";
                $resposta4 = "Centre d’Estudis de la Robotica i Nanotecnología";
                $correcte = $resposta2;
            } elseif ($numaleatori == 2) {
                $resposta1 = "1954";
                $resposta2 = "1965";
                $resposta3 = "1978";
                $resposta4 = "1987";
                $correcte = $resposta1;
            } elseif ($numaleatori == 3) {
                $resposta1 = "El bosó de higgs";
                $resposta2 = "Els Quarks";
                $resposta3 = "Els Electrons";
                $resposta4 = "Els Neutrins";
                $correcte = $resposta1;
            }elseif ($numaleatori == 4) {
                
                $resposta1 = "Estats Units";
                $resposta2 = "França";
                $resposta3 = "Alemanya";
                $resposta4 = "Suïssa";
                $correcte = $resposta4;
            } elseif ($numaleatori == 5) {
                $resposta1  = "ALICE";
                $resposta2 = "STRATFOR";
                $resposta3 = "CIRN";
                $resposta4 = "URS";
                $correcte = $resposta1;

            } elseif ($numaleatori == 6) {
                $resposta1 = "Estudiar partícules subatòmiques";
                $resposta2 = "Generar energia electrica";
                $resposta3 = "Analitzar la evolució biologica";
                $resposta4 = "Investigar la radiació cosmica";
                $correcte = $resposta1;
            } elseif ($numaleatori == 7) {
                $resposta1 = "America";
                $resposta2 = "Asia";
                $resposta3 = "Europa";
                $resposta4 = "Oceania";
                $correcte = $resposta3;
            } elseif ($numaleatori == 8) { // Multiples respostes
                $resposta1 = "ATLAS";
                $resposta2 = "FINTEC";
                $resposta3 = "CMS";
                $resposta4 = "MEDIN";
                $correcte = $resposta1;
                $correcte2 = $resposta3;
            } elseif ($numaleatori == 9) { // Multiples respostes
                $resposta1 = "França";
                $resposta2 = "Alemanya";
                $resposta3 = "Estats Units";
                $resposta4 = "Grecia";
                $correcte = $resposta1;
                $correcte2 = $resposta2;
            }
            if ($numaleatori == 9 || $numaleatori == 8) {
                $tipus = "checkbox";
                $correcte2 = $resposta2;
            } else {
                $tipus = "radio";
                $correcte2 = "false";
            }
            
            $correcte = $resposta1;
            
            $pregunta = $llista_preguntes[$numaleatori];
            echo '<p class="pregunta" id="pregunta">'. $pregunta. '</p>';
        

       
        echo "
        <img src=\"imatges/LogoCERN.png\" alt=\"CERN\" class=\"imatge\">

        <div class=\"respostes\">
            <form action=\"$action\" method=\"post\">
                <div class=\"respostesadalt\">
                    <div class=\"resposta1\">
                    <label for=\"pregunta_cern\"><input type=\"$tipus\" name=\"pregunta_cern\" id=\"resposta1\" id=\"resposta1\" value=\"$resposta1\">$correcte</label>
                    </div>
                    <div class=\"resposta1\">
                        <label for=\"pregunta_cern\"><input type=\"$tipus\" name=\"pregunta_cern\" id=\"resposta2\" value=\"$resposta2\">$resposta2</label>
                        </div>
                </div>
                    <div class=\"respostesabaix\">
                        <div class=\"resposta1\">
                            <label><input type=\"$tipus\" name=\"pregunta_cern\" value=\"$resposta3\" id=\"resposta3\">$resposta3</label>
                            </div>
                            <div class=\"resposta1\">
                                <label><input type=\"$tipus\" name=\"pregunta_cern\"value=\"$resposta4\" id=\"resposta4\">$resposta4</label>
                                </div>
                            <div class=\"ocult\">
                            <input type=\"hidden\" class=\"form\" id=\"numanterior\" aria-describedby=\"numanterior\" name=\"numanterior\" value=\"$numanterior\">
                            <input type=\"hidden\" class=\"form\" id=\"correcte\" aria-describedby=\"correcte\" name=\"correcte\" value=\"$correcte\">
                            <input type=\"hidden\" class=\"form\" id=\"correcte2\" aria-describedby=\"correcte2\" name=\"correcte2\" value=\"$correcte2\">
                            <input type=\"hidden\" class=\"form\" id=\"panteriors\" aria-describedby=\"panteriors\" name=\"panteriors\" value=\"$panteriors\">
                            <input type=\"hidden\" class=\"form\" id=\"pactual\" aria-describedby=\"pactual\" name=\"pactual\" value=\"$pactual\">
                            </div>
                            </div>
                    <input type=\"submit\" value=\"Next >>\" class=\"enviar\" id=\"enviar\"/>

            </form>
        </div>
        ";

        ?>

        <script>
            // Fer una llista amb tots els textos de resposta, llavors fer un bucle que miri si esta chequejada la resposta que te el mateix contingut que correcte, i aixi saber si es correcte la resposta.

            var respuesta1 = document.getElementById("resposta1").value;
            var respuesta2 = document.getElementById("resposta2").value;
            var respuesta3 = document.getElementById("resposta3").value;
            var respuesta4 = document.getElementById("resposta4").value;
            let correcte = document.getElementById('correcte');

            var listaRespuestas = [respuesta1, respuesta2, respuesta3, respuesta4];
            for (var i = 0; i < listaRespuestas.length; i++) {
                
                if (listaRespuestas[i] == correcte.value){
                    var respostacorrecte = listaRespuestas[i]
                    console.log("La resposta correcte es ")
                    console.log(respostacorrecte)
                }
            } // Aqui hem diu quina es la resposta correcte

            let panteriors = document.getElementById("panteriors") 
            let pactual = document.getElementById("pactual");

            console.log(panteriors.value)
            
            document.getElementById('enviar').addEventListener('click', function() {
            let resposta1 = document.getElementById('resposta1');
            let resposta2 = document.getElementById('resposta2');
            let resposta3 = document.getElementById('resposta3');
            let resposta4 = document.getElementById('resposta4');
            let correcte = document.getElementById('correcte');
            let numanterior = document.getElementById('numanterior');
            let correcte2 = document.getElementById('correcte2');

            if (correcte2.value == "false") {
                if (resposta1.value == correcte.value) {
                    let num = parseInt(numanterior.value);
                    if (isNaN(num)) {
                        num = 0; // Si es NaN, se iguala a 0
                    }
                    numanterior.value = num + 1;
                    alert("Resposta correcte")
                    // Sumar 1 a numanterior.value
                }
                }
             else {
                if (resposta1.checked && resposta2.checked) { // Usa && en lugar de 'and'
                    if (resposta1.value == correcte.value && resposta2.value == correcte2.value) {
                        let num = parseInt(numanterior.value);
                        if (isNaN(num)) {
                            num = 0; // Si es NaN, se iguala a 0
                        }
                        numanterior.value = num + 1;
                        // Sumar 1 a numanterior.value
                    }
                }
            }
        });



        </script>
        
        
    </div>
</body>

</html>