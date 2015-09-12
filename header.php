<!DOCTYPE html>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,400italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
  <?php wp_head(); ?>
</head>
<body class="site-body">
  <?php if (!is_single()) {
?>
	<div class="site-title"><h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1></div>
	<div class="site-menu">
		<ul>
			<?php wp_nav_menu(); ?>
		</ul>
	</div>
	<div style="clear:both;"></div>
<?php } ?>