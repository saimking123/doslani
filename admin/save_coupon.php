<?php
	include("connection.php");
	if(ISSET($_POST['save'])){
		$coupon_code = $_POST['coupon'];
		$discount = $_POST['discount'];
		$status = "Valid";
		$user = $_POST["user"];
		$query = mysqli_query($conn, "SELECT * FROM `coupon` WHERE `coupon_code` = '$coupon_code'") or die(mysqli_error());
		$row = mysqli_num_rows($query);
		
		if ($row > 0) {
			echo "<script>alert('Coupon Already Used')</script>";
			echo "<script>window.location = 'index.php'</script>";
		} else {
			mysqli_query($conn, "INSERT INTO `coupon` (`coupon_code`, `discount`, `status`,`user_id`) VALUES ('$coupon_code', '$discount', '$status','$user')")or die(mysqli_error($conn));
			echo "<script>alert('Coupon Saved!')</script>";
			echo "<script>window.location = 'index.php'</script>";
		}
		
	}
?>