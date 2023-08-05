<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CoderDojo
 * @subpackage CoderDojo
 * @since 1.0.0
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head();?>
    </head>

    <body <?php body_class();?>>
        <header id="site-header" class="header">
            <div id="header-wrapper" class="wrapper">
                <?php get_template_part('template-parts/site/branding'); ?>
                <?php get_template_part('template-parts/header/desktop-navigation'); ?>
                <?php get_template_part('template-parts/header/call-to-action'); ?>
                <button id="mobile-menu-toggle" class="toggle-button" onclick="toggleMobileMenu()">&#9776;</button>
            </div>
            <?php get_template_part('template-parts/header/mobile-navigation'); ?> 
        </header>




        