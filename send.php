<?php
    $servername = "localhost";
    $username = "klimma";
    $password = "Synology123.";
    $dbname = "EGDM";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);


    $Date = htmlspecialchars($_POST["datum"]);
    $OD = htmlspecialchars($_POST["od"]);
    $DO = htmlspecialchars($_POST["do"]);
    $Pohotovost = htmlspecialchars($_POST["pohotovost"]);
    $Stavba = htmlspecialchars($_POST["stavba"]);
    $hodiny = htmlspecialchars($_POST["hodiny"]);
    $prescas = htmlspecialchars($_POST["prescas"]);


    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "INSERT INTO Hodiny (Datum, od, do, pohotovost, lokace, hodiny, prescas) VALUES ('" . $Date . "', '" . $OD . "', '" . $DO . "', " . $Pohotovost . ", '" . $Stavba . "', '" . $hodiny . "', '" . $prescas . "')";
    

    
    

    $result = $conn->query($sql);

    if ($result) {
        echo "Success";
    } else {
        echo "Error";
        echo $conn->error;

    }
   
    $conn->close();


    //echo "TEST";

?>