
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is the registration page for the phpmotors website." />
    <title>Registration | PHP Motors</title>
    <!-- link -->
    <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">

</head>
<body>
    <div id="wrapper">
        <!-- header -->
        <header>
            <!-- PHP require directory -->
            <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/header.php'; ?>
        </header>
        <nav>
            <?php echo $navList; ?>
        </nav>
        
        <!-- main body -->
        <main>
            <h1>Register</h1>
            <?php
                if (isset($message)) {
                    echo $message;
                }
            ?>

            <form action="/phpmotors/accounts/index.php" method="post">

            <label for="clientFirstname">First Name</label><br>
            <input type="text" id="clientFirstname" name="clientFirstname" 
            <?php if (isset($clientFirstname)) {
                    echo "value='$clientFirstname'";
                    }  ?> 
                    ><br>

            <label for="clientLastname">Last Name</label><br>
            <input type="text" id="clientLastname" name="clientLastname" <?php if (isset($clientLastname)) {
                echo "value='$clientLastname'";
            }  ?> ><br>

            <label for="clientEmail">Email</label><br>
            <input type="email" id="clientEmail" name="clientEmail" placeholder="phpmotors@gmail.com" 
            <?php if (isset($clientEmail)) {
            echo "value='$clientEmail'";
            }  ?> ><br>

            <label for="clientPassword">Password:</label><br>
            
            <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
            <!-- required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" -->
            <br>
            <span>
                Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character
            </span>
            <br>
            <input type="submit" name="submit" value="Register" id="reg-btn">
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="register">

            </form>
        </main>
        <hr>

        <!-- footer -->
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
        </footer>   
    </div>
</body>
</html>
