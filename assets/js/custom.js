

$(document).ready(function () {
    $('#demo-side-bar').prepend($('<div id="bsa-close">x</div>').click(function () { $('#demo-side-bar').addClass('demobar-hidden').hide().remove(); }));
    try {
        /* isotope for item filtering */
        var $container = $('#portfolio');
        //        $container.isotope({
        //            itemSelector: '.work-item',
        //            layoutMode: 'fitRows'
        //        });
        // items filter

        $('#work-filter a').click(function () {
            var selector = $(this).attr('data-filter');
            $container.isotope({
                filter: selector,
                itemSelector: '.work-item',
                layoutMode: 'fitRows'
            });

            $('#work-filter').find('a.btn-success').removeClass('btn-success');
            $(this).addClass('btn-success');
            return false;
        });
    }
    catch (e)
    { }

    try {
        //adjust work item ovelay button and text to center
        var innerWidth = parseFloat($('.inner:eq(0)').outerWidth());
        var innerHeight = parseFloat($('.inner:eq(0)').outerHeight());

        $('.work-item-overlay .inner').css({ marginLeft: -innerWidth / 2.0,
            marginTop: -innerHeight / 2.0
        });
    }
    catch (e)
    { }

    try {
        //Initialize PrettyPhoto here
        $("a[rel^='prettyPhoto']").prettyPhoto({ animation_speed: 'normal', theme: 'facebook', slideshow: 3000, autoplay_slideshow: false, social_tools: false });
    }
    catch (e)
    { }

    try {
        $('.portfolio_showcase').cycle({
            fx: 'fade',
            speed: 'slow',
            timeout: 4000,
            pager: '#number',
            pause: 1
        });
     }
    catch (e)
    { }

});
