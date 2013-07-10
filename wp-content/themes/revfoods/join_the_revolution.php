<?php /*
 * Template Name: Join the Revolution Page
 */ ?>
<?php get_header(); ?>
<style>
    #join_revolution {
        height: 540px;
        background: #fff;
    }
    #join_revolution .main_content {
        padding: 65px 140px 0;
    }
    #join_revolution .main_content .content {
        width: 455px;
    }
    
    #join_revolution .main_content .content p {
        text-align: left;
        font-family: 'gothambook';
        font-size: 13px;
        color: #333;
        text-align: justify;
        line-height: 18px;
        padding: 25px 0;
    }
    #join_revolution .main_content .form {
        width: 535px;
        display: block;
        color: #333333;
        font-family: 'gothambook';
        font-size: 13px;
    }
    #join_revolution .main_content .form input.st-forminput {
        width: 475px;
        padding: 0 15px;
        display: block;
        height: 42px;
        font-family: 'gothambook';
        font-size: 20px;
        color: #666;
    }
    #join_revolution .main_content .form .send_info {
        padding: 18px 0 20px;
    }
    #join_revolution span.send_me {
        float: left;
        margin-right: 15px;
    }
    #join_revolution input.css-checkbox[type="checkbox"] + label.css-label {
        background-position: -5px -31px;
    }
    #join_revolution .css-label {
        background-image: url("images/checkbox_new.png");
        color: #A2A4A6;
        float: left;
        margin: 0;
        padding: 0 20px 0 20px;
        text-align: left;
        font-family: 'gothambook';
        font-size: 13px;
    }
    #join_revolution input.css-checkbox[type="checkbox"]:checked + label.css-label {
        background-position: -5px -8px;
    }    
    

    #facebook_share {
        height: 650px;
        background: #f6f6f6;
    }
    #facebook_share .about_topdotted {
        padding: 30px 0 110px;
        text-align: center;
    }
    #facebook_share .image {
        padding: 0 50px 0 90px;
        float: left;
        width: 420px;
    }
    #facebook_share .main_content {
        display: block;
        float: left;
        width: 405px;
    }
    #facebook_share h1 {
        font-family: futurabold;
        font-size: 47px;
        color: #45acc4;
        text-align: left;
        padding-bottom: 0;
    }
    #facebook_share div.content {
        text-align: left;
        font-family: 'gothambook';
        font-size: 13px;
        color: #666;
        line-height: 18px;
        padding: 23px 0 15px;
        display: block;
    }
    #facebook_share .main_content a {
        background: url("images/om_arrow.png") no-repeat scroll right 3px transparent;
        color: #000000;
        font-size: 15px;
        padding-right: 20px;
        font-family: 'futura';
    }

    #twitter_share {
        height: 650px;
        background: #fff;
    }
    #twitter_share .main_content {
        padding: 155px 30px 0 95px;
        width: 365px;
        float: left;
    }
    #twitter_share h1 {
        font-family: futurabold;
        font-size: 47px;
        color: #45acc4;
        text-align: left;
        padding-bottom: 0;
    }
    #twitter_share div.content {
        text-align: left;
        font-family: 'gothambook';
        font-size: 13px;
        color: #666;
        line-height: 18px;
        padding: 20px 0 15px;
        display: block;
    }
    #twitter_share .main_content a {
        background: url("images/om_arrow.png") no-repeat scroll right 3px transparent;
        color: #000000;
        font-size: 15px;
        padding-right: 20px;
        font-family: 'futura';
    }
    #twitter_share .image {
        float: left;
        padding-top: 95px;
    }
</style>

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Join the revolution sidebar") ) : endif; ?>

<?php get_footer(); ?>
