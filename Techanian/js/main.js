$('.owl-carousel').owlCarousel({
    loop:true,
    margin:20,
    autoplay: true,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})




// scrol up

$(function () {
    $.scrollUp({
        scrollImg: true,
        scrollSpeed: 300,            // Speed back to top (ms)
        easingType: 'linear',        // Scroll to top easing (see http://easings.net/)
        animation: 'fade'   
    });
});



// whatapp icon 

