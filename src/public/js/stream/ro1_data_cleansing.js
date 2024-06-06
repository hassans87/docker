//$('.tensor-flow,.rednder').change(function(){queryStream();})
setInterval(function () {$("head title").html($("head title").html().substring(1) + $("head title").html().substring(0,1));}, 400);
$('.query_fire').click(function(){
    queryStream();})


    function queryStream(){
        Notiflix.Block.Pulse('body', 'Please Wait, feteching query data'); 
        let plotParam = {
        dateFrom:$('#start_date').val(),
        dateTo: $('#end_date').val(),
        skid:$('#skidx').val(),
        wherex:$('#where').val(),
        condition:$('#where_logic').val(),
        logicvalue:$('#where_input').val()
        }
        console.log(plotParam);
        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
        const query_data = new URLSearchParams({
        from:plotParam.dateFrom,
        dateto:plotParam.dateTo,
        skid:plotParam.skid,
        whr:plotParam.wherex,
        cond:plotParam.condition,
        logicpv:plotParam.logicvalue        
        });
        fetch(window.location.href,    
        {method:'POST',
        body:query_data,
        headers:{"x-CSRF-TOKEN":csrfToken}
        })
        .then(response =>response.text())
        .then((data) =>{
            try {
            $("#show").html(data);
            console.log(data);


            Notiflix.Notify.Success('Plot updated')
            Notiflix.Block.Remove('body'); 
        }catch(err){
            Notiflix.Report.Warning('Failure',' '+err,'Close');
            console.log(err);
            $("#plot_window").html(' ');
            $("#plot_window").css({'background-color':'black'});
        }
        
    
    })}