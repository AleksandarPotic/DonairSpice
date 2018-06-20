	$(window).on("scroll", function() {
    if ($(this).scrollTop() > 40) {
       $("#navigation").css("background",'rgba(0,0,0,0.99)');
       $("#mobile-navigation").css("background",'rgba(0,0,0,0.99)');
    }
    else {
       $("#navigation").css("background",'rgba(0,0,0,0.75)');
       $("#mobile-navigation").css("background",'rgba(0,0,0,0.75)');
    }
 });

	$(window).on("change", function() {
      if($("#desc input").val()==10){
        console.log("nesto");
        $("#desc input").css("padding-left","30px");
      }
      else{
        $("#desc input").css("padding-left","40px");
      }
    });

  $(document).ready(function(){
    wrapFn();
  });

  function wrapFn(){
    var pathname = window.location.pathname;
        var string = "/home";
        if(pathname!=string){
          $("li .nav-link").attr("href", "/home");
        }
  }

      $(window).on("change", function() {
        if(document.getElementById('modal-toggle').checked) {
            $("body").css("overflow","hidden");
        } else {
            $("body").css("overflow","auto");
        }
      });

      $("#exit").click(function() {
        $("#modal-toggle").css("display","none");
      });
      
      if($(window).width()<576){
        $("body").css("overflowX", "hidden");
      }

      if($(window).width()<456){
        $("#turn-off").css("display","none");
        $(".specialClass").css("display","none");
      }
      else{
        $("#turn-off").css("display","table-cell");
        $(".specialClass").css("display","table-cell");
      }

        $(window).on("resize", function() {
        if($(window).width()<456){
        $("#turn-off").css("display","none");
        $(".specialClass").css("display","none");
      }
      else{
        $("#turn-off").css("display","table-cell");
        $(".specialClass").css("display","table-cell");
      }
      });

