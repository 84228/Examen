<?php 
session_start();
$userID = $_SESSION['userID'];

require_once 'config.php'; 

$opmerkingen = '';
$update = false;

//Voeg een inschrijving toe / inschrijvingen +1
if (isset($_POST['save'])) {
    $ID = $_POST['ID'];
    $opmerkingen = $_POST['opmerkingen'];

    
    $mysqli->query("UPDATE Users SET opmerkingen='$opmerkingen', reisID='$ID' WHERE id=$userID") or 
        die($mysqli->error());   
    
    $mysqli->query("UPDATE reizen SET counter = counter + 1 WHERE reisID = $ID") or 
        die($mysqli->error());  

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: overzicht.php");
}

//Delete een gebruiker / inschrijvingen -1 werkt nog niet met de counter 
if (isset($_GET['delete'])) {
    $userID = $_GET['delete'];
    $reisID = $_GET['ID'];
    
    $mysqli->query("UPDATE Users SET reisID = 0 WHERE id=$userID") or die($mysqli->error());
    $mysqli->query("UPDATE reizen SET counter = counter - 1 WHERE reisID = $ID") or die($mysqli->error());   

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: overzicht.php");
}

//Laat een gebruiker / record zien wanneer je op edit klikt
//Edit knop
if (isset($_GET['edit'])) {
    $id = $_GET['edit']; 
    $update = true; 
    $result = $mysqli->query("SELECT * FROM Users WHERE id=$userID") or die($mysqli->error());
    
    if (count($result)==1) {
        $row = $result->fetch_array();
        $opmerkingen = $row['opmerkingen'];
    }
}


//Update de counter zet hier de plus 1 counter neer
if (isset($_POST['update'])) { 
    $id = $_POST['id'];
    $opmerkingen = $_POST['opmerkingen']; 


    $mysqli->query("UPDATE data SET name='$name', location='$location' WHERE id=$id") or die($mysqli->error()); 

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: overzicht.php');
}


?>
