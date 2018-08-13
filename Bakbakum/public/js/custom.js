$(document).ready(function(){


   $('.slider-for').slick({
     slidesToShow: 1,
     slidesToScroll: 1,
     arrows: true,
     fade: true,
     asNavFor: '.slider-nav'
   });
   $('.slider-nav').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      asNavFor: '.slider-for',
      focusOnSelect: true
    });

   //gresock
   
    
})