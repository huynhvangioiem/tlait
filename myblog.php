<?php 
	session_start(); 
	include_once('Connect.php');		
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="keywords" content="Tin Học T.L.A,tin học tla, T.L.A, tla, tin học, tin hoc tla" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Tin Học T.L.A</title>
 <link href="img/Untitled.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <script src="vendor/ckeditor/ckeditor.js"></script>
</head>
<?php 
	$Result = mysqli_query($Conn,"Select * From giaodien Where gd_id =1") or die(mysqli_connect_error($Conn));
	$row = mysqli_fetch_assoc($Result);	
?>
<script>
	$(document).ready(function(e) {
			$('#Menu li').hover(
				function(){
					$('ul',this).slideDown(100);
				},
				function(){
					$('ul',this).slideUp(100);
				}
			);
	});
</script>
<style>
	/* CSS sociaMenu */
	.socia {		text-align:center; background:<?php echo $row['MauNenSocial']; ?>; color:<?php echo $row['MauChuSocial']; ?>;		}
	.socia div { text-align:right;	}
	.fa {
		font-size: 25px;			text-align: center;	 color: white;
		text-decoration: none;			margin: 5px 2px;			border-radius: 50%;
	}
	.fa:hover {opacity: 0.7;		}
	.fa-facebook {		 background: #3B5998; padding: 5px 10.35px;		}
	.fa-youtube {		 background: #bb0000; padding: 5px 6.75px;	}
	.fa-rss {			background: #ff6600; padding: 5px 7.7px;}
	.fa-sign-in {			background: #009900; padding: 5px 6.75px;}
	/* CSS MenuNgang */
	.MenuNgang .navbar-default, .MenuNgang .dropdown-menu {		background-color:<?php echo $row['MauNenMenu']; ?>;		}
	.MenuNgang .navbar-default .navbar-brand,.MenuNgang .navbar-default .navbar-nav > li > a,.MenuNgang .dropdown-menu> li > a {		color:<?php echo $row['MauChuMenu']; ?>;			border-right: #fff 1px solid;		}
	.MenuNgang .navbar-default .navbar-brand:hover,.MenuNgang .navbar-default .navbar-nav > li > a:hover, .MenuNgang .dropdown-menu> li > a:hover {		color:<?php echo $row['MauNenChuHover']; ?>;		background-color:<?php echo $row['MauNenMenuHover']; ?>;		}
	/* CSS noiDung */
	.noiDung{		background-color:#CFF;	}
	/* CSS noiDungTrai */
	.noiDungTrai{	background-color:<?php echo $row['MauNenTrai']; ?>;	color:<?php echo $row['MauChuTrai']; ?>;		font-family:"Times New Roman", Times, serif;			}
	.nenAnh {		
		background-color:<?php echo $row['MauNenAvatar']; ?>;
		text-align:center;	
		color:<?php echo $row['MauChuAvatar']; ?>;
	}
	.noiDungTrai .anhDaiDien{	margin:auto;	margin-top:15px;	}
	.noiDungTrai .contact{	padding-left:10px;	}
	.noiDungTrai .contact a{	color:<?php echo $row['MauChuTrai']; ?>;		}
	.noiDungTrai .contact a:hover h4,.noiDungTrai .contact a:hover{	
			color:<?php echo $row['MauChuTraiHover']; ?>;	text-decoration:none;	font-weight:bold;
	}
	/* CSS Skill */
	.Skill h3, .MucTieu h3, .SoThich h3{	padding-left:8px;		}
	.Skill h4,.SoThich h4,.MucTieu p {	padding-left:10px;		}
	.Skill .color_Star{	color:#F90;		}
	/* CSS noiDungPhai */
	.noiDungPhai, .noiDungPhai a  {	color:<?php echo $row['MauChuContent']; ?>;		font-size:20px;		}
	.noiDungPhai a:hover {		color:<?php echo $row['MauChuContentHover']; ?>;		font-weight:bold;			text-decoration:none;		}
	.noiDungPhai ul {	padding-left:30px;	}
	.noiDungPhai li {	list-style-type:disc;	}
	.noiDungPhai .title {	background-color:<?php echo $row['MauNenTitle']; ?>; color:#000; font-weight:bold;	}
	.noiDungPhai h3 {	margin-top:5px;	margin-bottom:5px; }
	.noiDungPhai h3 img {	height:40px;	}
	#project div a img{		margin:auto;	}
	.post {color:#000;}
	.post .date {font-size:14px;}
	.post .content{font-size:16px; margin-top:5px;}
	/* End of CSS noiDung */
</style>
<body>
	<div class="container">
  	<div class="row socia"><!--SociaMenu-->
      <div class="col-md-8"></div>
      <div class="col-md-3">
        <a href="https://www.facebook.com/huynhvangioiem" target="_blank"><i class="fa fa-facebook"aria-hidden="true"></i></a>
        <a href="https://www.youtube.com/channel/UCUjya8sBXS40uYW5S1Yi7sA?view_as=subscriber" target="_self"><i class="fa fa-youtube" aria-hidden="true"></i></a>
        <a href="https://vn.000webhost.com/members/website/list" target="_blank"><i class="fa fa-rss" aria-hidden="true"></i></a>
        <a href="login.php" target="<?php if(isset($_SESSION["user"])) echo '_self';else echo '_blank';?>"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
        
      </div>
      <div class="col-md-1"></div>
    </div><!--./SociaMenu-->
    <div class="row Banner"><!--Banner-->
    </div><!--./Banner-->
    <div class="row MenuNgang"><!--MenuNgang-->
     <nav class="navbar navbar-default Menu" style="margin-bottom:5px; border-top:none;"><!--navbar-->
      <div class="container-fluid">
       <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#Menu">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
        </button>
         <a class="navbar-brand" href="index.php">TRANG CHỦ</a>
       </div>
       <div class=" collapse navbar-collapse" id="Menu">
        <ul class="nav navbar-nav">
         <li><a href="#contact">LIÊN HỆ</a></li>
         <li><a href="index.php#project">KINH NGHIỆM - DỰ ÁN</a></li>
         <li><a href="myblog.php">MY BLOG</a></li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">LIÊN KẾT KHÁC <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="https://nhatkytoilaai.blogspot.com/" target="_blank">T.L.A Nhật Ký Và Những Dòng Thơ </a></li>
            <li><a href="https://tinhoctla.wordpress.com/" target="_blank">TLA-IT &#8211; Đam Mê Là Không Có Giới Hạn</a></li>
            <li><a href="#"></a></li>
          </ul>
        </li>
        </ul>
       </div>
      </div>
     </nav>
    </div><!--./MenuNgang-->
    <div class="row noiDung"><!--NoiDung-->
    	<div class="col-lg-3 noiDungTrai"><!--Trai-->
      <?php //Hiển Thị Thông Tin Đại Diện
	$ResDaiDien= mysqli_query($Conn,"select * from avartar where Ar_id=0") or die(mysqli_connect_error($Conn));
	$rowDD = mysqli_fetch_assoc($ResDaiDien);?>
      	<div class="row nenAnh">
        	<a target="_blank" href="https://www.facebook.com/huynhvangioiem">
          	<img class="img-responsive <?php echo $row['KieuAvatar']; ?> anhDaiDien" src="<?php echo "img/AnhDaiDien/".$rowDD['Ar_Anh']; ?>">
          </a>
       	</div>
        <div class="row Ten nenAnh">
        	<h2><strong><?php echo $rowDD['Ar_Ten'];?></strong><br><em><?php echo $rowDD['Ar_nickName'];?></em></h2>
          <h4><?php echo $rowDD['Ar_Caption'];?></h4>
        </div>
        <?php if(isset($_SESSION["user"])) 
					echo '
						<div class="row nenAnh">
							<a href="admin_Avartar.php" target="_self">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
        		</div>' 
				?>
        <!--contact-->
        <div  id="contact"class="row contact">
        <?php
					//Hiển Thị Thông Tin Liên Hệ
					$ResContact= mysqli_query($Conn,"select * from contact where Ct_TrangThai=1 ") or die(mysqli_connect_error($Conn));
					while ($RowCt=mysqli_fetch_array($ResContact,MYSQLI_ASSOC)){
				?>
          <a href="<?php echo $RowCt['Ct_link']; ?>"><h4><img class="img-circle" src="img/icon/<?php echo $RowCt['Ct_icon']; ?>">&nbsp; <?php echo $RowCt['Ct_GiaTri']; ?></h4></a>
        <?php }?>
        </div>
        <?php if(isset($_SESSION["user"])) 
					echo '
						<div class="row contact text-center">
							<a href="admin_contact.php" target="_self">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
        		</div>' 
				?>
        <!--./contact-->
        <div class="row Skill"><!--Skill-->
        	<h3>Kỹ Năng</h3>
          <h4><table width="90%">
          <?php
					//Hiển Thị Thông Tin Kỹ Năng
					$ResSkill= mysqli_query($Conn,"select * from skill") or die(mysqli_connect_error($Conn));
					while ($Row_Sk=mysqli_fetch_array($ResSkill,MYSQLI_ASSOC)){
					?>
            <tr>
              <td><?php echo $Row_Sk['Sk_Ten']; ?></td>
              <td>
							<?php 
								for ($x = 1; $x <= $Row_Sk['Sk_Level']; $x++)echo '<span class="glyphicon glyphicon-star color_Star" aria-hidden="true"></span> ';
								for ($x = 1; $x <= 5-$Row_Sk['Sk_Level']; $x++)echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span> ';
							?>
              </td>
            </tr>
            <?php }?>
          </table></h4>
        </div><!--./Skill-->
         <div class="row MucTieu"><!--MucTieu-->
         <h3>Mục Tiêu Nghề Nghiệp</h3>
         	<p><?php $Result = mysqli_query($Conn,"select * from muctieu") or die(mysqli_connect_error($Conn)); $row = mysqli_fetch_assoc($Result); echo $row['Mt_values']; ?></p>
         </div><!--./MucTieu-->
         <div class="row SoThich"><!--SoThich-->
           <h3>Sở Thích</h3>
           <h4>
           	<ul>
            	<?php 
								$Result = mysqli_query($Conn,"select * from sothich") or die(mysqli_connect_error($Conn));
								while ($Row=mysqli_fetch_array($Result,MYSQLI_ASSOC)){
							?>
            	<li><?php echo $Row['St_Ten']; ?></li>
              <?php }?>
            </ul>
           </h4>
        </div><!--./SoThich-->
        <?php if(isset($_SESSION["user"])) 
					echo '
						<div class="row contact text-center">
							<a href="admin_orther.php" target="_self">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
        		</div>' 
				?>
      </div><!--./Trai-->
      <div class="col-lg-9 noiDungPhai"><!--Phai-->
      	<div class="row">
        	<form action="" name="formNewPost" method="post" enctype="multipart/form-data" id="formNewPost">
          	<input name="txtTitle" type="text" id="txtTitle" class="form-control" placeholder="Tiêu Đề">
            <textarea name="txtPostContent" cols="" rows="" id="txtPostContent"></textarea>
            <script language="javascript">
									
										CKEDITOR.replace( 'txtPostContent',
										{
											skin : 'kama',
											extraPlugins : 'uicolor',
											uiColor: '#eeeeee',
											toolbar : [ ['Source','DocProps','-','Save','NewPage','Preview','-','Templates'],
											['Cut','Copy','Paste','PasteText','PasteWord','-','Print','SpellCheck'],
											['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
											['Form','Checkbox','Radio','TextField','Textarea','Select','Button','ImageButton','HiddenField'],
											['Bold','Italic','Underline','StrikeThrough','-','Subscript','Superscript'],
											['OrderedList','UnorderedList','-','Outdent','Indent','Blockquote'],
											['JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'],
											['Link','Unlink','Anchor'],
											['Image','Flash','Table','Rule','Smiley','SpecialChar'],
											['Style','FontFormat','FontName','FontSize'],
											['TextColor','BGColor'],, [ 'UIColor' ] ]
										});
										
									</script>
          </form>
        </div>
      	<div class="row post">
        	<div class="col-lg-12 title">Tiêu Đề Bài Viết</div>
          <div class="col-lg-12 date">23/11/1999 08:00</div>
          <div class="col-lg-12 content"><div>
	B&agrave;i viết n&agrave;y t&ocirc;i rất đồng quan điểm với t&aacute;c giả. Ng&agrave;y xưa ở những v&ugrave;ng qu&ecirc; ngh&egrave;o miền t&acirc;y như ch&uacute;ng t&ocirc;i, ai ai cũng c&oacute; một ước mơ cho con học thật giỏi, thật cao, rồi l&ecirc;n S&agrave;i G&ograve;n l&agrave;m việc chỉ với hy vọng c&oacute; thể đổi đời. Dần dần qua từng thế hệ, đ&oacute; đ&atilde; trở th&agrave;nh th&oacute;i quen trong suy nghĩ của nhiều người. Nhưng ng&agrave;y nay khi mọi mặt của đời sống được n&acirc;ng cao kh&aacute; nhiều. Th&igrave; thực trạng &quot;tha hương cầu thực&quot; lại ng&agrave;y c&agrave;ng gia tăng. Bởi lẽ phần lớn bạn trẻ ng&agrave;y nay kh&ocirc;ng c&ograve;n tha thiết với nghề n&ocirc;ng truy&ecirc;n thống, nhiều người c&oacute; đều kiện đi học ở c&aacute;c th&agrave;nh phố lớn, để rồi khi ra trường, kh&ocirc;ng việc g&igrave; bạn phải về qu&ecirc; khi đ&atilde; c&oacute; c&ocirc;ng việc ngay tại th&agrave;nh phố. Ti&ecirc;u cực một ch&uacute;t, c&oacute; bạn nghĩ rằng, về qu&ecirc; l&agrave;m việc lương ba cọc ba đồng l&agrave;m sao xứng đ&aacute;ng với tấm bằng Đại học Danh tiếng ở th&agrave;nh phố..v.v Cũng c&oacute; những người ch&aacute;n nản với cảnh phải xa nh&agrave;, tha thiết muốn về qu&ecirc; lập nghiệp, nhưng c&acirc;u hỏi đặt ra l&agrave;, về qu&ecirc; r m&igrave;nh sẽ l&agrave;m g&igrave;. Liệu số tiền &iacute;t ỏi c&oacute; đủ nu&ocirc;i sống bản th&acirc;n gia đ&igrave;nh. Thế l&agrave; đ&agrave;nh ngậm ng&ugrave;i chịu cảnh xa qu&ecirc;. V&agrave; cứ như vậy, hết l&yacute; do n&agrave;y đến l&yacute; do kh&aacute;c. T&igrave;nh trạng người d&acirc;n xa qu&ecirc;, t&igrave;nh trạng kẹt xe sau lễ, tết vẫn chưa dừng lại.</div>
</div>
          <div class="col-lg-12 author text-right">T.L.A</div>
        </div>
      </div><!--./Phai-->
    </div><!--./NoiDung-->
    <div class="row panel-footer"><!--NoiDung-->
    	<h4 style="float:left">Copyright &copy; 2018 Tin Học TLA</h4>
      <?php
        $CountFile = "index.log";
        $CF = fopen ($CountFile, "r");
        $Views = fread ($CF, filesize ($CountFile));
        fclose ($CF);
        $Views++; 

        $CF = fopen ($CountFile, "w");
        fwrite ($CF, $Views); 
        fclose ($CF); 
        echo '<h4 style="float:right">Lượt truy cập: '.$Views.'</h4>';
      ?>
    </div><!--./NoiDung-->
  </div>
</body>
</html>
