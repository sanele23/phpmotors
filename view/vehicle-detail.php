<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo "$invInfo[invMake] $invInfo[invModel]"; ?> details | PHP Motors</title>
  <link rel="stylesheet" href="/phpmotors/css/style.css?ts=<?= time() ?>" media="screen">
  <link rel="stylesheet" href="/phpmotors/css/styles.css?ts=<?= time() ?>" media="screen">
</head>

<body>
  <div class="container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; ?>
    <!-- navigation -->
    <nav>
        <?php echo $navList; ?>
    </nav>
    <main class="vehicle-details content">
    



      <h1><?php echo "$invInfo[invMake] $invInfo[invModel]"; ?></h1>
      <h3>Vehicles reviews can be seen at the bootom of this page</h3>
      <?php if (isset($message)) {
        echo $message;
      } ?>
      <?php if (isset($vehicleDetail)) {
        echo $vehicleDetail;
      } ?>
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/add-review.php'; ?>
      <?php if (isset($_SESSION['reviews'])) {
        echo $_SESSION['reviews'];
      } ?>
    </main>
    <hr>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
  </div>
  <!-- <script src="../js/inventory.js"></script> -->
</body>

</html>