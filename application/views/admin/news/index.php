<div class="col-xs-12" id="message">
  <?php $this->load->view('templates/admin/thongbao');?>
</div>
<div class="col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-bars"></i> Quản lý tin tức</small></h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Tất cả các tin</a> </li>
          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> Thêm tin tức</a> </li>
        </ul>
        <div id="myTabContent" class="tab-content">
          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
            <div>
              <div class=" filterable">
                <div class="well">
                <form class="form-inline" action="/admin/admin_news/index" method="post">
                    <div class="form-group">
                      <label for="email">Tên:</label>
                      <input type="text" class="form-control" name="text" id="email" placeholder="Nhập tên tìm kiếm">
                    </div>
                    <div class="form-group">
                      <label for="sel1">Danh mục:</label>
                      <select class="form-control" id="sel1" name="danhmuctin">
                        <option value="">- Tất cả -</option>
                        <?php foreach ($nameCat as $key=> $value){;?>
                        <option value="<?php echo $value["id_cat"] ?>">
                          <?php echo $value["name"]?> </option>
                        <?php }?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="sel1">Trạng thái:</label>
                      <select class="form-control" id="sel1" name="trangthai">
                        <option value="">- Tất cả -</option>
                        <option value="1">Đã kích hoạt</option>
                        <option value="0">Chưa kích hoạt</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <input  name="search" type="submit" class="btn btn-default" value="Search">
                    </div>
              </form>
                </div>
                <form action="/admin/admin_news/delete" method="post" accept-charset="utf-8">
                  <div>
                    <table class="table table-bordered js-filter-table" id="news_table">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Tên</th>
                          <th style="width: 100px">Danh mục</th>
                          <th>Trạng thái</th>
                          <th>Hình ảnh</th>
                          <th>Chức năng</th>
                          <th>
                            <input type="checkbox" id="delAll" value="">
                            <input type="submit" id="del_all_news" name="delete" value="Xóa"> </th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php $i=1;
                        foreach ($arNews as $key=> $value) { 
                        $id=$value["id_news"]; 
                        if ($value["picture"]=="") {
                         $picture="Không có hình"; 
                         }else{ 
                         $url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$value['picture']; 
                         if(file_exists($url_pic)){//nếu tồn tai file thì xóa=>update 
                            $picture=' <img src="'.FILES.'/'. $value["picture"].' " alt="" width="100px" height="100px" " />';
                          }else{
                            $picture="Lỗi ảnh gốc "; 
                          }
                        }
                        if ($value["is_active"]==1) {
                           $checked='checked'; 
                         }else{
                           $checked='';
                        }?>
                        <tr data-id_news="<?=$id;?>">
                        <td>
                          <?php echo $i?> </td>
                        <td>
                          <?php echo $value["name"]?> </td>
                        <td>
                          <?php echo $value["tendanhmuc"]?> </td>
                        <td>
                        <div class="switch">
                            <input type="checkbox" name="toggle" onclick="get(<?php echo $value["id_news"]?>)" id="news_<?php echo $value["id_news"]?>" value=<?php echo $value["is_active"]?>
                            <?php echo $checked;?>/>
                            <label for="toggle"><i></i> </label>
                          </div>
                        </td>
                        <td>
                          <?php echo $picture;?> </td>
                        <td style="width: 10%;text-align: center;">
                          <a href="javascript:void(0)" data-toggle="modal" data-target=".bs-example-modal-lg" class="edit_news"><i class="fa fa-edit"></i></a>  </td>
                        <td>
                          <input type="checkbox" name="del_news[]" id="del_news[]" value="<?php echo $value["id_news"]?>"> </td>
                        </tr>
                        <?php $i++;} ?>
                      </tbody>
                    </table>
                </form>
                </div>
              </div>
            </div>
            </form>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
            <form id="index_news" data-parsley-validate class="form-horizontal form-label-left" action="/admin/admin_news/add" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Tên tin<span class="required">*</span> </label>
                <div class="col-md-10 col-sm-10 col-xs-12">
                  <input type="text" id="ten" required="required" class="form-control col-md-7 col-xs-12" name="tentin"> </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-1 col-sm-1 col-xs-12" for="sel1">Danh mục</label>
                <div class="col-md-10 col-sm-10 col-xs-12">
                  <select class="form-control" id="sel1" name="danhmuctin">
                    <?php foreach ($nameCat as $key=> $value){;?>
                    <option value="<?php echo $value["id_cat"] ?>">
                      <?php echo $value["name"]?> </option>
                    <?php }?> </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-1 col-sm-1 col-xs-12" for="last-name">Mô tả<span class="required">*</span> </label>
                <div class="col-md-10 col-sm-10 col-xs-12">
                  <textarea name="mota" id="mota" style="width: 100%"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-1 col-sm-1 col-xs-12">Hình ảnh</label>
                <label for="image" class="uploadimg">
                  <div id="anhxoa" style="display: none"></div> <img id="datafile" src="<?php echo FILE_UPLOAD.'/upload.png'?>" data-img="<?php echo FILE_UPLOAD.'/upload.png'?>" />
                  <input id="image" class="hide" type="file" name="hinhanh" /> <a href="javascript:void(0)" class="removefile" title="Xóa ảnh">&times;</a> </label>
              </div>
              <div class="form-group">
                <label class="control-label col-md-1 col-sm-1 col-xs-12">Chi tiết</label>
                <div class="col-md-10 col-sm-10 col-xs-12">
                  <textarea class="ckeditor" id="chitiet" style="width: 100%" name="chitiet"></textarea>
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
