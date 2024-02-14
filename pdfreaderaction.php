<?php
session_start();
require('dbcon.php');
if (isset($_GET['id'])) {
	$email = $_SESSION['email'];
  }
  if(isset($_SESSION['status']) && $_SESSION['status'] == 0 || !isset($_SESSION['email'])){
	header("location:subscription.php");
   }


$sql = "SELECT book FROM action WHERE id =$_GET[id]";
$result = mysqli_query($con, $sql);
$fetch = mysqli_fetch_assoc($result);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
   
	$stmt1 = $con->prepare("UPDATE action SET view = view + 1 WHERE id = ?");
	$stmt1->bind_param("i", $id);
	$stmt1->execute();
    
}
?>
<html>
	<body>
	    <embed type="application/pdf" src="img/<?php echo $fetch['book'];?>#toolbar=0" width="100%" height="100%">
		</body>
		</html>



