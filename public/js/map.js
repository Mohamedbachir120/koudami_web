$('.client-card').mouseover(function(){
    
    var ele =$(this).children('.sp_content');
    ele.fadeIn(500);

});

$('.client-card').mouseleave(function(){
    var ele =$(this).children('.sp_content');
    
    ele.fadeOut(500);


});
function _switch(){
    if(auth==""){
        alert('vous devez être connecté pour utiliser cette fonctionnalité');
    }
    else{

    $('.users').slideToggle();
    $('#map').slideToggle(500);
   var v=$("#switch").children().first();
    if(v.attr('class')=="fa fa-map-marker"){

        v.attr('class','fa fa-bars');
        $('.crd').css('display','flex');      
    }
    else {
        v.attr('class','fa fa-map-marker');
        $('.crd').css('display','none');      
    
    }

}
}
  
