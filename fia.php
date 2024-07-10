<?php
/*
Template Name: Faith in Action
*/

$fields = get_fields();
?>

<?php get_header(); ?>

<?php
get_template_part( 'template-parts/logo-menu-header', '' );
get_template_part( 'template-parts/fia-bar', '', [ 'fields' => $fields, 'topic' => 'fia' ] );
?>

<div class="fia-container">
    <input id="post-id" type="hidden" value="<?= $post->ID ?>">

    <div class="intro">
    </div>

    <div class="articles">
    </div>

    <div class="loading-container">
        <div class="loader">
        </div>
    </div>

    <div class="button-container">
        <button class="load-fia">
            Load More
        </button>
    </div>

    <div class="no-more">
        There are no more results.
    </div>
</div>

<?php get_footer(); ?>
