<?php session_start(); ?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>TIN HỌC T.L.A - admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="img/Untitled.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="style.css" type="text/css">
</head>
<?php 
	include_once('Connect.php');
	if(!isset($_SESSION["user"])) echo '<meta http-equiv="refresh" content="0;URL=login.php" />';
//DangXuat
	if(isset($_POST['btnDangXuat'])){
		session_destroy ();
		echo '<meta http-equiv="refresh" content="0;URL=index.php" />';
	}
//CapNhat
	if(isset($_POST['btnCapNhat'])){
		$Ten=$_POST['txtTen'];
		$NickName=$_POST['txtNickName'];
		$Caption=$_POST['txtCapTion'];
		$fileAnh=$_FILES["fileHinhAnh"];
		if($fileAnh['type']=="image/jpg"||$fileAnh['type']=="image/jpeg"||$fileAnh['type']=="image/png"||$fileAnh['type']=="image/gif"){
			$TenAnh =$fileAnh['name'];
			copy ($fileAnh['tmp_name'],"img/AnhDaiDien/".$TenAnh);
			$Result = mysqli_query($Conn,"Update avartar Set Ar_Ten='$Ten', Ar_nickName='$NickName', Ar_Caption='$Caption', Ar_Anh='$TenAnh' where Ar_id=0") or die(mysqli_connect_error($Conn));
			echo '<script>alert("Cập nhật thành công!");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=index.php" />';
		} else echo '<script>alert("Định dạng file không đúng vui lòng thử lại!");</script>';
	}
	//Hiển Thị Thông Tin
	$Result = mysqli_query($Conn,"select * from avartar where Ar_id=0") or die(mysqli_connect_error($Conn));
	$row = mysqli_fetch_assoc($Result);
	
?>
<script>
	 
</script>
<body>
<div class="container">
  <div class="row avartar">
  	<marquee>Bạn đã đăng nhập với tên <em><?php echo $_SESSION["user"]; ?></em>!</marquee>
    <div class="col-lg-12 title">
      <form name="formLogOut" action="" enctype="multipart/form-data" method="post" id="formLogOut">
      	Cập Nhật Thông Tin Đại Diện Hoặc 
      	<input name="btnDangXuat" type="submit" class="btn-primary" id="btnDangXuat" value="Đăng Xuất">
      </form>
    </div>
    <div class="col-lg-12">
      <form name="formAvartar" enctype="multipart/form-data" method="post" id="formUpdate" >
        <div class="row"><input name="txtTen" required type="text" placeholder="Họ Tên" class="form-control" id="txtTen" value="<?php echo $row['Ar_Ten'];?>"></div>
        <div class="row"><input class="form-control" name="txtNickName" placeholder="NickName" type="text" id="txtNickName" required value="<?php echo $row['Ar_nickName'];?>"></div>
        <div class="row"><input class="form-control" name="txtCapTion" placeholder="Captions" type="text" id="txtCapTion" required value="<?php echo $row['Ar_Caption'];?>"></div>
        <div class="row text-left" style="background-color:#E1C4FF">
         	<input name="fileHinhAnh" required type="file" id="fileHinhAnh" />
        </div>
        <div class="col-lg-12">
          <input class="btn btn-success" name="btnCapNhat" type="submit" id="btnCapNhat" value="Cập Nhật">
          <input class="btn btn-warning" name="btnThoat" type="button" id="btnThoatUd" value="Thoát" onclick="window.location='index.php'"> 
        </div>
      </form>
    </div>
</div>
</body>
</html>