$(document).on("ready",function(){
  verticalAlign();
  $(window).on("resize",function(){
    verticalAlign();
  });

  function verticalAlign(){
    var view_height = $(window).height()/2;
    var total_height = view_height - ($("section").height()/2);

    $("section").css({ "margin-top": total_height+"px" });
    console.log(total_height);
  }

});
