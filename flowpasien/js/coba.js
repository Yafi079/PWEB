// SIDEBAR
const menuItems = document.querySelectorAll('.menu-item');


//remove active class from all menu items
const changeActiveItem = () => {
  menuItems.forEach(item => {
    item.classList.remove('active');
  })
}


menuItems.forEach(item => {
  item.addEventListener('click', () => {
    changeActiveItem();
    item.classList.add('active');
  })
})


//API CHART STATISTIC
var options = {
  series: [{
  name: 'series1',
  data: [31, 40, 28, 51, 42, 109, 100]
}, {
  name: 'series2',
  data: [11, 32, 45, 32, 34, 52, 41]
}],
  chart: {
  height: 350,
  type: 'area'
},
dataLabels: {
  enabled: false
},
stroke: {
  curve: 'smooth'
},
xaxis: {
  type: 'datetime',
  categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
},
tooltip: {
  x: {
    format: 'dd/MM/yy HH:mm'
  },
},
};

var chart = new ApexCharts(document.querySelector("#statistic"), options);
chart.render();

//API CHART KEPUASAN
var options = {
  series: [{
  name: 'Tidak Puas',
  data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
}, {
  name: 'Biasa Saja',
  data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
}, {
  name: 'Sangat Puas',
  data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
}],
  chart: {
  type: 'bar',
  height: 350
},
plotOptions: {
  bar: {
    horizontal: false,
    columnWidth: '55%',
    endingShape: 'rounded'
  },
},
dataLabels: {
  enabled: false
},
stroke: {
  show: true,
  width: 2,
  colors: ['transparent']
},
xaxis: {
  categories: ['2013', '2014 ', '2015', '2016', '2017', '2018', '2019', '2020', '2021'],
},
yaxis: {
  title: {
    text: 'Jumlah Pasien'
  }
},
fill: {
  opacity: 1
},
tooltip: {
  y: {
    formatter: function (val) {
      return "$ " + val + " thousands"
    }
  }
}
};

var chart = new ApexCharts(document.querySelector("#kepuasan"), options);
chart.render();