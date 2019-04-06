<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../styles.css">
    <title>Friends Book</title>
</head>
<body >

    <h1>Friends Book</h1>

    </br>

    <form action="book.php" method="post">
        Name:
        <input type="text" name="name">
        <input type="submit">
    </form>

    </br>
	
    <h2>My best friends !</h2>

    <?php

    $names = array();
    $filternames = array();
    $filename = 'friends.txt';
    $file = fopen($filename, "r" );
    while (!feof($file)) {
      $friend = fgets($file);
      if(!empty($friend)){
        array_push($names, $friend);
      }
    }
    fclose($file);

    echo "<ul>";

    if(!empty($_POST['name']) && empty($_POST['filter'])) {
      $file = fopen($filename, "a");
      $friend = $_POST['name'];
      array_push($names, $friend);
      fwrite($file, $friend . "\n" );
      foreach ($names as $value){
        echo "<li>". $value ."</li>";
      }
      fclose($file);
    }

    if (!empty($_POST['filter']) && empty($_POST['name'])) {
      if(isset($_POST['startingWith']) && $_POST['startingWith'] == 'TRUE') {
        $filter = $_POST['filter'];
        foreach ($names as $value){
          if(strpos($value, $filter) === 0){
            array_push($filternames, $value);
          }
        }
        foreach ($filternames as $value){
          echo "<li>". $value ."</li>";
        }
      }
      else {
        $filter = $_POST['filter'];
        foreach ($names as $value){
          if(strstr($value, $filter)){
            array_push($filternames, $value);
          }
        }
        foreach ($filternames as $value){
          echo "<li>". $value ."</li>";
        }
      }
    }

    else if(empty($_POST['name']) && empty($_POST['filter'])) {
      foreach ($names as $value){
        echo "<li>". $value ."</li>";
      }
    }

    echo "</ul>";

    ?>

    <form action="book.php" method="post">
        Filter list:
        <input type="text" name="filter">
        <input type="checkbox" name="startingWith" <?php if ($_POST['startingWith']=='TRUE') echo "checked"?> value="TRUE">Only names starting with</input>
        <input type ="submit">
    </form>

</body>
</html>
