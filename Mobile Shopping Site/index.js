$(document).ready(function(){

    var $grid=$('.grid').isotope({
        // options
        itemSelector: '.grid-item',
        layoutMode: 'fitRows'
      });

$(".button-group").on("click","button",function(){
    var filterValue=$(this).attr('data-filter')
    $grid.isotope({filter:filterValue});
})
})

$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})