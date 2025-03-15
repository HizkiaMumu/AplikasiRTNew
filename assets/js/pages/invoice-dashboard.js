'use strict';
document.addEventListener('DOMContentLoaded', function () {
  setTimeout(function () {
    floatchart();
  }, 500);
});

function floatchart() {
  (function () {
    var options_invoice = {
      chart: {
        height: 300,
        type: 'line',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          columnWidth: '50%'
        }
      },
      legend: {
        show: false
      },
      stroke: {
        width: [0, 2],
        curve: 'smooth'
      },
      dataLabels: {
        enabled: false
      },
      series: [
        {
          name: 'Total Tagihan',
          type: 'column',
          data: [4750000, 6350000, 3770000, 4200000, 7750000, 8250000, 4750000, 5830000, 6150000, 4110000, 4550000, 4750000]
        }
      ],
      stroke: {
        width: [0, 2],
        curve: 'smooth'
      },
      fill: {
        type: 'gradient',
        gradient: {
          inverseColors: false,
          shade: 'light',
          type: 'vertical',
          opacityFrom: [0, 1],
          opacityTo: [0.5, 1],
          stops: [0, 100],
          hover: {
            inverseColors: false,
            shade: 'light',
            type: 'vertical',
            opacityFrom: 0.15,
            opacityTo: 0.65,
            stops: [0, 96, 100]
          }
        }
      },
      markers: {
        size: 3,
        colors: '#fFF',
        strokeColors: '#f4c22b',
        strokeWidth: 2,
        shape: 'circle',
        hover: {
          size: 5
        }
      },
      colors: ['#f4c22b', '#f4c22b'],
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      yaxis: {
        tickAmount: 3
      },
      grid: {
        show: true,
        borderColor: '#00000010'
      },
      xaxis: {
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        tickAmount: 11
      }
    };
    var chart = new ApexCharts(document.querySelector('#invoice-chart'), options_invoice);
    chart.render();

    var total_income_graph_options = {
      chart: {
        height: 280,
        type: 'donut'
      },
      series: [27, 23, 20, 17],
      colors: ['#f4c22b', '#1de9b6', '#f44236', '#04a9f5'],
      labels: ['Pending', 'Paid', 'Overdue', 'Draft'],
      fill: {
        opacity: [1, 1, 1, 0.3]
      },
      legend: {
        show: false
      },
      plotOptions: {
        pie: {
          donut: {
            size: '65%',
            labels: {
              show: true,
              name: {
                show: true
              },
              value: {
                show: true
              }
            }
          }
        }
      },
      dataLabels: {
        enabled: false
      },
      responsive: [
        {
          breakpoint: 575,
          options: {
            chart: {
              height: 250
            },
            plotOptions: {
              pie: {
                donut: {
                  size: '65%',
                  labels: {
                    show: false
                  }
                }
              }
            }
          }
        }
      ]
    };
    var chart = new ApexCharts(document.querySelector('#total-income-graph'), total_income_graph_options);
    chart.render();
  })();
}
