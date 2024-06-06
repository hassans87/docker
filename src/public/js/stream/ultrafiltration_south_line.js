queryStream();
//$('.tensor-flow,.rednder').change(function(){queryStream();})
setInterval(function () {$("head title").html($("head title").html().substring(1) + $("head title").html().substring(0,1));}, 400);
$('.query_fire').click(function(){queryStream();})
$('.apply_filter').click(function(){queryStream();})
$('.filtercheck').click(function(){enableFilter();})
$('.query').change(function(){
        //queryStream();
//Notiflix.Notify.Info('Changes detected, Press Query Button to apply'); 
})

//buttons query selector
// skid data
$(".short_cut").click(function () {
  let ssd = this.id;
  $(".short_cut").removeClass("btn-danger").addClass("badge-light3d");
  $(".short_cutx").removeClass("btn-danger").addClass("badge-light3d");
  $(".short_cutxa").removeClass("btn-danger").addClass("badge-light3d");
  $(".short_cutxb").removeClass("btn-danger").addClass("badge-light3d");
  $(this).removeClass('badge-light3d').addClass('btn-danger');
  ufShortCut(ssd);
});
// average data trend
$(".short_cutx").click(function () {
  $(".short_cut").removeClass("btn-danger").addClass("badge-light3d");
  $(".short_cutxa").removeClass("btn-danger").addClass("badge-light3d");
  $(".short_cutxb").removeClass("btn-danger").addClass("badge-light3d");
  $( this ).removeClass('badge-light3d').addClass('btn-danger');
  avgData();
});
// feed water quality button
$(".short_cutxa").click(function () {
  $(".short_cut").removeClass("btn-danger").addClass("badge-light3d");
  $(".short_cutx").removeClass("btn-danger").addClass("badge-light3d");
  $(".short_cutxb").removeClass("btn-danger").addClass("badge-light3d");
  $( this ).removeClass('badge-light3d').addClass('btn-danger');
  ufInletQC();
});
// skid operation flow number of skids etc
$(".short_cutxb").click(function () {
  $(".short_cut").removeClass("btn-danger").addClass("badge-light3d");
  $(".short_cutx").removeClass("btn-danger").addClass("badge-light3d");
  $(".short_cutxa").removeClass("btn-danger").addClass("badge-light3d");
  $( this ).removeClass('badge-light3d').addClass('btn-danger');
  skidsOperation();
});
function ufShortCut(tag) {
  $("#line1").prop("checked", true);
  $("#line2").prop("checked", true);
  $("#line3").prop("checked", true);
  $("#line4").prop("checked", false);
  $("#line5").prop("checked", false);
  $("#line6").prop("checked", false);
  $("#line7").prop("checked", false);
  $("#alpha1 option[value="+tag+"").prop("selected", true);
  $("#alpha2 option[value="+tag+"").prop("selected", true);
  $("#alpha3 option[value="+tag+"").prop("selected", true);
  $("#ufdata1 option[value=permeability").prop("selected", true);
  $("#ufdata2 option[value=flux").prop("selected", true);
  $("#ufdata3 option[value=tmp").prop("selected", true);
  $("#chart_type1 option[value=scatter]").prop("selected", true);
  $("#chart_type2 option[value=scatter]").prop("selected", true);
  $("#chart_type3 option[value=scatter]").prop("selected", true);
  $("#pen1").attr("value", "#0652DD");
  $("#pen2").attr("value", "#44bd32");
  $("#pen3").attr("value", "#e84118");
  $("#chr_title").attr("value", "UF North Average");
  queryStream();
}
function avgData() {
  $("#line1").prop("checked", false);
  $("#line2").prop("checked", false);
  $("#line3").prop("checked", false);
  $("#line4").prop("checked", false);
  $("#line5").prop("checked", true);
  $("#line6").prop("checked", true);
  $("#line7").prop("checked", true);
  $("#ufdata5 option[value=avg_permeability").prop("selected", true);
  $("#ufdata6 option[value=avg_flux").prop("selected", true);
  $("#ufdata7 option[value=avg_tmp").prop("selected", true);
  $("#chart_type1 option[value=scatter]").prop("selected", true);
  $("#chart_type2 option[value=scatter]").prop("selected", true);
  $("#chart_type3 option[value=scatter]").prop("selected", true);
  $("#pen5").attr("value", "#0652DD");
  $("#pen6").attr("value", "#44bd32");
  $("#pen7").attr("value", "#e84118");
  $("#line_width1").attr("value", "0.7");
  $("#line_width2").attr("value", "0.7");
  $("#chr_title").attr("value", "UF Skid Performance");
  queryStream();
}
function ufInletQC() {
  $("#line1").prop("checked", false);
  $("#line2").prop("checked", false);
  $("#line3").prop("checked", false);
  $("#line4").prop("checked", false);
  $("#line5").prop("checked", true);
  $("#line6").prop("checked", true);
  $("#line7").prop("checked", true);
  $("#ufdata5 option[value=turbidity").prop("selected", true);
  $("#ufdata6 option[value=frc").prop("selected", true);
  $("#ufdata7 option[value=uv_254").prop("selected", true);
  $("#chart_type5 option[value=scatter]").prop("selected", true);
  $("#chart_type6 option[value=scatter]").prop("selected", true);
  $("#chart_type7 option[value=scatter]").prop("selected", true);
  $("#pen5").attr("value", "#fa8231");
  $("#pen6").attr("value", "#44bd32");
  $("#pen7").attr("value", "#c56cf0");
  $("#line_width1").attr("value", "0.7");
  $("#line_width2").attr("value", "0.7");
  $("#chr_title").attr("value", "UF Feed Water Quality");
  queryStream();
}
function skidsOperation() {
  $("#line1").prop("checked", false);
  $("#line2").prop("checked", false);
  $("#line3").prop("checked", false);
  $("#line4").prop("checked", false);
  $("#line5").prop("checked", true);
  $("#line6").prop("checked", true);
  $("#line7").prop("checked", false);
  $("#ufdata5 option[value=n_skids").prop("selected", true);
  $("#ufdata6 option[value=online_skids_flow").prop("selected", true);
  $("#chart_type5 option[value=scatter]").prop("selected", true);
  $("#chart_type6 option[value=scatter]").prop("selected", true);
  $("#pen5").attr("value", "#fa8231");
  $("#pen6").attr("value", "#44bd32");
  $("#line_width1").attr("value", "0.7");
  $("#line_width2").attr("value", "0.7");
  $("#chr_title").attr("value", "UF Skids Flow");
  queryStream();
}



// constructor function 
function Stream(target){
    this.series = $('#line'+target).is(':checked');
    this.ufGroup ="32";
    this.ufSkid = $('#alpha'+target).val();
    this.ufData = $('#ufdata'+target).val();
}
function ChartParam(target){
                    this.series = $('#line'+target).is(':checked');
                    this.ufGroup ="32";
                    this.ufSkid = $('#alpha'+target).val();
                    this.ufData = $('#ufdata'+target).val();
                    this.pen = $('#pen'+target).val();
                    this.isOff = $('#isOffset'+target).is(':checked');
                    this.lable = $('#dt_label'+target).is(':checked');
                    this.yAxis = $('#y_axis'+target).is(':checked');
                    this.chartType = $('#chart_type'+target).val();
                    this.lineWidth = parseFloat($('#line_width'+target).val());
                    this.markerWeight =  parseFloat($('#marker'+target).val());
                    this.markerShape = $('#marker_shape'+target).val();
                    this.offSetMin = parseFloat($('#offsetmin'+target).val());
                    this.offSetMax = parseFloat($('#offsetmax'+target).val());
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



function enableFilter(){
if($('#isOffset1').is(':checked')){$('#offsetmin1').prop("disabled",false); $('#offsetmax1').prop("disabled",false); $('#fltr1').prop("disabled",false);}
else{$('#offsetmin1').prop( "disabled",true); $('#offsetmax1').prop("disabled",true); $('#fltr1').prop("disabled",true);}
if($('#isOffset2').is(':checked')){$('#offsetmin2').prop("disabled",false); $('#offsetmax2').prop("disabled",false); $('#fltr2').prop("disabled",false);}
else{$('#offsetmin2').prop( "disabled",true); $('#offsetmax2').prop("disabled",true); $('#fltr2').prop("disabled",true);}
if($('#isOffset3').is(':checked')){$('#offsetmin3').prop("disabled",false); $('#offsetmax3').prop("disabled",false); $('#fltr3').prop("disabled",false);}
else{$('#offsetmin3').prop( "disabled",true); $('#offsetmax3').prop("disabled",true); $('#fltr3').prop("disabled",true);}
if($('#isOffset4').is(':checked')){$('#offsetmin4').prop("disabled",false); $('#offsetmax4').prop("disabled",false); $('#fltr4').prop("disabled",false);}
else{$('#offsetmin4').prop( "disabled",true); $('#offsetmax4').prop("disabled",true); $('#fltr4').prop("disabled",true);}
if($('#isOffset5').is(':checked')){$('#offsetmin5').prop("disabled",false); $('#offsetmax5').prop("disabled",false); $('#fltr5').prop("disabled",false);}
else{$('#offsetmin5').prop( "disabled",true); $('#offsetmax5').prop("disabled",true); $('#fltr5').prop("disabled",true);}
if($('#isOffset6').is(':checked')){$('#offsetmin6').prop("disabled",false); $('#offsetmax6').prop("disabled",false); $('#fltr6').prop("disabled",false);}
else{$('#offsetmin6').prop( "disabled",true); $('#offsetmax6').prop("disabled",true); $('#fltr6').prop("disabled",true);}
if($('#isOffset7').is(':checked')){$('#offsetmin7').prop("disabled",false); $('#offsetmax7').prop("disabled",false); $('#fltr7').prop("disabled",false);}
else{$('#offsetmin7').prop( "disabled",true); $('#offsetmax7').prop("disabled",true); $('#fltr7').prop("disabled",true);}
}


$('.tensor-flow,.rednder').change(function(){
    let fx1 = $('#start_date').val();
    let fx2 = $('#end_date').val();
let query_days_calc = getNumberOfDays(fx1,fx2);
if(query_days_calc >300){
    $( ".query_fire" ).prop( "disabled", true); 
    $(".query_fire").removeClass("btn-light") .addClass("btn-danger");
    Notiflix.Notify.Failure('Reduce query dates, max 600 days'); 
    Notiflix.Report.Failure('Query Warning','max 300 days query allowed at once, server memory get exhausted due to huge data ','Close');
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
                dataInvt: $('#invt').val()

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
const query_data = new URLSearchParams({from:plotParam.dateFrom,dateto:plotParam.dateTo,dtinvt:plotParam.dataInvt,
         skid1:s1Param.ufSkid, ufdata1:s1Param.ufData,
         skid2:s2Param.ufSkid, ufdata2:s2Param.ufData,
         skid3:s3Param.ufSkid, ufdata3:s3Param.ufData,
         skid4:s4Param.ufSkid, ufdata4:s4Param.ufData,
         skid5:s5Param.ufSkid, ufdata5:s5Param.ufData, ufdata6:s6Param.ufData, ufdata7:s7Param.ufData,
         ufGroup:s1Param.ufGroup,
        d1:d1,d2:d2,d3:d3,d4:d4,d5:d5,d6:d6,
d7:d7});
fetch(window.location.href,    
  {method:'POST',
  body:query_data,
  headers:{"x-CSRF-TOKEN":csrfToken}
  })
.then(response =>response.text())
.then((data) => {
    //console.log(data);
        let dataStream = JSON.parse(data);
        let date =dataStream[0];
        let dataSeries1 = dataStream[1]; 
        let dataSeries2 = dataStream[2];
        let dataSeries3 = dataStream[3];
        let dataSeries4 = dataStream[4];
        let dataSeries5 = dataStream[5];
        let dataSeries6 = dataStream[6];
        let dataSeries7 = dataStream[7];




enableFilter();
 


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
 

function seriesLook(dv,series){
if(dv){
$("#pen"+series).show(900);
$("#alpha"+series).show(900);
$("#ufdata"+series).show(1200);
$("#panel"+series).show(900);
$("#data_length"+series).show(900); 
$("#data_max"+series).show(900); 
$("#data_min"+series).show(900); 
$("#data_avg"+series).show(900);
$(".tr"+series).addClass("table-light").removeClass("table-secondary");
}else{
$("#pen"+series).hide(900);
$("#alpha"+series).hide(900);
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
//Notiflix.Report.Failure('Query Warning','Data Array is empty','Close');
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
//$( ".filter" ).click(function(){renderedChart();});
function renderedChart(){
    const st = {
permeability:{
        unit:" lmh/b",
        name:"Permeability",
        yAxis:1,
        minOffset:1,
        maxOffset:10,
        arrFlr:10,
        valFixTo:0
        },
tmp:{
        unit:" Bar",
        name:"TMP",
        yAxis:2,
        minOffset:-4,
        maxOffset:4,
        arrFlr:0.001,
        valFixTo:2
        },
flux:{
        unit:" lmh",
        name:"Flux",
        yAxis:5,
        minOffset:10,
        maxOffset:80,
        arrFlr:5,
        valFixTo:1
        },
pcv:{
        unit:" %",
        name:"PCV",
        yAxis:3,
        minOffset:10,
        maxOffset:100,
        arrFlr:5,
        valFixTo:0
        },
bw_counter:{
        unit:' ',
        name:"BW Counter",
        yAxis:0,
        minOffset:0,
        maxOffset:30,
        arrFlr:0.5,
        valFixTo:0
        },
turbidity:{
        unit:' NTU',
        name:"Turbidity",
        yAxis:4,
        minOffset:1,
        maxOffset:15,
        arrFlr:0.01,
        valFixTo:2
},
uv_254:{
        unit:' uv254/m',
        name:"UV",
        yAxis:6,
        minOffset:1,
        maxOffset:15,
        arrFlr:0.01,
        valFixTo:2
},
frc:{
        unit:' ppm',
        name:"FRC",
        yAxis:7,
        minOffset:0.1,
        maxOffset:5,
        arrFlr:0.001,
        valFixTo:2
},
online_skids_flow:{
        unit:' m3/h',
        name:"Total Flow",
        yAxis:8,
        minOffset:10,
        maxOffset:25000,
        arrFlr:100,
        valFixTo:0
},
n_skids:{
        unit:' ',
        name:"Skids in operation",
        yAxis:0,
        minOffset:0,
        maxOffset:30,
        arrFlr:1,
        valFixTo:0
},
avg_permeability:{
        unit:" lmh/b",
        name:"Avg. Permeability",
        yAxis:1,
        minOffset:1,
        maxOffset:10,
        arrFlr:10,
        valFixTo:0
},
avg_flux:{
        unit:" lmh",
        name:"Avg. Flux",
        yAxis:5,
        minOffset:10,
        maxOffset:80,
        arrFlr:5,
        valFixTo:1
},
avg_tmp:{
        unit:" Bar",
        name:"Avg. TMP",
        yAxis:2,
        minOffset:-4,
        maxOffset:4,
        arrFlr:0.001,
        valFixTo:2
}}
let s1Param = new ChartParam(1);
let s2Param = new ChartParam(2);
let s3Param = new ChartParam(3);
let s4Param = new ChartParam(4);
let s5Param = new ChartParam(5);
let s6Param = new ChartParam(6);
let s7Param = new ChartParam(7);
seriesLook(d1,1);
seriesLook(d2,2);
seriesLook(d3,3);
seriesLook(d4,4);
seriesLook(d5,5);
seriesLook(d6,6);
seriesLook(d7,7);
let dataSeries1x = dataCrop(dataSeries1,s1Param.series,s1Param.isOff,s1Param.offSetMin ,s1Param.offSetMax);
let dataSeries2x = dataCrop(dataSeries2,s2Param.series,s2Param.isOff,s2Param.offSetMin ,s2Param.offSetMax);
let dataSeries3x = dataCrop(dataSeries3,s3Param.series,s3Param.isOff,s3Param.offSetMin ,s3Param.offSetMax);
let dataSeries4x = dataCrop(dataSeries4,s4Param.series,s4Param.isOff,s4Param.offSetMin ,s4Param.offSetMax);
let dataSeries5x = dataCrop(dataSeries5,s5Param.series,s5Param.isOff,s5Param.offSetMin ,s5Param.offSetMax);
let dataSeries6x = dataCrop(dataSeries6,s6Param.series,s6Param.isOff,s6Param.offSetMin ,s6Param.offSetMax);
let dataSeries7x = dataCrop(dataSeries7,s7Param.series,s7Param.isOff,s7Param.offSetMin ,s7Param.offSetMax);
seriesData(dataSeries1x,1,s1Param.series,st[s1Param.ufData]['valFixTo'],st[s1Param.ufData]['arrFlr'],st[s1Param.ufData]['unit'],s1Param.isOff,s1Param.offSetMin ,s1Param.offSetMax);
seriesData(dataSeries2x,2,s2Param.series,st[s2Param.ufData]['valFixTo'],st[s2Param.ufData]['arrFlr'],st[s2Param.ufData]['unit'],s2Param.isOff,s2Param.offSetMin ,s2Param.offSetMax);
seriesData(dataSeries3x,3,s3Param.series,st[s3Param.ufData]['valFixTo'],st[s3Param.ufData]['arrFlr'],st[s3Param.ufData]['unit'],s3Param.isOff,s3Param.offSetMin ,s3Param.offSetMax);
seriesData(dataSeries4x,4,s4Param.series,st[s4Param.ufData]['valFixTo'],st[s4Param.ufData]['arrFlr'],st[s4Param.ufData]['unit'],s4Param.isOff,s4Param.offSetMin ,s4Param.offSetMax);
seriesData(dataSeries5x,5,s5Param.series,st[s5Param.ufData]['valFixTo'],st[s5Param.ufData]['arrFlr'],st[s5Param.ufData]['unit'],s5Param.isOff,s5Param.offSetMin ,s5Param.offSetMax);
seriesData(dataSeries6x,6,s6Param.series,st[s6Param.ufData]['valFixTo'],st[s6Param.ufData]['arrFlr'],st[s6Param.ufData]['unit'],s6Param.isOff,s6Param.offSetMin ,s6Param.offSetMax);
seriesData(dataSeries7x,7,s7Param.series,st[s7Param.ufData]['valFixTo'],st[s7Param.ufData]['arrFlr'],st[s7Param.ufData]['unit'],s7Param.isOff,s7Param.offSetMin ,s7Param.offSetMax);

//console.log(dataSeries1);
let plotParam = {
                 dateFrom:$('#start_date').val(),
                dateTo: $('#end_date').val(),            
                chartBackground:$('#pen_main').val(),
                plotWidth:screen.availWidth * 0.95,
                legendShow: $('#is_legend').is(':checked'),
                yAxis:$('#is_main_yaxis').is(':checked'),
                gridColor: $('#pen_grid').val(),
                plotExpWidth:$('#export_width').val(),
                plotExpHeight:$('#export_height').val(),
                plotExpBackground:$('#pen_export').val(),
                plotExpTitleColor: $('#pen_export_title').val()
                }


var permY1 = (s1Param.series && s1Param.yAxis && s1Param.ufData=="permeability")? true : false;
var permY2 = (s2Param.series && s2Param.yAxis && s2Param.ufData=="permeability")? true : false;
var permY3 = (s3Param.series && s3Param.yAxis && s3Param.ufData=="permeability")? true : false;
var permY4 = (s4Param.series && s4Param.yAxis && s4Param.ufData=="permeability")? true : false;
var permY5 = (s5Param.series && s5Param.yAxis && s5Param.ufData=="avg_permeability")? true : false;
var permY6 = (s6Param.series && s6Param.yAxis && s6Param.ufData=="avg_permeability")? true : false;
var permY7 = (s7Param.series && s7Param.yAxis && s7Param.ufData=="avg_permeability")? true : false;

var permeability_Yaxis = (permY1||permY2 ||permY3 ||permY4 ||permY5||permY6||permY7)? true: false;

var tmpY1 = (s1Param.series && s1Param.yAxis && s1Param.ufData=="tmp")? true : false;
var tmpY2 = (s2Param.series && s2Param.yAxis && s2Param.ufData=="tmp")? true : false;
var tmpY3 = (s3Param.series && s3Param.yAxis && s3Param.ufData=="tmp")? true : false;
var tmpY4 = (s4Param.series && s4Param.yAxis && s4Param.ufData=="tmp")? true : false;
var tmpY5 = (s5Param.series && s5Param.yAxis && s5Param.ufData=="tmp")? true : false;
var tmpY6 = (s6Param.series && s6Param.yAxis && s6Param.ufData=="avg_tmp")? true : false;
var tmpY7 = (s7Param.series && s7Param.yAxis && s7Param.ufData=="avg_tmp")? true : false;

var  tmp_Yaxis = (tmpY1||tmpY2 ||tmpY3 ||tmpY4 ||tmpY5||tmpY6||tmpY7)? true: false;

var pcvY1 = (s1Param.series && s1Param.yAxis && s1Param.ufData=="pcv")? true : false;
var pcvY2 = (s2Param.series && s2Param.yAxis && s2Param.ufData=="pcv")? true : false;
var pcvY3 = (s3Param.series && s3Param.yAxis && s3Param.ufData=="pcv")? true : false;
var pcvY4 = (s4Param.series && s4Param.yAxis && s4Param.ufData=="pcv")? true : false;
var pcvY5 = (s5Param.series && s5Param.yAxis && s5Param.ufData=="pcv")? true : false;

var range_yaxis3 = (pcvY1||pcvY2 ||pcvY3 ||pcvY4 ||pcvY5)? true: false;

var fluxY1 = (s1Param.series && s1Param.yAxis && s1Param.ufData=="flux")? true : false;
var fluxY2 = (s2Param.series && s2Param.yAxis && s2Param.ufData=="flux")? true : false;
var fluxY3 = (s3Param.series && s3Param.yAxis && s3Param.ufData=="flux")? true : false;
var fluxY4 = (s4Param.series && s4Param.yAxis && s4Param.ufData=="flux")? true : false;
var fluxY5 = (s5Param.series && s5Param.yAxis && s5Param.ufData=="flux")? true : false;
var fluxY6 = (s6Param.series && s6Param.yAxis && s6Param.ufData=="avg_flux")? true : false;
var fluxY7 = (s7Param.series && s7Param.yAxis && s7Param.ufData=="avg_flux")? true : false;

var flux_yaxis5 = ( fluxY1||fluxY2 ||fluxY3 ||fluxY4 ||fluxY5||fluxY6||fluxY7)? true: false;


var bwashY1 = (s1Param.series && s1Param.yAxis && s1Param.ufData=="bw_counter")? true : false;
var bwashY2 = (s2Param.series && s2Param.yAxis && s2Param.ufData=="bw_counter")? true : false;
var bwashY3 = (s3Param.series && s3Param.yAxis && s3Param.ufData=="bw_counter")? true : false;
var bwashY4 = (s4Param.series && s4Param.yAxis && s4Param.ufData=="bw_counter")? true : false;
var bwashY5 = (s5Param.series && s5Param.yAxis && s5Param.ufData=="bw_counter")? true : false;
var skidsY1 = (s6Param.series && s6Param.yAxis && s6Param.ufData=="n_skids")? true : false;
var skidsY2 = (s7Param.series && s7Param.yAxis && s7Param.ufData=="n_skids")? true : false;
var mainAxis = ( bwashY1||bwashY2 ||bwashY3 ||bwashY4 ||bwashY5 || plotParam.yAxis||skidsY1||skidsY2)? true: false;


var uvY1 = (s6Param.series && s6Param.yAxis && s6Param.ufData=="uv_254")? true : false;
var uvY2 = (s7Param.series && s7Param.yAxis && s7Param.ufData=="uv_254")? true : false;
var uvAxis = ( uvY1||uvY2 )? true: false;

var turY1 = (s6Param.series && s6Param.yAxis && s6Param.ufData=="turbidity")? true : false;
var turY2 = (s7Param.series && s7Param.yAxis && s7Param.ufData=="turbidity")? true : false;
var turbidityAxis = ( turY1||turY2 )? true: false;

var frcY1 = (s6Param.series && s6Param.yAxis && s6Param.ufData=="frc")? true : false;
var frcY2 = (s7Param.series && s7Param.yAxis && s7Param.ufData=="frc")? true : false;
var frcAxis = ( frcY1||frcY2 )? true: false;

var flowY1 = (s6Param.series && s6Param.yAxis && s6Param.ufData=="online_skids_flow")? true : false;
var flowY2 = (s7Param.series && s7Param.yAxis && s7Param.ufData=="online_skids_flow")? true : false;
var flowAxis = ( flowY1||flowY2 )? true: false;
let confYaxis  = {
  y1Title:$('#yaxis_heading1').val(),
  y1TitleCol:$('#yaxis_title_color1').val(),
  y1RangeCol:$('#yaxis_color1').val(),
  y1Opposite:$('#yaxis_opposite1').is(':checked'),
  y1min:parseFloat($('#yaxis_min1').val()),
  y1max:parseFloat($('#yaxis_max1').val()),
 
  y2Title:$('#yaxis_heading2').val(),
  y2TitleCol:$('#yaxis_title_color2').val(),
  y2RangeCol:$('#yaxis_color2').val(),
  y2Opposite:$('#yaxis_opposite2').is(':checked'),
  y2min:parseFloat($('#yaxis_min2').val()),
  y2max:parseFloat($('#yaxis_max2').val()),
 
  y3Title:$('#yaxis_heading3').val(),
  y3TitleCol:$('#yaxis_title_color3').val(),
  y3RangeCol:$('#yaxis_color3').val(),
  y3Opposite:$('#yaxis_opposite3').is(':checked'),
  y3min:parseFloat($('#yaxis_min3').val()),
  y3max:parseFloat($('#yaxis_max3').val()),
 
  y4Title:$('#yaxis_heading4').val(),
  y4TitleCol:$('#yaxis_title_color4').val(),
  y4RangeCol:$('#yaxis_color4').val(),
  y4Opposite:$('#yaxis_opposite4').is(':checked'),
  y4min:parseFloat($('#yaxis_min4').val()),
  y4max:parseFloat($('#yaxis_max4').val()),
 
  y5Title:$('#yaxis_heading5').val(),
  y5TitleCol:$('#yaxis_title_color5').val(),
  y5RangeCol:$('#yaxis_color5').val(),
  y5Opposite:$('#yaxis_opposite5').is(':checked'),
  y5min:parseFloat($('#yaxis_min5').val()),
  y5max:parseFloat($('#yaxis_max5').val()),
 
  y6Title:$('#yaxis_heading6').val(),
  y6TitleCol:$('#yaxis_title_color6').val(),
  y6RangeCol:$('#yaxis_color6').val(),
  y6Opposite:$('#yaxis_opposite6').is(':checked'),
  y6min:parseFloat($('#yaxis_min6').val()),
  y6max:parseFloat($('#yaxis_max6').val()),
 
  y7Title:$('#yaxis_heading7').val(),
  y7TitleCol:$('#yaxis_title_color7').val(),
  y7RangeCol:$('#yaxis_color7').val(),
  y7Opposite:$('#yaxis_opposite7').is(':checked'),
  y7min:parseFloat($('#yaxis_min7').val()),
  y7max:parseFloat($('#yaxis_max7').val()),
 
  y8Title:$('#yaxis_heading8').val(),
  y8TitleCol:$('#yaxis_title_color8').val(),
  y8RangeCol:$('#yaxis_color8').val(),
  y8Opposite:$('#yaxis_opposite8').is(':checked'),
  y8min:parseFloat($('#yaxis_min8').val()),
  y8max:parseFloat($('#yaxis_max8').val()),
 
  y9Title:$('#yaxis_heading9').val(),
  y9TitleCol:$('#yaxis_title_color9').val(),
  y9RangeCol:$('#yaxis_color9').val(),
  y9Opposite:$('#yaxis_opposite9').is(':checked'),
  y9min:parseFloat($('#yaxis_min9').val()),
  y9max:parseFloat($('#yaxis_max9').val()),
 
  y10Title:$('#yaxis_heading10').val(),
  y10TitleCol:$('#yaxis_title_color10').val(),
  y10RangeCol:$('#yaxis_color10').val(),
  y10Opposite:$('#yaxis_opposite10').is(':checked'),
  y10min:parseFloat($('#yaxis_min10').val()),
  y10max:parseFloat($('#yaxis_max10').val()),
 
 }

const setting = new URLSearchParams({date1: plotParam.dateFrom,date2:plotParam.dateTo,
  plotbg:plotParam.chartBackground, 
  grid:plotParam.gridColor,
  invt:plotParam.intv,
  dbpage:'uf_south', 
  isLegend:plotParam.legendShow,
  isYaxis:plotParam.yAxis  ,
  expoWidth:plotParam.plotExpWidth ,
  expoHeight:plotParam.plotExpHeight ,
  expobg:plotParam.plotExpBackground ,
  expotitle:plotParam.plotExpTitleColor,
  plotTitle:plotParam.plotTitle,
  y1title:confYaxis.y1Title,
  y1titlecolor:confYaxis.y1TitleCol,
  y1rangecolor:confYaxis.y1RangeCol,
  y1opposite:confYaxis.y1Opposite,
  y1min:confYaxis.y1min,
  y1max:confYaxis.y1max,

  y2title:confYaxis.y2Title,
  y2titlecolor:confYaxis.y2TitleCol,
  y2rangecolor:confYaxis.y2RangeCol,
  y2opposite:confYaxis.y2Opposite,
  y2min:confYaxis.y2min,
  y2max:confYaxis.y2max,

  y3title:confYaxis.y3Title,
  y3titlecolor:confYaxis.y3TitleCol,
  y3rangecolor:confYaxis.y3RangeCol,
  y3opposite:confYaxis.y3Opposite,
  y3min:confYaxis.y3min,
  y3max:confYaxis.y3max,

  y4title:confYaxis.y4Title,
  y4titlecolor:confYaxis.y4TitleCol,
  y4rangecolor:confYaxis.y4RangeCol,
  y4opposite:confYaxis.y4Opposite,
  y4min:confYaxis.y4min,
  y4max:confYaxis.y4max,

  y5title:confYaxis.y5Title,
  y5titlecolor:confYaxis.y5TitleCol,
  y5rangecolor:confYaxis.y5RangeCol,
  y5opposite:confYaxis.y5Opposite,
  y5min:confYaxis.y5min,
  y5max:confYaxis.y5max,

  y6title:confYaxis.y6Title,
  y6titlecolor:confYaxis.y6TitleCol,
  y6rangecolor:confYaxis.y6RangeCol,
  y6opposite:confYaxis.y6Opposite,
  y6min:confYaxis.y6min,
  y6max:confYaxis.y6max,

  y7title:confYaxis.y7Title,
  y7titlecolor:confYaxis.y7TitleCol,
  y7rangecolor:confYaxis.y7RangeCol,
  y7opposite:confYaxis.y7Opposite,
  y7min:confYaxis.y7min,
  y7max:confYaxis.y7max,

  y8title:confYaxis.y8Title,
  y8titlecolor:confYaxis.y8TitleCol,
  y8rangecolor:confYaxis.y8RangeCol,
  y8opposite:confYaxis.y8Opposite,
  y8min:confYaxis.y8min,
  y8max:confYaxis.y8max,

  y9title:confYaxis.y9Title,
  y9titlecolor:confYaxis.y9TitleCol,
  y9rangecolor:confYaxis.y9RangeCol,
  y9opposite:confYaxis.y9Opposite,
  y9min:confYaxis.y9min,
  y9max:confYaxis.y9max,

  y10title:confYaxis.y10Title,
  y10titlecolor:confYaxis.y10TitleCol,
  y10rangecolor:confYaxis.y10RangeCol,
  y10opposite:confYaxis.y10Opposite,
  y10min:confYaxis.y10min,
  y10max:confYaxis.y10max,

  isline1:s1Param.series,
  pen1:s1Param.pen,
  ufGroup:"x",
  skid1:plotParam.roSkid,
  qdata1:s1Param.ufData,
  yaxis1: s1Param.yAxis,
  charttype1:s1Param.chartType,
  lineWidth1:s1Param.lineWidth,
  markerWg1:s1Param.markerWeight,
  markerSp1:s1Param.markerShape,
  dataLb1:s1Param.lable,
  offst1:"x",
  offmn1:"x",
  offmx1:"x",
  
  isline2:s2Param.series,
  pen2:s2Param.pen,
  skid2:"x",
  qdata2:s2Param.ufData,
  yaxis2: s2Param.yAxis,
  charttype2:s2Param.chartType,
  lineWidth2:s2Param.lineWidth,
  markerWg2:s2Param.markerWeight,
  markerSp2:s2Param.markerShape,
  dataLb2:s2Param.lable,
  offst2:"x",
  offmn2:"x",
  offmx2:"x",
  
  isline3:s3Param.series,
  pen3:s3Param.pen,
  skid3:"x",
  qdata3:s3Param.ufData,
  yaxis3: s3Param.yAxis,
  charttype3:s3Param.chartType,
  lineWidth3:s3Param.lineWidth,
  markerWg3:s3Param.markerWeight,
  markerSp3:s3Param.markerShape,
  dataLb3:s3Param.lable,
  offst3:"x",
  offmn3:"x",
  offmx3:"x",
  
  isline4:s4Param.series,
  pen4:s4Param.pen,
  skid4:"x",
  qdata4:s4Param.ufData,
  yaxis4: s4Param.yAxis,
  charttype4:s4Param.chartType,
  lineWidth4:s4Param.lineWidth,
  markerWg4:s4Param.markerWeight,
  markerSp4:s4Param.markerShape,
  dataLb4:s4Param.lable,
  offst4:"x",
  offmn4:"x",
  offmx4:"x",
  isline5:s5Param.series,
  pen5:s5Param.pen,
  skid5:"x",
  qdata5:s5Param.ufData,
  yaxis5: s5Param.yAxis,
  charttype5:s5Param.chartType,
  lineWidth5:s5Param.lineWidth,
  markerWg5:s5Param.markerWeight,
  markerSp5:s5Param.markerShape,
  dataLb5:s5Param.lable,
  offst5:"x",
  offmn5:"x",
  offmx5:"x",
  isline6:s6Param.series,
  pen6:s6Param.pen,
  skid6:"x",
  qdata6:s6Param.ufData,
  yaxis6: s6Param.yAxis,
  charttype6:s6Param.chartType,
  lineWidth6:s6Param.lineWidth,
  markerWg6:s6Param.markerWeight,
  markerSp6:s6Param.markerShape,
  dataLb6:s6Param.lable,
  offst6:"x",
  offmn6:"x",
  offmx6:"x",
  isline7:s7Param.series,
  pen7:s7Param.pen,
  skid7:"x",
  qdata7:s7Param.ufData,
  yaxis7: s7Param.yAxis,
  charttype7:s7Param.chartType,
  lineWidth7:s7Param.lineWidth,
  markerWg7:s7Param.markerWeight,
  markerSp7:s7Param.markerShape,
  dataLb7:s7Param.lable,
  offst7:"x",
  offmn7:"x",
  offmx7:"x",
  
  });


fetch(window.location.href,    
{method:'PUT',
body:setting,
headers:{"x-CSRF-TOKEN":csrfToken}
})
.then(response =>response.text())
.then((data) =>{
  console.log(data);})
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
        text: 'UF South Average Permeability, Flux and TMP',
        style: {color: plotParam.plotExpTitleColor,
        font: '18px "Calibri", Verdana, sans-serif',
        fontWeight:'bold'
        }},
        exporting: {
        printMaxWidth: 1000,
        allowHTML: false,
        //url: "http://localhost:7801",
        fallbackToExportServer: false,
        filename: 'SWRO-SADARA UF Performance'+' '+datex[0] + " To "+datex[datex.length-1],
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
        outside: true,
        crosshairs: true,
        split: false,      
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
                                  fontSize:7,
                                  overflow:'none'
                                  
                              }
                          },
                          title: {  
                            rotation: 0,
                            text: 'Span ' +dates_diff_cal+' Days '+datex[0] + ' hrs  To: '+datex[datex.length-1]+' hrs' ,
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
                          visible: true, 
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
                                enabled: mainAxis,
                                format: '{value}',
                                style: {
                                  color:'#1e272e',
                                  fontWeight:'bold',
                                    backgroundColor: '#000000',
                    
                                }
                            },
                            title: {
                                enabled:mainAxis,
                                align: 'high',
                                offset: 15,
                                rotation: 0,
                                y: -10,
                                text: '%',
                                style: {
                                  color:'#1e272e',
                                  fontWeight:'bold',
                                }
                            },
                            //labels: false,
                        },
                        
                    
                        { //  [1]    Permeability and average Permeability
                         min:100, 
                         max:600,     
                          visible:permeability_Yaxis, 
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
                                style: {color:'#1e272e',
                                fontWeight:'bold',}
                            },
                            title: {
                                useHTML: true,
                                align: 'high',
                                offset: 15,
                                rotation: 0,
                                y: -10,
                                text: 'Lp',
                                style: {
                                  color:'#1e272e',
                                  fontWeight:'bold',
                                }
                            },
                            //labels: false,
                            //opposite: true
                        },
                    
                        { //  [2] TMP
                        min:0,
                        max:0.40,
                             tickAmount: 11,
                              visible:tmp_Yaxis, 
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
                                    style: {color:'#1e272e',
                                    fontWeight:'bold',}
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
                                      fontWeight:'bold',
                                    }
                                },
                                //labels: false,
                                //opposite: true
                            },   
                    
                            { //[3]  PCV-001 Position (0 - 100 %)
                                    min:0, 
                                    max:100,  
                                  tickAmount: 11,
                                  visible:range_yaxis3, 
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
                                        style: {color:'#1e272e',
                                        fontWeight:'bold',}
                                    },
                                    title: {
                                        useHTML: true,
                                        align: 'high',
                                        offset: 15,
                                        rotation: 0,
                                        y: -10,
                                        text: '%',
                                        style: {
                                          color:'#1e272e',
                                          fontWeight:'bold',
                                        }
                                    },
                                    //labels: false,
                                    //opposite: true
                                },
                               
                            { //[4] Turbidity       
                                    // min:0, 
                                    // max:3,                
                                      visible:turbidityAxis, 
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
                                            style: {color:'#1e272e',
                                            fontWeight:'bold',}
                                        },
                                        title: {
                                            useHTML: true,
                                            align: 'high',
                                            offset: 15,
                                            rotation: 0,
                                            y: -10,
                                            text: 'NTU',
                                            style: {
                                              color:'#1e272e',
                                              fontWeight:'bold',
                                            }
                                        },
                                        //labels: false,
                                        //opposite: true
                                    },
                                   
                                    { //Flux  [5]
                                        min:25,
                                        max:80,
                                        opposite:true,
                                          visible:flux_yaxis5, 
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
                                                         
                                                style: {color:'#1e272e',
                                                fontWeight:'bold',}
                                            },
                                            title: {
                                                useHTML: true,
                                                align: 'high',
                                                offset:10,
                                                rotation: 0,
                                                y: -10,
                                                text: 'lmh',
                                                style: {
                                                  color:'#1e272e',
                                                  fontWeight:'bold',
                                                }
                                            },
                                            //labels: false,
                                            //opposite: true
                                        },
                      
                                        { //[6] uv-254
                                           tickAmount: 11, 
                                            visible:uvAxis, 
                                            tickWidth: 1,      
                                             // lineColor:pen1,
                                            // lineWidth:2,
                                           // minorTickInterval: 'auto',
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
                                                    enabled: true, //is_temperature,
                                                   // format: '{value.toFixed(0)}', 
                                                    formatter: function() {
                                                        return (this.value).toFixed(3);
                                                      }, 
                                                             
                                                    style: {color:'#1e272e',
                                                    fontWeight:'bold',}
                                                },
                                                title: {
                                                    useHTML: true,
                                                    align: 'high',
                                                    offset:12,
                                                    rotation: 0,
                                                    y: -10,
                                                    text: 'uv254',
                                                    style: {
                                                      color:'#1e272e',
                                                      fontWeight:'bold',
                                                    }
                                                },
                                                //labels: false,
                                                //opposite: true
                                            },
                    
                                            { //[7] FRC
                                                min: 0,
                                                max: 2,
                                                tickAmount: 11,
                                                visible:frcAxis, 
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
                                                        style: {color:'#1e272e',
                                                        fontWeight:'bold',}
                                                    },
                                                    title: {
                                                        useHTML: true,
                                                        align: 'high',
                                                        offset:2,
                                                        rotation: 0,
                                                        y: -10,
                                                        text: 'PPM',
                                                        style: {
                                                          color:'#1e272e',
                                                          fontWeight:'bold',
                                                        }
                                                    },
                                                    //labels: false,
                                                    //opposite: true
                                                },
                                                { //[8] total flow
                                                     tickAmount: 11,
                                                    visible:flowAxis, 
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
                                                           // format: '{value}',
                                                            formatter: function() {
                                                                return Math.ceil(this.value/1000) +'K';
                                                              },                                       
                                                                     
                                                            style:{color:'#2f3542'}
                                                        },
                                                        title: {
                                                            useHTML: true,
                                                            align: 'high',
                                                            offset:2,
                                                            rotation: 0,
                                                            y: -10,
                                                            text: 'm<sup>3</sup>h<sup>-1<sup>',
                                                            style: {
                                                              color:'#1e272e',
                                                              fontWeight:'bold',
                                                            }
                                                        },
                                                        //labels: false,
                                                        //opposite: true 
                                                    },      
                                                        
                                        
                        ],   
                
                      
           
                        series: [
                    
                                                        {  
                                                              name:s1Param.ufGroup+s1Param.ufSkid.toUpperCase()+' '+st[s1Param.ufData]['name'],
                                                              type:s1Param.chartType,
                                                              visible:s1Param.series,
                                                              showInLegend: d1,
                                                              data: dataSeries1x,                                          
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
                                                              name:s2Param.ufGroup+s2Param.ufSkid.toUpperCase()+' '+st[s2Param.ufData]['name'],
                                                              type:s2Param.chartType,
                                                              visible:s2Param.series,
                                                              showInLegend: d2,
                                                              data: dataSeries2x,                                          
                                                              lineWidth:(s2Param.chartType=="scatter")?0: s2Param.lineWidth,
                                                              yAxis:st[s2Param.ufData]['yAxis'],
                                                              tooltip: {
                                                                crosshairs: true,
                                                                headerFormat: '{point.key}<br>',
                                                                pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}:</small>{point.y}<br>',
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
                                                              name:s3Param.ufGroup+s3Param.ufSkid.toUpperCase()+' '+st[s3Param.ufData]['name'],
                                                              type:s3Param.chartType,
                                                              visible:s3Param.series,
                                                              showInLegend: d3,
                                                              data: dataSeries3x,                                          
                                                              lineWidth:(s3Param.chartType=="scatter")?0: s3Param.lineWidth,
                                                              yAxis:st[s3Param.ufData]['yAxis'],
                                                              tooltip: {
                                                                crosshairs: true,
                                                                headerFormat: '{point.key}<br>',
                                                                pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}:</small>{point.y}<br>',
                                                                shared: true,
                                                                useHTML: true,                                           
                                                               valueSuffix: st[s3Param.ufData]['unit'],
                                                              },
                                                              color:s3Param.pen,
                                                                    marker: {
                                                                    symbol: s3Param.markerShape,
                                                                    radius: s3Param.markerWeight,
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
                                                {             name:s4Param.ufGroup+s4Param.ufSkid.toUpperCase()+' '+st[s4Param.ufData]['name'],
                                                              type:s4Param.chartType,
                                                              visible:s4Param.series,
                                                              showInLegend: d4,
                                                              data: dataSeries4x,                                          
                                                              lineWidth:(s4Param.chartType=="scatter")?0: s4Param.lineWidth,
                                                              yAxis:st[s4Param.ufData]['yAxis'],
                                                              tooltip: {
                                                                crosshairs: true,
                                                                headerFormat: '{point.key}<br>',
                                                                pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}:</small>{point.y}<br>',
                                                                shared: true,
                                                                useHTML: true,                                           
                                                               valueSuffix: st[s4Param.ufData]['unit'],
                                                              },
                                                              color:s4Param.pen,
                                                                    marker: {
                                                                    symbol: s4Param.markerShape,
                                                                    radius: s4Param.markerWeight,
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
                                                          
                                                          {   name:st[s5Param.ufData]['name'],
                                                              type:s5Param.chartType,
                                                              visible:s5Param.series,
                                                              showInLegend: d5,
                                                              data: dataSeries5x,                                          
                                                              lineWidth:(s5Param.chartType=="scatter")?0: s5Param.lineWidth,
                                                              yAxis:st[s5Param.ufData]['yAxis'],
                                                              tooltip: {
                                                                crosshairs: true,
                                                                headerFormat: '{point.key}<br>',
                                                                pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}:</small>{point.y}<br>',
                                                                shared: true,
                                                                useHTML: true,                                           
                                                               valueSuffix: st[s5Param.ufData]['unit'],
                                                              },
                                                              color:s5Param.pen,
                                                                    marker: {
                                                                    symbol: s5Param.markerShape,
                                                                    radius: s5Param.markerWeight,
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

                                                           {   name:st[s6Param.ufData]['name'],
                                                              type:s6Param.chartType,
                                                              visible:s6Param.series,
                                                              showInLegend: d6,
                                                              data: dataSeries6x,                                          
                                                              lineWidth:(s6Param.chartType=="scatter")?0: s6Param.lineWidth,
                                                              yAxis:st[s6Param.ufData]['yAxis'],
                                                              tooltip: {
                                                                crosshairs: true,
                                                                headerFormat: '{point.key}<br>',
                                                                pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}:</small>{point.y}<br>',
                                                                shared: true,
                                                                useHTML: true,                                           
                                                               valueSuffix: st[s6Param.ufData]['unit'],
                                                              },
                                                              color:s6Param.pen,
                                                                    marker: {
                                                                    symbol: s6Param.markerShape,
                                                                    radius: s6Param.markerWeight,
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

                                                        {   name:st[s7Param.ufData]['name'],
                                                              type:s7Param.chartType,
                                                              visible:s7Param.series,
                                                              showInLegend: d7,
                                                              data: dataSeries7x,                                          
                                                              lineWidth:(s7Param.chartType=="scatter")?0: s7Param.lineWidth,
                                                              yAxis:st[s7Param.ufData]['yAxis'],
                                                              tooltip: {
                                                                crosshairs: true,
                                                                headerFormat: '{point.key}<br>',
                                                                pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}:</small>{point.y}<br>',
                                                                shared: true,
                                                                useHTML: true,                                           
                                                               valueSuffix: st[s7Param.ufData]['unit'],
                                                              },
                                                              color:s7Param.pen,
                                                                    marker: {
                                                                    symbol: s7Param.markerShape,
                                                                    radius: s7Param.markerWeight,
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
                                                        
                                                          
                                                        
                                                                                              
                    
                        ]
                    
                    
                      } ) }


    Notiflix.Notify.Success('Plot updated')
   Notiflix.Block.Remove('body'); 
   }).catch(error=>{
    Notiflix.Block.Remove('body');
    console.log(error)
    Notiflix.Report.Failure('Failure','Details: '+error,'Close');
   })


}


  
            
            //catch(error =>Notiflix.Notify.Warning('Failed '+error));
        
          





