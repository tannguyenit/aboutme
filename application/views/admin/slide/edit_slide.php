<?php if ($arEdit["picture"]=="") {
	$url=FILE_UPLOAD."/upload.png";
}else{
	$url=FILES."/".$arEdit['picture']."";
	} ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
            <h4 class="modal-title" id="myModalLabel">Sửa ảnh slide</h4> </div>
        <div class="modal-body">
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="/admin/admin_slide/update">
                <div class="form-group">
                <input type="hidden" name="id_slide" value="<?php echo $arEdit["id_slide"]?>">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên <span class="required">*</span> </label>
                    <input type="hidden" name="id_slide" value="<?php echo $arEdit["id_slide"]?>">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text"  required="required" class="form-control col-md-7 col-xs-12" name="ten" value="<?php echo $arEdit["name"]?>"> </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Hình ảnh</label>
                    <label for="image2" class="uploadimg">
				<div id="anhxoa" style="display: none"></div>
			        <img id="datafile" src="<?php echo $url ?>" data-img="<?php echo FILE_UPLOAD.'/upload.png'?>"/>
				       <input id="image2" onchange="test(this);" class="hide"  type="file" name="hinhanh2" />
				       <a href="javascript:void(0)" onclick="xoaanh()" class="removefile" title="Xóa ảnh">&times;</a>
			    </label>
                </div>
                <div class="form-group text-center">
                        <input type="submit"  class="btn btn-success " name="update" value="Cập Nhật">
                </div>
            </form>
        </div>
    </div>
</div>