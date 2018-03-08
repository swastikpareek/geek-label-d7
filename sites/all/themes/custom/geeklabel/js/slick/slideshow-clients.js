(function ($) {  
  /** 
   * JS behaviour for adding slick slide show to
   * memebers block.
   */
  Drupal.behaviors.slickSlidesMembers = {
    attach: function(context, settings) {

      if(typeof $(document).slick == 'function') {      
        // blog teaser slide show
        $('.slick-el', context).slick({
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: false,
          autoplaySpeed: 1000,
          arrows: true,
          infinite: true,
          responsive: [{
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
              infinite: true,
              arrows: true
            }
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              arrows: false,
              dots: true,
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false,
              dots: true,
            }
          }]       
        });        
      }
    }
  };

})(jQuery);