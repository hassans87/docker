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
    this.ufData = $('#ufdata'+target).val();

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
dateFrom:" 2023-01-01",
dateTo: "2023-12-31",
ufqry:$('#skidx').val(),
interval:1
}
const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
const query_data = new URLSearchParams({from:plotParam.dateFrom,
dateto:plotParam.dateTo
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

//plotParam.dateFrom
//plotParam.dateTo
console.log(dataStream);
Notiflix.Block.Remove('body'); 
}
catch(err){
        Notiflix.Report.Warning('Failure',' '+err,'Close');
        console.log(err);
        $("#plot_window").html(' ');
        $("#plot_window").css({'background-color':'black'});
    }
})}


  
            
            //catch(error =>Notiflix.Notify.Warning('Failed '+error));
        
          





