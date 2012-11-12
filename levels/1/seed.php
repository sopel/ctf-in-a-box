<html>
  <head>
    <title>Guessing Game Administration</title>
  </head>
  <body>
    <h1>Guessing Game Administration!</h1>
    <p>
      Seed the password to the next level below (secret combination is randomized)!
    </p>
    <?php
      $mode = 0600;
      $secretFilename = 'secret-combination.txt';
      $passwordFilename = 'password.txt';
      if (!file_exists($passwordFilename)) {
        file_put_contents($secretFilename, crypt(rand()));
        chmod($secretFilename, $mode);

        if (!empty($_POST['password'])) {
          $password = $_POST['password'];
          file_put_contents($passwordFilename, $password);
          chmod($passwordFilename, $mode);
          echo "<p>Seeded password.txt with:" .
              " $password</p>";
        } else {
          header("HTTP/1.1 400 Bad Request");
          echo "<p>You must specify a non empty password!</p>";
        }
      }
      else {
        header("HTTP/1.1 409 Conflict");
        echo "<p>Guessing Game has already been seeded, please redeploy!</p>";
      }
    ?>
    <form action="#" method="POST">
      <p><input type="text" name="password"></p>
      <p><input type="submit" value="Seed!"></p>
    </form>
  </body>
</html>
