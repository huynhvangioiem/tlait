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
	//GiaoDien
	if(isset($_POST['btnLuu'])){
		$nenSocial=$_POST['txtMauNenSocial'];
		$chuSocial=$_POST['txtMauChuSocial'];
		$nenMenu=$_POST['txtMauNenMenu'];
		$chuMenu=$_POST['txtMauChuMenu'];
		$nenMenuHover =$_POST['txtMauNenMenuHover'];
		$chuMenuHover=$_POST['txtMauChuMenuHover'];
		$nenAvatar=$_POST['txtMauNenAvatar'];
		$chuAvatar=$_POST['txtMauChuAvatar'];
		$kieuAvatar=$_POST['slAvatar'];
		$nenTrai=$_POST['txtMauNenTrai'];
		$chuTrai=$_POST['txtMauChuTrai'];
		$chuTraiHover=$_POST['txtMauChuTraiHover'];
		$nenTitle=$_POST['txtMauNenTitle'];
		$chuTitle=$_POST['txtMauChuTitle'];
		$nenContent=$_POST['txtMauNenContent'];
		$chuContent=$_POST['txtMauChuContent'];
		$ContentHover=$_POST['txtMauChuContentHover'];
		$nenFooter=$_POST['txtMauNenFooter'];
		$chuFooter=$_POST['txtMauChuFooter'];
		$Result = mysqli_query($Conn,"Update giaodien set MauNenSocial='$nenSocial', MauChuSocial='$chuSocial', MauNenMenu='$nenMenu', MauChuMenu='$chuMenu', MauNenMenuHover='$nenMenuHover', MauNenChuHover='$chuMenuHover', MauNenAvatar='$nenAvatar', MauChuAvatar='$chuAvatar', KieuAvatar='$kieuAvatar', MauNenTrai='$nenTrai', MauChuTrai='$chuTrai', MauChuTraiHover='$chuTraiHover', MauNenTitle='$nenTitle', MauChuTitle='$chuTitle', MauNenContent='$nenContent', MauChuContent='$chuContent', MauChuContentHover='$ContentHover', MauNenFooter='$nenFooter', MauChuFooter='$chuFooter' where gd_id =1") or die(mysqli_connect_error($Conn));
		echo '<script>alert("Cập nhật thành công!");</script>';
		echo '<meta http-equiv="refresh" content="0;URL=admin_backgroud.php" />';
	}
	$Result = mysqli_query($Conn,"Select * From giaodien Where gd_id =1") or die(mysqli_connect_error($Conn));
	$row = mysqli_fetch_assoc($Result);	
?>
<body>
<div class="container">
	<div class="row text-center">
  	<marquee>Bạn đã đăng nhập với tên <em><?php echo $_SESSION["user"]; ?></em>!</marquee>
    <div class="col-lg-12 title">
      <form name="formLogOut" action="" enctype="multipart/form-data" method="post" id="formLogOut">
      	Cập Nhật Giao Diện Hoặc 
      	<input name="btnDangXuat" type="submit" class="btn-primary" id="btnDangXuat" value="Đăng Xuất">
      </form>
    </div>
    <div class="col-lg-7">
    	<form action="" method="post" id="id">
        <table width="95%" border="1" align="center">
          <tr>
            <td colspan="2" align="center" bgcolor="#00CC66"><strong>Đối Tượng</strong></td>
            <td align="center" bgcolor="#00CC66"><strong>Màu Nền</strong></td>
            <td align="center" bgcolor="#00CC66"><strong>Màu Chữ</strong></td>
            <td align="center" bgcolor="#00CC66"><p><strong>Thuộc Tính</strong></p>
            <p><strong> Khác</strong></p></td>
          </tr>
          <tr>
            <td colspan="2" align="center" bgcolor="#00CCFF">SociaMenu</td>
            <td bgcolor="#66FF66"><input type="color" name="txtMauNenSocial" id="txtMauNenSocial" value="<?php echo $row['MauNenSocial']; ?>"></td>
            <td bgcolor="#66FF66"><input type="color" name="txtMauChuSocial" id="txtMauChuSocial" value="<?php echo $row['MauChuSocial']; ?>"></td>
            <td height="35" align="left" bgcolor="#66FF66">&nbsp;</td>
          </tr>
          <tr>
            <td rowspan="2" align="center" bgcolor="#00CCFF">Menu</td>
            <td align="center" bgcolor="#00CCFF">Defaut</td>
            <td bgcolor="#66FF66"><input name="txtMauNenMenu" type="color" id="txtMauNenMenu" value="<?php echo $row['MauNenMenu']; ?>"></td>
            <td bgcolor="#66FF66"><input name="txtMauChuMenu" type="color" id="txtMauChuMenu" value="<?php echo $row['MauChuMenu']; ?>"></td>
            <td height="35" align="left" bgcolor="#66FF66">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" bgcolor="#00CCFF">Hover</td>
            <td bgcolor="#66FF66"><input name="txtMauNenMenuHover" type="color" id="txtMauNenMenuHover" value="<?php echo $row['MauNenMenuHover']; ?>"></td>
            <td bgcolor="#66FF66"><input name="txtMauChuMenuHover" type="color" id="txtMauChuMenuHover" value="<?php echo $row['MauNenChuHover']; ?>"></td>
            <td height="35" align="left" bgcolor="#66FF66">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" align="center" bgcolor="#00CCFF">Ảnh Đại Diện</td>
            <td bgcolor="#66FF66"><input name="txtMauNenAvatar" type="color" id="txtMauNenAvatar" value="<?php echo $row['MauNenAvatar']; ?>"></td>
            <td bgcolor="#66FF66"><input name="txtMauChuAvatar" type="color" id="txtMauChuAvatar" value="<?php echo $row['MauChuAvatar']; ?>"></td>
            <td height="35" align="left" bgcolor="#66FF66">Kiểu
              <select name="slAvatar" id="slAvatar">
                <option value="img-rounded" <?php if($row['KieuAvatar']=="img-rounded") echo 'selected="selected"'; ?>>rounded</option>
                <option value="img-circle" <?php if($row['KieuAvatar']=="img-circle") echo 'selected="selected"'; ?>>circle</option>
                <option value="img-thumbnail" <?php if($row['KieuAvatar']=="img-thumbnail") echo 'selected="selected"'; ?>>thumbnail</option>
            </select></td>
          </tr>
          <tr>
            <td colspan="2" align="center" bgcolor="#00CCFF">Thông Tin Trái</td>
            <td bgcolor="#66FF66"><input name="txtMauNenTrai" type="color" id="txtMauNenTrai" value="<?php echo $row['MauNenTrai']; ?>"></td>
            <td bgcolor="#66FF66"><input name="txtMauChuTrai" type="color" id="txtMauChuTrai" value="<?php echo $row['MauChuTrai']; ?>"></td>
            <td height="35" align="left" bgcolor="#66FF66">Hover                    
            <input name="txtMauChuTraiHover" type="color" id="txtMauChuTraiHover" value="<?php echo $row['MauChuTraiHover']; ?>"></td>
          </tr>
          <tr>
            <td rowspan="2" align="center" bgcolor="#00CCFF">Thông Tin Phải</td>
            <td align="center" bgcolor="#00CCFF">Tiêu đề</td>
            <td bgcolor="#66FF66"><input name="txtMauNenTitle" type="color" id="txtMauNenTitle" value="<?php echo $row['MauNenTitle']; ?>"></td>
            <td bgcolor="#66FF66"><input name="txtMauChuTitle" type="color" id="txtMauChuTitle" value="<?php echo $row['MauChuTitle']; ?>"></td>
            <td height="35" align="left" bgcolor="#66FF66">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" bgcolor="#00CCFF">Nội Dung</td>
            <td bgcolor="#66FF66"><input name="txtMauNenContent" type="color" id="txtMauNenContent" value="<?php echo $row['MauNenContent']; ?>"></td>
            <td bgcolor="#66FF66"><input name="txtMauChuContent" type="color" id="txtMauChuContent" value="<?php echo $row['MauChuContent']; ?>"></td>
            <td height="35" align="left" bgcolor="#66FF66">Hover
              <input name="txtMauChuContentHover" type="color" id="txtMauChuContentHover" value="<?php echo $row['MauChuContentHover']; ?>"></td>
          </tr>
          <tr>
            <td colspan="2" align="center" bgcolor="#00CCFF">Footer</td>
            <td bgcolor="#66FF66"><input name="txtMauNenFooter" type="color" id="txtMauNenFooter" value="<?php echo $row['MauNenFooter']; ?>"></td>
            <td bgcolor="#66FF66"><input name="txtMauChuFooter" type="color" id="txtMauChuFooter" value="<?php echo $row['MauChuFooter']; ?>"></td>
            <td height="35" align="left" bgcolor="#66FF66">&nbsp;</td>
          </tr>
          <tr>
            <td height="35" colspan="5" align="center" bgcolor="#00FF99"><input name="btnLuu" type="submit" class="btn btn-success" id="btnLuu" value="Lưu">
            <input name="btnHuy" type="reset" class=" btn btn-danger"	 id="btnHuy" value="Hủy"onclick="window.location=''"></td>
          </tr>
        </table>
      </form>
    </div>
    <div class="col-lg-5">
    	<table width="100%" border="1" align="center">
        <tr>
          <td height="35" colspan="3" align="right" bgcolor="#CCCCCC" class="ReSocia">Login</td>
        </tr>
        <tr>
          <td align="left" bgcolor="#993300" class="ReMenu">Trang Chủ</td>
          <td width="20%" align="left" bgcolor="#FFFF00" class="ReMenuHover">Liên Hệ</td>
          <td width="38%" height="35" align="left" bgcolor="#993300" class="ReMenu">&nbsp;</td>
        </tr>
        <tr>
          <td class="ReAvatar" width="42%" rowspan="3" bgcolor="#3300FF"><p><img src="img/AnhDaiDien/AnhDaiDien2.jpg" width="50" height="50" class="img-rounded"></p>
          <p>Tôi Là Ai</p></td>
          <td height="35" colspan="2" bgcolor="#FF9900" class="ReTitle">Tiêu Đề 1</td>
        </tr>
        <tr>
          <td height="35" colspan="2" bgcolor="#00FFCC" class="ReContentHover">Nội Dung</td>
        </tr>
        <tr>
          <td height="35" colspan="2" bgcolor="#FF9900" class="ReTitle">Tiêu Đề 2</td>
        </tr>
        <tr>
          <td class="ReTrai" width="42%" rowspan="5" align="left" bgcolor="#00CC99">0335687425                  <p>fb/huynhvangioiem</p></td>
          <td height="35"colspan="2" bgcolor="#66FFFF" class="ReContent">Nội Dung</td>
        </tr>
        <tr>
          <td height="35"colspan="2" bgcolor="#FFCC00" class="ReTitle">Tiêu Đề 3</td>
        </tr>
        <tr>
          <td height="35"colspan="2" bgcolor="#66FFFF" class="ReContent">Nội Dung</td>
        </tr>
        <tr>
          <td height="35"colspan="2" bgcolor="#FFCC00" class="ReTitle">Tiêu Đề 4</td>
        </tr>
        <tr>
          <td height="35"colspan="2" bgcolor="#66FFFF" class="ReContent">Nội Dung</td>
        </tr>
        <tr>
          <td height="35" colspan="3" bgcolor="#CCCCCC" class="ReFooter"> Copyright &copy; 2018 Tin Học TLA</td>
        </tr>
      </table>
    </div>
  </div>
  <div class="row"><input class="form-control btn btn-primary" name="btnTrangChu" type="button" value="Xem Trang Chủ" onclick="window.location='index.php'"></div>
</div>	
<script>
	$(document).ready(function(e) {
    var nenSocial=$('#txtMauNenSocial').val();
		$('.ReSocia').css("background-color",nenSocial);
		$('#txtMauNenSocial').change(function(e) {
			nenSocial=$('#txtMauNenSocial').val(); 
			$('.ReSocia').css("background-color",nenSocial);
		});
		var chuSocial=$('#txtMauChuSocial').val();
		$('.ReSocia').css("color",chuSocial);
		$('#txtMauChuSocial').change(function(e) {
 			chuSocial=$('#txtMauChuSocial').val();
			$('.ReSocia').css("color",chuSocial);
    });
		var nenMenu=$('#txtMauNenMenu').val();
		$('.ReMenu').css("background-color",nenMenu);
		$('#txtMauNenMenu').change(function(e) {
			nenMenu=$('#txtMauNenMenu').val();
			$('.ReMenu').css("background-color",nenMenu);
    });
		var chuMenu=$('#txtMauChuMenu').val();
		$('.ReMenu').css("color",chuMenu);
		$('#txtMauChuMenu').change(function(e) {
			chuMenu=$('#txtMauChuMenu').val();
			$('.ReMenu').css("color",chuMenu);
    });
		var nenMenuHover =$('#txtMauNenMenuHover').val();
		$('.ReMenuHover').css("background-color",nenMenuHover);
		$('#txtMauNenMenuHover').change(function(e) {
			nenMenuHover =$('#txtMauNenMenuHover').val();
			$('.ReMenuHover').css("background-color",nenMenuHover);
    });
		var chuMenuHover=$('#txtMauChuMenuHover').val();
		$('.ReMenuHover').css("color",chuMenuHover);
		$('#txtMauChuMenuHover').change(function(e) {
			chuMenuHover=$('#txtMauChuMenuHover').val();
			$('.ReMenuHover').css("color",chuMenuHover);
    });
		var nenAvatar=$('#txtMauNenAvatar').val();
		$('.ReAvatar').css("background-color",nenAvatar);
		$('#txtMauNenAvatar').change(function(e) {
			nenAvatar=$('#txtMauNenAvatar').val();
			$('.ReAvatar').css("background-color",nenAvatar);
    });
		var chuAvatar=$('#txtMauChuAvatar').val();
		$('.ReAvatar').css("color",chuAvatar);
		$('#txtMauChuAvatar').change(function(e) {
			chuAvatar=$('#txtMauChuAvatar').val();
			$('.ReAvatar').css("color",chuAvatar);
    });
		var kieuAvatar=$('#slAvatar').val();
		$('.ReAvatar img').addClass(kieuAvatar);
		$('#slAvatar').change(function(e) {
			kieuAvatar=$('#slAvatar').val();
			$('.ReAvatar img').removeClass();
			$('.ReAvatar img').addClass(kieuAvatar);
    });
		var nenTrai=$('#txtMauNenTrai').val();
		$('.ReTrai').css("background-color",nenTrai);
		$('#txtMauNenTrai').change(function(e) {
			nenTrai=$('#txtMauNenTrai').val();
			$('.ReTrai').css("background-color",nenTrai);
    });
		var chuTrai=$('#txtMauChuTrai').val();
		$('.ReTrai').css("color",chuTrai);
		$('#txtMauChuTrai').change(function(e) {
			chuTrai=$('#txtMauChuTrai').val();
			$('.ReTrai').css("color",chuTrai);
    });
		var chuTraiHover=$('#txtMauChuTraiHover').val();
		$('.ReTrai p').css("color",chuTraiHover);
		$('#txtMauChuTraiHover').change(function(e) {
			chuTraiHover=$('#txtMauChuTraiHover').val();
			$('.ReTrai p').css("color",chuTraiHover);
    });
		var nenTitle=$('#txtMauNenTitle').val();
		$('.ReTitle').css("background-color",nenTitle);
		$('#txtMauNenTitle').change(function(e) {
			nenTitle=$('#txtMauNenTitle').val();
			$('.ReTitle').css("background-color",nenTitle);
    });
		var chuTitle=$('#txtMauChuTitle').val();
			$('.ReTitle').css("color",chuTitle);
			$('.ReTitle').css("font-weight","bold");
		$('#txtMauChuTitle').change(function(e) {
			chuTitle=$('#txtMauChuTitle').val();
			$('.ReTitle').css("color",chuTitle);
			$('.ReTitle').css("font-weight","bold");
    });
		var nenContent=$('#txtMauNenContent').val();
		$('.ReContent, .ReContentHover').css("background-color",nenContent);
		$('#txtMauNenContent').change(function(e) {
			nenContent=$('#txtMauNenContent').val();
			$('.ReContent,.ReContentHover').css("background-color",nenContent);
    });
		var chuContent=$('#txtMauChuContent').val();
		$('.ReContent').css("color",chuContent);
		$('#txtMauChuContent').change(function(e) {
			chuContent=$('#txtMauChuContent').val();
			$('.ReContent').css("color",chuContent);
    });
		var ContentHover=$('#txtMauChuContentHover').val();
		$('.ReContentHover').css("color",ContentHover);
		$('#txtMauChuContentHover').change(function(e) {
			ContentHover=$('#txtMauChuContentHover').val();
			$('.ReContentHover').css("color",ContentHover);
    });
		var nenFooter=$('#txtMauNenFooter').val();
		$('.ReFooter').css("background-color",nenFooter);
		$('#txtMauNenFooter').change(function(e) {
			nenFooter=$('#txtMauNenFooter').val();
			$('.ReFooter').css("background-color",nenFooter);
    });
		var chuFooter=$('#txtMauChuFooter').val();
		$('.ReFooter').css("color",chuFooter);
		$('#txtMauChuFooter').change(function(e) {
			chuFooter=$('#txtMauChuFooter').val();
			$('.ReFooter').css("color",chuFooter);
    });
  });
</script>
</body>
</html>
