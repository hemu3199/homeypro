  <!-- Jquery Page Js -->
  <!-- Jquery Page Js -->
  <script src="{{asset('adminhomey/assets/js/theme.js')}}"></script>
  <!-- Plugin Js -->
  <script src="{{asset('adminhomey/assets/js/bundle/apexcharts.bundle.js')}}"></script>
  <!-- Vendor Script -->
  <script src="{{asset('adminhomey/assets/js/bundle/apexcharts.bundle.js')}}"></script>
  <script>
    // LUNO Revenue
    var options = {
      series: [{
        name: 'Income',
        data: [440, 505, 414, 671, 227, 413, 201, 352, 752, 320, 257, 160]
      }, {
        name: 'Expenses',
        data: [123, 142, 135, 127, 143, 122, 117, 131, 122, 122, 112, 116]
      }, {
        name: 'Revenue',
        data: [223, 242, 235, 227, 243, 222, 217, 231, 222, 222, 212, 216]
      }],
      chart: {
        type: 'bar',
        height: 260,
        stacked: true,
        stackType: '100%',
        toolbar: {
          show: false,
        },
      },
      colors: ['var(--chart-color1)', 'var(--chart-color2)', 'var(--chart-color3)'],
      responsive: [{
        breakpoint: 480,
        options: {
          legend: {
            position: 'bottom',
            offsetX: -10,
            offsetY: 0
          }
        }
      }],
      xaxis: {
        categories: ['Jan', 'Feb', 'March', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
      },
      fill: {
        opacity: 1
      },
      dataLabels: {
        enabled: false,
      },
      legend: {
        position: 'bottom',
        horizontalAlign: 'center',
      },
    };
    var chart = new ApexCharts(document.querySelector("#apex-AudienceOverview"), options);
    chart.render();
    // Sales by Category
    var options = {
      chart: {
        height: 280,
        type: 'donut',
      },
      plotOptions: {
        pie: {
          donut: {
            labels: {
              show: true,
              total: {
                showAlways: true,
                show: true
              }
            }
          }
        }
      },
      dataLabels: {
        enabled: false,
      },
      legend: {
        position: 'bottom',
        horizontalAlign: 'center',
        show: true,
      },
      colors: ['var(--chart-color1)', 'var(--chart-color2)', 'var(--chart-color3)'],
      series: [55, 35, 10],
    }
    var chart = new ApexCharts(document.querySelector("#apex-SalesbyCategory"), options);
    chart.render();
  </script>
  <script>
    // Company Agent Statistics
    var options = {
      series: [{
        name: "Rent",
        data: [5, 10, 8, 1, 9, 15],
      }, {
        name: "Sell",
        data: [3, 5, 1, 7, 9, 4],
      }],
      chart: {
        type: 'bar',
        height: 300,
        toolbar: {
          show: false,
        },
      },
      colors: ["var(--chart-color1)", "var(--chart-color2)"],
      plotOptions: {
        bar: {
          horizontal: true,
          dataLabels: {
            show: false,
          },
        }
      },
      dataLabels: {
        enabled: false,
      },
      stroke: {
        show: false,
      },
      xaxis: {
        categories: ['Raj', 'Kranthi', 'Sai Teja', 'Uday', 'Shekar', 'Revi'],
      },
    };
    var chart = new ApexCharts(document.querySelector("#apex-CompanyAgentStatistics"), options);
    chart.render();
    // Report Sector
    var options = {
      series: [50, 17, 10, 15],
      chart: {
        height: 300,
        type: "donut",
      },
      labels: ["Commercial", "Residential", "Purchased", "Rented"],
      legend: {
        position: "top",
        horizontalAlign: "center",
        show: false,
      },
      colors: ["var(--chart-color1)", "var(--chart-color2)", "var(--chart-color3)", "var(--chart-color4)", ],
    };
    var chart = new ApexCharts(document.querySelector("#apex-ReportSector"), options);
    chart.render();
  </script>
  <script>
 function notify(id=null,message='Something went wrong',position='top right',type='error',willReload=false,url=null,timeout=3000){
 if(id!=null && id != 'input[name=error]' && id!='input[name=error]') $(id).notify(
 message,
 {
 position:position,
 className:type
 }
 );
 else $.notify(
 message,
 {
 position:'top right',
 className:type
 }
 );
 if (willReload) setTimeout(function () {
 if(url==null)window.location.reload();
 else window.location.href = url;
 }, timeout)
 }
 </script>
    <script src="{{asset('adminhomey/js/jquery.min.js')}}"></script>
        <script src="{{asset('adminhomey/js/plugins.js')}}"></script>
        <script src="{{asset('adminhomey/js/scripts.js')}}"></script>
        <script src="{{asset('adminhomey/js/charts.js')}}"></script>
        <script src="{{asset('adminhomey/js/dashboard.js')}}"></script>
</body>

</html>