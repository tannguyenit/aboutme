<div class="col-xs-12" id="message">
    <?php $this->load->view('templates/admin/thongbao');?>
</div>
<div class="col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-bars"></i> Quản lý câu nói hay</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"> Câu nói hay </a> </li>
                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> Thêm câu nói hay </a> </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <div class="x_content">
                            <table class="table table-hover table-stripped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nội dung</th>
                                        <th>Tác giả</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($arSay as $key=> $value) { 
                                    	$id=$value["id_saying"]?>
                                    <tr data-id="<?=$id;?>">
                                        <td>
                                            <?php echo $i?>
                                        </td>
                                        <td>
                                            <?php echo $value["content"]?>
                                        </td>
                                        <td>
                                            <?php echo $value["author"]?>
                                        </td>
                                        <td style="width: 12%;text-align: center;">
                                        <a href="" data-toggle="modal" data-target=".bs-example-modal-lg" class="edit_say"><i class="fa fa-edit"></i></a>
                                        <a href="/admin/admin_say/del/<?php echo $value['id_saying']?>" title="" class=""><i class="fa fa-trash"></i></a> </td>
                                    </tr>
                                    <?php $i++;}?> </tbody>
                            </table>
                            <div class="col-xs-12 text-center">
                        <ul class="pagination pagination-split" id="phantrang">
                           <?php echo $pagination; ?>
                        </ul>
                        </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        <form id="index_say" data-parsley-validate class="form-horizontal form-label-left" action="/admin/admin_say/add" method="post">
                            <div class="form-group">
                                <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Tác giả<span class="required">*</span> </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <input type="text" name="author" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-1 col-sm-1 col-xs-12">Nội dung</label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <textarea class="ckeditor" required="required" style="width: 100%" name="content"></textarea>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-10 col-sm-10 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary" name="them">Thêm</button>
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
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="edit">
	
</div>
