<?php

  session_start() or die("Failed to resume session\n");
  require_once '../class/users.class.php';

?>

<html>
<head>
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="../public/css/home.css">
  <link rel="stylesheet" href="../public/css/headerfooter.css">
  <title>Log in to Camagru</title>
</head>
<body>
  <h1 class=title id=maintitle>Camagru</h1>
  <div class="connexion">
    <h2>Log in</h2>
    <form class="" action="#" method="post">
      Username<br /><input type="text" name="login" value=""><br />
      Password<br /><input type="password" name="passwd" value=""><br /><br />
      <input class="button" type="submit" name="submit" value="OK">
    </form>
    <a href="forgot.php" id="forgot">Forgot your password ?</a>
  </div>
  <?php
  if (!empty(htmlentities($_POST['login'])) and !empty(htmlentities($_POST['passwd'])) and $_POST['submit'] == "OK") {

    $login = trim(htmlentities($_POST['login']));
    $passwd = htmlentities($_POST['passwd']);
    $db = new Users($login, $passwd, "", "", "");
    $db->connectUser();
    if ($db->message)
      echo '<div style="color:red;">' . $db->message . '</div>';
    else {
      $_SESSION['logged_user'] = $login;
      echo '<script> location.replace("../index.php"); </script>';
    }
  }
  ?>
  <div class="inscription">
    <h2>Register</h2>
    <form class="" action="#" method="post">
      Username<br /><input type="text" name="new_login" value="" maxlength=30><br />
      Password<br /><input type="password" name="new_passwd" value="" maxlength=50><br />
      Password confirmation<br /><input type="password" name="new_passwd_verif" value="" maxlength=50><br />
      Email<br /><input type="email" name="new_email" value="" maxlength=255><br /><br />
      <input class="button" type="submit" name="submit_new" value="OK">
    </form>
  </div>
  <div class="galleryaccess">
    <a href="gallery.php" id="galleryaccess">Access the gallery</a>
  </div>
  <?php
    if (!empty(htmlentities($_POST['new_login'])) and !empty($_POST['new_passwd']) and !empty($_POST['new_passwd_verif'])
    and !empty(htmlentities($_POST['new_email'])) and $_POST['submit_new'] == "OK") {
        $new_login = trim(htmlentities($_POST['new_login']));
        $new_email = trim(htmlentities($_POST['new_email']));
        $db = new Users($new_login, $_POST['new_passwd'], $_POST['new_passwd_verif'], $new_email, "");
        $db->sendConfirmationUser();
        if ($db->message)
          echo '<div style="color:red;">' . $db->message . '</div>';
    }
    else if ($_POST['submit_new'] == "OK")
      echo '<div style="color:red;">Please fill in all the blanks</div>';
    else if ($_GET['q'] != "") {
      $token = $_GET['q'];
      $db = new Users("", "", "", "", $token);
      $db->confirmUser();
      if ($db->message)
        echo '<div style="color:red;">' . $db->message . '</div>';
    }
  ?>
</body>
</html>
