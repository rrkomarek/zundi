$(window).load(function(){
  $(".pre-load-web").fadeOut(1000,function() { //eliminamos la capa de precarga
    $(this).remove();
  });
})
