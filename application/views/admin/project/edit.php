<?php if ($arEdit[ "picture"]!="" ) {
    $url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$arEdit['picture'];
    if(file_exists($url_pic)){
        $url=FILES. "/".$arEdit[ 'picture']. "";
    }else{
        $url=FILE_UPLOAD. "/upload.png"; 
    }
    }else{  $url=FILE_UPLOAD. "/upload.png"; 
} ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
            <h4 class="modal-title" id="myModalLabel">Sửa Dự Án</h4> </div>
        <div class="modal-body">
            <form id="edit_project" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="/admin/admin_project/update">
                <div class="form-group">
                    <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Tên <span class="required">*</span> </label>
                    <input type="hidden" name="id_projects" value="<?php echo $arEdit["id_projects"]?>">
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <input type="text" name="ten" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $arEdit["name"]?>"> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1 col-sm-1 col-xs-12" for="last-name">Link<span class="required" >*</span> </label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <input type="text" name="link" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $arEdit["link"]?>"> </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-1 col-sm-1 col-xs-12">Hình ảnh</label>
                    <label for="image2" class="uploadimg">
                        <!-- lấy id -->
                        <input type="hidden" id="id_projects" value="<?php echo $arEdit["id_projects"]?>">
                        <!-- lấy name_pic -->
                        <input type="hidden" id="namepic_project" value="<?php echo $arEdit["picture"]?>">
                        <!-- hiển thị -->
                        <div id="anhxoa_project" style="display: none"></div>
                        <img id="datafile_project" style="width:348px;height: 168px" src="<?php echo $url ?>" data-img="<?php echo FILE_UPLOAD.'/upload.png'?>" />
                        <input id="image2" onchange="test(this);" class="hide" type="file" name="hinhanh2" /> <a href="javascript:void(0)" onclick="xoaanh_project()" class="removefile" title="Xóa ảnh">&times;</a>
                    </label>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1 col-sm-1 col-xs-12">Mô tả</label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <textarea class="ckeditor" style="width: 100%" id="mota_edit" name="mota"><?php echo $arEdit[ "preview_text"]?> </textarea>
                     </div>
                </div>
                <div class="form-group text-center">
                        <input type="submit"  class="btn btn-success " name="update" value="Cập Nhật">
                </div>
            </form>
        </div>
    </div>
</div>