skidDpiQueryGroup1();

//$('.tensor-flow,.rednder').change(function(){queryStream();})
setInterval(function () {
    $("head title").html(
        $("head title").html().substring(1) +
            $("head title").html().substring(0, 1)
    );
}, 400);
$(".query_fire").click(function () {
    queryStream();
});
$(".query").change(function () {
    //    queryStream();
    Notiflix.Notify.Info("Changes detected, Press Query Button to apply");
});

//skid DP with new membranes
$("#g1_dpi_query").click(function(){
$(".short_cut").removeClass("btn-danger").addClass("badge-light3d");
$(this).removeClass("badge-light3d").addClass("btn-danger");
skidDpiQueryGroup1();});
$("#g2_dpi_query").click(function(){
$(".short_cut").removeClass("btn-danger").addClass("badge-light3d");
$(this).removeClass("badge-light3d").addClass("btn-danger");
skidDpiQueryGroup2();});
$("#all_skids_dp").click(function(){
$(".short_cut").removeClass("btn-danger").addClass("badge-light3d");
$(this).removeClass("badge-light3d").addClass("btn-danger");
skidDpiQueryAll();});

$("#g1_ec_query").click(function () {
$(".short_cut").removeClass("btn-danger").addClass("badge-light3d");
$(this).removeClass("badge-light3d").addClass("btn-danger");
skidECGroup1();});
$("#g2_ec_query").click(function () {
$(".short_cut").removeClass("btn-danger").addClass("badge-light3d");
$(this).removeClass("badge-light3d").addClass("btn-danger");
skidECGroup2();});
$("#all_skids_ec").click(function () {
$(".short_cut").removeClass("btn-danger").addClass("badge-light3d");
$(this).removeClass("badge-light3d").addClass("btn-danger");
skidECAll();});
$("#dbnpa_dosing_flow").click(function () {
    $(".short_cut").removeClass("btn-danger").addClass("badge-light3d");
    $(this).removeClass("badge-light3d").addClass("btn-danger");
    dosingDBNPAFlow();});
$("#dbnpa_dosing_ppm").click(function () {
$(".short_cut").removeClass("btn-danger").addClass("badge-light3d");
$(this).removeClass("badge-light3d").addClass("btn-danger");
dosingDBNPAFlowRate();});

$("#all_skids_rej").click(function () {
$(".short_cut").removeClass("btn-danger").addClass("badge-light3d");
$(this).removeClass("badge-light3d").addClass("btn-danger");
skidSaltRejectionAll();});
$("#g1_salt_rejection").click(function () {
$(".short_cut").removeClass("btn-danger").addClass("badge-light3d");
$(this).removeClass("badge-light3d").addClass("btn-danger");
skidSaltRejectionGroup1();});
$("#g2_salt_rejection").click(function () {
$(".short_cut").removeClass("btn-danger").addClass("badge-light3d");
$(this).removeClass("badge-light3d").addClass("btn-danger");
skidSaltRejectionGroup2();});
$("#dbnpa_dosing").click(function () {
$(".short_cut").removeClass("btn-danger").addClass("badge-light3d");
$(this).removeClass("badge-light3d").addClass("btn-danger");
DBNPALab();});
$("#sbs_dosing").click(function () {
$(".short_cut").removeClass("btn-danger").addClass("badge-light3d");
$(this).removeClass("badge-light3d").addClass("btn-danger");
SBSROFeed();});
$("#feed_water_temp").click(function () {
$(".short_cut").removeClass("btn-danger").addClass("badge-light3d");
$(this).removeClass("badge-light3d").addClass("btn-danger");
temperatureROFeed();});
$("#plant_capacity_feed_flow").click(function () {
$(".short_cut").removeClass("btn-danger").addClass("badge-light3d");
$(this).removeClass("badge-light3d").addClass("btn-danger");
plantcapacityFeedFlow();});
//DBNPALab SBSROFeed temperatureROFeed plantcapacityFeedFlow
// clear all reset
$("#reset").click(function () {
    $(".short_cut").removeClass("btn-danger").addClass("badge-light3d");
    $(this).removeClass("badge-light3d").addClass("btn-danger");
    resetQuery();});
function resetQuery(){ 
    $("#line1").prop( "checked", false );
    $("#line2").prop( "checked", false );
    $("#line3").prop( "checked", false );
    $("#line4").prop( "checked", false );
    $("#line5").prop( "checked", false );
    $("#line6").prop( "checked", false );
    $("#line7").prop( "checked", false );
    $("#line8").prop( "checked", false );
    $("#line9").prop( "checked", false );
    $("#line10").prop( "checked", false );
    $("#line11").prop( "checked", false );
    $("#line12").prop( "checked", false );
    $("#line13").prop( "checked", false );
    $('#chr_title').attr('value', '');
    queryStream();
}
function skidDpiQueryGroup1(){ 
$("#line1").prop( "checked", true );
$("#line2").prop( "checked", true );
$("#line3").prop( "checked", true );
$("#line4").prop( "checked", true );
$("#line5").prop( "checked", true );
$("#line6").prop( "checked", true );
$("#line7").prop( "checked", false );
$("#line8").prop( "checked", false );
$("#line9").prop( "checked", false );
$("#line10").prop( "checked", false );
$("#line11").prop( "checked", false );
$('#ufdata1 option[value=a_dpi]').prop('selected', true);
$('#ufdata2 option[value=b_dpi]').prop('selected', true);
$('#ufdata3 option[value=c_dpi]').prop('selected', true);
$('#ufdata4 option[value=h_dpi]').prop('selected', true);
$('#ufdata5 option[value=j_dpi]').prop('selected', true);
$('#ufdata6 option[value=k_dpi]').prop('selected', true);
$('#chart_type1 option[value=spline]').prop('selected', true);
$('#chart_type2 option[value=spline]').prop('selected', true);
$('#chart_type3 option[value=spline]').prop('selected', true);
$('#chart_type4 option[value=spline]').prop('selected', true);
$('#chart_type5 option[value=spline]').prop('selected', true);
$('#chart_type6 option[value=spline]').prop('selected', true);
$('#chart_type7 option[value=spline]').prop('selected', true);
$('#chart_type8 option[value=spline]').prop('selected', true);
$('#chart_type9 option[value=spline]').prop('selected', true);
$('#chart_type10 option[value=spline]').prop('selected', true);
$('#chart_type11 option[value=spline]').prop('selected', true);
$('#marker1,#marker2,#marker3,#marker4,#marker5,#marker6,#marker7,#marker8,#marker9,#marker10,#marker11,#marker12').attr('value', '1.5');
$('#line_width1,#line_width2,#line_width3,#line_width4,#line_width5,#line_width6,#line_width7,#line_width8,#line_width9,#line_width10,#line_width11,#line_width12').attr('value', '1.5');
$('#chr_title').attr('value', 'Skids DP with New Membranes');
queryStream();
}
//group-2 DP
function skidDpiQueryGroup2(){ 
    $("#line1").prop( "checked", true );
    $("#line2").prop( "checked", true );
    $("#line3").prop( "checked", true );
    $("#line4").prop( "checked", true );
    $("#line5").prop( "checked", true );
    $("#line6").prop( "checked", false );
    $("#line7").prop( "checked", false );
    $("#line8").prop( "checked", false );
    $("#line9").prop( "checked", false );
    $("#line10").prop( "checked", false );
    $("#line11").prop( "checked", false );
    $('#ufdata1 option[value=d_dpi]').prop('selected', true);
    $('#ufdata2 option[value=e_dpi]').prop('selected', true);
    $('#ufdata3 option[value=f_dpi]').prop('selected', true);
    $('#ufdata4 option[value=g_dpi]').prop('selected', true);
    $('#ufdata5 option[value=i_dpi]').prop('selected', true);
    $('#chart_type1 option[value=spline]').prop('selected', true);
    $('#chart_type2 option[value=spline]').prop('selected', true);
    $('#chart_type3 option[value=spline]').prop('selected', true);
    $('#chart_type4 option[value=spline]').prop('selected', true);
    $('#chart_type5 option[value=spline]').prop('selected', true);
    $('#chart_type6 option[value=spline]').prop('selected', true);
    $('#chart_type7 option[value=spline]').prop('selected', true);
    $('#chart_type8 option[value=spline]').prop('selected', true);
    $('#chart_type9 option[value=spline]').prop('selected', true);
    $('#chart_type10 option[value=spline]').prop('selected', true);
    $('#chart_type11 option[value=spline]').prop('selected', true);
    $('#marker1,#marker2,#marker3,#marker4,#marker5,#marker6,#marker7,#marker8,#marker9,#marker10,#marker11').attr('value', '1.5');
    $('#line_width1,#line_width2,#line_width3,#line_width4,#line_width5,#line_width6,#line_width7,#line_width8,#line_width9,#line_width10,#line_width11').attr('value', '1');
    $('#line_width1,#line_width2,#line_width3,#line_width4,#line_width5,#line_width6').attr('value', '1');
    $('#chr_title').attr('value', 'Skids DP with old Membranes');
    queryStream();
    }
//All Skids DP
function skidDpiQueryAll(){ 
    $("#line1").prop( "checked", true );
    $("#line2").prop( "checked", true );
    $("#line3").prop( "checked", true );
    $("#line4").prop( "checked", true );
    $("#line5").prop( "checked", true );
    $("#line6").prop( "checked", true );
    $("#line7").prop( "checked", true );
    $("#line8").prop( "checked", true );
    $("#line9").prop( "checked", true );
    $("#line10").prop( "checked", true );
    $("#line11").prop( "checked", true );
    $('#ufdata1 option[value=a_dpi]').prop('selected', true);
    $('#ufdata2 option[value=b_dpi]').prop('selected', true);
    $('#ufdata3 option[value=c_dpi]').prop('selected', true);
    $('#ufdata4 option[value=d_dpi]').prop('selected', true);
    $('#ufdata5 option[value=e_dpi]').prop('selected', true);
    $('#ufdata6 option[value=f_dpi]').prop('selected', true);
    $('#ufdata7 option[value=g_dpi]').prop('selected', true);
    $('#ufdata8 option[value=h_dpi]').prop('selected', true);
    $('#ufdata9 option[value=i_dpi]').prop('selected', true);
    $('#ufdata10 option[value=j_dpi]').prop('selected', true);
    $('#ufdata11 option[value=k_dpi]').prop('selected', true);
    $('#chart_type1 option[value=spline]').prop('selected', true);
    $('#chart_type2 option[value=spline]').prop('selected', true);
    $('#chart_type3 option[value=spline]').prop('selected', true);
    $('#chart_type4 option[value=spline]').prop('selected', true);
    $('#chart_type5 option[value=spline]').prop('selected', true);
    $('#chart_type6 option[value=spline]').prop('selected', true);
    $('#chart_type7 option[value=spline]').prop('selected', true);
    $('#chart_type8 option[value=spline]').prop('selected', true);
    $('#chart_type9 option[value=spline]').prop('selected', true);
    $('#chart_type10 option[value=spline]').prop('selected', true);
    $('#chart_type11 option[value=spline]').prop('selected', true);
    $('#marker1,#marker2,#marker3,#marker4,#marker5,#marker6,#marker7,#marker8,#marker9,#marker10,#marker11').attr('value', '1.5');
    $('#line_width1,#line_width2,#line_width3,#line_width4,#line_width5,#line_width6,#line_width7,#line_width8,#line_width9,#line_width10,#line_width11').attr('value', '1');
    $('#chr_title').attr('value', 'Skids DP');
    queryStream();
    }
function skidECGroup1(){ 
    $("#line1").prop( "checked", true );
    $("#line2").prop( "checked", true );
    $("#line3").prop( "checked", true );
    $("#line4").prop( "checked", true );
    $("#line5").prop( "checked", true );
    $("#line6").prop( "checked", true );
    $("#line7").prop( "checked", false );
    $("#line8").prop( "checked", false );
    $("#line9").prop( "checked", false );
    $("#line10").prop( "checked", false );
    $("#line11").prop( "checked", false );
    $('#ufdata1 option[value=a_rear_ec]').prop('selected', true);
    $('#ufdata2 option[value=b_rear_ec]').prop('selected', true);
    $('#ufdata3 option[value=c_rear_ec]').prop('selected', true);
    $('#ufdata4 option[value=h_rear_ec]').prop('selected', true);
    $('#ufdata5 option[value=j_rear_ec]').prop('selected', true);
    $('#ufdata6 option[value=k_rear_ec]').prop('selected', true);
    $('#ufdata7 option[value=g_rear_ec]').prop('selected', true);
    $('#ufdata8 option[value=h_rear_ec]').prop('selected', true);
    $('#ufdata9 option[value=i_rear_ec]').prop('selected', true);
    $('#ufdata10 option[value=j_rear_ec]').prop('selected', true);
    $('#ufdata11 option[value=k_rear_ec]').prop('selected', true);
    $('#chart_type1 option[value=spline]').prop('selected', true);
    $('#chart_type2 option[value=spline]').prop('selected', true);
    $('#chart_type3 option[value=spline]').prop('selected', true);
    $('#chart_type4 option[value=spline]').prop('selected', true);
    $('#chart_type5 option[value=spline]').prop('selected', true);
    $('#chart_type6 option[value=spline]').prop('selected', true);
    $('#chart_type7 option[value=spline]').prop('selected', true);
    $('#chart_type8 option[value=spline]').prop('selected', true);
    $('#chart_type9 option[value=spline]').prop('selected', true);
    $('#chart_type10 option[value=spline]').prop('selected', true);
    $('#chart_type11 option[value=spline]').prop('selected', true);
    $('#marker1,#marker2,#marker3,#marker4,#marker5,#marker6,#marker7,#marker8,#marker9,#marker10,#marker11').attr('value', '1.5');
    $('#line_width1,#line_width2,#line_width3,#line_width4,#line_width5,#line_width6,#line_width7,#line_width8,#line_width9,#line_width10,#line_width11').attr('value', '1');
    $('#chr_title').attr('value', 'Skids Conductivity with New Membranes');
    queryStream();
    
    }
    function skidECGroup2(){ 
        $("#line1").prop( "checked", true );
        $("#line2").prop( "checked", true );
        $("#line3").prop( "checked", true );
        $("#line4").prop( "checked", true );
        $("#line5").prop( "checked", true );
        $("#line6").prop( "checked", false );
        $("#line7").prop( "checked", false );
        $("#line8").prop( "checked", false );
        $("#line9").prop( "checked", false );
        $("#line10").prop( "checked", false );
        $("#line11").prop( "checked", false );
        $('#ufdata1 option[value=d_rear_ec]').prop('selected', true);
        $('#ufdata2 option[value=e_rear_ec]').prop('selected', true);
        $('#ufdata3 option[value=f_rear_ec]').prop('selected', true);
        $('#ufdata4 option[value=g_rear_ec]').prop('selected', true);
        $('#ufdata5 option[value=i_rear_ec]').prop('selected', true);
        $('#ufdata6 option[value=a_rear_ec]').prop('selected', true);
        $('#ufdata7 option[value=b_rear_ec]').prop('selected', true);
        $('#ufdata8 option[value=c_rear_ec]').prop('selected', true);
        $('#ufdata9 option[value=h_rear_ec]').prop('selected', true);
        $('#ufdata10 option[value=j_rear_ec]').prop('selected', true);
        $('#ufdata11 option[value=k_rear_ec]').prop('selected', true);
        $('#chart_type1 option[value=spline]').prop('selected', true);
        $('#chart_type2 option[value=spline]').prop('selected', true);
        $('#chart_type3 option[value=spline]').prop('selected', true);
        $('#chart_type4 option[value=spline]').prop('selected', true);
        $('#chart_type5 option[value=spline]').prop('selected', true);
        $('#chart_type6 option[value=spline]').prop('selected', true);
        $('#chart_type7 option[value=spline]').prop('selected', true);
        $('#chart_type8 option[value=spline]').prop('selected', true);
        $('#chart_type9 option[value=spline]').prop('selected', true);
        $('#chart_type10 option[value=spline]').prop('selected', true);
        $('#chart_type11 option[value=spline]').prop('selected', true);
        $('#marker1,#marker2,#marker3,#marker4,#marker5,#marker6,#marker7,#marker8,#marker9,#marker10,#marker11').attr('value', '1.5');
        $('#line_width1,#line_width2,#line_width3,#line_width4,#line_width5,#line_width6,#line_width7,#line_width8,#line_width9,#line_width10,#line_width11').attr('value', '1');
        $('#chr_title').attr('value', 'Skids Conductivity with Old membranes');
        queryStream();
        
        }
        function skidECAll(){ 
            $("#line1").prop( "checked", true );
            $("#line2").prop( "checked", true );
            $("#line3").prop( "checked", true );
            $("#line4").prop( "checked", true );
            $("#line5").prop( "checked", true );
            $("#line6").prop( "checked", true );
            $("#line7").prop( "checked", true );
            $("#line8").prop( "checked", true );
            $("#line9").prop( "checked", true );
            $("#line10").prop( "checked", true );
            $("#line11").prop( "checked", true );
            $('#ufdata1 option[value=a_rear_ec]').prop('selected', true);
            $('#ufdata2 option[value=b_rear_ec]').prop('selected', true);
            $('#ufdata3 option[value=c_rear_ec]').prop('selected', true);
            $('#ufdata4 option[value=d_rear_ec]').prop('selected', true);
            $('#ufdata5 option[value=e_rear_ec]').prop('selected', true);
            $('#ufdata6 option[value=f_rear_ec]').prop('selected', true);
            $('#ufdata7 option[value=g_rear_ec]').prop('selected', true);
            $('#ufdata8 option[value=h_rear_ec]').prop('selected', true);
            $('#ufdata9 option[value=i_rear_ec]').prop('selected', true);
            $('#ufdata10 option[value=j_rear_ec]').prop('selected', true);
            $('#ufdata11 option[value=k_rear_ec]').prop('selected', true);
            $('#chart_type1 option[value=spline]').prop('selected', true);
            $('#chart_type2 option[value=spline]').prop('selected', true);
            $('#chart_type3 option[value=spline]').prop('selected', true);
            $('#chart_type4 option[value=spline]').prop('selected', true);
            $('#chart_type5 option[value=spline]').prop('selected', true);
            $('#chart_type6 option[value=spline]').prop('selected', true);
            $('#chart_type7 option[value=spline]').prop('selected', true);
            $('#chart_type8 option[value=spline]').prop('selected', true);
            $('#chart_type9 option[value=spline]').prop('selected', true);
            $('#chart_type10 option[value=spline]').prop('selected', true);
            $('#chart_type11 option[value=spline]').prop('selected', true);
            $('#marker1,#marker2,#marker3,#marker4,#marker5,#marker6,#marker7,#marker8,#marker9,#marker10,#marker11').attr('value', '1.5');
            $('#line_width1,#line_width2,#line_width3,#line_width4,#line_width5,#line_width6,#line_width7,#line_width8,#line_width9,#line_width10,#line_width11').attr('value', '1');
            $('#chr_title').attr('value', 'Skids Conductivity');
            queryStream();
            
            }
// DBNPA Flow  dbnpa_dosing_ppm
function dosingDBNPAFlow(){ 
    $("#line1").prop( "checked", true );
    $("#line2").prop( "checked", true );
    $("#line3").prop( "checked", true );
    $("#line4").prop( "checked", true );
    $("#line5").prop( "checked", false );
    $("#line6").prop( "checked", false );
    $("#line7").prop( "checked", false );
    $("#line8").prop( "checked", false );
    $("#line9").prop( "checked", false );
    $("#line10").prop( "checked", false );
    $("#line11").prop( "checked", false );
    $("#line12").prop( "checked", false );
    $("#line13").prop( "checked", false );
    $('#ufdata1 option[value=north_dbnpa_flow]').prop('selected', true);
    $('#ufdata2 option[value=south_dbnpa_flow]').prop('selected', true);
    $('#ufdata3 option[value=north_sbs_flow]').prop('selected', true);
    $('#ufdata4 option[value=south_sbs_flow]').prop('selected', true);
    $('#ufdata5 option[value=e_rear_ec]').prop('selected', false);
    $('#ufdata6 option[value=f_rear_ec]').prop('selected', false);
    $('#ufdata7 option[value=g_rear_ec]').prop('selected', false);
    $('#ufdata8 option[value=h_rear_ec]').prop('selected', false);
    $('#ufdata9 option[value=i_rear_ec]').prop('selected', false);
    $('#ufdata10 option[value=j_rear_ec]').prop('selected', false);
    $('#ufdata11 option[value=k_rear_ec]').prop('selected', false);
    $('#ufdata12 option[value=north_temp]').prop('selected', false);
    $('#chart_type1 option[value=scatter]').prop('selected', true);
    $('#chart_type2 option[value=scatter]').prop('selected', true);
    $('#chart_type3 option[value=scatter]').prop('selected', true);
    $('#chart_type4 option[value=scatter]').prop('selected', true);
    $('#pen1').attr('value', '#8c7ae6');
    $('#pen2').attr('value', '#e1b12c');
    $('#pen3').attr('value', '#EA2027');
    $('#pen4').attr('value', '#2ed573'); 
    $('#marker1,#marker2,#marker3,#marker4').attr('value', '3');
    $('#marker_shape1 option[value=circle]').prop('selected', true);
    $('#marker_shape2 option[value=circle]').prop('selected', true);
    $('#marker_shape3 option[value=circle]').prop('selected', true);
    $('#marker_shape4 option[value=circle]').prop('selected', true);
    $('#line_width1').attr('value', '1.5');
    $('#line_width2').attr('value', '1');
    $('#chr_title').attr('value', 'DBNPA-SBS North and South Line Flow');
    queryStream();
    
    }
    //DBNPA-SBS Flow rate PPM
    function dosingDBNPAFlowRate(){ 
        $("#line1").prop( "checked", true );
        $("#line2").prop( "checked", true );
        $("#line3").prop( "checked", true );
        $("#line4").prop( "checked", true );
        $("#line5").prop( "checked", false );
        $("#line6").prop( "checked", false );
        $("#line7").prop( "checked", false );
        $("#line8").prop( "checked", false );
        $("#line9").prop( "checked", false );
        $("#line10").prop( "checked", false );
        $("#line11").prop( "checked", false );
        $("#line12").prop( "checked", false );
        $("#line13").prop( "checked", false );
        $('#ufdata1 option[value=north_dbnpa_rate]').prop('selected', true);
        $('#ufdata2 option[value=south_dbnpa_rate]').prop('selected', true);
        $('#ufdata3 option[value=north_sbs_rate]').prop('selected', true);
        $('#ufdata4 option[value=south_sbs_rate]').prop('selected', true);
        $('#ufdata5 option[value=e_rear_ec]').prop('selected', false);
        $('#ufdata6 option[value=f_rear_ec]').prop('selected', false);
        $('#ufdata7 option[value=g_rear_ec]').prop('selected', false);
        $('#ufdata8 option[value=h_rear_ec]').prop('selected', false);
        $('#ufdata9 option[value=i_rear_ec]').prop('selected', false);
        $('#ufdata10 option[value=j_rear_ec]').prop('selected', false);
        $('#ufdata11 option[value=k_rear_ec]').prop('selected', false);
        $('#ufdata12 option[value=north_temp]').prop('selected', false);
        $('#chart_type1 option[value=scatter]').prop('selected', true);
        $('#chart_type2 option[value=scatter]').prop('selected', true);
        $('#chart_type3 option[value=scatter]').prop('selected', true);
        $('#chart_type4 option[value=scatter]').prop('selected', true);
        $('#pen1').attr('value', '#8c7ae6');
        $('#pen2').attr('value', '#e1b12c');
        $('#pen3').attr('value', '#EA2027');
        $('#pen4').attr('value', '#2ed573'); 
        $('#marker1,#marker2,#marker3,#marker4').attr('value', '3');
        $('#marker_shape1 option[value=circle]').prop('selected', true);
        $('#marker_shape2 option[value=circle]').prop('selected', true);
        $('#marker_shape3 option[value=circle]').prop('selected', true);
        $('#marker_shape4 option[value=circle]').prop('selected', true);
        $('#line_width1').attr('value', '1.5');
        $('#line_width2').attr('value', '1');
        $('#chr_title').attr('value', 'DBNPA-SBS North and South Line Flow Rate');
        queryStream();
        
        }
    // salt rejection  
    function skidSaltRejectionAll(){ 
        $("#line1").prop( "checked", true );
        $("#line2").prop( "checked", true );
        $("#line3").prop( "checked", true );
        $("#line4").prop( "checked", true );
        $("#line5").prop( "checked", true );
        $("#line6").prop( "checked", true );
        $("#line7").prop( "checked", true );
        $("#line8").prop( "checked", true );
        $("#line9").prop( "checked", true );
        $("#line10").prop( "checked", true );
        $("#line11").prop( "checked", true );
        $('#ufdata1 option[value=a_saltrejection]').prop('selected', true);
        $('#ufdata2 option[value=b_saltrejection]').prop('selected', true);
        $('#ufdata3 option[value=c_saltrejection]').prop('selected', true);
        $('#ufdata4 option[value=d_saltrejection]').prop('selected', true);
        $('#ufdata5 option[value=e_saltrejection]').prop('selected', true);
        $('#ufdata6 option[value=f_saltrejection]').prop('selected', true);
        $('#ufdata7 option[value=g_saltrejection]').prop('selected', true);
        $('#ufdata8 option[value=h_saltrejection]').prop('selected', true);
        $('#ufdata9 option[value=i_saltrejection]').prop('selected', true);
        $('#ufdata10 option[value=j_saltrejection]').prop('selected', true);
        $('#ufdata11 option[value=k_saltrejection]').prop('selected', true);
        $('#chart_type1 option[value=spline]').prop('selected', true);
        $('#chart_type2 option[value=spline]').prop('selected', true);
        $('#chart_type3 option[value=spline]').prop('selected', true);
        $('#chart_type4 option[value=spline]').prop('selected', true);
        $('#chart_type5 option[value=spline]').prop('selected', true);
        $('#chart_type6 option[value=spline]').prop('selected', true);
        $('#chart_type7 option[value=spline]').prop('selected', true);
        $('#chart_type8 option[value=spline]').prop('selected', true);
        $('#chart_type9 option[value=spline]').prop('selected', true);
        $('#chart_type10 option[value=spline]').prop('selected', true);
        $('#chart_type11 option[value=spline]').prop('selected', true);
        $('#marker1,#marker2,#marker3,#marker4,#marker5,#marker6,#marker7,#marker8,#marker9,#marker10,#marker11').attr('value', '1.5');
        $('#line_width1,#line_width2,#line_width3,#line_width4,#line_width5,#line_width6,#line_width7,#line_width8,#line_width9,#line_width10,#line_width11').attr('value', '1');
        $('#chr_title').attr('value', 'Salt Rejection %');
        queryStream();
        }
// salt rejection Group-1
function skidSaltRejectionGroup1(){ 
    $("#line1").prop( "checked", true );
    $("#line2").prop( "checked", true );
    $("#line3").prop( "checked", true );
    $("#line4").prop( "checked", true );
    $("#line5").prop( "checked", true );
    $("#line6").prop( "checked", true );
    $("#line7").prop( "checked", true );
    $("#line8").prop( "checked", true );
    $("#line9").prop( "checked", true );
    $("#line10").prop( "checked", true );
    $("#line11").prop( "checked", true );
    $('#ufdata1 option[value=a_saltrejection]').prop('selected', true);
    $('#ufdata2 option[value=b_saltrejection]').prop('selected', true);
    $('#ufdata3 option[value=c_saltrejection]').prop('selected', true);
    $('#ufdata4 option[value=d_saltrejection]').prop('selected', true);
    $('#ufdata5 option[value=e_saltrejection]').prop('selected', true);
    $('#ufdata6 option[value=f_saltrejection]').prop('selected', true);
    $('#ufdata7 option[value=g_saltrejection]').prop('selected', true);
    $('#ufdata8 option[value=h_saltrejection]').prop('selected', true);
    $('#ufdata9 option[value=i_saltrejection]').prop('selected', true);
    $('#ufdata10 option[value=j_saltrejection]').prop('selected', true);
    $('#ufdata11 option[value=k_saltrejection]').prop('selected', true);
    $('#chart_type1 option[value=spline]').prop('selected', true);
    $('#chart_type2 option[value=spline]').prop('selected', true);
    $('#chart_type3 option[value=spline]').prop('selected', true);
    $('#chart_type4 option[value=spline]').prop('selected', true);
    $('#chart_type5 option[value=spline]').prop('selected', true);
    $('#chart_type6 option[value=spline]').prop('selected', true);
    $('#chart_type7 option[value=spline]').prop('selected', true);
    $('#chart_type8 option[value=spline]').prop('selected', true);
    $('#chart_type9 option[value=spline]').prop('selected', true);
    $('#chart_type10 option[value=spline]').prop('selected', true);
    $('#chart_type11 option[value=spline]').prop('selected', true);
    $('#marker1,#marker2,#marker3,#marker4,#marker5,#marker6,#marker7,#marker8,#marker9,#marker10,#marker11').attr('value', '1.5');
    $('#line_width1,#line_width2,#line_width3,#line_width4,#line_width5,#line_width6,#line_width7,#line_width8,#line_width9,#line_width10,#line_width11').attr('value', '1');
    $('#chr_title').attr('value', 'Skids with New Membranes Salt Rejection %');
    queryStream();
    }
// salt rejection Group-2
function skidSaltRejectionGroup2(){ 
    $("#line1").prop( "checked", true );
    $("#line2").prop( "checked", true );
    $("#line3").prop( "checked", true );
    $("#line4").prop( "checked", true );
    $("#line5").prop( "checked", true );
    $("#line6").prop( "checked", true );
    $("#line7").prop( "checked", true );
    $("#line8").prop( "checked", true );
    $("#line9").prop( "checked", true );
    $("#line10").prop( "checked", true );
    $("#line11").prop( "checked", true );
    $('#ufdata1 option[value=a_saltrejection]').prop('selected', true);
    $('#ufdata2 option[value=b_saltrejection]').prop('selected', true);
    $('#ufdata3 option[value=c_saltrejection]').prop('selected', true);
    $('#ufdata4 option[value=d_saltrejection]').prop('selected', true);
    $('#ufdata5 option[value=e_saltrejection]').prop('selected', true);
    $('#ufdata6 option[value=f_saltrejection]').prop('selected', true);
    $('#ufdata7 option[value=g_saltrejection]').prop('selected', true);
    $('#ufdata8 option[value=h_saltrejection]').prop('selected', true);
    $('#ufdata9 option[value=i_saltrejection]').prop('selected', true);
    $('#ufdata10 option[value=j_saltrejection]').prop('selected', true);
    $('#ufdata11 option[value=k_saltrejection]').prop('selected', true);
    $('#chart_type1 option[value=spline]').prop('selected', true);
    $('#chart_type2 option[value=spline]').prop('selected', true);
    $('#chart_type3 option[value=spline]').prop('selected', true);
    $('#chart_type4 option[value=spline]').prop('selected', true);
    $('#chart_type5 option[value=spline]').prop('selected', true);
    $('#chart_type6 option[value=spline]').prop('selected', true);
    $('#chart_type7 option[value=spline]').prop('selected', true);
    $('#chart_type8 option[value=spline]').prop('selected', true);
    $('#chart_type9 option[value=spline]').prop('selected', true);
    $('#chart_type10 option[value=spline]').prop('selected', true);
    $('#chart_type11 option[value=spline]').prop('selected', true);
    $('#marker1,#marker2,#marker3,#marker4,#marker5,#marker6,#marker7,#marker8,#marker9,#marker10,#marker11').attr('value', '1.5');
    $('#line_width1,#line_width2,#line_width3,#line_width4,#line_width5,#line_width6,#line_width7,#line_width8,#line_width9,#line_width10,#line_width11').attr('value', '1');
    $('#chr_title').attr('value', 'Skids with Old Membranes Salt Rejection %');
    queryStream();
    }
// DBNPA series 
function DBNPALab(){ 
    $("#line12").prop( "checked", true );
    $("#line13").prop( "checked", true );
    $('#ufdata12 option[value=feed_side_dbnpa]').prop('selected', true);
    $('#ufdata13 option[value=brine_side_dbnpa]').prop('selected', true);
    $('#chart_type12 option[value=scatter]').prop('selected', true);
    $('#chart_type13 option[value=scatter]').prop('selected', true); 
    $('#marker12,#marker13').attr('value', '3.5');
    $('#pen12').attr('value', '#3498db');
    $('#pen13').attr('value', '#27ae60');
    $('#line_width12').attr('value', '0');
    $('#line_width13').attr('value', '0');
    queryStream();
    }
// DBNPA series
function SBSROFeed(){ 
    $("#line12").prop( "checked", true );
    $("#line13").prop( "checked", true );
    $('#ufdata12 option[value=north_sbs_rate]').prop('selected', true);
    $('#ufdata13 option[value=south_sbs_rate]').prop('selected', true);
    $('#chart_type12 option[value=scatter]').prop('selected', true);
    $('#chart_type13 option[value=scatter]').prop('selected', true); 
    $('#marker12,#marker13').attr('value', '2.0');
    $('#pen12').attr('value', '#3498db');
    $('#pen13').attr('value', '#27ae60');
    $('#line_width12').attr('value', '0');
    $('#line_width13').attr('value', '0');
    queryStream();
    }
function temperatureROFeed(){ 
    $("#line12").prop( "checked", true );
    $("#line13").prop( "checked", false );
    $('#ufdata12 option[value=north_temp]').prop('selected', true);
    $('#ufdata13 option[value=south_temp]').prop('selected', true);
    $('#chart_type12 option[value=spline]').prop('selected', true);
    $('#chart_type13 option[value=spline]').prop('selected', true); 
    $('#marker12,#marker13').attr('value', '1.0');
    $('#pen12').attr('value', '#ffc048');
    $('#pen13').attr('value', '#ffa801');
    $('#line_width12').attr('value', '1');
    $('#line_width13').attr('value', '1');
    queryStream();
    }
//Plant Capacity-Feed Flow
function plantcapacityFeedFlow(){ 
    $("#line11").prop( "checked", true );
    $("#line12").prop( "checked", true );
    $("#line13").prop( "checked", true );
    $('#ufdata11 option[value=plant_capacity]').prop('selected', true);
    $('#ufdata12 option[value=north_rofeed]').prop('selected', true);
    $('#ufdata13 option[value=south_rofeed]').prop('selected', true);
    $('#chart_type11 option[value=spline]').prop('selected', true);
    $('#chart_type12 option[value=spline]').prop('selected', true);
    $('#chart_type13 option[value=spline]').prop('selected', true); 
    $('#marker11,#marker12,#marker13').attr('value', '1.0');
    $('#pen11').attr('value', '#ff3f34');
    $('#pen12').attr('value', '#05c46b');
    $('#pen13').attr('value', '#0fbcf9');
    $('#line_width11,#line_width12,#line_width13').attr('value', '1');
    queryStream();
    }
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
    this.lineWidth = parseFloat($("#line_width" + target).val());
    this.markerWeight = parseFloat($("#marker" + target).val());
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
        title:$("#chr_title").val(),
    };
    
    let s1Param = new Stream(1);
    let s2Param = new Stream(2);
    let s3Param = new Stream(3);
    let s4Param = new Stream(4);
    let s5Param = new Stream(5);
    let s6Param = new Stream(6);
    let s7Param = new Stream(7);
    let s8Param = new Stream(8);
    let s9Param = new Stream(9);
    let s10Param = new Stream(10);
    let s11Param = new Stream(11);
    let s12Param = new Stream(12);
    let s13Param = new Stream(13);
    

    let d1 = s1Param.series;
    let d2 = s2Param.series;
    let d3 = s3Param.series;
    let d4 = s4Param.series;
    let d5 = s5Param.series;
    let d6 = s6Param.series;
    let d7 = s7Param.series;
    let d8 = s8Param.series;
    let d9 = s9Param.series;
    let d10 = s10Param.series;
    let d11 = s11Param.series;
    let d12 = s12Param.series;
    let d13 = s13Param.series;
    let date1 = plotParam.dateFrom;
    let date2 = plotParam.dateTo;
    const csrfToken = document.head.querySelector(
        "[name~=csrf-token][content]"
    ).content;
    const query_data = new URLSearchParams({
        from: plotParam.dateFrom,
        dateto: plotParam.dateTo,
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
        ufdata8: s8Param.ufData,
        ufdata9: s9Param.ufData,
        ufdata10: s10Param.ufData,
        ufdata11: s11Param.ufData,
        ufdata12: s12Param.ufData,
        ufdata13: s13Param.ufData,
        d1: d1,
        d2: d2,
        d3: d3,
        d4: d4,
        d5: d5,
        d6: d6,
        d7: d7,
        d8: d8,
        d9: d9,
        d10: d10,
        d11:d11,
        d12:d12,
        d13:d13
    });
    fetch(window.location.href, {
        method: "POST",
        body: query_data,
        headers: { "x-CSRF-TOKEN": csrfToken },
    })
        .then((response) => response.text())
        .then((data) => {
            try {
                let dataStream = JSON.parse(data);
                let date = dataStream[0];
                let dataSeries1 = dataStream[1];
                let dataSeries2 = dataStream[2];
                let dataSeries3 = dataStream[3];
                let dataSeries4 = dataStream[4];
                let dataSeries5 = dataStream[5];
                let dataSeries6 = dataStream[6];
                let dataSeries7 = dataStream[7];
                let dataSeries8 = dataStream[8];
                let dataSeries9 = dataStream[9];
                let dataSeries10 = dataStream[10];
                let dataSeries11 = dataStream[11];
                let dataSeries12 = dataStream[12];
                let dataSeries13 = dataStream[13];
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
                        day_x +
                        " " +
                        siri_month +
                        " " +
                        siri_fullyear +
                        " " +
                        timex;
                    datex.push(series_date_conts);
                }
                // x-axis interval calculations
                let tickcal = 0;
                let date_length = date22.length;
                let core_factor = date_length / 18;
                tickcal = Math.round(core_factor);
                tickcal = parseInt(tickcal);

                dataSeries1 = dataSeries1.map(parseFloat);
                dataSeries2 = dataSeries2.map(parseFloat);
                dataSeries3 = dataSeries3.map(parseFloat);
                dataSeries4 = dataSeries4.map(parseFloat);
                dataSeries5 = dataSeries5.map(parseFloat);
                dataSeries6 = dataSeries6.map(parseFloat);
                dataSeries7 = dataSeries7.map(parseFloat);
                dataSeries8 = dataSeries8.map(parseFloat);
                dataSeries9 = dataSeries9.map(parseFloat);
                dataSeries10 = dataSeries10.map(parseFloat);
                dataSeries11 = dataSeries11.map(parseFloat);
                dataSeries12 = dataSeries12.map(parseFloat);
                dataSeries13 = dataSeries13.map(parseFloat);

                function seriesLook(dv, series) {
                    if (dv) {
                        $("#pen" + series).show(900);
                        $("#ufdata" + series).show(1200);
                        $("#panel" + series).show(900);
                        $("#data_length" + series).show(900);
                        $("#data_max" + series).show(900);
                        $("#data_min" + series).show(900);
                        $("#data_avg" + series).show(900);
                        $("#sum" + series).show(900);
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
                        $("#sum" + series).hide(900);
                        $(".tr" + series)
                            .removeClass("table-light")
                            .addClass("table-secondary");
                        $("#unit" + series).html(" ");
                    }
                }

                function seriesData(
                    stream,
                    series,
                    go,
                    valLimit,
                    offset,
                    unit,
                    sum
                ) {
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
                            let dmax1 = collection.reduce(function (a, b) {
                                return Math.max(a, b);
                            });
                            let dmin1 = collection.reduce(function (a, b) {
                                return Math.min(a, b);
                            });
                            var x_sum1 = collection.reduce(function (a, b) {
                                return a + b;
                            });
                            let avera1 =
                                collection.reduce((a, b) => a + b, 0) /
                                collection.length;
                            $("#data_max" + series).html(
                                dmax1.toFixed(valLimit)
                            );
                            $("#data_min" + series).html(
                                dmin1.toFixed(valLimit)
                            );
                            $("#data_avg" + series).html(
                                avera1.toFixed(valLimit)
                            );
                            if (sum) {
                                $("#sum" + series).show(1000);
                                $("#sum" + series).html(
                                    x_sum1.toFixed(valLimit)
                                );
                            } else {
                                $("#sum" + series).html(" ");
                                $("#sum" + series).hide(1000);
                            }
                        } else {
                            Notiflix.Notify.Failure(
                                "Series" + series + " : check data Query"
                            );
                            document.getElementById("marquee1").innerHTML = '<marquee class="text-danger" loop="2">Series '+series+' No Data Found!</marquee>';
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
                    date1_day +
                    "-" +
                    full_months_array[date1_month] +
                    "-" +
                    full_year1;
                var date2_mode =
                    date2_day +
                    "-" +
                    full_months_array[date2_month] +
                    "-" +
                    full_year2;
                var dates_diff_cal = getNumberOfDays(
                    datex[0],
                    datex[datex.length - 1]
                );
                renderedChart();
                $(".chart_render").change(function () {
                    renderedChart();
                });
                $(".filter").click(function () {
                    renderedChart();
                });
                function renderedChart() {
                    const st = {
                        a_dpi: {
                            unit: " bar",
                            name: "41A",
                            yAxis: 2,
                            arrFlr: 0.1,
                            valFixTo: 2,
                            sum: false,
                        },
                        b_dpi: {
                            unit: " bar",
                            name: "41B",
                            yAxis: 2,
                            arrFlr: 0.1,
                            valFixTo: 2,
                            sum: false,
                        },
                        c_dpi: {
                            unit: " bar",
                            name: "41C",
                            yAxis: 2,
                            arrFlr: 0.1,
                            valFixTo: 2,
                            sum: false,
                        },
                        d_dpi: {
                            unit: " bar",
                            name: "41D",
                            yAxis: 2,
                            arrFlr: 0.1,
                            valFixTo: 2,
                            sum: false,
                        },
                        e_dpi: {
                            unit: " bar",
                            name: "41E",
                            yAxis: 2,
                            arrFlr: 0.1,
                            valFixTo: 2,
                            sum: false,
                        },
                        f_dpi: {
                            unit: " bar",
                            name: "41F",
                            yAxis: 2,
                            arrFlr: 0.1,
                            valFixTo: 2,
                            sum: false,
                        },
                        g_dpi: {
                            unit: " bar",
                            name: "41G",
                            yAxis: 2,
                            arrFlr: 0.1,
                            valFixTo: 2,
                            sum: false,
                        },
                        h_dpi: {
                            unit: " bar",
                            name: "41H",
                            yAxis: 2,
                            arrFlr: 0.1,
                            valFixTo: 2,
                            sum: false,
                        },
                        i_dpi: {
                            unit: " bar",
                            name: "41I",
                            yAxis: 2,
                            arrFlr: 0.1,
                            valFixTo: 2,
                            sum: false,
                        },
                        j_dpi: {
                            unit: " bar",
                            name: "41J",
                            yAxis: 2,
                            arrFlr: 0.1,
                            valFixTo: 2,
                            sum: false,
                        },
                        k_dpi: {
                            unit: " bar",
                            name: "41K",
                            yAxis: 2,
                            arrFlr: 0.1,
                            valFixTo: 2,
                            sum: false,
                        },

                        north_rofeed: {
                            unit: " m<sup>3</sup>/h",
                            name: "RO Feed NL",
                            yAxis: 5,
                            arrFlr: 1,
                            valFixTo: 0,
                            sum: false,
                        },
                        south_rofeed: {
                            unit: " m<sup>3</sup>/h",
                            name: "RO Feed SL",
                            yAxis: 5,
                            arrFlr: 1,
                            valFixTo: 0,
                            sum: false,
                        },
                        north_dbnpa_flow: {
                            unit: " l/h",
                            name: "DBNPA NL FLow",
                            yAxis: 8,
                            arrFlr: 1,
                            valFixTo: 0,
                            sum: false,
                        },
                        south_dbnpa_flow: {
                            unit: " l/h",
                            name: "DBNPA SL FLow",
                            yAxis: 8,
                            arrFlr: 1,
                            valFixTo: 0,
                            sum: false,
                        },
                        north_sbs_flow: {
                            unit: " l/h",
                            name: "SBS SL FLow",
                            yAxis: 8,
                            arrFlr: 1,
                            valFixTo: 0,
                            sum: false,
                        },
                        south_sbs_flow: {
                            unit: " l/h",
                            name: "SBS SL FLow",
                            yAxis: 8,
                            arrFlr: 1,
                            valFixTo: 0,
                            sum: false,
                        },
                        north_dbnpa_rate: {
                            unit: " PPM",
                            name: "DBNPA NL dosing Rate",
                            yAxis: 1,
                            arrFlr: 1,
                            valFixTo: 1,
                            sum: false,
                        },

                        south_dbnpa_rate: {
                            unit: " PPM",
                            name: "DBNPA SL dosing Rate",
                            yAxis: 1,
                            arrFlr: 1,
                            valFixTo: 1,
                            sum: false,
                        },


                        brine_side_dbnpa: {
                            unit: " PPM",
                            name: "DBNPA-Brine",
                            yAxis: 1,
                            arrFlr: 1,
                            valFixTo: 1,
                            sum: false,
                        },
                        feed_side_dbnpa: {
                            unit: " PPM",
                            name: "DBNPA-Feed",
                            yAxis: 1,
                            arrFlr: 1,
                            valFixTo: 1,
                            sum: false,
                        },


                        north_sbs_rate: {
                            unit: " PPM",
                            name: "SBS NL dosing Rate",
                            yAxis: 1,
                            arrFlr: 1,
                            valFixTo: 1,
                            sum: false,
                        },

                        south_sbs_rate: {
                            unit: " PPM",
                            name: "SBS NL dosing Rate",
                            yAxis: 1,
                            arrFlr: 1,
                            valFixTo: 1,
                            sum: false,
                        },

                        a_saltrejection: {
                            unit: " %",
                            name: "41A",
                            yAxis: 4,
                            arrFlr: 1,
                            valFixTo: 1,
                            sum: false,
                        },
                        b_saltrejection: {
                            unit: " %",
                            name: "41B",
                            yAxis: 4,
                            arrFlr: 1,
                            valFixTo: 1,
                            sum: false,
                        },
                        c_saltrejection: {
                            unit: " %",
                            name: "41C",
                            yAxis: 4,
                            arrFlr: 1,
                            valFixTo: 1,
                            sum: false,
                        },
                        d_saltrejection: {
                            unit: " %",
                            name: "41D",
                            yAxis: 4,
                            arrFlr: 1,
                            valFixTo: 1,
                            sum: false,
                        },
                        e_saltrejection: {
                            unit: " %",
                            name: "41E",
                            yAxis: 4,
                            arrFlr: 1,
                            valFixTo: 1,
                            sum: false,
                        },
                        f_saltrejection: {
                            unit: " %",
                            name: "41F",
                            yAxis: 4,
                            arrFlr: 1,
                            valFixTo: 1,
                            sum: false,
                        },
                        g_saltrejection: {
                            unit: " %",
                            name: "41G",
                            yAxis: 4,
                            arrFlr: 1,
                            valFixTo: 1,
                            sum: false,
                        },
                        h_saltrejection: {
                            unit: " %",
                            name: "41H",
                            yAxis: 4,
                            arrFlr: 1,
                            valFixTo: 1,
                            sum: false,
                        },
                        i_saltrejection: {
                            unit: " %",
                            name: "41I",
                            yAxis: 4,
                            arrFlr: 1,
                            valFixTo: 1,
                            sum: false,
                        },
                        j_saltrejection: {
                            unit: " %",
                            name: "41J",
                            yAxis: 4,
                            arrFlr: 1,
                            valFixTo: 1,
                            sum: false,
                        },
                        k_saltrejection: {
                            unit: " %",
                            name: "41K",
                            yAxis: 4,
                            arrFlr: 1,
                            valFixTo: 1,
                            sum: false,
                        },
                        a_rear_ec: {
                            unit: " uS/cm",
                            name: "41A",
                            yAxis: 6,
                            arrFlr: 1,
                            valFixTo: 0,
                            sum: false,
                        },

                        b_rear_ec: {
                            unit: " uS/cm",
                            name: "41B",
                            yAxis: 6,
                            arrFlr: 1,
                            valFixTo: 0,
                            sum: false,
                        },

                        c_rear_ec: {
                            unit: " uS/cm",
                            name: "41C",
                            yAxis: 6,
                            arrFlr: 1,
                            valFixTo: 0,
                            sum: false,
                        },
                        d_rear_ec: {
                            unit: " uS/cm",
                            name: "41D",
                            yAxis: 6,
                            arrFlr: 1,
                            valFixTo: 0,
                            sum: false,
                        },
                        e_rear_ec: {
                            unit: " uS/cm",
                            name: "41E",
                            yAxis: 6,
                            arrFlr: 1,
                            valFixTo: 0,
                            sum: false,
                        },
                        f_rear_ec: {
                            unit: " uS/cm",
                            name: "41F",
                            yAxis: 6,
                            arrFlr: 1,
                            valFixTo: 0,
                            sum: false,
                        },
                        g_rear_ec: {
                            unit: " uS/cm",
                            name: "41G",
                            yAxis: 6,
                            arrFlr: 1,
                            valFixTo: 0,
                            sum: false,
                        },
                        h_rear_ec: {
                            unit: " uS/cm",
                            name: "41H",
                            yAxis: 6,
                            arrFlr: 1,
                            valFixTo: 0,
                            sum: false,
                        },
                        i_rear_ec: {
                            unit: " uS/cm",
                            name: "41I",
                            yAxis: 6,
                            arrFlr: 1,
                            valFixTo: 0,
                            sum: false,
                        },
                        j_rear_ec: {
                            unit: " uS/cm",
                            name: "41J",
                            yAxis: 6,
                            arrFlr: 1,
                            valFixTo: 0,
                            sum: false,
                        },
                        k_rear_ec: {
                            unit: " uS/cm",
                            name: "41K",
                            yAxis: 6,
                            arrFlr: 1,
                            valFixTo: 0,
                            sum: false,
                        },

                        north_orp_202: {
                            unit: " mV",
                            name: "ORP-202 NL",
                            yAxis: 3,
                            arrFlr: 1,
                            valFixTo: 0,
                            sum: false,
                        },
                        north_orp206: {
                            unit: " mV",
                            name: "ORP-206 NL",
                            yAxis: 3,
                            arrFlr: 1,
                            valFixTo: 0,
                            sum: false,
                        },
                        south_orp202: {
                            unit: " mV",
                            name: "ORP-202 SL",
                            yAxis: 3,
                            arrFlr: 1,
                            valFixTo: 0,
                            sum: false,
                        },
                        south_orp206: {
                            unit: " mV",
                            name: "ORP-206 SL",
                            yAxis: 3,
                            arrFlr: 1,
                            valFixTo: 0,
                            sum: false,
                        },

                        north_temp: {
                            unit: " °C",
                            name: "Feed Water Temp.",
                            yAxis: 10,
                            arrFlr: 1,
                            valFixTo: 2,
                            sum: false,
                        },
                        south_temp: {
                            unit: " °C",
                            name: "Temperature SL",
                            yAxis: 10,
                            arrFlr: 1,
                            valFixTo: 2,
                            sum: false,
                        },
                        north_ec: {
                            unit: " mS/cm",
                            name: "EC NL",
                            yAxis: 12,
                            arrFlr: 1,
                            valFixTo: 2,
                            sum: false,
                        },
                        south_ec: {
                            unit: " mS/cm",
                            name: "EC SL",
                            yAxis: 12,
                            arrFlr: 1,
                            valFixTo: 2,
                            sum: false,
                        },
                        plant_capacity: {
                            unit: " %",
                            name: "Plant CF",
                            yAxis: 0,
                            arrFlr: 1,
                            valFixTo: 2,
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
                    let s8Param = new ChartParam(8);
                    let s9Param = new ChartParam(9);
                    let s10Param = new ChartParam(10);
                    let s11Param = new ChartParam(11);
                    let s12Param = new ChartParam(12);
                    let s13Param = new ChartParam(13);
                    let dataTrain1 = dataSeries1;
                    let dataTrain2 = dataSeries2;
                    let dataTrain3 = dataSeries3;
                    let dataTrain4 = dataSeries4;
                    let dataTrain5 = dataSeries5;
                    let dataTrain6 = dataSeries6;
                    let dataTrain7 = dataSeries7;
                    let dataTrain8 = dataSeries8;
                    let dataTrain9 = dataSeries9;
                    let dataTrain10 = dataSeries10;
                    let dataTrain11 = dataSeries11;
                    let dataTrain12 = dataSeries12;
                    let dataTrain13 = dataSeries13;
                    seriesLook(s1Param.series, 1);
                    seriesLook(s2Param.series, 2);
                    seriesLook(s3Param.series, 3);
                    seriesLook(s4Param.series, 4);
                    seriesLook(s5Param.series, 5);
                    seriesLook(s6Param.series, 6);
                    seriesLook(s7Param.series, 7);
                    seriesLook(s8Param.series, 8);
                    seriesLook(s9Param.series, 9);
                    seriesLook(s10Param.series, 10);
                    seriesLook(s11Param.series, 11);
                    seriesLook(s12Param.series, 12);
                    seriesLook(s13Param.series, 13);
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
                    seriesData(
                        dataSeries8,
                        8,
                        s8Param.series,
                        st[s8Param.ufData]["valFixTo"],
                        st[s8Param.ufData]["arrFlr"],
                        st[s8Param.ufData]["unit"],
                        st[s8Param.ufData]["sum"]
                    );
                    seriesData(
                        dataSeries9,
                        9,
                        s9Param.series,
                        st[s9Param.ufData]["valFixTo"],
                        st[s9Param.ufData]["arrFlr"],
                        st[s9Param.ufData]["unit"],
                        st[s9Param.ufData]["sum"]
                    );
                    seriesData(
                        dataSeries10,
                        10,
                        s10Param.series,
                        st[s10Param.ufData]["valFixTo"],
                        st[s10Param.ufData]["arrFlr"],
                        st[s10Param.ufData]["unit"],
                        st[s10Param.ufData]["sum"]
                    );

                    seriesData(
                        dataSeries11,
                        11,
                        s11Param.series,
                        st[s11Param.ufData]["valFixTo"],
                        st[s11Param.ufData]["arrFlr"],
                        st[s11Param.ufData]["unit"],
                        st[s11Param.ufData]["sum"]
                    );

                    seriesData(
                        dataSeries12,
                        12,
                        s12Param.series,
                        st[s12Param.ufData]["valFixTo"],
                        st[s12Param.ufData]["arrFlr"],
                        st[s12Param.ufData]["unit"],
                        st[s12Param.ufData]["sum"]
                    );
                    seriesData(
                        dataSeries13,
                        13,
                        s13Param.series,
                        st[s13Param.ufData]["valFixTo"],
                        st[s13Param.ufData]["arrFlr"],
                        st[s13Param.ufData]["unit"],
                        st[s13Param.ufData]["sum"]
                    );

                    let dataSeries1x = dataTrain1;
                    let dataSeries2x = dataTrain2;
                    let dataSeries3x = dataTrain3;
                    let dataSeries4x = dataTrain4;
                    let dataSeries5x = dataTrain5;
                    let dataSeries6x = dataTrain6;
                    let dataSeries7x = dataTrain7;
                    let dataSeries8x = dataTrain8;
                    let dataSeries9x = dataTrain9;
                    let dataSeries10x = dataTrain10;
                    let dataSeries11x = dataTrain11;
                    let dataSeries12x = dataTrain12;
                    let dataSeries13x = dataTrain13;

                    let plotParam = {
                        dateFrom: $("#start_date").val(),
                        dateTo: $("#end_date").val(),
                        bayline: "43",
                        interval: $("#invt").val(),
                        ufqry: " ",
                        chartBackground: $("#pen_main").val(),
                        plotWidth: screen.availWidth * 0.95,
                        legendShow: $("#is_legend").is(":checked"),
                        yAxis: $("#is_main_yaxis").is(":checked"),
                        gridColor: $("#pen_grid").val(),
                        plotExpWidth: $("#export_width").val(),
                        plotExpHeight: $("#export_height").val(),
                        plotExpBackground: $("#pen_export").val(),
                        plotExpTitleColor: $("#pen_export_title").val(),
                        title:$("#chr_title").val(),

                    };
                    var stack0 = ["plant_capacity"];
                    var stack1 = [
                        "north_dbnpa_rate",
                        "south_dbnpa_rate",
                        "north_sbs_rate",
                        "brine_side_dbnpa",
                        "feed_side_dbnpa"
                    ];
                    var stack2 = [
                        "a_dpi",
                        "b_dpi",
                        "c_dpi",
                        "d_dpi",
                        "e_dpi",
                        "f_dpi",
                        "g_dpi",
                        "h_dpi",
                        "i_dpi",
                        "j_dpi",
                        "k_dpi",
                    ];
                    var stack3 = [
                        "north_orp206",
                        "north_orp_202",
                        "south_orp206",
                        "south_orp202",
                    ];
                    var stack4 = [
                        "a_saltrejection",
                        "b_saltrejection",
                        "c_saltrejection",
                        "d_saltrejection",
                        "e_saltrejection",
                        "f_saltrejection",
                        "g_saltrejection",
                        "h_saltrejection",
                        "i_saltrejection",
                        "j_saltrejection",
                        "k_saltrejection",
                    ];
                    var stack5 = ["north_rofeed", "south_rofeed"];
                    var stack6 = [
                        "a_rear_ec",
                        "b_rear_ec",
                        "c_rear_ec",
                        "d_rear_ec",
                        "e_rear_ec",
                        "f_rear_ec",
                        "g_rear_ec",
                        "h_rear_ec",
                        "i_rear_ec",
                        "j_rear_ec",
                        "k_rear_ec",
                    ];
                    var stack7 = ["xx"];
                    var stack8 = ["north_dbnpa_flow", "south_dbnpa_flow"];
                    var stack9 = ["north_hc", "south_hc"];
                    var stack10 = ["north_temp", "south_temp"];
                    var stack11 = ["north_chlorinex", "south_cl2x"];
                    var stack12 = ["north_ec", "south_ec"];
                    var stack13 = ["north_phx", "south_phx"];
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
                    var axis_Y1 =
                        (s1Param.isY && stack1.includes(s1Param.ufData)) ||
                        (s2Param.isY && stack1.includes(s2Param.ufData)) ||
                        (s3Param.isY && stack1.includes(s3Param.ufData)) ||
                        (s4Param.isY && stack1.includes(s4Param.ufData)) ||
                        (s5Param.isY && stack1.includes(s5Param.ufData)) ||
                        (s6Param.isY && stack1.includes(s6Param.ufData)) ||
                        (s7Param.isY && stack1.includes(s7Param.ufData))||
                        (s12Param.isY && stack1.includes(s12Param.ufData))
                            ? true
                            : false;
                    var axis_Y2 =
                        (s1Param.isY && stack2.includes(s1Param.ufData)) ||
                        (s2Param.isY && stack2.includes(s2Param.ufData)) ||
                        (s3Param.isY && stack2.includes(s3Param.ufData)) ||
                        (s4Param.isY && stack2.includes(s4Param.ufData)) ||
                        (s5Param.isY && stack2.includes(s5Param.ufData)) ||
                        (s6Param.isY && stack2.includes(s6Param.ufData)) ||
                        (s7Param.isY && stack2.includes(s7Param.ufData))
                            ? true
                            : false;
                    var axis_Y3 =
                        (s1Param.isY && stack3.includes(s1Param.ufData)) ||
                        (s2Param.isY && stack3.includes(s2Param.ufData)) ||
                        (s3Param.isY && stack3.includes(s3Param.ufData)) ||
                        (s4Param.isY && stack3.includes(s4Param.ufData)) ||
                        (s5Param.isY && stack3.includes(s5Param.ufData)) ||
                        (s6Param.isY && stack3.includes(s6Param.ufData)) ||
                        (s7Param.isY && stack3.includes(s7Param.ufData))
                            ? true
                            : false;
                    var axis_Y4 =
                        (s1Param.isY && stack4.includes(s1Param.ufData)) ||
                        (s2Param.isY && stack4.includes(s2Param.ufData)) ||
                        (s3Param.isY && stack4.includes(s3Param.ufData)) ||
                        (s4Param.isY && stack4.includes(s4Param.ufData)) ||
                        (s5Param.isY && stack4.includes(s5Param.ufData)) ||
                        (s6Param.isY && stack4.includes(s6Param.ufData)) ||
                        (s7Param.isY && stack4.includes(s7Param.ufData))
                            ? true
                            : false;
                    var axis_Y5 =
                        (s1Param.isY && stack5.includes(s1Param.ufData)) ||
                        (s2Param.isY && stack5.includes(s2Param.ufData)) ||
                        (s3Param.isY && stack5.includes(s3Param.ufData)) ||
                        (s4Param.isY && stack5.includes(s4Param.ufData)) ||
                        (s5Param.isY && stack5.includes(s5Param.ufData)) ||
                        (s6Param.isY && stack5.includes(s6Param.ufData)) ||
                        (s7Param.isY && stack5.includes(s7Param.ufData))
                            ? true
                            : false;
                    var axis_Y6 =
                        (s1Param.isY && stack6.includes(s1Param.ufData)) ||
                        (s2Param.isY && stack6.includes(s2Param.ufData)) ||
                        (s3Param.isY && stack6.includes(s3Param.ufData)) ||
                        (s4Param.isY && stack6.includes(s4Param.ufData)) ||
                        (s5Param.isY && stack6.includes(s5Param.ufData)) ||
                        (s6Param.isY && stack6.includes(s6Param.ufData)) ||
                        (s7Param.isY && stack6.includes(s7Param.ufData)) ||
                        (s12Param.isY && stack6.includes(s12Param.ufData))
                            ? true
                            : false;
                    var axis_Y7 =
                        (s1Param.isY && stack7.includes(s1Param.ufData)) ||
                        (s2Param.isY && stack7.includes(s2Param.ufData)) ||
                        (s3Param.isY && stack7.includes(s3Param.ufData)) ||
                        (s4Param.isY && stack7.includes(s4Param.ufData)) ||
                        (s5Param.isY && stack7.includes(s5Param.ufData)) ||
                        (s6Param.isY && stack7.includes(s6Param.ufData)) ||
                        (s7Param.isY && stack7.includes(s7Param.ufData))
                            ? true
                            : false;
                    var axis_Y8 =
                        (s1Param.isY && stack8.includes(s1Param.ufData)) ||
                        (s2Param.isY && stack8.includes(s2Param.ufData)) ||
                        (s3Param.isY && stack8.includes(s3Param.ufData)) ||
                        (s4Param.isY && stack8.includes(s4Param.ufData)) ||
                        (s5Param.isY && stack8.includes(s5Param.ufData)) ||
                        (s6Param.isY && stack8.includes(s6Param.ufData)) ||
                        (s7Param.isY && stack8.includes(s7Param.ufData))
                            ? true
                            : false;
                    var axis_Y9 =
                        (s1Param.isY && stack9.includes(s1Param.ufData)) ||
                        (s2Param.isY && stack9.includes(s2Param.ufData)) ||
                        (s3Param.isY && stack9.includes(s3Param.ufData)) ||
                        (s4Param.isY && stack9.includes(s4Param.ufData)) ||
                        (s5Param.isY && stack9.includes(s5Param.ufData)) ||
                        (s6Param.isY && stack9.includes(s6Param.ufData)) ||
                        (s7Param.isY && stack9.includes(s7Param.ufData))
                            ? true
                            : false;
                    var axis_Y10 =
                        (s1Param.isY && stack10.includes(s1Param.ufData)) ||
                        (s2Param.isY && stack10.includes(s2Param.ufData)) ||
                        (s3Param.isY && stack10.includes(s3Param.ufData)) ||
                        (s4Param.isY && stack10.includes(s4Param.ufData)) ||
                        (s5Param.isY && stack10.includes(s5Param.ufData)) ||
                        (s6Param.isY && stack10.includes(s6Param.ufData)) ||
                        (s7Param.isY && stack10.includes(s7Param.ufData))||
                        (s12Param.isY && stack10.includes(s12Param.ufData))
                            ? true
                            : false;
                    var axis_Y11 =
                        (s1Param.isY && stack11.includes(s1Param.ufData)) ||
                        (s2Param.isY && stack11.includes(s2Param.ufData)) ||
                        (s3Param.isY && stack11.includes(s3Param.ufData)) ||
                        (s4Param.isY && stack11.includes(s4Param.ufData)) ||
                        (s5Param.isY && stack11.includes(s5Param.ufData)) ||
                        (s6Param.isY && stack11.includes(s6Param.ufData)) ||
                        (s7Param.isY && stack11.includes(s7Param.ufData))
                            ? true
                            : false;
                    var axis_Y12 =
                        (s1Param.isY && stack12.includes(s1Param.ufData)) ||
                        (s2Param.isY && stack12.includes(s2Param.ufData)) ||
                        (s3Param.isY && stack12.includes(s3Param.ufData)) ||
                        (s4Param.isY && stack12.includes(s4Param.ufData)) ||
                        (s5Param.isY && stack12.includes(s5Param.ufData)) ||
                        (s6Param.isY && stack12.includes(s6Param.ufData)) ||
                        (s7Param.isY && stack12.includes(s7Param.ufData))
                            ? true
                            : false;
                    var axis_Y13 =
                        (s1Param.isY && stack13.includes(s1Param.ufData)) ||
                        (s2Param.isY && stack13.includes(s2Param.ufData)) ||
                        (s3Param.isY && stack13.includes(s3Param.ufData)) ||
                        (s4Param.isY && stack13.includes(s4Param.ufData)) ||
                        (s5Param.isY && stack13.includes(s5Param.ufData)) ||
                        (s6Param.isY && stack13.includes(s6Param.ufData)) ||
                        (s7Param.isY && stack13.includes(s7Param.ufData))
                            ? true
                            : false;
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
                                    this.resetParams = [
                                        this.chartWidth,
                                        this.chartHeight,
                                        false,
                                    ];
                                    this.setSize(1050, 590, false);
                                    this.update({
                                        chart: {
                                            plotBackgroundColor:
                                                plotParam.plotExpBackground,
                                        },
                                    });
                                    this.exportSVGElements[0].box.hide();
                                    this.exportSVGElements[1].hide();
                                    //this.update({scrollbar: {enabled: false}});
                                },
                                afterPrint() {
                                    this.setSize.apply(this, this.resetParams);
                                    this.hasUserSize = this.oldhasUserSize;
                                    this.update({
                                        chart: {
                                            plotBackgroundColor:
                                                plotParam.chartBackground,
                                        },
                                    });
                                    this.exportSVGElements[0].box.show();
                                    this.exportSVGElements[1].show();
                                    //  this.update({scrollbar: {enabled: true}});
                                },
                            },
                        },
                        title: {
                            align: "left",
                            x: 45,
                            y: 30,
                            text: plotParam.title,
                            //'+'Data From: '+datex[0] + ' hrs  To: '+datex[datex.length-1]+' hrs' ,
                            style: {
                                color: plotParam.plotExpTitleColor,
                                font: '18px "Calibri", Verdana, sans-serif',
                                fontWeight: "bold",
                            },
                        },
                        exporting: {
                            printMaxWidth: 1000,
                            allowHTML: false,
                            // url: "http://localhost:7801",
                            fallbackToExportServer: false,
                            filename:
                                "SWRO-SADARA RO Feed Quality" +
                                " " +
                                datex[0] +
                                " hrs  To: " +
                                datex[datex.length - 1] +
                                " hrs",
                            enabled: true,
                            buttons: {
                                contextButton: {
                                    align: "right",
                                    x: 0,
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
                                    plotBackgroundColor:
                                        plotParam.plotExpBackground,
                                    width: plotParam.plotExpWidth,
                                    height: plotParam.plotExpHeight,
                                },
                                boost: {
                                    pixelRatio: 2,
                                },
                            },
                        },
                        legend: {
                            layout: "horizontal",
                            align: "right",
                            enabled: plotParam.legendShow,
                            verticalAlign: "top",
                            x: -35,
                            y: -1,
                            itemStyle: {
                                fontSize: "13px",
                                fontWeight: "normal",
                                fontFamily: "BLKFort-Book, Arial, Sans-Serif",
                                color: "#000000",
                            },
                            labelFormatter: function () {
                                return this.name;
                            },
                            borderRadius: 5,
                            borderWidth: 1,
                            floating: true,
                            borderWidth: 1,
                            style: {
                                fontWeight: "bold",
                            },
                            backgroundColor: "rgba(255, 255, 255, 0.9)",
                        },
                        tooltip: {
                            //headerFormat: '{point.key}',
                            shared: true,
                            outside: false,
                            crosshair: [true, true],
                            split: false,
                            hideDelay: 1000,
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
                                    label: {
                                        enabled: true,
                                        backgroundColor: "#ffffff",
                                    },
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
                                tickPositions: [
                                    0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100,
                                ],
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
                                    label: {
                                        enabled: true,
                                        backgroundColor: "#ffffff",
                                    },
                                },
                                gridLineColor: plotParam.gridColor,
                                labels: {
                                    enabled: mainYaxis,
                                    format: "{value}",
                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
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
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                //labels: false,
                            },
                            {
                                //  [1] Dosing Rate for chemcials PPM
                                // min:0,
                                //  max:5,
                                visible: axis_Y1,
                                tickWidth: 1,
                                tickAmount: 11,
                                gridLineWidth: 0,
                                opposite: true,
                                crosshair: {
                                    color: "#ffffff",
                                    dashStyle: "Dot",
                                    width: 1.5,
                                    label: {
                                        enabled: true,
                                        backgroundColor: "#ffffff",
                                    },
                                },
                                labels: {
                                    enabled: true,
                                    format: "{value}",
                                    // formatter: function() {
                                    //    return Math.ceil(this.value);
                                    //   },
                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                title: {
                                    useHTML: true,
                                    align: "high",
                                    offset: 15,
                                    rotation: 0,
                                    y: -10,
                                    text: "PPM",
                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                //labels: false,
                                //opposite: true
                            },
                            {
                                //  [2] DPI
                                min: 1.6,
                                max: 3.6,
                                tickAmount: 11,
                                visible: axis_Y2,
                                tickWidth: 1,
                                gridLineWidth: 0,
                                crosshair: {
                                    color: "#ffffff",
                                    dashStyle: "Dot",
                                    width: 1.5,
                                    label: {
                                        enabled: true,
                                        backgroundColor: "#ffffff",
                                    },
                                },
                                labels: {
                                    enabled: true,
                                    format: "{value}",
                                    // formatter: function() {
                                    //    return Math.ceil(this.value);
                                    //    },
                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                title: {
                                    useHTML: true,
                                    align: "high",
                                    offset: 15,
                                    rotation: 0,
                                    y: -10,
                                    text: "Bar",
                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                //labels: false,
                                //opposite: true
                            },
                            {
                                //[3]  ORP-202 ORP-206
                                min: 200,
                                max: 700,
                                tickAmount: 11,
                                visible: axis_Y3,
                                opposite: true,
                                tickWidth: 1,
                                gridLineWidth: 0,
                                opposite: true,
                                crosshair: {
                                    color: "#ffffff",
                                    dashStyle: "Dot",
                                    width: 1.5,
                                    label: {
                                        enabled: true,
                                        backgroundColor: "#ffffff",
                                    },
                                },
                                labels: {
                                    enabled: true,
                                    //format: '{value}',
                                    formatter: function () {
                                        return Math.ceil(this.value);
                                    },
                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                title: {
                                    useHTML: true,
                                    align: "high",
                                    offset: 15,
                                    rotation: 0,
                                    y: -10,
                                    text: "mV",
                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                //labels: false,
                                //opposite: true
                            },

                            {
                                //[4] Salt Rejection
                                min: 95,
                                max: 100,
                                visible: axis_Y4,
                                tickWidth: 1,
                                tickAmount: 11,
                                gridLineWidth: 0,
                                crosshair: {
                                    color: "#ffffff",
                                    dashStyle: "Dot",
                                    width: 1.5,
                                    label: {
                                        enabled: true,
                                        backgroundColor: "#ffffff",
                                    },
                                },
                                labels: {
                                    enabled: true,
                                    format: "{value}",
                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                title: {
                                    useHTML: true,
                                    align: "high",
                                    offset: 15,
                                    rotation: 0,
                                    y: -10,
                                    text: "Rej-%",
                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                //labels: false,
                                //opposite: true
                            },

                            {
                                //[5]  Flow Rate
                                visible: axis_Y5,
                                tickWidth: 1,
                                tickAmount: 11,
                                gridLineWidth: 0,
                                crosshair: {
                                    color: "#ffffff",
                                    dashStyle: "Dot",
                                    width: 1.5,
                                    label: {
                                        enabled: true,
                                        backgroundColor: "#ffffff",
                                    },
                                },
                                labels: {
                                    enabled: true,
                                    //format: '{value}',
                                    formatter: function () {
                                        return Math.ceil(this.value);
                                    },
                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                title: {
                                    useHTML: true,
                                    align: "high",
                                    offset: 15,
                                    rotation: 0,
                                    y: -10,
                                    text: "m<sup>3</sup>/h",
                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                //labels: false,
                                //opposite: true
                            },

                            {
                                //[6] rear EC
                                min: 500,
                                max: 5500,
                                tickAmount: 11,
                                visible: axis_Y6,
                                tickWidth: 1,
                                opposite: false,
                                // lineColor:pen1,
                                // lineWidth:2,
                                // minorTickInterval: 'auto',
                                crosshair: {
                                    color: "#ffffff",
                                    dashStyle: "Dot",
                                    width: 1.5,
                                    label: {
                                        enabled: true,
                                        backgroundColor: "#ffffff",
                                    },
                                },
                                gridLineWidth: 0,
                                crosshair: {
                                    color: "#ffffff",
                                    dashStyle: "Dot",
                                    width: 1.5,
                                    label: {
                                        enabled: true,
                                        backgroundColor: "#ffffff",
                                    },
                                },
                                labels: {
                                    enabled: true,
                                    format: "{value}",
                                    // formatter:function(){return Math.ceil(this.value)},
                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                title: {
                                    useHTML: true,
                                    align: "high",
                                    offset: 15,
                                    rotation: 0,
                                    y: -10,
                                    text: "uS/cm",
                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                //labels: false,
                                //opposite: true
                            },

                            {
                                //[7] ORP
                                min: 150,
                                max: 400,
                                tickAmount: 11,
                                visible: axis_Y7,
                                tickWidth: 1,
                                gridLineWidth: 0,
                                crosshair: {
                                    color: "#ffffff",
                                    dashStyle: "Dot",
                                    width: 1.5,
                                    label: {
                                        enabled: true,
                                        backgroundColor: "#ffffff",
                                    },
                                },
                                labels: {
                                    enabled: true,
                                    format: "{value}",
                                    formatter: function () {
                                        return this.value.toFixed(0);
                                    },
                                    style: {
                                        color: "#009432",
                                        fontWeight: "bold",
                                    },
                                },
                                title: {
                                    useHTML: true,
                                    align: "high",
                                    offset: 10,
                                    rotation: 0,
                                    y: -10,
                                    text: "mV",
                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                //labels: false,
                                //opposite: true
                            },
                            {
                                //[8] Chemicals dosing rate
                                min:1,
                                max:100,
                                tickAmount: 11,
                                visible: axis_Y8,
                                tickWidth: 1,
                                gridLineWidth: 0,
                                crosshair: {
                                    color: "#ffffff",
                                    dashStyle: "Dot",
                                    width: 1.5,
                                    label: {
                                        enabled: true,
                                        backgroundColor: "#ffffff",
                                    },
                                },
                                labels: {
                                    enabled: true,
                                    format: "{value}",
                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                title: {
                                    useHTML: true,
                                    align: "high",
                                    offset: 15,
                                    rotation: 0,
                                    y: -10,
                                    text: "L/h",
                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                //labels: false,
                                //opposite: true
                            },
                            {
                                //[9] HC
                                min: 5,
                                max: 40,
                                tickAmount: 11,
                                visible: axis_Y9,
                                tickWidth: 1,
                                gridLineWidth: 0,
                                crosshair: {
                                    color: "#ffffff",
                                    dashStyle: "Dot",
                                    width: 1.5,
                                    label: {
                                        enabled: true,
                                        backgroundColor: "#ffffff",
                                    },
                                },
                                labels: {
                                    enabled: true,
                                    format: "{value}",
                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                title: {
                                    useHTML: true,
                                    align: "high",
                                    offset: 15,
                                    rotation: 0,
                                    y: -10,
                                    text: "ppb",
                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                //labels: false,
                                //opposite: true
                            },

                            {
                                //[10] Temp C
                                min: 26,
                                max:40,
                                tickAmount: 11,
                                visible: axis_Y10,
                                tickWidth: 1,
                                gridLineWidth: 0,
                                opposite: true,
                                crosshair: {
                                    color: "#ffffff",
                                    dashStyle: "Dot",
                                    width: 1.5,
                                    label: {
                                        enabled: true,
                                        backgroundColor: "#ffffff",
                                    },
                                },
                                labels: {
                                    enabled: true,
                                    //format: '{value}',
                                    formatter: function () {
                                        return this.value.toFixed(0);
                                    },
                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                title: {
                                    useHTML: true,
                                    align: "high",
                                    offset: 15,
                                    rotation: 0,
                                    y: -10,
                                    text: "°C",
                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                //labels: false,
                                //opposite: true
                            },
                            {
                                //[11] FRC
                                min: 0.01,
                                max: 0.11,
                                tickAmount: 11,
                                visible: axis_Y11,
                                tickWidth: 1,
                                gridLineWidth: 0,
                                crosshair: {
                                    color: "#ffffff",
                                    dashStyle: "Dot",
                                    width: 1.5,
                                    label: {
                                        enabled: true,
                                        backgroundColor: "#ffffff",
                                    },
                                },
                                labels: {
                                    enabled: true,
                                    format: "{value}",

                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                title: {
                                    useHTML: true,
                                    align: "high",
                                    offset: 15,
                                    rotation: 0,
                                    y: -10,
                                    text: "ppm",
                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                //labels: false,
                                //opposite: true
                            },
                            {
                                //[12] EC
                                min: 45,
                                max: 70,
                                tickAmount: 11,
                                visible: axis_Y12,
                                tickWidth: 1,
                                gridLineWidth: 0,
                                crosshair: {
                                    color: "#ffffff",
                                    dashStyle: "Dot",
                                    width: 1.5,
                                    label: {
                                        enabled: true,
                                        backgroundColor: "#ffffff",
                                    },
                                },
                                labels: {
                                    enabled: true,
                                    //format: '{value}',
                                    formatter: function () {
                                        return this.value.toFixed(0);
                                    },
                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                title: {
                                    useHTML: true,
                                    align: "high",
                                    offset: 15,
                                    rotation: 0,
                                    y: -10,
                                    text: "EC",
                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                //labels: false,
                                //opposite: true
                            },
                            {
                                //[13] pH
                                min: 6,
                                max: 11,
                                tickAmount: 11,
                                visible: axis_Y13,
                                tickWidth: 1,
                                gridLineWidth: 0,
                                opposite: true,
                                crosshair: {
                                    color: "#ffffff",
                                    dashStyle: "Dot",
                                    width: 1.5,
                                    label: {
                                        enabled: true,
                                        backgroundColor: "#ffffff",
                                    },
                                },
                                labels: {
                                    enabled: true,
                                    format: "{value}",

                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
                                    },
                                },
                                title: {
                                    useHTML: true,
                                    align: "high",
                                    offset: 15,
                                    rotation: 0,
                                    y: -10,
                                    text: "pH",
                                    style: {
                                        color: "#1e272e",
                                        fontWeight: "bold",
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
                                    s1Param.chartType == "scatter"
                                        ? 0
                                        : s1Param.lineWidth,
                                yAxis: st[s1Param.ufData]["yAxis"],
                                tooltip: {
                                    crosshair: [true, true],
                                    headerFormat: "{point.key}<br>",
                                    pointFormat:
                                        '<span style="color: {series.color};">\u25CF</span><small>{series.name}: </small><b>{point.y}</b> <br>',
                                    shared: true,
                                    useHTML: true,
                                    hideDelay: 1000,
                                    stickyTracking: true,
                                    valueSuffix: st[s1Param.ufData]["unit"],
                                },
                                color: s1Param.pen,
                                marker: {
                                    enabled: true,
                                    symbol: s1Param.markerShape,
                                    radius: s1Param.markerWeight,

                                    states: { hover: { enabled: false } },
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
                                    s2Param.chartType == "scatter"
                                        ? 0
                                        : s2Param.lineWidth,
                                yAxis: st[s2Param.ufData]["yAxis"],
                                tooltip: {
                                    crosshair: [true, true],
                                    headerFormat: "{point.key}<br>",
                                    pointFormat:
                                        '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small><b>{point.y}</b><br>',
                                    shared: true,
                                    useHTML: true,
                                    hideDelay: 1000,
                                    stickyTracking: true,
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
                                    s3Param.chartType == "scatter"
                                        ? 0
                                        : s3Param.lineWidth,
                                yAxis: st[s3Param.ufData]["yAxis"],
                                tooltip: {
                                    crosshair: [true, true],
                                    headerFormat: "{point.key}<br>",
                                    pointFormat:
                                        '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small><b>{point.y}</b><br>',
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
                                    s4Param.chartType == "scatter"
                                        ? 0
                                        : s4Param.lineWidth,
                                yAxis: st[s4Param.ufData]["yAxis"],
                                tooltip: {
                                    crosshair: [true, true],
                                    headerFormat: "{point.key}<br>",
                                    pointFormat:
                                        '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small> <b>{point.y}</b><br>',
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
                                    s5Param.chartType == "scatter"
                                        ? 0
                                        : s5Param.lineWidth,
                                yAxis: st[s5Param.ufData]["yAxis"],
                                tooltip: {
                                    crosshair: [true, true],
                                    headerFormat: "{point.key}<br>",
                                    pointFormat:
                                        '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small><b>{point.y}</b><br>',
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
                                    s6Param.chartType == "scatter"
                                        ? 0
                                        : s6Param.lineWidth,
                                yAxis: st[s6Param.ufData]["yAxis"],
                                tooltip: {
                                    crosshair: [true, true],
                                    headerFormat: "{point.key}<br>",
                                    pointFormat:
                                        '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small><b>{point.y}</b><br>',
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
                                    s7Param.chartType == "scatter"
                                        ? 0
                                        : s7Param.lineWidth,
                                yAxis: st[s7Param.ufData]["yAxis"],
                                tooltip: {
                                    crosshair: [true, true],
                                    headerFormat: "{point.key}<br>",
                                    pointFormat:
                                        '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small><b>{point.y}</b><br>',
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
                            {
                                name: st[s8Param.ufData]["name"],
                                type: s8Param.chartType,
                                visible: s8Param.series,
                                showInLegend: s8Param.series,
                                data: dataSeries8x,
                                lineWidth:
                                    s8Param.chartType == "scatter"
                                        ? 0
                                        : s8Param.lineWidth,
                                yAxis: st[s8Param.ufData]["yAxis"],
                                tooltip: {
                                    crosshair: [true, true],
                                    headerFormat: "{point.key}<br>",
                                    pointFormat:
                                        '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small><b>{point.y}</b><br>',
                                    shared: true,
                                    useHTML: true,
                                    valueSuffix: st[s8Param.ufData]["unit"],
                                },
                                color: s8Param.pen,
                                marker: {
                                    symbol: s8Param.markerShape,
                                    radius: s8Param.markerWeight,
                                    states: {
                                        hover: {
                                            enabled: false,
                                        },
                                    },
                                },
                                dataLabels: {
                                    enabled: s8Param.lable,
                                    style: {
                                        fontWeight: "normal",
                                        textShadow: false,
                                        textOutline: false,
                                    },
                                    color: s8Param.pen,
                                },
                                fillOpacity: 0.17,
                            },
                            {
                                name: st[s9Param.ufData]["name"],
                                type: s9Param.chartType,
                                visible: s9Param.series,
                                showInLegend: s9Param.series,
                                data: dataSeries9x,
                                lineWidth:
                                    s9Param.chartType == "scatter"
                                        ? 0
                                        : s9Param.lineWidth,
                                yAxis: st[s9Param.ufData]["yAxis"],
                                tooltip: {
                                    crosshair: [true, true],
                                    headerFormat: "{point.key}<br>",
                                    pointFormat:
                                        '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small><b>{point.y}</b><br>',
                                    shared: true,
                                    useHTML: true,
                                    valueSuffix: st[s9Param.ufData]["unit"],
                                },
                                color: s9Param.pen,
                                marker: {
                                    symbol: s9Param.markerShape,
                                    radius: s9Param.markerWeight,
                                    states: {
                                        hover: {
                                            enabled: false,
                                        },
                                    },
                                },
                                dataLabels: {
                                    enabled: s9Param.lable,
                                    style: {
                                        fontWeight: "normal",
                                        textShadow: false,
                                        textOutline: false,
                                    },
                                    color: s9Param.pen,
                                },
                                fillOpacity: 0.17,
                            },
                            {
                                name: st[s10Param.ufData]["name"],
                                type: s10Param.chartType,
                                visible: s10Param.series,
                                showInLegend: s10Param.series,
                                data: dataSeries10x,
                                lineWidth:
                                    s10Param.chartType == "scatter"
                                        ? 0
                                        : s10Param.lineWidth,
                                yAxis: st[s10Param.ufData]["yAxis"],
                                tooltip: {
                                    crosshair: [true, true],
                                    headerFormat: "{point.key}<br>",
                                    pointFormat:
                                        '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small><b>{point.y}</b><br>',
                                    shared: true,
                                    useHTML: true,
                                    valueSuffix: st[s10Param.ufData]["unit"],
                                },
                                color: s10Param.pen,
                                marker: {
                                    symbol: s10Param.markerShape,
                                    radius: s10Param.markerWeight,
                                    states: {
                                        hover: {
                                            enabled: false,
                                        },
                                    },
                                },
                                dataLabels: {
                                    enabled: s10Param.lable,
                                    style: {
                                        fontWeight: "normal",
                                        textShadow: false,
                                        textOutline: false,
                                    },
                                    color: s10Param.pen,
                                },
                                fillOpacity: 0.17,
                            },
                                // 11
                            {
                                name: st[s11Param.ufData]["name"],
                                type: s11Param.chartType,
                                visible: s11Param.series,
                                showInLegend: s11Param.series,
                                data: dataSeries11x,
                                lineWidth:
                                    s11Param.chartType == "scatter"
                                        ? 0
                                        : s11Param.lineWidth,
                                yAxis: st[s11Param.ufData]["yAxis"],
                                tooltip: {
                                    crosshair: [true, true],
                                    headerFormat: "{point.key}<br>",
                                    pointFormat:
                                        '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small><b>{point.y}</b><br>',
                                    shared: true,
                                    useHTML: true,
                                    valueSuffix: st[s11Param.ufData]["unit"],
                                },
                                color: s11Param.pen,
                                marker: {
                                    symbol: s11Param.markerShape,
                                    radius: s11Param.markerWeight,
                                    states: {
                                        hover: {
                                            enabled: false,
                                        },
                                    },
                                },
                                dataLabels: {
                                    enabled: s11Param.lable,
                                    style: {
                                        fontWeight: "normal",
                                        textShadow: false,
                                        textOutline: false,
                                    },
                                    color: s11Param.pen,
                                },
                                fillOpacity: 0.17,
                            },

                            //12

                            {
                                name: st[s12Param.ufData]["name"],
                                type: s12Param.chartType,
                                visible: s12Param.series,
                                showInLegend: s12Param.series,
                                data: dataSeries12x,
                                dashStyle: 'shortdot',
                                lineWidth:
                                    s12Param.chartType == "scatter"
                                        ? 0
                                        : s12Param.lineWidth,
                                yAxis: st[s12Param.ufData]["yAxis"],
                                tooltip: {
                                    crosshair: [true, true],
                                    headerFormat: "{point.key}<br>",
                                    pointFormat:
                                        '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small><b>{point.y}</b><br>',
                                    shared: true,
                                    useHTML: true,
                                    valueSuffix: st[s12Param.ufData]["unit"],
                                },
                                color: s12Param.pen,
                                marker: {
                                    symbol: s12Param.markerShape,
                                    radius: s12Param.markerWeight,
                                    states: {
                                        hover: {
                                            enabled: false,
                                        },
                                    },
                                },
                                dataLabels: {
                                    enabled: s12Param.lable,
                                    style: {
                                        fontWeight: "normal",
                                        textShadow: false,
                                        textOutline: false,
                                    },
                                    color: s12Param.pen,
                                },
                                fillOpacity: 0.17,
                            },

                            //13
                            {
                                name: st[s13Param.ufData]["name"],
                                type: s13Param.chartType,
                                visible: s13Param.series,
                                showInLegend: s13Param.series,
                                data: dataSeries13x,
                                lineWidth:
                                    s13Param.chartType == "scatter"
                                        ? 0
                                        : s13Param.lineWidth,
                                yAxis: st[s13Param.ufData]["yAxis"],
                                tooltip: {
                                    crosshair: [true, true],
                                    headerFormat: "{point.key}<br>",
                                    pointFormat:
                                        '<span style="color: {series.color};">\u25CF</span> <small>{series.name}: </small><b>{point.y}</b><br>',
                                    shared: true,
                                    useHTML: true,
                                    valueSuffix: st[s13Param.ufData]["unit"],
                                },
                                color: s13Param.pen,
                                marker: {
                                    symbol: s13Param.markerShape,
                                    radius: s13Param.markerWeight,
                                    states: {
                                        hover: {
                                            enabled: false,
                                        },
                                    },
                                },
                                dataLabels: {
                                    enabled: s13Param.lable,
                                    style: {
                                        fontWeight: "normal",
                                        textShadow: false,
                                        textOutline: false,
                                    },
                                    color: s13Param.pen,
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
