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
	//ThemHoatDong
	date_default_timezone_set('asia/ho_chi_minh');
	if(isset($_POST['btnThem'])){
		$Ten=$_POST['txtTen'];
		$GiaTri=$_POST['txtGiaTri'];
		$Link=$_POST['txtLink'];
		$date=date("Y-m-d H:i:s");
		$Result = mysqli_query($Conn,"Insert Into volunteer (Vl_Ten, Vl_GiaTri, Vl_Link, Vl_Ngay) values ('$Ten', '$GiaTri','$Link','$date')") or die(mysqli_connect_error($Conn));
		echo '<script>alert("Thêm dự án thành công!");</script>';
		echo '<meta http-equiv="refresh" content="0;" />';
	}
	//xoa
	if(isset($_GET["id"])){
		$id = $_GET["id"];	
		mysqli_query($Conn,"delete from volunteer where Vl_id = $id");
		echo '<meta http-equiv="refresh" content="0;admin_volunteer.php" />';
	}
?>
<body>
<div class="container">
	<div class="row text-center">
  	<marquee>Bạn đã đăng nhập với tên <em><?php echo $_SESSION["user"]; ?></em>!</marquee>
    <div class="col-lg-12 title">
      <form name="formLogOut" action="" enctype="multipart/form-data" method="post" id="formLogOut">
      	Cập Nhật Thông Tin Hoạt Động Hoặc 
      	<input name="btnDangXuat" type="submit" class="btn-primary" id="btnDangXuat" value="Đăng Xuất">
      </form>
    </div>
    <div class="col-lg-12">
    	<form action="" method="post" enctype="multipart/form-data" name="formHoatDong" id="formHoatDong">
      	<div class="row"><input required class="form-control" name="txtTen" type="text" placeholder="Tên Hoạt Động" id="txtTen"></div>
        <div class="row"><input required class="form-control" name="txtGiaTri" type="text" placeholder="Giá Trị Hiển Thị" id="txtGiaTri"></div>
        <div class="row"><input required class="form-control" name="txtLink" type="text" placeholder="Liên kết" id="txtLink"></div>
        <div class="row"><input name="btnThem" class="btn btn-success" type="submit" id="btnThem" value="Thêm">&nbsp;<input name="btnThoat" class="btn btn-warning" type="button" id="btnThoat" value="Thoát" onclick="window.location='index.php'"></div>
      </form>
    </div>
    <div class="col-lg-12">
    	<div class="row title">Danh Sách Hoạt Động Đã Thêm</div>
      <div class="row">
      	<table width="100%" border="1">
          <tr>
            <td align="center"><strong>STT</strong></td>
            <td align="center"><strong>Tên</strong></td>
            <td align="center"><strong>Giá Trị</strong></td>
            <td align="center"><strong>Liên Kết</strong></td>
            <td align="center"><strong>Ngày Thêm</strong></td>
            <td align="center"><strong>Tùy Chỉnh</strong></td>
          </tr>
          <?php 
						$Result = mysqli_query($Conn,"select * from volunteer ORDER BY Vl_id DESC;") or die(mysqli_connect_error($Conn));
						$stt=1;
						while ($Row=mysqli_fetch_array($Result,MYSQLI_ASSOC)){
					?>
          <tr>
            <td align="center"><?php echo $stt; ?></td>
            <td><?php echo $Row['Vl_Ten']; ?></td>
            <td><?php echo $Row['Vl_GiaTri']; ?></td>
            <td><?php echo $Row['Vl_Link']; ?></td>
            <td align="center"><?php echo $Row['Vl_Ngay']; ?></td>
            <td align="center"><a href="admin_volunteer.php?id=<?php echo $Row['Vl_id'];?>"><img src="img/icon/x-button.png"/></a></td>
          </tr>
          <?php $stt++;}?>
        </table>

      </div>
    </div>
  </div>
  
</div>
</body>
</html>