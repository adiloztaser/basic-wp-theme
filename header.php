<!DOCTYPE html>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1" >
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
  <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,400italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
  <?php wp_head(); ?>
</head>
<body class="site-body">


    <div class="grid grid-pad">
        <div class="col-1-1">
           <div class="content">


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
