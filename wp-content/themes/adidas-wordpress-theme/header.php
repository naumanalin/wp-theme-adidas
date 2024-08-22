<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package adidas_wordpress_theme
 */
session_start();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="masthead" class="site-header">
		<?php if(5*2 === 10){	?>
			<div id="notifiction-bar">
			<div class="container">
				<div class="flex p-relative">
					<p class="notification-text">
                    <?= esc_html(get_option('notification_text', '')); ?>
                    <a href="<?= esc_url(get_option('notification_link', '')) ?>" class="green-a">/click here</a>
                	</p>
				<span id="cross-btn"><img src="<?= get_template_directory_uri(); ?>/assets/images/x-mark.png" alt="cross">
				</span>
				</div>
			</div>
		</div><!-- notification bar -->
		<?php  } ?>

		<div id="logo-bar">
			<div class="container">
			    <div class="flex logo-bar-container">
			    	<div class="logo-bar-left">
			    	<?php  if(has_custom_logo()){
                    the_custom_logo();
                    } else {
                        ?>
                         <span title="Go to customizer and select your site logo" style="padding:15px; background: red; color: white;"> Hover Me to read
                         </span>
                <?php } ?>
			    </div>
                <div class="logo-bar-right"> 
                	<?php if(1 != 0){ ?>
                		<a href="<?= esc_url(get_option( 'first_button_link', '' )); ?>" class="btn btn-primary">
                			<?= esc_html(get_option( 'first_button_text', '' )); ?>
                		</a>
                		<a href="<?= esc_url(get_option( 'second_button_link', '' )); ?>" class="btn btn-secondary">
                			<?= esc_html(get_option( 'second_button_text', '' )); ?>
                		</a>
                	<?php } else{ ?>
                		<div title="go to theme options page and set values of these button like MemberShip, Accounts, login, singup etc..">
                		<a href="#" class="btn btn-primary">Hi, hover me</a>
                		<a href="#" class="btn btn-secondary">hover me </a>
                		</div>
                	<?php }?>

                </div>
			    </div>
			</div> <!-- container -->
		</div> <!-- logo bar  -->

		<section id="nav-section">
			<div class="container nav-container flex">
				<nav id="site-navigation" class="main-navigation">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</nav><!-- #site-navigation -->

		        <div id="nav-left" class="flex">
		        <form action="" method="post" class="nav-form flex">
	            <input id="searchInput" onkeyup="fetchResults()" type="text" name="search-input" placeholder="SEARCH" class="search-input">
	            <button type="submit" class="nav-btn">
	            	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/search-icon.png" alt="search icon" />
	            </button>
        		</form>
        		

        		<span id="menu-btn" onclick="togglefunction();">
        			<img id="menu-btn-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/burger-icon.png" alt="Menu Toggle">
        		</span>
        		</div>



			</div>
		</section>
	</header><!-- #masthead -->
