<?php 
   $usernameRegister = $_POST['usernameRegister'];
   $passwordRegister = $_POST['passwordRegister'];
   $adresaDeEmailRegister = $_POST['adresaDeEmailRegister'];
   $dbServerName = "localhost";
   $dbUsername = "root";
   $dbPassword = "";
   $dbName = "testt";

   if (strlen($passwordRegister) < 8) 
      echo("Parola prea scurta");
   else{
      if(strcmp($passwordRegister, $_REQUEST["repeatPasswordRegister"]))
         echo("Parole diferite");
      else{
         if(!str_contains($adresaDeEmailRegister, "@"))
            echo("Adresa de email invalida");
         else{
            if(!$usernameRegister || !$passwordRegister || !$_REQUEST["repeatPasswordRegister"] || !$adresaDeEmailRegister)
               echo ("Nu ati introdus toate datele.");
            else{
               $conn = new mysqli("localhost", "root" , "", "mabor_database");
               
               if($conn -> connect_error){
                  die('Connection Failed : '.$conn -> connection_error);
               }else{
                  $stmt = $conn->prepare('SELECT * FROM users WHERE username="'.$usernameRegister.'";');
                  $stmt->execute();
                  if ($stmt->fetch()){
                     $stmt -> close();
                     $conn -> close();
                     echo ("Username deja existent.");
                  }
                  else{
                     $stmt -> close();
                     $stmt = $conn->prepare('SELECT * FROM users WHERE email="'.$adresaDeEmailRegister.'";');
                     $stmt->execute();
                     if ($stmt->fetch()){
                        $stmt -> close();
                        $conn -> close();
                        echo ("Adresa de email deja folosita.");
                     }
                     else{
                        $stmt -> close();
                        $stmt = $conn -> prepare("insert into users(username, password, email) values(?, ?, ?)");
                        $stmt -> bind_param("sss", $usernameRegister, $passwordRegister,  $adresaDeEmailRegister);
                        $stmt -> execute();
                        $conn -> close();
                        header("Location:LoginPage.html");
                     }
                  }
               }
            }
         }
      }
   }
?> 
