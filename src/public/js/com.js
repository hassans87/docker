Notiflix.Block.Init({
    fontFamily:"Quicksand",
    useGoogleFont:true,
    backgroundColor:"rgba(0,0,0,0.86)",
    messageColor:"#dfe4ea",
    svgColor:"#18dcff",
    svgSize:"80px",
    messageFontSize:"16px"
    });
    //Notiflix.Block.Pulse('.loading-msg', 'Please wait Fetching data from server....'); 
    
    // Notiflix Notify Init - global.js
    Notiflix.Notify.Init({
      width:'250px',
      opacity:1,
      fontSize:'12px',
      timeout:3000,
      messageMaxLength:220,
      position:'right-bottom',
      cssAnimationStyle:"from-bottom",
      showOnlyTheLastOne:true,
      pauseOnHover:true
    });