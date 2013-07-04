jQuery(document).ready(function(){
    jQuery( "ul.top-menu-social li a" ).html('');
    jQuery( "ul.top-menu-social li.jr a" ).hover(function(){
        jQuery( "span.topsocial" ).css('background-position','-92px -92px');
    });
    jQuery( "ul.top-menu-social li.jr a" ).mouseout(function(){
        jQuery( "span.topsocial" ).css('background-position','0px -102px');
    });
});