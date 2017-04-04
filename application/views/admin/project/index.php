<div class="col-xs-12" id="message">
    <?php $this->load->view('templates/admin/thongbao');?>
</div>
<div class="col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-bars"></i> Quản lý dự án</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Dự án</a> </li>
                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> Thêm dự án mới</a> </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <div class="x_content">
                            <table class="table table-hover table-stripped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Mô tả</th>
                                        <th>Link</th>
                                        <th>Hình ảnh</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; 
                                    foreach ($arPro as $key=> $value) {
                                      $id=$value["id_projects"]; 
                                      if ($value["picture"]=="") {
                                       $picture="Không có hình"; 
                                     }else{
                                   $url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$value['picture'];
                                          if(file_exists($url_pic)){//nếu tồn tai file thì xóa=>update
                                           $picture='<img src="'.FILES.'/'. $value["picture"].' " alt="" width="100px" height="100px" " />';
                                          }else{
                                            $picture="Lỗi ảnh gốc"; 
                                          }
                                        }?>
                                  <tr data-id="<?=$id;?>">
                                    <td>
                                        <?php echo $i?>
                                    </td>
                                    <td>
                                        <?php echo $value["name"]?>
                                    </td>
                                    <td>
                                        <?php echo $value["preview_text"]?>
                                    </td>
                                    <td>
                                        <?php echo $value["link"]?>
                                    </td>
                                    <td>
                                        <?php echo $picture;?>
                                    </td>
                                    <td style="width: 12%;text-align: center;">
                                    <a href="" data-toggle="modal" data-target=".bs-example-modal-lg" class="edit_projects"><i class="fa fa-edit"></i></a>
                                    <a href="/admin/admin_project/del/<?php echo $value['id_projects']?>" title="" class="del_projects"><i class="fa fa-trash"></i></a>
                                    </td>
                                  </tr>
                                  <?php $i++;}?> </tbody>
                            </table>
                        </div>
                        <div class="col-xs-12 text-center">
                        <ul class="pagination pagination-split" id="phantrang">
                           <?php echo $pagination; ?>
                        </ul>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        <form id="index_project" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="/admin/admin_project/add" method="post">
                            <div class="form-group">
                                <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Tên <span class="required">*</span> </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <input type="text" name="ten" class="form-control col-md-7 col-xs-12"> </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-1 col-sm-1 col-xs-12" >Link<span class="required">*</span> </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <input type="text" name="link" required="required" class="form-control col-md-7 col-xs-12"> </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-1 col-sm-1 col-xs-12">Hình ảnh</label>
                                <label for="image" class="uploadimg">
                                    <div id="anhxoa" style="display: none"></div> <img id="datafile" src="<?php echo FILE_UPLOAD.'/upload.png'?>" data-img="<?php echo FILE_UPLOAD.'/upload.png'?>" />
                                    <input id="image" class="hide required" type="file" name="hinhanh"  required/> <a href="javascript:void(0)" class="removefile" title="Xóa ảnh">&times;</a> </label>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-1 col-sm-1 col-xs-12">Mô tả</label>
                                <div class="col-sm-10 col-xs-12">
                                    <textarea class="ckeditor" id="mota" style="width: 100%" name="mota"></textarea>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-10 col-sm-10 col-xs-12 col-md-offset-3">
                                    <input type="submit" class="btn btn-primary" name="them" value="Thêm">
                                    <button type="reset" class="btn btn-success">Nhập lại</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="edit"> </div>