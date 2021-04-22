<?php session_start(); ?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>TIN HỌC T.L.A - Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="img/Untitled.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="style.css" type="text/css">
</head>
<?php 
	include_once('Connect.php');
	//DangNhap
	if(isset($_POST['btnDangNhap'])){
		$User = $_POST['txtTaiKhoan'];
		$Pass = $_POST['txtMatKhau'];
		$Pass=md5($Pass);
		$Result = mysqli_query($Conn,"Select * From nguoidung Where Nd_TenDangNhap='$User' and Nd_MatKhau='$Pass'") or die(mysqli_connect_error($Conn));
		if(mysqli_num_rows($Result)==1){
			echo '<script>alert("Đăng nhập thành công!");</script>';
			$_SESSION["user"]=$User;
			echo '<meta http-equiv="refresh" content="0;URL=index.php" />';
		}else echo '<script>alert("Đăng nhập không thành công!");</script>';
	}
	//DangXuat
	if(isset($_POST['btnDangXuat'])){
		session_destroy ();
		echo '<meta http-equiv="refresh" content="0;URL=index.php" />';
	}
	//CapNhat
	if(isset($_POST['btnCapNhat'])){
		$User=$_SESSION["user"];
		$OldPass = $_POST['txtMatKhauCu'];
		$NewPass = $_POST['txtMatKhauMoi'];
		$XNPass = $_POST['txtMatKhauXacNhan'];
		if($NewPass==$XNPass)$OldPass=md5($OldPass);
		$Pass=md5($NewPass);
		$Result = mysqli_query($Conn,"Select * From nguoidung Where Nd_TenDangNhap='$User' and Nd_MatKhau='$OldPass'") or die(mysqli_connect_error($Conn));
		if(mysqli_num_rows($Result)==1){
			$Result = mysqli_query($Conn,"Update nguoidung Set Nd_MatKhau='$Pass' Where Nd_TenDangNhap='$User'") or die(mysqli_connect_error($Conn));
			echo '<script>alert("Cập nhật thành công!");</script>';
			session_destroy ();
			echo '<meta http-equiv="refresh" content="0;URL=login.php" />';
		}else echo '<script>alert("Cập nhật không thành công!");</script>';
	}
?>
<script>
	$(document).ready(function(e) {
		$('.afterLogin').hide();
		<?php if(isset($_SESSION["user"])) 
		echo "$('.afterLogin').show();		$('.login').hide();";?>
  });
</script>
<body>
	<div class="container login_php">
  	<div class="row login">
    	<marquee>Vui lòng đăng nhập để quản trị!</marquee>
      <form method="post" id="formLogin" >
	      <div class="col-lg-12 title">Đăng nhập</div>
      	<div class="col-lg-12"><input class="form-control" name="txtTaiKhoan" placeholder="Tên Tài Khoản" type="text" id="txtTaiKhoan"></div>
				<div class="col-lg-12"><input class="form-control" name="txtMatKhau" placeholder="Mật Khẩu" type="password" id="txtMatKhau"></div>
        <div class="col-lg-12">
        	<input class="btn btn-success" name="btnDangNhap" type="submit" id="btnDangNhap" value="Đăng Nhập">
         <input class="btn btn-warning" name="btnThoat" type="button" id="btnThoat" value="Thoát" onclick="window.location='index.php'"> 
        </div>
      </form>
    </div>
    <div class="row afterLogin">
    	<marquee>Bạn đã đăng nhập với tên <em><?php echo $_SESSION["user"]; ?></em>!</marquee>
      <div class="col-lg-12 title">
        <form action="" method="post" id="formLogOut">
          Cập Nhật Tài Khoản Hoặc 
          <input name="btnDangXuat" type="submit" class="btn-primary" id="btnDangXuat" value="Đăng Xuất">
        </form>
      </div>
      <div class="col-lg-12 update">
      	<form method="post" id="formUpdate" >
        <div class="col-lg-12"><input name="txtTaiKhoanUpdate" type="text" class="form-control" id="txtTaiKhoanUpdate" disabled value="<?php echo $_SESSION["user"]; ?>"></div>
        <div class="col-lg-12"><input class="form-control" name="txtMatKhauCu" placeholder="Mật Khẩu Cũ" type="password" id="txtMatKhauCu"></div>
        <div class="col-lg-12"><input class="form-control" name="txtMatKhauMoi" placeholder="Mật Khẩu Mới" type="password" id="txtMatKhauMoi"></div>
        <div class="col-lg-12"><input class="form-control" name="txtMatKhauXacNhan" placeholder="Xác Nhận Mật Khẩu" type="password" id="txtMatKhauXacNhan"></div>
        <div class="col-lg-12">
          <input class="btn btn-success" name="btnCapNhat" type="submit" id="btnCapNhat" value="Cập Nhật">
           <input class="btn btn-warning" name="btnThoatUd" type="button" id="btnThoatUd" value="Thoát" onclick="window.location='index.php'"> 
        </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>