<?php
include_once("dbconnect.php");
$matric = $_GET['matric'];
$name = $_GET['name'];

// if (isset($_COOKIE["email"])){
//   echo "Value is: " . $_COOKIE["email"];
// }
echo "<head></head><link rel='stylesheet' href='styles.css'></head>";

if (isset($_GET['kitsid'])) {
  $kitsid = $_GET['kitsid'];
  $kitspart = $_GET['kitspart'];
  $kitsfunction = $_GET['kitsfunction'];
  $kitsprice = $_GET['kitsprice'];

  try {
    $sql = "INSERT INTO kits(kitsid, kitspart, kitsfunction,kitsprice,matric)
    VALUES ('$kitsid', '$kitspart', '$kitsfunction','$kitsprice','$matric')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script> alert('Insert Success')</script>";
    echo "<script> window.location.replace('mainpage.php?matric=".$matric."&name=".$name."') </script>;";

  } catch(PDOException $e) {
    echo "<script> alert('Insert Error')</script>";
    //echo "<script> window.location.replace('register.html') </script>;";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>

<p>
<h2 align='center'><?php echo $name?></h2>
</p>

<body>
    <h2 align="center">Insert New kitspart</h2>

    <form action="newkitspart.php" method="get" align="center" onsubmit="return confirm('Insert new kitspart?');">
        <input type="hidden" id="name" name="name" value="<?php echo $name;?>"><br>
        <input type="hidden" id="matric" name="matric" value="<?php echo $matric;?>"><br>
        <label for="Kits ID">Kits ID:</label><br>
        <input type="text" id="kitsid" name="kitsid" value="" required><br>
        <label for="email">Kits Parts:</label><br>
        <input type="text" id="kitspart" name="kitspart" value="" required><br>
        <label for="matric">Kits Function:</label><br>
        <input type="text" id="kitsfunction" name="kitsfunction" value="" required><br>
        <label for="password">Kits Price</label><br>
        <input type="text" id="kitsprice" name="kitsprice" value="" required><br><br>
        <input type="submit" value="Submit" class="button">
    </form>
    <p align="center"><a href="mainpage.php?matric=<?php echo $matric.'&name='.$name?>">Cancel</a></p>
</body>

</html>