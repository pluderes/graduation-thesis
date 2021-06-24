// "use strict";
// $(document).ready(function () {
//     // sale analytics start
//     var chart = AmCharts.makeChart("sales-analytics", {
//         type: "serial",
//         theme: "light",
//         // "hideCredits": true,
//         marginRight: 40,
//         marginLeft: 40,
//         autoMarginOffset: 20,
//         dataDateFormat: "YYYY-MM-DD",
//         valueAxes: [
//             {
//                 id: "v1",
//                 axisAlpha: 0,
//                 position: "left",
//                 ignoreAxisWidth: true,
//             },
//         ],
//         balloon: {
//             borderThickness: 1,
//             shadowAlpha: 0,
//         },
//         graphs: [
//             {
//                 id: "g1",
//                 balloon: {
//                     drop: true,
//                     adjustBorderColor: false,
//                     color: "#ffffff",
//                     type: "smoothedLine",
//                 },
//                 fillAlphas: 0.5,
//                 bullet: "round",
//                 bulletBorderAlpha: 1,
//                 bulletColor: "#FFFFFF",
//                 lineColor: "#11c15b",
//                 bulletSize: 5,
//                 hideBulletsCount: 50,
//                 lineThickness: 3,
//                 title: "red line",
//                 useLineColorForBulletBorder: true,
//                 valueField: "value",
//                 balloonText: "<span style='font-size:18px;'>[[value]]</span>",
//             },
//         ],
//         chartCursor: {
//             valueLineEnabled: true,
//             valueLineBalloonEnabled: true,
//             cursorAlpha: 0,
//             zoomable: false,
//             valueZoomable: true,
//             valueLineAlpha: 0.5,
//         },
//         chartScrollbar: {
//             autoGridCount: true,
//             graph: "g1",
//             oppositeAxis: true,
//             scrollbarHeight: 90,
//         },
//         categoryField: "date",
//         categoryAxis: {
//             parseDates: true,
//             dashLength: 1,
//             minorGridEnabled: true,
//         },
//         export: {
//             enabled: true,
//         },
//         dataProvider: [
//             {
//                 date: "2013-01-25",
//                 value: 80,
//             },
//             {
//                 date: "2013-01-26",
//                 value: 87,
//             },
//             {
//                 date: "2013-01-27",
//                 value: 84,
//             },
//             {
//                 date: "2013-01-28",
//                 value: 83,
//             },
//             {
//                 date: "2013-01-29",
//                 value: 84,
//             },
//             {
//                 date: "2013-01-30",
//                 value: 81,
//             },
//         ],
//     });
//     var ctx = document.getElementById("this-month").getContext("2d");
//     var myChart = new Chart(ctx, {
//         type: "bar",
//         data: avgvalchart(
//             "#11c15b",
//             [30, 15, 25, 35, 30, 20, 25, 30, 15, 1],
//             "#11c15b"
//         ),
//         options: buildchartoption(),
//     });
//     function avgvalchart(a, b, f) {
//         if (f == null) {
//             f = "rgba(0,0,0,0)";
//         }
//         return {
//             labels: [
//                 "January",
//                 "February",
//                 "March",
//                 "April",
//                 "May",
//                 "June",
//                 "July",
//                 "August",
//                 "September",
//                 "October",
//             ],
//             datasets: [
//                 {
//                     label: "",
//                     borderColor: a,
//                     borderWidth: 2,
//                     hitRadius: 30,
//                     pointHoverRadius: 4,
//                     pointBorderWidth: 50,
//                     pointHoverBorderWidth: 12,
//                     pointBackgroundColor: Chart.helpers
//                         .color("#000000")
//                         .alpha(0)
//                         .rgbString(),
//                     pointBorderColor: Chart.helpers
//                         .color("#000000")
//                         .alpha(0)
//                         .rgbString(),
//                     pointHoverBackgroundColor: a,
//                     pointHoverBorderColor: Chart.helpers
//                         .color("#000000")
//                         .alpha(0.1)
//                         .rgbString(),
//                     fill: true,
//                     backgroundColor: f,
//                     data: b,
//                 },
//             ],
//         };
//     }
//     function buildchartoption() {
//         return {
//             title: {
//                 display: !1,
//             },
//             tooltips: {
//                 position: "nearest",
//                 mode: "index",
//                 intersect: false,
//                 yPadding: 10,
//                 xPadding: 10,
//             },
//             legend: {
//                 display: !1,
//                 labels: {
//                     usePointStyle: !1,
//                 },
//             },
//             responsive: !0,
//             maintainAspectRatio: !0,
//             hover: {
//                 mode: "index",
//             },
//             scales: {
//                 xAxes: [
//                     {
//                         display: !1,
//                         gridLines: !1,
//                         scaleLabel: {
//                             display: !0,
//                             labelString: "Month",
//                         },
//                     },
//                 ],
//                 yAxes: [
//                     {
//                         display: !1,
//                         gridLines: !1,
//                         scaleLabel: {
//                             display: !0,
//                             labelString: "Value",
//                         },
//                         ticks: {
//                             beginAtZero: !0,
//                         },
//                     },
//                 ],
//             },
//             elements: {
//                 point: {
//                     radius: 4,
//                     borderWidth: 12,
//                 },
//             },
//             layout: {
//                 padding: {
//                     left: 0,
//                     right: 0,
//                     top: 0,
//                     bottom: 0,
//                 },
//             },
//         };
//     }
//     // sale analytics end
// });
