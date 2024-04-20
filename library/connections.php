<?php 
// Proxy connection to the phpmotors database

function phpmotorsConnect()
{
    $server = 'localhost';
    $dbname = 'phpmotors';
    $username = 'iClient';
    $password = 'ePeCcVBzhn3U1_nU';
    
    $dsn = "mysql:host=$server;dbname=$dbname";
    // error handling
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    
    // use a try-catch to build a connection
    try {
        $link = new PDO($dsn, $username, $password, $options);
        // if(is_object($link)) {
        //     echo 'It worked!';
        // }
        return $link;
    
    } catch(PDOException $e){
        // echo "It didn't work, error: " . $e->getMessage();
        header('Location: /phpmotors/view/500.php');
        exit;
    }
}
// variables to hold the values of the connection
// phpmotorsConnect();














?>