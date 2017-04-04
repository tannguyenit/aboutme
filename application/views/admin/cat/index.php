<div class="col-xs-12" id="message">
    <?php $this->load->view('templates/admin/thongbao');?>
</div>
<div class="col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-bars"></i> Quản lý danh mục</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Danh mục</a> </li>
                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> Thêm danh mục mới</a> </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <div class="x_content">
                            <table class="table table-hover table-stripped">
                                <thead>
                                    <tr class="w3-green">
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($arCat as $key=> $value) {?>
                                    <tr data-id="<?=$value['id_cat']?>">
                                        <td>
                                            <?php echo $i?>
                                        </td>
                                        <td>
                                            <?php echo $value["name"]?>
                                        </td>
                                        <td style="width: 15%;text-align: center;">
                                        <a class="edit_cat" href="" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-edit"></i></a>
                                        <a href="/admin/admin_cat/del_cat/<?php echo $value["id_cat"]?>" title="" id="del"><i class="fa fa-trash"></i></a> </td>
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
                        <form id="index_cat" data-parsley-validate class="form-horizontal form-label-left" method="post" action="/admin/admin_cat/add_cat">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên <span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="tendm" id="tendm_check"
                                    class="form-control col-md-7 col-xs-12"> </div>
                                    <div id="error"></div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <input type="submit" class="btn btn-primary" name="them" value="Thêm">
                                    <input type="reset" class="btn btn-success" value="Nhập lại">
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

