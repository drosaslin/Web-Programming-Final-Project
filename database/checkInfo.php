<?php
  include_once ("dbms.php");
  include_once ("loginFunctions.php");

  if(isset($_POST["submit"]) && !empty($_POST["email"]) && !empty($_POST["pwd"]))
  {
    $sql = "SELECT * FROM user;";
    $result = mysqli_query($conn, $sql);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST["pwd"]);
    $flag = false;
  
    while($row = mysqli_fetch_assoc($result))
    {
        session_start();
        setSessionVariables($email);
        header("location: ../order_online.php");
    }

    if($flag == false)
    {
      $message = "Connection unsuccessful!";
      echo "<script type='text/javascript'>
            alert('$message')
            location='../sign_in.html?login=unsuccessful'</script>";
    }
  }

  else
    {$message = "Sign in error. Check if all the fields are filled and the captcha is solved.";
    echo "<script type='text/javascript'>
            alert('$message')
            location='../sign_in.html?login=unsuccessful'</script>";}

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Connection Unsuccessful</title>
    <style type="text/css">
            body {
              background-color: #fff;
              text-align: center;
            }

            html{
              margin: auto;
            }

            p{
              font-family: helvetica;
              font-size: 10px;
            }

            a:link, a:visited{
              font-size: 15px;
              color:#74B496;
              font-weight: bold;
              text-decoration: none;
            }

          </style>
  </head>
  <body>
    <center>
    <a href = "..\..\index.php"><p style="font-size:20px">Click to go back</p></a>
  </center>
  </body>
</html>
