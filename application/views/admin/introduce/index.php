<div class="col-xs-12" id="message">
    <?php $this->load->view('templates/admin/thongbao');?>
</div>
	<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Giới thiệu</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li style="float: right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="index_introduce" data-parsley-validate class="form-horizontal form-label-left" method="post" action="/admin/admin_introduce/update">

                      <div class="form-group">
                        <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Tiêu đề <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" name="name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $arIntroduce['name']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-1 col-sm-1 col-xs-12" for="last-name">Chi tiết <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                      <textarea class="ckeditor chitiet" name="detail_text" id="chitiet" style="width: 100%" ><?php echo $arIntroduce['detail_text']?></textarea>
                      
                  
                  </div>
                </div>
                <div class="form-group">
                        <div class="col-md-10 col-sm-10 col-xs-12 col-md-offset-3">
                          <input type="submit" class="btn btn-success" name="update" value="Cập nhật">
                        </div>
                      </div>
                        </div>

                      
                      </div>
                    
                   
                     
                      

                    </form>
                  </div>
                </div>
              </div>
            </div>


<script>
	jQuery(document).ready(function($) {
		$('.ckeditor').ckeditor();
	});
</script>