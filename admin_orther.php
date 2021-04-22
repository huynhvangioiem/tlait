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
	//KyNang
	date_default_timezone_set('asia/ho_chi_minh');
	if(isset($_POST['btnThem'])){
		$Ten=$_POST['txtSkillTitle'];
		$Lv=$_POST['txtSkillLv'];
		$date=date("Y-m-d H:i:s");
		$Result = mysqli_query($Conn,"Insert Into skill (Sk_Ten, Sk_Level, Sk_NgayUpdate) values ('$Ten', '$Lv','$date')") or die(mysqli_connect_error($Conn));
			echo '<script>alert("Thêm thành công!");</script>';
			echo '<meta http-equiv="refresh" content="0;" />';
	}
	//MucTieu
	if(isset($_POST['btnLuu'])){
		$value=$_POST['txtMucTieu'];
		$date=date("Y-m-d H:i:s");
		$Result = mysqli_query($Conn,"Update muctieu set Mt_values='$value', Mt_ngayUpdate='$date' where Mt_id=1") or die(mysqli_connect_error($Conn));
			echo '<script>alert("Cập nhật thành công!");</script>';
			echo '<meta http-equiv="refresh" content="0;" />';
	}
	//SoThich
	if(isset($_POST['btnThemSoThich'])){
		$Ten=$_POST['txtSoThich'];
		$date=date("Y-m-d H:i:s");
		$Result = mysqli_query($Conn,"Insert Into sothich (St_Ten, St_ngayThem) values ('$Ten','$date')") or die(mysqli_connect_error($Conn));
			echo '<script>alert("Thêm sở thích thành công!");</script>';
			echo '<meta http-equiv="refresh" content="0;" />';
	}
	//xoa
	if(isset($_GET["Sk_id"])){
		$id = $_GET["Sk_id"];	
		mysqli_query($Conn,"delete from skill where Sk_id = $id");
		echo '<meta http-equiv="refresh" content="0;admin_orther.php" />';
	}
	if(isset($_GET["St_id"])){
		$id = $_GET["St_id"];	
		mysqli_query($Conn,"delete from sothich where St_id = $id");
		echo '<meta http-equiv="refresh" content="0;admin_orther.php" />';
	}
	
?>
<body>
<div class="container">
	<div class="row text-center">
    <marquee>Bạn đã đăng nhập với tên <em><?php echo $_SESSION["user"]; ?></em>!</marquee>
    <div class="col-lg-12 title">
      <form name="formLogOut" action="" enctype="multipart/form-data" method="post" id="formLogOut">
      	Cập Nhật Thông Tin Hoặc 
      	<input name="btnDangXuat" type="submit" class="btn-primary" id="btnDangXuat" value="Đăng Xuất">
      </form>
    </div>
  </div>
	<div class="row text-center">
  	<div class="col-lg-4 orther_skill">
      <div class=" row title">Thông Tin Kỹ Năng</div>
    	<div class=" row">
      	<form  name="form_Skill" action="" enctype="multipart/form-data" method="post" id="form_Skill">
      	<table width="100%" border="0">
          <tr>
            <td><input name="txtSkillTitle" required type="text" class="form-control" id="txtSkillTitle" placeholder="Tên Kỹ Năng"></td>
            <td width="15%" align="center"><input name="txtSkillLv" type="text" class="form-control" id="txtSkillLv" required placeholder="Mức độ hoàn thiện"></td>
            <td width="15%" align="center"><input name="txtSkillLvMax" type="text" class="form-control" id="txtSkillLvMax" value="/5" readonly></td>
            <td><input name="btnThem" type="submit" class=" form-control btn btn-success" id="btnThem" value="Thêm"></td>
          </tr>
        </table>
        </form>
			</div>
      <div class=" row title">Danh Sách Kỹ Năng</div>
      <div class="row">
      	<table width="100%" border="1">
          <tr>
            <td align="center"><strong>STT</strong></td>
            <td align="center"><strong>Tên Kỹ Năng</strong></td>
            <td colspan="2" align="center"><strong>Mức độ Hoàn Thiện</strong></td>
            <td align="center"><strong>Tùy Chỉnh</strong></td>
          </tr>
          <?php 
						$Result = mysqli_query($Conn,"select * from skill") or die(mysqli_connect_error($Conn));
						$stt=1;
						while ($Row=mysqli_fetch_array($Result,MYSQLI_ASSOC)){
					?>
          <tr>
            <td align="center"><?php echo $stt; ?></td>
            <td><?php echo $Row['Sk_Ten']; ?></td>
            <td width="15%" align="center"><?php echo $Row['Sk_Level']; ?></td>
            <td width="15%" align="center">/5</td>
            <td width="25%" align="center"><a href="admin_orther.php?Sk_id=<?php echo $Row['Sk_id'];?>"><img src="img/icon/x-button.png"/></a></td>
          </tr>
          <?php $stt++;}?>
        </table>
      </div>
    </div>
    <div class="col-lg-4 orther_MucTieu">
    	<div class="row title">Mục Tiêu Nghề Nghiệp</div>
      <div class="row">
       <form name="form_MucTieu" action="" enctype="multipart/form-data" method="post" id="form_MucTieu">
        <table width="100%" border="0">
          <tr>
            <td><textarea name="txtMucTieu" class="form-control" id="txtMucTieu" placeholder="Mục Tiêu Nghề Nghiệp"><?php $Result = mysqli_query($Conn,"select * from muctieu") or die(mysqli_connect_error($Conn)); $row = mysqli_fetch_assoc($Result); echo $row['Mt_values']; ?></textarea></td>
            <td width="15%"><input name="btnLuu" type="submit" class="form-control btn btn-success" id="btnLuu" value="Cập Nhật"></td>
          </tr>
        </table>
       </form>
      </div>
    </div>
    <div class="col-lg-4 orther_SoThich">
    	<div class="row title">Thông Tin Sở Thích</div>
      <div class="row">
      	<form name="formSoThich" action="" method="post" enctype="multipart/form-data" id="formSoThich">
        	<table width="100%" border="0">
            <tr>
              <td><input name="txtSoThich" type="text" class="form-control" id="txtSoThich" placeholder="Sở Thích" required></td>
              <td width="15%"><input name="btnThemSoThich" type="submit" class="form-control btn btn-success" id="btnThemSoThich" value="Thêm"></td>
            </tr>
          </table>
        </form>
      </div>
      <div class="row title">Danh Sách Sở Thích</div>
      <div class="row">
      	<table width="100%" border="1">
          <tr>
            <td align="center"><strong>STT</strong></td>
            <td align="center"><strong>Sở Thích</strong></td>
            <td align="center"><strong>Ngày Thêm</strong></td>
            <td align="center"><strong>Tùy Chỉnh</strong></td>
          </tr>
          <?php 
						$Result = mysqli_query($Conn,"select * from sothich") or die(mysqli_connect_error($Conn));
						$stt=1;
						while ($Row=mysqli_fetch_array($Result,MYSQLI_ASSOC)){
					?>
          <tr>
            <td align="center"><?php echo $stt; ?></td>
            <td><?php echo $Row['St_Ten']; ?></td>
            <td align="center"><?php echo $Row['St_ngayThem']; ?></td>
            <td width="25%" align="center"><a href="admin_orther.php?St_id=<?php echo $Row['St_id'];?>"><img src="img/icon/x-button.png"/></a></td>
          </tr>
          <?php $stt++;} ?>
        </table>
      </div>
    </div>
  </div>
  <div class="row text-center"><input class="form-control btn btn-primary" name="btnThoat" type="button" id="btnThoat" value="Về Trang Đầu" onclick="window.location='index.php'"></div>
</div>
</body>
</html>