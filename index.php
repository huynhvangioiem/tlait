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
 <meta name="google-site-verification" content="mN6d4OfBfDX3OfbH5mUMaZ_8BRoNau4vcbqmQiIgI3k" /><!--XacThucGoogle-->
 <title>Tin Học T.L.A</title>
 <link href="img/Untitled.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131274685-1"></script>
	<script>
  	window.dataLayer = window.dataLayer || [];
  	function gtag(){dataLayer.push(arguments);}
  	gtag('js', new Date());
	  gtag('config', 'UA-131274685-1');
	</script>
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
	.noiDungPhai .title {	background-color:<?php echo $row['MauNenTitle']; ?>; color:#000;	}
	.noiDungPhai h3 {	margin-top:5px;	margin-bottom:5px; }
	.noiDungPhai h3 img {	height:40px;	}
	#project div a img{		margin:auto;	}
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
         <a class="navbar-brand" href="/">TRANG CHỦ</a>
       </div>
       <div class=" collapse navbar-collapse" id="Menu">
        <ul class="nav navbar-nav">
         <li><a href="#contact">LIÊN HỆ</a></li>
         <li><a href="#project">KINH NGHIỆM - DỰ ÁN</a></li>
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
        	<div class="row title"><!--HocVan--><div class="col-lg-12"><h3><img class="img-circle" src="img/icon/if_student_309036.png"><strong> Học Vấn</strong></h3></div></div>
        	<div class="row">
            <ul>
            	<?php 
								$Result = mysqli_query($Conn,"select * from education ORDER BY Edu_id DESC;") or die(mysqli_connect_error($Conn));
								while ($Row=mysqli_fetch_array($Result,MYSQLI_ASSOC)){
							?>
            	<li><a href="<?php echo $Row['Edu_link']; ?>" target="_blank"><?php echo $Row['Edu_GiaTri']; ?></a></li>
              <?php }?>
            </ul>
          </div>
          <?php if(isset($_SESSION["user"])) 
						echo '
							<div class="row text-right">
								<a href="admin_Education.php" target="_self">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</a>
							</div>' 
					?><!--./HocVan-->
          <!--DuAnCuaToi-->
          <div class="row" id="project">
          	<div class="col-lg-12 title"><h3><img class="img-circle" src="img/icon/if_business-suitcase-glyph_763507.png"> <strong>Dự Án Của Tôi</strong></h3></div>
            <?php 
						$Result = mysqli_query($Conn,"select * from project ") or die(mysqli_connect_error($Conn));
						while ($Row=mysqli_fetch_array($Result,MYSQLI_ASSOC)){
							if($Row['Pj_Loai']==2){
					?>
          	<div class="col-lg-3"><h4><?php echo $Row['Pj_Ten']; ?></h4><iframe src="<?php echo $Row['Pj_Src']; ?>" width="100%" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div><?php }else {?>
           	<div class="col-lg-3"><h4><?php echo $Row['Pj_Ten']; ?></h4><a href="<?php echo $Row['Pj_Src']; ?>" target="_blank"><img class="img-responsive" src="img/Project/<?php echo $Row['Pj_TenFile']; ?>" width="100%"></a></div><?php }?>
            <?php }?>
          </div>
          <?php if(isset($_SESSION["user"])) 
						echo '
							<div class="row text-right">
								<a href="admin_project.php" target="_self">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</a>
							</div>' 
					?><!--./DuAnCuaToi-->
          <div class="row title"><div class="col-lg-12"><h3><img class="img-circle" src="img/icon/if_group2_309041.png"> <strong>Công Tác Xã Hội</strong></h3></div></div>
          <div class="row">
            <ul>
            	<?php 
								$Result = mysqli_query($Conn,"select * from volunteer ORDER BY Vl_id DESC;") or die(mysqli_connect_error($Conn));
								while ($Row=mysqli_fetch_array($Result,MYSQLI_ASSOC)){
							?>
            	
              <li><a target="_blank" href="<?php echo $Row['Vl_Link']; ?>"><?php echo $Row['Vl_GiaTri']; ?></a></li> 
             <?php }?>
            </ul>
          </div>
          <?php if(isset($_SESSION["user"])) 
						echo '
							<div class="row text-right">
								<a href="admin_volunteer.php" target="_self">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</a>
							</div>' 
					?>
          <div class="row title"><div class="col-lg-12"><h3><img class="img-circle" src="img/icon/if_sport_badges-02_2064033.png"> <strong>Thành Tích</strong></h3></div></div>
          <div class="row">
            <ul>
            	<?php 
								$Result = mysqli_query($Conn,"select * from thanhtich") or die(mysqli_connect_error($Conn));
								while ($Row=mysqli_fetch_array($Result,MYSQLI_ASSOC)){
							?>
            	
              <li><a target="_blank" href="<?php echo $Row['Tt_Link']; ?>"><?php echo $Row['Tt_GiaTri']; ?></a></li> 
             <?php }?>
            </ul>
          </div>
          <?php if(isset($_SESSION["user"])) 
						echo '
							<div class="row text-right">
								<a href="admin_thanhtich.php" target="_self">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</a>
							</div>' 
					?>
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
