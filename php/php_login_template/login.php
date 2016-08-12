<?php
   session_start(); // Starting Session

   $error=''; // Variable To Store Error Message

   if (isset($_POST['submit'])) {
      if (empty($_POST['username']) || empty($_POST['password'])) {
      $error = "Username or Password Should not be empty";
      } else {
         // Define $username and $password
         $username=$_POST['username'];
         $password=$_POST['password'];

         // Including the php connection page script + calling the connect function.
         require_once ("connection.php");
         check_connection();

         // To protect MySQL injection for Security purpose
         $username = stripslashes($username);
         $password = stripslashes($password);
         $username = mysql_real_escape_string($username);
         $password = mysql_real_escape_string($password);

         // SQL query to fetch information of registerd users and finds user match.
         $query = mysqli_query( $con,"select * from login where password='$password' AND username='$username'");
         $rows = mysqli_num_rows($query);

         if ($rows == 1) {
            $_SESSION['login_user']=$username; // Initializing Session
            header("location: profile.php"); // Redirecting To Other Page
            } else {
               $error = "Username or Password is invalid";
               }
         
         mysqli_close($con); // Closing Connection

         }
   }

   if(isset($_SESSION['login_user'])){
   header("location: profile.php");
   }
?>

<!DOCTYPE html>
<html>
   <head>
      <title>Login Form in PHP with Session</title>
      <style>
         input{display:block;}
      </style>
   </head>
   <body>

      <form action="" method="post">
         <input id="name" name="username" placeholder="username" type="text">
         <input id="password" name="password" placeholder="**********" type="password">
         <input name="submit" type="submit" value=" Login ">
         <p><?php echo $error; ?></p>
      </form>

   </body>
</html>