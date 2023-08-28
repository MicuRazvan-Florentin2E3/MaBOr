<?php 
  $usernameLogIn = $_POST['usernameLogIn'];
  $passwordLogIn = $_POST['passwordLogIn'];

  if(!$usernameLogIn || !$usernameLogIn)
    echo ("Nu ati introdus toate datele.");
  else{
    $conn = new mysqli("localhost", "root" , "", "mabor_database");
      
    if($conn -> connect_error){
      die('Connection Failed : '.$conn -> connection_error);
    }else{
      $stmt = $conn->prepare('SELECT * FROM users WHERE username = "'.$usernameLogIn.'" AND password = "'.$passwordLogIn.'";');
      $stmt->execute();
      if (!$stmt->fetch()){
        $stmt -> close();
        $conn -> close();
        echo ("Cont inexistent");
      }
      else{
        $stmt -> close();
        $conn -> close();
        header("Location:HomeLogat.html");
      }
    }
  }
  
?> 
