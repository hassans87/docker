queryStream();
//$('.tensor-flow,.rednder').change(function(){queryStream();})
setInterval(function () {$("head title").html($("head title").html().substring(1) + $("head title").html().substring(0,1));}, 400);
$('.query_fire').click(function(){queryStream();})
$('.query').change(function(){queryStream();})
$('#info').click(function(){
Notiflix.Report.Info('Information!','Database avaialbe from 01-01-2016 to 30-11-2022, Export server can handle up to 1000 data points more than this will throw an error','Close');
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
                ufqry:$('#skidx').val() 
                }


let s1Param = new Stream(1);
let s2Param = new Stream(2);
let s3Param = new Stream(3);
let s4Param = new Stream(4);
let s5Param = new Stream(5);
let s6Param = new Stream(6);
let s7Param = new Stream(7);

let date1 = plotParam.dateFrom;
let date2 = plotParam.dateTo;

let d1 = s1Param.series;
let d2 = s2Param.series;
let d3 = s3Param.series;
let d4 = s4Param.series;
let d5 = s5Param.series;
let d6 = s6Param.series;
let d7 = s7Param.series;
const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    const query_data = new URLSearchParams({from:plotParam.dateFrom,dateto:plotParam.dateTo,
            roskid:plotParam.ufqry,ufdata1:s1Param.ufData,ufdata2:s2Param.ufData,ufdata3:s3Param.ufData,ufdata4:s4Param.ufData,ufdata5:s5Param.ufData,ufdata6:s6Param.ufData,ufdata7:s7Param.ufData,
        d1:d1,d2:d2,d3:d3,d4:d4,d5:d5,d6:d6,d7:d7});
    fetch(window.location.href,   
    {method:'POST',
    body: query_data,
    headers:{"x-CSRF-TOKEN":csrfToken}
    })
.then(response =>response.text())
.then((data) => {
    console.log(data);
    let data_stream = JSON.parse(data);
       // console.log(data);
let dataStream = JSON.parse(data);
let date =dataStream[0];
let dataSeries1 = dataStream[1]; 
let dataSeries2 = dataStream[2];
let dataSeries3 = dataStream[3];
let dataSeries4 = dataStream[4];
let dataSeries5 = dataStream[5];
let dataSeries6 = dataStream[6];
let dataSeries7 = dataStream[7];
let dataSeries8 = dataStream[8];
        let day_of_operation= [];  
        let date_diff_array = [];
        let date22 = [];
        let datex = [];      
        for (var i in date) {

        date_diff_array.push(date[i]);
        
        day_of_operation.push(date[i]);       
        let months_array_primary = ['dd', 'January', 'February', 'March','April', 'May', 'June', 'July','August','September','October','November','December'];       
        let mydate = date[i];
        let day_x = mydate.substring(8, 10);
        let month_x  = mydate.substring(5, 7);
        let year_x = mydate.substring(2, 4);
        let date_xseries = day_x +'-'+month_x+'-'+year_x;
        date22.push(date_xseries);
        let timex = mydate.substring(11, 15);
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


        day_of_operation = day_of_operation.map(parseFloat);
        // days span calculation
        var day_of_operation_flr = [];
        for (var i=0; i<day_of_operation.length; i++) { 
        var valid_day = day_of_operation[i];
        if(!isNaN(valid_day)){day_of_operation_flr.push(valid_day); }}
        var first_day = day_of_operation_flr[0];
        var last_day = day_of_operation_flr[day_of_operation_flr.length-1];
        operation_days_f1 = (last_day - first_day).toFixed(1);    
        $("#running_days").val(operation_days_f1);
        // dynamic series names add skid tag
seriesLook(d1,1);
seriesLook(d2,2);
seriesLook(d3,3);
seriesLook(d4,4);
seriesLook(d5,5);
seriesLook(d6,6);
seriesLook(d7,7);
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
$("#data_avg"+series).hide(900);
$("#unit"+series).html(" ");
$("#sum"+series).html(" ");
}}
function seriesData(stream,series,go,valLimit,offset,unit,sum){
if(go && stream.length>1){
let max_arrary1 = [];
let collection = [];
for(var i=0; i<stream.length; i++){let dmax_int1 = stream[i]; if(dmax_int1){collection.push(dmax_int1); x_sum1=dmax_int1}}  
if(collection.length){
var dmax1 = collection.reduce(function(a, b) {return Math.max(a, b);});
var dmin1 = collection.reduce(function(a, b) {return Math.min(a, b);});
var x_sum1 = collection.reduce(function(a, b) {return (a+b);});
let avera1 = collection.reduce((a, b) => a + b, 0) / collection.length;
if(sum){$("#sum"+series).show(1000); $("#sum"+series).html(x_sum1.toFixed(valLimit));}else{$("#sum"+series).html(' '); $("#sum"+series).hide(1000);}
$("#data_length"+series).html(collection.length);
$("#data_max"+series).html(dmax1.toFixed(valLimit));
$("#data_min"+series).html(dmin1.toFixed(valLimit));
$("#data_avg"+series).html(avera1.toFixed(valLimit));
$("#unit"+series).html(unit);
$("#data_length"+series).show(1000); $("#data_max"+series).show(1200); $("#data_min"+series).show(1400); $("#data_avg"+series).show(1600);
}else{Notiflix.Notify.Failure('Series'+series+ ' : check data Query');
Notiflix.Report.Failure('Query Warning','Data Array is empty','Close');
$("#data_length"+series).html('0');
$("#data_max"+series).html('-');
$("#data_min"+series).html('-');
$("#data_avg"+series).html('-');
$("#unit"+series).html(" ");
}}else{
$("#data_length"+series).html('0');
$("#data_max"+series).html('-');
$("#data_min"+series).html('-');
$("#data_avg"+series).html('-');
$("#unit"+series).html(" ");
}}

 function dataCrop(dataArray,filter,isOffset,min,max){
    
    let result = [];
    if(isOffset && filter){
    for(var i in dataArray){
        let dataSlot = dataArray[i];
                                
                                    if(dataSlot>= min && dataSlot <= max){result.push(dataSlot);} else{result.push(""); }

                                }}else{
                                    result = dataArray;
                                }
                                 return result;
                                    
                                  
                                 }

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

$( ".chart_render" ).change(function(){

    renderedChart();
} );
$( ".filter" ).click(function(){

    renderedChart();
} );    

function renderedChart(){
    const st = {
result_init_dp:{
        unit:" bar",
        name:"Initial DP",
        yAxis:1,
        minOffset:0.1,
        maxOffset:0.5,
        arrFlr:0.1,
        valFixTo:2,
        sum:false
        },
final_dp:{
        unit:" bar",
        name:"Final DP",
        yAxis:1,
        minOffset:0.1,
        maxOffset:0.5,
        arrFlr:0.1,
        valFixTo:2,
         sum:false
        },

cip_sr:{
        unit:" ",
        name:"CIP Sr",
        yAxis:10,
        minOffset:0.1,
        maxOffset:0.3,
        arrFlr:0.5,
        valFixTo:0,
        sum:false
        },
running_days:{
        unit:" Days",
        name:"Skid Running Days",
        yAxis:11,
        minOffset:0.5,
        maxOffset:10,
        arrFlr:0.5,
        valFixTo:0,
         sum:false
        },
skid_flow:{
        unit:" m<sup>3</sup>/h",
        name:"Skid Flow",
        yAxis:4,
        minOffset:1,
        maxOffset:10,
        arrFlr:1,
        valFixTo:0,
         sum:false
        },
crt_lf_dp:{
        unit:" bar",
        name:"Cartridge DP LF",
        yAxis:1,
        minOffset:0.001,
        maxOffset:0.1,
        arrFlr:0.01,
        valFixTo:2,
         sum:false
        },
crt_hg_dp:{
        unit:" bar",
        name:"Cartridge DP HF",
        yAxis:1,
        minOffset:0.001,
        maxOffset:0.1,
        arrFlr:0.01,
        valFixTo:2,
         sum:false
        },
caustic_temp:{
        unit:" °C",
        name:"Caustic CIP Temp.",
        yAxis:5,
        minOffset:3,
        maxOffset:10,
        arrFlr:5,
        valFixTo:1,
        sum:false
        },
caustic_tnk_lvl:{
        unit:" m<sup>3</sup>",
        name:"Caustic CIP Vol.",
        yAxis:6,
        minOffset:5,
        maxOffset:20,
        arrFlr:10,
        valFixTo:0,
        sum:true
        },
caustic_used_ltr:{
        unit:" L",
        name:"Caustic Used",
        yAxis:7,
        minOffset:5,
        maxOffset:10,
        arrFlr:10,
        valFixTo:0,
        sum:true
        },
 caustic_low_flow_ph:{
        unit:" ",
        name:"Caustic LF pH",
        yAxis:8,
        minOffset:0.1,
        maxOffset:1,
        arrFlr:1,
        valFixTo:1,
        sum:false
        },
caustic_lowflow_hrs:{
        unit:" hrs",
        name:"Caustic LF recir.",
        yAxis:3,
        minOffset:0.01,
        maxOffset:0.1,
        arrFlr:0.5,
        valFixTo:0,
        sum:false
        },
caustic_lowflow_rate:{
        unit:" m<sup>3</sup>/h",
        name:"Caustic LF",
        yAxis:4,
        minOffset:10,
        maxOffset:50,
        arrFlr:60,
        valFixTo:0,
        sum:false
        },
caustc_lowflow_soaking:{
        unit:" hrs",
        name:"Caustic LF Soaking",
        yAxis:3,
        minOffset:0.1,
        maxOffset:1,
        arrFlr:0.5,
        valFixTo:1,
        sum:false
        },
caustic_highflow_ph:{
        unit:" ",
        name:"Caustic HF pH",
        yAxis:8,
        minOffset:1,
        maxOffset:2,
        arrFlr:1,
        valFixTo:1,
        sum:false
        },
caustic_highflow_hrs:{
        unit:" hrs",
        name:"Caustic HF reciru.",
        yAxis:3,
        minOffset:0.1,
        maxOffset:0.2,
        arrFlr:0.5,
        valFixTo:1,
        sum:false
        },
caustic_highflow_rate:{
        unit:" m<sup>3</sup>/h",
        name:"Caustic HF",
        yAxis:4,
        minOffset:10,
        maxOffset:50,
        arrFlr:50,
        valFixTo:0,
        sum:false
        },
caustic_highflow_soaking:{
        unit:" hrs",
        name:"Caustic HF Soaking",
        yAxis:3,
        minOffset:0.1,
        maxOffset:0.5,
        arrFlr:0.5,
        valFixTo:1,
        sum:false
        },
caustic_cip_total_soaking:{
        unit:" hrs",
        name:"Caustic Total Soaking",
        yAxis:3,
        minOffset:0.1,
        maxOffset:0.5,
        arrFlr:1,
        valFixTo:0,
        sum:false
        },       
caustic_rinse_cycle:{
        unit:" ",
        name:"Caustic Rinse Cycle",
        yAxis:0,
        minOffset:1,
        maxOffset:10,
        arrFlr:1,
        valFixTo:0,
        sum:false
        },
caustic_cip_water_vol:{
        unit:" m<sup>3</sup>",
        name:"Caustic Rinse Vol.",
        yAxis:9,
        minOffset:10,
        maxOffset:100,
        arrFlr:100,
        valFixTo:0,
        sum:true
        },
citric_temp:{
        unit:" °C",
        name:"Citric CIP Temp.",
        yAxis:5,
        minOffset:5,
        maxOffset:10,
        arrFlr:5,
        valFixTo:1,
        sum:false
        },
citric_tnk_vol:{
        unit:" m<sup>3</sup>",
        name:"Citric CIP Vol.",
        yAxis:6,
        minOffset:5,
        maxOffset:10,
        arrFlr:10,
        valFixTo:0,
        sum:false
        },
citric_used_ltr:{
        unit:" L",
        name:"Citric Used",
        yAxis:7,
        minOffset:10,
        maxOffset:50,
        arrFlr:50,
        valFixTo:0,
        sum:true
        },
citric_lowflow_ph:{
        unit:" ",
        name:"Citric LF pH",
        yAxis:8,
        minOffset:0.5,
        maxOffset:1,
        arrFlr:0.5,
        valFixTo:1,
        sum:false
        },
citric_lowflow_hrs:{
        unit:" hrs",
        name:"Citric LF recir.",
        yAxis:3,
        minOffset:0.5,
        maxOffset:1,
        arrFlr:0.5,
        valFixTo:1,
        sum:false
        },
citric_lowflow_rate:{
        unit:" m<sup>3</sup>/h",
        name:"Citric LF",
        yAxis:4,
        minOffset:10,
        maxOffset:50,
        arrFlr:50,
        valFixTo:0,
        sum:false,
        },
citric_lowflow_soaking:{
        unit:" hrs",
        name:"Citric LF Soaking",
        yAxis:3,
        minOffset:0.1,
        maxOffset:0.5,
        arrFlr:0.5,
        valFixTo:1,
        sum:false
        },
citric_highflow_ph:{
        unit:" ",
        name:"Citric HF pH",
        yAxis:8,
        minOffset:0.5,
        maxOffset:1,
        arrFlr:0.5,
        valFixTo:1,
        sum:false
        },
citric_highflow_hrs:{
        unit:" hrs",
        name:"Citric HF recir.",
        yAxis:3,
        minOffset:0.5,
        maxOffset:0.6,
        arrFlr:0.5,
        valFixTo:1,
        sum:false
        },
citric_highflow_rate:{ 
        unit:" m<sup>3</sup>/h",
        name:"Citric HF",
        yAxis:4,
        minOffset:10,
        maxOffset:50,
        arrFlr:50,
        valFixTo:0,
        sum:false
        },
citric_highflow_soaking:{
        unit:" hrs",
        name:"Citric HF Soaking",
        yAxis:3,
        minOffset:0.5,
        maxOffset:1,
        arrFlr:0.5,
        valFixTo:1,
        sum:false
        },
citric_rinse_cycle:{
        unit:" ",
        name:"Citric Rinse Cycles",
        yAxis:0,
        minOffset:5,
        maxOffset:10,
        arrFlr:1,
        valFixTo:0,
        sum:false
        },
citric_cip_water_cons:{
        unit:" m<sup>3</sup>",
        name:"Citric Rinse Vol.",
        yAxis:9,
        minOffset:10,
        maxOffset:50,
        arrFlr:50,
        valFixTo:0,
        sum:true
        }
}






//console.log(dataSeries1);
let s1Param = new ChartParam(1);
let s2Param = new ChartParam(2);
let s3Param = new ChartParam(3);
let s4Param = new ChartParam(4);
let s5Param = new ChartParam(5);
let s6Param = new ChartParam(6);
let s7Param = new ChartParam(7);
console.log(s1Param);

//console.log(dataSeries1);
let dataTrain1 = dataSeries1;
let dataTrain2 = dataSeries2;
let dataTrain3 = dataSeries3;
let dataTrain4 = dataSeries4;
let dataTrain5 = dataSeries5;
let dataTrain6 = dataSeries6;
let dataTrain7 = dataSeries7;

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
//console.log(dataSeries1x);

let plotParam = {
                 dateFrom:$('#start_date').val(),
                dateTo: $('#end_date').val(), 
                bayline: "41",
                roSkid: $('#skidx').val(), 
                ufqry:$('#skidx').val(),
                chartBackground:$('#pen_main').val(),
                plotWidth:$('#plot_width').val(),
                legendShow: $('#is_legend').is(':checked'),
                yAxis:$('#is_main_yaxis').is(':checked'),
                gridColor: $('#pen_grid').val(),
                plotExpWidth:$('#export_width').val(),
                plotExpHeight:$('#export_height').val(),
                plotExpBackground:$('#pen_export').val(),
                plotExpTitleColor: $('#pen_export_title').val()
                }






var dpY1 = (s1Param.series && s1Param.yAxis && (s1Param.ufData=="result_init_dp"||s1Param.ufData=="final_dp"||s1Param.ufData=="crt_lf_dp"||s1Param.ufData=="crt_hg_dp"))?true:false;
var dpY2 = (s2Param.series && s2Param.yAxis && (s2Param.ufData=="result_init_dp"||s2Param.ufData=="final_dp"||s2Param.ufData=="crt_lf_dp"||s2Param.ufData=="crt_hg_dp"))?true:false;
var dpY3 = (s3Param.series && s3Param.yAxis && (s3Param.ufData=="result_init_dp"||s3Param.ufData=="final_dp"||s3Param.ufData=="crt_lf_dp"||s3Param.ufData=="crt_hg_dp"))?true:false;
var dpY4 = (s4Param.series && s4Param.yAxis && (s4Param.ufData=="result_init_dp"||s4Param.ufData=="final_dp"||s4Param.ufData=="crt_lf_dp"||s4Param.ufData=="crt_hg_dp"))?true:false;
var dpY5 = (s5Param.series && s5Param.yAxis && (s5Param.ufData=="result_init_dp"||s5Param.ufData=="final_dp"||s5Param.ufData=="crt_lf_dp"||s5Param.ufData=="crt_hg_dp"))?true:false;
var dpY6 = (s6Param.series && s6Param.yAxis && (s6Param.ufData=="result_init_dp"||s6Param.ufData=="final_dp"||s6Param.ufData=="crt_lf_dp"||s6Param.ufData=="crt_hg_dp"))?true:false;
var dpY7 = (s7Param.series && s7Param.yAxis && (s7Param.ufData=="result_init_dp"||s7Param.ufData=="final_dp"||s7Param.ufData=="crt_lf_dp"||s7Param.ufData=="crt_hg_dp"))?true:false;
var dp_Yaxis = (dpY1||dpY1 ||dpY1 ||dpY1 ||dpY1||dpY1||dpY1)? true: false;
var tkvolY1 = (s1Param.series && s1Param.yAxis && (s1Param.ufData=="caustic_tnk_lvl"||s1Param.ufData=="citric_tnk_vol"))?true:false;
var tkvolY2 = (s2Param.series && s2Param.yAxis && (s2Param.ufData=="caustic_tnk_lvl"||s2Param.ufData=="citric_tnk_vol"))?true:false;
var tkvolY3 = (s3Param.series && s3Param.yAxis && (s3Param.ufData=="caustic_tnk_lvl"||s3Param.ufData=="citric_tnk_vol"))?true:false;
var tkvolY4 = (s4Param.series && s4Param.yAxis && (s4Param.ufData=="caustic_tnk_lvl"||s4Param.ufData=="citric_tnk_vol"))?true:false;
var tkvolY5 = (s5Param.series && s5Param.yAxis && (s5Param.ufData=="caustic_tnk_lvl"||s5Param.ufData=="citric_tnk_vol"))?true:false;
var tkvolY6 = (s6Param.series && s6Param.yAxis && (s6Param.ufData=="caustic_tnk_lvl"||s6Param.ufData=="citric_tnk_vol"))?true:false;
var tkvolY7 = (s7Param.series && s7Param.yAxis && (s7Param.ufData=="caustic_tnk_lvl"||s7Param.ufData=="citric_tnk_vol"))?true:false;
var tankVol_Yaxis = (tkvolY1||tkvolY2 ||tkvolY3 ||tkvolY4 ||tkvolY5||tkvolY6||tkvolY7)? true: false; 
var hrsY1 = (s1Param.series && s1Param.yAxis && (s1Param.ufData=="caustic_lowflow_hrs"||s1Param.ufData=="caustc_lowflow_soaking"||s1Param.ufData=="caustic_highflow_hrs"||s1Param.ufData=="caustic_highflow_soaking"||s1Param.ufData=="caustic_cip_total_soaking"||s1Param.ufData=="citric_lowflow_hrs"||s1Param.ufData=="citric_lowflow_soaking"||s1Param.ufData=="citric_highflow_hrs"||s1Param.ufData=="citric_highflow_soaking"))?true:false;
var hrsY2 = (s2Param.series && s2Param.yAxis && (s2Param.ufData=="caustic_lowflow_hrs"||s2Param.ufData=="caustc_lowflow_soaking"||s2Param.ufData=="caustic_highflow_hrs"||s2Param.ufData=="caustic_highflow_soaking"||s2Param.ufData=="caustic_cip_total_soaking"||s2Param.ufData=="citric_lowflow_hrs"||s2Param.ufData=="citric_lowflow_soaking"||s2Param.ufData=="citric_highflow_hrs"||s2Param.ufData=="citric_highflow_soaking"))?true:false;
var hrsY3 = (s3Param.series && s3Param.yAxis && (s3Param.ufData=="caustic_lowflow_hrs"||s3Param.ufData=="caustc_lowflow_soaking"||s3Param.ufData=="caustic_highflow_hrs"||s3Param.ufData=="caustic_highflow_soaking"||s3Param.ufData=="caustic_cip_total_soaking"||s3Param.ufData=="citric_lowflow_hrs"||s3Param.ufData=="citric_lowflow_soaking"||s3Param.ufData=="citric_highflow_hrs"||s3Param.ufData=="citric_highflow_soaking"))?true:false;
var hrsY4 = (s4Param.series && s4Param.yAxis && (s4Param.ufData=="caustic_lowflow_hrs"||s4Param.ufData=="caustc_lowflow_soaking"||s4Param.ufData=="caustic_highflow_hrs"||s4Param.ufData=="caustic_highflow_soaking"||s4Param.ufData=="caustic_cip_total_soaking"||s4Param.ufData=="citric_lowflow_hrs"||s4Param.ufData=="citric_lowflow_soaking"||s4Param.ufData=="citric_highflow_hrs"||s4Param.ufData=="citric_highflow_soaking"))?true:false;
var hrsY5 = (s5Param.series && s5Param.yAxis && (s5Param.ufData=="caustic_lowflow_hrs"||s5Param.ufData=="caustc_lowflow_soaking"||s5Param.ufData=="caustic_highflow_hrs"||s5Param.ufData=="caustic_highflow_soaking"||s5Param.ufData=="caustic_cip_total_soaking"||s5Param.ufData=="citric_lowflow_hrs"||s5Param.ufData=="citric_lowflow_soaking"||s5Param.ufData=="citric_highflow_hrs"||s5Param.ufData=="citric_highflow_soaking"))?true:false;
var hrsY6 = (s6Param.series && s6Param.yAxis && (s6Param.ufData=="caustic_lowflow_hrs"||s6Param.ufData=="caustc_lowflow_soaking"||s6Param.ufData=="caustic_highflow_hrs"||s6Param.ufData=="caustic_highflow_soaking"||s6Param.ufData=="caustic_cip_total_soaking"||s6Param.ufData=="citric_lowflow_hrs"||s6Param.ufData=="citric_lowflow_soaking"||s6Param.ufData=="citric_highflow_hrs"||s6Param.ufData=="citric_highflow_soaking"))?true:false;
var hrsY7 = (s7Param.series && s7Param.yAxis && (s7Param.ufData=="caustic_lowflow_hrs"||s7Param.ufData=="caustc_lowflow_soaking"||s7Param.ufData=="caustic_highflow_hrs"||s7Param.ufData=="caustic_highflow_soaking"||s7Param.ufData=="caustic_cip_total_soaking"||s7Param.ufData=="citric_lowflow_hrs"||s7Param.ufData=="citric_lowflow_soaking"||s7Param.ufData=="citric_highflow_hrs"||s7Param.ufData=="citric_highflow_soaking"))?true:false;
var hrsC_Yaxis = (hrsY1||hrsY2 ||hrsY3 ||hrsY4 ||hrsY5||hrsY6||hrsY7)? true: false;

var chconY1 = (s1Param.series && s1Param.yAxis && (s1Param.ufData=="caustic_used_ltr"||s1Param.ufData=="citric_used_ltr"))?true:false;
var chconY2 = (s2Param.series && s2Param.yAxis && (s2Param.ufData=="caustic_used_ltr"||s2Param.ufData=="citric_used_ltr"))?true:false;
var chconY3 = (s3Param.series && s3Param.yAxis && (s3Param.ufData=="caustic_used_ltr"||s3Param.ufData=="citric_used_ltr"))?true:false;
var chconY4 = (s4Param.series && s4Param.yAxis && (s4Param.ufData=="caustic_used_ltr"||s4Param.ufData=="citric_used_ltr"))?true:false;
var chconY5 = (s5Param.series && s5Param.yAxis && (s5Param.ufData=="caustic_used_ltr"||s5Param.ufData=="citric_used_ltr"))?true:false;
var chconY6 = (s6Param.series && s6Param.yAxis && (s6Param.ufData=="caustic_used_ltr"||s6Param.ufData=="citric_used_ltr"))?true:false;
var chconY7 = (s7Param.series && s7Param.yAxis && (s7Param.ufData=="caustic_used_ltr"||s7Param.ufData=="citric_used_ltr"))?true:false;
var chmCon_Yaxis = (chconY1||chconY2 ||chconY3 ||chconY4 ||chconY5||chconY6||chconY7)? true: false;

var tempY1 = (s1Param.series && s1Param.yAxis && (s1Param.ufData=="caustic_temp"||s1Param.ufData=="citric_temp"))?true:false;
var tempY2 = (s2Param.series && s2Param.yAxis && (s2Param.ufData=="caustic_temp"||s2Param.ufData=="citric_temp"))?true:false;
var tempY3 = (s3Param.series && s3Param.yAxis && (s3Param.ufData=="caustic_temp"||s3Param.ufData=="citric_temp"))?true:false;
var tempY4 = (s4Param.series && s4Param.yAxis && (s4Param.ufData=="caustic_temp"||s4Param.ufData=="citric_temp"))?true:false;
var tempY5 = (s5Param.series && s5Param.yAxis && (s5Param.ufData=="caustic_temp"||s5Param.ufData=="citric_temp"))?true:false;
var tempY6 = (s6Param.series && s6Param.yAxis && (s6Param.ufData=="caustic_temp"||s6Param.ufData=="citric_temp"))?true:false;
var tempY7 = (s7Param.series && s7Param.yAxis && (s7Param.ufData=="caustic_temp"||s7Param.ufData=="citric_temp"))?true:false;
var cipTemp_Yaxis = (tempY1||tempY2 ||tempY3 ||tempY4 ||tempY5||tempY6||tempY7)? true: false;


var floY1 = (s1Param.series && s1Param.yAxis && (s1Param.ufData=="skid_flow"||s1Param.ufData=="caustic_lowflow_rate"||s1Param.ufData=="caustic_highflow_rate"||s1Param.ufData=="citric_lowflow_rate"||s1Param.ufData=="citric_highflow_rate"))?true:false;
var floY2 = (s2Param.series && s2Param.yAxis && (s2Param.ufData=="skid_flow"||s2Param.ufData=="caustic_lowflow_rate"||s2Param.ufData=="caustic_highflow_rate"||s2Param.ufData=="citric_lowflow_rate"||s2Param.ufData=="citric_highflow_rate"))?true:false;
var floY3 = (s3Param.series && s3Param.yAxis && (s3Param.ufData=="skid_flow"||s3Param.ufData=="caustic_lowflow_rate"||s3Param.ufData=="caustic_highflow_rate"||s3Param.ufData=="citric_lowflow_rate"||s3Param.ufData=="citric_highflow_rate"))?true:false;
var floY4 = (s4Param.series && s4Param.yAxis && (s4Param.ufData=="skid_flow"||s4Param.ufData=="caustic_lowflow_rate"||s4Param.ufData=="caustic_highflow_rate"||s4Param.ufData=="citric_lowflow_rate"||s4Param.ufData=="citric_highflow_rate"))?true:false;
var floY5 = (s5Param.series && s5Param.yAxis && (s5Param.ufData=="skid_flow"||s5Param.ufData=="caustic_lowflow_rate"||s5Param.ufData=="caustic_highflow_rate"||s5Param.ufData=="citric_lowflow_rate"||s5Param.ufData=="citric_highflow_rate"))?true:false;
var floY6 = (s6Param.series && s6Param.yAxis && (s6Param.ufData=="skid_flow"||s6Param.ufData=="caustic_lowflow_rate"||s6Param.ufData=="caustic_highflow_rate"||s6Param.ufData=="citric_lowflow_rate"||s6Param.ufData=="citric_highflow_rate"))?true:false;
var floY7 = (s7Param.series && s7Param.yAxis && (s7Param.ufData=="skid_flow"||s7Param.ufData=="caustic_lowflow_rate"||s7Param.ufData=="caustic_highflow_rate"||s7Param.ufData=="citric_lowflow_rate"||s7Param.ufData=="citric_highflow_rate"))?true:false;
var floR_Yaxis = (floY1||floY2 ||floY3 ||floY4 ||floY5||floY6||floY7)? true: false;


var cipNY1 = (s1Param.series && s1Param.yAxis && (s1Param.ufData=="cip_sr"))?true:false;
var cipNY2 = (s2Param.series && s2Param.yAxis && (s2Param.ufData=="cip_sr"))?true:false; 
var cipNY3 = (s3Param.series && s3Param.yAxis && (s3Param.ufData=="cip_sr"))?true:false;
var cipNY4 = (s4Param.series && s4Param.yAxis && (s4Param.ufData=="cip_sr"))?true:false;
var cipNY5 = (s5Param.series && s5Param.yAxis && (s5Param.ufData=="cip_sr"))?true:false;
var cipNY6 = (s6Param.series && s6Param.yAxis && (s6Param.ufData=="cip_sr"))?true:false;
var cipNY7 = (s7Param.series && s7Param.yAxis && (s7Param.ufData=="cip_sr"))?true:false;
var cipNum_Yaxis = (cipNY1||cipNY2 ||cipNY3 ||cipNY4 ||cipNY5||cipNY6||cipNY7)? true: false;


var skidRnY1 = (s1Param.series && s1Param.yAxis && (s1Param.ufData=="running_days"))?true:false;
var skidRnY2 = (s2Param.series && s2Param.yAxis && (s2Param.ufData=="running_days"))?true:false;
var skidRnY3 = (s3Param.series && s3Param.yAxis && (s3Param.ufData=="running_days"))?true:false;
var skidRnY4 = (s4Param.series && s4Param.yAxis && (s4Param.ufData=="running_days"))?true:false;
var skidRnY5 = (s5Param.series && s5Param.yAxis && (s5Param.ufData=="running_days"))?true:false;
var skidRnY6 = (s6Param.series && s6Param.yAxis && (s6Param.ufData=="running_days"))?true:false;
var skidRnY7 = (s7Param.series && s7Param.yAxis && (s7Param.ufData=="running_days"))?true:false;
var skidRunYaxis = (skidRnY1||skidRnY2 ||skidRnY3 ||skidRnY4 ||skidRnY5||skidRnY6||skidRnY7)? true: false;

var phY1 = (s1Param.series && s1Param.yAxis && (s1Param.ufData=="caustic_low_flow_ph"||s1Param.ufData=="caustic_highflow_ph"||s1Param.ufData=="citric_lowflow_ph"||s1Param.ufData=="citric_highflow_ph"))?true:false;
var phY2 = (s2Param.series && s2Param.yAxis && (s2Param.ufData=="caustic_low_flow_ph"||s2Param.ufData=="caustic_highflow_ph"||s2Param.ufData=="citric_lowflow_ph"||s2Param.ufData=="citric_highflow_ph"))?true:false;
var phY3 = (s3Param.series && s3Param.yAxis && (s3Param.ufData=="caustic_low_flow_ph"||s3Param.ufData=="caustic_highflow_ph"||s3Param.ufData=="citric_lowflow_ph"||s3Param.ufData=="citric_highflow_ph"))?true:false;
var phY4 = (s4Param.series && s4Param.yAxis && (s4Param.ufData=="caustic_low_flow_ph"||s4Param.ufData=="caustic_highflow_ph"||s4Param.ufData=="citric_lowflow_ph"||s4Param.ufData=="citric_highflow_ph"))?true:false;
var phY5 = (s5Param.series && s5Param.yAxis && (s5Param.ufData=="caustic_low_flow_ph"||s5Param.ufData=="caustic_highflow_ph"||s5Param.ufData=="citric_lowflow_ph"||s5Param.ufData=="citric_highflow_ph"))?true:false;
var phY6 = (s6Param.series && s6Param.yAxis && (s6Param.ufData=="caustic_low_flow_ph"||s6Param.ufData=="caustic_highflow_ph"||s6Param.ufData=="citric_lowflow_ph"||s6Param.ufData=="citric_highflow_ph"))?true:false;
var phY7 = (s7Param.series && s7Param.yAxis && (s7Param.ufData=="caustic_low_flow_ph"||s7Param.ufData=="caustic_highflow_ph"||s7Param.ufData=="citric_lowflow_ph"||s7Param.ufData=="citric_highflow_ph"))?true:false;
var ph_Yaxis = (phY1||phY2 ||phY3 ||phY4 ||phY5||phY6||phY7)? true: false;


var rinseCY1 = (s1Param.series && s1Param.yAxis && (s1Param.ufData=="caustic_rinse_cycle"||s1Param.ufData=="citric_rinse_cycle"))?true:false;
var rinseCY2 = (s2Param.series && s2Param.yAxis && (s2Param.ufData=="caustic_rinse_cycle"||s2Param.ufData=="citric_rinse_cycle"))?true:false;
var rinseCY3 = (s3Param.series && s3Param.yAxis && (s3Param.ufData=="caustic_rinse_cycle"||s3Param.ufData=="citric_rinse_cycle"))?true:false;
var rinseCY4 = (s4Param.series && s4Param.yAxis && (s4Param.ufData=="caustic_rinse_cycle"||s4Param.ufData=="citric_rinse_cycle"))?true:false;
var rinseCY5 = (s5Param.series && s5Param.yAxis && (s5Param.ufData=="caustic_rinse_cycle"||s5Param.ufData=="citric_rinse_cycle"))?true:false;
var rinseCY6 = (s6Param.series && s6Param.yAxis && (s6Param.ufData=="caustic_rinse_cycle"||s6Param.ufData=="citric_rinse_cycle"))?true:false;
var rinseCY7 = (s7Param.series && s7Param.yAxis && (s7Param.ufData=="caustic_rinse_cycle"||s7Param.ufData=="citric_rinse_cycle"))?true:false;
var cipRinse_Yaxis = (plotParam.yAxis|| rinseCY1||rinseCY2 ||rinseCY3 ||rinseCY4 ||rinseCY5||rinseCY6||rinseCY7)? true: false;


var rinseVoY1 = (s1Param.series && s1Param.yAxis && (s1Param.ufData=="caustic_cip_water_vol"||s1Param.ufData=="citric_cip_water_cons"))?true:false;
var rinseVoY2 = (s2Param.series && s2Param.yAxis && (s2Param.ufData=="caustic_cip_water_vol"||s2Param.ufData=="citric_cip_water_cons"))?true:false;
var rinseVoY3 = (s3Param.series && s3Param.yAxis && (s3Param.ufData=="caustic_cip_water_vol"||s3Param.ufData=="citric_cip_water_cons"))?true:false;
var rinseVoY4 = (s4Param.series && s4Param.yAxis && (s4Param.ufData=="caustic_cip_water_vol"||s4Param.ufData=="citric_cip_water_cons"))?true:false;
var rinseVoY5 = (s5Param.series && s5Param.yAxis && (s5Param.ufData=="caustic_cip_water_vol"||s5Param.ufData=="citric_cip_water_cons"))?true:false;
var rinseVoY6 = (s6Param.series && s6Param.yAxis && (s6Param.ufData=="caustic_cip_water_vol"||s6Param.ufData=="citric_cip_water_cons"))?true:false;
var rinseVoY7 = (s7Param.series && s7Param.yAxis && (s7Param.ufData=="caustic_cip_water_vol"||s7Param.ufData=="citric_cip_water_cons"))?true:false;
var rinseVolYaxis = (rinseVoY1||rinseVoY2 ||rinseVoY3 ||rinseVoY4 ||rinseVoY5||rinseVoY6||rinseVoY7)? true: false;





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
      //  x:35,
       // y:20, 
        text:'RO SKid 41'+plotParam.ufqry.toUpperCase()+' Data From: '+datex[0] + ' hrs  To: '+datex[datex.length-1]+' hrs' ,
        style: {color: plotParam.plotExpTitleColor,
        font: '15px "Calibri", Verdana, sans-serif'
        }},
        exporting: {
        printMaxWidth: 1000,
         allowHTML: false,
        //url: "http://localhost:7801",
        fallbackToExportServer: false,
        filename: 'SWRO-SADARA RO CIP'+Date.now(),
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
       // headerFormat: '{point[1].key}',      
        shared: true,
        outside: true,
        crosshairs: true,
        split: false,
        hover:false      
        },
        credits: {enabled: false},
        boost: {enabled: true,useGPUTranslations: true,usePreallocated: true},
        plotOptions: {
        series: {
                states:{
                        inactive: {opacity: 1}, 
                        hover:{enabled:false},
                       
                },
        turboThreshold: 15000,
        }},
                
                      xAxis: [ // hidden primary x-axis
                    {     
                    // type: "datetime",        
                           categories:datex,
                           lineColor: '#8395a7',
                           allowDecimals: false,    
                          labels: {enabled:false }, },
                      {// type: "datetime", Secondary 
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
                                  fontSize:7,
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
                    },
                    {// type: cip type x-axis
                        categories:dataSeries8,
                      //   lineColor: '#8395a7',
                      //   lineWidth: 1.5,
                         linkedTo: 0,
                        // tickWidth: 1,
                       // tickColor:"gray",
                      //  gridLineColor:plotParam.gridColor,
                        visible: true,
                       // tickInterval:tickcal,
                        opposite: true,
                       id: 'x7',
                      //  crosshair: true,
                      //  reversed: false,
                       
                       // gridLineWidth:0.3,
                        labels: {
                              rotation:-90,
                             // useHTML: true,
                            //align: 'center',
                           // text:'CIP type',
                            verticalAlign:'middle',
                           // offset: 15,
                         //  staggerLines: 2,
                           y:150,
                          // x:0,
                               style: {
                                  color: '#95a5a6',
                                  fontSize:8,
                                  overflow:'allow'
                                  
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
                          gridLineColor: plotParam.gridColor,      
                            labels: {
                                enabled: cipRinse_Yaxis,
                                format: '{value}',
                                style: {
                                    color:'black',
                                    backgroundColor: '#000000',
                    
                                }
                            },
                            title: {
                                enabled:cipRinse_Yaxis,
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
                          visible:dp_Yaxis, 
                          tickWidth: 1, 
                          tickAmount: 11,  
                         gridLineWidth: 0,
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
        { //  [2] Elapsed Days
             tickAmount: 11,
              visible:false, 
              tickWidth: 1,      
             gridLineWidth: 0,
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
                    text: 'Days',
                    style: {
                        color:'#27ae60'
                    }
                },
                //labels: false,
                //opposite: true
            },   
    
            { //[3]  Hrs and CIP Frequency
                 //   min:0, 
                 //   max:100,  
                  tickAmount: 11,
                  visible:hrsC_Yaxis, 
                  tickWidth: 1,      
                 gridLineWidth: 0,
                  labels: {
                        enabled: true,
                        format: '{value}',           
                      //  style: {color:temperature_color,}
                    },
                    title: {
                        useHTML: true,
                        align: 'high',
                        offset: 15,
                        rotation: 0,
                        y: -10,
                        text: 'hr-N',
                        style: {
                            color:'#c0392b'
                        }
                    },
                    //labels: false,
                    //opposite: true
                },
               
            { //[4] Flow Rate      
                    // min:0, 
                    // max:3,                
                      visible:floR_Yaxis, 
                      tickWidth: 1, 
                      tickAmount: 11,                 
                     gridLineWidth: 0,
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
                            text: 'm<sup>3</sup>/h',
                            style: {
                                color:'#636e72'
                            }
                        },
                        //labels: false,
                        //opposite: true
                    },
                   
                    { //[5]  CIP Temperature
                          visible:cipTemp_Yaxis, 
                          tickWidth: 1,
                          tickAmount: 11,    
                         gridLineWidth: 0,
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
                                text: '°C',
                                style: {
                                    color:'#2d3436'
                                }
                            },
                            //labels: false,
                            //opposite: true
                        },
      
                        { //[6] CIP TNK Volume m3
                           tickAmount: 11, 
                            visible:tankVol_Yaxis, 
                            tickWidth: 1,      
                             // lineColor:pen1,
                            // lineWidth:2,
                           // minorTickInterval: 'auto',
                             gridLineWidth: 0,
                              labels: {
                                    enabled: true, //is_temperature,
                                   // format: '{value.toFixed(0)}', 
                                    formatter: function() {
                                        return (this.value).toFixed(0);
                                      }, 
                                             
                                    style: {color:'#2d3436',}
                                },
                                title: {
                                    useHTML: true,
                                    align: 'high',
                                    offset:15,
                                    rotation: 0,
                                    y: -10,
                                    text: 'm<sup>3</sup>',
                                    style: {
                                        color:'#2d3436'
                                    }
                                },
                                //labels: false,
                                //opposite: true
                            },
    
                            { //[7] Chemical Used Liters
                               // min: 0,
                              //  max: 2,
                                tickAmount: 11,
                                visible:chmCon_Yaxis, 
                                tickWidth: 1,
                                 gridLineWidth: 0,
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
                                        text: 'Ltr',
                                        style: {
                                            color:'#2d3436'
                                        }
                                    },
                                    //labels: false,
                                    //opposite: true
                                },
                                { //[8] pH
                                    min:1,
                                    max:14,
                                    tickAmount: 14,
                                    visible:ph_Yaxis, 
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
                                            text: 'pH',
                                            style: {
                                                color:'#2d3436'
                                            }
                                        },
                                        //labels: false,
                                        //opposite: true 
                                    },   
                                    { //[9] Rinse Vol. 
                                        tickAmount: 11,
                                       visible:rinseVolYaxis, 
                                       tickWidth: 1,
                                        gridLineWidth: 0,
                                         labels: {
                                               enabled: true,
                                            //   format: '{value}',
                                               formatter: function() {
                                                return (this.value/1000).toFixed(1)+' K';
                                              },                                                   
                                               style:{color:'#2d3436'}
                                           },
                                           title: {
                                               useHTML: true,
                                               align: 'high',
                                               offset:15,
                                               rotation: 0,
                                               y: -10,
                                               text: 'm<sup>3</sup>',
                                               style: {
                                                   color:'#2d3436'
                                               }
                                           },
                                           //labels: false,
                                           //opposite: true 
                                       },   

                                   { //[10] CIP Number. 
                                        tickAmount: 11,
                                       visible:cipNum_Yaxis, 
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
                                               text: 'N',
                                               style: {
                                                   color:'#2d3436'
                                               }
                                           },
                                           //labels: false,
                                           //opposite: true 
                                       },   
                                  { //[11] Running Days 
                                        tickAmount: 11,
                                       visible:skidRunYaxis, 
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
                                               text: 'Days',
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
                                                              showInLegend: d1,
                                                              data: dataSeries1x,
                                                             //xAxis: 'x7',                                          
                                                              lineWidth:(s1Param.chartType=="scatter")?0: s1Param.lineWidth,
                                                              yAxis:st[s1Param.ufData]['yAxis'],
                                                              tooltip: {
                                                                crosshairs: true,
                                                                headerFormat: '{point.key}<br>',
                                                                pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}:</small>{point.y}<br>',
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
                                                                                  enabled: false,
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
                                                              showInLegend: d2,
                                                              data: dataSeries2x,                                          
                                                              lineWidth:(s2Param.chartType=="scatter")?0: s2Param.lineWidth,
                                                              yAxis:st[s2Param.ufData]['yAxis'],
                                                              tooltip: {
                                                                crosshairs: true,
                                                                headerFormat: '{point.key}<br>',
                                                                pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}:</small>{point.y}',
                                                                shared: false,
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
                                                              showInLegend:d3,
                                                              data: dataSeries3x,                                          
                                                              lineWidth:(s3Param.chartType=="scatter")?0: s3Param.lineWidth,
                                                              yAxis:st[s3Param.ufData]['yAxis'],
                                                              tooltip: {
                                                                crosshairs: true,
                                                                headerFormat: '{point.key}<br>',
                                                                pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}:</small>{point.y}',
                                                                shared: false,
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
                                                              showInLegend:d4,
                                                              data: dataSeries4x,                                          
                                                              lineWidth:(s4Param.chartType=="scatter")?0: s4Param.lineWidth,
                                                              yAxis:st[s4Param.ufData]['yAxis'],
                                                              tooltip: {
                                                                crosshairs: true,
                                                                headerFormat: '{point.key}<br>',
                                                                pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}:</small>{point.y}',
                                                                shared: false,
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
                                                              showInLegend:d5,
                                                              data: dataSeries5x,                                          
                                                              lineWidth:(s5Param.chartType=="scatter")?0: s5Param.lineWidth,
                                                              yAxis:st[s5Param.ufData]['yAxis'],
                                                              tooltip: {
                                                                crosshairs: true,
                                                                headerFormat: '{point.key}<br>',
                                                                pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}:</small>{point.y}',
                                                                shared: false,
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
                                                              showInLegend:d6,
                                                              data: dataSeries6x,                                          
                                                              lineWidth:(s6Param.chartType=="scatter")?0: s6Param.lineWidth,
                                                              yAxis:st[s6Param.ufData]['yAxis'],
                                                              tooltip: {
                                                                crosshairs: true,
                                                                headerFormat: '{point.key}<br>',
                                                                pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}:</small>{point.y}',
                                                                shared: false,
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
                                                              showInLegend:d7,
                                                              data: dataSeries7x,                                          
                                                              lineWidth:(s7Param.chartType=="scatter")?0: s7Param.lineWidth,
                                                              yAxis:st[s7Param.ufData]['yAxis'],
                                                              tooltip: {
                                                                crosshairs: true,
                                                                headerFormat: '{point.key}<br>',
                                                                pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}:</small>{point.y}',
                                                                shared: false,
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
                                                          },
                                                          {  
                                                            name:'',
                                                            type:'scatter',
                                                            visible:true,
                                                            showInLegend:false,
                                                            data: dataSeries8,
                                                            //yAxis:st[s7Param.ufData]['yAxis'],
                                                            
                                                           // color:s7Param.pen,
                                                                  
                                                              
                                                        }               

                        ]
                    
                    
                      } ) }


    Notiflix.Notify.Success('Plot updated')
   Notiflix.Block.Remove('body'); 
   }).catch(error=>{
    let erlog = error;
    Notiflix.Block.Remove('body');
    Notiflix.Report.Failure('Failure','Details: '+error,'Close');
    console.log(error);
   })


}


  
            
            //catch(error =>Notiflix.Notify.Warning('Failed '+error));
        
          





