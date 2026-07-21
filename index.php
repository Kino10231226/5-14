<?php
require_once 'poker.php';

$result = '';
$cards  = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $suit1   = $_POST['suit1']   ?? '';
    $number1 = $_POST['number1'] ?? '';
    $suit2   = $_POST['suit2']   ?? '';
    $number2 = $_POST['number2'] ?? '';
    $suit3   = $_POST['suit3']   ?? '';
    $number3 = $_POST['number3'] ?? '';
    $suit4   = $_POST['suit4']   ?? '';
    $number4 = $_POST['number4'] ?? '';
    $suit5   = $_POST['suit5']   ?? '';
    $number5 = $_POST['number5'] ?? '';

    if ($suit1 === '' || $number1 === '' || $suit2 === '' || $number2 === '' ||
        $suit3 === '' || $number3 === '' || $suit4 === '' || $number4 === '' ||
        $suit5 === '' || $number5 === '') {
        $result = 'Illegal hand';
    } else {
        $poker = new Poker_Hand(
            $suit1, $number1,
            $suit2, $number2,
            $suit3, $number3,
            $suit4, $number4,
            $suit5, $number5
        );

        $result = $poker->getPokerHandJudge();
        $cards = $poker->getCard();
    }
}
?>
<!DOCTYPE html>
<html data-wf-page="65a6358f98ae25d9e60af7b3" data-wf-site="65a6257c9b4dab4f4c5b2ebc">
<head>
  <meta charset="utf-8">
  <title>Poker Program</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/stylesheet.css" rel="stylesheet" type="text/css">
  <link href="css/poker-game-sample.css" rel="stylesheet" type="text/css">
  <link href="images/spade/1.png" rel="shortcut icon" type="image/x-icon">
</head>
<body>
  <div class="w-form">
    <form id="email-form" action="index.php" name="email-form" data-name="Email Form" method="post" class="form-2" data-wf-page-id="65a6358f98ae25d9e60af7b3" data-wf-element-id="86774d01-babd-216e-a0af-c3f43d9ae051">
      <div class="w-layout-blockcontainer container-2 w-container">
        <div class="w-layout-blockcontainer container-3 w-container"><label for="" class="field-label">CARD 1</label>
          <div class="w-layout-blockcontainer container w-container">
            <select id="suit1" name="suit1" data-name="Field 2" class="suit-1 w-select">
              <option value=""></option>
              <option value="spade">spade</option>
              <option value="heart">heart</option>
              <option value="diamond">diamond</option>
              <option value="club">club</option>
            </select>
            <select id="number1" name="number1" data-name="Field" class="number1 w-select">
              <option value=""></option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
            </select>
          </div>
        </div>
        <div class="w-layout-blockcontainer container-4 w-container"><label for="" class="field-label-2">CARD 2</label>
          <div class="w-layout-blockcontainer container w-container">
            <select id="suit2" name="suit2" data-name="Field 3" class="suit-2 w-select">
              <option value=""></option>
              <option value="spade">spade</option>
              <option value="heart">heart</option>
              <option value="diamond">diamond</option>
              <option value="club">club</option>
            </select>
            <select id="Field-2" name="number2" data-name="Field 5" class="number2 w-select">
              <option value=""></option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
            </select>
        </div>
        </div>
        <div class="w-layout-blockcontainer container-5 w-container"><label for="" class="field-label-3">CARD 3</label>
          <div class="w-layout-blockcontainer container w-container">
            <select id="suit3" name="suit3" data-name="Field 3" class="suit-3 w-select">
              <option value=""></option>
              <option value="spade">spade</option>
              <option value="heart">heart</option>
              <option value="diamond">diamond</option>
              <option value="club">club</option>
            </select>
            <select id="number3" name="number3" data-name="Field 6" class="number3 w-select">
              <option value=""></option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
            </select>
        </div>
        </div>
        <div class="w-layout-blockcontainer container-6 w-container"><label for="" class="field-label-4">CARD 4</label>
          <div class="w-layout-blockcontainer container w-container">
            <select id="suit4" name="suit4" data-name="Field 3" class="suit-4 w-select">
              <option value=""></option>
              <option value="spade">spade</option>
              <option value="heart">heart</option>
              <option value="diamond">diamond</option>
              <option value="club">club</option>
            </select>
            <select id="number4" name="number4" data-name="Field 7" class="number4 w-select">
              <option value=""></option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
            </select></div>
        </div>
        <div class="w-layout-blockcontainer w-container"><label for="" class="field-label-5">CARD 5</label>
          <div class="w-layout-blockcontainer container w-container">
            <select id="suit5" name="suit5" data-name="Field 3" class="suit-5 w-select">
              <option value=""></option>
              <option value="spade">spade</option>
              <option value="heart">heart</option>
              <option value="diamond">diamond</option>
              <option value="club">club</option>
            </select>
            <select id="number5" name="number5" data-name="Field 8" class="number5 w-select">
              <option value=""></option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
            </select></div>
        </div>
      </div>
      <button type="submit" class="button w-button">SEND</button>
    </form>
    <div class="w-form-done">
      <div>Thank you! Your submission has been received!</div>
    </div>
    <div class="w-form-fail">
      <div>Oops! Something went wrong while submitting the form.</div>
    </div>
  </div>

<?php if ($result !== ''): ?>
  <section>
    <h1 class="heading-2">hand of cards：</h1>
    <div class="w-layout-grid grid">
      <?php foreach ($cards as $card): ?>
        <img src="images/<?= htmlspecialchars($card['suit']) ?>/<?= htmlspecialchars($card['number']) ?>.png" loading="lazy" alt="">
      <?php endforeach; ?>
    </div>
  </section>

  <h1 class="heading-3"><strong>A poker hand→</strong><?= htmlspecialchars($result) ?></h1>
<?php endif; ?>

</body>
</html>
