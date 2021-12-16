<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>
</head>

<body>
  <table class="table" style="width: 40%;margin-left: 30%;font-size: 1.3rem;">
    <tr>
      <td>Nhập vào năm cần thống kê :</td>
      <td><input type="number" id="year_input"></td>
    </tr>
    <tr>
      <td colspan="2">
        <button style="width: 100%;border-radius: 0.5rem;background-color: #3480fa;color: white;" onclick="statistic();">Thống kê</button>
      </td>
    </tr>

  </table>
  <div id="control_button" style="width: 80%;margin-left: 10%;">

  </div>
  <div style="width: 80%;margin-left: 10%;" id="statistic_container">
    <div id="line_top_bill" style="border:1px solid black"></div>
    <div id="line_top_receipt" style="border: 1px solid black"></div>
    <div id="line_top_profit" style="border: 1px solid black"></div>
  </div>



</body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
  function statistic() {
    var year = $("#year_input").val();
    if (year == '' || parseInt(year) != year || isNaN(year) || year < 1999 || year > 2999) {
      alert('Năm cần thống kê không hợp lệ. Dữ liệu hợp lệ nằm trong khoảng [1999...2999]')
      return;
    }
    google.charts.load('current', {
      'packages': ['line']
    });
    google.charts.setOnLoadCallback(drawChart);


    function drawChart() {
      $.ajax({
        url: '/CuaHangTrangSuc/Admin/statisticBillAdnReceipt/' + year,
        success: function(data) {
          var data = JSON.parse(data);
          var bill = data.BILL;
          var receipt = data.RECEIPT;

          /*======================== THONG KE HOA DON============================*/
          var dataStatistic = new Array();
          var data = new google.visualization.DataTable();
          data.addColumn('number', 'Tháng');
          data.addColumn('number', 'Hóa Đơn');

          for (var i = 1; i <= 12; i++) {
            $sumBill = 0;

            //count sum bill in month
            for (var key in bill) {
              var obj = bill[key];
              //get month
              var month = (obj.NGAYLAP).split("-")[1];
              if (parseInt(month) == i) {
                $sumBill += parseInt(obj.TONG);
              }
            }
            $sumBill /= 1000000;

            var tmp = [i, $sumBill];
            dataStatistic.push(tmp);
          }

          data.addRows(dataStatistic)
          var options = {
            chart: {
              title: 'Thống kê doanh thu trong tháng',
              subtitle: 'triệu VNĐ'
            },
            width: 1300,
            height: 500,
            axes: {
              x: {
                0: {
                  side: 'top'
                }
              }
            }
          };
          var chart = new google.charts.Line(document.getElementById('line_top_bill'));
          chart.draw(data, google.charts.Line.convertOptions(options));

          /*======================== THONG KE PHIEU NHAP============================*/
          var dataStatistic = new Array();
          var data = new google.visualization.DataTable();
          data.addColumn('number', 'Tháng');
          data.addColumn('number', 'Phiếu Nhập');

          for (var i = 1; i <= 12; i++) {
            $sumReceipt = 0;

            //count sum bill in month
            for (var key in receipt) {
              var obj = receipt[key];
              //get month
              var month = (obj.NGAYLAP).split("-")[1];
              if (parseInt(month) == i) {
                $sumReceipt += parseInt(obj.TONG);
              }
            }
            $sumReceipt /= 1000000;

            var tmp = [i, $sumReceipt];
            dataStatistic.push(tmp);
          }

          data.addRows(dataStatistic)
          var options = {
            chart: {
              title: 'Thống kê chi tiêu trong tháng',
              subtitle: 'triệu VNĐ'
            },
            width: 1300,
            height: 500,
            axes: {
              x: {
                0: {
                  side: 'top'
                }
              }
            }
          };
          var chart = new google.charts.Line(document.getElementById('line_top_receipt'));
          chart.draw(data, google.charts.Line.convertOptions(options));

          /*======================== THONG KE PHIEU NHAP============================*/
          var dataStatistic = new Array();
          var data = new google.visualization.DataTable();
          data.addColumn('number', 'Tháng');
          data.addColumn('number', 'Lợi Nhuận');

          for (var i = 1; i <= 12; i++) {
            $sumBill = 0;

            //count sum bill in month
            for (var key in bill) {
              var obj = bill[key];
              //get month
              var month = (obj.NGAYLAP).split("-")[1];
              if (parseInt(month) == i) {
                $sumBill += parseInt(obj.TONG);
              }
            }
            $sumBill /= 1000000;

            $sumReceipt = 0;
            //count sum receipt in month
            for (var key in receipt) {
              var obj = receipt[key];
              //get month
              var month = (obj.NGAYLAP).split("-")[1];
              if (parseInt(month) == i) {
                $sumReceipt += parseInt(obj.TONG);
              }
            }
            $sumReceipt /= 1000000;

            var tmp = [i, $sumBill - $sumReceipt];
            dataStatistic.push(tmp);
          }

          data.addRows(dataStatistic)
          var options = {
            chart: {
              title: 'Thống kê lợi nhuận theo tháng',
              subtitle: 'triệu VNĐ'
            },
            width: 1300,
            height: 500,
            axes: {
              x: {
                0: {
                  side: 'top'
                }
              }
            }
          };
          var chart = new google.charts.Line(document.getElementById('line_top_profit'));
          chart.draw(data, google.charts.Line.convertOptions(options));


          $("#line_top_bill").css("margin-top", "1rem")
          $("#line_top_receipt").css("margin-top", "1rem")
          $("#line_top_profit").css("margin-top", "1rem")

          $("#line_top_bill").css("padding", "2rem")
          $("#line_top_receipt").css("padding", "2rem")
          $("#line_top_profit").css("padding", "2rem")

          $("#control_button").html('<button style="background-color: #2196fc;color: white;font-size: 1.5rem;border-radius: 0.5rem;" onclick="save();">Lưu thống kê</button>');
        }



      })
    }
  }

  function save() {
    html2canvas(document.querySelector("#line_top_bill")).then(canvas => {
      canvas.toBlob(function(blob) {
        saveAs(blob, "Statistic_Bill.png");
      });
    });

    html2canvas(document.querySelector("#line_top_receipt")).then(canvas => {
      canvas.toBlob(function(blob) {
        saveAs(blob, "Statistic_Receipt.png");
      });
    });

    html2canvas(document.querySelector("#line_top_profit")).then(canvas => {
      canvas.toBlob(function(blob) {
        saveAs(blob, "Statistic_Profit.png");
      });
    });
  }
</script>
</html>