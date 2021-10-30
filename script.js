$(function () {
    $(window).on('scroll', function () {
        if ( $(window).scrollTop() > 10 ) {
            $('.navbar').addClass('active');
            $('.wrapper').addClass('active');
            $('#btn').addClass('active');
            document.getElementById("btn").addEventListener("click", function(){

                window.scrollTo({
                    top: 0,
                    left: 0,
                    behavior: "smooth"

                })

            });
        } else {
            $('.navbar').removeClass('active');
            $('.wrapper').removeClass('active');
            $('#btn').removeClass('active');
        }
    });

$('.carousel').owlCarousel({
       margin: 20,
       loop: true,
       autoplay: true,
       autoplayTimeOut: 2000,
       autoplayHoverPause: true,
       responsive: {
           0:{
               items: 1,
               nav: false
           },
           600:{
               items: 2,
               nav: false
           },
           1000:{
               items: 3,
               nav: false
           }
       }
     });

});