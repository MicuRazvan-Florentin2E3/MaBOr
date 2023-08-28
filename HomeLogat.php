<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home_style.css">
    <title>Home Page</title>
</head>
<body>
<?php


       if(isset($_COOKIE["username"])) { 
        //echo $_COOKIE["username"];
        $username=$_COOKIE["username"];
    }

?>
    <header>
        <!-- <div class="butoane">
                <button class="register_button" action = "stopcookies.php" >Delogare</button>
                <h3> User: <?php echo  $username; ?> </h3>
        </div> -->

        <form action="stopcookies.php" method="get">
            <input class="register_button" type="submit" value="Delogare!">
            <h3> User: <?php echo  $username; ?> </h3>
        </form>

        <div class="titlu">
            <h1 style="font-size: 50px; color: #EFF6F7">MaBOr</h1>
            <h2 style="font-size: 25px; color: #EFF6F7; font-weight: 400;">(Masquerade Ball Smart Organizer)</h2>
        </div>
    </header>
    <div class="tab_baluri" style="margin-top: 50px;">
        <form action="create.html" style="width: 100%; display: flex; justify-content: center; margin-top: 25px;">
            <button class="creere_bal_buton">Adauga Eveniment</button>
        </form>
<?php 
$nelogat = false;
@include "controler.php"
?>

        </div>
    
</body>
</html>