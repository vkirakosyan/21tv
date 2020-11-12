$('.owl-carousel').owlCarousel({
    loop:false,
    margin:10,
    nav:true,
    dots: false,
    
    responsive:{
        0:{
            items: 1
        },
        600:{
            items:2
        },
        800:{
            items:3
        },
    
       1200:{
            items:5
        },       
    }
})