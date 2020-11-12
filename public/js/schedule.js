$(document).ready(function(){
$('.owl-carousel').owlCarousel({
    loop:false,
    margin:10,
    nav:true,
    dots: true,
    
    responsive:{
        0:{
            items: 1
        },
     
        500:{
            items:3
        },

        600:{
            items:4
        },

        768:{
            items:5
        },
        991:{
            items:7
        },
  
    }
})

setTimeout(function(){
    $('.owl-dots .owl-dot').eq(0).html('<i class="fas fa-chevron-left"></i>')
    $('.owl-dots .owl-dot').eq(1).html('<i class="fas fa-chevron-right"></i>')
}, 0)


    $('.owl-carousel .item').click(function(){
      $('.item').removeClass("selected");
      $(this).addClass("selected");
  });

    $('a[data-video]').on('click',function(){
        $('.slider').css({'display' : 'flex'})
        var url = $('a[data-video]').attr('data-video');
        $('#videoFream').attr('src','https://www.youtube.com/embed/'+url);
        
    })
    $('.close-button').click(function(){
        $('.slider').css({'display' : 'none'})
    })
    $(".owl-stage").off(); 
    $('.active-day').off('click').on('click',function(e){
    $('.full_day').hide();
    $('footer').addClass('fixed-footer');
    $(".loader").show();
    var data = $(this).attr('data-info');
    var params = data.split('/'); 
    $.ajax({
        url: window.location.origin + "/schedule_day/" + params[0] + "/" +params[1],
        type:'GET',
        success: function(data){
            $(".loader").hide();
            $('.full_day').show();
           $('.full_day').html(data);
            if ($(document.body).height() > $(window).height()) {
            $('footer').removeClass('fixed-footer');
        }
        }
    })

})

if ($(document.body).height() < $(window).height()) {
    $('footer').addClass('fixed-footer');
}
});
