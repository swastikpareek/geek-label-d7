(function($){
  Drupal.behaviors.slidingEffect = {
    attach: function(context, settings){
      $('section.slide', context).each(function(index){
        $(this).attr('id', 'slide-el-' + index);
        var nextIndex = parseInt(index, 10) + 1;
        if(nextIndex < $('section.slide').length) {
          var el = document.createElement('a');
          $(el).attr('href', '#slide-el-' + nextIndex);
          $(el).attr('class', 'slide__arrow');
          $(this).append(el);  
          $(el).on('click', function(){
            $('html, body').animate({
               scrollTop: $('#slide-el-' + nextIndex).offset().top
            }, 'medium');
          })
        }
          
      })
    }
  };
})(jQuery);