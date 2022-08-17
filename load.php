<link rel="stylesheet" href="style.css">
<?php

    $month = htmlspecialchars($_POST["month"]);
    $year = htmlspecialchars($_POST["year"]);
    $day = htmlspecialchars($_POST["dayH"]);

    $servername = "localhost";
    $username = "klimma";
    $password = "Synology123.";
    $dbname = "EGDM";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $mindate = $year."-".$month."-01";
    $maxdate = $year."-".$month."-".$day;
    $sql = "SELECT * FROM Hodiny WHERE Datum BETWEEN '" . $mindate . "' AND '" . $maxdate . "' ORDER BY Datum" ;
    

    
    

    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        echo '<table id="table">';
        echo "<tr>";
        echo " <td> Pohotovost </td> <td> Datum </td> <td> OD </td> <td> DO </td> <td> Hodiny </td> <td> přesčas </td> <td> Místo </td>  </tr>";
        while($row = $result->fetch_assoc()) {
            //echo "id: " . $row["ID"]. " - Name: " . $row["Name"]. "<br>";
            echo "<tr> <td>". $row["Pohotovost"]. "</td> <td>". $row["Datum"]. "</td> <td>". $row["od"]. "</td> <td>". $row["do"]. "</td> <td>". $row["hodiny"]. "</td> <td>". $row["prescas"]. "</td>  <td>". $row["lokace"]. "</td>  </tr> ";
        }
        echo "</table>";
    } 
    
    else {
        echo "0 results";
    }
    $conn->close();


    //echo "TEST";

?>