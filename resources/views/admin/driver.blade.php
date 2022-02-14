@extends('layouts.admin')

@section('content')


    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row">

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-success p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-credit-card text-success font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{$money->total}} SAR</h2>
                                    <p class="mb-0">المبالغ المستحقه </p>
                                </div>
                                <div class="card-content">
                                    <div id="revenue-gain-chart-new"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-warning p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-package text-warning font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{$number_of_orders_arrived->total}}</h2>
                                    <p class="mb-0">الطلبات التي تم توصيلها</p>
                                </div>
                                <div class="card-content">
                                    <div id="order-gain-chart-new"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-warning p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-package text-warning font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{$number_of_orders_not_arrived->total}}</h2>
                                    <p class="mb-0">الطلبات التي لم يتم توصيلها</p>
                                </div>
                                <div class="card-content">
                                    <div id="order-gain-chart-new2"></div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12">
                        <div class="card mb-4">
                          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">التقرير الشهري للطلبات</h6>

                          </div>
                          <div class="card-body">
                            <div class="chart-area">
                              <canvas id="myAreaChart"></canvas>
                            </div>
                          </div>
                        </div>
                      </div>

                    <div class="row">
                        <?php
                        $orders = DB::select("select * from orders where driver = '".Auth::id()."' order by id desc limit 15");


               ?>
               <div class="col-xl-8 col-lg-7 mb-4">
                 <div class="card">
                   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">الطلبات</h6>
                     <a class="m-0 float-right btn btn-danger btn-sm" href="/admin/aorders">المزيد <i
                         class="fas fa-chevron-right"></i></a>
                   </div>
                   <div class="table-responsive">
                     <table class="table align-items-center table-flush">
                       <thead class="thead-light">
                           <tr>
                               <th>{{__('public.id')}}</th>
                                <th>{{__('public.name')}}</th>

                               <th>{{__('public.date')}}</th>
                               <th>{{__('public.show')}}</th>

                             </tr>
                       </thead>
                       <tbody>
                           @foreach($orders as $order)
                         <tr>
                           <td scope="row">{{$order->id}}</td>
                                   <td>{{$order->name ?? ''}}</td>
                                   <td>{{$order->created_at}}</td>

                                   <td><a href="{{route('show_driverorder', ['id' =>$order->id ])}}">{{__("public.show")}}</a></td>

                         </tr>
                         @endforeach

                       </tbody>
                     </table>
                   </div>
                   <div class="card-footer"></div>
                 </div>
               </div>
               {{-- <?php
                   $type = App\Http\Controllers\ProfileController::get_user_info(Auth::id())->type;
                   $messages = DB::select("select * from ticket_messages where `read` = 0  group by ticket_id order by id desc ");


               ?>
               <!-- Message From Customer-->
               <div class="col-xl-4 col-lg-5 ">
                 <div class="card">
                   <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-light">التذاكر المفتوحه</h6>
                   </div>
                   <div>
                       @foreach($messages as $m)

                       <?php
                    if($type == 0){
                 $name = App\Http\Controllers\ProfileController::get_user_info($m->company_id)->name ?? '';
                       }else{
                         $name = App\Http\Controllers\ProfileController::get_user_info($m->admin_id)->name ?? '';
                       }
                       ?>
                     <div class="customer-message align-items-center">
                       <a class="font-weight-bold" href="#">
                         <div class="text-truncate message-title">{{$m->message}}</div>
                         <div class="small text-gray-500 message-time font-weight-bold">{{$name}} · {{$m->created_at}}</div>
                       </a>
                     </div>

                     @endforeach

                     <div class="card-footer text-center">
                       <a class="m-0 small text-primary card-link" href="{{route('tickets')}}">المزيد <i
                           class="fas fa-chevron-right"></i></a>
                     </div>
                   </div>
                 </div>
               </div> --}}

                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <script src="../../../js/chart.js/Chart.min.js"></script>

    <!-- END: Content-->
<script>
    $(window).on("load", function () {

var $primary = '#7367F0';
var $danger = '#EA5455';
var $warning = '#FF9F43';
var $info = '#0DCCE1';
var $primary_light = '#8F80F9';
var $warning_light = '#FFC085';
var $danger_light = '#f29292';
var $info_light = '#1edec5';
var $strok_color = '#b9c3cd';
var $label_color = '#e7eef7';
var $white = '#fff';

  // Subscribers Gained Chart starts //
  // ----------------------------------

  var gainedChartoptions = {
    chart: {
      height: 100,
      type: 'area',
      toolbar: {
        show: false,
      },
      sparkline: {
        enabled: true
      },
      grid: {
        show: false,
        padding: {
          left: 0,
          right: 0
        }
      },
    },
    colors: [$primary],
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth',
      width: 2.5
    },
    fill: {
      type: 'gradient',
      gradient: {
        shadeIntensity: 0.9,
        opacityFrom: 0.7,
        opacityTo: 0.5,
        stops: [0, 1, 2,3,4,5,6,7,8,9,10,11,12]
      }
    },
    series: [{
      name: 'الطلبات',
      data: [{{$orders_gained["1"]}}, {{$orders_gained["2"]}}, {{$orders_gained["3"]}},
      {{$orders_gained["4"]}}, {{$orders_gained["5"]}}, {{$orders_gained["6"]}}, {{$orders_gained["7"]}},
       {{$orders_gained["8"]}},
       {{$orders_gained["9"]}}, {{$orders_gained["10"]}}, {{$orders_gained["11"]}}, {{$orders_gained["12"]}}]
    }],

    xaxis: {
      labels: {
        show: false,
      },
      axisBorder: {
        show: false,
      }
    },
    yaxis: [{
      y: 0,
      offsetX: 0,
      offsetY: 0,
      padding: { left: 0, right: 0 },
    }],
    tooltip: {
      x: { show: false }
    },
  }

  var gainedChart = new ApexCharts(
    document.querySelector("#subscribe-gain-chart-new"),
    gainedChartoptions
  );

  gainedChart.render();


  var revenueChartoptions = {
    chart: {
      height: 100,
      type: 'area',
      toolbar: {
        show: false,
      },
      sparkline: {
        enabled: true
      },
      grid: {
        show: false,
        padding: {
          left: 0,
          right: 0
        }
      },
    },
    colors: [$strok_color],
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth',
      width: 2.5
    },
    fill: {
      type: 'gradient',
      gradient: {
        shadeIntensity: 0.9,
        opacityFrom: 0.7,
        opacityTo: 0.5,
        stops: [0, 1, 2,3,4,5,6,7,8,9,10,11,12]
      }
    },
    series: [{
      name: 'الايردات',
      data: [{{$revnues["1"]}}, {{$revnues["2"]}}, {{$revnues["3"]}},
      {{$revnues["4"]}}, {{$revnues["5"]}}, {{$revnues["6"]}}, {{$revnues["7"]}},
       {{$revnues["8"]}},
       {{$revnues["9"]}}, {{$revnues["10"]}}, {{$revnues["11"]}}, {{$revnues["12"]}}]
    }],

    xaxis: {
      labels: {
        show: false,
      },
      axisBorder: {
        show: false,
      }
    },
    yaxis: [{
      y: 0,
      offsetX: 0,
      offsetY: 0,
      padding: { left: 0, right: 0 },
    }],
    tooltip: {
      x: { show: false }
    },
  }

  var revenueChart = new ApexCharts(
    document.querySelector("#revenue-gain-chart-new"),
    revenueChartoptions
  );


   revenueChart.render();

   var ordersChartoptions = {
    chart: {
      height: 100,
      type: 'area',
      toolbar: {
        show: false,
      },
      sparkline: {
        enabled: true
      },
      grid: {
        show: false,
        padding: {
          left: 0,
          right: 0
        }
      },
    },
    colors: [$info_light],
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth',
      width: 2.5
    },
    fill: {
      type: 'gradient',
      gradient: {
        shadeIntensity: 0.9,
        opacityFrom: 0.7,
        opacityTo: 0.5,
        stops: [0, 1, 2,3,4,5,6,7,8,9,10,11,12]
      }
    },
    series: [{
      name: 'الطلبات',
      data: [{{$orders_arrived_gained["1"]}}, {{$orders_arrived_gained["2"]}}, {{$orders_arrived_gained["3"]}},
      {{$orders_arrived_gained["4"]}}, {{$orders_arrived_gained["5"]}}, {{$orders_arrived_gained["6"]}}, {{$orders_arrived_gained["7"]}},
       {{$orders_arrived_gained["8"]}},
       {{$orders_arrived_gained["9"]}}, {{$orders_arrived_gained["10"]}}, {{$orders_arrived_gained["11"]}}, {{$orders_arrived_gained["12"]}}]
    }],

    xaxis: {
      labels: {
        show: false,
      },
      axisBorder: {
        show: false,
      }
    },
    yaxis: [{
      y: 0,
      offsetX: 0,
      offsetY: 0,
      padding: { left: 0, right: 0 },
    }],
    tooltip: {
      x: { show: false }
    },
  }

  var orderChart = new ApexCharts(
    document.querySelector("#order-gain-chart-new"),
    ordersChartoptions
  );


  orderChart.render();




  var ordersChartoptions2 = {
    chart: {
      height: 100,
      type: 'area',
      toolbar: {
        show: false,
      },
      sparkline: {
        enabled: true
      },
      grid: {
        show: false,
        padding: {
          left: 0,
          right: 0
        }
      },
    },
    colors: [$info_light],
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth',
      width: 2.5
    },
    fill: {
      type: 'gradient',
      gradient: {
        shadeIntensity: 0.9,
        opacityFrom: 0.7,
        opacityTo: 0.5,
        stops: [0, 1, 2,3,4,5,6,7,8,9,10,11,12]
      }
    },
    series: [{
      name: 'الطلبات',
      data: [{{$orders_gained["1"]}}, {{$orders_not_arrived_gained["2"]}}, {{$orders_not_arrived_gained["3"]}},
      {{$orders_not_arrived_gained["4"]}}, {{$orders_not_arrived_gained["5"]}}, {{$orders_not_arrived_gained["6"]}}, {{$orders_not_arrived_gained["7"]}},
       {{$orders_not_arrived_gained["8"]}},
       {{$orders_not_arrived_gained["9"]}}, {{$orders_not_arrived_gained["10"]}}, {{$orders_not_arrived_gained["11"]}}, {{$orders_not_arrived_gained["12"]}}]
    }],

    xaxis: {
      labels: {
        show: false,
      },
      axisBorder: {
        show: false,
      }
    },
    yaxis: [{
      y: 0,
      offsetX: 0,
      offsetY: 0,
      padding: { left: 0, right: 0 },
    }],
    tooltip: {
      x: { show: false }
    },
  }

  var orderChart2 = new ApexCharts(
    document.querySelector("#order-gain-chart-new2"),
    ordersChartoptions
  );


  orderChart2.render();

  var revenueChartoptions = {
    chart: {
      height: 270,
      toolbar: { show: false },
      type: 'line',
    },
    stroke: {
      curve: 'smooth',
      dashArray: [0, 8],
      width: [4, 2],
    },
    grid: {
      borderColor: $label_color,
    },
    legend: {
      show: false,
    },
    colors: [$danger_light, $strok_color],

    fill: {
      type: 'gradient',
      gradient: {
        shade: 'dark',
        inverseColors: false,
        gradientToColors: [$primary, $strok_color],
        shadeIntensity: 1,
        type: 'horizontal',
        opacityFrom: 1,
        opacityTo: 1,
        stops: [0, 100, 100, 100]
      },
    },
    markers: {
      size: 0,
      hover: {
        size: 5
      }
    },
    xaxis: {
      labels: {
        style: {
          colors: $strok_color,
        }
      },
      axisTicks: {
        show: false,
      },
      categories: ['01', '05', '09', '13', '17', '21', '26', '31'],
      axisBorder: {
        show: false,
      },
      tickPlacement: 'on',
    },
    yaxis: {
      tickAmount: 5,
      labels: {
        style: {
          color: $strok_color,
        },
        formatter: function (val) {
          return val > 999 ? (val / 1000).toFixed(1) + 'k' : val;
        }
      }
    },
    tooltip: {
      x: { show: false }
    },
    series: [{
      name: "This Month",
      data: [45000, 47000, 44800, 47500, 45500, 48000, 46500, 48600]
    },
    {
      name: "Last Month",
      data: [46000, 48000, 45500, 46600, 44500, 46500, 45000, 47000]
    }
    ],

  }

  var revenueChart = new ApexCharts(
    document.querySelector("#revenue-chart"),
    revenueChartoptions
  );

  revenueChart.render();
  function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

        // Area Chart Example
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: ["يناير", "قبراير", "مارس", "ابريل", "مايو", "ينويو", "يوليو", "اغسطس", "ستمبر", "اكتوير", "نوفمبر", "ديسمبر"],
            datasets: [{
              label: "طلب",
              lineTension: 0.3,
              backgroundColor: "rgba(78, 115, 223, 0.5)",
              borderColor: "rgba(78, 115, 223, 1)",
              pointRadius: 3,
              pointBackgroundColor: "rgba(78, 115, 223, 1)",
              pointBorderColor: "rgba(78, 115, 223, 1)",
              pointHoverRadius: 3,
              pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
              pointHoverBorderColor: "rgba(78, 115, 223, 1)",
              pointHitRadius: 10,
              pointBorderWidth: 2,
              data: [{{$orders_gained[1]}}, {{$orders_gained[2]}}, {{$orders_gained[3]}}, {{$orders_gained[4]}},
               {{$orders_gained[5]}}, {{$orders_gained[6]}}, {{$orders_gained[7]}}, {{$orders_gained[8]}}, {{$orders_gained[9]}},
               {{$orders_gained[10]}}, {{$orders_gained[11]}}, {{$orders_gained[12]}}],
            }],
          },
          options: {
            maintainAspectRatio: false,
            layout: {
              padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
              }
            },
            scales: {
              xAxes: [{
                time: {
                  unit: 'date'
                },
                gridLines: {
                  display: false,
                  drawBorder: false
                },
                ticks: {
                  maxTicksLimit: 7
                }
              }],
              yAxes: [{
                ticks: {
                  maxTicksLimit: 5,
                  padding: 10,
                  // Include a dollar sign in the ticks
                  callback: function(value, index, values) {
                    return  number_format(value);
                  }
                },
                gridLines: {
                  color: "rgb(234, 236, 244)",
                  zeroLineColor: "rgb(234, 236, 244)",
                  drawBorder: false,
                  borderDash: [2],
                  zeroLineBorderDash: [2]
                }
              }],
            },
            legend: {
              display: false
            },
            tooltips: {
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              titleMarginBottom: 10,
              titleFontColor: '#6e707e',
              titleFontSize: 14,
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              intersect: false,
              mode: 'index',
              caretPadding: 10,
              callbacks: {
                label: function(tooltipItem, chart) {
                  var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                  return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                }
              }
            }
          }
        });
});
</script>
@endsection
