<?php 
session_start();
$reisID   = $_SESSION['reisID'];

require_once 'config.php'; 

$id = 0;
$update = false;
$name = ''; 
$location = '';

//Voeg een inschrijving toe
if (isset($_POST['save'])) {
    $id = $_POST['id'];
    $naam = $_POST['naam'];
    $student = $_POST['studentennummer'];
    $ID = $_POST['ID'];
    $opmerkingen = $_POST['opmerkingen']
    $counter = $_POST['counter'];

    $mysqli->query("INSERT INTO inschrijvingen (id, naam, studentennummer, reisID, opmerkingen) VALUES('$id', '$naam', '$student', '$ID', '$opmerkingen')") or 
        die($mysqli->error);
    $mysqli->query("UPDATE INTO reizen (counter) VALUES('$counter') WHERE reisID is $ID") or 
        die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");
}

//Delete een inschrijving
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM inschrijvingen WHERE id=$id") or die($mysqli->error());
    $mysqli->query("UPDATE INTO reizen (counter) VALUES('$counter2' WHERE reisID is $ID)") or 
        die($mysqli->error);
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}

//Laat een gebruiker / record zien wanneer je op edit klikt
//Edit knop
if (isset($_GET['edit'])) {
    $id = $_GET['edit']; 
    $update = true; 
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
    
    if (count($result)==1) {
        $row = $result->fetch_array();
        $name = $row['name'];
        $location = $row['location'];
    }
}


//Update een gebruiker / Record
if (isset($_POST['update'])) { 
    $id = $_POST['id'];
    $name = $_POST['name']; 
    $location = $_POST['location'];

    $mysqli->query("UPDATE data SET name='$name', location='$location' WHERE id=$id") or die($mysqli->error()); 

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: index.php');
}


?>
