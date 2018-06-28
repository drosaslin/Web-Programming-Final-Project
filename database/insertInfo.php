<?php
  include_once ("dbms.php");

  if(isset($_POST['submit']) && !empty($_POST['first']) && !empty($_POST['last']) && !empty($_POST['email']) && !empty($_POST['pwd']) && !empty($_POST['rpt_pwd']))
  {
    $bday = "0";
    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $hash = password_hash($_POST['pwd'], PASSWORD_BCRYPT);
    $password = mysqli_real_escape_string($conn, $hash);

    $sql = "INSERT INTO user (userName, lastName, email, birthday, pass)
            VALUES ('$first', '$last', '$email', '$bday', '$password');";

    mysqli_query($conn, $sql);
    header("location: ../sign_in.html?signup=success");
  }
  else{
    $message = "Sign up error. Please try again.";
    echo "<script type='text/javascript'>
            alert('$message')
            location='../signup.php?signup=unsuccessful'</script>";
  }

  mysqli_close($conn);
 ?>
