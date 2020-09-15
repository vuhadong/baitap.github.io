<?php
session_start();
?>
<html>
<head>
	<title>Trang đăng nhập</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password,"ping");
if (mysqli_connect_error ()) {
  die ("Kết nối cơ sở dữ liệu không thành công:". Mysqli_connect_error ());
}
echo "Connected successfully";
?>

<?php
	if (isset($_POST["btn_submit"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];
		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);
		if ($username == "" || $password =="") {
			echo "username hoặc password bạn không được để trống!";
		}else{
			$sql = "select * from users where username = '$username' and password = '$password' ";
			$query = mysqli_query($conn,$sql); 
			$num_rows = mysqli_num_rows($query);
			
			if ($num_rows == 0) {
				echo "tên đăng nhập hoặc mật khẩu không đúng !";
			}else{
				$_SESSION['username'] = $username;
                header('Location: index.php');
			}
		}
	}
?>
	<form method="POST" action="login.php">
	<fieldset>
	    <legend>Đăng nhập</legend>
	    	<table>
	    		<tr>
	    			<td>Username</td>
	    			<td><input type="text" name="username" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td>Password</td>
	    			<td><input type="password" name="password" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td colspan="2" align="center"> <input name="btn_submit" type="submit" value="Đăng nhập"></td>
	    		</tr>
	    	</table>
  </fieldset>
  </form>
</body>
</html>\
