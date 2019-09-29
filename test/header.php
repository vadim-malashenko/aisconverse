<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div class="theme-layout">

	<?php get_template_part( 'template-parts/header', 'logo' ); ?>
	<?php get_template_part( 'template-parts/header', 'menu' ); ?>
<?php get_template_part( 'template-parts/header', 'slider' ); ?>