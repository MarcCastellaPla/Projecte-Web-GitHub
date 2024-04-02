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
                $resposta1 = "A1";
                $resposta2 = "B1";
                $resposta3 = "C1";
                $resposta4 = "D1";
            } elseif ($numaleatori == 1) {
                $resposta1 = "A2";
                $resposta2 = "B2";
                $resposta3 = "C2";
                $resposta4 = "D2";
            } elseif ($numaleatori == 2) {
                $resposta1 = "A3";
                $resposta2 = "B3";
                $resposta3 = "C3";
                $resposta4 = "D3";
            } elseif ($numaleatori == 3) {
                $resposta1 = "A4";
                $resposta2 = "B4";
                $resposta3 = "C4";
                $resposta4 = "D4";
            } elseif ($numaleatori == 4) {
                $resposta1 = "A5";
                $resposta2 = "B5";
                $resposta3 = "C5";
                $resposta4 = "D5";
            } elseif ($numaleatori == 5) {
                $resposta1  = "A6";
                $resposta2 = "B6";
                $resposta3 = "C6";
                $resposta4 = "D6";
            } elseif ($numaleatori == 6) {
                $resposta1 = "A7";
                $resposta2 = "B7";
                $resposta3 = "C7";
                $resposta4 = "D7";
            } elseif ($numaleatori == 7) {
                $resposta1 = "A8";
                $resposta2 = "B8";
                $resposta3 = "C8";
                $resposta4 = "D8";
            } elseif ($numaleatori == 8) { // Multiples respostes
                $resposta1 = "A9";
                $resposta2 = "B9";
                $resposta3 = "C9";
                $resposta4 = "D9";
            } elseif ($numaleatori == 9) { // Multiples respostes
                $resposta1 = "A10";
                $resposta2 = "B10";
                $resposta3 = "C10";
                $resposta4 = "D10";
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
                if (resposta1.checked) {
                    if (resposta1.value == correcte.value) {
                        let num = parseInt(numanterior.value);
                        if (isNaN(num)) {
                            num = 0; // Si es NaN, se iguala a 0
                        }
                        numanterior.value = num + 1;
                        // Sumar 1 a numanterior.value
                    }
                }
            } else {
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