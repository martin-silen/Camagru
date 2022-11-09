<?php

  $headers  = 'MIME-Version: 1.0' . "\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
  $headers .= "From: camagru-noreply@student.42.fr\n";
  $mailbody = "<html><body>";
  $mailbody .= "<p>Hello " . $login_pic . ",</p>";
  $mailbody .= "<p>You have received a new comment from " . $this->login . " for your picture : \"" . $this->comment . "\".</p>";
  $mailbody .= "<p>Have a nice day !</p>";
  $mailbody .= "<p>Camagru</p>";
  $mailbody .= "</body></html>";

  mail($email, "Camagru - new comment", $mailbody, $headers);

  // mail comment to owner of the picture
 ?>
