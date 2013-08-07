
$(document).ready(function($){
    $('#featured').orbit({
     animation: 'horizontal-slide',                  // fade, horizontal-slide, vertical-slide, horizontal-push
     animationSpeed: 800,                // how fast animtions are
     timer: true,            // true or false to have the timer
     advanceSpeed: 4000,         // if timer is enabled, time between transitions 
     pauseOnHover: false,        // if you hover pauses the slider
     startClockOnMouseOut: false,    // if clock should start on MouseOut
     startClockOnMouseOutAfter: 1000,    // how long after MouseOut should the timer start again
     directionalNav: false,       // manual advancing directional navs
     captions: true,             // do you want captions?
     captionAnimation: 'slideOpen',       // fade, slideOpen, none
     captionAnimationSpeed: 800,     // if so how quickly should they animate in
     bullets: true,             // true or false to activate the bullet navigation
  
});
        });


$(document).ready(function($){
        // Get current url
        // Select an a element that has the matching href and apply a class of 'active'. Also prepend a - to the content of the link
        var url = window.location.pathname;
        $('.rectangle-list li a[href="'+url+'"]').addClass('menuactive listactive')  ;

    });


$(function() {
  var val = $("input[id='MemPerson_mem_type_1']:checked").val();
  if(val === "2") {

      $('.hidden_destiny').show();

  } else {
    
  }
});



$(document).ready(function() {
     $('.linkgroupbtn').fancybox({
         width  :'100%',
         closeBtn : 0
        // afterClose : function() {
        //         location.reload();
        //         return;
        //     }       
    });
     
 $('#gallery a').fancybox({
   closeBtn : false
       });


    $('.fclogin').fancybox({
        type : 'iframe',
        padding : 0,
         width  :'490',
         closeBtn : 0,
         maxHeight :'202',
         scrolling : 'no'
       });


    $('.createaccountbtn').fancybox({
      type : 'iframe'
    });
});







$(document).ready(function() {

$("input[type='radio']").change( function() {
    ($(this).val());
});
  $('.fate').click(function () {
      $('.hidden_destiny').each(function () {
          if ($(this).is(':visible')) {
              $(this).stop().slideUp('slow');
          }
      });


      var id = $(this).val();
      $('#clicked_' + id).stop().slideDown('slow');

  })

});




$(document).ready(function () {
    $('input.numberinput').bind('keypress', function (e) {
        return (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && e.which != 46) ? false : true;
    });
});


$(document).ready(function () { 
    $("ul#navi_containTab > li").click(function(event){  
            var menuIndex=$(this).index();  
            $("ul#detail_containTab > li:visible").hide();             
            $("ul#detail_containTab > li").eq(menuIndex).show();  
    });  
});  





$(document).ready(function() {
            $('#learning').orbit();
            $('#featured').orbit({ bullets: false});
});





 // $(':submit').click(function(e){
 //            e.preventDefault();
 //            var value = $(this).attr('id');
 //            if (value == 'preview') {
 //              e.preventDefault();
 //                $.fancybox.showLoading();
 //                $.ajax({
 //                    type    : 'POST',
 //                    cache   : false,
 //                    url: this.href,
 //                    // url     : '/index.php/knowledge/manage/insert/id/40',
 //                    data    : $('#insert-form').serializeArray(),
 //                    success : function(data) {
 //                        $.fancybox(data);
 //                        }
 //                    });
 //                    return false;
 //            }
 //        });
//     $.ajax: {
//         type     : "POST",
//         cache    : false,
//         url      : "/index.php/knowledge/manage/insert/id/40",
//         success: function(data) {
//             $.fancybox({
//                 'width': 400,
//                 'height': 400,
//                 'type'              : 'iframe',
//                 'enableEscapeButton' : false,
//                 'overlayShow' : true,
//                 'overlayOpacity' : 0,
//                 'hideOnOverlayClick' : false,
//                 'content' : data
//             });
//         }
//     }
// });
//   $('input[id^="preview"]').fancybox({
// 'width'             : '45%',
// 'height'            : '20%',
// 'autoScale'         : false,
// 'transitionIn'      : 'none',
// 'transitionOut'     : 'none',
// 'type'              : 'iframe'
//   });


// $(document).ready(function() {
//   $("#login-form").bind("submit", function() {
//             $.ajax({
//               type    : "POST",
//               cache : false,
//               url   : "/site/login",
//               data    : $(this).serializeArray(),
//               success: function(data) {
//                 $.fancybox(data);
//                  alert('login success');

//               }
//             });
//             return false;
//           });
// });
// Slider
// $(document).ready(function() {
//     $('#slides').slidesjs({
//         width: 750,
//         height: 300,
//         navigation: {
//             effect: "fade"
//         },
//         pagination: {
//             effect: "fade"
//         },
//         play: {
//             active: true,
//             // [boolean] Generate the play and stop buttons.
//             // You cannot use your own buttons. Sorry.
//             effect: "slide",
//             // [string] Can be either "slide" or "fade".
//             interval: 5000,
//             // [number] Time spent on each slide in milliseconds.
//             auto: true,
//             // [boolean] Start playing the slideshow on load.
//             swap: true,
//             // [boolean] show/hide stop and play buttons
//             pauseOnHover: false,
//             // [boolean] pause a playing slideshow on hover
//             restartDelay: 2500
//         // [number] restart delay on inactive slideshow
//         },
//         effect: {
//             fade: {
//                 speed: 400
//             }
//         }
                    
                    
//     });
// });


 // register radiobox
// $(document).ready(function() {
//     $("input[type='radio']").change(function(){
//         if($(this).val()=="member2")
//         {
//             $("#panit").show();
//         }
//         else
//         {
//             $("#panit").hide(); 
//         }
//     })
// });

// Fancy Box
  








// Full Calendar







/* ===================================================
 * bootstrap-transition.js v2.3.2
 * http://twitter.github.com/bootstrap/javascript.html#transitions
 * ===================================================
 * Copyright 2012 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================== */


!function ($) {

  "use strict"; // jshint ;_;


  /* CSS TRANSITION SUPPORT (http://www.modernizr.com/)
   * ======================================================= */

  $(function () {

    $.support.transition = (function () {

      var transitionEnd = (function () {

        var el = document.createElement('bootstrap')
          , transEndEventNames = {
               'WebkitTransition' : 'webkitTransitionEnd'
            ,  'MozTransition'    : 'transitionend'
            ,  'OTransition'      : 'oTransitionEnd otransitionend'
            ,  'transition'       : 'transitionend'
            }
          , name

        for (name in transEndEventNames){
          if (el.style[name] !== undefined) {
            return transEndEventNames[name]
          }
        }

      }())

      return transitionEnd && {
        end: transitionEnd
      }

    })()

  })

}(window.jQuery);
/* =============================================================
 * bootstrap-collapse.js v2.3.2
 * http://twitter.github.com/bootstrap/javascript.html#collapse
 * =============================================================
 * Copyright 2012 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ============================================================ */


!function ($) {

  "use strict"; // jshint ;_;


 /* COLLAPSE PUBLIC CLASS DEFINITION
  * ================================ */

  var Collapse = function (element, options) {
    this.$element = $(element)
    this.options = $.extend({}, $.fn.collapse.defaults, options)

    if (this.options.parent) {
      this.$parent = $(this.options.parent)
    }

    this.options.toggle && this.toggle()
  }

  Collapse.prototype = {

    constructor: Collapse

  , dimension: function () {
      var hasWidth = this.$element.hasClass('width')
      return hasWidth ? 'width' : 'height'
    }

  , show: function () {
      var dimension
        , scroll
        , actives
        , hasData

      if (this.transitioning || this.$element.hasClass('in')) return

      dimension = this.dimension()
      scroll = $.camelCase(['scroll', dimension].join('-'))
      actives = this.$parent && this.$parent.find('> .accordion-group > .in')

      if (actives && actives.length) {
        hasData = actives.data('collapse')
        if (hasData && hasData.transitioning) return
        actives.collapse('hide')
        hasData || actives.data('collapse', null)
      }

      this.$element[dimension](0)
      this.transition('addClass', $.Event('show'), 'shown')
      $.support.transition && this.$element[dimension](this.$element[0][scroll])
    }

  , hide: function () {
      var dimension
      if (this.transitioning || !this.$element.hasClass('in')) return
      dimension = this.dimension()
      this.reset(this.$element[dimension]())
      this.transition('removeClass', $.Event('hide'), 'hidden')
      this.$element[dimension](0)
    }

  , reset: function (size) {
      var dimension = this.dimension()

      this.$element
        .removeClass('collapse')
        [dimension](size || 'auto')
        [0].offsetWidth

      this.$element[size !== null ? 'addClass' : 'removeClass']('collapse')

      return this
    }

  , transition: function (method, startEvent, completeEvent) {
      var that = this
        , complete = function () {
            if (startEvent.type == 'show') that.reset()
            that.transitioning = 0
            that.$element.trigger(completeEvent)
          }

      this.$element.trigger(startEvent)

      if (startEvent.isDefaultPrevented()) return

      this.transitioning = 1

      this.$element[method]('in')

      $.support.transition && this.$element.hasClass('collapse') ?
        this.$element.one($.support.transition.end, complete) :
        complete()
    }

  , toggle: function () {
      this[this.$element.hasClass('in') ? 'hide' : 'show']()
    }

  }


 /* COLLAPSE PLUGIN DEFINITION
  * ========================== */

  var old = $.fn.collapse

  $.fn.collapse = function (option) {
    return this.each(function () {
      var $this = $(this)
        , data = $this.data('collapse')
        , options = $.extend({}, $.fn.collapse.defaults, $this.data(), typeof option == 'object' && option)
      if (!data) $this.data('collapse', (data = new Collapse(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  $.fn.collapse.defaults = {
    toggle: true
  }

  $.fn.collapse.Constructor = Collapse


 /* COLLAPSE NO CONFLICT
  * ==================== */

  $.fn.collapse.noConflict = function () {
    $.fn.collapse = old
    return this
  }


 /* COLLAPSE DATA-API
  * ================= */

  $(document).on('click.collapse.data-api', '[data-toggle=collapse]', function (e) {
    var $this = $(this), href
      , target = $this.attr('data-target')
        || e.preventDefault()
        || (href = $this.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '') //strip for ie7
      , option = $(target).data('collapse') ? 'toggle' : $this.data()
    $this[$(target).hasClass('in') ? 'addClass' : 'removeClass']('collapsed')
    $(target).collapse(option)
  })

}(window.jQuery);






