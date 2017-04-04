<!DOCTYPE html>
<html lang="en">
<head>
<?php 
 $arsUser=$this->session->userdata("arsUser");

if ($arsUser['picture']!="") {
    $url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$arsUser['picture'];
    if(file_exists($url_pic)){//nếu tồn tai file thì xóa=>update
      $pic=$arsUser['picture'];
    }else{
    $pic="user.png";
  }
   
  }else{
    $pic="user.png";
  }
  if ($arsUser['first_name']!="") {
    $name=$arsUser['first_name'].' '.$arsUser['last_name'];
  }else{
    $name=$arsUser['fullname'];
  }
?>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trang quản trị</title>
  <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/css/style.css">
  

    <!-- Custom Theme Style -->
    <link href="<?php echo ADMIN_URL ?>/css/custom.min.css" rel="stylesheet">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">

        <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
         <div class="navbar nav_title" style="border: 0;"> <a href="" class="site_title"><i class="fa fa-group"></i> <span><?php if ($arsUser['id_user']==1) {
           echo "ADMIN";
         }else{ echo "Member";}?></span></a>
          </div>
          <div class="clearfix"></div>
          <!-- menu profile quick info -->
          <div class="profile">
            <div class="profile_pic"> <img src="<?php echo FILES."/".$pic."";?>" alt="..." class="img-circle profile_img"> </div>
            <div class="profile_info"> <span>Xin chào</span>
              <h2><?php echo $name?></h2>
              </div>
          </div>
          <!-- /menu profile quick info -->
          <br />
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section active">
              <ul class="nav side-menu" style="">
                <li><a href="/admin/admin_index" style="height: 40px;margin-top: 50px;
"><i class="fa fa-home"></i> </a> </li>
                <li class="active"><a><i class="fa fa-edit"></i> Quản lý hồ sơ <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: block;">
                    
                    <li><a href="/admin/admin_introduce">Giới thiêu</a></li>
                    <li><a href="/admin/admin_news" title="">Tin tức</a></li>
                     <li><a href="/admin/admin_cat" title="">Danh mục</a></li>
                    <li><a href="/admin/admin_project" title="">Dự án</a></li>                  
                    <?php  if ($arsUser["id_user"]==1 ) {?>
                    <li><a href="/admin/admin_user" title="">Người dùng</a></li>
                    <?php }?>
                    <li><a href="/admin/admin_contact" title="">Liên hệ</a></li>
                    <li><a href="/admin/admin_say" title="">Câu nói hay</a></li>
                    <li><a href="/admin/admin_adv" title="">Quảng cáo</a></li>
                    <li><a href="/admin/admin_slide" title="">Ảnh trình chiếu</a></li>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
            

          </div>
          
        </div>
      </div>
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle"> <a id="menu_toggle"><i class="fa fa-bars"></i></a> </div>
            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img src="<?php echo FILES."/".$pic."";?>" alt=""><?php echo $name?></a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="/admin/admin_user/profile/<?php echo $arsUser["id_user"];?>"> Profile</a>
                  </li>
                  </li>
                  <li><a href="/admin/Admin_loguot"><i class="fa fa-sign-out pull-right"></i>Log Out</a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>