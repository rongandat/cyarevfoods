jQuery(document).ready(function(){
    jQuery( "ul.top-menu-social li a" ).html('');
    jQuery( "ul.bottom-menu-social li a" ).html('<span></span>');
    jQuery( "ul.top-menu-social li.jr a" ).hover(function(){
        jQuery( "span.topsocial" ).css('background-position','-92px -92px');
    });
    jQuery( "ul.top-menu-social li.jr a" ).mouseout(function(){
        jQuery( "span.topsocial" ).css('background-position','0px -102px');
    });
    jQuery( "a#watch-video" ).click(function(){
        jQuery( "div.homevideo" ).show();
    });
    jQuery( ".homevideoclose" ).click(function(){
        jQuery( "div.homevideo" ).hide();
    });
    
    jQuery('ul.sub_menu li a').live('hover',function(){
        jQuery(this).css('color','#000');
    });
    jQuery('ul.sub_menu li a').live('mouseout',function(){
        jQuery(this).css('color','#a2a4a6');
    });
    jQuery( "ul#submenu li a" ).live('click',function(){
        jQuery( "ul#submenu li a").css('color','#a2a4a6');
        jQuery(this).css('color','#000');
        return false;
    });
    
    jQuery(window).scroll(function(){
        //        console.log(this.attr('id'));
        var wtop = jQuery(window).scrollTop();
        jQuery('div#main.wrapper > div').each(function(){
            var top = jQuery(this).offset().top;
            top = top - 173;
            if( (wtop > (top-20)) && (wtop <(top+200))){
                var id = jQuery(this).attr('id');
                if(jQuery( 'ul#submenu li a[rel='+ id +']').text() !=''){
                    jQuery( "ul#submenu li a").css('color','#a2a4a6');
                    jQuery( 'ul#submenu li a[rel='+ id +']').css('color','#000');
                }   
            }
        });
    })
});