<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Add Classification | PHP Motors</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
    </head>
    <body>
        <div id="wrapper">
            <header>
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/snippets/header.php" ?>
            </header>
            <nav>
                <?php echo $navList; ?>
            </nav>
            <main>
                <div class="main_content">
                    <h1>Add Car Classification</h1>
                    <?php if (isset($_SESSION['message'])) { echo $_SESSION['message']; unset($_SESSION['message']); } ?>
                    <form action="/phpmotors/vehicles/index.php" method="POST">
                        <input type="hidden" name="action" value="addClassification">
                        <div class="field">
                            <label for="classification">Classification Name</label><br>
                            <input type="text" name="classification" id="classification" required>
                        </div>
                        <div class="field">
                            <button id="reg-btn" type="submit">Add Classification</button>
                        </div>
                    </form>
                </div>
            </main>
            <hr>
            <footer>
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/snippets/footer.php" ?>
            </footer>
        </div>
    </body>
</html>