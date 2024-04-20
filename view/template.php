<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template | PHP Motors</title>
    <!-- link -->
    <link href="./css/style.css" type="text/css" rel="stylesheet" media="screen">

</head>
<body>
    <div id="wrapper">
        <!-- header -->
        <header>
            <!-- PHP require directory -->
            <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/header.php'; ?>
        </header>

        <!-- navigation -->
        <nav>
            <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/nav.php'; ?>
        </nav>
        
        <!-- main body -->
        <main>
            <h1>Content Title Here</h1>
        </main>
        <hr>

        <!-- footer -->
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
        </footer>   
    </div>
</body>
</html>