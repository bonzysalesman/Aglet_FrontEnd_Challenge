( function(t) {
    'use strict';
    t(document).ready(function() {
        function o() {
            var o = 400;
            t(this).scrollTop() > o ? s.addClass("in") : s.removeClass("in")
        }

        function n() {
            return t("html, body").animate({
                scrollTop: 0
            }, 1e3), !1
        }

        function a() {
            !r.hasClass("sticky-header") && t("#header-holder").length > 0 && (d = r.offset().top), t("#header-holder").height(r.innerHeight())
        }
		
function e() {
            p = t(window).scrollTop(), p > d && t("#header-holder").length > 0 ? (l.slideUp(800), r.addClass("sticky-header"), c.css({
                "padding-top": "5px",
                "padding-bottom": "5px"
            })) : (l.slideDown(800), r.removeClass("sticky-header"), c.css({
                "padding-top": "10px",
                "padding-bottom": "10px"
            }))
        }
       
        function i() {
            var o = "webkitAnimationEnd animationend";
            t("#dropdown_animation").addClass("search-animation").one(o, function() {
                t(this).removeClass("search-animation"), t(".search-pop").focus()
            })
        }
     
        var s = t(".to-top");
        s.on("click", n);
        var d, r = t("#masthead"),
            l = t("#top-bar"),
            c = t("#site-nav"),
            p = 0;
        r.wrap('<div id="header-holder"></div>'), a(), t(window).resize(function() {
            a()
        }), t(window).scroll(function() {
            e(), o()
        }), t(".comment-reply-link").addClass("btn btn-sm btn-default"), t("#submit, button[type=submit], html input[type=button], input[type=reset], input[type=submit]").addClass("btn btn-default"), t(".postform").addClass("form-control"), t("table").addClass("table table-striped"), t("#submit, .tagcloud, button[type=submit], .widget_rss ul, .postform, table#wp-calendar").show("fast"), t('a[data-toggle="tab"]:first').tab("show"), t(".navbar-nav").find("li.dropdown").hover(function() {
            t(this).addClass("open nav-animation")
        }, function() {
            t(this).removeClass("open nav-animation")
        }), t("#search_dropdown").find("a").on("click", i)
    })
})(jQuery);
(function($){
	$(document).ready(function(){
		$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
			event.preventDefault(); 
			event.stopPropagation(); 
			$(this).parent().siblings().removeClass('open');
			$(this).parent().toggleClass('open');
		});
	});
})(jQuery);  
function openNav() {
    document.getElementById("mySidenav").style.width = "310px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
/**/
function openNav2() {
    document.getElementById("mySidenav2").style.width = "510px";
}

function closeNav2() {
    document.getElementById("mySidenav2").style.width = "0";
}