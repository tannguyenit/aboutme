  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
            <h4 class="modal-title" id="myModalLabel">Sửa Câu Nói Hay</h4> </div>
        <div class="modal-body">
            <form id="edit_say" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="/admin/admin_say/update">
                <div class="form-group">
                    <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Tên <span class="required">*</span> </label>
                    <input type="hidden" name="id_say" value="<?php echo $arEdit["id_saying"]?>">
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="author" value="<?php echo $arEdit["author"]?>"> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1 col-sm-1 col-xs-12">Nội dung</label>
                    <div class="col-md-10 col-sm-10 col-xs-12">
                        <textarea class="ckeditor" style="width: 100%" id="mota" name="content"><?php echo $arEdit["content"]?></textarea>
                        
                    </div>
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary" name="update" value="Cập nhật">
                </div>
                
            </form>
        </div>
    </div>
</div>