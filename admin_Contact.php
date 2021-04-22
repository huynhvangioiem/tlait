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
	if(isset($_POST['btnThem'])){
		$Ten=$_POST['txtTen'];
		$GiaTri=$_POST['txtGiaTri'];
		$Link=$_POST['txtLink'];
		$fileIcon=$_FILES["fileIcon"];
		$TrangThai=$_POST['RadioTTHienThi'];
		if($fileIcon['type']=="image/jpg"||$fileIcon['type']=="image/jpeg"||$fileIcon['type']=="image/png"||$fileIcon['type']=="image/gif"){
			$TenIcon =$fileIcon['name'];
			copy ($fileIcon['tmp_name'],"img/icon/".$TenIcon);
			$Result = mysqli_query($Conn,"Insert Into contact (Ct_Ten, Ct_GiaTri, Ct_link, Ct_TrangThai, Ct_icon) values ('$Ten', '$GiaTri','$Link', $TrangThai, '$TenIcon')") or die(mysqli_connect_error($Conn));
			echo '<script>alert("Cập nhật thành công!");</script>';
			echo '<meta http-equiv="refresh" content="0;" />';
		} else echo '<script>alert("Định dạng icon không đúng vui lòng thử lại!");</script>';
	}	
	if(isset($_GET["id"])){
		$id = $_GET["id"];	
		mysqli_query($Conn,"delete from contact where Ct_id = $id");
		echo '<meta http-equiv="refresh" content="0;admin_contact.php" />';
	}
?>
<script>
	 
</script>
<body>
<div class="container">
  <div class="row avartar">
  	<marquee>Bạn đã đăng nhập với tên <em><?php echo $_SESSION["user"]; ?></em>!</marquee>
    <div class="col-lg-12 title">
      <form name="formLogOut" action="" enctype="multipart/form-data" method="post" id="formLogOut">
      	Cập Nhật Thông Tin Liên Hệ Hoặc 
      	<input name="btnDangXuat" type="submit" class="btn-primary" id="btnDangXuat" value="Đăng Xuất">
      </form>
    </div>
    <div class="col-lg-12">
      <form name="formAvartar" enctype="multipart/form-data" method="post" id="formUpdate" >
        <div class="row"><input name="txtTen" type="text" placeholder="Tên Thông Tin" class="form-control" id="txtTen" required value=""></div>
        <div class="row"><input class="form-control" name="txtGiaTri" placeholder="Giá Trị Hiển Thị" type="text" id="txtGiaTri" required value=""></div>
        <div class="row"><input class="form-control" name="txtLink" placeholder="Liên kết (nếu có)" required type="text" id="txtLink" value=""></div>
        <div class="row">
        	<table width="100%">
            <tr>
              <td align="left" bgcolor="#E2D2F9">Icon</td>
              <td><input class="form-control" name="fileIcon" type="file" id="fileIcon" required value=""></td>
            </tr>
          </table>
        </div>
        <div class="row text-left" style="background-color:#E5E5E5;">Trạng thái hiển thị: 	
            <label><input name="RadioTTHienThi" type="radio" id="RadioTTHienThi_0" value="1" checked="CHECKED"> Có</label>&nbsp;
            <label><input type="radio" name="RadioTTHienThi" value="0" id="RadioTTHienThi_1"> Không</label>
        </div>
        <div class="col-lg-12">
          <input class="btn btn-success" name="btnThem" type="submit" id="btnThem" value="Thêm">
          <input class="btn btn-warning" name="btnThoat" type="button" id="btnThoatUd" value="Thoát" onclick="window.location='index.php'"> 
        </div>
      </form>
    </div>
    <div class="row">
    	<table width="90%" border="1" align="center" class="table-responsive">
        <tr>
          <td colspan="7" align="center"><strong>Danh Sách Các Thông Tin Đã Thêm</strong></td>
        </tr>
        <tr>
        	<td align="center" bgcolor="#0099CC"><strong>STT</strong></td>
          <td align="center" bgcolor="#0099CC"><strong>Tên Thông Tin</strong></td>
          <td align="center" bgcolor="#0099CC"><strong>Giá Trị</strong></td>
          <td align="center" bgcolor="#0099CC"><strong>Liên Kết</strong></td>
          <td align="center" bgcolor="#0099CC"><strong>Icon</strong></td>
          <td align="center" bgcolor="#0099CC"><strong>Hiển Thị</strong></td>
          <td align="center" bgcolor="#0099CC"><strong>Xóa</strong></td>
        </tr>
        <?php 
					$Result = mysqli_query($Conn,"select * from contact") or die(mysqli_connect_error($Conn));
					$stt=1;
					while ($Row=mysqli_fetch_array($Result,MYSQLI_ASSOC)){
				?>
        <tr>
        	<td bgcolor="#33FF33"><?php echo $stt; ?></td>
          <td bgcolor="#33FF33"><?php echo $Row['Ct_Ten']; ?></td>
          <td bgcolor="#33FF33"><?php echo $Row['Ct_GiaTri']; ?></td>
          <td bgcolor="#33FF33"><?php echo $Row['Ct_link']; ?></td>
          <td bgcolor="#33FF33"><img src="img/icon/<?php echo $Row['Ct_icon']; ?>" /></td>
          <td bgcolor="#33FF33"><?php if($Row['Ct_TrangThai']==1) echo "Có"; else echo "Không" ?></td>
          <td bgcolor="#33FF33"><a href="admin_contact.php?id=<?php echo $Row['Ct_id']; ?>"><img src="img/icon/x-button.png"/></a></td>
        </tr>
        <?php $stt++;}?>
      </table>

    </div>
</div>
</body>
</html>