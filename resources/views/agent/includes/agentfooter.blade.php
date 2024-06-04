@php
  use Illuminate\Support\Facades\DB;
  $total_property_count_jan = DB::table('homeyproperties')->where('property_deleted', 0)->whereRaw('MONTH(created_at) = ?', [1])->count();
        $total_property_count_feb = DB::table('homeyproperties')->where('property_deleted', 0)->whereRaw('MONTH(created_at) = ?', [2])->count();
        $total_property_count_march = DB::table('homeyproperties')->where('property_deleted', 0)->whereRaw('MONTH(created_at) = ?', [3])->count();
        $total_property_count_apr = DB::table('homeyproperties')->where('property_deleted', 0)->whereRaw('MONTH(created_at) = ?', [4])->count();
        $total_property_count_may = DB::table('homeyproperties')->where('property_deleted', 0)->whereRaw('MONTH(created_at) = ?', [5])->count();
        $total_property_count_jun = DB::table('homeyproperties')->where('property_deleted', 0)->whereRaw('MONTH(created_at) = ?', [6])->count();
        $total_property_count_july = DB::table('homeyproperties')->where('property_deleted', 0)->whereRaw('MONTH(created_at) = ?', [7])->count();
        $total_property_count_aug = DB::table('homeyproperties')->where('property_deleted', 0)->whereRaw('MONTH(created_at) = ?', [8])->count();
        $total_property_count_sept = DB::table('homeyproperties')->where('property_deleted', 0)->whereRaw('MONTH(created_at) = ?', [9])->count();
        $total_property_count_oct = DB::table('homeyproperties')->where('property_deleted', 0)->whereRaw('MONTH(created_at) = ?', [10])->count();
        $total_property_count_nov = DB::table('homeyproperties')->where('property_deleted', 0)->whereRaw('MONTH(created_at) = ?', [11])->count();
        $total_property_count_dec = DB::table('homeyproperties')->where('property_deleted', 0)->whereRaw('MONTH(created_at) = ?', [12])->count();

        $total_verified_property_count_jan = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [1])->count();
        $total_verified_property_count_feb = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [2])->count();
        $total_verified_property_count_march = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [3])->count();
        $total_verified_property_count_apr = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [4])->count();
        $total_verified_property_count_may = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [5])->count();
        $total_verified_property_count_jun = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [6])->count();
        $total_verified_property_count_july = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [7])->count();
        $total_verified_property_count_aug = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [8])->count();
        $total_verified_property_count_sept = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [9])->count();
        $total_verified_property_count_oct = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [10])->count();
        $total_verified_property_count_nov = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [11])->count();
        $total_verified_property_count_dec = DB::table('homeyproperties')->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [12])->count();

        $total_agent_verified_property_count_jan = DB::table('homeyproperties')->where('agent_id', Auth::guard('agent')->user()->agent_id)->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [1])->count(); 
        $total_agent_verified_property_count_feb = DB::table('homeyproperties')->where('agent_id', Auth::guard('agent')->user()->agent_id)->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [2])->count();
        $total_agent_verified_property_count_march = DB::table('homeyproperties')->where('agent_id', Auth::guard('agent')->user()->agent_id)->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [3])->count();
        $total_agent_verified_property_count_apr = DB::table('homeyproperties')->where('agent_id', Auth::guard('agent')->user()->agent_id)->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [4])->count();
        $total_agent_verified_property_count_may = DB::table('homeyproperties')->where('agent_id', Auth::guard('agent')->user()->agent_id)->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [5])->count();
        $total_agent_verified_property_count_jun = DB::table('homeyproperties')->where('agent_id', Auth::guard('agent')->user()->agent_id)->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [6])->count();
        $total_agent_verified_property_count_july = DB::table('homeyproperties')->where('agent_id', Auth::guard('agent')->user()->agent_id)->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [7])->count();
        $total_agent_verified_property_count_aug = DB::table('homeyproperties')->where('agent_id', Auth::guard('agent')->user()->agent_id)->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [8])->count();
        $total_agent_verified_property_count_sept = DB::table('homeyproperties')->where('agent_id', Auth::guard('agent')->user()->agent_id)->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [9])->count();
        $total_agent_verified_property_count_oct = DB::table('homeyproperties')->where('agent_id', Auth::guard('agent')->user()->agent_id)->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [10])->count();
        $total_agent_verified_property_count_nov = DB::table('homeyproperties')->where('agent_id', Auth::guard('agent')->user()->agent_id)->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [11])->count();
        $total_agent_verified_property_count_dec = DB::table('homeyproperties')->where('agent_id', Auth::guard('agent')->user()->agent_id)->where('property_deleted', 0)->where('approval_status',1)->whereRaw('MONTH(created_at) = ?', [12])->count();
  @endphp
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
        name: 'Total Property',
        data: [{{$total_property_count_jan}}, {{$total_property_count_feb}}, {{$total_property_count_march}}, {{$total_property_count_apr}}, {{$total_property_count_may}}, {{$total_property_count_jun}}, {{$total_property_count_july}}, {{$total_property_count_aug}}, {{$total_property_count_sept}}, {{$total_property_count_oct}}, {{$total_property_count_nov}}, {{$total_property_count_dec}}]
      }, {
        name: 'Verified Properties',
        data: [{{$total_verified_property_count_jan}}, {{$total_verified_property_count_feb}}, {{$total_verified_property_count_march}}, {{$total_verified_property_count_apr}}, {{$total_verified_property_count_may}}, {{$total_verified_property_count_jun}}, {{$total_verified_property_count_july}}, {{$total_verified_property_count_aug}}, {{$total_verified_property_count_sept}}, {{$total_verified_property_count_oct}}, {{$total_verified_property_count_nov}}, {{$total_verified_property_count_dec}}]
      }, {
        name: 'Agents Verified Properties',
        data: [{{$total_agent_verified_property_count_jan}}, {{$total_agent_verified_property_count_feb}}, {{$total_agent_verified_property_count_march}}, {{$total_agent_verified_property_count_apr}}, {{$total_agent_verified_property_count_may}}, {{$total_agent_verified_property_count_jun}}, {{$total_agent_verified_property_count_july}}, {{$total_agent_verified_property_count_aug}}, {{$total_agent_verified_property_count_sept}}, {{$total_agent_verified_property_count_oct}}, {{$total_agent_verified_property_count_nov}}, {{$total_agent_verified_property_count_dec}}]
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