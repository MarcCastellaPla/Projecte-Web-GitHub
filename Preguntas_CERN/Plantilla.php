    <!doctype html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Preguntes CERN</title>
        <link rel="icon" type="image/x-icon" href="images/favicon.png" />
        <link rel="stylesheet" type="text/css" href="CSS_General.css" />
    </head>

    <body>
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

                $numanterior = isset($_POST["numanterior"]) ? $_POST["numanterior"] : 0;
                $panteriors = isset($_POST["panteriors"]) ? $_POST["panteriors"] : "";
                $operador = isset($_POST["pregunta_cern"]) ? $_POST["pregunta_cern"] : null;;
                $comptador = isset($_POST["comptadorcalcul"]) ? $_POST["comptadorcalcul"] : 0;
                
                
                $nom = $_POST['nom'];
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
                    $action = "../pagina_final.php";
                } else {
                    $action = "Plantilla.php";
                }
                
                
                

                if ($numaleatori == 0) {
                    $resposta1 = "ABC";
                    $resposta2 = "BPA";
                    $resposta3 = "LHC";
                    $resposta4 = "PLC";
                    $correcte = $resposta1;
                    $ruta = "imatges/Cern_6.jpg";

                } elseif ($numaleatori == 1) {
                    $resposta1 = "Organització a Europa per el Descubriment del Univers";
                    $resposta2 = "Organització Europea per la Investigació Nuclear";
                    $resposta3 = "Cientifics a la Recerca de Electrons Neurodivergents";
                    $resposta4 = "Centre d’Estudis de la Robotica i Nanotecnología";
                    $ruta = "imatges/Cern_5.jpg";
                    $correcte = $resposta2;
                } elseif ($numaleatori == 2) {
                    $resposta1 = "1954";
                    $resposta2 = "1965";
                    $resposta3 = "1978";
                    $resposta4 = "1987";
                    $correcte = $resposta1;
                    $ruta = "imatges/Cern_4.jpg";
                } elseif ($numaleatori == 3) {
                    $resposta1 = "El bosó de higgs";
                    $resposta2 = "Els Quarks";
                    $resposta3 = "Els Electrons";
                    $resposta4 = "Els Neutrins";
                    $correcte = $resposta1;
                    $ruta = "imatges/Cern_3.jpg";
                }elseif ($numaleatori == 4) {
                    
                    $resposta1 = "Estats Units";
                    $resposta2 = "França";
                    $resposta3 = "Alemanya";
                    $resposta4 = "Suïssa";
                    $correcte = $resposta4;
                    $ruta = "imatges/Cern_2.jpg";
                } elseif ($numaleatori == 5) {
                    $resposta1  = "ALICE";
                    $resposta2 = "STRATFOR";
                    $resposta3 = "CIRN";
                    $resposta4 = "URS";
                    $correcte = $resposta1;
                    $ruta = "imatges/Cern_1.jpg";

                } elseif ($numaleatori == 6) {
                    $resposta1 = "Estudiar partícules subatòmiques";
                    $resposta2 = "Generar energia electrica";
                    $resposta3 = "Analitzar la evolució biologica";
                    $resposta4 = "Investigar la radiació cosmica";
                    $correcte = $resposta1;
                    $ruta = "imatges/Cern_7.jpg";
                } elseif ($numaleatori == 7) {
                    $resposta1 = "America";
                    $resposta2 = "Asia";
                    $resposta3 = "Europa";
                    $resposta4 = "Oceania";
                    $correcte = $resposta3;
                    $ruta = "imatges/Cern_8.jpg";
                } elseif ($numaleatori == 8) { // Multiples respostes
                    $resposta1 = "ATLAS";
                    $resposta2 = "FINTEC";
                    $resposta3 = "CMS";
                    $resposta4 = "MEDIN";
                    $correcte = $resposta1;
                    $correcte2 = $resposta3;
                    $ruta = "imatges/Cern_9.jpg";
                } elseif ($numaleatori == 9) { // Multiples respostes
                    $resposta1 = "França";
                    $resposta2 = "Alemanya";
                    $resposta3 = "Estats Units";
                    $resposta4 = "Sudafrica";
                    $correcte = $resposta1;
                    $correcte2 = $resposta2;
                    $ruta = "imatges/LogoCERN.png";
                }
                if ($numaleatori == 9 || $numaleatori == 8) {
                    $tipus = "checkbox";
                } else {
                    $tipus = "radio";
                    $correcte2 = "false";
                }
                
                echo "
                <p id=\"puntuacio\" class=\"puntuacio\">$numanterior</p>
                <p id=\"comptador\" class=\"comptador\" value=\"$comptador\">$comptador</p>
                <h1>Preguntes sobre el CERN</h1>
                <div class=\"principal\">";
                $pregunta = $llista_preguntes[$numaleatori];
                echo '<p class="pregunta" id="pregunta">'. $pregunta. '</p>';
            

        
            echo " 
            <img src=\"$ruta\" alt=\"CERN\" class=\"imatge\">

            <div class=\"respostes\">
                <form action=\"$action\" method=\"post\">
                    <div class=\"respostesadalt\">
                        <div class=\"resposta1\">
                        <label for=\"pregunta_cern\"><input type=\"$tipus\" name=\"pregunta_cern\" id=\"resposta1\" id=\"resposta1\" value=\"$resposta1\">$resposta1</label>
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
                                <input type=\"hidden\" class=\"form\" id=\"comptador\" aria-describedby=\"comptador\" name=\"comptador\" value=\"$comptador\">
                                <input type=\"hidden\" class=\"form\" id=\"comptadorcalcul\" aria-describedby=\"comptadorcalcul\" class=\"comptador\" name=\"comptadorcalcul\" value=\"$comptador\">
                                <input type=\"hidden\" class=\"form\" id=\"numanterior\" aria-describedby=\"numanterior\" name=\"numanterior\" value=\"$numanterior\">
                                <input type=\"hidden\" class=\"form\" id=\"correcte\" aria-describedby=\"correcte\" name=\"correcte\" value=\"$correcte\">
                                <input type=\"hidden\" id=\"nom\" name=\"nom\" value=\"$nom\">
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
                
                // Obtener el valor del contador PHP del campo oculto
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

                // Tu otro código JavaScript aquí

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
            
            
        </div>
    </body>

    </html>