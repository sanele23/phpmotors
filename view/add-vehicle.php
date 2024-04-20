<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Add Vehicle | PHP Motors</title>
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
                    <h1>Add Vehicle</h1>
                    <?php 
                        if (isset($_SESSION['message'])) { 
                            echo $_SESSION['message']; 
                            unset($_SESSION['message']); 
                        } 
                        
                    ?>
                    <form action="/phpmotors/vehicles/index.php" method="post">
                        <input type="hidden" name="action" value="addVehicleToDatabase">
                        <p>*Note all Fields are Required</p>
                        <div class="field">
                            <label for="classificationId">Select a Classification:</label><br>
                            <?php 
                                $classificationList = '<select name="classificationId" id="classificationId">';
                                foreach ($classifications as $classification) {
                                    $classificationList .= "<option value='$classification[classificationId]'";
                                    if(isset($classificationId)){
                                        if($classification['classificationId'] === $classificationId){
                                            $classificationList .= ' selected ';
                                        }
                                    }
                                    $classificationList .= ">$classification[classificationName]</option>";
                                }
                                $classificationList .= '</select>';
                                echo $classificationList;
                            ?>
                        </div>
                        <div class="field">
                            <label for="invMake">Make</label><br>
                            <input type="text" name="invMake" id="invMake" <?php if(isset($invMake)){echo "value='$invMake'";} ?> required>
                        </div>
                        <div class="field">
                            <label for="invModel">Model</label><br>
                            <input type="text" name="invModel" id="invModel" <?php if(isset($invModel)){echo "value='$invModel'";} ?> required>
                        </div>
                        <div class="field">
                            <label for="invDescription">Description</label><br>
                            <textarea name="invDescription" id="invDescription" required><?php if(isset($invDescription)){echo $invDescription;} ?></textarea>
                        </div>
                        <div class="field">
                            <label for="invImage">Image Path</label><br>
                            <input type="text" name="invImage" id="invImage" <?php if(isset($invImage)){echo "value='$invImage'";} ?> required>
                        </div>
                        <div class="field">
                            <label for="invThumbnail">Thumbnail Path</label><br>
                            <input type="text" name="invThumbnail" id="invThumbnail" <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";} ?> required>
                        </div>
                        <div class="field">
                            <label for="invPrice">Price</label><br>
                            <input type="text" name="invPrice" id="invPrice" <?php if(isset($invPrice)){echo "value='$invPrice'";} ?> required>
                        </div>
                        <div class="field">
                            <label for="invStock"># In Stock</label><br>
                            <input type="text" name="invStock" id="invStock" <?php if(isset($invStock)){echo "value='$invStock'";} ?> required>
                        </div>
                        <div class="field">
                            <label for="invColor">Color</label><br>
                            <input type="text" name="invColor" id="invColor" <?php if(isset($invColor)){echo "value='$invColor'";} ?> required>
                        </div>
                        <div class="field">
                            <button id="reg-btn" type="submit">Add Vehicle</button>
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