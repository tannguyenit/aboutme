<?php if ($arEdit[ "banner"]!="" ) {
    $url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$arEdit['banner'];
    if(file_exists($url_pic)){
        $url=FILES. "/".$arEdit[ 'banner']. "";
    }else{
        $url=FILE_UPLOAD. "/upload.png"; 
    }
    }else{  $url=FILE_UPLOAD. "/upload.png"; 
} ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
            <h4 class="modal-title" id="myModalLabel">Sửa ảnh quảng cáo</h4> </div>
        <div class="modal-body">
            <form id="edit_adv" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="/admin/admin_adv/update">
                <div class="form-group">
                <input type="hidden" name="id_adv" value="<?php echo $arEdit["id_advs"]?>">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text"  required="required" class="form-control col-md-7 col-xs-12" name="ten" value="<?php echo $arEdit["name"]?>"> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Link<span class="required" value="<?php echo $arEdit["link"]?>">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="link" value="<?php echo $arEdit["link"]?>"> </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Hình ảnh</label>
                   <label for="image2" class="uploadimg">
                        <!-- lấy id -->
                        <input type="hidden" id="id_advs" value="<?php echo $arEdit["id_advs"]?>">
                        <!-- lấy name_pic -->
                        <input type="hidden" id="namepic_banner" value="<?php echo $arEdit["banner"]?>">
                        <!-- hiển thị -->
                        <div id="anhxoa_advs" style="display: none"></div>
                        <img id="datafile_advs" style="width:348px;height: 168px" src="<?php echo $url ?>" data-img="<?php echo FILE_UPLOAD.'/upload.png'?>" />
                        <input id="image2" onchange="test(this);" class="hide" type="file" name="hinhanh2" /> <a href="javascript:void(0)" onclick="xoaanh_adv()" class="removefile" title="Xóa ảnh">&times;</a>
                    </label>
                </div>
                <div class="form-group text-center">
                        <input type="submit"  class="btn btn-success " name="update" value="Cập Nhật">
                </div>
            </form>
        </div>
    </div>
</div>