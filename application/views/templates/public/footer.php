
	<div id="footer">
		<div>
			<p>
				Một dự án khóa học lập trình tại <a href="http://vinaenter.edu.vn" title="đào tạo lập trình php, java">VinaENTER EDU</a>
			</p>
			<ul>
				<li>
					<a href="https://www.facebook.com/tannguyen1995" id="facebook">Code by: Nguyễn Văn Tân </a>
				</li>
			</ul>
			<div>
				<span>Kết nối:</span>
				<a href="https://www.facebook.com/tannguyen1995" id="facebook">Facebook</a>
				<a href="https://twitter.com/tannguyenit1995" id="twitter">Twitter</a>
				<a href="https://plus.google.com/u/0/108692824114356484356" id="googleplus">Googleplus</a>
			</div>
		</div>
	</div>

<script type="text/javascript">
$( document ).ready(function() {
    $("#gui_mail").validate({
        rules: {
            name: {
                required: true,
                minlength: 6
            },
            email: {
                required: true,
                email: true
            },
            address: {
                required: true
            },
            phone: {
                required: true,
                 number: true,
                minlength:10,
                maxlength:11,
            },
            message: {
                required: true
            }
        },
        messages: {
            name: {
                required: '<span style="padding:1px 0;color:red">Vui lòng nhập họ tên</span>',
                minlength: '<span style="padding:1px 0;color:red">Nhập tối thiểu 6 ký tự</span>'
            },
            email: {
                required: '<span style="padding:1px 0;color:red">Vui lòng nhập email</span>',
                email: '<span style="padding:1px 0;color:red">Nhập đúng định dạng email</span>'
            },
            address: {
                required: '<span style="padding:1px 0;color:red">Vui lòng nhập địa chỉ</span>'
            },
            phone: {
                required: '<span style="padding:1px 0;color:red">Vui lòng nhập số phone</span>',
                minlength: '<span style="padding:1px 0;color:red">Nhập tối thiểu 10 số</span>',
                 number: '<span style="padding:1px 0;color:red">Bạn phải nhập số</span>',
                maxlength: '<span style="padding:1px 0;color:red">Nhập tối đa 11 số</span>'
            },
            message: {
                required: '<span style="padding:1px 0;color:red">Nhập nội dung liên hệ</span>'
            }
        },
      
    });
});
</script>
<script type="text/javascript">
    function read(id){
        $.post('/public_news/read',{id:id});
    }
</script>
<!-- <script type="text/javascript">
    $(function(){
        //deactivate default click action in # <a> links in navbar 
        $('#active  [href^=#]').click(function (e) {
            e.preventDefault()
        });
        var url = window.location.pathname,
            urlRegExp = new RegExp(url.replace(/\/$/,'') + "$");
        // now grab every link from the navigation
        $('#active li ').each(function(){
            // and test its normalized href against the url pathname regexp
            if(urlRegExp.test(this.href.replace(/\/$/,''))){
                            //add active to the top-level navs only
                $(this).parents('active li').addClass('selected');
            }
        });
    });
</script> --> 

</body>
</html>


