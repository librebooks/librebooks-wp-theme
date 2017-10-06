  function neue_slider() {
  
        my_slider_counter = 0;
        curr_slide = 0;
        //nav_slider_counter = 0;
        
        //$(".slide_nav_cont ul").empty();
        $('#slideshow img').each(function() {
            $(this).addClass('slide_' + my_slider_counter);
            my_slider_counter++;
           
           /*  if(my_slider_counter == 1)
               $('.slide_nav_cont ul').append('<li class="current"></li>');
             else
              $('.slide_nav_cont ul').append('<li></li>');*/
        });
        
	/*
        $('.slide_nav_cont ul li').each(function() {
            $(this).attr('alt',nav_slider_counter);
            nav_slider_counter++;
        });                */
        
        function home_switch_slide() {
  
            if(curr_slide >= my_slider_counter)
                curr_slide = 0;
            else if(curr_slide < 0)
                curr_slide = (my_slider_counter-1);
                
            //alert(curr_slide);
            
            $('.slide_' + curr_slide).fadeIn(500);
            //$('.slide_nav_cont ul li').removeClass('current');
            //$('.slide_nav_cont ul li[alt="' + curr_slide + '"]').addClass('current');
            
                
        }
        
        function hide_curr_slide() {
               $('.slide_' + curr_slide).stop();
               $('.slide_' + curr_slide).fadeOut(1500);
        }
        
        function next_slide_slider(jump_to_slide) {
            hide_curr_slide(); 
            
            if(jump_to_slide == null)
                curr_slide++;     
            else 
                curr_slide = jump_to_slide;
            
            t_slide=setTimeout(home_switch_slide,0); 
            //home_switch_image();
        }
        
        function prev_slide_slider(jump_to_slide) {
            hide_curr_slide();
            
            
//            curr_slide--;        
            if(jump_to_slide == null)
                curr_slide--;     
            else 
                curr_slide = jump_to_slide;
            //home_switch_image();
            t_slide=setTimeout(home_switch_slide,0);
        }        
        
        $('.slide_prev').click(function() {
          
            prev_slide_slider();
            clearInterval(intervalID_slide);
            //clearInterval(t_slide);
            intervalID_slide = setInterval(next_slide_slider, 8000);
        });
        
        $('.slide_next').click(function() {
            
            next_slide_slider();
            clearInterval(intervalID_slide);
            intervalID_slide = setInterval(next_slide_slider, 8000);
        });                
        /*
        $('.slide_nav_cont ul li').click(function() {
            
            clearInterval(intervalID_slide);
            next_slide_slider($(this).attr('alt'));
            
            //clearInterval(t_testi);
            intervalID_slide = setInterval(next_slide_slider, 8000);            
        
        });        */
        
        //setInterval(next_slide_image, 5000);
        intervalID_slide = setInterval(next_slide_slider, 8000);  
  
  
  }  
$(document).ready(function() {
	neue_slider();
	
        $('.header_menu li').hover(
            function () {
                $('ul:first', this).css('display','block');
     
            }, 
            function () {
                $('ul:first', this).css('display','none');         
            }
        );               	
});
$(document).ready(function() {
	neue_slider();
	
	$('.home_post_box').hover(
// Old style.
//		function() {
//			$(this).find('.home_post_text').css('display','block');
//		},
//		function () {
//			$(this).find('.home_post_text').css('display','none');
//		}
// New style (fading).
		function(){
			$(this).find('.home_post_text').fadeIn(250);
	},
		function(){
			$(this).find('.home_post_text').fadeOut(250);
	}
	);
		
	$('#slideshow_cont').hover(
		function() {
			$('.slide_prev').css('display','block');
			$('.slide_next').css('display','block');
		},
		function() {
			$('.slide_prev').css('display','none');
			$('.slide_next').css('display','none');			
		}
	);
});



/// Scroll To Top /////////////////////////////////////////////////////////////////////
//var timeOut;
//function scrollToTop() {
//  if (document.body.scrollTop!=0 || document.documentElement.scrollTop!=0){
//    window.scrollBy(0,-25);
//    timeOut=setTimeout('scrollToTop()',10);
//  }
//  else clearTimeout(timeOut);
//}

/// Scroll To Top /////////////////////////////////////////////////////////////////////


/*!
 * jQuery Smooth Scroll - v1.5.4 - 2014-11-17
 * https://github.com/kswedberg/jquery-smooth-scroll
 * Copyright (c) 2014 Karl Swedberg
 * Licensed MIT (https://github.com/kswedberg/jquery-smooth-scroll/blob/master/LICENSE-MIT)
 */

(function (factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as an anonymous module.
    define(['jquery'], factory);
  } else {
    // Browser globals
    factory(jQuery);
  }
}(function ($) {

  var version = '1.5.4',
      optionOverrides = {},
      defaults = {
        exclude: [],
        excludeWithin:[],
        offset: 0,

        // one of 'top' or 'left'
        direction: 'top',

        // jQuery set of elements you wish to scroll (for $.smoothScroll).
        //  if null (default), $('html, body').firstScrollable() is used.
        scrollElement: null,

        // only use if you want to override default behavior
        scrollTarget: null,

        // fn(opts) function to be called before scrolling occurs.
        // `this` is the element(s) being scrolled
        beforeScroll: function() {},

        // fn(opts) function to be called after scrolling occurs.
        // `this` is the triggering element
        afterScroll: function() {},
        easing: 'swing',
        speed: 400,

        // coefficient for "auto" speed
        autoCoefficient: 2,

        // $.fn.smoothScroll only: whether to prevent the default click action
        preventDefault: true
      },

      getScrollable = function(opts) {
        var scrollable = [],
            scrolled = false,
            dir = opts.dir && opts.dir === 'left' ? 'scrollLeft' : 'scrollTop';

        this.each(function() {

          if (this === document || this === window) { return; }
          var el = $(this);
          if ( el[dir]() > 0 ) {
            scrollable.push(this);
          } else {
            // if scroll(Top|Left) === 0, nudge the element 1px and see if it moves
            el[dir](1);
            scrolled = el[dir]() > 0;
            if ( scrolled ) {
              scrollable.push(this);
            }
            // then put it back, of course
            el[dir](0);
          }
        });

        // If no scrollable elements, fall back to <body>,
        // if it's in the jQuery collection
        // (doing this because Safari sets scrollTop async,
        // so can't set it to 1 and immediately get the value.)
        if (!scrollable.length) {
          this.each(function() {
            if (this.nodeName === 'BODY') {
              scrollable = [this];
            }
          });
        }

        // Use the first scrollable element if we're calling firstScrollable()
        if ( opts.el === 'first' && scrollable.length > 1 ) {
          scrollable = [ scrollable[0] ];
        }

        return scrollable;
      };

  $.fn.extend({
    scrollable: function(dir) {
      var scrl = getScrollable.call(this, {dir: dir});
      return this.pushStack(scrl);
    },
    firstScrollable: function(dir) {
      var scrl = getScrollable.call(this, {el: 'first', dir: dir});
      return this.pushStack(scrl);
    },

    smoothScroll: function(options, extra) {
      options = options || {};

      if ( options === 'options' ) {
        if ( !extra ) {
          return this.first().data('ssOpts');
        }
        return this.each(function() {
          var $this = $(this),
              opts = $.extend($this.data('ssOpts') || {}, extra);

          $(this).data('ssOpts', opts);
        });
      }

      var opts = $.extend({}, $.fn.smoothScroll.defaults, options),
          locationPath = $.smoothScroll.filterPath(location.pathname);

      this
      .unbind('click.smoothscroll')
      .bind('click.smoothscroll', function(event) {
        var link = this,
            $link = $(this),
            thisOpts = $.extend({}, opts, $link.data('ssOpts') || {}),
            exclude = opts.exclude,
            excludeWithin = thisOpts.excludeWithin,
            elCounter = 0, ewlCounter = 0,
            include = true,
            clickOpts = {},
            hostMatch = ((location.hostname === link.hostname) || !link.hostname),
            pathMatch = thisOpts.scrollTarget || ( $.smoothScroll.filterPath(link.pathname) === locationPath ),
            thisHash = escapeSelector(link.hash);

        if ( !thisOpts.scrollTarget && (!hostMatch || !pathMatch || !thisHash) ) {
          include = false;
        } else {
          while (include && elCounter < exclude.length) {
            if ($link.is(escapeSelector(exclude[elCounter++]))) {
              include = false;
            }
          }
          while ( include && ewlCounter < excludeWithin.length ) {
            if ($link.closest(excludeWithin[ewlCounter++]).length) {
              include = false;
            }
          }
        }

        if ( include ) {

          if ( thisOpts.preventDefault ) {
            event.preventDefault();
          }

          $.extend( clickOpts, thisOpts, {
            scrollTarget: thisOpts.scrollTarget || thisHash,
            link: link
          });

          $.smoothScroll( clickOpts );
        }
      });

      return this;
    }
  });

  $.smoothScroll = function(options, px) {
    if ( options === 'options' && typeof px === 'object' ) {
      return $.extend(optionOverrides, px);
    }
    var opts, $scroller, scrollTargetOffset, speed, delta,
        scrollerOffset = 0,
        offPos = 'offset',
        scrollDir = 'scrollTop',
        aniProps = {},
        aniOpts = {};

    if (typeof options === 'number') {
      opts = $.extend({link: null}, $.fn.smoothScroll.defaults, optionOverrides);
      scrollTargetOffset = options;
    } else {
      opts = $.extend({link: null}, $.fn.smoothScroll.defaults, options || {}, optionOverrides);
      if (opts.scrollElement) {
        offPos = 'position';
        if (opts.scrollElement.css('position') === 'static') {
          opts.scrollElement.css('position', 'relative');
        }
      }
    }

    scrollDir = opts.direction === 'left' ? 'scrollLeft' : scrollDir;

    if ( opts.scrollElement ) {
      $scroller = opts.scrollElement;
      if ( !(/^(?:HTML|BODY)$/).test($scroller[0].nodeName) ) {
        scrollerOffset = $scroller[scrollDir]();
      }
    } else {
      $scroller = $('html, body').firstScrollable(opts.direction);
    }

    // beforeScroll callback function must fire before calculating offset
    opts.beforeScroll.call($scroller, opts);

    scrollTargetOffset = (typeof options === 'number') ? options :
                          px ||
                          ( $(opts.scrollTarget)[offPos]() &&
                          $(opts.scrollTarget)[offPos]()[opts.direction] ) ||
                          0;

    aniProps[scrollDir] = scrollTargetOffset + scrollerOffset + opts.offset;
    speed = opts.speed;

    // automatically calculate the speed of the scroll based on distance / coefficient
    if (speed === 'auto') {

      // $scroller.scrollTop() is position before scroll, aniProps[scrollDir] is position after
      // When delta is greater, speed will be greater.
      delta = aniProps[scrollDir] - $scroller.scrollTop();
      if(delta < 0) {
        delta *= -1;
      }

      // Divide the delta by the coefficient
      speed = delta / opts.autoCoefficient;
    }

    aniOpts = {
      duration: speed,
      easing: opts.easing,
      complete: function() {
        opts.afterScroll.call(opts.link, opts);
      }
    };

    if (opts.step) {
      aniOpts.step = opts.step;
    }

    if ($scroller.length) {
      $scroller.stop().animate(aniProps, aniOpts);
    } else {
      opts.afterScroll.call(opts.link, opts);
    }
  };

  $.smoothScroll.version = version;
  $.smoothScroll.filterPath = function(string) {
    string = string || '';
    return string
      .replace(/^\//,'')
      .replace(/(?:index|default).[a-zA-Z]{3,4}$/,'')
      .replace(/\/$/,'');
  };

  // default options
  $.fn.smoothScroll.defaults = defaults;

  function escapeSelector (str) {
    return str.replace(/(:|\.|\/)/g,'\\$1');
  }

}));


