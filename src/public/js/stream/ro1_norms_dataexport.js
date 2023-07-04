queryStream();
$('.query_fire').click(function(){
    queryStream();})
function queryStream() {
  //Loading.standard('Loading...');
  Notiflix.Loading.pulse();
    //Notiflix.Block.Pulse(".tg", "Please Wait, feteching query data");
    let plotParam = {
        dateFrom: $("#start_date").val(),
        dateTo: $("#end_date").val(),
        ufqry: $("#skidx").val(),
        order:$("#order").val(),
    };
    const csrfToken = document.head.querySelector(
        "[name~=csrf-token][content]"
    ).content;
    const query_data = new URLSearchParams({
        skid_tag: plotParam.ufqry,
        date1: plotParam.dateFrom,
        date2: plotParam.dateTo,
        ord:plotParam.order
    });
    fetch(window.location.href, {
        method: "POST",
        body: query_data,
        headers: { "x-CSRF-TOKEN": csrfToken },
    })
        .then((response) => response.text())
        .then((data) => {
            try {
                $(".tg").html(data);
                let fname =
                    "RO 41" +
                    plotParam.ufqry.toUpperCase() +
                    " Normalization Data";
                //console.log(fname);
                document.title = fname;
                var docDefinition = {
                    // a string or { width: number, height: number }
                    pageSize: "A3",
                    // by default we use portrait, you can change it to landscape if you wish
                    pageOrientation: "landscape",

                    // [left, top, right, bottom] or [horizontal, vertical] or just a number for equal margins
                    pageMargins: [40, 60, 40, 60],
                };

                $("#myTable").DataTable({
                  
                    //responsive: true,
                    //colReorder: true,
                    scrollY:'80vh',
                  scrollX: true,
                  // scrollCollapse: true,
                  // autoWidth: true,
                    processing: true,
                    info: true,
                    paging: true,
                    lengthChange: true,
                   lengthMenu: [500, 1000, 2000, 10000],
                    dom: 'Biprt',
                    //"Biprt",
                    
                    

                    // dom: 'Blfrtip',
                    buttons: {
                      dom: {
                          button: {
                              className: 'btn btn-sm' //Primary class for all buttons
                          }
                      },
                    buttons: [
                        {
                            extend: "colvis",
                            className: 'btn btn-info btn-sm',
                            text: '<i class="fa fa-eye" aria-hidden="true"></i> Visibility'
                            
                        },
                        {
                            extend: "colvisRestore",
                            className: 'btn btn-dark btn-sm',
                            text: '<i class="fa fa-times" aria-hidden="true"></i> Restore'
                            
                        },
                        {
                            extend: "excel",
                            className: "btn btn-success btn-sm",
                            text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel',
                            filename: fname,
                        },
                                              
                        // [left, top, right, bottom] or [horizontal, vertical] or just a number for equal margins
                        {
                            extend: "print",
                            className: "btn btn-primary btn-sm",
                            text: '<i class="fa fa-print" aria-hidden="true"></i> Print',
                            
                            title: fname,
                        },
                         { extend: "pageLength", text:"Show Records", className: 'btn btn-danger btn-sm' },
                        //"pageLength",
                    ]},
                });
                Notiflix.Loading.remove();
            } catch (err) {
                Notiflix.Report.warning("Failure", " " + err, "Close");
                console.log(err);
            }

           // Notiflix.Notify.success("Plot updated");
            Notiflix.Loading.remove();
            //  Notiflix.Block.Remove("body");
        })
        .catch((error) => {
          Notiflix.Loading.remove();
            Notiflix.Report.failure("Failure", "Details: " + error, "Close");
            console.log(error);
        });
}
