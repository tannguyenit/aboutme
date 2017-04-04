
 </div>
    <footer>
      <div class="pull-right">Trang quản lý thông tin thành viên </div>
      <div class="clearfix"></div>
    </footer>
  </div>
    <!-- jQuery -->
    <script src="<?php echo ADMIN_URL ?>/jquery/dist/jquery.min.js"></script> 
    <script src="<?php echo ADMIN_URL ?>/js/custom.min.js"></script>
    <script src="<?php echo ADMIN_URL ?>/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo ADMIN_URL ?>/ckeditor/ckeditor.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo ADMIN_URL ?>/js/script.js"></script>
    <script src="<?php echo ADMIN_URL ?>/js/jquery.validate.min.js"></script>
    <script src="<?php echo ADMIN_URL ?>/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo ADMIN_URL ?>/Flot/jquery.flot.js"></script>
    <script src="<?php echo ADMIN_URL ?>/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo ADMIN_URL ?>/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo ADMIN_URL ?>/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo ADMIN_URL ?>/Flot/jquery.flot.resize.js"></script>
    <script src="<?php echo ADMIN_URL ?>/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo ADMIN_URL ?>/flot-spline/js/jquery.flot.spline.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#news_table').DataTable({
            "lengthMenu": [[10, 15, 20, -1], [10, 15, 20, "All"]],
            // "scrollY": "auto",
            "paging": true,
            "ordering": true,
            "info": false,
            "searching": false,
            "pagingType": "numbers",
            "language": {
                "lengthMenu": "Hiển thị _MENU_ tin trên 1 trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
            },
        });
    });

</script>
<script>
    $(document).ready(function() {
        var d;
        var d = $('.bbb').data('list');
        var b = [];
        b = d.split(',');
        console.log(b)  
        var data1 = [];
        //láy tháng hiện tại
        var day = new Date();
        var ngay = day.getDate();
        var thang = day.getMonth();
        //end thang
        b.forEach(function(index, el) {
            var t = el + 1;
            var year = 1;
            var x = [];
            x.push(gd(year, thang+1, t));
            x.push(index);
            data1.push(x);
        });
        $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
          data1
        ], {
          series: {
            lines: {
              show: false,
              fill: true
            },
            splines: {
              show: true,
              tension: 0.4,
              lineWidth: 1,
              fill: 0.4
            },
            points: {
              radius: 0,
              show: true
            },
            //shadowSize: 2
          },
          grid: {
            verticalLines: true,
            hoverable: true,
            clickable: true,
            tickColor: "#d5d5d5",
            borderWidth: 1,
            color: '#fff'
          },
          colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
          xaxis: {
            tickColor: "rgba(51, 51, 51, 0.06)",
            mode: "time",
            tickSize: [1, "day"],
            //tickLength: 10,
            axisLabel: "Date",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 10
          },
          yaxis: {
            ticks: 10,
            tickColor: "rgba(51, 51, 51, 0.06)",
          },
          tooltip: false
        });

        function gd(year, month, day) {
          return new Date(year, month - 1, day).getTime();
        }
      });
</script>
</body>
</html>
