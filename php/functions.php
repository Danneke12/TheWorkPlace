<?php
/**
 * Created by PhpStorm.
 * User: d.vorstenbosch
 * Date: 9-1-2017
 * Time: 08:39
 */

function replace_dashes($string) {
       $string = str_replace(",", "<br>&#9746; ", $string);
       return $string;
}
function replace_tf($string) {
       $string = str_replace("false", "&#9744;", $string);
       $string = str_replace("true", "&#9745;", $string);
       return $string;
}
function replace_name($string) {
       $string = str_replace("PRE", "Pre-Install", $string);
       return $string;
}
function info(){
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "itsup";
    $con = new mysqli($host, $username, $password, $database);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    if (!isset($_GET['ID'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM `preinstall` WHERE `preinstall`.`id` = $id";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $type = replace_name($row['info_type']);
                echo "<div id='informatie'>";
                echo "<h2>Informatie</h2>";
                echo "<info>Type: " . $type . "</info><br>";
                echo "<info>Status: " . $row['info_status'] . "</info><br>";
                echo "<info>Werkbank: " . $row['info_werkbank'] . "</info><br>";
                echo "</div>";
            }
        }
    }
}
function view_pre()
{

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "itsup";
    $con = new mysqli($host, $username, $password, $database);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    if (!isset($_GET['ID'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM `preinstall` WHERE `preinstall`.`id` = $id";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $software = replace_dashes($row['pre_software']);
                $checkupdates = replace_tf($row['check_updates']);
                $checkdrivers = replace_tf($row['check_driver']);
                $checksoftware = replace_tf($row['check_software']);
                $checkoffice = replace_tf($row['check_office']);
                $checkwakeonlan = replace_tf($row['check_wakeonlan']);
                $checktijd = replace_tf($row['check_tijd']);
                echo "<div id='klant_info' class='row'>";
                echo "<h2>Klant Gegevens</h2>";
                echo "<div class='klant_info_1 col-md-6' >Klant naam: " . $row['klant_naam']."<br>";
                echo "Klant contact: " . $row['klant_contact']."<br>";
                echo "Klant telefoon: " . $row['klant_telefoon']."</div>";
                echo "<div class='klant_info_2 col-md-6'>Datum binnenkomst: " . $row['klant_binnenkomst']."<br>";
                echo "Datum uitlever: " . $row['klant_uitlever']."<br>";
                echo "Ticket nummer: " . $row['klant_ticket']."</div><br>";
                echo "</div>";
                echo "<div id='pre_info' class='row'>";
                echo "<h2>Pre-Install informatie</h2>";
                echo "<div class='col-md-6'>";
                echo "Operating System: <b>" .$row['pre_os']."</b><br>";
                echo "Software Installaties: <br>";
                echo "Extra informatie: <br>" .$row['pre_opmerk'];
                echo "</div>";
                echo "<div class='col-md-6'>";
                echo "<br>&#9746; ". $software;
                echo "</div></div>";
                echo "<div id='checklist' class='row'>";
                echo "<h2>Checklist</h2>";
                echo "<div class='checklist_opschuiven'>";
                echo $checkupdates . " PC heeft alle updates geïnstralleerd<br>";
                echo $checkdrivers . " PC heeft alle drivers geïnstralleerd<br>";
                echo $checksoftware . " PC heeft alle software zoals aangegeven hierboven<br>";
                echo $checkoffice . " Office is geactiveerd (indien geïnstralleerd)<br>";
                echo $checkwakeonlan . " Bij klant AEM agent: Wake-on-LAN aanzetten en testen<br>";
                echo $checktijd . " Tijd schrijven</div>";
                echo "</div>";

            }
        }
    }
}
function werkbank_table()
{

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "itsup";
    $con = new mysqli($host, $username, $password, $database);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql = "SELECT * FROM preinstall ORDER BY id";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<th><a href='".$row['info_type']."/view.php?id=".$row['id']."'>". $row['klant_naam'] . "</th>";
            echo "<th><a href='".$row['info_type']."/view.php?id=".$row['id']."'>" . $row['info_type'] . "</th>";
            echo "<th><a href='".$row['info_type']."/view.php?id=".$row['id']."'>" . $row['klant_ticket'] . "</th>";
            echo "<th><a href='".$row['info_type']."/view.php?id=".$row['id']."'>" . $row['info_status'] . "</th>";
            echo "<th><a href='".$row['info_type']."/view.php?id=".$row['id']."'>" . $row['info_werkbank'] . "</th></a>";
            echo "</tr>";
        }
    }

    $sql = "SELECT * FROM reparatie ORDER BY id";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<th>" . $row['klant_naam'] . "</th>";
            echo "<th>" . $row['info_type'] . "</th>";
            echo "<th>" . $row['klant_ticket'] . "</th>";
            echo "<th>" . $row['info_status'] . "</th>";
            echo "<th>" . $row['info_werkbank'] . "</th>";
            echo "</tr>";
        }
    }
}
?>