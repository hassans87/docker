queryStream();
//$('.tensor-flow,.rednder').change(function(){queryStream();})
setInterval(function () {
  $("head title").html(
    $("head title").html().substring(1) + $("head title").html().substring(0, 1)
  );
}, 400);
$(".query_fire").click(function () {
  queryStream();
});
$(".query").change(function () {
  // queryStream();
  Notiflix.Notify.Info("Changes detected, Press Query Button to apply");
});
$("#info").click(function () {
  Notiflix.Report.Info(
    "Information!",
    "Database avaialbe from 01-01-2016 to 30-11-2022, base interval is 1 hour from Violink source, Export server can handle up to 1000 data points more than this will throw an error",
    "Close"
  );
});
$("#export_data").click(function () {
  window.location.replace("./data_export_ro2.php");
});
$("#no2_main").click(function () {
  window.location.replace("./ro2_normalization.php");
});
// constructor function
function Stream(target) {
  this.series = $("#line" + target).is(":checked");
  this.ufData = $("#ufdata" + target).val();
}
function ChartParam(target) {
  this.series = $("#line" + target).is(":checked");
  this.ufData = $("#ufdata" + target).val();
  this.pen = $("#pen" + target).val();
  this.lable = $("#dt_label" + target).is(":checked");
  this.yAxis = $("#y_axis" + target).is(":checked");
  this.chartType = $("#chart_type" + target).val();
  this.lineWidth = $("#line_width" + target).val();
  this.markerWeight = $("#marker" + target).val();
  this.markerShape = $("#marker_shape" + target).val();
  this.modalColor = $(".modelheader" + target).css({
    "background-color": this.pen,
  });
  this.modalTitle = $("#seriestitle" + target).html(
    "Series " +
      target +
      ": " +
      $("#ufdata" + target + " option:selected").text()
  );
  this.isY = false;
  if (this.series && this.yAxis) {
    this.isY = true;
  } else {
    this.isY = false;
  }
}

function getNumberOfDays(start, end) {
  const date1aa = new Date(start);
  const date2bb = new Date(end);
  // One day in milliseconds
  const oneDay = 1000 * 60 * 60 * 24;
  // Calculating the time difference between two dates
  const diffInTime = date2bb.getTime() - date1aa.getTime();
  // Calculating the no. of days between two dates
  const diffInDays = Math.round(diffInTime / oneDay);
  return diffInDays + 1;
}

$(".tensor-flow,.rednder").change(function () {
  let fx1 = $("#start_date").val();
  let fx2 = $("#end_date").val();
  let query_days_calc = getNumberOfDays(fx1, fx2);
  if (query_days_calc > 12000) {
    $(".query_fire").prop("disabled", true);
    $(".query_fire").removeClass("btn-light").addClass("btn-danger");
    Notiflix.Notify.Failure("Reduce query dates, max 600 days");
    Notiflix.Report.Failure(
      "Query Warning",
      "Check your query, max 600 days query allowed",
      "Close"
    );
  } else if (query_days_calc < 0) {
    $(".query_fire").prop("disabled", true);
    $(".query_fire").removeClass("btn-light").addClass("btn-danger");
    Notiflix.Notify.Failure("Reduce query dates, max 600 days");
    Notiflix.Report.Failure(
      "Query Warning",
      "check query, invalid dates range !",
      "Close"
    );
  } else {
    $(".query_fire").prop("disabled", false);
    $(".query_fire").removeClass("btn-danger").addClass("btn-success");
  }
});

function queryStream() {
  
  Notiflix.Block.Pulse("body", "Please Wait, feteching query data");
  let plotParam = {
    dateFrom: $("#start_date").val(),
    dateTo: $("#end_date").val(),
    ufqry: $("#skidx").val(),
    interval: $("#invt").val(), 
    flowMin:$("#flow_param_min").val(),
    flowMax:$("#flow_param_max").val(),
    presMin:$("#pres_param_min").val(),
    presMax:$("#pres_param_max").val(),
  };

  let s1Param = new Stream(1);
  let s2Param = new Stream(2);
  let s3Param = new Stream(3);
  let s4Param = new Stream(4);
  let s5Param = new Stream(5);
  let s6Param = new Stream(6);
  let s7Param = new Stream(7);

  let d1 = s1Param.series;
  let d2 = s2Param.series;
  let d3 = s3Param.series;
  let d4 = s4Param.series;
  let d5 = s5Param.series;
  let d6 = s6Param.series;
  let d7 = s7Param.series;
  let date1 = plotParam.dateFrom;
  let date2 = plotParam.dateTo;
  const query_data = new URLSearchParams({
    skid_tag: "test",
    action: "data",
    date1: plotParam.dateFrom,
    date2: plotParam.dateTo,
    ufGroup: plotParam.bayline,
    datainvt: plotParam.interval,
    roskid: plotParam.ufqry,
    ufdata1: s1Param.ufData,
    ufdata2: s2Param.ufData,
    ufdata3: s3Param.ufData,
    ufdata4: s4Param.ufData,
    ufdata5: s5Param.ufData,
    ufdata6: s6Param.ufData,
    ufdata7: s7Param.ufData,
    minflow:plotParam.flowMin,
    mxflow:plotParam.flowMax,
    minpressure: plotParam.presMin,
    mxpressure:plotParam.presMax,
    d1: d1,
    d2: d2,
    d3: d3,
    d4: d4,
    d5: d5,
    d6: d6,
    d7: d7,
  });
  fetch("../../_process/ro2_normalization/we0923d_dft57485qstm.php",{
    method: "POST",
    body: query_data,
  })
    .then((response) => response.text())
    .then((data) => {
      try {
        //console.log(data);
        let dataStream = JSON.parse(data);
        let date = dataStream[0];
        let dataSeries1 = dataStream[1];
        let dataSeries2 = dataStream[2];
        let dataSeries3 = dataStream[3];
        let dataSeries4 = dataStream[4];
        let dataSeries5 = dataStream[5];
        let dataSeries6 = dataStream[6];
        let dataSeries7 = dataStream[7];

        //date modification
        let date22 = [];
        let datex = [];
        for (var i in date) {
          let months_array_primary = [
            "dd",
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
          ];
          let mydate = date[i];
          let day_x = mydate.substring(8, 10);
          let month_x = mydate.substring(5, 7);
          let year_x = mydate.substring(2, 4);
          let date_xseries = day_x + "-" + month_x + "-" + year_x;
          date22.push(date_xseries);
          let timex = mydate.substring(11, 16);
          let siri_month = parseInt(month_x);
          siri_month = months_array_primary[siri_month];
          let siri_fullyear = mydate.substring(0, 4);
          let series_date_conts =
            day_x + " " + siri_month + " " + siri_fullyear + " " + timex;
          datex.push(series_date_conts);
        }
        // x-axis interval calculations
        let tickcal = 0;
        let date_length = date22.length;
        let core_factor = date_length / 15;
        tickcal = Math.round(core_factor);
        tickcal = parseInt(tickcal);

        dataSeries1 = dataSeries1.map(parseFloat);
        dataSeries2 = dataSeries2.map(parseFloat);
        dataSeries3 = dataSeries3.map(parseFloat);
        dataSeries4 = dataSeries4.map(parseFloat);
        dataSeries5 = dataSeries5.map(parseFloat);
        dataSeries6 = dataSeries6.map(parseFloat);
        dataSeries7 = dataSeries7.map(parseFloat);

        function seriesLook(dv, series) {
          if (dv) {
            $("#pen" + series).show(900);
            $("#ufdata" + series).show(1200);
            $("#panel" + series).show(900);
            $("#data_length" + series).show(900);
            $("#data_max" + series).show(900);
            $("#data_min" + series).show(900);
            $("#data_avg" + series).show(900);
            $(".tr" + series)
              .addClass("table-light")
              .removeClass("table-secondary");
          } else {
            $("#pen" + series).hide(900);
            $("#ufdata" + series).hide(1200);
            $("#panel" + series).hide(900);
            $("#data_length" + series).hide(900);
            $("#data_max" + series).hide(900);
            $("#data_min" + series).hide(900);
            $("#data_avg" + series).hide(900);
            $(".tr" + series)
              .removeClass("table-light")
              .addClass("table-secondary");
            $("#unit" + series).html(" ");
          }
        }

        function seriesData(stream, series, go, valLimit, offset, unit, sum) {
          if (go && stream.length >= 1) {
            let collection = [];
            for (var i = 0; i < stream.length; i++) {
              let dmax_int1 = stream[i];
              if (dmax_int1) {
                collection.push(dmax_int1);
              }
            }
            if (collection.length >= 1) {
              $("#data_length" + series).html(collection.length);
              $("#unit" + series).html(unit);
              if (sum) {
                $("#data_max" + series).html(" ");
                $("#data_min" + series).html(" ");
                $("#data_avg" + series).html(" ");
              } else {
                let dmax1 = collection.reduce(function (a, b) {
                  return Math.max(a, b);
                });
                let dmin1 = collection.reduce(function (a, b) {
                  return Math.min(a, b);
                });
                let avera1 =
                  collection.reduce((a, b) => a + b, 0) / collection.length;
                $("#data_max" + series).html(dmax1.toFixed(valLimit));
                $("#data_min" + series).html(dmin1.toFixed(valLimit));
                $("#data_avg" + series).html(avera1.toFixed(valLimit));
              }
            } else {
              Notiflix.Notify.Failure(
                "Series" + series + " : check data Query"
              );
              Notiflix.Report.Failure(
                "Query Warning",
                "Data Array is empty",
                "Close"
              );
              $("#data_length" + series).html("0");
              $("#data_max" + series).html("-");
              $("#data_min" + series).html("-");
              $("#data_avg" + series).html("-");
              $("#unit" + series).html(" ");
            }
          }
        }

        //calculating date full namespace
        var full_months_array = [
          "dd",
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December",
        ];
        var date1_day = date1.substring(8, 10);
        var date2_day = date2.substring(8, 10);
        var date1_month = date1.substring(5, 7);
        var date2_month = date2.substring(5, 7);
        date1_month = parseInt(date1_month);
        date2_month = parseInt(date2_month);
        var full_year1 = date1.substring(0, 4);
        var full_year2 = date2.substring(0, 4);
        var date1_mode =
          date1_day + "-" + full_months_array[date1_month] + "-" + full_year1;
        var date2_mode =
          date2_day + "-" + full_months_array[date2_month] + "-" + full_year2;
        var dates_diff_cal = getNumberOfDays(datex[0], datex[datex.length - 1]);
        renderedChart();
        $(".chart_render").change(function () {
          renderedChart();
        });
        $(".filter").click(function () {
          renderedChart();
        });
        function renderedChart() {
          const st = {
            dp_st1_dp_906: {
              unit: " bar",
              name: "DPI-906 Stage-1",
              yAxis: 1,
              arrFlr: 0.1,
              valFixTo: 2,
              sum: false,
            },
            dp_st2_dp_907: {
              unit: " bar",
              name: "DPI-907 Stage-2",
              yAxis: 1,
              arrFlr: 0.1,
              valFixTo: 2,
              sum: false,
            },

            tot_pres_dp: {
              unit: " bar",
              name: "Total DPI T-factor",
              yAxis: 1,
              arrFlr: 0.1,
              valFixTo: 2,
              sum: false,
            },
            dp_total: {
              unit: " bar",
              name: "Total DPI calc.",
              yAxis: 1,
              arrFlr: 0.01,
              valFixTo: 2,
              sum: false,
            },
            dp_stage1_calc: {
              unit: " bar",
              name: "Stage-1 DP calc.",
              yAxis: 1,
              arrFlr: 0.1,
              valFixTo: 2,
              sum: false,
            },
            dp_stage2_calc: {
              unit: " bar",
              name: "Stage-2 DP calc.",
              yAxis: 1,
              arrFlr: 0.1,
              valFixTo: 2,
              sum: false,
            },
            tmp_2nd_pass: {
              unit: " bar",
              name: "TMP",
              yAxis: 4,
              arrFlr: 0.1,
              valFixTo: 1,
              sum: false,
            },
            tot_recovery: {
              unit: " %",
              name: "Total Recovery",
              yAxis: 2,
              arrFlr: 0.1,
              valFixTo: 1,
              sum: false,
            },
            perm_flux: {
              unit: " Lmh",
              name: "Permeate Flux",
              yAxis: 3,
              arrFlr: 1,
              valFixTo: 1,
              sum: false,
            },
            tds_at_mem_surf: {
              unit: " ppm",
              name: "TDS at Membrane Surface",
              yAxis: 8,
              arrFlr: 10,
              valFixTo: 0,
              sum: false,
            },
            net_drv_pres: {
              unit: " bar",
              name: "Net Driving Pressure",
              yAxis: 4,
              arrFlr: 1,
              valFixTo: 1,
              sum: false,
            },
            t_cor_salt_pas: {
              unit: " %",
              name: "Total Salt Passage",
              yAxis: 7,
              arrFlr: 0.01,
              valFixTo: 2,
              sum: false,
            },
            tot_permeab: {
              unit: " Lmh/bar",
              name: "Total Permeability",
              yAxis: 9,
              arrFlr: 0.1,
              valFixTo: 1,
              sum: false,
            },
            feed_wtr_temp: {
              unit: " °C",
              name: "Feed Water Temp.",
              yAxis: 10,
              arrFlr: 1,
              valFixTo: 1,
              sum: false,
            },
            feed_cond: {
              unit: " uS/cm",
              name: "Feed Water EC",
              yAxis: 6,
              arrFlr: 0.5,
              valFixTo: 0,
              sum: false,
            },
            stage2_cond: {
              unit: " uS/cm",
              name: "Stage-2 Permeate EC",
              yAxis: 6,
              arrFlr: 1,
              valFixTo: 1,
              sum: false,
            },
            permeate_cond: {
              unit: " uS/cm",
              name: "Common Permeate EC",
              yAxis: 6,
              arrFlr: 1,
              valFixTo: 1,
              sum: false,
            },
            feed_pres: {
              unit: " bar",
              name: "Feed Pressure",
              yAxis: 4,
              arrFlr: 1,
              valFixTo: 1,
              sum: false,
            },
            feed_pres_2ndstg: {
              unit: " bar",
              name: "Feed Pressure Stage-2",
              yAxis: 4,
              arrFlr: 1,
              valFixTo: 1,
              sum: false,
            },
            brine_pres_2ndstg: {
              unit: " bar",
              name: "Stage-2 Brine Pressure",
              yAxis: 4,
              arrFlr: 1,
              valFixTo: 1,
              sum: false,
            },
            stage1_per_pres: {
              unit: " bar",
              name: "Stage-1 Permeate Pressure",
              yAxis: 4,
              arrFlr: 1,
              valFixTo: 1,
              sum: false,
            },

            totalfeed_calc: {
              unit: " m<sup>3</sup>/h",
              name: "Total Feed Flow",
              yAxis: 5,
              arrFlr: 100,
              valFixTo: 0,
              sum: false,
            },
            stage1_perm_flow: {
              unit: " m<sup>3</sup>/h",
              name: "Stage-1 Permeate Flow",
              yAxis: 5,
              arrFlr: 100,
              valFixTo: 0,
              sum: false,
            },
            stage2_perm_flow: {
              unit: " m<sup>3</sup>/h",
              name: "Stage-2 Permeate Flow",
              yAxis: 5,
              arrFlr: 1,
              valFixTo: 0,
              sum: false,
            },
            total_perm_flow: {
              unit: " m<sup>3</sup>/h",
              name: "Total Permeate Flow",
              yAxis: 5,
              arrFlr: 1,
              valFixTo: 0,
              sum: false,
            },
            brine_flowrate: {
              unit: " m<sup>3</sup>/h",
              name: "Brine Flow",
              yAxis: 5,
              arrFlr: 1,
              valFixTo: 0,
              sum: false,
            },
            brine_rofeed: {
              unit: " m<sup>3</sup>/h",
              name: "Brine to RO Feed",
              yAxis: 5,
              arrFlr: 0.5,
              valFixTo: 0,
              sum: false,
            },
            brine_nl: {
              unit: " m<sup>3</sup>/h",
              name: "Brine to RO feed NL",
              yAxis: 5,
              arrFlr: 1,
              valFixTo: 0,
              sum: false,
            },
            brine_sl: {
              unit: " m<sup>3</sup>/h",
              name: "Brine to RO feed SL",
              yAxis: 5,
              arrFlr: 1,
              valFixTo: 0,
              sum: false,
            },
          };

          let s1Param = new ChartParam(1);
          let s2Param = new ChartParam(2);
          let s3Param = new ChartParam(3);
          let s4Param = new ChartParam(4);
          let s5Param = new ChartParam(5);
          let s6Param = new ChartParam(6);
          let s7Param = new ChartParam(7);

          let dataTrain1 = dataSeries1;
          let dataTrain2 = dataSeries2;
          let dataTrain3 = dataSeries3;
          let dataTrain4 = dataSeries4;
          let dataTrain5 = dataSeries5;
          let dataTrain6 = dataSeries6;
          let dataTrain7 = dataSeries7;
          seriesLook(s1Param.series, 1);
          seriesLook(s2Param.series, 2);
          seriesLook(s3Param.series, 3);
          seriesLook(s4Param.series, 4);
          seriesLook(s5Param.series, 5);
          seriesLook(s6Param.series, 6);
          seriesLook(s7Param.series, 7);

          seriesData(
            dataSeries1,
            1,
            s1Param.series,
            st[s1Param.ufData]["valFixTo"],
            st[s1Param.ufData]["arrFlr"],
            st[s1Param.ufData]["unit"],
            st[s1Param.ufData]["sum"]
          );
          seriesData(
            dataSeries2,
            2,
            s2Param.series,
            st[s2Param.ufData]["valFixTo"],
            st[s2Param.ufData]["arrFlr"],
            st[s2Param.ufData]["unit"],
            st[s2Param.ufData]["sum"]
          );
          seriesData(
            dataSeries3,
            3,
            s3Param.series,
            st[s3Param.ufData]["valFixTo"],
            st[s3Param.ufData]["arrFlr"],
            st[s3Param.ufData]["unit"],
            st[s3Param.ufData]["sum"]
          );
          seriesData(
            dataSeries4,
            4,
            s4Param.series,
            st[s4Param.ufData]["valFixTo"],
            st[s4Param.ufData]["arrFlr"],
            st[s4Param.ufData]["unit"],
            st[s4Param.ufData]["sum"]
          );
          seriesData(
            dataSeries5,
            5,
            s5Param.series,
            st[s5Param.ufData]["valFixTo"],
            st[s5Param.ufData]["arrFlr"],
            st[s5Param.ufData]["unit"],
            st[s5Param.ufData]["sum"]
          );
          seriesData(
            dataSeries6,
            6,
            s6Param.series,
            st[s6Param.ufData]["valFixTo"],
            st[s6Param.ufData]["arrFlr"],
            st[s6Param.ufData]["unit"],
            st[s6Param.ufData]["sum"]
          );
          seriesData(
            dataSeries7,
            7,
            s7Param.series,
            st[s7Param.ufData]["valFixTo"],
            st[s7Param.ufData]["arrFlr"],
            st[s7Param.ufData]["unit"],
            st[s7Param.ufData]["sum"]
          );
          let dataSeries1x = dataTrain1;
          let dataSeries2x = dataTrain2;
          let dataSeries3x = dataTrain3;
          let dataSeries4x = dataTrain4;
          let dataSeries5x = dataTrain5;
          let dataSeries6x = dataTrain6;
          let dataSeries7x = dataTrain7;
          let plotParam = {
            dateFrom: $("#start_date").val(),
            dateTo: $("#end_date").val(),
            bayline: "43",
            roSkid: $("#skidx").val(),
            interval: $("#invt").val(),
            flowMin:$("#flow_param_min").val(),
            flowMax:$("#flow_param_max").val(),
            presMin:$("#pres_param_min").val(),
            presMax:$("#pres_param_max").val(),
            ufqry: " ",
            chartBackground: $("#pen_main").val(),
            plotWidth: $("#plot_width").val(),
            legendShow: $("#is_legend").is(":checked"),
            yAxis: $("#is_main_yaxis").is(":checked"),
            gridColor: $("#pen_grid").val(),
            plotExpWidth: $("#export_width").val(),
            plotExpHeight: $("#export_height").val(),
            plotExpBackground: $("#pen_export").val(),
            plotExpTitleColor: $("#pen_export_title").val(),
          };
          var stack0 = ["recovery"];
          var stack1 = [
            "dp_st1_dp_906",
            "dp_st2_dp_907",
            "tot_pres_dp",
            "dp_total",
            "dp_stage1_calc",
            "dp_stage2_calc",
          ];
          var stack2 = ["tot_recovery"];
          var stack3 = ["perm_flux"];
          var stack4 = ["feed_cond", "stage2_cond", "permeate_cond"];
          var stack5 = [
            "totalfeed_calc",
            "stage1_perm_flow",
            "stage2_perm_flow",
            "total_perm_flow",
            "brine_flowrate",
            "brine_rofeed",
            "brine_nl",
            "brine_sl",
          ];
          var stack6 = [
            "feed_pres",
            "feed_pres_2ndstg",
            "brine_pres_2ndstg",
            "stage1_per_pres",
            "tmp_2nd_pass",
            "net_drv_pres",
          ];
          var stack7 = ["t_cor_salt_pas"];
          var stack8 = ["tds_at_mem_surf"];
          var stack9 = ["tot_permeab"];
          var stack10 = ["feed_wtr_temp"];
          var mainYaxis =
            plotParam.yAxis ||
            (s1Param.isY && stack0.includes(s1Param.ufData)) ||
            (s2Param.isY && stack0.includes(s2Param.ufData)) ||
            (s3Param.isY && stack0.includes(s3Param.ufData)) ||
            (s4Param.isY && stack0.includes(s4Param.ufData)) ||
            (s5Param.isY && stack0.includes(s5Param.ufData)) ||
            (s6Param.isY && stack0.includes(s6Param.ufData)) ||
            (s7Param.isY && stack0.includes(s7Param.ufData))
              ? true
              : false;
          var dpX_Yaxis =
            (s1Param.isY && stack1.includes(s1Param.ufData)) ||
            (s2Param.isY && stack1.includes(s2Param.ufData)) ||
            (s3Param.isY && stack1.includes(s3Param.ufData)) ||
            (s4Param.isY && stack1.includes(s4Param.ufData)) ||
            (s5Param.isY && stack1.includes(s5Param.ufData)) ||
            (s6Param.isY && stack1.includes(s6Param.ufData)) ||
            (s7Param.isY && stack1.includes(s7Param.ufData))
              ? true
              : false;
          var recovery_Yaxis =
            (s1Param.isY && stack2.includes(s1Param.ufData)) ||
            (s2Param.isY && stack2.includes(s2Param.ufData)) ||
            (s3Param.isY && stack2.includes(s3Param.ufData)) ||
            (s4Param.isY && stack2.includes(s4Param.ufData)) ||
            (s5Param.isY && stack2.includes(s5Param.ufData)) ||
            (s6Param.isY && stack2.includes(s6Param.ufData)) ||
            (s7Param.isY && stack2.includes(s7Param.ufData))
              ? true
              : false;
          var per_Yaxis =
            (s1Param.isY && stack3.includes(s1Param.ufData)) ||
            (s2Param.isY && stack3.includes(s2Param.ufData)) ||
            (s3Param.isY && stack3.includes(s3Param.ufData)) ||
            (s4Param.isY && stack3.includes(s4Param.ufData)) ||
            (s5Param.isY && stack3.includes(s5Param.ufData)) ||
            (s6Param.isY && stack3.includes(s6Param.ufData)) ||
            (s7Param.isY && stack3.includes(s7Param.ufData))
              ? true
              : false;
          var ecYaxis =
            (s1Param.isY && stack4.includes(s1Param.ufData)) ||
            (s2Param.isY && stack4.includes(s2Param.ufData)) ||
            (s3Param.isY && stack4.includes(s3Param.ufData)) ||
            (s4Param.isY && stack4.includes(s4Param.ufData)) ||
            (s5Param.isY && stack4.includes(s5Param.ufData)) ||
            (s6Param.isY && stack4.includes(s6Param.ufData)) ||
            (s7Param.isY && stack4.includes(s7Param.ufData))
              ? true
              : false;
          var florate_y =
            (s1Param.isY && stack5.includes(s1Param.ufData)) ||
            (s2Param.isY && stack5.includes(s2Param.ufData)) ||
            (s3Param.isY && stack5.includes(s3Param.ufData)) ||
            (s4Param.isY && stack5.includes(s4Param.ufData)) ||
            (s5Param.isY && stack5.includes(s5Param.ufData)) ||
            (s6Param.isY && stack5.includes(s6Param.ufData)) ||
            (s7Param.isY && stack5.includes(s7Param.ufData))
              ? true
              : false;
          var presYaxis =
            (s1Param.isY && stack6.includes(s1Param.ufData)) ||
            (s2Param.isY && stack6.includes(s2Param.ufData)) ||
            (s3Param.isY && stack6.includes(s3Param.ufData)) ||
            (s4Param.isY && stack6.includes(s4Param.ufData)) ||
            (s5Param.isY && stack6.includes(s5Param.ufData)) ||
            (s6Param.isY && stack6.includes(s6Param.ufData)) ||
            (s7Param.isY && stack6.includes(s7Param.ufData))
              ? true
              : false;
          var saltpasYaxis =
            (s1Param.isY && stack7.includes(s1Param.ufData)) ||
            (s2Param.isY && stack7.includes(s2Param.ufData)) ||
            (s3Param.isY && stack7.includes(s3Param.ufData)) ||
            (s4Param.isY && stack7.includes(s4Param.ufData)) ||
            (s5Param.isY && stack7.includes(s5Param.ufData)) ||
            (s6Param.isY && stack7.includes(s6Param.ufData)) ||
            (s7Param.isY && stack7.includes(s7Param.ufData))
              ? true
              : false;
          var tdsYaxis =
            (s1Param.isY && stack8.includes(s1Param.ufData)) ||
            (s2Param.isY && stack8.includes(s2Param.ufData)) ||
            (s3Param.isY && stack8.includes(s3Param.ufData)) ||
            (s4Param.isY && stack8.includes(s4Param.ufData)) ||
            (s5Param.isY && stack8.includes(s5Param.ufData)) ||
            (s6Param.isY && stack8.includes(s6Param.ufData)) ||
            (s7Param.isY && stack8.includes(s7Param.ufData))
              ? true
              : false;
          var totpermeYaxis =
            (s1Param.isY && stack9.includes(s1Param.ufData)) ||
            (s2Param.isY && stack9.includes(s2Param.ufData)) ||
            (s3Param.isY && stack9.includes(s3Param.ufData)) ||
            (s4Param.isY && stack9.includes(s4Param.ufData)) ||
            (s5Param.isY && stack9.includes(s5Param.ufData)) ||
            (s6Param.isY && stack9.includes(s6Param.ufData)) ||
            (s7Param.isY && stack9.includes(s7Param.ufData))
              ? true
              : false;
          var tempCYaxis =
            (s1Param.isY && stack10.includes(s1Param.ufData)) ||
            (s2Param.isY && stack10.includes(s2Param.ufData)) ||
            (s3Param.isY && stack10.includes(s3Param.ufData)) ||
            (s4Param.isY && stack10.includes(s4Param.ufData)) ||
            (s5Param.isY && stack10.includes(s5Param.ufData)) ||
            (s6Param.isY && stack10.includes(s6Param.ufData)) ||
            (s7Param.isY && stack10.includes(s7Param.ufData))
              ? true
              : false;

          const setting = new URLSearchParams({
            action: "data",
            date1: plotParam.dateFrom,
            date2: plotParam.dateTo,
            plotbg: plotParam.chartBackground,
            grid: plotParam.gridColor,
            dbpage: "ro2_norm_qstm",
            isLegend: plotParam.legendShow,
            isYaxis: plotParam.yAxis,
            expoWidth: plotParam.plotExpWidth,
            expoHeight: plotParam.plotExpHeight,
            expobg: plotParam.plotExpBackground,
            expotitle: plotParam.plotExpTitleColor,
            isline1: s1Param.series,
            pen1: s1Param.pen,
            ufGroup: "x",
            skid1: plotParam.roSkid,
            qdata1: s1Param.ufData,
            yaxis1: s1Param.yAxis,
            charttype1: s1Param.chartType,
            lineWidth1: s1Param.lineWidth,
            markerWg1: s1Param.markerWeight,
            markerSp1: s1Param.markerShape,
            dataLb1: s1Param.lable,
            offst1: plotParam.flowMin,
            offmn1: plotParam.flowMax,
            offmx1: plotParam.presMin,
            isline2: s2Param.series,
            pen2: s2Param.pen,
            skid2: plotParam.interval,
            qdata2: s2Param.ufData,
            yaxis2: s2Param.yAxis,
            charttype2: s2Param.chartType,
            lineWidth2: s2Param.lineWidth,
            markerWg2: s2Param.markerWeight,
            markerSp2: s2Param.markerShape,
            dataLb2: s2Param.lable,
            offst2: plotParam.presMax,
            offmn2: "x",
            offmx2: "x",

            isline3: s3Param.series,
            pen3: s3Param.pen,
            skid3: "x",
            qdata3: s3Param.ufData,
            yaxis3: s3Param.yAxis,
            charttype3: s3Param.chartType,
            lineWidth3: s3Param.lineWidth,
            markerWg3: s3Param.markerWeight,
            markerSp3: s3Param.markerShape,
            dataLb3: s3Param.lable,
            offst3: "x",
            offmn3: "x",
            offmx3: "x",

            isline4: s4Param.series,
            pen4: s4Param.pen,
            skid4: "x",
            qdata4: s4Param.ufData,
            yaxis4: s4Param.yAxis,
            charttype4: s4Param.chartType,
            lineWidth4: s4Param.lineWidth,
            markerWg4: s4Param.markerWeight,
            markerSp4: s4Param.markerShape,
            dataLb4: s4Param.lable,
            offst4: "x",
            offmn4: "x",
            offmx4: "x",
            isline5: s5Param.series,
            pen5: s5Param.pen,
            skid5: "x",
            qdata5: s5Param.ufData,
            yaxis5: s5Param.yAxis,
            charttype5: s5Param.chartType,
            lineWidth5: s5Param.lineWidth,
            markerWg5: s5Param.markerWeight,
            markerSp5: s5Param.markerShape,
            dataLb5: s5Param.lable,
            offst5: "x",
            offmn5: "x",
            offmx5: "x",
            isline6: s6Param.series,
            pen6: s6Param.pen,
            skid6: "x",
            qdata6: s6Param.ufData,
            yaxis6: s6Param.yAxis,
            charttype6: s6Param.chartType,
            lineWidth6: s6Param.lineWidth,
            markerWg6: s6Param.markerWeight,
            markerSp6: s6Param.markerShape,
            dataLb6: s6Param.lable,
            offst6: "x",
            offmn6: "x",
            offmx6: "x",
            isline7: s7Param.series,
            pen7: s7Param.pen,
            skid7: "x",
            qdata7: s7Param.ufData,
            yaxis7: s7Param.yAxis,
            charttype7: s7Param.chartType,
            lineWidth7: s7Param.lineWidth,
            markerWg7: s7Param.markerWeight,
            markerSp7: s7Param.markerShape,
            dataLb7: s7Param.lable,
            offst7: "x",
            offmn7: "x",
            offmx7: "x",
          });
          fetch("../../_process/setting/page.php", {
            method: "POST",
            body: setting,
          })
            .then((response) => response.text())
            .then((data) => {
              console.log(data);
            });

          Highcharts.seriesTypes.scatter.prototype.noSharedTooltip = false;
          Highcharts.chart("plot_window", {
            chart: {
              //height:1200,
              //width:1600,
              zoomType: "xy",
              animation: true,
              alignTicks: true,
              plotBackgroundColor: plotParam.chartBackground,
              plotBorderColor: "#9E9E9E",
              plotBorderWidth: 1.2,
              spacingBottom: 15,
              scrollablePlotArea: {
                minWidth: plotParam.plotWidth,
                scrollPositionX: 0,
              },
              ignoreHiddenSeries: true,
              reflow: false,
              //   margin: [0, 0, 30, 30]
              // backgroundColor: 'black',
              //   type: 'areaspline',
              //  width: plot_width,
              height: null,
              events: {
                beforePrint() {
                  this.oldhasUserSize = this.hasUserSize;
                  this.resetParams = [this.chartWidth, this.chartHeight, false];
                  this.setSize(1050, 590, false);
                  this.update({
                    chart: { plotBackgroundColor: plotParam.plotExpBackground },
                  });
                  this.exportSVGElements[0].box.hide();
                  this.exportSVGElements[1].hide();
                  //this.update({scrollbar: {enabled: false}});
                },
                afterPrint() {
                  this.setSize.apply(this, this.resetParams);
                  this.hasUserSize = this.oldhasUserSize;
                  this.update({
                    chart: { plotBackgroundColor: plotParam.chartBackground },
                  });
                  this.exportSVGElements[0].box.show();
                  this.exportSVGElements[1].show();
                  //  this.update({scrollbar: {enabled: true}});
                },
              },
            },
            title: {
              align: "center",
              x: 35,
              y: 20,
              text:
                "Skid:43" +
                plotParam.roSkid.toUpperCase() +
                ", Data From: " +
                datex[0] +
                " hrs  To: " +
                datex[datex.length - 1] +
                " hrs",
              style: {
                color: plotParam.plotExpTitleColor,
                font: '15px "Calibri", Verdana, sans-serif',
              },
            },
            exporting: {
              printMaxWidth: 1000,
              allowHTML: false,
              // url: "http://localhost:7801",
              fallbackToExportServer: false,
              filename:
                "SADARA-SWRO RO Normalization 43" +
                plotParam.roSkid.toUpperCase() +
                " " +
                datex[0] +
                " To " +
                datex[datex.length - 1],
              enabled: true,
              buttons: {
                contextButton: {
                  //  text: 'Chart Export'
                },
              },
              chartOptions: {
                title: {
                  style: {
                    color: plotParam.plotExpTitleColor,
                  },
                },
                chart: {
                  //backgroundColor: export_bg,
                  plotBackgroundColor: plotParam.plotExpBackground,
                  width: plotParam.plotExpWidth,
                  height: plotParam.plotExpHeight,
                },
              },
            },
            legend: {
              layout: "horizontal",
              align: "center",
              enabled: plotParam.legendShow,
              verticalAlign: "top",
              x: 10,
              y: 35,
              floating: true,
              borderWidth: 0,
              // backgroundColor:'rgba(255, 255, 255, 0.5)'
            },
            tooltip: {
              //headerFormat: '{point.key}',
              shared: true,
              outside: true,
              crosshairs: true,
              split: false,
            },
            credits: { enabled: false },
            boost: {
              enabled: true,
              useGPUTranslations: true,
              usePreallocated: true,
            },
            plotOptions: {
              series: {
                turboThreshold: 15000,
                states: { inactive: { opacity: 1 } },
              },
            },

            xAxis: [
              // hidden primary x-axis
              {
                // type: "datetime",
                categories: datex,
                lineColor: "#8395a7",
                allowDecimals: false,
                crosshair: {
                  color: "#ffffff",
                  dashStyle: "Dot",
                  width: 1.5,
                  label: { enabled: true, backgroundColor: "#ffffff" },
                },
                labels: { enabled: false },
              },
              {
                // type: "datetime", Secondary
                categories: date22,
                lineColor: "#8395a7",
                lineWidth: 1.5,
                linkedTo: 0,
                tickWidth: 1,
                tickColor: "gray",
                gridLineColor: plotParam.gridColor,
                visible: true,
                tickInterval: tickcal,
                //  crosshair: true,
                //  reversed: false,
                opposite: false,
                gridLineWidth: 0.3,
                labels: {
                  rotation: 0,
                  // useHTML: true,
                  style: {
                    color: "black",
                    fontSize: 10,
                    overflow: "none",
                  },
                },
                title: {
                  rotation: 0,
                  text: "Span " + dates_diff_cal + " Days",
                  style: {
                    color: "#0984e3",
                    font: '14px "Calibri", Verdana, sans-serif',
                  },
                },
              },
            ],

            yAxis: [
              {
                // Main Y-axis
                //softMin: 0,
                //  softMax:100 ,
                min: 0,
                max: 100,
                tickPositions: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100],
                visible: true,
                tickWidth: 0,
                tickColor: "red",
                lineColor: "gray",
                lineWidth: 2,
                gridLineWidth: 0.3,
                crosshair: {
                  color: "#ffffff",
                  dashStyle: "Dot",
                  width: 1.5,
                  label: { enabled: true, backgroundColor: "#ffffff" },
                },
                gridLineColor: plotParam.gridColor,
                labels: {
                  enabled: mainYaxis,
                  format: "{value}",
                  style: {
                    color: "black",
                    backgroundColor: "#000000",
                  },
                },
                title: {
                  enabled: mainYaxis,
                  align: "high",
                  offset: 15,
                  rotation: 0,
                  y: -10,
                  text: "%",
                  style: {
                    color: "#0984e3",
                  },
                },
                //labels: false,
              },

              {
                //  [1]    bar for DP
                //min:0,
                // max:14,
                visible: dpX_Yaxis,
                tickWidth: 1,
                tickAmount: 11,
                gridLineWidth: 0,
                crosshair: {
                  color: "#ffffff",
                  dashStyle: "Dot",
                  width: 1.5,
                  label: { enabled: true, backgroundColor: "#ffffff" },
                },
                labels: {
                  enabled: true,
                  format: "{value}",
                  // formatter: function() {
                  //    return Math.ceil(this.value);
                  //   },
                  style: { color: "#2f3542" },
                },
                title: {
                  useHTML: true,
                  align: "high",
                  offset: 15,
                  rotation: 0,
                  y: -10,
                  text: "bar",
                  style: {
                    color: "#0984e3",
                  },
                },
                //labels: false,
                //opposite: true
              },
              {
                //  [2] Total Recovery
                min: 84,
                max: 92,
                tickAmount: 11,
                visible: recovery_Yaxis,
                tickWidth: 1,
                gridLineWidth: 0,
                crosshair: {
                  color: "#ffffff",
                  dashStyle: "Dot",
                  width: 1.5,
                  label: { enabled: true, backgroundColor: "#ffffff" },
                },
                labels: {
                  enabled: true,
                  format: "{value}",
                  // formatter: function() {
                  //    return Math.ceil(this.value);
                  //    },
                  //  style: {color:temperature_color,}
                },
                title: {
                  useHTML: true,
                  align: "high",
                  offset: 15,
                  rotation: 0,
                  y: -10,
                  text: "Rec.%",
                  style: {
                    color: "#27ae60",
                  },
                },
                //labels: false,
                //opposite: true
              },

              {
                //[3]  Lmh Permeability
                //   min:0,
                //   max:100,
                tickAmount: 11,
                visible: per_Yaxis,
                // opposite:true,
                tickWidth: 1,
                gridLineWidth: 0,
                crosshair: {
                  color: "#ffffff",
                  dashStyle: "Dot",
                  width: 1.5,
                  label: { enabled: true, backgroundColor: "#ffffff" },
                },
                labels: {
                  enabled: true,
                  //format: '{value}',
                  formatter: function () {
                    return Math.ceil(this.value);
                  },
                  //  style: {color:temperature_color,}
                },
                title: {
                  useHTML: true,
                  align: "high",
                  offset: 15,
                  rotation: 0,
                  y: -10,
                  text: "Lmh",
                  style: {
                    color: "#c0392b",
                  },
                },
                //labels: false,
                //opposite: true
              },

              {
                //[4] Pressure
                // min:0,
                // max:3,
                visible: presYaxis,
                tickWidth: 1,
                tickAmount: 11,
                gridLineWidth: 0,
                crosshair: {
                  color: "#ffffff",
                  dashStyle: "Dot",
                  width: 1.5,
                  label: { enabled: true, backgroundColor: "#ffffff" },
                },
                labels: {
                  enabled: true,
                  format: "{value}",
                  style: { color: "#636e72" },
                },
                title: {
                  useHTML: true,
                  align: "high",
                  offset: 15,
                  rotation: 0,
                  y: -10,
                  text: "Bar",
                  style: {
                    color: "#636e72",
                  },
                },
                //labels: false,
                //opposite: true
              },

              {
                //[5]  Flow Rate
                visible: florate_y,
                tickWidth: 1,
                tickAmount: 11,
                gridLineWidth: 0,
                crosshair: {
                  color: "#ffffff",
                  dashStyle: "Dot",
                  width: 1.5,
                  label: { enabled: true, backgroundColor: "#ffffff" },
                },
                labels: {
                  enabled: true,
                  //format: '{value}',
                  formatter: function () {
                    return Math.ceil(this.value);
                  },

                  style: { color: "#2d3436" },
                },
                title: {
                  useHTML: true,
                  align: "high",
                  offset: 15,
                  rotation: 0,
                  y: -10,
                  text: "m<sup>3</sup>/h",
                  style: {
                    color: "#2d3436",
                  },
                },
                //labels: false,
                //opposite: true
              },

              {
                //[6] Permeate EC
                tickAmount: 11,
                visible: ecYaxis,
                tickWidth: 1,
                crosshair: {
                  color: "#ffffff",
                  dashStyle: "Dot",
                  width: 1.5,
                  label: { enabled: true, backgroundColor: "#ffffff" },
                },
                // lineColor:pen1,
                // lineWidth:2,
                // minorTickInterval: 'auto',
                gridLineWidth: 0,
                labels: {
                  enabled: true, //is_temperature,
                  formatter: function () {
                    return Math.ceil(this.value);
                  },
                  // formatter: function() {return (this.value/1000).toFixed(1)+' K';},

                  style: { color: "#2d3436" },
                },
                title: {
                  useHTML: true,
                  align: "high",
                  offset: 15,
                  rotation: 0,
                  y: -10,
                  text: "uS/cm",
                  style: {
                    color: "#2d3436",
                  },
                },
                //labels: false,
                //opposite: true
              },

              {
                //[7] Total Satl Passage
                // min: 0,
                //  max: 2,
                tickAmount: 11,
                visible: saltpasYaxis,
                tickWidth: 1,
                gridLineWidth: 0,
                crosshair: {
                  color: "#ffffff",
                  dashStyle: "Dot",
                  width: 1.5,
                  label: { enabled: true, backgroundColor: "#ffffff" },
                },
                labels: {
                  enabled: true,
                  format: "{value}",
                  // formatter: function() {return (this.value/1000).toFixed(1)+' K';},
                  style: { color: "#2d3436" },
                },
                title: {
                  useHTML: true,
                  align: "high",
                  offset: 10,
                  rotation: 0,
                  y: -10,
                  text: "Salt %",
                  style: {
                    color: "#2d3436",
                  },
                },
                //labels: false,
                //opposite: true
              },
              {
                //[8] TDS at membrane surfce
                //  min:1,
                //  max:14,
                tickAmount: 11,
                visible: tdsYaxis,
                tickWidth: 1,
                gridLineWidth: 0,
                crosshair: {
                  color: "#ffffff",
                  dashStyle: "Dot",
                  width: 1.5,
                  label: { enabled: true, backgroundColor: "#ffffff" },
                },
                labels: {
                  enabled: true,
                  format: "{value}",

                  style: { color: "#2d3436" },
                },
                title: {
                  useHTML: true,
                  align: "high",
                  offset: 15,
                  rotation: 0,
                  y: -10,
                  text: "PPM",
                  style: {
                    color: "#2d3436",
                  },
                },
                //labels: false,
                //opposite: true
              },
              {
                //[9] Permeability
                tickAmount: 11,
                visible: totpermeYaxis,
                tickWidth: 1,
                gridLineWidth: 0,
                crosshair: {
                  color: "#ffffff",
                  dashStyle: "Dot",
                  width: 1.5,
                  label: { enabled: true, backgroundColor: "#ffffff" },
                },
                labels: {
                  enabled: true,
                  format: "{value}",
                  style: { color: "#2d3436" },
                },
                title: {
                  useHTML: true,
                  align: "high",
                  offset: 15,
                  rotation: 0,
                  y: -10,
                  text: "Lmh/b",
                  style: {
                    color: "#2d3436",
                  },
                },
                //labels: false,
                //opposite: true
              },

              {
                //[10] Temp C
                tickAmount: 11,
                visible: tempCYaxis,
                tickWidth: 1,
                gridLineWidth: 0,
                crosshair: {
                  color: "#ffffff",
                  dashStyle: "Dot",
                  width: 1.5,
                  label: { enabled: true, backgroundColor: "#ffffff" },
                },
                labels: {
                  enabled: true,
                  format: "{value}",

                  style: { color: "#2d3436" },
                },
                title: {
                  useHTML: true,
                  align: "high",
                  offset: 15,
                  rotation: 0,
                  y: -10,
                  text: "°C",
                  style: {
                    color: "#2d3436",
                  },
                },
                //labels: false,
                //opposite: true
              },
            ],
            series: [
              {
                name: st[s1Param.ufData]["name"],
                type: s1Param.chartType,
                visible: s1Param.series,
                showInLegend: s1Param.series,
                data: dataSeries1x,
                lineWidth:
                  s1Param.chartType == "scatter" ? 0 : s1Param.lineWidth,
                yAxis: st[s1Param.ufData]["yAxis"],
                tooltip: {
                  crosshairs: true,
                  headerFormat: "{point.key}<br>",
                  pointFormat:
                    '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small>{point.y}<br> ',
                  shared: true,
                  useHTML: true,
                  valueSuffix: st[s1Param.ufData]["unit"],
                },
                color: s1Param.pen,
                marker: {
                  symbol: s1Param.markerShape,
                  radius: s1Param.markerWeight,
                  states: {
                    hover: {
                      enabled: false,
                    },
                  },
                },
                dataLabels: {
                  enabled: s1Param.lable,
                  style: {
                    fontWeight: "normal",
                    textShadow: false,
                    textOutline: false,
                  },
                  color: s1Param.pen,
                },
                fillOpacity: 0.17,
              },
              {
                name: st[s2Param.ufData]["name"],
                type: s2Param.chartType,
                visible: s2Param.series,
                showInLegend: s2Param.series,
                data: dataSeries2x,
                lineWidth:
                  s2Param.chartType == "scatter" ? 0 : s2Param.lineWidth,
                yAxis: st[s2Param.ufData]["yAxis"],
                tooltip: {
                  crosshairs: true,
                  headerFormat: "{point.key}<br>",
                  pointFormat:
                    '<span style="color: {series.color};">\u25CF</span> <small>{series.name}:</small>{point.y}<br>',
                  shared: true,
                  useHTML: true,
                  valueSuffix: st[s2Param.ufData]["unit"],
                },
                color: s2Param.pen,
                marker: {
                  symbol: s2Param.markerShape,
                  radius: s2Param.markerWeight,
                  states: {
                    hover: {
                      enabled: false,
                    },
                  },
                },
                dataLabels: {
                  enabled: s2Param.lable,
                  style: {
                    fontWeight: "normal",
                    textShadow: false,
                    textOutline: false,
                  },
                  color: s2Param.pen,
                },
                fillOpacity: 0.17,
              },

              {
                name: st[s3Param.ufData]["name"],
                type: s3Param.chartType,
                visible: s3Param.series,
                showInLegend: s3Param.series,
                data: dataSeries3x,
                lineWidth:
                  s3Param.chartType == "scatter" ? 0 : s3Param.lineWidth,
                yAxis: st[s3Param.ufData]["yAxis"],
                tooltip: {
                  crosshairs: true,
                  headerFormat: "{point.key}<br>",
                  pointFormat:
                    '<span style="color: {series.color};">\u25CF</span> <small>{series.name}:</small>{point.y}<br>',
                  shared: true,
                  useHTML: true,
                  valueSuffix: st[s3Param.ufData]["unit"],
                },
                color: s3Param.pen,
                marker: {
                  symbol: s3Param.markerShape,
                  radius: s3Param.markerWeight,
                  states: {
                    hover: {
                      enabled: false,
                    },
                  },
                },
                dataLabels: {
                  enabled: s3Param.lable,
                  style: {
                    fontWeight: "normal",
                    textShadow: false,
                    textOutline: false,
                  },
                  color: s3Param.pen,
                },
                fillOpacity: 0.17,
              },
              {
                name: st[s4Param.ufData]["name"],
                type: s4Param.chartType,
                visible: s4Param.series,
                showInLegend: s4Param.series,
                data: dataSeries4x,
                lineWidth:
                  s4Param.chartType == "scatter" ? 0 : s4Param.lineWidth,
                yAxis: st[s4Param.ufData]["yAxis"],
                tooltip: {
                  crosshairs: true,
                  headerFormat: "{point.key}<br>",
                  pointFormat:
                    '<span style="color: {series.color};">\u25CF</span> <small>{series.name}:</small>{point.y}<br>',
                  shared: true,
                  useHTML: true,
                  valueSuffix: st[s4Param.ufData]["unit"],
                },
                color: s4Param.pen,
                marker: {
                  symbol: s4Param.markerShape,
                  radius: s4Param.markerWeight,
                  states: {
                    hover: {
                      enabled: false,
                    },
                  },
                },
                dataLabels: {
                  enabled: s4Param.lable,
                  style: {
                    fontWeight: "normal",
                    textShadow: false,
                    textOutline: false,
                  },
                  color: s4Param.pen,
                },
                fillOpacity: 0.17,
              },
              {
                name: st[s5Param.ufData]["name"],
                type: s5Param.chartType,
                visible: s5Param.series,
                showInLegend: s5Param.series,
                data: dataSeries5x,
                lineWidth:
                  s5Param.chartType == "scatter" ? 0 : s5Param.lineWidth,
                yAxis: st[s5Param.ufData]["yAxis"],
                tooltip: {
                  crosshairs: true,
                  headerFormat: "{point.key}<br>",
                  pointFormat:
                    '<span style="color: {series.color};">\u25CF</span> <small>{series.name}:</small>{point.y}<br>',
                  shared: true,
                  useHTML: true,
                  valueSuffix: st[s5Param.ufData]["unit"],
                },
                color: s5Param.pen,
                marker: {
                  symbol: s5Param.markerShape,
                  radius: s5Param.markerWeight,
                  states: {
                    hover: {
                      enabled: false,
                    },
                  },
                },
                dataLabels: {
                  enabled: s5Param.lable,
                  style: {
                    fontWeight: "normal",
                    textShadow: false,
                    textOutline: false,
                  },
                  color: s5Param.pen,
                },
                fillOpacity: 0.17,
              },
              {
                name: st[s6Param.ufData]["name"],
                type: s6Param.chartType,
                visible: s6Param.series,
                showInLegend: s6Param.series,
                data: dataSeries6x,
                lineWidth:
                  s6Param.chartType == "scatter" ? 0 : s6Param.lineWidth,
                yAxis: st[s6Param.ufData]["yAxis"],
                tooltip: {
                  crosshairs: true,
                  headerFormat: "{point.key}<br>",
                  pointFormat:
                    '<span style="color: {series.color};">\u25CF</span> <small>{series.name}:</small>{point.y}<br>',
                  shared: true,
                  useHTML: true,
                  valueSuffix: st[s6Param.ufData]["unit"],
                },
                color: s6Param.pen,
                marker: {
                  symbol: s6Param.markerShape,
                  radius: s6Param.markerWeight,
                  states: {
                    hover: {
                      enabled: false,
                    },
                  },
                },
                dataLabels: {
                  enabled: s6Param.lable,
                  style: {
                    fontWeight: "normal",
                    textShadow: false,
                    textOutline: false,
                  },
                  color: s6Param.pen,
                },
                fillOpacity: 0.17,
              },
              {
                name: st[s7Param.ufData]["name"],
                type: s7Param.chartType,
                visible: s7Param.series,
                showInLegend: s7Param.series,
                data: dataSeries7x,
                lineWidth:
                  s7Param.chartType == "scatter" ? 0 : s7Param.lineWidth,
                yAxis: st[s7Param.ufData]["yAxis"],
                tooltip: {
                  crosshairs: true,
                  headerFormat: "{point.key}<br>",
                  pointFormat:
                    '<span style="color: {series.color};">\u25CF</span> <small>{series.name}:</small>{point.y}<br>',
                  shared: true,
                  useHTML: true,
                  valueSuffix: st[s7Param.ufData]["unit"],
                },
                color: s7Param.pen,
                marker: {
                  symbol: s7Param.markerShape,
                  radius: s7Param.markerWeight,
                  states: {
                    hover: {
                      enabled: false,
                    },
                  },
                },
                dataLabels: {
                  enabled: s7Param.lable,
                  style: {
                    fontWeight: "normal",
                    textShadow: false,
                    textOutline: false,
                  },
                  color: s7Param.pen,
                },
                fillOpacity: 0.17,
              },
            ],
          });
        }
        $("#plot_window").css({ "background-color": "white" });
      } catch (err) {
        Notiflix.Report.Warning("Failure", " " + err, "Close");
        console.log(err);
        $("#plot_window").html(" ");
        $("#plot_window").css({ "background-color": "black" });
      }

      Notiflix.Notify.Success("Plot updated");
      Notiflix.Block.Remove("body");
    })
    .catch((error) => {
      Notiflix.Block.Remove("body");
      Notiflix.Report.Failure("Failure", "Details: " + error, "Close");
      console.log(error);
    });
}

//catch(error =>Notiflix.Notify.Warning('Failed '+error));
