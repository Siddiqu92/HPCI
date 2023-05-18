<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header>
		<div class="container">
			<div class="logo">
				<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/MicrosoftTeams-image-28.png" alt="Website Logo"></a>
			</div>
      
			<nav class="main-menu">
  <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
</nav>

		</div>
	</header>


