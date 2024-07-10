<?php
/*
Template Name: Topic
*/

$fields = get_fields();
?>

<?php get_header(); ?>

<?php
get_template_part( 'template-parts/logo-menu-header', '' );

get_template_part( 'template-parts/topic-bar', '', [ 'topic' => $fields[ 'current_topic' ] ] );

get_template_part( 'template-parts/topic-intro', '', [ 'topic' => $fields[ 'current_topic' ], 'intro' => $fields[ 'topic_intro' ] ] );

if ( $fields[ 'enable_shareables' ] ) {
    get_template_part( 'template-parts/shareables', '', [ 'fields' => $fields[ 'shareables' ], 'topic' => $fields[ 'current_topic' ] ] );
}
if ( !$fields[ 'enable_shareables' ] ) {
    echo '<p>&nbsp;</p>';
}

$modules = $fields[ 'modules' ];
if ( !empty( $modules ) && count( $modules ) > 0 ) {
    $colNumbers = [ 'left', 'center', 'right' ];

    $columnsClass = $fields[ 'scholar' ] ? 'scholar' : 'no-scholar';
    echo '<div class="columns ' . $columnsClass . '">';

    for ( $colCounter = 0; $colCounter < 3; $colCounter++ ) {

        echo '<div class="' . $colNumbers[ $colCounter ] . ' column">';

        if ( $colCounter == 1 ) {
            echo '<div class="inner-container">';
        }

        foreach ( $modules as $moduleCounter => $module ) {
            if ( $module[ 'column' ] == $colNumbers[ $colCounter ] ) {
                $contentField = $module[ 'content' ][ 0 ];
                get_template_part( 'template-parts/' . str_replace( '_', '-', $contentField[ 'acf_fc_layout' ] ), '', [ 'topic' => $fields[ 'current_topic' ], 'fields' => $contentField[ $contentField[ 'acf_fc_layout' ] ] ] );
            }
        }

        if ( $colCounter == 1 ) {
            echo '</div> <!-- inner-container -->';
        }

        echo '</div> <!-- column -->';
    }

    echo '</div>';
}



get_template_part( 'template-parts/signup', '', [ 'topic' => $fields[ 'current_topic' ], 'fields' => get_field( 'signup_bar', 'option' ) ] );

if ( !$fields[ 'enable_article_carousel' ] && !$fields[ 'enable_shareables' ] ) {
    echo '<p>&nbsp;</p>';
}

if ( $fields[ 'enable_article_carousel' ] ) {
    get_template_part( 'template-parts/article-carousel', '', [ 'topic' => $fields[ 'current_topic' ], 'fields' => $fields[ 'article_carousel'  ] ] );
}

if ( $fields[ 'scholar' ] ) {
    get_template_part( 'template-parts/scholar-info', '', [ 'scholars' => $fields[ 'scholar' ], 'page-topic' => $fields[ 'current_topic' ] ] );
}

?>

<?php get_footer(); ?>
