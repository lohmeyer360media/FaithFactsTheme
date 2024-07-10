<?php
/*
Template Name: Front Page
*/

$fields = get_fields();
?>

<?php get_header(); ?>

<div class="top-panels">
    <div class="left-panel">
        <?php get_template_part( 'template-parts/logo-social-header', '' ); ?>
        <?php faithfacts_render_modules( $fields[ 'left_panel_modules' ] ); ?>
    </div>

    <div class="right-panel">
        <?php get_template_part( 'template-parts/menu-search-header', '' ); ?>
        <?php faithfacts_render_modules( $fields[ 'right_panel_modules' ] ); ?>
    </div>
</div>

<div class="bottom-panels">
    <div class="left-panel">
        <?php get_template_part( 'template-parts/featured-links', '', [ 'fields' => $fields[ 'featured_links' ] ] ); ?>
    </div>

    <div class="right-panel">
        <?php get_template_part( 'template-parts/quick-links', '', [ 'fields' => $fields[ 'quick_links' ] ] ); ?>
    </div>
</div>

<?php get_template_part( 'template-parts/scholar-carousel', '', [ 'fields' => $fields[ 'scholar_carousel' ] ] ); ?>


<?php get_footer(); ?>
