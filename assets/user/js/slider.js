var subu;
var subuUl;
var subuUlLi;
var countChildren;
var countLastEntry;
var totalWidth;
var imageWidth;
var imageHeight;
var b;
var newi = 0;
var currCount = 1;
var marleft;
var marRight;

var auroInterval = 3000;
var sliderInterval = 500;
var counterClick = 0;
var clickedx = 1;

(function($) {
    jQuery.fn.minislider = function() {

        //set duration time; 
        window.setInterval(setDuration, auroInterval);
        function setDuration() {
            if (currCount === countChildren) {
                if (counterClick === 1) {
                    counterClick = 0;
                }
                else {
                    subuSlsiderFirst();
                }
            }
            else {
                if (counterClick === 1) {
                    counterClick = 0;
                }
                else {
                    $(subuSliderNext);
                }
            }
        }

        subu = $(this).attr('id');
        subuUl = $("#" + subu + ' ul');
        subuUlLi = $("#" + subu + ' ul li');
        countChildren = $("#" + subu + ' ul').children().length; //count total li
        countLastEntry = countChildren - 1;
        imageWidth = $("#" + subu).width();
        totalWidth = imageWidth * countChildren;
        subuUl.width(totalWidth);

        altTextPrint();
        function altTextPrint() {
            var setValue = subuUl.find('li.subuActive').find('img').attr("alt");
            if (setValue !== 0)
            {
                subuUl.find('li.subuActive').append('<div class="slider-title">');
                $('.slider-title').html(setValue).animate({'top': 44 + '%'}, 1000);
            }
        }
        ;
        function subuSliderNext() {
            if (clickedx) {
                $('.slider-title').remove();
                if (currCount === countChildren) {
                    return false;
                }
                else {
                    marleft = imageWidth * currCount;
                    var activeItem = subuUl.find('li.subuActive');

                    activeItem.next().addClass('subuActive');

                    activeItem.removeClass('subuActive');
                    subuUl.animate({'marginLeft': -marleft + 'px'}, sliderInterval, function(){
                        altTextPrint();
                    });

                    $('#sliderBulet').children('div').removeClass('bulletactive');
                    ++newi;
                    $(bulArr[newi]).addClass('bulletactive');
                    currCount++;
                    counterClick = 1;
                }
            }
            clickedx = 0;
            setTimeout(function() {
                clickedx = 1;
            }, 700);
        }
        ;
        function subuSlsiderPreview() {
            if (clickedx) {
                $('.slider-title').remove();
                if (currCount === 1) {
                    return false;
                }
                else {
                    marRight = marleft - imageWidth;
                    marleft = marRight;
                    var activeItem = subuUl.find('li.subuActive');
                    activeItem.prev().addClass('subuActive');

                    activeItem.removeClass('subuActive');
                    subuUl.animate({'marginLeft': -marRight + 'px'}, sliderInterval, function(){
                        altTextPrint();
                    });

                    $('#sliderBulet').children('div').removeClass('bulletactive');
                    --newi;
                    $(bulArr[newi]).addClass('bulletactive');

                    currCount--;
                    counterClick = 1;
                }
            }
            clickedx = 0;
            setTimeout(function() {
                clickedx = 1;
            }, 700);
        }
        ;
        function subuSlsiderFirst() {
            $('.slider-title').remove();
            marleft = 0;
            var activeItem = subuUl.find('li.subuActive');
            subuUlLi.first().addClass('subuActive');

            activeItem.removeClass('subuActive');
            subuUl.animate({'marginLeft': 0 + 'px'}, 1500, function(){
                altTextPrint();
            });
            currCount = 1;

            $('#sliderBulet').children('div').removeClass('bulletactive');
            newi = 0;
            $(bulArr[newi]).addClass('bulletactive');
        }
        ;

        $('#' + subu).append('<a id="subuprev">', '<a id="subunext">');
        $("#subunext").on("click", function(e) {
            e.preventDefault();
            subuSliderNext();
        });
        $("#subuprev").on("click", function(e) {
            e.preventDefault();
            subuSlsiderPreview();
        });

        $('#' + subu).append('<div id="sliderBulet">');
        for (newk = 0; newk < countChildren; newk++)
        {
            var vChildDiv = $('<div>', {'id': 'b' + newk});
            $('#sliderBulet').append(vChildDiv);
        }

        var bulArr = [];
        $("#sliderBulet div").each(function() {
            bulArr.push(this);
        });

        var c = subuUlLi.first().show();
        $(bulArr[newi]).addClass('bulletactive');

        $("#sliderBulet div").on("click", function() {
            if (clickedx) {
                var clickId = $(this).attr('id').replace('b', '');
                var currentId = $(bulArr[newi]).attr('id').replace('b', '');

                if (clickId > currentId) {
                    $('.slider-title').remove();
                    var serMargin = clickId * imageWidth;
                    marleft = serMargin;
                    slideSpeed = clickId * sliderInterval
                    subuUl.animate({'marginLeft': -serMargin + 'px'}, slideSpeed, function(){
                        altTextPrint();
                    });

                    $('#sliderBulet').children('div').removeClass('bulletactive');
                    $(bulArr[clickId]).addClass('bulletactive');

                    subuUlLi.removeClass('subuActive');
                    subuUlLi.eq(clickId).addClass('subuActive');

                    newi = clickId;
                    currCount = clickId;
                    currCount++;
                    counterClick = 1;
                }
                else if (clickId < currentId) {
                    if (clickId == 0) {
                        counterClick = 1;
                        subuSlsiderFirst();
                    } else {
                        $('.slider-title').remove();
                        var serMargin = clickId * imageWidth;
                        marleft = serMargin;
                        slideSpeed = clickId * sliderInterval

                        subuUl.animate({'marginLeft': -serMargin + 'px'}, slideSpeed, function(){
                            altTextPrint();
                        });

                        $('#sliderBulet').children('div').removeClass('bulletactive');

                        subuUlLi.removeClass('subuActive');
                        subuUlLi.eq(clickId).addClass('subuActive');

                        $(bulArr[clickId]).addClass('bulletactive');
                        newi = clickId;
                        //newi++
                        currCount = clickId;
                        currCount++;
                        counterClick = 1; 
                    }

                }
                else {
                    //
                }
            }
            clickedx = 0;
            setTimeout(function() {
                clickedx = 1;
            }, 1000);
        });

    };
})(jQuery);








     window.jssor_1_slider_init = function() {

            var jssor_1_SlideoTransitions = [
              [{b:-1,d:1,ls:0.5},{b:0,d:1000,y:5,e:{y:6}}],
              [{b:-1,d:1,ls:0.5},{b:200,d:1000,y:25,e:{y:6}}],
              [{b:-1,d:1,ls:0.5},{b:400,d:1000,y:45,e:{y:6}}],
              [{b:-1,d:1,ls:0.5},{b:600,d:1000,y:65,e:{y:6}}],
              [{b:-1,d:1,ls:0.5},{b:800,d:1000,y:85,e:{y:6}}],
              [{b:-1,d:1,ls:0.5},{b:500,d:1000,y:195,e:{y:6}}],
              [{b:0,d:2000,y:30,e:{y:3}}],
              [{b:-1,d:1,rY:-15,tZ:100},{b:0,d:1500,y:30,o:1,e:{y:3}}],
              [{b:-1,d:1,rY:-15,tZ:-100},{b:0,d:1500,y:100,o:0.8,e:{y:3}}],
              [{b:500,d:1500,o:1}],
              [{b:0,d:1000,y:380,e:{y:6}}],
              [{b:300,d:1000,x:80,e:{x:6}}],
              [{b:300,d:1000,x:330,e:{x:6}}],
              [{b:-1,d:1,r:-110,sX:5,sY:5},{b:0,d:2000,o:1,r:-20,sX:1,sY:1,e:{o:6,r:6,sX:6,sY:6}}],
              [{b:0,d:600,x:150,o:0.5,e:{x:6}}],
              [{b:0,d:600,x:1140,o:0.6,e:{x:6}}],
              [{b:-1,d:1,sX:5,sY:5},{b:600,d:600,o:1,sX:1,sY:1,e:{sX:3,sY:3}}]
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $LazyLoading: 1,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 20,
                $SpacingY: 20
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 3000;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
