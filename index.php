<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lettura Dati da File CSV - Pokémon</title>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: sans-serif;
        }

        table {
            margin: 20px;
            border: 2px solid #ccc;
            border-collapse: collapse; /* Mantiene i bordi puliti */
        }

        td, th {
            padding: 12px 16px;       /* Distanza identica interna in tutte le celle */
            border: 1px solid #ccc;  /* Bordi delle celle */
            text-align: center;      /* Testo centrato nelle celle */
        }
    </style>

</head>
<body>

    <?php
        $file = fopen("pokemon.csv", "r");
        if(!$file){ // Equivale a $file === false
            die("Errore nell'apertura del file");
            // die($msg) interrompe l'esecuzione dello script 
            // viene stampato a schermo il messaggio $msg
        }
        // Non mi serve avere un ramo else perchè in caso di errore
        // Lo script viene interrotto a riga 38

        echo "<table>";
        // Se il file esiste e viene aperto correttamente:
        while(!feof($file)){ // feof($file) === false
            $row = fgets($file);

            // Evita errori se alla fine del file c'è una riga vuota
            if(trim($row) === ""){
                continue;
            }

            // Uso explode con "," come separatore e $row come stringa da separare
            $element = explode(",", $row);

            // La prima colonna dell'intestazione nel file pokemon.csv è "#"
            // e le colonne totali sono 13 (da indice 0 a indice 12)
            if($element[0] === "#"){
                echo "<tr><th>" . $element[0] . "</th><th>" . $element[1] . "</th><th>" . $element[2] .
                "</th><th>" . $element[3] . "</th><th>" . $element[4] . "</th><th>" . $element[5] .
                "</th><th>" . $element[6] . "</th><th>" . $element[7] . "</th><th>" . $element[8] .
                "</th><th>" . $element[9] . "</th><th>" . $element[10] . "</th><th>" . $element[11] .
                "</th><th>" . $element[12] . "</th></tr>";
            }else{
                echo "<tr><td>" . $element[0] . "</td><td>" . $element[1] . "</td><td>" . $element[2] .
                "</td><td>" . $element[3] . "</td><td>" . $element[4] . "</td><td>" . $element[5] .
                "</td><td>" . $element[6] . "</td><td>" . $element[7] . "</td><td>" . $element[8] .
                "</td><td>" . $element[9] . "</td><td>" . $element[10] . "</td><td>" . $element[11] .
                "</td><td>" . $element[12] . "</td></tr>";
            }
        }

        echo "</table>";

        fclose($file);
    ?>
    
</body>
</html>