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
});