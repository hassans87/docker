queryStream();

//$('.tensor-flow,.rednder').change(function(){queryStream();})
setInterval(function () {$("head title").html($("head title").html().substring(1) + $("head title").html().substring(0,1));}, 400);
$('.query_fire').click(function(){queryStream();})
$('.query').change(function(){
     //   queryStream();
Notiflix.Notify.Info('Changes detected, Press Query Button to apply'); 
})
$('#export_data').click(function(){
//window.location.replace("./data_export_ro1.php");
;})
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
                    this.lineWidth = $('#line_width'+target).val();
                    this.markerWeight =  $('#marker'+target).val();
                    this.markerShape = $('#marker_shape'+target).val();
                    this.modalColor = $(".modelheader"+target).css({'background-color':this.pen});
                    this.modalTitle = $('#seriestitle'+target).html('Series '+target+': '+$("#ufdata"+target+" option:selected").text());
                    this.isY = false;
                    if(this.series && this.yAxis){this.isY=true}else{this.isY=false}
                    if(this.ufData=='cip'||this.ufData=='full_flushing'||this.ufData=='membrane_flushing'||this.ufData=='dbna_flushing'){this.markerWeight=4; this.chartType='scatter';}
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
const query_data = new URLSearchParams({from:plotParam.dateFrom,dateto:plotParam.dateTo,
ufGroup:plotParam.bayline,datainvt:plotParam.interval,roskid:plotParam.ufqry,ufdata1:s1Param.ufData,ufdata2:s2Param.ufData,ufdata3:s3Param.ufData,ufdata4:s4Param.ufData,ufdata5:s5Param.ufData,ufdata6:s6Param.ufData,ufdata7:s7Param.ufData,
d1:d1,d2:d2,d3:d3,d4:d4,d5:d5,d6:d6,d7:d7});
fetch(window.location.href,    
{method:'POST',
body:query_data,
headers:{"x-CSRF-TOKEN":csrfToken}
})
.then(response =>response.text())
.then((data) =>{
    console.log(data);
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
//console.log(dataSeries3);
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
dpi_906:{
        unit:" bar",
        name:"DP",
        yAxis:1,
        arrFlr:0.1,
        valFixTo:2,
        sum:false
        },
norm_perm_flow:{
        unit:" m<sup>3</sup>/h",
        name:"Normalized Permeate Flow",
        yAxis:2,
        arrFlr:0.1,
        valFixTo:0,
         sum:false
        },

norm_per_salt_rej:{
        unit:" %",
        name:"Salt Rejection",
        yAxis:4,
        arrFlr:0.5,
        valFixTo:1,
        sum:false
        },
norm_per_salt_pas:{
        unit:" %",
        name:"Salt Passage",
        yAxis:5,
        arrFlr:0.005,
        valFixTo:2,
        sum:false
        },
feed_pres_pt108:{
        unit:" bar",
        name:"Feed Pressure",
        yAxis:3,
        arrFlr:1,
        valFixTo:1,
         sum:false
        },
conc_pres_pt307:{
        unit:" bar",
        name:"Reject Pressure",
        yAxis:3,
        arrFlr:0.01,
        valFixTo:1,
         sum:false
        },
per_pres_pt312:{
        unit:" bar",
        name:"Permeate Pressure",
        yAxis:1,
        arrFlr:0.01,
        valFixTo:1,
         sum:false
        },
recovery:{   
        unit:" %",
        name:"Recovery",
        yAxis:0,
        arrFlr:1,
        valFixTo:1,
        sum:false
        },
rear_permeate_ft905:{
        unit:" m<sup>3</sup>/h",
        name:"Rear Permeate Flow",
        yAxis:2,
        arrFlr:10,
        valFixTo:0,
        sum:false
        },
front_permeate_ft_305:{
        unit:" m<sup>3</sup>/h",
        name:"Front Permeate Flow",
        yAxis:2,
        arrFlr:10,
        valFixTo:0,
        sum:false
        },
 full_flushing:{
        unit:" ",
        name:"Full Flushing",
        yAxis:12,
        arrFlr:1,
        valFixTo:0,
        sum:true
        },
membrane_flushing:{
        unit:" ",
        name:"Membrane Flushing",
        yAxis:12,
        arrFlr:0.5,
        valFixTo:0,
        sum:true
        },
dbna_flushing:{
        unit:" ",
        name:"DBNPA Flushing",
        yAxis:12,
        arrFlr:60,
        valFixTo:0,
        sum:true
        },
cip:{
        unit:" ",
        name:"CIP",
        yAxis:12,
        arrFlr:0.5,
        valFixTo:0,
        sum:true
        },
feed_flow:{
        unit:" m<sup>3</sup>/h",
        name:"Feed Flow",
        yAxis:2,
        arrFlr:1,
        valFixTo:0,
        sum:false
        },
hp_pump_ft101:{
       unit:" m<sup>3</sup>/h",
        name:"HP Pump Flow",
        yAxis:2,
        arrFlr:0.5,
        valFixTo:0,
        sum:false
        },
eri_out_ft203:{
        unit:" m<sup>3</sup>/h",
        name:"ERI Out Flow FT-203",
        yAxis:2,
        arrFlr:50,
        valFixTo:0,
        sum:false
        },
eri_inlet_ft207:{
        unit:" m<sup>3</sup>/h",
        name:"ERI Out Flow FT-207",
        yAxis:2,
        arrFlr:0.5,
        valFixTo:0,
        sum:false
        },
conc_flow_cal:{
      unit:" m<sup>3</sup>/h",
        name:"Concentration Flow",
        yAxis:2,
        arrFlr:1,
        valFixTo:0,
        sum:false
        },       
overflush:{
        unit:" %",
        name:"Overflush Ratio",
        yAxis:5,
        arrFlr:1,
        valFixTo:2,
        sum:false
        },
eri_hp_out_cond_at306:{
        unit:" uS/cm",
        name:"ERI Hp out Conductivity",
        yAxis:6,
        arrFlr:100,
        valFixTo:0,
        sum:false
        },
eri_hp_in_con_at206:{
        unit:" uS/cm",
        name:"ERI Hp in Conductivity",
        yAxis:6,
        arrFlr:5,
        valFixTo:0,
        sum:false
        },
mixing_eri_calc:{
        unit:" %",
        name:"ERI Mixing Calc.",
        yAxis:4,
        arrFlr:10,
        valFixTo:2,
        sum:false
        },
feed_tds:{
        unit:" PPM",
        name:"Feed TDS",
        yAxis:8,
        arrFlr:50,
        valFixTo:0,
        sum:false
        },
feed_cond_at211:{
        unit:" uS/cm",
        name:"Feed Conductivity",
        yAxis:6,
        arrFlr:0.5,
        valFixTo:0,
        sum:false
        },
front_tds_calc:{
        unit:" PPM",
        name:"Front Permeate TDS",
        yAxis:8,
        arrFlr:50,
        valFixTo:0,
        sum:false,
        },
rear_tds_calc:{
        unit:" PPM",
        name:"Rear Permeate TDS",
        yAxis:8,
        arrFlr:0.5,
        valFixTo:0,
        sum:false
        },
rear_cond_at301:{
        unit:" uS/cm",
        name:"Rear EC",
        yAxis:7,
        arrFlr:0.5,
        valFixTo:0,
        sum:false
        },
front_cond_at303:{
        unit:" uS/cm",
        name:"Front EC",
        yAxis:7,
        arrFlr:0.5,
        valFixTo:0,
        sum:false
        },
cond_average:{ 
        unit:" uS/cm",
        name:"EC Average",
        yAxis:4,
        arrFlr:50,
        valFixTo:0,
        sum:false
        },
tds_average:{
        unit:" PPM",
        name:"Average TDS",
        yAxis:3,
        arrFlr:0.5,
        valFixTo:1,
        sum:false
        },
temp_calc:{
        unit:" °C",
        name:"Temp. Calc.",
        yAxis:10,
        arrFlr:1,
        valFixTo:1,
        sum:false
        },
feed_temp:{
        unit:" °F",
        name:"Temp. F",
        yAxis:9,
        arrFlr:50,
        valFixTo:1,
        sum:false
        },
feed_temp_tit212:{
        unit:" °C",
        name:"Feed Temp.",
        yAxis:10,
        arrFlr:0.5,
        valFixTo:1,
        sum:false
        },
days_operation:{
        unit:" Days",
        name:"Operation Days",
        yAxis:11,
        arrFlr:0.5,
        valFixTo:0,
        sum:false
        },
temp_correc_fac:{
        unit:" ",
        name:"Temperator Correction Factor",
        yAxis:5,
        arrFlr:0.5,
        valFixTo:2,
        sum:false
        },
calc_feed_brine_avg:{
        unit:" uS/cm",
        name:"Calc. Feed-Brine",
        yAxis:6,
        arrFlr:0.5,
        valFixTo:0,
        sum:false
        },
feed_brine_ro_press:{
        unit:" bar",
        name:"Feed-Brine Osmotic Pr.",
        yAxis:3,
        arrFlr:0.5,
        valFixTo:1,
        sum:false
        },
per_ro_pres:{
        unit:" bar",
        name:"Permeate Osmotic Pr.",
        yAxis:1,
        arrFlr:0.5,
        valFixTo:1,
        sum:false
        },
net_driving_press:{
        unit:" bar",
        name:"Net Driving Pr.",
        yAxis:3,
        arrFlr:0.5,
        valFixTo:1,
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
bayline: "41",
roSkid: $('#skidx').val(), 
ufqry:" ",
chartBackground:$('#pen_main').val(),
plotWidth:$('#plot_width').val(),
legendShow: $('#is_legend').is(':checked'),
yAxis:$('#is_main_yaxis').is(':checked'),
gridColor: $('#pen_grid').val(),
plotExpWidth:$('#export_width').val(),
plotExpHeight:$('#export_height').val(),
plotExpBackground:$('#pen_export').val(),
plotExpTitleColor: $('#pen_export_title').val()}  
var stack0=["recovery"];
var stack1=["dpi_906","per_pres_pt312","per_ro_pres"];
var stack2=["feed_pres_pt108","conc_pres_pt307","feed_brine_ro_press","net_driving_press"];
var stack3 = ["norm_perm_flow","rear_permeate_ft905","front_permeate_ft_305","feed_flow","hp_pump_ft101","eri_out_ft203","eri_inlet_ft207","conc_flow_cal"];
var stack4=["norm_per_salt_rej","mixing_eri_calc"];
var stack5=["norm_per_salt_pas","overflush","temp_correc_fac"];
var stack6=["eri_hp_out_cond_at306","eri_hp_in_con_at206","feed_cond_at211","calc_feed_brine_avg"];
var stack7=["front_cond_at303","rear_cond_at301","cond_average"];
var stack8=["front_tds_calc","rear_tds_calc","tds_average"];
var stack9=["feed_temp"];
var stack10=["temp_calc","feed_temp_tit212"];
var stack11=["days_operation"];
var mainYaxis     =(plotParam.yAxis || s1Param.isY && (stack0.includes(s1Param.ufData))||s2Param.isY && (stack0.includes(s2Param.ufData))||s3Param.isY && (stack0.includes(s3Param.ufData))||s4Param.isY && (stack0.includes(s4Param.ufData))||s5Param.isY && (stack0.includes(s5Param.ufData))||s6Param.isY && (stack0.includes(s6Param.ufData))||s7Param.isY && (stack0.includes(s7Param.ufData)))? true: false;
     var dpX_Yaxis=(s1Param.isY && (stack1.includes(s1Param.ufData))||s2Param.isY && (stack1.includes(s2Param.ufData))||s3Param.isY && (stack1.includes(s3Param.ufData))||s4Param.isY && (stack1.includes(s4Param.ufData))||s5Param.isY && (stack1.includes(s5Param.ufData))||s6Param.isY && (stack1.includes(s6Param.ufData))||s7Param.isY && (stack1.includes(s7Param.ufData)))? true: false;
      var pr_Yaxis=(s1Param.isY && (stack2.includes(s1Param.ufData))||s2Param.isY && (stack2.includes(s2Param.ufData))||s3Param.isY && (stack2.includes(s3Param.ufData))||s4Param.isY && (stack2.includes(s4Param.ufData))||s5Param.isY && (stack2.includes(s5Param.ufData))||s6Param.isY && (stack2.includes(s6Param.ufData))||s7Param.isY && (stack2.includes(s7Param.ufData)))? true: false; 
         var flowY=(s1Param.isY && (stack3.includes(s1Param.ufData))||s2Param.isY && (stack3.includes(s2Param.ufData))||s3Param.isY && (stack3.includes(s3Param.ufData))||s4Param.isY && (stack3.includes(s4Param.ufData))||s5Param.isY && (stack3.includes(s5Param.ufData))||s6Param.isY && (stack3.includes(s6Param.ufData))||s7Param.isY && (stack3.includes(s7Param.ufData)))? true: false; 
var reject_erimix =(s1Param.isY && (stack4.includes(s1Param.ufData))||s2Param.isY && (stack4.includes(s2Param.ufData))||s3Param.isY && (stack4.includes(s3Param.ufData))||s4Param.isY && (stack4.includes(s4Param.ufData))||s5Param.isY && (stack4.includes(s5Param.ufData))||s6Param.isY && (stack4.includes(s6Param.ufData))||s7Param.isY && (stack4.includes(s7Param.ufData)))? true: false; 
   var salt_pas_y =(s1Param.isY && (stack5.includes(s1Param.ufData))||s2Param.isY && (stack5.includes(s2Param.ufData))||s3Param.isY && (stack5.includes(s3Param.ufData))||s4Param.isY && (stack5.includes(s4Param.ufData))||s5Param.isY && (stack5.includes(s5Param.ufData))||s6Param.isY && (stack5.includes(s6Param.ufData))||s7Param.isY && (stack5.includes(s7Param.ufData)))? true: false; 
    var ecHYaxis  =(s1Param.isY && (stack6.includes(s1Param.ufData))||s2Param.isY && (stack6.includes(s2Param.ufData))||s3Param.isY && (stack6.includes(s3Param.ufData))||s4Param.isY && (stack6.includes(s4Param.ufData))||s5Param.isY && (stack6.includes(s5Param.ufData))||s6Param.isY && (stack6.includes(s6Param.ufData))||s7Param.isY && (stack6.includes(s7Param.ufData)))? true: false; 
    var ecLYaxis  =(s1Param.isY && (stack7.includes(s1Param.ufData))||s2Param.isY && (stack7.includes(s2Param.ufData))||s3Param.isY && (stack7.includes(s3Param.ufData))||s4Param.isY && (stack7.includes(s4Param.ufData))||s5Param.isY && (stack7.includes(s5Param.ufData))||s6Param.isY && (stack7.includes(s6Param.ufData))||s7Param.isY && (stack7.includes(s7Param.ufData)))? true: false; 
    var tdsYaxis  =(s1Param.isY && (stack8.includes(s1Param.ufData))||s2Param.isY && (stack8.includes(s2Param.ufData))||s3Param.isY && (stack8.includes(s3Param.ufData))||s4Param.isY && (stack8.includes(s4Param.ufData))||s5Param.isY && (stack8.includes(s5Param.ufData))||s6Param.isY && (stack8.includes(s6Param.ufData))||s7Param.isY && (stack8.includes(s7Param.ufData)))? true: false; 
    var tempFYaxis=(s1Param.isY && (stack9.includes(s1Param.ufData))||s2Param.isY && (stack9.includes(s2Param.ufData))||s3Param.isY && (stack9.includes(s3Param.ufData))||s4Param.isY && (stack9.includes(s4Param.ufData))||s5Param.isY && (stack9.includes(s5Param.ufData))||s6Param.isY && (stack9.includes(s6Param.ufData))||s7Param.isY && (stack9.includes(s7Param.ufData)))? true: false; 
    var tempCYaxis=(s1Param.isY && (stack10.includes(s1Param.ufData))||s2Param.isY && (stack10.includes(s2Param.ufData))||s3Param.isY && (stack10.includes(s3Param.ufData))||s4Param.isY && (stack10.includes(s4Param.ufData))||s5Param.isY && (stack10.includes(s5Param.ufData))||s6Param.isY && (stack10.includes(s6Param.ufData))||s7Param.isY && (stack10.includes(s7Param.ufData)))? true: false; 
    var dayYaxis  =(s1Param.isY && (stack11.includes(s1Param.ufData))||s2Param.isY && (stack11.includes(s2Param.ufData))||s3Param.isY && (stack11.includes(s3Param.ufData))||s4Param.isY && (stack11.includes(s4Param.ufData))||s5Param.isY && (stack11.includes(s5Param.ufData))||s6Param.isY && (stack11.includes(s6Param.ufData))||s7Param.isY && (stack11.includes(s7Param.ufData)))? true: false; 




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
        y:20, 
        text: 'Skid:41'+plotParam.roSkid.toUpperCase() +', Data From: '+datex[0] + ' hrs  To: '+datex[datex.length-1]+' hrs' ,
        style: {color: plotParam.plotExpTitleColor,
        font: '15px "Calibri", Verdana, sans-serif'
        }},
        exporting: {
        printMaxWidth: 1000,
        allowHTML: false,
        //url:"http://exportserver.data-tensor.com/:3300",
        //url: "http://localhost:7805",
        fallbackToExportServer: false,
        filename:'SWRO-SADARA RO Normalization 41'+plotParam.roSkid.toUpperCase()+ ' '+datex[0] + " To "+datex[datex.length-1],
        enabled: true,
        buttons: {
        contextButton: {
        //  text: 'Chart Export'
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
        // backgroundColor:'rgba(255, 255, 255, 0.5)'
        },    
        tooltip: { 
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
        className: 'g3',
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
                      //  crosshair: true,
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
                            text: 'Span ' +dates_diff_cal+' Days',
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
                                    color:'#0984e3'
                                }
                            },
                            //labels: false,
                        },
                        
                    
                        { //  [1]    bar for DP
                         min:1.5, 
                         max:3,     
                          visible:dpX_Yaxis, 
                          tickWidth: 1, 
                          tickAmount: 11,  
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
                               // formatter: function() {
                                //    return Math.ceil(this.value);
                               //   },
                                style: {color:'#2f3542'}
                            },
                            title: {
                                useHTML: true,
                                align: 'high',
                                offset: 15,
                                rotation: 0,
                                y: -10,
                                text: 'bar',
                                style: {
                                    color:'#0984e3'
                                }
                            },
                            //labels: false,
                            //opposite: true
                        },
        { //  [2] Flow 
             tickAmount: 11,
              visible:flowY, 
              tickWidth: 1,      
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
                   // formatter: function() {
                    //    return Math.ceil(this.value);
                  //    },
                  //  style: {color:temperature_color,}
                },
                title: {
                    useHTML: true,
                    align: 'high',
                    offset: 15,
                    rotation: 0,
                    y: -10,
                    text: 'm<sup>3</sup>/h',
                    style: {
                        color:'#27ae60'
                    }
                },
                //labels: false,
                //opposite: true
            },   
    
            { //[3]  Pressure
                 //   min:0, 
                 //   max:100,  
                  tickAmount: 11,
                  visible:pr_Yaxis,
                 // opposite:true, 
                  tickWidth: 1,      
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
                        text: 'Bar',
                        style: {
                            color:'#c0392b'
                        }
                    },
                    //labels: false,
                    //opposite: true
                },
               
            { //[4] Salt Rejection      
                        min:95, 
                        max:100,                
                        visible:reject_erimix, 
                        tickWidth: 1, 
                        tickAmount: 11,                 
                        gridLineWidth: 0,
                        crosshair: {color:'#ffffff',dashStyle: 'Dot',width:1.5,
                        label: {enabled: true,backgroundColor: '#ffffff',}},
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
                            text: 'R-%',
                            style: {
                                color:'#636e72'
                            }
                        },
                        //labels: false,
                        //opposite: true
                    },
                   
                    { //[5]  Salt Passage
                                min:0, 
                                max:5, 
                                visible:salt_pas_y, 
                                tickWidth: 1,
                                tickAmount: 11,    
                                gridLineWidth: 0,
                                crosshair: {color:'#ffffff',dashStyle: 'Dot',width:1.5,
                                label: {enabled: true,backgroundColor: '#ffffff',}},
                                labels: {
                                enabled: true,
                                format: '{value}', 

                                style: {color:'#2d3436',}
                                },
                            title: {
                                useHTML: true,
                                align: 'high',
                                offset:15,
                                rotation: 0,
                                y: -10,
                                text: 'P-%',
                                style: {
                                    color:'#2d3436'
                                }
                            },
                            //labels: false,
                            //opposite: true
                        },
      
                        { //[6] high EC
                           tickAmount: 11, 
                            visible:ecHYaxis, 
                            tickWidth: 1,      
                             // lineColor:pen1,
                            // lineWidth:2,
                           // minorTickInterval: 'auto',
                             gridLineWidth: 0,
                        crosshair: {color:'#ffffff',dashStyle: 'Dot',width:1.5,
                        label: {enabled: true,backgroundColor: '#ffffff',}},
                              labels: {
                                    enabled: true, //is_temperature,
                                   // format: '{value.toFixed(0)}', 
                                    formatter: function() {
                                        return (this.value/1000).toFixed(1)+' K';
                                      }, 
                                             
                                    style: {color:'#2d3436',}
                                },
                                title: {
                                    useHTML: true,
                                    align: 'high',
                                    offset:15,
                                    rotation: 0,
                                    y: -10,
                                    text: 'SW-EC',
                                    style: {
                                        color:'#2d3436'
                                    }
                                },
                                //labels: false,
                                //opposite: true
                            },
    
                            { //[7] low EC
                               // min: 0,
                              //  max: 2,
                                tickAmount: 11,
                                visible:ecLYaxis, 
                                tickWidth: 1,
                                 gridLineWidth: 0,
                        crosshair: {color:'#ffffff',dashStyle: 'Dot',width:1.5,
                        label: {enabled: true,backgroundColor: '#ffffff',}},
                                  labels: {
                                        enabled: true,
                                      //  format: '{value}',
                                        formatter: function() {
                                            return (this.value/1000).toFixed(1)+' K';
                                          },                       
                                        style: {color:'#2d3436',}
                                    },
                                    title: {
                                        useHTML: true,
                                        align: 'high',
                                        offset:10,
                                        rotation: 0,
                                        y: -10,
                                        text: 'P-EC',
                                        style: {
                                            color:'#2d3436'
                                        }
                                    },
                                    //labels: false,
                                    //opposite: true
                                },
                                { //[8] TDS
                                  //  min:1,
                                  //  max:14,
                                    tickAmount: 11,
                                    visible:tdsYaxis, 
                                    tickWidth: 1,
                                     gridLineWidth: 0,
                        crosshair: {color:'#ffffff',dashStyle: 'Dot',width:1.5,
                        label: {enabled: true,backgroundColor: '#ffffff',}},
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
                                            text: 'TDS',
                                            style: {
                                                color:'#2d3436'
                                            }
                                        },
                                        //labels: false,
                                        //opposite: true 
                                    },   
                                    { //[9] Temp. F 
                                        tickAmount: 11,
                                       visible:tempFYaxis, 
                                       tickWidth: 1,
                                        gridLineWidth: 0,
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
                                               text: '°F',
                                               style: {
                                                   color:'#2d3436'
                                               }
                                           },
                                           //labels: false,
                                           //opposite: true 
                                       },   

                                   { //[10] Temp C 
                                        tickAmount: 11,
                                       visible:tempCYaxis, 
                                       tickWidth: 1,
                                        gridLineWidth: 0,
                        crosshair: {color:'#ffffff',dashStyle: 'Dot',width:1.5,
                        label: {enabled: true,backgroundColor: '#ffffff',}},
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
                                               text: '°C',
                                               style: {
                                                   color:'#2d3436'
                                               }
                                           },
                                           //labels: false,
                                           //opposite: true 
                                       },   
                                  { //[11] Days of Operations 
                                        tickAmount: 11,
                                       visible:dayYaxis, 
                                       tickWidth: 1,
                                        gridLineWidth: 0,
                        crosshair: {color:'#ffffff',dashStyle: 'Dot',width:1.5,
                        label: {enabled: true,backgroundColor: '#ffffff',}},
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
                                               text: 'Days',
                                               style: {
                                                   color:'#2d3436'
                                               }
                                           },
                                           //labels: false,
                                           //opposite: true 
                                       },  
                                    { //[12] CIP, Flushing, 
                                    min:-13,
                                    max:5, 
                                    tickAmount: 11,
                                       visible:false, 
                                       tickWidth: 1,
                                        gridLineWidth: 0,
                                         labels: {
                                               enabled: false,
                                              format: '{value}',
                                                                                         
                                               style:{color:'#2d3436'}
                                           },
                                           title: {
                                               useHTML: true,
                                               align: 'high',
                                               offset:15,
                                               rotation: 0,
                                               y: -10,
                                               text: 'Days',
                                               style: {
                                                   color:'#2d3436'
                                               }
                                           },
                                           //labels: false,
                                           //opposite: true 
                                       } 
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
                                                              className: 'g3',
                                                              tooltip: {
                                                                crosshairs: [true, true],
                                                                headerFormat: '{point.key}<br>',
                                                                pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small><b>{point.y}</b><br>',
                                                                shared: true,
                                                                useHTML: true,                                           
                                                               valueSuffix: st[s1Param.ufData]['unit'],
                                                              },
                                                              color:s1Param.pen,
                                                                    marker: {
                                                                    symbol: s1Param.markerShape,
                                                                    radius: s1Param.markerWeight,
                                                                    states: {
                                                                              hover: {
                                                                                  enabled: false
                                                                              }
                                                                          }
                                                                         },
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
                                                                crosshairs: [true, true],
                                                                headerFormat: '{point.key}<br>',
                                                                pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small><b>{point.y}</b><br>',
                                                                shared: true,
                                                                useHTML: true,                                           
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
                                                                crosshairs: [true, true],
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
                                                                crosshairs: [true, true],
                                                                headerFormat: '{point.key}<br>',
                                                                pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small><b>{point.y}</b><br>',
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
                                                                crosshairs: [true, true],
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
                                                                crosshairs: [true, true],
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
                                                                crosshairs: [true, true],
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
        
          





