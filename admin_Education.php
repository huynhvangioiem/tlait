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
	//ThemHV
	date_default_timezone_set('asia/ho_chi_minh');
	if(isset($_POST['btnThem'])){
		$Ten=$_POST['txtTen'];
		$GiaTri=$_POST['txtGiaTri'];
		$link=$_POST['txtLink'];
		$NienKhoa=$_POST['txtNienKhoa'];
		$date=date("Y-m-d H:i:s");
		$Result = mysqli_query($Conn,"Insert Into education (Edu_Ten, Edu_GiaTri, Edu_link, Edu_NienKhoa, Edu_NgayThem) values ('$Ten', '$GiaTri','$link','$NienKhoa','$date')") or die(mysqli_connect_error($Conn));
			echo '<script>alert("Thêm học vấn thành công!");</script>';
			echo '<meta http-equiv="refresh" content="0;" />';
	}
	//xoa
	if(isset($_GET["id"])){
		$id = $_GET["id"];	
		mysqli_query($Conn,"delete from education where Edu_id = $id");
		echo '<meta http-equiv="refresh" content="0;admin_Education.php" />';
	}
?>
<body>
<div class="container">
	<div class="row text-center">
    <marquee>Bạn đã đăng nhập với tên <em><?php echo $_SESSION["user"]; ?></em>!</marquee>
    <div class="col-lg-12 title">
      <form name="formLogOut" action="" enctype="multipart/form-data" method="post" id="formLogOut">
      	Cập Nhật Thông Tin Học Vấn Hoặc 
      	<input name="btnDangXuat" type="submit" class="btn-primary" id="btnDangXuat" value="Đăng Xuất">
      </form>
    </div>
    <div class="col-lg-12">
  	<form action="" method="post" enctype="multipart/form-data" name="formHocVan" id="formHocVan">
    	<div class="row"><input name="txtTen" class="form-control" type="text" required placeholder="Tên Thuộc Tính" id="txtTen"></div>
      <div class="row"><input name="txtGiaTri" class="form-control" type="text" required placeholder="Giá Trị Hiển Thị" id="txtGiaTri"></div>
      <div class="row"><input name="txtLink" class="form-control" type="text" required placeholder="Link" id="txtLink"></div>
      <div class="row"><input required name="txtNienKhoa" class="form-control" type="text" placeholder="Niên Khóa" id="txtNienKhoa"></div>
      <div class="row"><input name="btnThem" class="btn btn-success" type="submit" id="btnThem" value="Thêm">&nbsp;<input name="btnThoat" class="btn btn-warning" type="button" id="btnThoat" value="Thoát" onclick="window.location='index.php'"></div>
    </form>
  	</div>
    <div class="col-lg-12">
    	<div class="row title">Danh Sách Học Vấn Đã Thêm</div>
      <div class="row">
      	<table width="100%" border="1">
          <tr>
            <td align="center"><strong>STT</strong></td>
            <td align="center"><strong>Tên</strong></td>
            <td align="center"><strong>Giá Trị</strong></td>
            <td align="center"><strong>Niên Khóa</strong></td>
            <td align="center"><strong>Liên Kết</strong></td>
            <td align="center"><strong>Ngày Thêm</strong></td>
            <td align="center"><strong>Tùy Chỉnh</strong></td>
          </tr>
          <?php 
						$Result = mysqli_query($Conn,"select * from education ORDER BY Edu_id DESC;") or die(mysqli_connect_error($Conn));
						$stt=1;
						while ($Row=mysqli_fetch_array($Result,MYSQLI_ASSOC)){
					?>
          <tr>
            <td align="center"><?php echo $stt; ?></td>
            <td><?php echo $Row['Edu_Ten']; ?></td>
            <td><?php echo $Row['Edu_GiaTri']; ?></td>
            <td align="center"><?php echo $Row['Edu_NienKhoa']; ?></td>
            <td ><?php echo $Row['Edu_link']; ?></td>
            <td align="center"><?php echo $Row['Edu_NgayThem']; ?></td>
            <td align="center"><a href="admin_Education.php?id=<?php echo $Row['Edu_id'];?>"><img src="img/icon/x-button.png"/></a></td>
          </tr>
          <?php $stt++;}?>
        </table>
      </div>
    </div>
  </div>
</div>
</body>
</html>