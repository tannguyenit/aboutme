


<div class="col-xs-12" id="message">
    <?php $this->load->view('templates/admin/thongbao');?>
</div>
<div class="col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-bars"></i> Liên hệ</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
        <form action="" method="post">
            <table class="table table-hover table-stripped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số đt</th>
                        <th>Nội dung</th>
                        <th>Chức năng</th>
                        <th style="width: 10%">
                            <a href="#" id="send_mail_all" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-bullhorn"></i></a>
                            <input type="checkbox" id="check_all_email" value="">
                           <a href="#" id="del_mail_all"><i class="fa fa-trash"></i></a>
                       </th>
                    </tr>
                </thead>
                <tbody>
                
                   <?php $i=1; foreach ($arContact as $key=> $value) { ?>
                    <tr data-id="<?=$value['id_contact']?>">
                        <td>
                            <?php echo $i?>
                        </td>
                        <td>
                            <?php echo $value["fullname"]?>
                        </td>
                        <td>
                            <?php echo $value["email"]?>
                        </td>
                        <td>
                            <?php echo $value["address"]?>
                        </td>
                        <td>
                            <?php echo $value["phone"]?>
                        </td>
                        <td>
                            <?php echo $value["content"]?>
                        </td>
                        <td style="width: 12%;text-align: center;">
                          <a class="send_mail" href="javascript:void(0)" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-bullhorn"></i></a>
                        <a href="/admin/admin_contact/del/<?php echo $value["id_contact"]?>" title=""><i class="fa fa-trash"></i></a>
                        </td>
                        <td style="padding: 0px 26px;"><input type="checkbox" class="check_send_mail" id="check_email[]" value="<?php echo $value["email"]?>"></td>
                    </tr>
                    <?php $i++;}?>
              
                    
                    </tbody>
            </table>
              </form>
        </div>
        <div class="col-xs-12 text-center">
                        <ul class="pagination pagination-split" id="phantrang">
                           <?php echo $pagination; ?>
                        </ul>
                        </div>
    </div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="edit"> </div>

    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Gửi liên hệ</h4>
      </div>
      <div class="modal-body">
             <form id="send_email_all" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="/admin/admin_contact/send_mail">
                
                 <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email<span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control col-md-7 col-xs-12 " id="email" name="email" value="" > </div>
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
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



