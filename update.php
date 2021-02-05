<?php
include_once("dbconnect.php");
$matric = $_GET['matric'];
$name = $_GET['name'];
$kitsid = $_GET['kitsid'];
$kitspart = $_GET['kitspart'];
$kitsfunction = $_GET['kitsfunction'];
$kitsprice = $_GET['kitsprice'];

if (isset($_GET['operation'])) {
    try {
        $sqlupdate = "UPDATE kits SET kitspart = '$kitspart', kitspart = '$kitspart', kitsprice = '$kitsprice' WHERE matric = '$matric' AND kitsid = '$kitsid'";
        $conn->exec($sqlupdate);
        echo "<script> alert('Update Success')</script>";
        echo "<script> window.location.replace('mainpage.php?matric=".$matric."&name=".$name."') </script>;";
      } 
      catch(PDOException $e) {
        echo "<script> alert('Update Error')</script>";
      }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>
<body>
<p>
<h2 align='center'><?php echo $name?></h2>
</p>

   <h3 align="center">Update <?php echo $kitsid?> </h3>

    <form action="update.php" method="get" align="center" onsubmit="return confirm('Update?');">
        <input type="hidden" id="name" name="name" value="<?php echo $name;?>"><br>
        <input type="hidden" id="matric" name="matric" value="<?php echo $matric;?>"><br>
        <input type="hidden" id="kitsid" name="kitsid" value="<?php echo $kitsid;?>" required><br>
        <input type="hidden" id="operation" name="operation" value="update"><br>
        <label for="email">Kits Part:</label><br>
        <input type="text" id="kitspart" name="kitspart" value="<?php echo $kitspart;?>" required><br>
        <label for="kitsfunction">Kits Function:</label><br>
        <input type="text" id="kitsfunction" name="kitsfunction" value="<?php echo $kitsfunction;?>" required><br>
        <label for="password">Kits Price</label><br>
        <input type="text" id="kitsprice" name="kitsprice" value="<?php echo $kitsprice;?>" required><br><br>
        <input type="submit" value="Update">
    </form>
    <p align="center"><a href="mainpage.php?matric=<?php echo $matric.'&name='.$name?>">Cancel</a></p>
</body>

</html>