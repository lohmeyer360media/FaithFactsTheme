<?php
/*
Template Name: Scholars
*/

$fields = get_fields();
?>

<?php get_header(); ?>

<?php get_template_part( 'template-parts/logo-menu-header', '' ); ?>

<div class="scholars">

    <div class="outer-container">

        <h1 class="page-headline">
            <?= $fields[ 'headline' ] ?>
        </h1>

        <div class="intro-container">

            <h2 class="intro-headline">
                <?= $fields[ 'intro_headline' ] ?>
            </h2>

            <?= $fields[ 'intro_body' ] ?>

        </div>

        <?php
        $scholars = get_posts( array(
            'post_type' => 'scholar',
            'nopaging' => true,
        ) );
        ?>

        <?php if ( !empty( $scholars ) && count( $scholars ) > 0 ): ?> 
        <div class="scholars-grid">

            <?php foreach ( $scholars as $sCounter => $scholar ): ?>
                <?php $sFields = get_fields( $scholar->ID ); ?>

                <?php
                $image = faithfacts_get_thumbnail_source( $scholar->ID );
                if ( empty( $image ) ) {
                    $image = get_field( 'fallback_content_image', 'option' );
                    if ( !empty( $image ) ) {
                        $image = $image[ 'url' ];
                    }
                }
                ?>

                <div class="scholar" scholar-id="<?= $scholar->ID ?>">
                    <div class="scholar-inner">
                        <div class="image-container" style="background-image: url('<?= $image ?>');">
                        </div>

                        <div class="info-container">
                            <?php
                            $scholarName = $sFields[ 'name' ];
                            if ( !empty( $sFields[ 'suffix' ] ) ) {
                                $scholarName .= ', ' . $sFields[ 'suffix' ];
                            }
                            ?>
                            <div class="name-container">
                                <div class="name">
                                    <?= $scholarName ?>
                                </div>
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z"/></svg>
                            </div>
                            <div class="title">
                                <?= $sFields[ 'title' ] ?>
                            </div>

                            <div class="extra-container">
                                <div class="links">
                                    <?php if ( !empty( $sFields[ 'twitter' ] ) ): ?>
                                        <a href="<?= $sFields[ 'twitter' ] ?>" target="_new">Twitter</a>
                                    <?php endif; ?>

                                    <?php if ( !empty( $sFields[ 'facebook' ] ) ): ?>
                                        <a href="<?= $sFields[ 'facebook' ] ?>" target="_new">Facebook</a>
                                    <?php endif; ?>

                                    <?php if ( !empty( $sFields[ 'email' ] ) ): ?>
                                        <a href="mailto:<?= $sFields[ 'email' ] ?>" target="_new">Email</a>
                                    <?php endif; ?>

                                    <?php if ( !empty( $sFields[ 'website' ] ) ): ?>
                                        <a href="<?= $sFields[ 'website' ] ?>" target="_new">Website</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div> <!-- scholar-inner -->
                </div> <!-- scholar -->

            <?php endforeach; ?>

        </div> <!-- scholars-grid -->
        <?php endif; ?>

    </div> <!-- outer-container -->

</div>

<?php get_template_part( 'template-parts/contact-bar', '', [ 'fields' => get_field( 'contact_bar', 'option' ) ] ); ?>

<?php get_footer(); ?>
