<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/model/vehicles-model.php';
if (!$_SESSION['loggedin']) {
  header('Location: /phpmotors/');
  exit;
}
$review = $_SESSION['review'];
$invInfo = getInvItemInfo($review['invId']);
$clientData = $_SESSION['clientData'];
$nameToShow = substr($clientData['clientFirstname'], 0, 1) . $clientData['clientLastname'];
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update review | PHP Motors</title>
  <link rel="stylesheet" href="/phpmotors/css/style.css?ts=<?= time() ?>" media="screen">
  <link rel="stylesheet" href="/phpmotors/css/styles.css?ts=<?= time() ?>" media="screen">
</head>

<body>
  <div class="container">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; ?>
    <main class="content">
      <section class="add-vehicle grid-section">
        <?php
        if (isset($message)) {
          echo $message;
        }
        ?>
        <h1>Update review for <?php echo $invInfo['invMake']. " " .$invInfo['invModel']; ?></h1>
        <p>Reviewed on <?php echo date("M j, Y", (int) strtotime($review['reviewDate'])); ?></p>
        <form method='post' action='/phpmotors/reviews/' class='form'>
          <label for="name">Name
            <input id="name" type='text' disabled value="<?php echo $nameToShow ?>">
          </label>
          <label for='reviewText'>Review
            <textarea id="reviewText" name='reviewText' rows='10'><?php echo $review['reviewText']?></textarea>
          </label>
          <input type='submit' class='submitBtn' name='update-submit' value='Update review'>
          <input type='hidden' name='action' value='update-review'>
          <input type='hidden' name='reviewId' value='<?php echo $review['reviewId']; ?>'>
          <input type='hidden' name='clientId' value='<?php echo $clientData['clientId']; ?>'>
        </form>
      </section>
    </main>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
  </div>
</body>

</html>
<?php unset($_SESSION['message']); ?>