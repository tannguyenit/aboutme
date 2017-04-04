<?php $arsUser=$this->session->userdata("arsUser");?>
<?php 

$get_url= "../admin/admin_user/profile/".$arsUser["id_user"];
  $url=$this->uri->segment(4);
 $id_user=$arsUser["id_user"];
  if ($url!=$id_user) {
    echo '<script> window.location.href="/'.$get_url.'"</script>' ; 
  }
?>
<div class="">
<div class="col-xs-12" id="message">
    <?php $this->load->view('templates/admin/thongbao');?>
</div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Trang cá nhân</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
            <div class="profile_img">
              <div id="crop-avatar">
              <?php 
              if ($arsUser['picture']!="") {
                  $url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$arsUser['picture'];
                  if(file_exists($url_pic)){//nếu tồn tai file thì xóa=>update
                    $pic=$arsUser['picture'];
                  }else{
                  $pic="user.png";
                }
                }
              ?>
            
              <img class="img-responsive avatar-view" src="<?php echo FILES."/".$pic."";?>" alt="Avatar" title="Change the avatar" style="height: 200px;width: 200px;"> </div>
            </div>
            <h3><?php echo $arUser["fullname"]?></h3>
            <input type="hidden" id="id_user" value="<?php echo $arsUser["id_user"]?>">
            <ul class="list-unstyled user_data">
              <li><i class="fa fa-map-marker user-profile-icon"></i> 
                <?php echo $arUser["address"]?> </li>
              <li> <i class="fa fa-briefcase user-profile-icon"></i> 
                <?php echo $arUser["workplace"]?> </li>
              <li class="m-top-xs"> <i class="fa fa-external-link user-profile-icon"></i>
                <a href="<?php echo $arUser["website"]?>" target="_blank"> 
                  <?php echo $arUser["website"]?> </a>
              </li>
            </ul> <a class="btn btn-success edit_profile" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="edit">
            </div>
            <br />
            <!-- start skills -->
            <!-- end of skills -->
          </div>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <!-- start of user-activity-graph -->
            <!-- end of user-activity-graph -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Các tin tức đã đăng</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li style="float: right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <ul class="messages">
                      <?php foreach ($arNews as $key=> $value) {
                        $date=strtotime($value["date"]); ?>
                      <li>
                        <div class="message_date">
                          <h3 class="date text-info"><?php echo date('d',$date)?></h3>
                          <p class="month">
                            <?php echo date( 'M',$date)?> </p>
                        </div>
                        <div class="message_wrapper">
                          <h4 class="heading"><?php echo $value["name"]?></h4>
                          <blockquote class="message">
                            <?php echo $value[ "preview_text"]?> </blockquote>
                          <br /> </div>
                      </li>
                      <?php }?> </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
