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
	//ThemDuAn
	date_default_timezone_set('asia/ho_chi_minh');
	if(isset($_POST['btnThem'])){
		$Ten=$_POST['txtTen'];
		$Src=$_POST['txtLink'];
		$Loai=$_POST['slLoaiHienThi'];
		$date=date("Y-m-d H:i:s");
		$fileAnh=$_FILES["fileDemo"];
		$TenAnh =$fileAnh['name'];
		if(!$TenAnh==null){
			if($fileAnh['type']=="image/jpg"||$fileAnh['type']=="image/jpeg"||$fileAnh['type']=="image/png"||$fileAnh['type']=="image/gif"){	
				copy ($fileAnh['tmp_name'],"img/Project/".$TenAnh);
				$Result = mysqli_query($Conn,"Insert Into project (Pj_Ten, Pj_Src, Pj_Loai, Pj_TenFile, Pj_NgayThem) values ('$Ten', '$Src',$Loai,'$TenAnh','$date')") or die(mysqli_connect_error($Conn));
				echo '<script>alert("Thêm dự án thành công!");</script>';
				echo '<meta http-equiv="refresh" content="0;" />';
			}	else echo '<script>alert("Định dạng file không hợp lê. Vui lòng thử lại sau!");</script>';
		} else {
			$TenAnh ="";
			$Result = mysqli_query($Conn,"Insert Into project (Pj_Ten, Pj_Src, Pj_Loai, Pj_TenFile, Pj_NgayThem) values ('$Ten', '$Src',$Loai,'$TenAnh','$date')") or die(mysqli_connect_error($Conn));
			echo '<script>alert("Thêm dự án thành công!");</script>';
			echo '<meta http-equiv="refresh" content="0;" />';
		}
	}
	//xoa
	if(isset($_GET["id"])){
		$id = $_GET["id"];	
		mysqli_query($Conn,"delete from project where Pj_id = $id");
		echo '<meta http-equiv="refresh" content="0;admin_project.php" />';
	}
?>
<body>
<div class="container">
	<div class="row text-center">
    <marquee>Bạn đã đăng nhập với tên <em><?php echo $_SESSION["user"]; ?></em>!</marquee>
    <div class="col-lg-12 title">
      <form name="formLogOut" action="" enctype="multipart/form-data" method="post" id="formLogOut">
      	Cập Nhật Thông Tin Dự Án Hoặc 
      	<input name="btnDangXuat" type="submit" class="btn-primary" id="btnDangXuat" value="Đăng Xuất">
      </form>
    </div>
    <div class="col-lg-12">
    	<form action="" method="post" enctype="multipart/form-data" id="formProject">
      	<div class="row"><input required name="txtTen" class="form-control" placeholder="Tên dự án" type="text" id="txtTen"></div>
        <div class="row"><input arequired name="txtLink" class="form-control" placeholder="Nguồn hoặc liên kết" type="text" id="txtLink"></div>
        <div class="row">
          <table width="100%" border="0">
            <tr>
              <td width="115" align="left" bgcolor="#EFEFEF">Hiển thị theo: </td>
              <td >
                <select name="slLoaiHienThi" id="slLoaiHienThi" class="form-control">
                  <option value="1">Liên Kết Thực Tế</option>
                  <option value="2">Src Demo</option>
                </select>
              </td>
            </tr>
          </table>
				</div>
        <div class="row">
        	<table width="100%" border="0">
            <tr>
              <td width="200" align="left" bgcolor="#EFEFEF">Tập tin demo (nếu có):</td>
              <td><input name="fileDemo" class="form-control" type="file"  id="fileDemo"></td>
            </tr>
          </table>
				</div>
        <div class="row"><input name="btnThem" class="btn btn-success" type="submit" id="btnThem" value="Thêm">&nbsp;<input name="btnThoat" class="btn btn-warning" type="button" id="btnThoat" value="Thoát" onclick="window.location='index.php'"></div>
      </form>
    </div>
    <div class="col-lg-12">
    	<div class="row title">Danh Sách Dự Án Đã Thêm</div>
      <div class="row">
      	<table width="100%" border="1">
          <tr>
            <td align="center"><strong>STT</strong></td>
            <td align="center"><strong>Tên Dự Án</strong></td>
            <td align="center"><strong>Src</strong></td>
            <td align="center"><strong>Loại Hiển Thị</strong></td>
            <td align="center"><strong>File Demo</strong></td>
            <td align="center"><strong>Ngày Thêm</strong></td>
            <td align="center"><strong>Tùy Chỉnh</strong></td>
          </tr>
          <?php 
						$Result = mysqli_query($Conn,"select * from project") or die(mysqli_connect_error($Conn));
						$stt=1;
						while ($Row=mysqli_fetch_array($Result,MYSQLI_ASSOC)){
					?>
          <tr>
            <td><?php echo $stt;?></td>
            <td><?php echo $Row['Pj_Ten']; ?></td>
            <td><?php echo $Row['Pj_Src']; ?></td>
            <td><?php if($Row['Pj_Loai']==1)echo "Liên kết thực tế"; else echo "Src Demo"; ?></td>
            <td><?php echo $Row['Pj_TenFile']; ?></td>
            <td><?php echo $Row['Pj_NgayThem']; ?></td>
            <td align="center"><a href="admin_project.php?id=<?php echo $Row['Pj_id'];?>"><img src="img/icon/x-button.png"/></a></td>
          </tr>
          <?php $stt++; }?>
        </table>

      </div>
    </div>
  </div>
</div>
</body>
</html>