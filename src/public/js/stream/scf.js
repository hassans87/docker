queryStream();
//$('.tensor-flow,.rednder').change(function(){queryStream();})
setInterval(function () {$("head title").html($("head title").html().substring(1) + $("head title").html().substring(0,1));}, 400);
$('.query_fire').click(function(){queryStream();})
$('.query').change(function(){
    //    queryStream();
Notiflix.Notify.Info('Changes detected, Press Query Button to apply'); 
})

// constructor function 
function Stream(target){
    this.series = $('#line'+target).is(':checked');
    this.ufData = $('#ufdata'+target).val();

}
function ChartParam(target){
                    this.series = $('#line'+target).is(':checked');
                    this.ufData = $('#ufdata'+target).val();
                    this.pen = $('#pen'+target).val();
                    this.lable = $('#dt_label'+target).is(':checked');
                    this.yAxis = $('#y_axis'+target).is(':checked');
                    this.chartType = $('#chart_type'+target).val();
                    this.lineWidth = parseFloat($('#line_width'+target).val());
                    this.markerWeight =   parseFloat($('#marker'+target).val());
                    this.markerShape = $('#marker_shape'+target).val();
                    this.modalColor = $(".modelheader"+target).css({'background-color':this.pen});
                    this.modalTitle = $('#seriestitle'+target).html('Series '+target+': '+$("#ufdata"+target+" option:selected").text());
                    this.isY = false;
                    if(this.series && this.yAxis){this.isY=true}else{this.isY=false}
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
    return diffInDays +1;}


$('.tensor-flow,.rednder').change(function(){
    let fx1 = $('#start_date').val();
    let fx2 = $('#end_date').val();
let query_days_calc = getNumberOfDays(fx1,fx2);
if(query_days_calc >12000 ){
    $( ".query_fire" ).prop( "disabled", true); 
    $(".query_fire").removeClass("btn-light") .addClass("btn-danger");
    Notiflix.Notify.Failure('Reduce query dates, max 600 days'); 
    Notiflix.Report.Failure('Query Warning','Check your query, max 600 days query allowed','Close');
}else if(query_days_calc<0){
    $( ".query_fire" ).prop( "disabled", true); 
    $(".query_fire").removeClass("btn-light") .addClass("btn-danger");
    Notiflix.Notify.Failure('Reduce query dates, max 600 days'); 
    Notiflix.Report.Failure('Query Warning','check query, invalid dates range !','Close');
}else{
    $( ".query_fire" ).prop( "disabled", false );
    $(".query_fire").removeClass("btn-danger") .addClass("btn-success"); }
    ;})

function queryStream(){
Notiflix.Block.Pulse('body', 'Please Wait, feteching query data'); 
let plotParam = {
dateFrom:$('#start_date').val(),
dateTo: $('#end_date').val(),
ufqry:$('#skidx').val(),
interval:$('#invt').val() 
}


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
const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
const query_data = new URLSearchParams({from: plotParam.dateFrom,dateto:plotParam.dateTo,
ufGroup:plotParam.bayline,datainvt:plotParam.interval,roskid:plotParam.ufqry,ufdata1:s1Param.ufData,ufdata2:s2Param.ufData,ufdata3:s3Param.ufData,ufdata4:s4Param.ufData,ufdata5:s5Param.ufData,ufdata6:s6Param.ufData,ufdata7:s7Param.ufData,
d1:d1,d2:d2,d3:d3,d4:d4,d5:d5,d6:d6,d7:d7});
fetch(window.location.href,    
    {method:'POST',
    body:query_data,
    headers:{"x-CSRF-TOKEN":csrfToken}
    })
.then(response =>response.text())
.then((data) =>{
try{
    
let dataStream = JSON.parse(data);
let date =dataStream[0];
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
let months_array_primary = ['dd', 'January', 'February', 'March','April', 'May', 'June', 'July','August','September','October','November','December'];       
let mydate = date[i];
let day_x = mydate.substring(8, 10);
let month_x  = mydate.substring(5, 7);
let year_x = mydate.substring(2, 4);
let date_xseries = day_x +'-'+month_x+'-'+year_x;
date22.push(date_xseries);
let timex = mydate.substring(11, 16);
let siri_month = parseInt(month_x);
siri_month = months_array_primary[siri_month];
let siri_fullyear = mydate.substring(0, 4);
let series_date_conts  = day_x +' '+siri_month+' '+siri_fullyear +' '+timex;
datex.push(series_date_conts);}         
// x-axis interval calculations
let tickcal = 0;
let date_length = date22.length;
let core_factor = date_length/15;
tickcal = Math.round(core_factor);
tickcal= parseInt(tickcal);

dataSeries1 = dataSeries1.map(parseFloat);
dataSeries2 = dataSeries2.map(parseFloat);
dataSeries3 = dataSeries3.map(parseFloat);
dataSeries4 = dataSeries4.map(parseFloat);
dataSeries5 = dataSeries5.map(parseFloat);
dataSeries6 = dataSeries6.map(parseFloat);
dataSeries7 = dataSeries7.map(parseFloat);   

function seriesLook(dv,series){
if(dv){
$("#pen"+series).show(900);
$("#ufdata"+series).show(1200);
$("#panel"+series).show(900);
$("#data_length"+series).show(900); 
$("#data_max"+series).show(900); 
$("#data_min"+series).show(900); 
$("#data_avg"+series).show(900);
$(".tr"+series).addClass("table-light").removeClass("table-secondary");
}else{
$("#pen"+series).hide(900);
$("#ufdata"+series).hide(1200);
$("#panel"+series).hide(900); 
$("#data_length"+series).hide(900); 
$("#data_max"+series).hide(900); 
$("#data_min"+series).hide(900); 
$("#data_avg"+series).hide(900);
$(".tr"+series).removeClass("table-light") .addClass("table-secondary");
$("#unit"+series).html(" ");
}}

function seriesData(stream,series,go,valLimit,offset,unit,sum){
if(go&&stream.length>=1){
let collection = [];
for(var i=0; i<stream.length; i++){let dmax_int1 = stream[i]; if(dmax_int1){collection.push(dmax_int1);}}
if(collection.length>=1){
$("#data_length"+series).html(collection.length);
$("#unit"+series).html(unit);             
if(sum){
$("#data_max"+series).html(" ");
$("#data_min"+series).html(" ");
$("#data_avg"+series).html(" ");}
else{
let dmax1 = collection.reduce(function(a, b) {return Math.max(a, b);});
let dmin1 = collection.reduce(function(a, b) {return Math.min(a, b);});
let avera1 = collection.reduce((a, b) => a + b, 0) / collection.length;
$("#data_max"+series).html(dmax1.toFixed(valLimit));
$("#data_min"+series).html(dmin1.toFixed(valLimit));
$("#data_avg"+series).html(avera1.toFixed(valLimit));}}
else{Notiflix.Notify.Failure('Series'+series+ ' : check data Query');
Notiflix.Report.Failure('Query Warning','Data Array is empty','Close');
$("#data_length"+series).html('0');
$("#data_max"+series).html('-');
$("#data_min"+series).html('-');
$("#data_avg"+series).html('-');
$("#unit"+series).html(" ");
}}}

//calculating date full namespace
        var full_months_array = ['dd', 'January', 'February', 'March','April', 'May', 'June', 'July','August','September','October','November','December'];
        var date1_day = date1.substring(8, 10);
        var date2_day = date2.substring(8, 10);
        var date1_month  = date1.substring(5, 7);
        var date2_month  = date2.substring(5, 7);
        date1_month = parseInt(date1_month);
        date2_month = parseInt(date2_month);
        var full_year1 = date1.substring(0, 4);
        var full_year2 = date2.substring(0, 4);
        var date1_mode = date1_day +'-'+full_months_array[date1_month] + '-'+full_year1;
        var date2_mode = date2_day +'-'+full_months_array[date2_month] + '-'+full_year2;
        var dates_diff_cal = getNumberOfDays(datex[0], datex[datex.length -1]);
renderedChart();
$( ".chart_render" ).change(function(){renderedChart();});
$( ".filter" ).click(function(){renderedChart();});
function renderedChart(){
const st = {
p1_pt:{
        unit:" bar",
        name:"Pump1 Pressure",
        yAxis:2,
        arrFlr:1,
        valFixTo:1,
        sum:false
        },
p2_pt:{
        unit:" bar",
        name:"Pump2 Pressure",
        yAxis:2,
        arrFlr:1,
        valFixTo:1,
        sum:false
        },
p3_pt:{
        unit:" bar",
        name:"Pump3 Pressure",
        yAxis:2,
        arrFlr:1,
        valFixTo:1,
        sum:false
        },
p4_pt:{
        unit:" bar",
        name:"Pump4 Pressure",
        yAxis:2,
        arrFlr:1,
        valFixTo:1,
        sum:false
        },
p5_pt:{
        unit:" bar",
        name:"Pump5 Pressure",
        yAxis:2,
        arrFlr:1,
        valFixTo:1,
        sum:false
        },
p6_pt:{
        unit:" bar",
        name:"Pump6 Pressure",
        yAxis:2,
        arrFlr:1,
        valFixTo:1,
        sum:false
        },
p1_flow:{
        unit:" m<sup>3</sup>/h",
        name:"22A Flow",
        yAxis:5,
        arrFlr:1,
        valFixTo:0,
        sum:false
        },

p2_flow:{
        unit:" m<sup>3</sup>/h",
        name:"22B Flow",
        yAxis:5,
        arrFlr:1,
        valFixTo:0,
        sum:false
        },

p3_flow:{
        unit:" m<sup>3</sup>/h",
        name:"22C Flow",
        yAxis:5,
        arrFlr:1,
        valFixTo:0,
        sum:false
        },
 
 p4_flow:{
        unit:" m<sup>3</sup>/h",
        name:"22D Flow",
        yAxis:5,
        arrFlr:1,
        valFixTo:0,
        sum:false
        },
 
 p5_flow:{
        unit:" m<sup>3</sup>/h",
        name:"22E Flow",
        yAxis:5,
        arrFlr:1,
        valFixTo:0,
        sum:false
        },
 
 p6_flow:{
        unit:" m<sup>3</sup>/h",
        name:"22F Flow",
        yAxis:5,
        arrFlr:1,
        valFixTo:0,
        sum:false
        },
 tot_flow:{
        unit:" m<sup>3</sup>/h",
        name:"Total Inlet Flow",
        yAxis:5,
        arrFlr:1,
        valFixTo:0,
        sum:false
        },
  p1_dpi:{
        unit:" bar",
        name:"SCF-1 DPI",
        yAxis:1,
        arrFlr:1,
        valFixTo:2,
        sum:false
        },
  p2_dpi:{
        unit:" bar",
        name:"SCF-2 DPI",
        yAxis:1,
        arrFlr:1,
        valFixTo:2,
        sum:false
        },
  p3_dpi:{
        unit:" bar",
        name:"SCF-3 DPI",
        yAxis:1,
        arrFlr:1,
        valFixTo:2,
        sum:false
        },
  p4_dpi:{
        unit:" bar",
        name:"SCF-4 DPI",
        yAxis:1,
        arrFlr:1,
        valFixTo:2,
        sum:false
        },
  p5_dpi:{
        unit:" bar",
        name:"SCF-5 DPI",
        yAxis:1,
        arrFlr:1,
        valFixTo:2,
        sum:false
        },
  p6_dpi:{
        unit:" bar",
        name:"SCF-6 DPI",
        yAxis:1,
        arrFlr:1,
        valFixTo:2,
        sum:false
        },
  nb_pump_running:{
        unit:" ",
        name:"Number of Pumps Online",
        yAxis:8,
        arrFlr:1,
        valFixTo:0,
        sum:false
        }
}


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
seriesLook(s1Param.series,1);
seriesLook(s2Param.series,2);
seriesLook(s3Param.series,3);
seriesLook(s4Param.series,4);
seriesLook(s5Param.series,5);
seriesLook(s6Param.series,6);
seriesLook(s7Param.series,7);

seriesData(dataSeries1,1,s1Param.series,st[s1Param.ufData]['valFixTo'],st[s1Param.ufData]['arrFlr'],st[s1Param.ufData]['unit'],st[s1Param.ufData]['sum']);
seriesData(dataSeries2,2,s2Param.series,st[s2Param.ufData]['valFixTo'],st[s2Param.ufData]['arrFlr'],st[s2Param.ufData]['unit'],st[s2Param.ufData]['sum']);
seriesData(dataSeries3,3,s3Param.series,st[s3Param.ufData]['valFixTo'],st[s3Param.ufData]['arrFlr'],st[s3Param.ufData]['unit'],st[s3Param.ufData]['sum']);
seriesData(dataSeries4,4,s4Param.series,st[s4Param.ufData]['valFixTo'],st[s4Param.ufData]['arrFlr'],st[s4Param.ufData]['unit'],st[s4Param.ufData]['sum']);
seriesData(dataSeries5,5,s5Param.series,st[s5Param.ufData]['valFixTo'],st[s5Param.ufData]['arrFlr'],st[s5Param.ufData]['unit'],st[s5Param.ufData]['sum']);
seriesData(dataSeries6,6,s6Param.series,st[s6Param.ufData]['valFixTo'],st[s6Param.ufData]['arrFlr'],st[s6Param.ufData]['unit'],st[s6Param.ufData]['sum']);
seriesData(dataSeries7,7,s7Param.series,st[s7Param.ufData]['valFixTo'],st[s7Param.ufData]['arrFlr'],st[s7Param.ufData]['unit'],st[s7Param.ufData]['sum']);
let dataSeries1x = dataTrain1;
let dataSeries2x = dataTrain2;
let dataSeries3x = dataTrain3;
let dataSeries4x = dataTrain4;
let dataSeries5x = dataTrain5;
let dataSeries6x = dataTrain6;
let dataSeries7x = dataTrain7;
let plotParam = {
dateFrom:$('#start_date').val(),
dateTo: $('#end_date').val(), 
bayline: "43",
interval:$('#invt').val(),
ufqry:" ",
chartBackground:$('#pen_main').val(),
plotWidth:screen.availWidth * 0.95,
legendShow: $('#is_legend').is(':checked'),
yAxis:$('#is_main_yaxis').is(':checked'),
gridColor: $('#pen_grid').val(),
plotExpWidth:$('#export_width').val(),
plotExpHeight:$('#export_height').val(),
plotExpBackground:$('#pen_export').val(),
plotExpTitleColor: $('#pen_export_title').val()}  
var stack0=["spare"];
var stack1=["p1_dpi","p2_dpi","p3_dpi","p4_dpi","p5_dpi","p6_dpi"];
var stack2=["p1_pt","p2_pt","p3_pt","p4_pt","p5_pt","p6_pt"];
var stack3 = ["ferric_flow_tot"];
var stack4=["daf_inlet_turbidity","daf_flr_turb"];
var stack5=["p1_flow","p2_flow","p3_flow","p4_flow","p5_flow","p6_flow","tot_flow"];
var stack6=["north_sdi","south_sdi"];
var stack7=["daf_inlet_orp"];
var stack8=["nb_pump_running"];
var stack9=["north_hc","south_hc"];
var stack10=["north_temp","south_temp"];
var stack11=["north_chlorine","south_cl2"];
var stack12=["daf_inlet_ec"];
var stack13=["daf_inlet_ph","daf_flr_ph"];
var mainYaxis=(plotParam.yAxis || s1Param.isY && (stack0.includes(s1Param.ufData))||s2Param.isY && (stack0.includes(s2Param.ufData))||s3Param.isY && (stack0.includes(s3Param.ufData))||s4Param.isY && (stack0.includes(s4Param.ufData))||s5Param.isY && (stack0.includes(s5Param.ufData))||s6Param.isY && (stack0.includes(s6Param.ufData))||s7Param.isY && (stack0.includes(s7Param.ufData)))? true: false;
     var axis_Y1=(s1Param.isY && (stack1.includes(s1Param.ufData))||s2Param.isY && (stack1.includes(s2Param.ufData))||s3Param.isY && (stack1.includes(s3Param.ufData))||s4Param.isY && (stack1.includes(s4Param.ufData))||s5Param.isY && (stack1.includes(s5Param.ufData))||s6Param.isY && (stack1.includes(s6Param.ufData))||s7Param.isY && (stack1.includes(s7Param.ufData)))? true: false;
      var axis_Y2=(s1Param.isY && (stack2.includes(s1Param.ufData))||s2Param.isY && (stack2.includes(s2Param.ufData))||s3Param.isY && (stack2.includes(s3Param.ufData))||s4Param.isY && (stack2.includes(s4Param.ufData))||s5Param.isY && (stack2.includes(s5Param.ufData))||s6Param.isY && (stack2.includes(s6Param.ufData))||s7Param.isY && (stack2.includes(s7Param.ufData)))? true: false; 
         var axis_Y3 =(s1Param.isY && (stack3.includes(s1Param.ufData))||s2Param.isY && (stack3.includes(s2Param.ufData))||s3Param.isY && (stack3.includes(s3Param.ufData))||s4Param.isY && (stack3.includes(s4Param.ufData))||s5Param.isY && (stack3.includes(s5Param.ufData))||s6Param.isY && (stack3.includes(s6Param.ufData))||s7Param.isY && (stack3.includes(s7Param.ufData)))? true: false; 
var axis_Y4 =(s1Param.isY && (stack4.includes(s1Param.ufData))||s2Param.isY && (stack4.includes(s2Param.ufData))||s3Param.isY && (stack4.includes(s3Param.ufData))||s4Param.isY && (stack4.includes(s4Param.ufData))||s5Param.isY && (stack4.includes(s5Param.ufData))||s6Param.isY && (stack4.includes(s6Param.ufData))||s7Param.isY && (stack4.includes(s7Param.ufData)))? true: false; 
   var axis_Y5 =(s1Param.isY && (stack5.includes(s1Param.ufData))||s2Param.isY && (stack5.includes(s2Param.ufData))||s3Param.isY && (stack5.includes(s3Param.ufData))||s4Param.isY && (stack5.includes(s4Param.ufData))||s5Param.isY && (stack5.includes(s5Param.ufData))||s6Param.isY && (stack5.includes(s6Param.ufData))||s7Param.isY && (stack5.includes(s7Param.ufData)))? true: false; 
    var axis_Y6  =(s1Param.isY && (stack6.includes(s1Param.ufData))||s2Param.isY && (stack6.includes(s2Param.ufData))||s3Param.isY && (stack6.includes(s3Param.ufData))||s4Param.isY && (stack6.includes(s4Param.ufData))||s5Param.isY && (stack6.includes(s5Param.ufData))||s6Param.isY && (stack6.includes(s6Param.ufData))||s7Param.isY && (stack6.includes(s7Param.ufData)))? true: false; 
    var axis_Y7  =(s1Param.isY && (stack7.includes(s1Param.ufData))||s2Param.isY && (stack7.includes(s2Param.ufData))||s3Param.isY && (stack7.includes(s3Param.ufData))||s4Param.isY && (stack7.includes(s4Param.ufData))||s5Param.isY && (stack7.includes(s5Param.ufData))||s6Param.isY && (stack7.includes(s6Param.ufData))||s7Param.isY && (stack7.includes(s7Param.ufData)))? true: false; 
    var axis_Y8  =(s1Param.isY && (stack8.includes(s1Param.ufData))||s2Param.isY && (stack8.includes(s2Param.ufData))||s3Param.isY && (stack8.includes(s3Param.ufData))||s4Param.isY && (stack8.includes(s4Param.ufData))||s5Param.isY && (stack8.includes(s5Param.ufData))||s6Param.isY && (stack8.includes(s6Param.ufData))||s7Param.isY && (stack8.includes(s7Param.ufData)))? true: false; 
    var axis_Y9 =(s1Param.isY && (stack9.includes(s1Param.ufData))||s2Param.isY && (stack9.includes(s2Param.ufData))||s3Param.isY && (stack9.includes(s3Param.ufData))||s4Param.isY && (stack9.includes(s4Param.ufData))||s5Param.isY && (stack9.includes(s5Param.ufData))||s6Param.isY && (stack9.includes(s6Param.ufData))||s7Param.isY && (stack9.includes(s7Param.ufData)))? true: false; 
    var axis_Y10=(s1Param.isY && (stack10.includes(s1Param.ufData))||s2Param.isY && (stack10.includes(s2Param.ufData))||s3Param.isY && (stack10.includes(s3Param.ufData))||s4Param.isY && (stack10.includes(s4Param.ufData))||s5Param.isY && (stack10.includes(s5Param.ufData))||s6Param.isY && (stack10.includes(s6Param.ufData))||s7Param.isY && (stack10.includes(s7Param.ufData)))? true: false; 
    var axis_Y11=(s1Param.isY && (stack11.includes(s1Param.ufData))||s2Param.isY && (stack11.includes(s2Param.ufData))||s3Param.isY && (stack11.includes(s3Param.ufData))||s4Param.isY && (stack11.includes(s4Param.ufData))||s5Param.isY && (stack11.includes(s5Param.ufData))||s6Param.isY && (stack11.includes(s6Param.ufData))||s7Param.isY && (stack11.includes(s7Param.ufData)))? true: false; 
    var axis_Y12=(s1Param.isY && (stack12.includes(s1Param.ufData))||s2Param.isY && (stack12.includes(s2Param.ufData))||s3Param.isY && (stack12.includes(s3Param.ufData))||s4Param.isY && (stack12.includes(s4Param.ufData))||s5Param.isY && (stack12.includes(s5Param.ufData))||s6Param.isY && (stack12.includes(s6Param.ufData))||s7Param.isY && (stack12.includes(s7Param.ufData)))? true: false; 
    var axis_Y13=(s1Param.isY && (stack13.includes(s1Param.ufData))||s2Param.isY && (stack13.includes(s2Param.ufData))||s3Param.isY && (stack13.includes(s3Param.ufData))||s4Param.isY && (stack13.includes(s4Param.ufData))||s5Param.isY && (stack13.includes(s5Param.ufData))||s6Param.isY && (stack13.includes(s6Param.ufData))||s7Param.isY && (stack13.includes(s7Param.ufData)))? true: false; 
    
Highcharts.seriesTypes.scatter.prototype.noSharedTooltip = false;
        Highcharts.chart('plot_window', {
        chart: {
        //height:1200,
        //width:1600,
        zoomType: 'xy',
        animation:true,
        alignTicks: true,
        plotBackgroundColor:plotParam.chartBackground,
        plotBorderColor: '#9E9E9E',
        plotBorderWidth:1.2,
        spacingBottom:15,
        scrollablePlotArea: {
        minWidth: plotParam.plotWidth,
        scrollPositionX: 0
        },
        ignoreHiddenSeries: true,
        reflow: false,  
        //   margin: [0, 0, 30, 30]
        // backgroundColor: 'black',
        //   type: 'areaspline',
        //  width: plot_width,
        height:null,
        events: {
        beforePrint () {
        this.oldhasUserSize = this.hasUserSize;
        this.resetParams = [this.chartWidth, this.chartHeight, false];
        this.setSize(1050,590, false);
        this.update({ chart: { plotBackgroundColor: plotParam.plotExpBackground} });
        this.exportSVGElements[0].box.hide();
        this.exportSVGElements[1].hide();            
        //this.update({scrollbar: {enabled: false}});
        },
        afterPrint () {
        this.setSize.apply(this, this.resetParams);
        this.hasUserSize = this.oldhasUserSize;
        this.update({ chart: { plotBackgroundColor: plotParam.chartBackground } });
        this.exportSVGElements[0].box.show();
        this.exportSVGElements[1].show();
        //  this.update({scrollbar: {enabled: true}});
        }}},  
        title: {
        align: 'center',
        x:35,
        y:30, 
        text: 'Self-Cleaning Filter',
        //+'Data From: '+datex[0] + ' hrs  To: '+datex[datex.length-1]+' hrs' ,
        style: {color: plotParam.plotExpTitleColor,
        font: '17px "Calibri", Verdana, sans-serif',
        fontWeight:'bold'
        }},
        exporting: {
        printMaxWidth: 1000,
         allowHTML: false,
       // url: "http://localhost:7801",
        fallbackToExportServer: false,
        filename:'SWRO-SADARA SCF'+ ' '+datex[0] + ' hrs  To: '+datex[datex.length-1]+' hrs' ,
        enabled: true,
        buttons: {
            contextButton: {
                align: 'right',
                x:-40
        }},
        chartOptions: {
        title: {
        style: {
        color: plotParam.plotExpTitleColor },
        },
        chart: {
        //backgroundColor: export_bg,
        plotBackgroundColor:plotParam.plotExpBackground,
        width: plotParam.plotExpWidth,
        height: plotParam.plotExpHeight,              
        },
        boost: {
            pixelRatio: 2
        },
        }
        },          
        legend: {
        layout: 'horizontal',
        align: 'center',
        enabled: plotParam.legendShow,
        verticalAlign: 'top',
        x:10,
        y:35,
        floating: true,
        borderWidth: 0,
        backgroundColor:'rgba(255, 255, 255, 0.9)'
        },    
        tooltip: { 
        //headerFormat: '{point.key}',      
        shared: true,
        outside:false,
        crosshair: [true, true],
        split: false,
        hideDelay:1000      
        },

        credits: {enabled: false},
        boost: {enabled: true,useGPUTranslations: true,usePreallocated: true},
        plotOptions: {
        series: {
        turboThreshold: 15000,
        states: {inactive: {opacity: 1}}
        }},
                
                        xAxis: [ // hidden primary x-axis
                        {     
                        // type: "datetime",        
                        categories:datex,
                        lineColor: '#8395a7',
                        allowDecimals: false,
                        crosshair: {color:'#ffffff',
                        dashStyle: 'Dot',
                        width:1.5,
                        label: {
                        enabled: true,
                        backgroundColor: '#ffffff',

                        }
                        },
                        labels: {enabled:false }, },
                        {
                        // type: "datetime", Secondary 
                        categories:date22,
                        lineColor: '#8395a7',
                        lineWidth: 1.5,
                        linkedTo: 0,
                        tickWidth: 1,
                        tickColor:"gray",
                        gridLineColor:plotParam.gridColor,
                        visible: true,
                        tickInterval:tickcal,
                        //  reversed: false,
                        opposite: false,
                        gridLineWidth:0.3,
                        labels: {
                        rotation:0,
                        // useHTML: true,
                        style: {
                        color: 'black',
                        fontSize:10,
                        overflow:'none'

                        }
                        },
                        title: {  
                        rotation: 0,
                        text: 'Span ' +dates_diff_cal+' Days '+'Data From: '+datex[0] + ' hrs  To: '+datex[datex.length-1]+' hrs',
                        style: {
                        color:'#0984e3',
                        font: '14px "Calibri", Verdana, sans-serif'
                        }
                        },
                        }
                        ],
                    
                        yAxis: [
                            { // Main Y-axis
                                //softMin: 0,
                                //  softMax:100 ,
                                min:0, max:100,     
                                tickPositions: [0, 10, 20,30, 40,50, 60,70,80,90,100],
                                visible:true, 
                                tickWidth: 0,
                                tickColor:"red",   
                                lineColor: 'gray',
                                lineWidth:2,
                                gridLineWidth:0.3,
                                crosshair: {color:'#ffffff',
                                dashStyle: 'Dot',
                                width:1.5,
                                label: {
                                enabled: true,
                                backgroundColor: '#ffffff',
                                }
                                },
                                gridLineColor: plotParam.gridColor,      
                                labels: {
                                enabled: mainYaxis,
                                format: '{value}',
                                style: {
                                color:'black',
                                backgroundColor: '#000000',
                                fontWeight:'bold'
                                }
                                },
                                title: {
                                enabled:mainYaxis,
                                align: 'high',
                                offset: 15,
                                rotation: 0,
                                y: -10,
                                text: '%',
                                style: {
                                color:'#1e272e',
                                fontWeight:'bold'
                                }
                                },
                                //labels: false,
                                },
                        { //  [1] DPI
                        min:0, 
                        max:0.6,     
                        visible:axis_Y1, 
                        tickWidth: 1, 
                        tickAmount: 11,  
                        gridLineWidth: 0,
                        crosshair: {color:'#ffffff',
                        dashStyle: 'Dot',
                        width:1.5,
                        label:{enabled: true,backgroundColor: '#ffffff',}
                        },
                        labels: {
                        enabled: true,
                        format: '{value}',
                        // formatter: function() {
                        //    return Math.ceil(this.value);
                        //   },
                        style: {
                            color:'black',
                            backgroundColor: '#000000',
                            fontWeight:'bold'
                            }
                        },
                        title: {
                        useHTML: true,
                        align: 'high',
                        offset: 15,
                        rotation: 0,
                        y: -10,
                        text: 'DPI',
                        style: {
                            color:'#1e272e',
                            fontWeight:'bold'
                        }
                        },
                        //labels: false,
                        //opposite: true
                        },
                        { //  [2] Pressure
                        min:0,
                        max:6,
                        tickAmount: 11,
                        visible:axis_Y2,
                        opposite: true, 
                        tickWidth: 1,      
                        gridLineWidth: 0,
                        crosshair: {color:'#ffffff',
                        dashStyle: 'Dot',
                        width:1.5,
                        label:{enabled: true,backgroundColor: '#ffffff',}
                        },
                        labels: {
                        enabled: true, 
                        format: '{value}',
                        // formatter: function() {
                        //    return Math.ceil(this.value);
                        //    },
                        style: {
                            color:'black',
                            backgroundColor: '#000000',
                            fontWeight:'bold'
                            }
                        },
                        title: {
                        useHTML: true,
                        align: 'high',
                        offset: 10,
                        rotation: 0,
                        y: -10,
                        text: 'bar',
                        style: {
                            color:'#1e272e',
                            fontWeight:'bold'
                        }
                        },
                        //labels: false,
                        //opposite: true
                        },   
                        { //[3]  chemical flow
                        //   min:0, 
                        //   max:100,  
                        tickAmount: 11,
                        visible:axis_Y3,
                        // opposite:true, 
                        tickWidth: 1,      
                        gridLineWidth: 0,
                        crosshair: {color:'#ffffff',
                        dashStyle: 'Dot',
                        width:1.5,
                        label:{enabled: true,backgroundColor: '#ffffff',}
                        },
                        labels: {
                        enabled: true,
                        //format: '{value}',
                        formatter:function(){return Math.ceil(this.value)},           
                        //  style: {color:temperature_color,}
                        },
                        title: {
                        useHTML: true,
                        align: 'high',
                        offset: 15,
                        rotation: 0,
                        y: -10,
                        text: 'L/h',
                        style: {
                        color:'#c0392b'
                        }
                        },
                        //labels: false,
                        //opposite: true
                        },
               
                        { //[4] Turbidity
                        min:0, 
                        max:10,                
                        visible:axis_Y4, 
                        tickWidth: 1, 
                        tickAmount: 11,                 
                        gridLineWidth: 0,
                        crosshair: {color:'#ffffff',
                        dashStyle: 'Dot',
                        width:1.5,
                        label:{enabled: true,backgroundColor: '#ffffff',}
                        },
                        labels: {
                        enabled: true, 
                        format: '{value}',                       
                        style: {color:'#636e72',}
                        },
                        title: {
                        useHTML: true,
                        align: 'high',
                        offset: 15,
                        rotation: 0,
                        y: -10,
                        text: 'NTU',
                        style: {
                            color:'#0984e3',
                            font: '14px "Calibri", Verdana, sans-serif'
                        }
                        },
                        //labels: false,
                        //opposite: true
                        },
                   
                        { //[5]  Flow Rate
                       // min:3500,
                        //max:17000,
                        visible:axis_Y5, 
                        tickWidth: 1,
                        tickAmount: 11,    
                        gridLineWidth: 0,
                        crosshair: {color:'#ffffff',
                        dashStyle: 'Dot',
                        width:1.5,
                        label:{enabled: true,backgroundColor: '#ffffff',}
                        },
                        labels: {
                        enabled: true,
                        //format: '{value}', 
                        formatter:function(){return Math.ceil(this.value)},
                        style: {
                            color:'black',
                            backgroundColor: '#000000',
                            fontWeight:'bold'
                            }
                        },
                        title: {
                        useHTML: true,
                        align: 'high',
                        offset:5,
                        rotation: 0,
                        y: -10,
                        text: 'm<sup>3</sup>/h',
                        style: {
                            color:'#1e272e',
                            fontWeight:'bold'
                        }
                        },
                        //labels: false,
                        //opposite: true
                        },
      
                        { //[6] SDI
                        min:0,
                        max:5,
                        tickAmount: 11, 
                        visible:axis_Y6, 
                        tickWidth: 1,      
                        // lineColor:pen1,
                        // lineWidth:2,
                        // minorTickInterval: 'auto',
                        crosshair: {color:'#ffffff',
                        dashStyle: 'Dot',
                        width:1.5,
                        label:{enabled: true,backgroundColor: '#ffffff',}
                        },
                        gridLineWidth: 0,
                        crosshair: {color:'#ffffff',
                        dashStyle: 'Dot',
                        width:1.5,
                        label: {
                        enabled: true,
                        backgroundColor: '#ffffff',

                        }
                        },
                        labels: {
                        enabled: true, 
                        format: '{value}', 
                        // formatter:function(){return Math.ceil(this.value)},           
                        style: {color:'#2d3436',}
                        },
                        title: {
                        useHTML: true,
                        align: 'high',
                        offset:15,
                        rotation: 0,
                        y: -10,
                        text: 'SDI',
                        style: {
                        color:'#2d3436'
                        }
                        },
                        //labels: false,
                        //opposite: true
                        },

                        { //[7] ORP
                        min: 200,
                        max:900,
                        tickAmount: 11,
                        visible:axis_Y7, 
                        tickWidth: 1,
                        gridLineWidth: 0,
                        crosshair: {color:'#ffffff',
                        dashStyle: 'Dot',
                        width:1.5,
                        label:{enabled: true,backgroundColor: '#ffffff',}
                        },
                        labels: {
                        enabled: true,
                        format: '{value}',
                        formatter: function() {return (this.value).toFixed(0);},                     
                        style: {color:'#2d3436',}
                        },
                        title: {
                        useHTML: true,
                        align: 'high',
                        offset:10,
                        rotation: 0,
                        y: -10,
                        text: 'mV',
                        style: {
                        color:'#2d3436'
                        }
                        },
                        //labels: false,
                        //opposite: true
                        },
                        { //[8] number of working daf
                        min:0,
                        max:10,
                        tickAmount: 11,
                        visible:axis_Y8, 
                        tickWidth: 1,
                        gridLineWidth: 0,
                        crosshair: {color:'#ffffff',
                        dashStyle: 'Dot',
                        width:1.5,
                        label:{enabled: true,backgroundColor: '#ffffff',}
                        },
                        labels: {
                        enabled: true,
                        format: '{value}',                  
                        style:{color:'#2d3436'}
                        },
                        title: {
                        useHTML: true,
                        align: 'high',
                        offset:15,
                        rotation: 0,
                        y: -10,
                        text: 'N',
                        style: {
                        color:'#2d3436'
                        }
                        },
                        //labels: false,
                        //opposite: true 
                        },   
                        { //[9] HC 
                        min:5,
                        max:40,
                        tickAmount: 11,
                        visible:axis_Y9, 
                        tickWidth: 1,
                        gridLineWidth: 0,
                        crosshair: {color:'#ffffff',
                        dashStyle: 'Dot',
                        width:1.5,
                        label:{enabled: true,backgroundColor: '#ffffff',}
                        },
                        labels: {
                        enabled: true,
                        format: '{value}',                                                
                        style:{color:'#2d3436'}
                        },
                        title: {
                        useHTML: true,
                        align: 'high',
                        offset:15,
                        rotation: 0,
                        y: -10,
                        text: 'ppb',
                        style: {
                        color:'#2d3436'
                        }
                        },
                        //labels: false,
                        //opposite: true 
                        },   

                        { //[10] Temp C 
                        min:18,
                        max:40,
                        tickAmount: 11,
                        visible:axis_Y10, 
                        tickWidth: 1,
                        gridLineWidth: 0,
                        crosshair: {color:'#ffffff',
                        dashStyle: 'Dot',
                        width:1.5,
                        label:{enabled: true,backgroundColor: '#ffffff',}
                        },
                        labels: {
                        enabled: true,
                        //format: '{value}',
                         formatter: function() {return (this.value).toFixed(0);},        
                        style:{color:'#2d3436'}
                        },
                        title: {
                        useHTML: true,
                        align: 'high',
                        offset:15,
                        rotation: 0,
                        y: -10,
                        text: '°C',
                        style: {
                        color:'#2d3436'
                        }
                        },
                        //labels: false,
                        //opposite: true 
                        },
                        { //[11] FRC 
                        min:0.01,
                        max:0.11,
                        tickAmount: 11,
                        visible:axis_Y11, 
                        tickWidth: 1,
                        gridLineWidth: 0,
                        crosshair: {color:'#ffffff',
                        dashStyle: 'Dot',
                        width:1.5,
                        label:{enabled: true,backgroundColor: '#ffffff',}
                        },
                        labels: {
                        enabled: true,
                        format: '{value}',

                        style:{color:'#2d3436'}
                        },
                        title: {
                        useHTML: true,
                        align: 'high',
                        offset:15,
                        rotation: 0,
                        y: -10,
                        text: 'ppm',
                        style: {
                        color:'#2d3436'
                        }
                        },
                        //labels: false,
                        //opposite: true 
                        },
                        { //[12] EC
                        min:45,
                        max:70,
                        tickAmount: 11,
                        visible:axis_Y12, 
                        tickWidth: 1,
                        gridLineWidth: 0,
                        crosshair: {color:'#ffffff',
                        dashStyle: 'Dot',
                        width:1.5,
                        label:{enabled: true,backgroundColor: '#ffffff',}
                        },
                        labels: {
                        enabled: true,
                        //format: '{value}', 
                        formatter: function() {return (this.value).toFixed(0);},                                  
                        style:{color:'#2d3436'}
                        },
                        title: {
                        useHTML: true,
                        align: 'high',
                        offset:15,
                        rotation: 0,
                        y: -10,
                        text: 'EC',
                        style: {
                           color:'#2d3436'
                        }
                        },
                        //labels: false,
                        //opposite: true 
                        },
                        { //[13] pH
                        min:6,
                        max:11,
                        tickAmount: 11,
                        visible:axis_Y13, 
                        tickWidth: 1,
                        gridLineWidth: 0,
                        crosshair: {color:'#ffffff',
                        dashStyle: 'Dot',
                        width:1.5,
                        label:{enabled: true,backgroundColor: '#ffffff',}
                        },
                        labels: {
                        enabled: true,
                        format: '{value}',
                                         
                        style:{color:'#2d3436'}
                        },
                        title: {
                        useHTML: true,
                        align: 'high',
                        offset:15,
                        rotation: 0,
                        y: -10,
                        text: 'pH',
                        style: {
                        color:'#2d3436'
                        }
                        },
                        //labels: false,
                        //opposite: true 
                        },            
                                  
                        ],
                        series: [  
                    
                                                        {  
                                                              name:st[s1Param.ufData]['name'],
                                                              type:s1Param.chartType,
                                                              visible:s1Param.series,
                                                              showInLegend:s1Param.series,
                                                              data: dataSeries1x,                                          
                                                              lineWidth:(s1Param.chartType=="scatter")?0: s1Param.lineWidth,
                                                              yAxis:st[s1Param.ufData]['yAxis'],
                                                              tooltip: {
                                                                crosshair:[true, true],
                                                                headerFormat: '{point.key}<br>',
                                                                pointFormat: '<span style="color: {series.color};">\u25CF</span><small>{series.name}: </small><b>{point.y}</b> <br>',
                                                                shared: true,
                                                                useHTML: true,
                                                                hideDelay:1000,
                                                                stickyTracking:true,                                           
                                                               valueSuffix: st[s1Param.ufData]['unit'],
                                                              },
                                                              color:s1Param.pen,
                                                                    marker: {
                                                                    symbol: s1Param.markerShape,
                                                                    radius: s1Param.markerWeight,
                                                                    states: {hover:{enabled:false}}},
                                                                   dataLabels: {
                                                                   enabled: s1Param.lable,
                                                                   style: {
                                                                          fontWeight: 'normal',
                                                                          textShadow: false,
                                                                          textOutline:false
                                                                      },
                                                                   color:s1Param.pen,                  
                                                                  },
                                                          fillOpacity: 0.17,
                                                          },
                                                       {  
                                                              name:st[s2Param.ufData]['name'],
                                                              type:s2Param.chartType,
                                                              visible:s2Param.series,
                                                              showInLegend:s2Param.series,
                                                              data: dataSeries2x,                                          
                                                              lineWidth:(s2Param.chartType=="scatter")?0:s2Param.lineWidth,
                                                              yAxis:st[s2Param.ufData]['yAxis'],
                                                              tooltip: {
                                                                crosshair:[true, true],
                                                                headerFormat: '{point.key}<br>',
                                                                pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small><b>{point.y}</b><br>',
                                                                shared: true,
                                                                useHTML: true,
                                                                hideDelay:1000,
                                                                stickyTracking:true,                                           
                                                               valueSuffix: st[s2Param.ufData]['unit'],
                                                              },
                                                              color:s2Param.pen,
                                                                    marker: {
                                                                    symbol: s2Param.markerShape,
                                                                    radius: s2Param.markerWeight,
                                                                    states: {
                                                                              hover: {
                                                                                  enabled: false
                                                                              }
                                                                          }
                                                                         },
                                                                   dataLabels: {
                                                                   enabled: s2Param.lable,
                                                                   style: {
                                                                          fontWeight: 'normal',
                                                                          textShadow: false,
                                                                          textOutline:false
                                                                      },
                                                                   color:s2Param.pen,                  
                                                                  },
                                                          fillOpacity: 0.17,
                                                          },
                                   {  
                                                              name:st[s3Param.ufData]['name'],
                                                              type:s3Param.chartType,
                                                              visible:s3Param.series,
                                                              showInLegend:s3Param.series,
                                                              data: dataSeries3x,                                          
                                                              lineWidth:(s3Param.chartType=="scatter")?0: s3Param.lineWidth,
                                                              yAxis:st[s3Param.ufData]['yAxis'],
                                                              tooltip: {
                                                                crosshair:[true, true],
                                                                headerFormat: '{point.key}<br>',
                                                                pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small><b>{point.y}</b><br>',
                                                                shared: true,
                                                                useHTML: true,                                           
                                                               valueSuffix: st[s3Param.ufData]['unit'],
                                                              },
                                                              color:s3Param.pen,
                                                                    marker: {
                                                                    symbol:s3Param.markerShape,
                                                                    radius:s3Param.markerWeight,
                                                                    states: {
                                                                              hover: {
                                                                                  enabled: false
                                                                              }
                                                                          }
                                                                         },
                                                                   dataLabels: {
                                                                   enabled: s3Param.lable,
                                                                   style: {
                                                                          fontWeight: 'normal',
                                                                          textShadow: false,
                                                                          textOutline:false
                                                                      },
                                                                   color:s3Param.pen,                  
                                                                  },
                                                          fillOpacity: 0.17,
                                                          }, 
                                                            {  
                                                              name:st[s4Param.ufData]['name'],
                                                              type:s4Param.chartType,
                                                              visible:s4Param.series,
                                                              showInLegend:s4Param.series,
                                                              data: dataSeries4x,                                          
                                                              lineWidth:(s4Param.chartType=="scatter")?0: s4Param.lineWidth,
                                                              yAxis:st[s4Param.ufData]['yAxis'],
                                                              tooltip: {
                                                                crosshair:[true, true],
                                                                headerFormat: '{point.key}<br>',
                                                                pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small> <b>{point.y}</b><br>',
                                                                shared: true,
                                                                useHTML: true,                                           
                                                               valueSuffix:st[s4Param.ufData]['unit'],
                                                              },
                                                              color:s4Param.pen,
                                                                    marker: {
                                                                    symbol:s4Param.markerShape,
                                                                    radius:s4Param.markerWeight,
                                                                    states: {
                                                                              hover: {
                                                                                  enabled: false
                                                                              }
                                                                          }
                                                                         },
                                                                   dataLabels: {
                                                                   enabled: s4Param.lable,
                                                                   style: {
                                                                          fontWeight: 'normal',
                                                                          textShadow: false,
                                                                          textOutline:false
                                                                      },
                                                                   color:s4Param.pen,                  
                                                                  },
                                                          fillOpacity: 0.17,
                                                          },                                                                                                                                                 
                                                         {  
                                                              name:st[s5Param.ufData]['name'],
                                                              type:s5Param.chartType,
                                                              visible:s5Param.series,
                                                              showInLegend:s5Param.series,
                                                              data: dataSeries5x,                                          
                                                              lineWidth:(s5Param.chartType=="scatter")?0: s5Param.lineWidth,
                                                              yAxis:st[s5Param.ufData]['yAxis'],
                                                              tooltip: {
                                                               crosshair:[true, true],
                                                                headerFormat: '{point.key}<br>',
                                                                pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small><b>{point.y}</b><br>',
                                                                shared: true,
                                                                useHTML: true,                                           
                                                               valueSuffix:st[s5Param.ufData]['unit'],
                                                              },
                                                              color:s5Param.pen,
                                                                    marker: {
                                                                    symbol:s5Param.markerShape,
                                                                    radius:s5Param.markerWeight,
                                                                    states: {
                                                                              hover: {
                                                                                  enabled: false
                                                                              }
                                                                          }
                                                                         },
                                                                   dataLabels: {
                                                                   enabled: s5Param.lable,
                                                                   style: {
                                                                          fontWeight: 'normal',
                                                                          textShadow: false,
                                                                          textOutline:false
                                                                      },
                                                                   color:s5Param.pen,                  
                                                                  },
                                                          fillOpacity: 0.17,
                                                          },
                                                           {  
                                                              name:st[s6Param.ufData]['name'],
                                                              type:s6Param.chartType,
                                                              visible:s6Param.series,
                                                              showInLegend:s6Param.series,
                                                              data: dataSeries6x,                                          
                                                              lineWidth:(s6Param.chartType=="scatter")?0: s6Param.lineWidth,
                                                              yAxis:st[s6Param.ufData]['yAxis'],
                                                              tooltip: {
                                                               crosshair:[true, true],
                                                                headerFormat: '{point.key}<br>',
                                                                pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small><b>{point.y}</b><br>',
                                                                shared: true,
                                                                useHTML: true,                                           
                                                               valueSuffix:st[s6Param.ufData]['unit'],
                                                              },
                                                              color:s6Param.pen,
                                                                    marker: {
                                                                    symbol:s6Param.markerShape,
                                                                    radius:s6Param.markerWeight,
                                                                    states: {
                                                                              hover: {
                                                                                  enabled: false
                                                                              }
                                                                          }
                                                                         },
                                                                   dataLabels: {
                                                                   enabled: s6Param.lable,
                                                                   style: {
                                                                          fontWeight: 'normal',
                                                                          textShadow: false,
                                                                          textOutline:false
                                                                      },
                                                                   color:s6Param.pen,                  
                                                                  },
                                                          fillOpacity: 0.17,
                                                          },
                                                            {  
                                                              name:st[s7Param.ufData]['name'],
                                                              type:s7Param.chartType,
                                                              visible:s7Param.series,
                                                              showInLegend:s7Param.series,
                                                              data: dataSeries7x,                                          
                                                              lineWidth:(s7Param.chartType=="scatter")?0: s7Param.lineWidth,
                                                              yAxis:st[s7Param.ufData]['yAxis'],
                                                              tooltip: {
                                                                crosshair:[true, true],
                                                                headerFormat: '{point.key}<br>',
                                                                pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small><b>{point.y}</b><br>',
                                                                shared: true,
                                                                useHTML: true,                                           
                                                               valueSuffix:st[s7Param.ufData]['unit'],
                                                              },
                                                              color:s7Param.pen,
                                                                    marker: {
                                                                    symbol:s7Param.markerShape,
                                                                    radius:s7Param.markerWeight,
                                                                    states: {
                                                                              hover: {
                                                                                  enabled: false
                                                                              }
                                                                          }
                                                                         },
                                                                   dataLabels: {
                                                                   enabled: s7Param.lable,
                                                                   style: {
                                                                          fontWeight: 'normal',
                                                                          textShadow: false,
                                                                          textOutline:false
                                                                      },
                                                                   color:s7Param.pen,                  
                                                                  },
                                                          fillOpacity: 0.17,
                                                          }                                                                                       
                                                       

                        ]
                    
                    
                      } ) }
$("#plot_window").css({'background-color':'white'});
}catch(err){
    Notiflix.Report.Warning('Failure',' '+err,'Close');
    console.log(err);
    $("#plot_window").html(' ');
    $("#plot_window").css({'background-color':'black'});
}

Notiflix.Notify.Success('Plot updated')
Notiflix.Block.Remove('body'); 
   }).catch(error=>{
    Notiflix.Block.Remove('body');
    Notiflix.Report.Failure('Failure','Details: '+error,'Close');
    console.log(error);
   })


}


  
            
            //catch(error =>Notiflix.Notify.Warning('Failed '+error));
        
          





