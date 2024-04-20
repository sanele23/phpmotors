<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
    <title>Login | PHP Motors</title>
</head>

<body>
<div id="wrapper">
        <!-- header -->
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/header.php'; ?>
        </header>
        <nav>
            <?php echo $navList; ?>
        </nav>

        <main>
          <h1>PHP Motors Login</h1>
          <?php
                if (isset($message)) {
                    echo $message;
                }
            ?>

          <?php 
            if (isset($_SESSION['message'])) { 
              echo $_SESSION['message']; unset($_SESSION['message']); 
            } 
            
          ?>
          <form method="post" action="/phpmotors/accounts/">
          
            <label>Email</label>
            <br>
              <input name="clientEmail" id="clientEmail" type="email" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> required>
                <br>
                <br>
                <label>Password</label>
                <br>
                
                <input name="clientPassword" id="clientPassword" type="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                <br>

                <!-- note -->
                <span id="pass-label">
                  <p>
                    Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character.
                  </p>
                </span>
                <br>
                <input type="submit" name="submit" id="reg-btn" value="Login">
                <!-- Add the action name - value pair -->
                
                <input type="hidden" name="action" value="Login">
                <p>
                  <a href = "../accounts/index.php/?action=registration">Not a member yet?</a>
                </p>
          </form>
          
        </main>
        <hr>
        <footer>
          <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
        </footer>
</div>
</body>
</html>