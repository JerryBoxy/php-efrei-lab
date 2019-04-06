<html>

  <head>
    <meta charset="utf-8">
    <title>Calculator</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">
  </head>

  <body>

			<?php
			class Calculator {

				function sum($x, $y) {
					return $x + $y;
				}

				function subtract($x, $y) {
					return $x - $y;
				}

				function multiply($x, $y) {
					return $x * $y;
				}

				function divide($x, $y) {
					return $x / $y;
				}
    }

      if (!isset($_GET['op']) || !isset($_GET['x']) || !isset($_GET['y'])) {
        echo "<div> Incorrect or incomplete data <div>";
        exit();
      }

			$calculator = new Calculator();
			$x = $_GET['x'];
			$y = $_GET['y'];
			$op = $_GET['op'];

      switch ($op) {
        case 'sum':
          $si= '+';
          break;
        case 'substract':
          $si= '-';
          break;
        case 'multiply':
          $si= '*';
          break;
        case 'divide':
          $si= '/';
          break;
        default:
          echo "<div> Unrecognized operation: $op </div>";
          exit();
      }
      echo "<div>";
      echo "$x";
      echo " $si ";
      echo "$y ";
      echo "= ";
      echo $calculator->$op($x,$y);
      echo "</div>";
			?>

  </body>
</html>
