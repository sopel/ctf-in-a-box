<?php
  define('MODE', 0600);
  define('FILENAME_SECRET', 'secret-combination.txt');
  define('FILENAME_PASSWORD', 'password.txt');

  $message = NULL;
  if (!file_exists(FILENAME_PASSWORD)) {
    file_put_contents(FILENAME_SECRET, crypt(rand()));
    chmod(FILENAME_SECRET, MODE);

    if (!empty($_POST['password'])) {
      $password = $_POST['password'];
      file_put_contents(FILENAME_PASSWORD, $password);
      chmod(FILENAME_PASSWORD, MODE);
      $message = 'Seeded password.txt with: ' . $password;
    } else {
      header("HTTP/1.1 400 Bad Request");
      $message = 'You must specify a non empty password!';
    }
  }
  else {
    header("HTTP/1.1 409 Conflict");
    $message = 'Guessing Game has already been seeded, please redeploy!';
  }
?>

<html>
  <head>
    <title>Guessing Game Administration</title>
  </head>
  <body>
    <h1>Guessing Game Administration!</h1>
    <p>
      Seed the password to the next level below (secret combination is randomized)!
    </p>
    <p>
      <?php echo $message; ?>
    </p>
    <form action="#" method="POST">
      <p><input type="text" name="password"></p>
      <p><input type="submit" value="Seed!"></p>
    </form>
  </body>
</html>
