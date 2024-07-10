<?php
/*
Template Name: About
*/

$fields = get_fields();
?>

<?php get_header(); ?>

<?php get_template_part( 'template-parts/logo-menu-header', '' ); ?>

<div id="exist" class="about-intro">

    <div class="outer-container">

        <h1 class="page-headline">
            <?= $fields[ 'headline' ] ?>
        </h1>

        <div class="intro-container">

            <h2 class="intro-headline">
                <?= $fields[ 'intro' ][ 'headline' ] ?>
            </h2>

            <div class="panels">

                <div class="left-panel">
                    <?= $fields[ 'intro' ][ 'body' ] ?>
                </div>

                <div class="right-panel">
                    <?= $fields[ 'intro' ][ 'faith_counts_body' ] ?>

                    <?php $linkParts = faithfacts_get_link_parts( $fields[ 'intro' ][ 'faith_counts_link' ][ 'link' ] ); ?>

                    <a href="<?= $linkParts[ 'link' ] ?>" target="<?= $linkParts[ 'target' ] ?>">
                        <div class="label">
                            <?= $linkParts[  'label' ] ?>
                        </div>

                        <svg class="arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m12 20l-1.425-1.4l5.6-5.6H4v-2h12.175l-5.6-5.6L12 4l8 8Z"/></svg>
                    </a>
                </div>

            </div>

        </div> <!-- intro-container -->

    </div> <!-- outer-container -->

    <div class="image-bg-container">
        <div class="color1">
        </div>
        <div class="color2">
        </div>
        <div class="image-container" style="background-image: url('<?= $fields[ 'intro' ][ 'image' ][ 'url' ] ?>');">
        </div>
    </div>

</div> <!-- about-intro -->

<div id="staff" class="staff-section">

    <?php $team = get_field( 'team', 'option' ); ?>

    <div class="inner-container">

        <div class="headline-container">

            <h2 class="staff-headline">
                <?= $team[ 'headline' ] ?>
            </h2>

            <?= $team[ 'intro' ] ?>

        </div>

        <div class="team-grid">

        <?php $members = $team[ 'members' ]; ?>
        <?php if ( !empty( $members ) && count( $members ) > 0 ): ?>
            <?php foreach ( $members as $memberCounter => $member ): ?>
                <div class="member-container" number="<?= $memberCounter ?>">

                    <?php
                    $image = $member[ 'image' ];
                    if ( !empty( $image ) ) {
                        $image = $image[ 'url' ];
                    }
                    else {
                        $image = get_field( 'fallback_content_image', 'option' );
                        if ( !empty( $image ) ) {
                            $image = $image[ 'url' ];
                        }
                    }
                    ?>

                    <div class="image-container" style="background-image: url('<?= $image ?>');">

                        <div class="overlay">
                            <div class="icon-container">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="m12 20l-1.425-1.4l5.6-5.6H4v-2h12.175l-5.6-5.6L12 4l8 8Z"/></svg>
                            </div>
                        </div>
                    </div>

                    <div class="info-container">
                        <div class="name">
                            <?= $member[ 'first_name' ] . ' ' . $member[ 'last_name' ]; ?>
                        </div>

                        <div class="title">
                            <?= $member[ 'title' ] ?>
                        </div>

                        <div class="bio">
                            <?= $member[ 'bio' ] ?>
                        </div>

                        <div class="email">
                            <?php if ( !empty( $member[ 'email' ] ) ): ?>
                                <a href="mailto:<?= $member[ 'email' ] ?>" target="_new">
                                    Email <?= $member[ 'first_name' ] ?>
                                </a>
                            <?php endif; ?>
                        </div>

                        <div class="social-links">
                            <?php if ( !empty( $member[ 'social_links' ] ) && count( $member[ 'social_links' ] ) > 0 ): ?>
                                <?php foreach ( $member[ 'social_links' ] as $linkCounter => $link ): ?>
                                    <a href="<?= $link[ 'link' ] ?>" target="_new">
                                        <?= $link[ 'label' ] ?>
                                    </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div> <!-- info-container -->
                </div> <!-- member-container -->
            <?php endforeach; ?>
        <?php endif; ?>
        </div>

    </div> <!-- inner-container -->

</div> <!-- staff-section -->

<div class="member-overlay">
    
    <div class="container">

        <div class="content-container">

            <div class="close-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="10.633" height="10.633" viewBox="0 0 10.633 10.633">
                  <g id="Group_397" data-name="Group 397" transform="translate(-1233.919 -48.419)">
                    <line class="line" id="Line_105" data-name="Line 105" x2="13.038" transform="translate(1234.626 49.126) rotate(45)" fill="none" stroke-width="2"/>
                    <line class="line" id="Line_104" data-name="Line 104" x2="13.038" transform="translate(1234.626 58.345) rotate(-45)" fill="none" stroke-width="2"/>
                  </g>
                </svg>
            </div>

            <div class="content-row">
                <div class="image-panel">
                    <div class="image-container">
                    </div>
                </div>

                <div class="content-panel">
                    <div class="name">
                    </div>

                    <div class="info-container">
                        <div class="title">
                        </div>

                        <div class="links">
                        </div>
                    </div>

                    <div class="bio-container">
                    </div>
                </div>
            </div>

            <div class="pager-row">
                <div class="previous control">
                    <svg class="arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m12 20l-1.425-1.4l5.6-5.6H4v-2h12.175l-5.6-5.6L12 4l8 8Z"/></svg>
                    <div class="label">
                        Previous Team Member
                    </div>
                </div>

                <div class="next control">
                    <div class="label">
                        Next Team Member
                    </div>

                    <svg class="arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m12 20l-1.425-1.4l5.6-5.6H4v-2h12.175l-5.6-5.6L12 4l8 8Z"/></svg>
                </div>
            </div>

        </div>

    </div>

</div> <!-- member-overlay -->

<div id="partners" class="partners">

    <div class="inner-container">

        <h2 class="partners-headline">
            <?= $fields[ 'partners_headline' ] ?>
        </h2>

        <?php if ( !empty( $fields[ 'partners' ] ) && count ( $fields[ 'partners' ] ) > 0 ): ?>
        <div class="partner-grid">
            <?php foreach ( $fields[ 'partners' ] as $partnerCounter => $partner ): ?>
                <?php
                $image = $partner[ 'image' ];
                $imageUrl = '';
                $imageAlt = '';
                if ( !empty( $image ) ) {
                    $imageUrl = $image[ 'url' ];
                    $imageAlt = $image[ 'alt' ];
                }
                ?>

                <a class="partner" href="<?= $partner[ 'link' ] ?>" target="_new">
                    <img src="<?= $imageUrl ?>" alt="<?= $imageAlt ?>">
                </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

    </div> <!-- inner-container -->

</div> <!-- partners -->

<?php get_template_part( 'template-parts/contact-bar', '', [ 'fields' => get_field( 'contact_bar', 'option' ) ] ); ?>

<?php get_footer(); ?>

