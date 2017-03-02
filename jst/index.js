$(function(){
  $('.record td').on('click', function(){
    $(this).parent('.record').next('.companion').toggle();
  })
  $('.toggle').on('click', function(event){
    event.stopPropagation();
    $(this).toggleClass("enabled disable")
  })
});