
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
            <h4 class="modal-title" id="myModalLabel">Gửi liên hệ</h4> </div>
        <div class="modal-body">
            <form id="send_mail_once" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="/admin/admin_contact/send_mail">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên<span class="required">*</span> </label>
                    <input type="hidden" name="id_cat" value="">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control col-md-7 col-xs-12" name="name" value="<?php echo $arSend["fullname"]?>" > </div>
                </div>
                 <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email<span class="required">*</span> </label>
                    <input type="hidden" name="id_cat" value="">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control col-md-7 col-xs-12" name="email" value="<?php echo $arSend["email"]?>" > </div>
                </div>
                 <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tiêu đề mail<span class="required">*</span> </label>
                    <input type="hidden" name="id_cat" value="">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control col-md-7 col-xs-12" name="title" value="" > </div>
                </div>
                 <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Nội dung<span class="required">*</span> </label>
                    <input type="hidden" name="id_cat" value="">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control col-md-7 col-xs-12" name="message" value="" > </div>
                </div>
                <div class="form-group text-center">
                        <input type="submit"  class="btn btn-success " name="send_mail" value="Gửi liên hệ">
                </div>
            </form>
        </div>
    </div>
</div>