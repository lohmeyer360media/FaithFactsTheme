<?php
/*
Template Name: Data Sources
*/

$fields = get_fields();
?>

<?php get_header(); ?>

<?php
get_template_part( 'template-parts/logo-menu-header', '' );
get_template_part( 'template-parts/data-sources-bar', '', [ 'fields' => $fields, 'topic' => 'data-sources' ] );
?>

<div class="data-sources-container">
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
        <button class="load-data-sources">
            Load More
        </button>
    </div>

    <div class="no-more">
        There are no more results.
    </div>
</div>

<?php get_footer(); ?>
