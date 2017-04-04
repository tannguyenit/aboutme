          <!-- top tiles -->
          <?php $sum=0;foreach ($total_read as $key => $value) {
                $sum=$sum+$value["read"];

              }?>
      <?php
      $year=date("Y");
       $mounth=date("m");
$mounth; $year; $d; 
switch ( $mounth ) { 
    case 1: 
    case 3: 
    case 5: 
    case 7: 
    case 8: 
    case 10: 
    case 12: 
        $arNgay=("$ngay1,$ngay2,$ngay3,$ngay4,$ngay5,$ngay6,$ngay7,$ngay8,$ngay9,$ngay10,$ngay11,$ngay12,$ngay13,$ngay14,$ngay15,$ngay16,$ngay17,$ngay18,$ngay19,$ngay20,$ngay21,$ngay22,$ngay23,$ngay24,$ngay25,$ngay26,$ngay27,$ngay28,$ngay29,$ngay30,$ngay31,");
        break; 
    case 4: 
    case 6: 
    case 9: 
    case 11: 
        $arNgay=("$ngay1,$ngay2,$ngay3,$ngay4,$ngay5,$ngay6,$ngay7,$ngay8,$ngay9,$ngay10,$ngay11,$ngay12,$ngay13,$ngay14,$ngay15,$ngay16,$ngay17,$ngay18,$ngay19,$ngay20,$ngay21,$ngay22,$ngay23,$ngay24,$ngay25,$ngay26,$ngay27,$ngay28,$ngay29,$ngay30,");
        break; 
    case 2: 
        if( $year % 100 != 0 && $year % 4 == 0 ) { 
           $arNgay=("$ngay1,$ngay2,$ngay3,$ngay4,$ngay5,$ngay6,$ngay7,$ngay8,$ngay9,$ngay10,$ngay11,$ngay12,$ngay13,$ngay14,$ngay15,$ngay16,$ngay17,$ngay18,$ngay19,$ngay20,$ngay21,$ngay22,$ngay23,$ngay24,$ngay25,$ngay26,$ngay27,$ngay28,$ngay29,");
        } else { 
           $arNgay=("$ngay1,$ngay2,$ngay3,$ngay4,$ngay5,$ngay6,$ngay7,$ngay8,$ngay9,$ngay10,$ngay11,$ngay12,$ngay13,$ngay14,$ngay15,$ngay16,$ngay17,$ngay18,$ngay19,$ngay20,$ngay21,$ngay22,$ngay23,$ngay24,$ngay25,$ngay26,$ngay27,$ngay28,");
        } 
        break; 
   
}  


      ?>
<div class="bbb" data-list="<?php echo $arNgay?>" style="display: hidden"></div>
<div class="col-xs-12" id="message">
    <?php $this->load->view('templates/admin/thongbao');?>
</div>
          <div class="row tile_count">
            <div class="col-md-3 col-sm-3 col-xs-12 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Thành viên</span>
              <div class="count green"><?php echo $total_user?></div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Tổng số lượt xem tin</span>
              <div class="count green"><?php echo $sum?></div>
              
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Tổng số người liên hệ</span>
              <div class="count green"><?php echo $total_contact ?></div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Tổng số tin tức</span>
              <div class="count green"><?php echo $total_news?></div>
            </div>
            
          </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Biểu đồ lượt đọc trong tuần</h3>
                  </div>
                  
                </div>

                <div class=" col-xs-12">
                  <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                  <div style="width: 100%;">
                    <div id="canvas_dahs" class="demo-placeholder" style="width: 100%; height:270px;"></div>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <br />
<!--  -->
        </div>
      </div>
    </div>


