<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Title -->
  <title>@yield('title', 'Edmate Learning Dashboard')</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ url('admin/assets/images/logo/favicon.png') }}">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ url('admin/assets/css/bootstrap.min.css') }}">
  <!-- Bootstrap Table CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.24.1/dist/bootstrap-table.min.css">
  <!-- File Upload -->
  <link rel="stylesheet" href="{{ url('admin/assets/css/file-upload.css') }}">
  <!-- Plyr -->
  <link rel="stylesheet" href="{{ url('admin/assets/css/plyr.css') }}">
  <!-- DataTables (optional, kept for non-Bootstrap Table pages) -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
  <!-- Full Calendar -->
  <link rel="stylesheet" href="{{ url('admin/assets/css/full-calendar.css') }}">
  <!-- jQuery UI -->
  <link rel="stylesheet" href="{{ url('admin/assets/css/jquery-ui.css') }}">
  <!-- Editor Quill -->
  <link rel="stylesheet" href="{{ url('admin/assets/css/editor-quill.css') }}">
  <!-- ApexCharts -->
  <link rel="stylesheet" href="{{ url('admin/assets/css/apexcharts.css') }}">
  <!-- Calendar -->
  <link rel="stylesheet" href="{{ url('admin/assets/css/calendar.css') }}">
  <!-- jVectorMap -->
  <link rel="stylesheet" href="{{ url('admin/assets/css/jquery-jvectormap-2.0.5.css') }}">
  <!-- Main CSS -->
  <link rel="stylesheet" href="{{ url('admin/assets/css/main.css') }}">
  <!-- Phosphor Icons CSS (assumed included in main.css or phosphor-icon.js) -->
  <!-- CKEditor -->
  <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
  <!-- jQuery (single inclusion) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
  <!-- Page-specific Styles -->
  @yield('styles')
</head>

<body>
  <!--==================== Preloader Start ====================-->
  <div class="preloader">
    <div class="loader"></div>
  </div>
  <!--==================== Preloader End ====================-->

  <!--==================== Sidebar Overlay End ====================-->
  <div class="side-overlay"></div>
  <!--==================== Sidebar Overlay End ====================-->

  <!-- ============================ Sidebar Start ============================ -->
  @include('admin.layout.sidebar')
  <!-- ============================ Sidebar End  ============================ -->

  <div class="dashboard-main-wrapper">
    @include('admin.layout.header')
    @yield('content')
    @include('admin.layout.footer')
  </div>

  <!-- Bootstrap Bundle JS -->
  <script src="{{ url('admin/assets/js/boostrap.bundle.min.js') }}"></script>
  <!-- Phosphor Icons JS -->
  <script src="{{ url('admin/assets/js/phosphor-icon.js') }}"></script>
  <!-- File Upload -->
  <script src="{{ url('admin/assets/js/file-upload.js') }}"></script>
  <!-- Plyr -->
  <script src="{{ url('admin/assets/js/plyr.js') }}"></script>
  <!-- DataTables (optional, kept for non-Bootstrap Table pages) -->
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
  <!-- Full Calendar -->
  <script src="{{ url('admin/assets/js/full-calendar.js') }}"></script>
  <!-- jQuery UI -->
  <script src="{{ url('admin/assets/js/jquery-ui.js') }}"></script>
  <!-- Editor Quill -->
  <script src="{{ url('admin/assets/js/editor-quill.js') }}"></script>
  <!-- ApexCharts -->
  <script src="{{ url('admin/assets/js/apexcharts.min.js') }}"></script>
  <!-- jVectorMap -->
  <script src="{{ url('admin/assets/js/jquery-jvectormap-2.0.5.min.js') }}"></script>
  <!-- jVectorMap World -->
  <script src="{{ url('admin/assets/js/jquery-jvectormap-world-mill-en.js') }}"></script>
  <!-- Bootstrap Table JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.24.1/dist/bootstrap-table.min.js"></script>
  <!-- Main JS -->
  <script src="{{ url('admin/assets/js/main.js') }}"></script>

  <!-- ApexCharts Scripts -->
  <script>
    function createChart(chartId, chartColor) {
      let currentYear = new Date().getFullYear();
      var options = {
        series: [
          {
            name: 'series1',
            data: [18, 25, 22, 40, 34, 55, 50, 60, 55, 65],
          },
        ],
        chart: {
          type: 'area',
          width: 80,
          height: 42,
          sparkline: {
            enabled: true
          },
          toolbar: {
            show: false
          },
          padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 0
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth',
          width: 1,
          colors: [chartColor],
          lineCap: 'round'
        },
        grid: {
          show: true,
          borderColor: 'transparent',
          strokeDashArray: 0,
          position: 'back',
          xaxis: {
            lines: {
              show: false
            }
          },
          yaxis: {
            lines: {
              show: false
            }
          },
          row: {
            colors: undefined,
            opacity: 0.5
          },
          column: {
            colors: undefined,
            opacity: 0.5
          },
          padding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
          },
        },
        fill: {
          type: 'gradient',
          colors: [chartColor],
          gradient: {
            shade: 'light',
            type: 'vertical',
            shadeIntensity: 0.5,
            gradientToColors: [`${chartColor}00`],
            inverseColors: false,
            opacityFrom: .5,
            opacityTo: 0.3,
            stops: [0, 100],
          },
        },
        markers: {
          colors: [chartColor],
          strokeWidth: 2,
          size: 0,
          hover: {
            size: 8
          }
        },
        xaxis: {
          labels: {
            show: false
          },
          categories: [`Jan ${currentYear}`, `Feb ${currentYear}`, `Mar ${currentYear}`, `Apr ${currentYear}`, `May ${currentYear}`, `Jun ${currentYear}`, `Jul ${currentYear}`, `Aug ${currentYear}`, `Sep ${currentYear}`, `Oct ${currentYear}`, `Nov ${currentYear}`, `Dec ${currentYear}`],
          tooltip: {
            enabled: false,
          },
        },
        yaxis: {
          labels: {
            show: false
          }
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
      };
      var chart = new ApexCharts(document.querySelector(`#${chartId}`), options);
      chart.render();
    }

    createChart('complete-course', '#2FB2AB');
    createChart('earned-certificate', '#27CFA7');
    createChart('course-progress', '#6142FF');
    createChart('community-support', '#FA902F');

    function createLineChart(chartId, chartColor) {
      var options = {
        series: [
          {
            name: 'Study',
            data: [3.6, 1.8, 3.8, 0, 2.4, 0.6, 8, 1.2, 2.8, 2.3, 4, 2],
          },
          {
            name: 'Test',
            data: [0.2, 4, 0, 6, 0.6, 4, 4, 8, 2.1, 5.6, 1.8, 3.6],
          },
        ],
        chart: {
          type: 'line',
          width: '100%',
          height: 350,
          sparkline: {
            enabled: false
          },
          toolbar: {
            show: false
          },
          padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 0
          }
        },
        colors: ['#3D7FF9', chartColor],
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: 'smooth',
          width: 2,
          colors: ["#3D7FF9", chartColor],
          lineCap: 'round',
        },
        grid: {
          show: true,
          borderColor: '#E6E6E6',
          strokeDashArray: 3,
          position: 'back',
          xaxis: {
            lines: {
              show: false
            }
          },
          yaxis: {
            lines: {
              show: true
            }
          },
          row: {
            colors: undefined,
            opacity: 0.5
          },
          column: {
            colors: undefined,
            opacity: 0.5
          },
          padding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
          },
        },
        markers: {
          colors: ["#3D7FF9", chartColor],
          strokeWidth: 3,
          size: 0,
          hover: {
            size: 8
          }
        },
        xaxis: {
          labels: {
            show: false
          },
          categories: [`Jan`, `Feb`, `Mar`, `Apr`, `May`, `Jun`, `Jul`, `Aug`, `Sep`, `Oct`, `Nov`, `Dec`],
          tooltip: {
            enabled: false,
          },
          labels: {
            formatter: function (value) {
              return value;
            },
            style: {
              fontSize: "14px"
            }
          },
        },
        yaxis: {
          labels: {
            formatter: function (value) {
              return "$" + value + "Hr";
            },
            style: {
              fontSize: "14px"
            }
          },
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
        legend: {
          show: false,
          position: 'top',
          horizontalAlign: 'right',
          offsetX: -10,
          offsetY: -0
        }
      };
      var chart = new ApexCharts(document.querySelector(`#${chartId}`), options);
      chart.render();
    }
    createLineChart('doubleLineChart', '#27CFA7');

    var options = {
      series: [65.2, 25, 9.8],
      chart: {
        height: 270,
        type: 'donut',
      },
      colors: ['#3D7FF9', '#27CFA7', '#EA5455'],
      enabled: true,
      formatter: function (val, opts) {
        return opts.w.config.series[opts.seriesIndex] + '%';
      },
      dropShadow: {
        enabled: false
      },
      plotOptions: {
        pie: {
          donut: {
            size: '55%'
          }
        }
      },
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            width: "100%"
          },
          legend: {
            show: false
          }
        }
      }],
      legend: {
        position: 'right',
        offsetY: 0,
        height: 230,
        show: false
      }
    };
    var chart = new ApexCharts(document.querySelector("#activityDonutChart"), options);
    chart.render();
  </script>

  <!-- Page-specific Scripts -->
  @yield('scripts')
</body>

</html>