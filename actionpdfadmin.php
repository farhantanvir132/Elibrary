<?php
require('dbcon.php');

$sql = "SELECT book FROM action WHERE id =$_GET[id]";
$result = mysqli_query($con, $sql);
$fetch = mysqli_fetch_assoc($result);
?>
<html>
	<body>
	    <embed type="application/pdf" src="img/<?php echo $fetch['book'];?>#toolbar=0" width="700" height="700">
		</body>
		</html>



