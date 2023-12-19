function getChartColorsArray(e) {
	if (null !== document.getElementById(e)) {
		var t = document.getElementById(e).getAttribute("data-colors");
		if (t) return (t = JSON.parse(t)).map(function(e) {
			var t = e.replace(" ", "");
			if (-1 === t.indexOf(",")) {
				var o = getComputedStyle(document.documentElement).getPropertyValue(t);
				return o || t
			}
			e = e.split(",");
			return 2 != e.length ? t : "rgba(" + getComputedStyle(document.documentElement).getPropertyValue(e[0]) + "," + e[1] + ")"
		});
		console.warn("data-colors atributes not found on", e)
	}
}

var barchartCountriesColors = getChartColorsArray("countries_charts");

function generateData(e, t) {
	for (var o = 0, a = []; o < e;) {
		var r = (o + 1).toString() + "h",
			s = Math.floor(Math.random() * (t.max - t.min + 1)) + t.min;
		a.push({
			x: r,
			y: s
		}), o++
	}
	return a
}

barchartCountriesColors && (options = {
	series: [{
		data: [1010, 1640, 490, 1255, 1050, 689, 800, 420, 1085, 589],
		name: "Sessions"
	}],
	chart: {
		type: "bar",
		height: 436,
		toolbar: {
			show: !1
		}
	},
	plotOptions: {
		bar: {
			borderRadius: 4,
			horizontal: !0,
			distributed: !0,
			dataLabels: {
				position: "top"
			}
		}
	},
	colors: barchartCountriesColors,
	dataLabels: {
		enabled: !0,
		offsetX: 32,
		style: {
			fontSize: "12px",
			fontWeight: 400,
			colors: ["#adb5bd"]
		}
	},
	legend: {
		show: !1
	},
	grid: {
		show: !1
	},
	xaxis: {
		categories: ["India", "United States", "China", "Indonesia", "Russia", "Bangladesh", "Canada", "Brazil", "Vietnam", "UK"]
	}
}, (chart = new ApexCharts(document.querySelector("#audiences-sessions-country-charts"), options)).render());
var columnoptions, chartAudienceColumnChartsColors = getChartColorsArray("jemaah_berangkat_chart");
chartAudienceColumnChartsColors && (columnoptions = {
	series: [{
		name: "Jemaah",
		data: [25.3, 12.5, 20.2, 18.5, 40.4, 25.4, 15.8, 22.3, 19.2, 25.3, 12.5, 20.2]
	}],
	chart: {
		type: "bar",
		height: 309,
		stacked: !0,
		toolbar: {
			show: !1
		}
	},
	plotOptions: {
		bar: {
			horizontal: !1,
			columnWidth: "20%",
			borderRadius: 6
		}
	},
	dataLabels: {
		enabled: !1
	},
	legend: {
		show: !0,
		position: "bottom",
		horizontalAlign: "center",
		fontWeight: 400,
		fontSize: "8px",
		offsetX: 0,
		offsetY: 0,
		markers: {
			width: 9,
			height: 9,
			radius: 4
		}
	},
	stroke: {
		show: !0,
		width: 2,
		colors: ["transparent"]
	},
	grid: {
		show: !1
	},
	colors: chartAudienceColumnChartsColors,
	xaxis: {
		categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
		axisTicks: {
			show: !1
		},
		axisBorder: {
			show: !0,
			strokeDashArray: 1,
			height: 1,
			width: "100%",
			offsetX: 0,
			offsetY: 0
		}
	},
	yaxis: {
		show: !1
	},
	fill: {
		opacity: 1
	}
}, (chart = new ApexCharts(document.querySelector("#jemaah_berangkat_chart"), columnoptions)).render());
var options, chart, dountchartUserDeviceColors = getChartColorsArray("user_device_pie_charts");
dountchartUserDeviceColors && (options = {
	series: [78.56, 105.02, 42.89],
	labels: ["Desktop", "Mobile", "Tablet"],
	chart: {
		type: "donut",
		height: 219
	},
	plotOptions: {
		pie: {
			size: 100,
			donut: {
				size: "76%"
			}
		}
	},
	dataLabels: {
		enabled: !1
	},
	legend: {
		show: !1,
		position: "bottom",
		horizontalAlign: "center",
		offsetX: 0,
		offsetY: 0,
		markers: {
			width: 20,
			height: 6,
			radius: 2
		},
		itemMargin: {
			horizontal: 12,
			vertical: 0
		}
	},
	stroke: {
		width: 0
	},
	yaxis: {
		labels: {
			formatter: function(e) {
				return e + "k Users"
			}
		},
		tickAmount: 4,
		min: 0
	},
	colors: dountchartUserDeviceColors
}, (chart = new ApexCharts(document.querySelector("#audiences-sessions-country-charts"), options)).render());
var columnoptions, chartAudienceColumnChartsColors = getChartColorsArray("total_kuota_chart");
chartAudienceColumnChartsColors && (columnoptions = {
	series: [{
		name: "Total Kuota",
		data: [25.3, 12.5, 20.2, 18.5, 40.4, 25.4, 15.8, 22.3, 19.2, 25.3, 12.5, 20.2]
	}, {
		name: "Sisa Kuota",
		data: [36.2, 22.4, 38.2, 30.5, 26.4, 30.4, 20.2, 29.6, 10.9, 36.2, 22.4, 38.2]
	}],
	chart: {
		type: "bar",
		height: 309,
		stacked: !0,
		toolbar: {
			show: !1
		}
	},
	plotOptions: {
		bar: {
			horizontal: !1,
			columnWidth: "20%",
			borderRadius: 6
		}
	},
	dataLabels: {
		enabled: !1
	},
	legend: {
		show: !0,
		position: "bottom",
		horizontalAlign: "center",
		fontWeight: 400,
		fontSize: "8px",
		offsetX: 0,
		offsetY: 0,
		markers: {
			width: 9,
			height: 9,
			radius: 4
		}
	},
	stroke: {
		show: !0,
		width: 2,
		colors: ["transparent"]
	},
	grid: {
		show: !1
	},
	colors: chartAudienceColumnChartsColors,
	xaxis: {
		categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
		axisTicks: {
			show: !1
		},
		axisBorder: {
			show: !0,
			strokeDashArray: 1,
			height: 1,
			width: "100%",
			offsetX: 0,
			offsetY: 0
		}
	},
	yaxis: {
		show: !1
	},
	fill: {
		opacity: 1
	}
}, (chart = new ApexCharts(document.querySelector("#total_kuota_chart"), columnoptions)).render());
var options, chart, dountchartUserDeviceColors = getChartColorsArray("user_device_pie_charts");
dountchartUserDeviceColors && (options = {
	series: [78.56, 105.02, 42.89],
	labels: ["Desktop", "Mobile", "Tablet"],
	chart: {
		type: "donut",
		height: 219
	},
	plotOptions: {
		pie: {
			size: 100,
			donut: {
				size: "76%"
			}
		}
	},
	dataLabels: {
		enabled: !1
	},
	legend: {
		show: !1,
		position: "bottom",
		horizontalAlign: "center",
		offsetX: 0,
		offsetY: 0,
		markers: {
			width: 20,
			height: 6,
			radius: 2
		},
		itemMargin: {
			horizontal: 12,
			vertical: 0
		}
	},
	stroke: {
		width: 0
	},
	yaxis: {
		labels: {
			formatter: function(e) {
				return e + "k Users"
			}
		},
		tickAmount: 4,
		min: 0
	},
	colors: dountchartUserDeviceColors
}, (chart = new ApexCharts(document.querySelector("#user_device_pie_charts"), options)).render());