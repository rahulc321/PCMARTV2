//[Dashboard Javascript]

//Project:	CRMi - Responsive Admin Template
//Primary use:   Used only for the main dashboard (index.html)


$(function () {

  'use strict';
	
	  var bar = new ProgressBar.Circle(progressbar11, {
	  color: '#78D67F',
	  // This has to be the same size as the maximum width to
	  // prevent clipping
	  strokeWidth: 15,
	  trailWidth: 3,
	  easing: 'easeInOut',
	  duration: 1400,
	  text: {
		autoStyleContainer: false
	  },
	  from: { color: '#78D67F', width: 8 },
	  to: { color: '#78D67F', width: 8 },
	  // Set default step function for all animate calls
	  step: function(state, circle) {
		circle.path.setAttribute('stroke', state.color);
		circle.path.setAttribute('stroke-width', state.width);

		var value = Math.round(circle.value() * 150);
		if (value === 0) {
		  circle.setText('');
		} else {
		  circle.setText("<sapn>88%</span>");
		}

	  }
	});
	bar.text.style.fontSize = '1.3rem';

	bar.animate(0.78);
	
	
	var options = {
          series: [{
          name: 'Profit',
          data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
        }, {
          name: 'Expense',
          data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
        }, {
          name: 'Revenue',
          data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
        }],
          chart: {
          type: 'bar',
          height: 350,
			toolbar: {
				show: false,
			}
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            borderRadius: 3
          },
        },
        dataLabels: {
          enabled: false
        },
		legend: {
			position: 'top',
			horizontalAlign: 'right', 
		},
		colors: ['#7047ee', '#3596f7', '#ee3158'],
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
        },
        yaxis: {
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

        var chart = new ApexCharts(document.querySelector("#sales_overview"), options);
        chart.render();
	
	
	
	
		var options = {
          series: [{
          data: [44, 55, 41, 64, 22, 43, 21]
        }, {
          data: [53, 32, 33, 52, 13, 44, 32]
        }, {
          data: [78, 59, 48, 85, 68, 96, 67]
        }],
          chart: {
          type: 'bar',
          height: 468,
			toolbar: {
				show: false,
			}
        },
        plotOptions: {
          bar: {
            horizontal: true,
			columnWidth: '55%',
            borderRadius: 3,
            dataLabels: {
              position: 'top',
            },
          }
        },
        dataLabels: {
          enabled: false,
        },
        stroke: {
          show: true,
          width: 1,
          colors: ['#fff']
        },
		colors: ['#3596f7', '#05825f', '#ffa800'],
        tooltip: {
          shared: true,
          intersect: false
        },
        xaxis: {
          categories: [2017, 2018, 2019, 2020, 2021],
        },
		
		legend: {
			position: 'top',
			horizontalAlign: 'center', 
		},	
        tooltip: {
          y: {
            formatter: function (val) {
              return val + " %"
            }
          }
        },
        };

        var chart = new ApexCharts(document.querySelector("#production_overview"), options);
        chart.render();
	
	
		var options = {
          series: [{
          name: 'Target',
          data: [31, 40, 28, 51, 42, 80, 60]
        }, {
          name: 'Actual Productivity',
          data: [29, 32, 45, 45, 60, 99, 50]
        }],
          chart: {
          height: 185,
          type: 'area',
			toolbar: {
				show: false,
			}
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth',
			width: 0.5,
        },
		colors: ['#3596f7', '#05825f'],
			grid: {
    			show: false,
			},
        xaxis: {
          categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Set", "Sun"],
			labels: {
          		show: false,
			}
        },
        yaxis: {
			labels: {
          		show: false,
			}
        },
		
		legend: {
			show: false, 
		},
        };

        var chart = new ApexCharts(document.querySelector("#chart88"), options);
        chart.render();
		
	
	
		var options = {
          series: [{
          name: 'Online',
          data: [31, 40, 28, 51, 42, 109, 100]
        }, {
          name: 'In Store',
          data: [11, 32, 45, 32, 34, 52, 41]
        }],
          chart: {
          height: 200,
          type: 'line'
        },
		colors: ['#7047ee', '#3596f7'],
		legend: {
		  show: false,
		},
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight',
			width: 2,
        },
        xaxis: {
          categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"]
        },
        };

        var chart = new ApexCharts(document.querySelector("#order-summary-chart"), options);
        chart.render();
	
	
}); // End of use strict

$(function () {

  'use strict';

		am4core.ready(function() {

		// Themes begin
		am4core.useTheme(am4themes_animated);
		// Themes end

		var chart = am4core.create("regional_sales", am4charts.PieChart3D);
		chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

		chart.legend = new am4charts.Legend();

		chart.data = [
		  {
			country: "Ohio",
			litres: 501.9
		  },
		  {
			country: "Texas",
			litres: 301.9
		  },
		  {
			country: "UK",
			litres: 201.1
		  },
		  {
			country: "Florida",
			litres: 165.8
		  },
		  {
			country: "Hawaii",
			litres: 139.9
		  },
		  {
			country: "Indiana",
			litres: 128.3
		  },
		  {
			country: "UK",
			litres: 99
		  },
		  {
			country: "Belgium",
			litres: 60
		  },
		  {
			country: "Colorado",
			litres: 50
		  }
		];

		chart.innerRadius = 50;

		var series = chart.series.push(new am4charts.PieSeries3D());
		series.dataFields.value = "litres";
		series.dataFields.category = "country";

		}); // end am4core.ready()
	
	
	
	
		am4core.ready(function() {

		// Themes begin
		am4core.useTheme(am4themes_animated);
		// Themes end

		// Create map instance
		var chart = am4core.create("customer_location", am4maps.MapChart);

		// Set map definition
		chart.geodata = am4geodata_worldLow;

		// Set projection
		chart.projection = new am4maps.projections.Miller();

		// Create map polygon series
		var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());

		// Exclude Antartica
		polygonSeries.exclude = ["AQ"];

		// Make map load polygon (like country names) data from GeoJSON
		polygonSeries.useGeodata = true;

		// Configure series
		var polygonTemplate = polygonSeries.mapPolygons.template;
		polygonTemplate.tooltipText = "{name}";
		polygonTemplate.polygon.fillOpacity = 0.6;


		// Create hover state and set alternative fill color
		var hs = polygonTemplate.states.create("hover");
		hs.properties.fill = chart.colors.getIndex(0);

		// Add image series
		var imageSeries = chart.series.push(new am4maps.MapImageSeries());
		imageSeries.mapImages.template.propertyFields.longitude = "longitude";
		imageSeries.mapImages.template.propertyFields.latitude = "latitude";
		imageSeries.mapImages.template.tooltipText = "{title}";
		imageSeries.mapImages.template.propertyFields.url = "url";

		var circle = imageSeries.mapImages.template.createChild(am4core.Circle);
		circle.radius = 3;
		circle.propertyFields.fill = "color";
		circle.nonScaling = true;

		var circle2 = imageSeries.mapImages.template.createChild(am4core.Circle);
		circle2.radius = 3;
		circle2.propertyFields.fill = "color";


		circle2.events.on("inited", function(event){
		  animateBullet(event.target);
		})


		function animateBullet(circle) {
			var animation = circle.animate([{ property: "scale", from: 1 / chart.zoomLevel, to: 5 / chart.zoomLevel }, { property: "opacity", from: 1, to: 0 }], 1000, am4core.ease.circleOut);
			animation.events.on("animationended", function(event){
			  animateBullet(event.target.object);
			})
		}

		var colorSet = new am4core.ColorSet();

		imageSeries.data = [ {
		  "title": "Brussels",
		  "latitude": 50.8371,
		  "longitude": 4.3676,
		  "color":colorSet.next()
		}, {
		  "title": "Copenhagen",
		  "latitude": 55.6763,
		  "longitude": 12.5681,
		  "color":colorSet.next()
		}, {
		  "title": "Paris",
		  "latitude": 48.8567,
		  "longitude": 2.3510,
		  "color":colorSet.next()
		}, {
		  "title": "Reykjavik",
		  "latitude": 64.1353,
		  "longitude": -21.8952,
		  "color":colorSet.next()
		}, {
		  "title": "Moscow",
		  "latitude": 55.7558,
		  "longitude": 37.6176,
		  "color":colorSet.next()
		}, {
		  "title": "Madrid",
		  "latitude": 40.4167,
		  "longitude": -3.7033,
		  "color":colorSet.next()
		}, {
		  "title": "London",
		  "latitude": 51.5002,
		  "longitude": -0.1262,
		  "url": "http://www.google.co.uk",
		  "color":colorSet.next()
		}, {
		  "title": "Peking",
		  "latitude": 39.9056,
		  "longitude": 116.3958,
		  "color":colorSet.next()
		}, {
		  "title": "New Delhi",
		  "latitude": 28.6353,
		  "longitude": 77.2250,
		  "color":colorSet.next()
		}, {
		  "title": "Tokyo",
		  "latitude": 35.6785,
		  "longitude": 139.6823,
		  "url": "http://www.google.co.jp",
		  "color":colorSet.next()
		}, {
		  "title": "Ankara",
		  "latitude": 39.9439,
		  "longitude": 32.8560,
		  "color":colorSet.next()
		}, {
		  "title": "Buenos Aires",
		  "latitude": -34.6118,
		  "longitude": -58.4173,
		  "color":colorSet.next()
		}, {
		  "title": "Brasilia",
		  "latitude": -15.7801,
		  "longitude": -47.9292,
		  "color":colorSet.next()
		}, {
		  "title": "Ottawa",
		  "latitude": 45.4235,
		  "longitude": -75.6979,
		  "color":colorSet.next()
		}, {
		  "title": "Washington",
		  "latitude": 38.8921,
		  "longitude": -77.0241,
		  "color":colorSet.next()
		}, {
		  "title": "Kinshasa",
		  "latitude": -4.3369,
		  "longitude": 15.3271,
		  "color":colorSet.next()
		}, {
		  "title": "Cairo",
		  "latitude": 30.0571,
		  "longitude": 31.2272,
		  "color":colorSet.next()
		}, {
		  "title": "Pretoria",
		  "latitude": -25.7463,
		  "longitude": 28.1876,
		  "color":colorSet.next()
		} ];

		}); // end am4core.ready()
	
	}); // End of use strict
