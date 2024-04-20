<div id="top-header">
    <img src="/phpmotors/images/site/logo.png" alt="PHP Motors Logo" id="logo">

    <!-- <?php if(isset($cookieFirstname)){
        echo "<span>Welcome $cookieFirstname</span>";
        } 
    ?> -->

    <!-- when user is logged in -->
    <?php if (isset($_SESSION['loggedin'])) {
      echo "<p><a href='/phpmotors/accounts/'>Welcome ".$_SESSION['clientData']['clientFirstname']."</a> | <a href='/phpmotors/accounts?action=logout'>Logout</a></p>";
    } else{
      echo '<a href="/phpmotors/accounts?action=login-page" title="Login or Register with PHP Motors" id="acc">My Account</a>';
    } ?>
    <!-- <a href="/phpmotors/accounts?action=login" title="Login or Register with PHP Motors" id="acc">My Account</a> -->
</div>