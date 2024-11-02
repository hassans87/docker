queryStream();

//$('.tensor-flow,.rednder').change(function(){queryStream();})
setInterval(function () {$("head title").html($("head title").html().substring(1) + $("head title").html().substring(0,1));}, 400);
$('.query_fire').click(function(){
    queryStream();})

$('#export_data').click(function(){
//window.location.replace("./data_export_ro1.php");
;})
// constructor function 
function Stream(target){
    this.series = $('#line'+target).is(':checked');
    this.ufData = $('#skidx'+target).val();

}
function ChartParam(target){
    this.series = $('#line'+target).is(':checked');
    this.ufData = $('#ufdata'+target).val();
    this.pen = $('#pen'+target).val();
    this.lable = $('#dt_label'+target).is(':checked');
    this.yAxis = $('#y_axis'+target).is(':checked');
    this.chartType = $('#chart_type'+target).val();
    this.lineWidth = parseFloat($('#line_width'+target).val());
    this.markerWeight =  parseFloat($('#marker'+target).val());
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
if(query_days_calc >6000){
    $( ".query_fire" ).prop( "disabled", true); 
    $(".query_fire").removeClass("btn-light") .addClass("btn-danger");
    Notiflix.Notify.Failure('Reduce query dates, max 600 days'); 
    Notiflix.Report.Failure('Query Warning','Check your query, max 600 days query allowed','Close');
}else if(query_days_calc<0){
    $( "#trigger" ).prop( "disabled", true); 
    $("#trigger").removeClass("btn-light,query_fire") .addClass("btn-danger");
    Notiflix.Notify.Failure('Reduce query dates, max 600 days'); 
    //Notiflix.Report.Failure('Query Warning','check query, invalid dates range !','Close');
}else{
    $( "#trigger" ).prop( "disabled", false );
    $("#trigger").removeClass("btn-danger") .addClass("btn-warning"); }
    ;})
 
function queryStream(){
Notiflix.Block.Pulse('body', 'Please Wait, feteching query data'); 
let plotParam = {
d1:$('#line1').val(),
d2:$('#line2').val(),
d3:$('#line3').val(),
d4:$('#line4').val(),
d5:$('#line5').val(),
skd:$('#skidx').val(),
querypkg:$('#process_value').val(),
}
let s1Param = new Stream(1);
let s2Param = new Stream(2);
let s3Param = new Stream(3);
let d1 = s1Param.series;
let d2 = s2Param.series;
let d3 = s3Param.series;
const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
const query_data = new URLSearchParams({skid:plotParam.skd,pv:plotParam.querypkg,
d1:d1,d2:d2,d3:d3
});
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
console.log(dataStream);
let date =dataStream[0];
let dataSeries1 = dataStream[1]; 
let dataSeries2 = dataStream[2]; 
let dataSeries3 = dataStream[3]; 
let dataSeries4 = dataStream[4]; 
let dataSeries5 = dataStream[5]; 
let date22 = [];
let datex = [];      
for (var i in date) {      
let months_array_primary = ['dd', 'January', 'February', 'March','April', 'May', 'June', 'July','August','September','October','November','December'];       
let mydate = date[i];
let day_x = mydate.substring(8, 10);
let month_x  = mydate.substring(5, 7);
let year_x = mydate.substring(2, 4);
let timex = mydate.substring(11, 16);
let siri_month = parseInt(month_x);
siri_month = months_array_primary[siri_month];
let siri_fullyear = mydate.substring(0, 4);
let series_date_conts  = day_x +' '+siri_month+' '+timex;
let date_xseries = day_x +'-'+siri_month;
date22.push(date_xseries);
datex.push(series_date_conts);} 

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
        else{Notiflix.Notify.Failure('Series'+series+' :Empty data array');
        //Notiflix.Report.Failure('Query Warning','Data Array is empty','Close');
        $("#data_length"+series).html('0');
        $("#data_max"+series).html('-');
        $("#data_min"+series).html('-');
        $("#data_avg"+series).html('-');
        $("#unit"+series).html(" ");
        }}}


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
        }
        let s1Param = new ChartParam(1);
        let dataTrain1 = dataSeries1;
        seriesLook(s1Param.series,1);

        let plotParam = {
            bayline: "43",
            roSkid: $('#skidx').val(), 
            chartBackground:$('#pen_main').val(),
            plotWidth:screen.availWidth * 0.95,
            legendShow: $('#is_legend').is(':checked'),
            yAxis:$('#is_main_yaxis').is(':checked'),
            gridColor: $('#pen_grid').val(),
            plotExpWidth:$('#export_width').val(),
            plotExpHeight:$('#export_height').val(),
            plotExpBackground:$('#pen_export').val(),
            plotExpTitleColor: $('#pen_export_title').val(),
            plotTitle:$('#chart_title').val()
            
            }
Highcharts.seriesTypes.scatter.prototype.noSharedTooltip = false;
   var testx=Highcharts.chart('plot_window', {
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
        text: "RO Second Pass Skids Feed average EC Map",
        style: {color: plotParam.plotExpTitleColor,
        font: '"18px" "Calibri", Verdana, sans-serif',
        fontWeight:'bold'
        }},
  
        exporting: {
        printMaxWidth: 1000,
        allowHTML: false,
        //url:"http://exportserver.data-tensor.com/:3300",
        //url: "http://localhost:7805",
        fallbackToExportServer: false,
        filename:'RO 43Z',
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
        backgroundColor: "#FFFFFF",
        plotBackgroundColor:"#FFFFFF",//plotParam.plotExpBackground,
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
        enabled: true,
        verticalAlign: 'top',
        x:10,
        y:35,
        floating: true,
        borderWidth: 0,
        backgroundColor:'rgba(255, 255, 255, 0.9)',
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
                                 text: '12 Months Span',
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
                                        color:'#1e272e',
                                        fontWeight:'bold',
                                        backgroundColor: '#000000',
                                         
                                      }
                                    },
                          gridLineColor: plotParam.gridColor,      
                            labels: {
                                enabled: false,
                                format: '{value}',
                                style: {
                                    color:'#1e272e',
                                    fontWeight:'bold',
                    
                                }
                            },
                            title: {
                                enabled:false,
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
                        { //  [1]    bar for DP 0.9 - 3.9
                            min:500, 
                            max:3100,     
                             visible:true, 
                             tickWidth: 1, 
                             tickAmount: 11,  
                            gridLineWidth: 0,
                            opposite:false,
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
                                  style:{
                                   color:"red",//confYaxis.y1RangeCol,
                                   fontWeight:'bold',
                                   backgroundColor: '#000000',
                               }
                               },
                               title: {
                                   useHTML: true,
                                   align: 'high',
                                   offset: 15,
                                   rotation: 0,
                                   y: -10,
                                  text:"uS/cm",
                                   style: {
                                     color:"red",
                                       fontWeight:'bold',
                                   }
                               },
                               //labels: false,
                               //opposite: true
                           },     
                        ],   
                        series: [  
                    
                                                        {  
                                                              name:"2024",
                                                              type:"spline",
                                                              visible:true,
                                                              showInLegend:true,
                                                              data: dataSeries1,                                          
                                                             lineWidth:1.5,
                                                              yAxis:1,
                                                             //className:s1Param.chartType,
                                                              tooltip: {
                                                                crosshairs: [true, true],
                                                                headerFormat: '{point.key}<br>',
                                                                pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small><b>{point.y}</b><br>',
                                                                shared: true,
                                                                useHTML: true,                                           
                                                               valueSuffix:"bar",
                                                              },
                                                              color:s1Param.pen,
                                                                    marker: {
                                                                    symbol: "circle",
                                                                    radius: 2,
                                                                    states: {
                                                                              hover: {
                                                                                  enabled: false
                                                                              }
                                                                          }
                                                                         },
                                                                   dataLabels: {
                                                                   enabled:false,
                                                                   style: {
                                                                          fontWeight: 'normal',
                                                                          textShadow: false,
                                                                          textOutline:false
                                                                      },
                                                                   color:"red",                  
                                                                  },
                                                          fillOpacity: 0.17,
                                                          },
                                                          {  
                                                            name:"2023",
                                                            type:"spline",
                                                            visible:true,
                                                            showInLegend:true,
                                                            data: dataSeries2,                                          
                                                           lineWidth:1.5,
                                                            yAxis:1,
                                                           //className:s1Param.chartType,
                                                            tooltip: {
                                                              crosshairs: [true, true],
                                                              headerFormat: '{point.key}<br>',
                                                              pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small><b>{point.y}</b><br>',
                                                              shared: true,
                                                              useHTML: true,                                           
                                                             valueSuffix:"bar",
                                                            },
                                                            color:s2Param.pen,
                                                                  marker: {
                                                                  symbol: "circle",
                                                                  radius: 2,
                                                                  states: {
                                                                            hover: {
                                                                                enabled: false
                                                                            }
                                                                        }
                                                                       },
                                                                 dataLabels: {
                                                                 enabled:false,
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
                                                            name:"2022",
                                                            type:"spline",
                                                            visible:true,
                                                            showInLegend:true,
                                                            data: dataSeries3,                                          
                                                           lineWidth:1.5,
                                                            yAxis:1,
                                                           //className:s1Param.chartType,
                                                            tooltip: {
                                                              crosshairs: [true, true],
                                                              headerFormat: '{point.key}<br>',
                                                              pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small><b>{point.y}</b><br>',
                                                              shared: true,
                                                              useHTML: true,                                           
                                                             valueSuffix:"bar",
                                                            },
                                                            color:"#44bd32",
                                                                  marker: {
                                                                  symbol: "circle",
                                                                  radius: 2,
                                                                  states: {
                                                                            hover: {
                                                                                enabled: false
                                                                            }
                                                                        }
                                                                       },
                                                                 dataLabels: {
                                                                 enabled:false,
                                                                 style: {
                                                                        fontWeight: 'normal',
                                                                        textShadow: false,
                                                                        textOutline:false
                                                                    },
                                                                 color:"#44bd32",                  
                                                                },
                                                        fillOpacity: 0.17,
                                                        },  
                                                        {  
                                                            name:"2021",
                                                            type:"spline",
                                                            visible:true,
                                                            showInLegend:true,
                                                            data: dataSeries4,                                          
                                                           lineWidth:1.5,
                                                            yAxis:1,
                                                           //className:s1Param.chartType,
                                                            tooltip: {
                                                              crosshairs: [true, true],
                                                              headerFormat: '{point.key}<br>',
                                                              pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small><b>{point.y}</b><br>',
                                                              shared: true,
                                                              useHTML: true,                                           
                                                             valueSuffix:"bar",
                                                            },
                                                            color:"#f9ca24",
                                                                  marker: {
                                                                  symbol: "circle",
                                                                  radius: 2,
                                                                  states: {
                                                                            hover: {
                                                                                enabled: false
                                                                            }
                                                                        }
                                                                       },
                                                                 dataLabels: {
                                                                 enabled:false,
                                                                 style: {
                                                                        fontWeight: 'normal',
                                                                        textShadow: false,
                                                                        textOutline:false
                                                                    },
                                                                 color:"#f9ca24",                  
                                                                },
                                                        fillOpacity: 0.17,
                                                        }, 
                                                        {  
                                                            name:"2020",
                                                            type:"spline",
                                                            visible:true,
                                                            showInLegend:true,
                                                            data: dataSeries5,                                          
                                                           lineWidth:1.5,
                                                            yAxis:1,
                                                           //className:s1Param.chartType,
                                                            tooltip: {
                                                              crosshairs: [true, true],
                                                              headerFormat: '{point.key}<br>',
                                                              pointFormat: '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small><b>{point.y}</b><br>',
                                                              shared: true,
                                                              useHTML: true,                                           
                                                             valueSuffix:"bar",
                                                            },
                                                            color:"#a55eea",
                                                                  marker: {
                                                                  symbol: "circle",
                                                                  radius: 2,
                                                                  states: {
                                                                            hover: {
                                                                                enabled: false
                                                                            }
                                                                        }
                                                                       },
                                                                 dataLabels: {
                                                                 enabled:false,
                                                                 style: {
                                                                        fontWeight: 'normal',
                                                                        textShadow: false,
                                                                        textOutline:false
                                                                    },
                                                                 color:"#a55eea",                  
                                                                },
                                                        fillOpacity: 0.17,
                                                        },

                        ]
                    
                    
                      } ) 



Notiflix.Block.Remove('body'); 
                    
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
        
          





