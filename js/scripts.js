jQuery(function($) {
    "use strict";

    // Custom jQuery Code Here
    //  мои движения.. код для плеера.
    (function player() {
        var panel = {
            video:              $('#video'),
            video_block:        $('.video_section'),
            videoDOM:           $('#video')[0],
            playpause_block:    $('#playpause_block'),
            controls:           $('#controls'),
            play_but:           $("#controls #playpause_button .fa-play"),
            pause_but:          $('#controls #playpause_button .fa-pause'),
            playpause_button:   $('#controls #playpause_button'),
            total:              $('#total'),
            progress:           $('#progress'),
            buffered:           $('#buffered'),
            current:            $('#current'),
            currenttime:        $('#currenttime'),
            duration:           $('#duration'),
            hasHours:           false,
            volume_on:          $('.fa-volume-up'),
            volume_off:         $('.fa-volume-off'),
            volume:             $(' #volume'),

        };
        panel.pause_but.addClass('none');
        panel.volume_off.addClass('none');


        function play_pause() {
            if (panel.videoDOM.paused) {
                panel.videoDOM.play();
                panel.playpause_block.toggleClass('none');
                panel.play_but.toggleClass('none');
                panel.pause_but.toggleClass('none');
            }
            else {
                panel.videoDOM.pause();
                panel.playpause_block.toggleClass('none');
                panel.play_but.toggleClass('none');
                panel.pause_but.toggleClass('none');
            }
        };
        function hidden_show() {
            if (panel.videoDOM.paused) {

            }
            else {
                $('#video, #controls').on('mouseover',function(event) {
                    event.stopPropagation();
                    panel.controls.css('opacity','1.0');
                });
                panel.video_block.on('mouseout', function(event) {
                    event.stopPropagation();
                    panel.controls.css('opacity','0.0');
                })
                
            } 
            panel.video.on('ended', function() {
                $('#video, #controls').off('mouseover');
                panel.playpause_block.removeClass('none');
                panel.play_but.removeClass('none');
                panel.pause_but.addClass('none');
                panel.controls.css('opacity','0.0');
                panel.video.one('playing', hidden_show);
            });
            
        };
        function formatTime(time, hours) {
            if (hours) {
                var h = Math.floor(time / 3600);
                time = time - h * 3600;
                            
                var m = Math.floor(time / 60);
                var s = Math.floor(time % 60);
                            
                return h.lead0(2)  + ":" + m.lead0(2) + ":" + s.lead0(2);
            } else {
                var m = Math.floor(time / 60);
                var s = Math.floor(time % 60);
                            
                return m.lead0(2) + ":" + s.lead0(2);
            }
        }
                    
        Number.prototype.lead0 = function(n) {
            var nz = "" + this;
            while (nz.length < n) {
                nz = "0" + nz;
            }
            return nz;
        };

        // ---------------------------
        //          Events
        // ---------------------------

        $('#video, #playpause_block, #playpause_button').on('click', play_pause);

        panel.video.one('playing', hidden_show);

        panel.video.on('canplay', function() {
            panel.hasHours = (panel.videoDOM.duration / 3600) >= 1.0;
            panel.duration.text(formatTime(panel.videoDOM.duration, panel.hasHours));
            panel.currenttime.text(formatTime(0, panel.hasHours));
        });

        panel.video.on('timeupdate', function() {
            panel.currenttime.text(formatTime(panel.videoDOM.currentTime, panel.hasHours));

            var progress = Math.floor(panel.videoDOM.currentTime) / Math.floor(panel.videoDOM.duration);
            panel.current.css('width', Math.floor( progress * panel.progress.width()));
        });

        panel.video.on('progress',function() {
            if (panel.videoDOM.buffered.length) {
                var buffered = Math.floor(panel.videoDOM.buffered.end(0)) / Math.floor(panel.videoDOM.duration);
                panel.buffered.css('width', Math.floor(buffered * panel.progress.width()));
                
            }
        });

        panel.progress.on('click',function(e) {
            var x = (e.pageX -panel.progress.offset().left) / $(panel.progress).width();
            panel.videoDOM.currentTime = x * panel.videoDOM.duration;
        });


        panel.volume.on('click', function() {
            panel.videoDOM.muted = ! panel.videoDOM.muted;
            panel.volume_on.toggleClass('none');
            panel.volume_off.toggleClass('none');
        });
    }());
    
    
    //		Урок 26 мой делаю таймер следующего события для страницы sermons 
	
	setInterval(timer, 1000);
	
	function timer() {
		
		$('.next_sermon_timer').each(function(){ $(this).text(calc_time($(this).attr('data-dateSermon')));});
				
		function calc_time(deadline) {
			var current_date = new Date();
			var deadline =  parseInt(deadline) - Math.floor(current_date.getTime()/1000);
			
			var time = {},str;
			time.s = deadline%60;
			time.m = ((deadline - time.s)/60)%60; 
			//time.m = m%60;
			time.h = ((deadline - time.s - time.m*60)/(60*60))%24;
			//h = h%24;
			time.d = (deadline - time.s - time.m*60 - time.h*60*60)/(24*60*60);
			
			for (var prop in time) {
				if (time[prop] < 10) time[prop] = '0'+time[prop];
				
			}
			return str = time.d+' : '+time.h+' : '+time.m+' : '+time.s;
		}
	}
	//		Урок 23 создание парралакса для template-about.php
	var $window = $(window);
	
	if($('section[data-type="background"]').length) {
		$('section[data-type="background"]').each(function() {
			
			var $obj = $(this);
			var offset = $obj.offset().top;
			
			$(window).scroll(function() {
				offset = $obj.offset().top;
				
				if($window.scrollTop() > (offset-window.innerHeight)) {
					var yPos = -(($window.scrollTop() - offset)/5);
					var coords = '50% ' + (yPos) + 'px';
					$obj.css({backgroundPosition: coords});
				}
			});
			$(window).resize(function() {
				offset = $obj.offset().top;
			});
		});
	}
	
	
	// 	Урок 22 для работы слайдера на страницы about.php
	if ($(window).slick) { 
		$('.peoples_list').slick({
		  infinite: true,
		  slidesToShow: 4,
		  slidesToScroll: 4,
		  nextArrow: '.right_arrow .right',
		  prevArrow: '.left_arrow .left'

		});
    };
    
    // 	Урок my для работы слайдера на страницы home-page.php work slider our blog
	if ($(window).slick) { 
		$('.blog_list').slick({
		  infinite: true,
		  slidesToShow: 4,
		  slidesToScroll: 4,
		  nextArrow: '.right_arrow_blog .right_blog',
		  prevArrow: '.left_arrow_blog .left_blog'

		});
    }
    if ($(window).slick) { 
		$('.gallery_list').slick({
		  infinite: true,
		  slidesToShow: 4,
          slidesToScroll: 4,
          autoplay: true,
          variableWidth: false,
          autoplaySpeed: 4000,
		  nextArrow: '',
		  prevArrow: '',

		});
	}
	
		
	
	
    $('.portfolioslider').flexslider({
        animation:'slide',
        smoothHeight:true,
		prevText: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
		nextText: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        controlNav: false
    });

    $('.newhomeslider').flexslider({
        animation:'slide',
        smoothHeight:true,
        controlNav: false
    });

	 $('.homeslider').flexslider({
        animation:'slide',
		prevText: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
		nextText: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        //smoothHeight:true,
        controlNav: false
    });


	$('.homeslider .flex-viewport ').css('overflow', 'visible');
	
	$('.menu_icon i.fa-bars').on('click',function() {
		$('.menu_icon i.fa-bars').css('display', 'none');
		$('.menu_icon i.fa-times').css('display', 'inline-block');
		
		$('.top_navigation').css('display', 'block');
	});
	$('.menu_icon i.fa-times').on('click',function() {
		$('.menu_icon i.fa-bars').css('display', 'inline-block');
		$('.menu_icon i.fa-times').css('display', 'none');
		
		$('.top_navigation').css('display', 'none');
	});

});

Modernizr.addTest('ipad', function () {
    return !!navigator.userAgent.match(/iPad/i);
});

Modernizr.addTest('iphone', function () {
    return !!navigator.userAgent.match(/iPhone/i);
});

Modernizr.addTest('ipod', function () {
    return !!navigator.userAgent.match(/iPod/i);
});

Modernizr.addTest('appleios', function () {
    return (Modernizr.ipad || Modernizr.ipod || Modernizr.iphone);
});

Modernizr.addTest('positionfixed', function () {
    var test    = document.createElement('div'),
        control = test.cloneNode(false),
        fake = false,
        root = document.body || (function () {
            fake = true;
            return document.documentElement.appendChild(document.createElement('body'));
        }());

    var oldCssText = root.style.cssText;
    root.style.cssText = 'padding:0;margin:0';
    test.style.cssText = 'position:fixed;top:42px';
    root.appendChild(test);
    root.appendChild(control);

    var ret = test.offsetTop !== control.offsetTop;

    root.removeChild(test);
    root.removeChild(control);
    root.style.cssText = oldCssText;

    if (fake) {
        document.documentElement.removeChild(root);
    }

    /* Uh-oh. iOS would return a false positive here.
     * If it's about to return true, we'll explicitly test for known iOS User Agent strings.
     * "UA Sniffing is bad practice" you say. Agreeable, but sadly this feature has made it to
     * Modernizr's list of undectables, so we're reduced to having to use this. */
    return ret && !Modernizr.appleios;
});


// Modernizr.load loading the right scripts only if you need them
Modernizr.load([
    {
        // Let's see if we need to load selectivizr
        test : Modernizr.borderradius,
        // Modernizr.load loads selectivizr and Respond.js for IE6-8
        nope : [ale.template_dir + '/js/libs/selectivizr.min.js', ale.template_dir + '/js/libs/respond.min.js']
    },{
        test: Modernizr.touch,
        yep:ale.template_dir + '/css/touch.css'
    }
]);



jQuery(function($) {
    var is_single = $('#post').length;
    var posts = $('article.post');
    var is_mobile = parseInt(ale.is_mobile);

    var slider_settings = {
        animation: "slide",
        slideshow: false,
        controlNav: false
    }

    $(document).ajaxComplete(function(){
        try{
            if (!posts.length) {
                return;
            }
            FB.XFBML.parse();
            gapi.plusone.go();
            twttr.widgets.load();
            pin_load();
        }catch(ex){}
    });

    // open external links in new window
    $("a[rel$=external]").each(function(){
        $(this).attr('target', '_blank');
    });

    $.fn.init_posts = function() {
        var init_post = function(data) {
            // close other posts
            data.post.siblings('.open-post').find('a.toggle').trigger('click', {
                hide:true
            });

            var loading = data.post.find('span.loading');

            if (data.more.is(':empty')) {
                data.post.addClass('post-loading');
                loading.css('visibility', 'visible');
                data.more.load(ale.ajax_load_url, {
                    'action':'aletheme_load_post',
                    'id':data.post.data('post-id')
                }, function(){
                    loading.remove();
                    data.more.slideDown(400, function(){
                        data.post.addClass('open-post');
                        data.toggler.text('Close Post');
                        $('.video', data.more).fitVids();
                        if (data.scroll) {
                            data.scroll.scrollTo('fast');
                        }
                    });
                    init_comments(data.post);
                });
            } else {
                data.more.slideDown(400, function(){
                    data.post.addClass('open-post');
                    data.toggler.text('Close Post');
                    if (data.scroll) {
                        data.scroll.scrollTo('fast');
                    }
                });
            }
        }

        var load_post = function(e, _opts) {
            e.preventDefault();
            var data  = {
                toggler:$(this),
                scroll:false
            };
            var opts = $.extend({
                comments:false,
                hide:false,
                add_comment:false
            }, _opts);
            data.post = data.toggler.parents('article.post');
            data.more = data.post.find('.full');

            if (data.more.is(':visible')) {
                if (opts.hide == true) {
                    // quick hide for multiple posts
                    data.more.hide();
                } else {
                    data.more.slideUp(400);
                }
                data.toggler.text('Open Post');
                data.post.removeClass('open-post');
            } else {
                if (typeof(e.originalEvent) != 'undefined' ) {
                    data.scroll = data.post;
                }
                init_post(data);
            }
        }

        var init_comments = function(post) {
            var respond = $('section.respond', post);
            var respond_form = $('form', respond);
            var respond_form_error = $('p.error', respond_form);
            //var respond_cancel = $('.cancel-comment-reply a', respond);
            var comments = $('section.comments', post);

            /*$('a.comment-reply-link', post).on('click', function(e){
             e.preventDefault();
             var comment = $(this).parents('li.comment');
             comment.find('>div').append(respond);
             respond_cancel.show();
             respond.find('input[name=comment_post_ID]').val(post.data('post-id'));
             respond.find('input[name=comment_parent]').val(comment.data('comment-id'));
             respond.find('input:first').focus();
             }).attr('onclick', '');

             respond_cancel.on('click', function(e){
             e.preventDefault();
             comments.after(respond);
             respond.find('input[name=comment_post_ID]').val(post.data('post-id'));
             respond.find('input[name=comment_parent]').val(0);
             $(this).hide();
             });
             */
            respond_form.ajaxForm({
                'beforeSubmit':function(){
                    respond_form_error.text('').hide();
                },
                'success':function(_data){
                    var data = $.parseJSON(_data);
                    if (data.error) {
                        respond_form_error.html(data.msg).slideDown('fast');
                        return;
                    }
                    var comment_parent_id = respond.find('input[name=comment_parent]').val();
                    var _comment = $(data.html);
                    var list;
                    _comment.hide();

                    if (comment_parent_id == 0) {
                        list = comments.find('ol');
                        if (!list.length) {
                            list = $('<ol class="commentlist "></ol>');
                            comments.find('.scrollbox .jspContainer .jspPane').append(list);
                        }
                    } else {
                        list = $('#comment-' + comment_parent_id).parent().find('ul');
                        if (!list.length) {
                            list = $('<ul class="children"></ul>');
                            $('#comment-' + comment_parent_id).parent().append(list);
                        }
                        respond_cancel.trigger('click');
                    }
                    list.append(_comment);
                    _comment.fadeIn('fast');
                    //.scrollTo();

                    respond.find('textarea').clearFields();
                },
                'error':function(response){
                    var error = response.responseText.match(/\<p\>(.*)<\/p\>/)[1];
                    if (typeof(error) == 'undefined') {
                        error = 'Something went wrong. Please reload the page and try again.';
                    }
                    respond_form_error.html(error).slideDown('fast');
                }
            });
        }
        $(this).each(function(){
            var post = $(this);
            // init post galleries
            $(window).load(function(){
                $('.preview .flexslider', post).flexslider(slider_settings);
            });
            // do not init ajax posts & comments for mobile
            if (!is_mobile) {
                // ajax posts enabled
                if (ale.ajax_posts) {
                    $('a.toggle', post).click(load_post);
                    $('.video', post).fitVids();
                    $('.preview figure a', post).click(function(e){
                        e.preventDefault();
                        $(this).parents('article.post').find('a.toggle').trigger('click');
                    });
                }
            }
        });
        // init ajax comments on a single post if ajax comments are enabled
        if (is_single && parseInt(ale.ajax_comments)) {
            init_comments(posts);
        }
        // open single post on page
        if (parseInt(ale.ajax_open_single) && !is_single && posts.length == 1) {
            posts.find('a.toggle').trigger('click');
        }
    }
    posts.init_posts();

    $.fn.init_gallery = function() {
        $(this).each(function(){
            var gallery = $(this);
            $(window).load(function(){
                $('.flexslider', gallery).flexslider(slider_settings);
            });

        })
    }
    $('#gallery').init_gallery();

    $.fn.init_archives = function()
    {
        $(this).each(function(){
            var archives = $(this);
            var year = $('#archives-active-year');
            var months = $('div.months div.year-months', archives);
            var arrows = $('a.up, a.down', archives);
            var activeMonth;
            var current, active;
            var animated = false;
            if (months.length == 1) {
                arrows.remove();
                activeMonth = months.filter(':first').addClass('year-active').show();
                year.text(activeMonth.attr('id').replace(/[^0-9]*/, ''));
                return;
            }
            arrows.click(function(e){
                e.preventDefault();
                if (animated) {
                    return;
                }
                var fn = $(this);
                animated = true;
                arrows.css('visibility', 'visible');
                var current = months.filter('.year-active');
                if (fn.hasClass('up')) {
                    active = current.prev();
                    if (!active.length) {
                        active = months.filter(':last');
                    }
                } else {
                    active = current.next();
                    if (!active.length) {
                        active = months.filter(':first');
                    }
                }
                current.removeClass('year-active').fadeOut(150, function(){
                    active.addClass('year-active').fadeIn(150, function(){
                        animated = false;
                    });
                    year.text(active.attr('id').replace(/[^0-9]*/, ''));

                    if (fn.hasClass('up')) {
                        if (!active.prev().length) {
                            arrows.filter('.up').css('visibility', 'hidden');
                        }
                    } else {
                        if (!active.next().length) {
                            arrows.filter('.down').css('visibility', 'hidden');
                        }
                    }
                });
            });
            activeMonth = months.filter(':first').addClass('year-active').show();
            year.text(activeMonth.attr('id').replace(/[^0-9]*/, ''));
            arrows.filter('.up').css('visibility', 'hidden');
        });
    }
    $('#archives .ale-archives').init_archives();






});

// HTML5 Fallbacks for older browsers
jQuery(function($) {
    // check placeholder browser support
    if (!Modernizr.input.placeholder) {
        // set placeholder values
        $(this).find('[placeholder]').each(function() {
            $(this).val( $(this).attr('placeholder') );
        });

        // focus and blur of placeholders
        $('[placeholder]').focus(function() {
            if ($(this).val() == $(this).attr('placeholder')) {
                $(this).val('');
                $(this).removeClass('placeholder');
            }
        }).blur(function() {
                if ($(this).val() == '' || $(this).val() == $(this).attr('placeholder')) {
                    $(this).val($(this).attr('placeholder'));
                    $(this).addClass('placeholder');
                }
            });

        // remove placeholders on submit
        $('[placeholder]').closest('form').submit(function() {
            $(this).find('[placeholder]').each(function() {
                if ($(this).val() == $(this).attr('placeholder')) {
                    $(this).val('');
                }
            });
        });
    }
});

