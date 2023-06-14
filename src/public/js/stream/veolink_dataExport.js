queryStream();

function queryStream(){


        let d1 ="test" ;
        let d2 ="Sajid" ;
        let d3 = "SADARA" ;
        let d4 = "CCR" ;
        let d5 = true ;
        let d6 = true ;
        let d7 = true ;

const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
const query_data = new URLSearchParams({d1:d1,d2:d2,d3:d3,d4:d4,d5:d5,d6:d6,d7:d7});
fetch(window.location.href,    
  {method:'PUT',
  body:query_data,
  headers:{"x-CSRF-TOKEN":csrfToken}
  })
.then(response =>response.text())
.then((data) => {
   // $("#datatest").html(data);
    console.log(data);
                      } ) 
                    
                    }




  
            
         
        
          





