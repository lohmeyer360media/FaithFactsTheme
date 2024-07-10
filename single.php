<?php
$fields = get_fields();

$topic = '';
$topicName = '';
$cat = get_category( $fields['topic'] );
if ( !empty( $cat ) ) {
    $topic = $cat->slug;
    $topicName = $cat->name;
}
?>

<?php get_header(); ?>

<?php
get_template_part( 'template-parts/logo-menu-header', '' );

get_template_part( 'template-parts/topic-bar', '', [ 'topic' => $cat ] );
?>

<div class="article-panels">
    <input class="topic-slug" type="hidden" value="<?= $topic ?>" />

    <div class="article-inner-container">

        <div class="article-left-panel">

            <div class="nav-social-bar">
                <div class="nav-container">
                    <?php if ( !empty( $topic ) ): ?>
                        <a href="<?= get_bloginfo( 'url' ) . '/' . $topic ?>">
                            <button class="<?= $topic ?>">
                                <svg class="arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path class="<?= $topic ?>" d="m12 20l-1.425-1.4l5.6-5.6H4v-2h12.175l-5.6-5.6L12 4l8 8Z"/></svg>
                                <div class="label">
                                    <?= $topicName ?>
                                </div>
                            </button>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="social-container">
                    <div class="twitter channel <?= $topic ?> twitter-share">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.036 14.629"><path id="Path_4527" data-name="Path 4527" d="M43.711,16.629A10.427,10.427,0,0,0,54.232,6.108v-.5a8.145,8.145,0,0,0,1.8-1.9,8.318,8.318,0,0,1-2.1.6,3.9,3.9,0,0,0,1.6-2,9.191,9.191,0,0,1-2.3.9A3.578,3.578,0,0,0,50.525,2a3.765,3.765,0,0,0-3.707,3.707,1.953,1.953,0,0,0,.1.8A10.359,10.359,0,0,1,39.3,2.6a3.837,3.837,0,0,0-.5,1.9,3.981,3.981,0,0,0,1.6,3.106,3.378,3.378,0,0,1-1.7-.5h0a3.662,3.662,0,0,0,3.006,3.607,3.089,3.089,0,0,1-1,.1,1.705,1.705,0,0,1-.7-.1,3.8,3.8,0,0,0,3.507,2.605,7.565,7.565,0,0,1-4.609,1.6,2.774,2.774,0,0,1-.9-.1,9.457,9.457,0,0,0,5.711,1.8" transform="translate(-38 -2)" fill-rule="evenodd"/></svg>
                    </div>

                    <div class="facebook channel <?= $topic ?> facebook-share">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9.419 18.036"><path id="Path_4526" data-name="Path 4526" d="M86.112,18.036V9.819h2.806l.4-3.206H86.112v-2c0-.9.3-1.6,1.6-1.6h1.7V.1c-.4,0-1.4-.1-2.5-.1a3.868,3.868,0,0,0-4.108,4.208v2.4H80V9.819h2.806v8.216Z" transform="translate(-80)" fill-rule="evenodd"/></svg>
                    </div>

                    <div class="email channel <?= $topic ?> email-trigger">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12.156 9.725"><path id="Icon_material-email" data-name="Icon material-email" d="M13.941,6H4.216a1.214,1.214,0,0,0-1.21,1.216L3,14.509a1.219,1.219,0,0,0,1.216,1.216h9.725a1.219,1.219,0,0,0,1.216-1.216V7.216A1.219,1.219,0,0,0,13.941,6Zm0,2.431L9.078,11.47,4.216,8.431V7.216l4.863,3.039,4.863-3.039Z" transform="translate(-3 -6)" /></svg>
                    </div>
                </div> <!-- social-container -->

            </div> <!-- nav-social-bar -->

            <div class="email-share-fields">
                To: <input class="email-share-to <?= $topic ?>" type="email" />
                <br><br>
                Subject: <input class="email-share-subject <?= $topic ?>" type="text" />
                <br><br>
                <button class="email-share <?= $topic ?>" type="button">
                    Send
                </button>
            </div>

            <h1 class="headline">
                <?= $fields[ 'headline' ] ?>
            </h1>

            <div class="publisher-container <?= $topic ?>">
                <div class="publish-date-container">
                    <div class="clock">
                        <svg class="<?= $topic ?>" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 20c4.4 0 8-3.6 8-8s-3.6-8-8-8s-8 3.6-8 8s3.6 8 8 8m0-18c5.5 0 10 4.5 10 10s-4.5 10-10 10S2 17.5 2 12S6.5 2 12 2m5 11.9l-.7 1.3l-5.3-2.9V7h1.5v4.4l4.5 2.5Z"/></svg>
                    </div>

                    <div class="date">
                        <?= $fields[ 'date_published' ] ?>
                    </div>
                </div>

                <div class="publisher">
                    <div class="news">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path class="<?= $topic ?>" d="M552 64H88c-13.255 0-24 10.745-24 24v8H24c-13.255 0-24 10.745-24 24v272c0 30.928 25.072 56 56 56h472c26.51 0 48-21.49 48-48V88c0-13.255-10.745-24-24-24zM56 400a8 8 0 0 1-8-8V144h16v248a8 8 0 0 1-8 8zm236-16H140c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h152c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12zm208 0H348c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h152c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12zm-208-96H140c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h152c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12zm208 0H348c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h152c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12zm0-96H140c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h360c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12z"/></svg>
                    </div>

                    <div class="publisher-name">
                        <?= $fields[ 'publisher' ] ?>
                    </div>
                </div>
            </div>

            <div class="article">
                <?php foreach ( $fields[ 'article' ] as $moduleCounter => $module ): ?>
                    <?php if ( $module[ 'acf_fc_layout' ] == 'text' ): ?>
                        <div class="text">
                            <?= $module[ 'copy' ] ?>
                        </div>
                    <?php elseif ( $module[ 'acf_fc_layout' ] == 'gallery' ): ?>
                        <div class="gallery">

                            <div class="slides">
                                <?php foreach ( $module[ 'gallery' ] as $imgCounter => $img ): ?>
                                    <div class="slide">
                                        <div class="image-container" style="background-image: url('<?= $img[ 'url' ] ?>');">
                                        </div>
                                        <div class="caption">
                                            <?= $img[ 'caption' ] ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div> <!-- slides -->

                            <div class="pager-caption-container">
                                <div class="pager">
                                </div>

                                <div class="caption">
                                </div>
                            </div>
                        </div> <!-- gallery -->
                    <?php elseif ( $module[ 'acf_fc_layout' ] == 'quote' ): ?>
                        <div class="quote <?= $topic ?>">
                            <?= $module[ 'quote' ] ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

                <?php if ( !empty( $fields[ 'author' ] ) ): ?>
                    <?php $authorFields = get_fields( $fields[ 'author' ]->ID ); ?>

                    <div class="author-section <?= $topic ?>">
                        <div class="author-left-panel">
                            <div class="section-title <?= $topic ?>">
                                Author
                            </div>

                            <div class="image-name-container">
                                <div class="image-container" style="background-image: url('<?= faithfacts_get_thumbnail_source( $fields[ 'author' ]->ID ) ?>');">
                                </div>

                                <div class="name-title-container">
                                    <div class="name <?= $topic ?>">
                                        <?php
                                        $scholarName = $authorFields[ 'name' ];
                                        if ( !empty( $authorFields[ 'suffix' ] ) ) {
                                            $scholarName .= ', ' . $authorFields[ 'suffix' ];
                                        }
                                        echo $scholarName;
                                        ?>
                                    </div>

                                    <div class="title">
                                        <?= $authorFields[ 'title' ] ?>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- left-panel -->

                        <div class="author-right-panel">
                            <div class="channels">
                                <?php if ( !empty( $authorFields[ 'twitter' ] ) ): ?>
                                <a class="channel" href="<?= $authorFields[ 'twitter' ] ?>" target="_new">
                                    <svg class="twitter icon <?= $topic ?>" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.036 14.629">
          <path id="Path_4527" data-name="Path 4527" d="M43.711,16.629A10.427,10.427,0,0,0,54.232,6.108v-.5a8.145,8.145,0,0,0,1.8-1.9,8.318,8.318,0,0,1-2.1.6,3.9,3.9,0,0,0,1.6-2,9.191,9.191,0,0,1-2.3.9A3.578,3.578,0,0,0,50.525,2a3.765,3.765,0,0,0-3.707,3.707,1.953,1.953,0,0,0,.1.8A10.359,10.359,0,0,1,39.3,2.6a3.837,3.837,0,0,0-.5,1.9,3.981,3.981,0,0,0,1.6,3.106,3.378,3.378,0,0,1-1.7-.5h0a3.662,3.662,0,0,0,3.006,3.607,3.089,3.089,0,0,1-1,.1,1.705,1.705,0,0,1-.7-.1,3.8,3.8,0,0,0,3.507,2.605,7.565,7.565,0,0,1-4.609,1.6,2.774,2.774,0,0,1-.9-.1,9.457,9.457,0,0,0,5.711,1.8" transform="translate(-38 -2)" fill-rule="evenodd"/>
        </svg>
                                </a>
                                <?php endif; ?>

                                <?php if ( !empty( $authorFields[ 'facebook' ] ) ): ?>
                                <a class="channel" href="<?= $authorFields[ 'facebook' ] ?>" target="_new">
                                    <svg class="facebook icon <?= $topic ?>" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9.419 18.036">
          <path id="Path_4526" data-name="Path 4526" d="M86.112,18.036V9.819h2.806l.4-3.206H86.112v-2c0-.9.3-1.6,1.6-1.6h1.7V.1c-.4,0-1.4-.1-2.5-.1a3.868,3.868,0,0,0-4.108,4.208v2.4H80V9.819h2.806v8.216Z" transform="translate(-80)" fill-rule="evenodd"/>
        </svg>
                                </a>
                                <?php endif; ?>

                                <?php if ( !empty( $authorFields[ 'email' ] ) ): ?>
                                <a class="channel" href="mailto:<?= $authorFields[ 'email' ] ?>" target="_new">
                                    <svg class="email icon <?= $topic ?>" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12.156 9.725">
          <path id="Icon_material-email" data-name="Icon material-email" d="M13.941,6H4.216a1.214,1.214,0,0,0-1.21,1.216L3,14.509a1.219,1.219,0,0,0,1.216,1.216h9.725a1.219,1.219,0,0,0,1.216-1.216V7.216A1.219,1.219,0,0,0,13.941,6Zm0,2.431L9.078,11.47,4.216,8.431V7.216l4.863,3.039,4.863-3.039Z" transform="translate(-3 -6)" />
        </svg>
                                </a>
                                <?php endif; ?>
                            </div> <!-- channels -->
                        </div> <!-- right-panel -->
                    </div> <!-- author-section -->
                <?php elseif ( !empty( $fields[ 'other_author' ] ) ): ?>
                    <div class="author-section <?= $topic ?>">
                        <div class="author-left-panel">
                            <div class="section-title <?= $topic ?>">
                                Author
                            </div>

                            <div class="image-name-container">
                                <div class="name-title-container">
                                    <div class="name <?= $topic ?>">
                                        <?= $fields[ 'other_author' ] ?>
                                    </div>

                                    <div class="title">
                                        <?= $fields[ 'other_author_info' ] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div> <!-- article -->

        </div> <!-- left-panel -->

        <?php if ( !empty( $fields[ 'sidebar_modules' ] ) && count( $fields[ 'sidebar_modules' ] ) > 0 ): ?>

        <div class="article-right-panel">

            <?php faithfacts_render_modules( $fields[ 'sidebar_modules' ], $cat ); ?>

        </div> <!-- right-panel -->

        <?php endif; ?>

    </div> <!-- inner-container -->

</div>

<?php get_footer(); ?>
