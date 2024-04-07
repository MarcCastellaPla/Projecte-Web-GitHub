<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Preguntes futbol</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body class="preguntes">
        
        <?php
        
            $llista_preguntes = array(
                "Quin és el nom d'aquest famós futbolista?",
                "Quin va ser el primer país en guanyar el mundial?",
                "Quantes Champions te el FC Barcelona?",
                "A quin equip pertany la següent samarreta?",
                "Quin és el nom d'aquest famós futbolista?",
                "Quina ha sigut l'última selecció en guanyar el mundial?",
                "Quina és la selecció amb més mundials?",
                "Quin és el nom d'aquest famós club?",
                "Quins d'aquest jugadors han jugat o juguen actualment en el FC Barcelona?",
                "Quins d'aquests futbolistes són espanyols?"
            );

            $nom = $_POST['nom'];
            $numanterior = isset($_POST["numanterior"]) ? $_POST["numanterior"] : 0;
            $panteriors = isset($_POST["panteriors"]) ? $_POST["panteriors"] : "";
            $comptador = isset($_POST["comptadorcalcul"]) ? $_POST["comptadorcalcul"] : 0;
            $operador = isset($_POST["pregunta_cern"]) ? $_POST["pregunta_cern"] : null;

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
                $action = "pagina_final.php";
            } else {
                $action = "futbol.php";
            }
            
            
            if ($numaleatori == 0) {
                $resposta1 = "Dembélé";
                $resposta2 = "Umtiti";
                $resposta3 = "Messi";
                $resposta4 = "Griezmann";
                $correcte = $resposta2;
                $imatge = "images/umtiti.webp";
            } elseif ($numaleatori == 1) {
                $resposta1 = "Argentina";
                $resposta2 = "Uruguai";
                $resposta3 = "França";
                $resposta4 = "Brasil";
                $correcte = $resposta2;
                $imatge = "images/copa.webp";
            } elseif ($numaleatori == 2) {
                $resposta1 = "4";
                $resposta2 = "5";
                $resposta3 = "9";
                $resposta4 = "6";
                $correcte = $resposta2;
                $imatge = "images/barca.webp";
            } elseif ($numaleatori == 3) {
                $resposta1 = "Arsenal";
                $resposta2 = "Betis";
                $resposta3 = "Girona";
                $resposta4 = "Real Madrid";
                $correcte = $resposta2;
                $imatge = "images/betis.webp";
            }elseif ($numaleatori == 4) {  
                $resposta1 = "Mbappé";
                $resposta2 = "Casemiro";
                $resposta3 = "Vinicius Jr";
                $resposta4 = "Neymar";
                $correcte = $resposta1;
                $imatge = "images/mbappe.webp";
            } elseif ($numaleatori == 5) {
                $resposta1  = "Espanya";
                $resposta2 = "Argentina";
                $resposta3 = "França";
                $resposta4 = "Brasil";
                $correcte = $resposta2;
                $imatge = "images/copa.webp";
            } elseif ($numaleatori == 6) {
                $resposta1 = "Brasil";
                $resposta2 = "Alemanya";
                $resposta3 = "Argentina";
                $resposta4 = "Itàlia";
                $correcte = $resposta1;
                $imatge = "images/copa.webp";
            } elseif ($numaleatori == 7) {
                $resposta1 = "Sevilla";
                $resposta2 = "Manchester United";
                $resposta3 = "Wolves";
                $resposta4 = "Chelsea";
                $correcte = $resposta2;
                $imatge = "images/united.webp";
            } elseif ($numaleatori == 8) { // Multiples respostes
                $resposta1 = "Andrés Iniesta";
                $resposta2 = "Sergio Busquets";
                $resposta3 = "Mbappé";
                $resposta4 = "Cristiano Ronaldo";
                $correcte = $resposta1;
                $correcte2 = $resposta2;
                $imatge = "images/barca.webp";
            } elseif ($numaleatori == 9) { // Multiples respostes
                $resposta1 = "Pedri";
                $resposta2 = "Lamine Yamal";
                $resposta3 = "Messi";
                $resposta4 = "Hakimi";
                $correcte = $resposta1;
                $correcte2 = $resposta2;
                $imatge = "images/pilota.webp";
            }

            if ($numaleatori == 9 || $numaleatori == 8) {
                $tipus = "checkbox";
            } else {
                $tipus = "radio";
                $correcte2 = "false";
            }
            $pregunta = $llista_preguntes[$numaleatori];
            echo "<p id=\"puntuacio\" class=\"puntuacio\">$numanterior</p>
            <p id=\"comptador\" class=\"comptador\" value=\"$comptador\">$comptador</p>
            <h1 style=\"text-align: center;margin-top: 8vh;\">Preguntes sobre futbol</h1>";

            echo "<form method=\"post\" action=\"$action\">
            <div class=\"principal\">
            <h3 class=\"pregunta\">$pregunta</h3>
            <img src=\"$imatge\" class=\"imatge\">
            <div class=\"resposta1\">
                <div class=\"respostes\"><input type=\"$tipus\" name=\"resposta\" value=\"$resposta1\" id=\"resposta1\">$resposta1</div>
            </div>
            <div class=\"resposta2\">
                <div class=\"respostes\"><input type=\"$tipus\" name=\"resposta\" value=\"$resposta2\" id=\"resposta2\">$resposta2</div>
            </div>
            <div class=\"resposta3\">
                <div class=\"respostes\"><input type=\"$tipus\" name=\"resposta\" value=\"$resposta3\" id=\"resposta3\">$resposta3</div>
            </div>
            <div class=\"resposta4\">
                <div class=\"respostes\"><input type=\"$tipus\" name=\"resposta\" value=\"$resposta4\" id=\"resposta4\">$resposta4</div>
            </div>
            <input class=\"enviar\" type=\"submit\"  id=\"enviar\">
            <input type=\"hidden\" id=\"comptadorcalcul\" name=\"comptadorcalcul\" value=\"$comptador\">
            <input type=\"hidden\" id=\"comptador\" name=\"comptador\" value=\"$comptador\">
            <input type=\"hidden\" id=\"nom\" name=\"nom\" value=\"$nom\">
            <input type=\"hidden\" class=\"form\" id=\"numanterior\" aria-describedby=\"numanterior\" name=\"numanterior\" value=\"$numanterior\">
            <input type=\"hidden\" class=\"form\" id=\"correcte\" aria-describedby=\"correcte\" name=\"correcte\" value=\"$correcte\">
            <input type=\"hidden\" class=\"form\" id=\"correcte2\" aria-describedby=\"correcte2\" name=\"correcte2\" value=\"$correcte2\">
            <input type=\"hidden\" class=\"form\" id=\"panteriors\" aria-describedby=\"panteriors\" name=\"panteriors\" value=\"$panteriors\">
            <input type=\"hidden\" class=\"form\" id=\"pactual\" aria-describedby=\"pactual\" name=\"pactual\" value=\"$pactual\">
            </form>
            </div>";
        ?>

        <script>
            
            let comptador = document.getElementById("comptadorcalcul").value    ;
            console.log("Comptador rebut desde php")
            console.log(comptador)


            let comptadors = document.querySelectorAll(".comptador"); // Seleccionar todos los elementos con la clase "comptador"
            let imprimircomptador = document.querySelectorAll("comptador");
            console.log("Valor del comptador")
            console.log(comptador)
            let sumar = comptador
            function aumentarComptador() {
                
                sumar++;
                // Actualizar el contenido de todos los elementos con la clase "comptador"
            
                let comptador = sumar
                comptadorcalcul.value = comptador


                document.getElementById("comptador").textContent = comptador;
                
            }
            
            setInterval(aumentarComptador, 1000);

            // Fer una llista amb tots els textos de resposta, llavors fer un bucle que miri si esta chequejada la resposta que te el mateix contingut que correcte, i aixi saber si es correcte la resposta.

            var respuesta1 = document.getElementById("resposta1").value;
            var respuesta2 = document.getElementById("resposta2").value;
            var respuesta3 = document.getElementById("resposta3").value;
            var respuesta4 = document.getElementById("resposta4").value;
            let correcte = document.getElementById('correcte').value;
            let correcte2 = document.getElementById('correcte2').value;

            var listaRespuestas = [respuesta1, respuesta2, respuesta3, respuesta4];
            var llistanums = [1, 2, 3, 4]
            for (let i = 0; i < listaRespuestas.length; i++) {
                
                    if (listaRespuestas[i] == correcte){
                        let numcorrecte = llistanums[i]
                        console.log(i)
                        console.log("El numero de resposta correcte es ")
                        console.log(numcorrecte)
                        var respostacorrecte = "resposta" + numcorrecte
                        console.log("La resposta correcte es ")
                        console.log(respostacorrecte)
                    }
                }
            if (correcte2 !== "false") {
                for (let x = 0; x < listaRespuestas.length; x++) {
                
                    if (listaRespuestas[x] == correcte2){
                        let numcorrecte2 = llistanums[x]
                        console.log(x)
                        console.log("El numero de resposta correcte es ")
                        console.log(numcorrecte2)
                        var respostacorrecte2 = "resposta" + numcorrecte2
                        console.log("La resposta correcte 2 es ")
                        console.log(respostacorrecte2)
                    }

                }
            }
             // Aqui hem diu quina es la resposta correcte

             // Aqui hem diu quina es la resposta correcte
            

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
                let correcte2 = document.getElementById('correcte2').value;
                console.log(numanterior.value)
                if (numanterior.value === null || isNaN(parseInt(numanterior.value))) {
                    numanterior.value = 0;
                }
                if (isNaN(numanterior.value)) {
                    numanterior.value = 0;
                }
                console.log("el valor de correcte2")
                console.log(correcte2)
                if (correcte2 === "false") {
                    
                    if (respostacorrecte == "resposta1") {

                        if (resposta1.checked) {
                            numanterior.value = parseInt(numanterior.value) + 1; // Convertir a número y luego sumar
                        }

                    } else if (respostacorrecte == "resposta2") {

                        if (resposta2.checked) {
                            numanterior.value = parseInt(numanterior.value) + 1; // Convertir a número y luego sumar
                        }
                    } else if (respostacorrecte == "resposta3") {
                        if (resposta3.checked) {
                            numanterior.value = parseInt(numanterior.value) + 1; // Convertir a número y luego sumar
                        }
                    } else if (respostacorrecte == "resposta4") {
                        if (resposta4.checked) {
                            numanterior.value = parseInt(numanterior.value) + 1; // Convertir a número y luego sumar
                        }
                    }
                }else {

                    if (respostacorrecte == "resposta1" && respostacorrecte2 == "resposta2") {
                            if (resposta1.checked && resposta2.checked ) {
                                    numanterior.value = parseInt(numanterior.value) + 1;
                                }
                        
                    }else if (respostacorrecte == "resposta1" && respostacorrecte == "resposta3") {
                            if (resposta1.checked && resposta3.checked) {
                                    numanterior.value = parseInt(numanterior.value) + 1;
                                }
                            }
                 }
            })
        </script>
    </body>
</html>