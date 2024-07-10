<?php
/*
Template Name: 404
*/
?>

<?php get_header(); ?>

<?php $pnf = get_field( 'page_not_found', 'option' ); ?>

<div class="fourohfour">
    <h1 class="headline">
        <?= $pnf[ 'headline' ] ?>
    </h1>
    <h2 class="subheader">
        <?= $pnf[ 'subheader' ] ?>
    </h2>
</div>

<?php get_footer(); ?>
