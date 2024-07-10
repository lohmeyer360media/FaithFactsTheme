<?php

$GLOBALS[ 'topics' ] = array(
    'addiction-recovery' => 'Addiction Recovery',
    'criminal-justice' => 'Criminal Justice',
    'disaster-relief' => 'Disaster Relief',
    'general-research' => 'General Research',
    'healthcare' => 'Healthcare',
    'immigration' => 'Immigration',
    'socio-economic-impact' => 'Socio-Economic Impact',
    'fia' => 'Faith in Action',
    'data-sources' => 'Data Sources',
);

function faithfacts_ajax_search_site() {
	$terms = empty( $_POST[ 'terms' ] ) ? '' : htmlentities( $_POST[ 'terms' ], ENT_QUOTES, 'UTF-8' );

    $cleanFilters = array();
    if ( !empty( $_POST[ 'filters' ] ) && count( $_POST[ 'filters' ] ) > 0 ) {
        foreach ( $_POST[ 'filters' ] as $filterCounter => $filter ) {
            $cleanFilters[] = htmlentities( $filter, ENT_QUOTES, 'UTF-8' );
        }
    }

	$page = empty( $_POST[ 'page' ] ) ? 0 : intval( $_POST[ 'page' ] );
    $postsPerPage = empty( $_POST[ 'postsPerPage' ] ) ? 9 : intval( $_POST[ 'postsPerPage' ] );

	$results = faithfacts_search_site( $terms, $cleanFilters, $page, $postsPerPage );
	echo json_encode( $results );
	die();
}

function faithfacts_ajax_get_datasources() {
    $postId = -1;
    if ( empty( $_POST[ 'postID' ] ) ) {
        echo '';
        die();
    }

    $postId = $_POST[ 'postID' ];
	$page = empty( $_POST[ 'page' ] ) ? 0 : intval( $_POST[ 'page' ] );
    $topic = empty( $_POST[ 'topic' ] ) ? '' : $_POST[ 'topic' ];

    $results = faithfacts_get_datasources( $postId, $topic, $page );
	echo json_encode( $results );
	die();
}

function faithfacts_ajax_get_fia() {
    $postId = -1;
    if ( empty( $_POST[ 'postID' ] ) ) {
        echo '';
        die();
    }

    $postId = $_POST[ 'postID' ];
	$page = empty( $_POST[ 'page' ] ) ? 0 : intval( $_POST[ 'page' ] );
    $topic = empty( $_POST[ 'topic' ] ) ? '' : $_POST[ 'topic' ];

    $results = faithfacts_get_fia( $postId, $topic, $page );
	echo json_encode( $results );
	die();
}

function faithfacts_get_fia( $postId = -1, $topic = '', $page = 0, $articlesPerPage = 12 ) {
    $results = array(
        'headline' => '',
        'summary' => '',
        'articles' => [],
    );

    $fallbackImage = get_field( 'fallback_content_image', 'option' );
    if ( !empty( $fallbackImage ) ) {
        $fallbackImage = $fallbackImage[ 'url' ];
    }
    $results[ 'fallback_image' ] = $fallbackImage;

    if ( $postId < 0 ) {
        return $results;
    }

    $fields = get_fields( $postId );
    
    if ( empty( $topic ) ) {
        $results[ 'headline' ] = $fields[ 'fia_intro' ][ 'headline' ];
        $results[ 'summary' ] = $fields[ 'fia_intro' ][ 'summary' ];

        for ( $aCounter = $page * $articlesPerPage; $aCounter < $page * $articlesPerPage + $articlesPerPage && $aCounter < count( $fields[ 'articles' ] ); $aCounter++ ) {
            $article = $fields[ 'articles' ][ $aCounter ];
            $article[ 'linkParts' ] = faithfacts_get_link_parts( $fields[ 'articles' ][ $aCounter ][ 'link' ][ 'link' ] );

            $results[ 'articles' ][] = $article;
        }
    }
    else {
        foreach ( $fields[ 'topic_intros' ] as $introCounter => $intro ) {
            if ( $intro[ 'topic' ]-> slug == $topic ) {
                $results[ 'headline' ] = $intro[ 'headline' ];
                $results[ 'summary' ] = $intro[ 'summary' ];
            }
        }

        $filtered = [];
        foreach ( $fields[ 'articles' ] as $aCounter => $article ) {
            if ( $article[ 'topic' ]->slug == $topic ) {
                $filtered[] = $article;
            }
        }

        for ( $aCounter = $page * $articlesPerPage; $aCounter < $page * $articlesPerPage + $articlesPerPage && $aCounter < count( $filtered ); $aCounter++ ) {
            $article = $filtered[ $aCounter ];
            $article[ 'linkParts' ] = faithfacts_get_link_parts( $filtered[ $aCounter ][ 'link' ][ 'link' ] );

            $results[ 'articles' ][] = $article;
        }
    }

    return $results;
}
function faithfacts_get_datasources( $postId = -1, $topic = '', $page = 0, $articlesPerPage = 12 ) {
    $results = array(
        'headline' => '',
        'summary' => '',
        'articles' => [],
    );

    $fallbackImage = get_field( 'fallback_content_image', 'option' );
    if ( !empty( $fallbackImage ) ) {
        $fallbackImage = $fallbackImage[ 'url' ];
    }
    $results[ 'fallback_image' ] = $fallbackImage;

    if ( $postId < 0 ) {
        return $results;
    }

    $fields = get_fields( $postId );
    
    if ( empty( $topic ) ) {
        $results[ 'headline' ] = $fields[ 'data-sources_intro' ][ 'headline' ];
        $results[ 'summary' ] = $fields[ 'data-sources_intro' ][ 'summary' ];

        for ( $aCounter = $page * $articlesPerPage; $aCounter < $page * $articlesPerPage + $articlesPerPage && $aCounter < count( $fields[ 'articles' ] ); $aCounter++ ) {
            $article = $fields[ 'articles' ][ $aCounter ];
            $article[ 'linkParts' ] = faithfacts_get_link_parts( $fields[ 'articles' ][ $aCounter ][ 'link' ][ 'link' ] );

            $results[ 'articles' ][] = $article;
        }
    }
    else {
        foreach ( $fields[ 'topic_intros' ] as $introCounter => $intro ) {
            if ( $intro[ 'topic' ]-> slug == $topic ) {
                $results[ 'headline' ] = $intro[ 'headline' ];
                $results[ 'summary' ] = $intro[ 'summary' ];
            }
        }

        $filtered = [];
        foreach ( $fields[ 'articles' ] as $aCounter => $article ) {
            if ( $article[ 'topic' ]->slug == $topic ) {
                $filtered[] = $article;
            }
        }

        for ( $aCounter = $page * $articlesPerPage; $aCounter < $page * $articlesPerPage + $articlesPerPage && $aCounter < count( $filtered ); $aCounter++ ) {
            $article = $filtered[ $aCounter ];
            $article[ 'linkParts' ] = faithfacts_get_link_parts( $filtered[ $aCounter ][ 'link' ][ 'link' ] );

            $results[ 'articles' ][] = $article;
        }
    }

    return $results;
}

function faithfacts_terms_in_data( $terms, $data ) {
    if ( empty( $terms ) ) {
        return true;
    }

    if ( empty( $data ) || count( $data ) == 0 ) {
        return false;
    }

    $matchFound = false;
    foreach ( $data as $dCounter => $d ) {
        if ( stripos( $d, $terms ) !== false ) {
            $matchFound = true;
            break;
        }
    }

    return $matchFound;
}

function faithfacts_search_site( $terms, $filters, $page, $postsPerPage ) {

    $query = new WP_Query( array( 'post_type' => [ 'post', 'page', 'scholar' ], 'posts_per_page' => -1 ) );
	$posts = $query->get_posts();

    $results = [];
    if ( !empty( $posts ) && count( $posts ) > 0 ) {
        foreach ( $posts as $postCounter => $p ) {
            $fields = get_fields( $p->ID );

            if ( $p->post_type == 'post' ) {
                $cat = get_category( $fields[ 'topic' ] );
                if ( !empty( $cat ) ) {
                    $topic = $cat->slug;
                }

                $matchFound = false;
                $scholarMatched = false;

                $searchFields = array(
                    $fields[ 'headline' ],
                    $fields[ 'publisher' ],
                );

                if ( faithfacts_terms_in_data( $terms, $searchFields ) ) {
                    $matchFound = true;
                }

                if ( !$matchFound ) {
                    foreach ( $fields[ 'article' ] as $moduleCounter => $module ) {
                        if ( $module[ 'acf_fc_layout' ] == 'text' ) {
                            if ( faithfacts_terms_in_data( $terms, array( $module[ 'copy' ] ) ) ) {
                                $matchFound = true;
                                break;
                            }
                        }
                        elseif ( $module[ 'acf_fc_layout' ] == 'quote' ) {
                            if ( faithfacts_terms_in_data( $terms, array( $module[ 'quote' ] ) ) ) {
                                $matchFound = true;
                                break;
                            }
                        }
                    }
                }

                if ( !$matchFound && !empty( $fields[ 'author' ] ) ) {
                    $aFields = get_fields( $fields[ 'author' ] );
                    $searchAFields = array(
                        $aFields[ 'name' ],
                        $aFields[ 'suffix' ],
                        $aFields[ 'title' ],
                    );

                    if ( faithfacts_terms_in_data( $terms, $searchAFields ) ) {
                        $matchFound = true;
                        $scholarMatched = true;
                    }
                }

                if ( $matchFound ) {
                    $result[ 'type' ] = $p->post_type;
                    $result[ 'headline' ] = $fields[ 'headline' ];        
                    $result[ 'body' ] = '';
                    $result[ 'image' ] = '';
                    $result[ 'topic' ] = $GLOBALS[ 'topics' ][ $topic ];
                    $result[ 'topic_slug' ] = $cat->slug;
                    $result[ 'link' ] = get_permalink( $p->ID );
                    $result[ 'linkTarget' ] = '';

                    if ( !$scholarMatched ) {
                        foreach ( $fields[ 'article' ] as $moduleCounter => $module ) {
                            if ( $module[ 'acf_fc_layout' ] == 'gallery' ) {
                                if ( count( $module[ 'gallery' ] ) > 0 ) {
                                    $result[ 'image' ] = $module[ 'gallery' ][ 0 ][ 'url' ];
                                    break;
                                }
                            }
                        }
                    }
                    else {
                        $result[ 'image' ] = get_the_post_thumbnail_url( $fields[ 'author' ] );
                    }

                    $results[] = $result;
                }

                $results = array_merge( $results, faithfacts_search_modules( $fields[ 'sidebar_modules' ], $topic, $terms ) );
            } // post type is post
            elseif ( $p->post_type == 'scholar' ) {
                $topic = get_category( $fields[ 'topic' ] );

                $searchFields = array(
                    $fields[ 'name' ],
                    $fields[ 'title' ],
                    $fields[ 'blurb' ],
                );

                if ( faithfacts_terms_in_data( $terms, $searchFields ) ) {
                    $result[ 'type' ] = $p->post_type;
                    $result[ 'headline' ] = $fields[ 'name' ];        
                    $result[ 'body' ] = $fields[ 'title' ];
                    $result[ 'image' ] = get_the_post_thumbnail_url( $p->ID );
                    $result[ 'topic' ] = $GLOBALS[ 'topics' ][ $topic->slug ];
                    $result[ 'topic_slug' ] = $topic->slug;
                    $result[ 'link' ] = get_bloginfo( 'url' ) . '/scholars';
                    $result[ 'linkTarget' ] = '';

                    $results[] = $result;
                }
            } // post type is scholar
            else {
                if ( $p->page_template == 'topic.php' ) {
                    $cat = get_category( $fields[ 'current_topic' ] );
                    if ( !empty( $cat ) ) {
                        $topic = $cat->slug;
                    }

                    $matchFound = false;
                    $scholarMatched = false;

                    $searchFields = array(
                        $fields[ 'topic_intro' ][ 'headline' ],
                        $fields[ 'topic_intro' ][ 'body' ],
                    );

                    if ( faithfacts_terms_in_data( $terms, $searchFields ) ) {
                        $matchFound = true;
                    }

                    if ( !$matchFound && !empty( $fields[ 'scholar' ] ) ) {
                        $aFields = get_fields( $fields[ 'scholar' ] );
                        $searchAFields = array(
                            $aFields[ 'name' ],
                            $aFields[ 'suffix' ],
                            $aFields[ 'title' ],
                            $aFields[ 'blurb' ],
                        );

                        if ( faithfacts_terms_in_data( $terms, $searchAFields ) ) {
                            $matchFound = true;
                            $scholarMatched = true;
                        }
                    }

                    if ( $matchFound ) {
                        $result[ 'type' ] = 'topic';
                        $result[ 'headline' ] = $fields[ 'topic_intro' ][ 'headline' ];        
                        $result[ 'body' ] = $fields[ 'topic_intro' ][ 'body' ];
                        $result[ 'image' ] = '';
                        $result[ 'topic' ] = $GLOBALS[ 'topics' ][ $topic ];
                        $result[ 'topic_slug' ] = $cat->slug;
                        $result[ 'link' ] = get_permalink( $p->ID );
                        $result[ 'linkTarget' ] = '';

                        if ( !$scholarMatched ) {
                            if ( !empty( $fields[ 'topic_intro' ][ 'image' ] ) ) {
                                $result[ 'image' ] = $fields[ 'topic_intro' ][ 'image' ][ 'url' ];
                            }
                        }
                        else {
                            $result[ 'image' ] = get_the_post_thumbnail_url( $fields[ 'scholar' ] );
                        }

                        $results[] = $result;
                    }

                    foreach ( $fields[ 'modules' ] as $moduleCounter => $module ) {
                        $results = array_merge( $results, faithfacts_search_modules( $module[ 'content' ], $topic, $terms ) );
                    }
                } // topic page
                elseif ( $p->page_template == 'fia.php' ) {
                    $matchFound = false;

                    $searchFields = array(
                        $fields[ 'fia_intro' ][ 'headline' ],
                        $fields[ 'fia_intro' ][ 'summary' ],
                    );

                    if ( faithfacts_terms_in_data( $terms, $searchFields ) ) {
                        $matchFound = true;
                    }

                    if ( $matchFound ) {
                        $result[ 'type' ] = 'fia';
                        $result[ 'headline' ] = $fields[ 'fia_intro' ][ 'headline' ];        
                        $result[ 'body' ] = $fields[ 'fia_intro' ][ 'summary' ];
                        $result[ 'image' ] = '';
                        $result[ 'topic' ] = $GLOBALS[ 'topics' ][ 'fia' ];
                        $result[ 'topic_slug' ] = 'fia';
                        $result[ 'link' ] = get_permalink( $p->ID );
                        $result[ 'linkTarget' ] = '';

                        $results[] = $result;
                    }

                    foreach ( $fields[ 'articles' ] as $articleCounter => $article ) {
                        $topic = get_category( $article[ 'topic' ] );

                        $searchFields = array(
                            $article[ 'headline' ],
                            $article[ 'summary' ],
                        );

                        if ( faithfacts_terms_in_data( $terms, $searchFields ) ) {
                            $result[ 'type' ] = 'fia';
                            $result[ 'headline' ] = $article[ 'headline' ];
                            $result[ 'body' ] = $article[ 'summary' ];
                            $result[ 'image' ] = '';
                            $result[ 'topic' ] = $GLOBALS[ 'topics' ][ $topic->slug ];
                            $result[ 'topic_slug' ] = $topic->slug;
                            $result[ 'link' ] = '';
                            $result[ 'linkTarget' ] = '_new';

                            if ( !empty( $article[ 'image' ] ) ) {
                                $result[ 'image' ] = $article[ 'image' ][ 'url' ];
                            }

                            $linkParts = faithfacts_get_link_parts( $article[ 'link' ][ 'link' ] );
                            $result[ 'link' ] = $linkParts[ 'url' ];
                            $result[ 'linkTarget' ] = $linkParts[ 'target' ];

                            $results[] = $result;
                        }
                    }
                } // fia page
                elseif ( $p->page_template == 'data-source.php' ) {
                    $matchFound = false;

                    $searchFields = array(
                        $fields[ 'data-source_intro' ][ 'headline' ],
                        $fields[ 'data-source_intro' ][ 'summary' ],
                    );

                    if ( faithfacts_terms_in_data( $terms, $searchFields ) ) {
                        $matchFound = true;
                    }

                    if ( $matchFound ) {
                        $result[ 'type' ] = 'data-source';
                        $result[ 'headline' ] = $fields[ 'data-source_intro' ][ 'headline' ];        
                        $result[ 'body' ] = $fields[ 'data-source_intro' ][ 'summary' ];
                        $result[ 'image' ] = '';
                        $result[ 'topic' ] = $GLOBALS[ 'topics' ][ 'fia' ];
                        $result[ 'topic_slug' ] = 'data-source';
                        $result[ 'link' ] = get_permalink( $p->ID );
                        $result[ 'linkTarget' ] = '';

                        $results[] = $result;
                    }

                    foreach ( $fields[ 'articles' ] as $articleCounter => $article ) {
                        $topic = get_category( $article[ 'topic' ] );

                        $searchFields = array(
                            $article[ 'headline' ],
                            $article[ 'summary' ],
                        );

                        if ( faithfacts_terms_in_data( $terms, $searchFields ) ) {
                            $result[ 'type' ] = 'data-source';
                            $result[ 'headline' ] = $article[ 'headline' ];
                            $result[ 'body' ] = $article[ 'summary' ];
                            $result[ 'image' ] = '';
                            $result[ 'topic' ] = $GLOBALS[ 'topics' ][ $topic->slug ];
                            $result[ 'topic_slug' ] = $topic->slug;
                            $result[ 'link' ] = '';
                            $result[ 'linkTarget' ] = '_new';

                            if ( !empty( $article[ 'image' ] ) ) {
                                $result[ 'image' ] = $article[ 'image' ][ 'url' ];
                            }

                            $linkParts = faithfacts_get_link_parts( $article[ 'link' ][ 'link' ] );
                            $result[ 'link' ] = $linkParts[ 'url' ];
                            $result[ 'linkTarget' ] = $linkParts[ 'target' ];

                            $results[] = $result;
                        }
                    }
                } // data source page
                elseif ( $p->page_template == 'about.php' ) {
                    $matchFound = false;

                    $searchFields = array(
                        $fields[ 'intro' ][ 'headline' ],
                        $fields[ 'intro' ][ 'body' ],
                        $fields[ 'intro' ][ 'faithcounts_body' ],
                    );

                    if ( faithfacts_terms_in_data( $terms, $searchFields ) ) {
                        $matchFound = true;
                    }

                    if ( $matchFound ) {
                        $result[ 'type' ] = 'about';
                        $result[ 'headline' ] = $fields[ 'intro' ][ 'headline' ];
                        $result[ 'body' ] = $fields[ 'intro' ][ 'body' ];
                        $result[ 'image' ] = '';
                        $result[ 'topic' ] = '';
                        $result[ 'topic_slug' ] = '';
                        $result[ 'link' ] = get_permalink( $p->ID );
                        $result[ 'linkTarget' ] = '';

                        $results[] = $result;
                    }

                    $team = get_field( 'team', 'option' );
                    foreach ( $team[ 'members' ] as $memberCounter => $member ) {
                        $searchFields = array(
                            $member[ 'first_name' ],
                            $member[ 'last_name' ],
                            $member[ 'title' ],
                            $member[ 'bio' ],
                        );

                        if ( faithfacts_terms_in_data( $terms, $searchFields ) ) {
                            $result[ 'type' ] = 'member';
                            $result[ 'headline' ] = $member[ 'first_name' ] . ' ' . $member[ 'last_name' ];
                            $result[ 'body' ] = $member[ 'title' ];
                            $result[ 'image' ] = '';
                            $result[ 'topic' ] = '';
                            $result[ 'topic_slug' ] = '';
                            $result[ 'link' ] = get_permalink( $p->ID ) . '?section=staff';
                            $result[ 'linkTarget' ] = '';

                            if ( !empty( $member[ 'image' ] ) ) {
                                $result[ 'image' ] = $member[ 'image' ][ 'url' ];
                            }

                            $results[] = $result;
                        }
                    }
                } // about page
            } // post type is page
        } // foreach post
    } // if posts

    $filtered = [];
    foreach ( $results as $resultCounter => $result ) {
        $alreadyFiltered = false;

        if ( empty( $filters ) || !empty( $result[ 'topic' ] ) && in_array( $result[ 'topic_slug' ], $filters ) ) {

            foreach ( $filtered as $fCounter => $f ) {
                if ( $result[ 'headline' ] == $f[ 'headline' ] ) {
                    $alreadyFiltered = true;
                    break;
                }
            }

            if ( !$alreadyFiltered ) {
                $filtered[] = $result;
            }
        }
    }

    return array_slice( $filtered, $page * $postsPerPage, $postsPerPage );
}

function faithfacts_search_modules( $modules, $topic, $terms ) {
    $results = [];

    foreach ( $modules as $moduleCounter => $module ) {
        if ( $module[ 'acf_fc_layout' ] == 'related_articles' ) {
            foreach ( $module[ 'related_articles' ][ 'articles' ] as $articleCounter => $article ) {
                $searchRFields = array(
                    $article[ 'title' ],
                    $article[ 'summary' ],
                    $article[ 'source' ],
                );

                if ( faithfacts_terms_in_data( $terms, $searchRFields ) ) {
                    $result[ 'type' ] = $topic . ' - related article';
                    $result[ 'headline' ] = $article[ 'title' ];        
                    $result[ 'body' ] = $article[ 'summary' ];
                    $result[ 'image' ] = '';
                    $result[ 'topic' ] = $GLOBALS[ 'topics' ][ $topic ];
                    $result[ 'topic_slug' ] = $topic;
                    $result[ 'link' ] = '';
                    $result[ 'linkTarget' ] = '';

                    if ( !empty( $article[ 'image' ] ) ) {
                        $result[ 'image' ] = $article[ 'image' ][ 'url' ];
                    }

                    $linkParts = faithfacts_get_link_parts( $article[ 'link' ] );
                    $result[ 'link' ] = $linkParts[ 'url' ];
                    $result[ 'linkTarget' ] = $linkParts[ 'target' ];

                    $results[] = $result;
                }
            } // foreach related article
        } // if related articles
    } // foreach sidebar module

    return $results;
}

function faithfacts_register_custom_post_types() {

    register_post_type( 'scholar',
        array(
            'description' => 'A Scholar',
            'labels' => array(
                'name' => __( 'Scholars', 'faithfacts' ),
                'singular_name' => __( 'Scholar', 'faithfacts' ),
                'add_new_item' => __( 'Add New Scholar', 'faithfacts' ),
                'edit_item' => __( 'Edit Scholar', 'faithfacts' ),
            ),
            'supports' => array( 'title', 'thumbnail' ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-welcome-learn-more',
        )
    );
}
add_action( 'init', 'faithfacts_register_custom_post_types' );

function faithfacts_register_scripts() {
    wp_register_script( 'site', get_stylesheet_directory_uri() . '/js/site.js', array( 'jquery' ), gmgbase_version_timestamp(), true );
    wp_register_script( 'article', get_stylesheet_directory_uri() . '/js/article.js', array( 'jquery', 'acf-input' ), gmgbase_version_timestamp(), true );
    wp_register_script( 'article-carousel', get_stylesheet_directory_uri() . '/js/article-carousel.js', array( 'jquery', 'acf-input' ), gmgbase_version_timestamp(), true );
    wp_register_script( 'featured-articles', get_stylesheet_directory_uri() . '/js/featured-articles.js', array( 'jquery', 'acf-input' ), gmgbase_version_timestamp(), true );
    wp_register_script( 'featured-links', get_stylesheet_directory_uri() . '/js/featured-links.js', array( 'jquery', 'acf-input' ), gmgbase_version_timestamp(), true );
    wp_register_script( 'fia', get_stylesheet_directory_uri() . '/js/fia.js', array( 'jquery', 'acf-input' ), gmgbase_version_timestamp(), true );
    wp_register_script( 'data-sources', get_stylesheet_directory_uri() . '/js/data-sources.js', array( 'jquery', 'acf-input' ), gmgbase_version_timestamp(), true );
    wp_register_script( 'quick-facts', get_stylesheet_directory_uri() . '/js/quick-facts.js', array( 'jquery', 'acf-input' ), gmgbase_version_timestamp(), true );
    wp_register_script( 'related-articles', get_stylesheet_directory_uri() . '/js/related-articles.js', array( 'jquery', 'acf-input' ), gmgbase_version_timestamp(), true );
    wp_register_script( 'scholar-carousel', get_stylesheet_directory_uri() . '/js/scholar-carousel.js', array( 'jquery', 'acf-input' ), gmgbase_version_timestamp(), true );
    wp_register_script( 'scholar-grid', get_stylesheet_directory_uri() . '/js/scholar-grid.js', array( 'jquery', 'acf-input' ), gmgbase_version_timestamp(), true );
    wp_register_script( 'shareables', get_stylesheet_directory_uri() . '/js/shareables.js', array( 'jquery', 'acf-input' ), gmgbase_version_timestamp(), true );
    wp_register_script( 'signup', get_stylesheet_directory_uri() . '/js/signup.js', array( 'jquery', 'acf-input' ), gmgbase_version_timestamp(), true );
    wp_register_script( 'team-grid', get_stylesheet_directory_uri() . '/js/team-grid.js', array( 'jquery', 'acf-input' ), gmgbase_version_timestamp(), true );
    wp_register_script( 'topic-bar', get_stylesheet_directory_uri() . '/js/topic-bar.js', array( 'jquery', 'acf-input' ), gmgbase_version_timestamp(), true );
}
add_action( 'wp_loaded', 'faithfacts_register_scripts' );

function faithfacts_enqueue_scripts() {
    wp_enqueue_style( 'gmgbase', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'museo', 'https://use.typekit.net/lje5asz.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'site', get_stylesheet_directory_uri() . '/css/site.css', array( 'gmgbase' ), wp_get_theme()->get( 'Version' ) );

    wp_enqueue_script( 'site' );
    wp_enqueue_script( 'article' );
    wp_enqueue_script( 'article-carousel' );
    wp_enqueue_script( 'featured-articles' );
    wp_enqueue_script( 'featured-links' );
    wp_enqueue_script( 'fia' );
    wp_enqueue_script( 'data-sources' );
    wp_enqueue_script( 'quick-facts' );
    wp_enqueue_script( 'related-articles' );
    wp_enqueue_script( 'scholar-carousel' );
    wp_enqueue_script( 'scholar-grid' );
    wp_enqueue_script( 'shareables' );
    wp_enqueue_script( 'signup' );
    wp_enqueue_script( 'team-grid' );
    wp_enqueue_script( 'topic-bar' );

    switch ( gmgbase_get_page_template() ) {
        case 'about':
            wp_enqueue_style( 'about-us', get_stylesheet_directory_uri() . '/css/about-us.css', array( 'gmgbase' ), wp_get_theme()->get( 'Version' ) );
            break;
        case 'front-page':
            wp_enqueue_style( 'front-page', get_stylesheet_directory_uri() . '/css/front-page.css', array( 'gmgbase' ), wp_get_theme()->get( 'Version' ) );
            break;
        case 'topic':
            wp_enqueue_style( 'topic', get_stylesheet_directory_uri() . '/css/topic.css', array( 'gmgbase' ), wp_get_theme()->get( 'Version' ) );
            break;
    }
}
add_action( 'wp_enqueue_scripts', 'faithfacts_enqueue_scripts' );

function faithfacts_get_link_parts( $linkField ) {
    $link = [
        'url' => '',
        'target' => '',
        'data-rel' => '',
        'label' => !empty( $linkField[ 'link_label' ] ) ? $linkField[ 'link_label' ] : '',
    ];

    $queryString = '';
    if ( !empty( $linkField[ 'query_string' ] ) ) {
        $queryString = '?' . ltrim( $linkField[ 'query_string' ], '?' );
    }

    switch ( $linkField[ 'link_type' ] ) {
        case ( 'internal' ):
            $link[ 'url' ] = $linkField[ 'page_link' ] . $queryString;
            break;
        case ( 'file' ):
            if ( !empty( $linkField[ 'file' ] ) ) {
                $link[ 'url' ] = $linkField[ 'file' ][ 'url' ];
                $link[ 'target' ] = '_new';
            }
            break;
        case ( 'external' ):
            $link[ 'url' ] = $linkField[ 'external_link' ] . $queryString;
            $link[ 'target' ] = '_new';
            break;
        case ( 'embedded' ):
            $link[ 'url' ] = gmgbase_get_video_service_url( $linkField[ 'embedded_content' ][ 'service' ], $linkField[ 'embedded_content' ][ 'video_id' ] );
            $link[ 'data-rel' ] = 'lightcase';
            break;
    }

    return $link;
}

function faithfacts_get_header_menu( $menuNum ) {
    $data = [];

    $menu = get_field( 'header_menus', 'option' )[ $menuNum ];
    $data[ 'title' ] = $menu[ 'title' ];

    $data[ 'items' ] = [];
    
    if ( $menu[ 'automatic_items' ] == 'topics' ) {
        $topicsCat = get_category_by_slug( 'topics' );
        $topics = [];
        if ( !empty( $topicsCat ) ) {
            $topics = get_categories( array( 
                'parent' => $topicsCat->term_id,
                'hide_empty' => false ) );
        }

        foreach ( $topics as $topicCounter => $topic ) {
            $data[ 'items' ][] = array(
                'label' => $topic->name,
                'url' => get_bloginfo( 'url' ) . '/' . $topic->slug,
                'target' => ''
            );
        }
    }
    elseif ( $menu[ 'automatic_items' ] == 'scholars' ) {
        $scholars = get_posts( array(
            'post_type' => 'scholar'
        ) );

        if ( !empty( $scholars ) && count( $scholars ) > 0 ) {
            foreach ( $scholars as $sCounter => $scholar ) {
                $fields = get_fields( $scholar->ID );

                $data[ 'items' ][] = array(
                    'label' => $fields[ 'name' ],
                    'url' => get_permalink( $scholar->ID ),
                    'target' => ''
                );
            }
        }
    }

    if ( !empty( $menu[ 'manual_items' ] ) ) {
        foreach ( $menu[ 'manual_items' ] as $itemCounter => $item ) {
            $data[ 'items' ][] = faithfacts_get_link_parts( $item[ 'item' ][ 'link' ] );
        }
    }

    return $data;
}

function faithfacts_get_social_link( $channelName ) {
    $channels = get_field( 'social_channels', 'option' );

    $link = '';
    if ( !empty( $channels ) && count( $channels ) > 0 ) {
        foreach ( $channels as $channelCounter => $channel ) {
            if ( strtolower( $channel[ 'name' ] ) == strtolower( $channelName ) ) {
                $link = $channel[ 'link' ];
                break;
            }
        }
    }
    return $link;
}

function faithfacts_get_thumbnail_source( $postId ) {
    $thumb = get_the_post_thumbnail( $postId );

    $source = '';
    if ( !empty( $thumb ) ) {
        $pos1 = strpos( $thumb, 'src="' ) + 5;
        $pos2 = strpos( $thumb, '" alt="' );
        $source = substr( $thumb, $pos1, $pos2 - $pos1 ); 
    }

    return $source;
}

function faithfacts_render_modules( $modules, $topic = null ) {
    if ( !empty( $modules ) && count( $modules ) > 0 ) {
        foreach ( $modules as $modCounter => $mod ) {
            get_template_part( 'template-parts/' . str_replace( '_', '-', $mod[ 'acf_fc_layout' ] ), '', [ 'fields' => $mod[ $mod[ 'acf_fc_layout' ]  ], 'topic' => $topic ] );
            echo '<div class="module-separator"></div>';
        }
    }
}

function faithfacts_login_logo() {
    $logo = get_field( 'login_logo', 'option');

    if ( !empty( $logo ) ) {
        echo '<style type="text/css">
            #login h1 a, .login h1 a {
                height: 60px;
                width: 320px;
                padding-bottom: 10px;
                background-image: url(' . $logo[ 'url' ] . ');
                background-size: cover;
                background-repeat: no-repeat;
            }
        </style>';
    }
}
add_action( 'login_enqueue_scripts', 'faithfacts_login_logo' );

function faithfacts_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'faithfacts_login_logo_url' );

function faithfacts_login_logo_url_title() {
    return 'FaithFacts. Experts, stories and data. Simplified.';
}
add_filter( 'login_headertitle', 'faithfacts_login_logo_url_title' );

function faithfacts_setup_theme_supported_features() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name'  => esc_attr__( 'Blue', 'faithfacts' ),
            'slug'  => 'blue',
            'color' => '#4FA6D1',
        ),
        array(
            'name'  => esc_attr__( 'Cream', 'faithfacts' ),
            'slug'  => 'cream',
            'color' => '#EDE6E1',
        ),
    ) );
}
add_action( 'after_setup_theme', 'faithfacts_setup_theme_supported_features' );

add_action( 'wp_ajax_search_site', 'faithfacts_ajax_search_site' );
add_action( 'wp_ajax_nopriv_search_site', 'faithfacts_ajax_search_site' );

add_action( 'wp_ajax_get_fia', 'faithfacts_ajax_get_fia' );
add_action( 'wp_ajax_nopriv_get_fia', 'faithfacts_ajax_get_fia' );

add_action( 'wp_ajax_get_datasources', 'faithfacts_ajax_get_datasources' );
add_action( 'wp_ajax_nopriv_get_datasources', 'faithfacts_ajax_get_datasources' );
