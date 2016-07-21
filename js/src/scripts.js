( function( $ ) {
  $( document ).ready(function() {

    // CSS Menus
    
    $('#cssmenu').prepend('<div id="indicatorContainer"><div id="pIndicator"><div id="cIndicator"></div></div></div>');
      var activeElement = $('#cssmenu>ul>li:first');

      $('#cssmenu>ul>li').each(function() {
        if ($(this).hasClass('active')) {
          activeElement = $(this);
        }
      });


    var posLeft = activeElement.position().left;
    var elementWidth = activeElement.width();
    posLeft = posLeft + elementWidth/2 -6;
    if (activeElement.hasClass('has-sub')) {
      posLeft -= 6;
    }

    $('#cssmenu #pIndicator').css('left', posLeft);
    var element, leftPos, indicator = $('#cssmenu pIndicator');

    $("#cssmenu>ul>li").hover(function() {
          element = $(this);
          var w = element.width();
          if ($(this).hasClass('has-sub'))
          {
            leftPos = element.position().left + w/2 - 12;
          }
          else {
            leftPos = element.position().left + w/2 - 6;
          }

          $('#cssmenu #pIndicator').css('left', leftPos);
      }
      , function() {
        $('#cssmenu #pIndicator').css('left', posLeft);
      });

    $('#cssmenu>ul').prepend('<li id="menu-button"><a>Menu</a></li>');
    $( "#menu-button" ).click(function(){
          if ($(this).parent().hasClass('open')) {
            $(this).parent().removeClass('open');
          }
          else {
            $(this).parent().addClass('open');
          }
        });

    // Theme Switcher
     
    $( ".button-reset-color" ).click(function() {
      $( ".theme-color" ).removeClass( "theme-option-2 theme-option-3");
    });

    $( ".button-option-2" ).click(function() {
      $( ".theme-color" ).toggleClass("theme-option-2").removeClass("theme-option-3");
    });

    $( ".button-option-3" ).click(function() {
      $( ".theme-color" ).toggleClass("theme-option-3").removeClass("theme-option-2");
    });
      
  });
  
  // NewsTicker
  $('#newsList').newsTicker({
    interval: "60000",
    effect: "fadeIn"
  });
      
  // VitVids.js

  $(".fitvids").fitVids();
  
} )( jQuery ); 
