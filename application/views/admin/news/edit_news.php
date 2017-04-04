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
            <form id="edit_news" data-parsley-validate class="form-horizontal form-label-left" action="/admin/admin_news/update" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Tên tin<span class="required">*</span> </label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <input type="text" id="ten" required="required" class="form-control col-md-7 col-xs-12" name="tentin" value="<?php echo $arEdit["name"]?>" >
                    </div>
                </div>
                <div class="form-group">
                      <label class="control-label col-md-1 col-sm-1 col-xs-12" for="sel1">Danh mục</label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                           <select class="form-control" id="sel1" name="danhmuctin">
                            <?php foreach ($nameCat as $key => $value){
								if ($value['id_cat']==$arEdit["id_cat"]) {
									 $selected="selected='selected'";
								}else{
									 $selected="";
								}
												?>
								<option value="<?php echo $value['id_cat']?>" <?php echo $selected ?>><?php echo $value['name'] ?></option>
							<?php }?>
                          </select>
                    </div>   
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1 col-sm-1 col-xs-12" for="last-name">Mô tả<span class="required">*</span> </label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <textarea name="mota" id="mota" style="width: 100%"><?php echo $arEdit["preview_text"]?></textarea>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-1 col-sm-1 col-xs-12">Hình ảnh</label>
                    <label for="image2" class="uploadimg">
            <!-- lấy id -->
            <input type="hidden" id="id_news" name="id_news" value="<?php echo $arEdit["id_news"]?>">
            <!-- lấy name_pic -->
            <input type="hidden" id="namepic_news" value="<?php echo $arEdit["picture"]?>">
            <!-- hiển thị -->
            <div id="anhxoa_news" style="display: none"></div>
            <img id="datafile_news" style="width:348px;height: 168px" src="<?php echo $url ?>" data-img="<?php echo FILE_UPLOAD.'/upload.png'?>" />
            <input id="image2" onchange="test(this);" class="hide" type="file" name="hinhanh2" /> <a href="javascript:void(0)" onclick="xoaanh_news()" class="removefile" title="Xóa ảnh">&times;</a>
        </label>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1 col-sm-1 col-xs-12">Chi tiết</label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <textarea class="ckeditor" id="chitiet_news" style="width: 100%" name="chitiet"><?php echo $arEdit["detail_text"]?></textarea>
                        <script type="text/javascript">
                        	CKEDITOR.replace("chitiet_news");
                        </script>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-10 col-sm-10 col-xs-12 col-md-offset-3">
                        <input type="submit" class="btn btn-primary" name="update" value="Cập nhật">
                        <button type="reset" class="btn btn-success">Nhập lại</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>