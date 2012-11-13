<?php
  define('MODE', 0600);
  define('FILENAME_PASSWORD', 'password.txt');

  function seedLevel($password) {
    file_put_contents(FILENAME_PASSWORD, $password);
    chmod(FILENAME_PASSWORD, MODE);
  }

  function trySeedLevel(&$message) {
    $success = FALSE;
    $password = NULL;
    // NOTE: Lazy evaluation/validation - we accept a 'normal' form submission as well as a JSON POST,
    // disregarding the provided content type.
    // Try JSON first
    $decodedJson = json_decode(file_get_contents('php://input'), TRUE);
    if (is_array($decodedJson) && isset($decodedJson['password'])) {
      $password = $decodedJson['password'];
    }
    // Alternatively, check for 'normal' form post
    elseif (!empty($_POST['password'])) {
      $password = $_POST['password'];
    }

    // Did we find a password?
    if (!empty($password)) {
      // Yes, use for seeding
      seedLevel($password);
      $message = 'Seeded password.txt with: ' . $password;
      $success = TRUE;
    }
    else {
      header("HTTP/1.1 400 Bad Request");
      $message = 'You must specify a non empty password!';
    }

    return $success;
  }

  $message = NULL;
  $showForm = FALSE;
  // Seeding can only happen once
  if (file_exists(FILENAME_PASSWORD)) {
    header("HTTP/1.1 409 Conflict");
    $message = 'CTF Social Network has already been seeded, please redeploy!';
  }
  else {
    // We only accept GET or POST
    switch ($_SERVER['REQUEST_METHOD']) {
      case 'GET':
        $message = 'Seed the password to the next level below (secret combination is randomized)!';
        $showForm = TRUE;
        break;
      case 'POST':
        $success = trySeedLevel($message);
        if (!$success) {
          $showForm = TRUE;
        }
        break;
      default:
        header("HTTP/1.1 405 Method Not Allowed");
        $message = 'You can only use GET or POST for seeding!';
    }
  }
?>
<html>
  <head>
    <title>CTF Social Network Administration</title>
  </head>
  <body>
    <h1>CTF Social Network Administration!</h1>
    <p>
      <?php echo $message; ?>
    </p>
    <?php if ($showForm): ?>
      <form action="#" method="POST">
        <p><input type="text" name="password"></p>
        <p><input type="submit" value="Seed!"></p>
      </form>
    <?php endif; ?>
  </body>
</html>
