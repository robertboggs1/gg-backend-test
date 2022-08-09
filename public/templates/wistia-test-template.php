<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package stp-starter-theme
 */

?>

<?php get_header();?>
<style>
    .video-container {
        position:relative;
    }
    .login-popup {
        position:absolute;
        top:0; left:0;
        height:100%; width:100%;
        background:rgba(255,255,255, .8);
        padding:60px;
    }
    .login-popup form {
        margin:0 auto;
        max-width:400px;
    }
    .login-popup form input {
        width:100%;
    }
</style>
<div class="container">

	<main id="primary" class="site-main">
        <div class="video-container">
            <script src="https://fast.wistia.com/embed/medias/0131326dff.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:52.71% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_0131326dff videoFoam=true" style="height:100%;position:relative;width:100%"><div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;"><img src="https://fast.wistia.com/embed/medias/0131326dff/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" aria-hidden="true" onload="this.parentNode.style.opacity=1;" /></div></div></div></div>
            <div class="login-popup card d-none">
                <h2 class="text-center">Please Login to Continue</h2>
                <form name="loginform" id="loginform" action="/" method="post"><p class="login-username">
                    <p class="status"></p>
				<label for="user_login">Username or Email Address</label>
				<input type="text" name="log" id="user_login" autocomplete="username" class="input" value="" size="20">
			</p><p class="login-password">
				<label for="user_pass">Password</label>
				<input type="password" name="pwd" id="user_pass" autocomplete="current-password" class="input" value="" size="20">
			</p><p class="login-remember"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember Me</label></p><p class="login-submit">
				<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary" value="Log In">
                <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
			</p></form>
            </div>
        </div>
	</main><!-- #main -->
</div>
<?php get_footer();?>
