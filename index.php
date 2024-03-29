<!DOCTYPE HTML>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Temperature Converter</title>
  <link rel="stylesheet" href="css/styles.css" type="text/css">
</head>

<body>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <h2>Temperature Converter</h2>

    <fieldset>
      <label>Temperature to Convert</label>
      <input type="number" name="temp_from" value="<?php if (isset($_POST['temp_from'])) echo htmlspecialchars($_POST['temp_from']); ?>" />




      <label>Convert From:</label>
      <select name="scale_from">

        <option value="" NULL<?php if (isset($_POST['scale_from']) && $_POST['scale_from'] == NULL) echo 'selected = "unselected"'; ?>>Select one</option>

        <option value="f" <?php if (isset($_POST['scale_from']) && $_POST['scale_from'] == 'f') echo 'selected = "selected"'; ?>>Fahrenheit</option>
        <option value="c" <?php if (isset($_POST['scale_from']) && $_POST['scale_from'] == 'c') echo 'selected = "selected"'; ?>>Celsius</option>
        <option value="k" <?php if (isset($_POST['scale_from']) && $_POST['scale_from'] == 'k') echo 'selected = "selected"'; ?>>Kelvin</option>



      </select>

      <label>Convert To:</label>
      <select name="scale_to">

        <option value="" NULL<?php if (isset($_POST['scale_to']) && $_POST['scale_from'] == NULL) echo 'selected = "unselected"'; ?>>Select one</option>

        <option value="c" <?php if (isset($_POST['scale_to']) && $_POST['scale_to'] == 'c') echo 'selected = "selected"'; ?>>Celsius</option>

        <option value="k" <?php if (isset($_POST['scale_to']) && $_POST['scale_to'] == 'k') echo 'selected = "selected"'; ?>>Kelvin</option>

        <option value="f" <?php if (isset($_POST['scale_to']) && $_POST['scale_to'] == 'f') echo 'selected = "selected"'; ?>>Fahrenheit</option>
      </select>

      <a href="" class="reset">Reset</a>
    </fieldset>
    <!-- <fieldset>
      <p>
        <input type="radio" name="scale_from" value="f" />Fahrenheit
      </p>
      <p>
        <input type="radio" name="scale_from" value="c" />Celsius
      </p>
      <p>
        <input type="radio" name="scale_from" value="k" />Kelvin
      </p>
    </fieldset>
    <fieldset>
      <p>
        <input type="radio" name="scale_to" value="f" />Fahrenheit
      </p>
      <p>
        <input type="radio" name="scale_to" value="c" />Celsius
      </p>
      <p>
        <input type="radio" name="scale_to" value="k" />Kelvin
      </p>
    </fieldset> -->
    <input type="submit" />
  </form>
  <?php
  //form.php
  echo '';
  if (isset($_POST["temp_from"])) { // show data

    $temp_from = $_POST["temp_from"];
    $scale_from = $_POST["scale_from"];
    $scale_to = $_POST["scale_to"];
    $result = 0;

    if ($scale_from == "f" && $scale_to == "c") {
      $result = ($temp_from - 32) * (5 / 9);
    } elseif ($scale_from == "c" && $scale_to == "f") {
      $result = ($temp_from * (9 / 5)) + 32;
    } elseif ($scale_from == "c" && $scale_to == "k") {
      $result = $temp_from + 273.15;
    } elseif ($scale_from == "k" && $scale_to == "c") {
      $result = $temp_from - 273.15;
    } elseif ($scale_from == "f" && $scale_to == "k") {
      $result = ($temp_from + 459.67) * (5 / 9);
    } elseif ($scale_from == "k" && $scale_to == "f") {
      $result = ($temp_from * (9 / 5)) - 459.67;
    } else {
      echo "<p class='error'>Please complete entire form.</p>";
    }

    if (!empty($temp_from && $scale_from && $scale_to)) {
      echo '
    <div class="box">
      <p>' . $temp_from . '°' . strtoupper($scale_from) . ' = ' . round($result, 2) . '°' . strtoupper($scale_to) . '</p>
    </div>
          ';
    }

    // if (is_numeric($result)) {
    //   echo $temp_from . '°' . strtoupper($scale_from) . ' = ' . round($result, 2) . '°' . strtoupper($scale_to);
    // } else {
    //   echo "Please enter a valid number.";
    // }

    //  echo '<pre>';
    // var_dump ( $_POST );
    // echo '</pre>';


  }

  ?>


</body>

</html>