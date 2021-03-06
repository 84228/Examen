<!DOCTYPE html>
<?php 
	session_start();
    // To only give access to a page if a user is logged in  

    // if(!isset($_SESSION['username'])){
    //     header("Location: login.php");
    // } else { 
      
    // }

    //Login / Loguit systeem
    if(!isset($_SESSION['username']))
    {
        $login = '<a class="nav-link" href="login.php">Login</a>';
    }
    else
    {
        if ($_SESSION['user-lvl'] == 1)
        {
            $login = '<a class="nav-link" href="loguit.php">Loguit</a>';
    
        }
    
        else if ($_SESSION['user-lvl'] >= 1)
        {
            $login = '<a class="nav-link" href="loguit.php">Loguit</a>';
        }
        
        else if ($_SESSION['user-lvl'] <= 1)
        {
            $login = '<a class="nav-link" href="loguit.php">Loguit</a>';
        }

    }
    $ulvl = $_SESSION['user-lvl'];
    $userID   = $_SESSION['userID'];
    $ID = $_GET['count'];
    // verifieer lvl van persoon (admin lvl req)
    if ( $ulvl == "2") {
    //site here
    
    
    }
    //Normal
    else{

    } 
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="scss/main.css">
    <title>Examen Training</title>
</head>
<body>
        <?php
            include_once "nav.php";
        ?>
    <?php require_once 'reizen_process.php'; ?>

    <?php 
    //Laat een confirmatie bericht zien na het toevoegen of verwijderen van een gebruiker 
    if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">

            <?php 
                echo $_SESSION['message'];
                unset ($_SESSION['message']);
            ?>

        </div> 

    <?php endif ?>
    <h1> Toevoegen Gebruiker </h1>
        <div class="container">
        <?php 
            //call naar de config file
            require_once 'config.php';
            //laat alles zien van de databse tafels: "reizen en inschrijvingen"
            $result = $mysqli->query("SELECT * FROM reizen WHERE reisID=$ID") or die($mysqli->error());
            //laat alle gebruikers die ingeschreven zijn zien 
            $result2 = $mysqli->query("SELECT * FROM Users WHERE reisID=$ID") or die($mysqli->error());

            // test of de content wel laat
            //  pre_r($result2);
            //  pre_r($result2->fetch_assoc());
            ?>

            <div class="row justify-content-center">
                <table class="table"> 
                    <thead>
                        <tr>
                            <th>Titel</th>
                            <th>Bestemming</th>
                            <th>Omschrijving</th>
                            <!-- om te checken of het de juiste reis is  -->
                            <th>reisID</th>
                        </tr>
                    </thead>
                <?php
                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['titel']; ?></td> 
                            <td><?= $row['bestemming']; ?></td> 
                            <td><?= $row['omschrijving']; ?></td> 
                            <td><?= $row['reisID']; ?></td> 
                        </tr>

                        <?php endwhile; ?>

                </table>
                <table class="table"> 
                    <thead>
                        <tr>
                            <th>Studentennummer</th>
                            <th>Naam</th>
                            <th>Opmerkingen</th>
                            <!-- om te checken of het de juiste reis is  -->
                            <th>reisID</th>
                        </tr>
                    </thead>
                <?php
                    while ($row2 = $result2->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row2['studentennummer']; ?></td> 
                            <td><?= $row2['naam']; ?></td> 
                            <td><?= $row2['opmerkingen']; ?></td> 
                            <td><?= $row2['reisID']; ?></td> 
                            <!-- student kan zichzelf alleen verwijderen en moet alleen opmerkingen kunnen veranderen -->
                            <td>
                                <?php if( $userID == $row2['id'] || $ulvl == "2" ) { ?>
                                    <a href="reizen.php?edit=<?= $row2['id']; ?>" class="btn btn-info">Edit</a>

                                    <?php } else { } ?>

                                <?php 
                                    // verifieer lvl van persoon (admin lvl req)
                                    if ( $userID == $row2['id'] || $ulvl == "2") {
                                        //site here
                                          ?>
                                          <a href="reizen_process.php?delete=<?= $row2['id']; ?>" class="btn btn-danger">Delete</a>
                                        <?php } 
                                       //level 1 
                                        else{
                                            
                                        } 
                                ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>

            <?php 
            //functie voor het uitlezen van de database table
            //gebruikt bij het testen
            // function pre_r( $array ) {
            //     echo '<pre>';
            //     print_r($array);
            //     echo '</pre>';
            // }

        ?>
        
        <!-- de form -->
        <div class="row justify-content-center">
            <form action="reizen_process.php" method="POST"> 
                <input type="hidden" name="ID" value="<?= $ID; ?>">
                <input type="hidden" name="studentennummer" value="<?= $student; ?>">
                <input type="hidden" name="naam" value="<?= $name; ?>">
                <input type="hidden" name="counter" value="<?= $counter; ?>">
                <div class="form-group"> 
                    <label>Opmerkingen</label>
                    <input type="text" name="opmerkingen" class="form-control" value="<?= $opmerkingen; ?>" placeholder="Vul hier je opmerkingen in" required> 
                </div> 
                <div class="form-group button">
                    <!-- verander de knop van Save naar Update  -->
                    <?php 
                        if ($update == true) { 
                    ?>
                        <button type="submit" class="btn btn-info" name="update">Update</button> 
                        <a href="reizen.php" class="btn btn-secondary">Back</a>
                    <?php } else { ?> 
                            <button type="submit" class="btn btn-primary" name="save">Save</button> 
                    <?php } ?>
                    
                </div>
            </form> 
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
</body>
</html>
