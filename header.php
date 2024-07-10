<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<?php global $post; ?>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta property="og:url" content="<?= get_permalink( $post->ID ) ?>" />
		<meta property="og:type" content="website" />

		<?php
		$pageTitle = get_the_title();
		$ogTitle = get_field( 'open_graph_title' );
		if ( empty( $ogTitle ) ) {
			$ogTitle = $pageTitle;
		}
		?>
		<meta property="og:title" content="<?= $ogTitle ?>" />

		<?php
		$description = get_field( 'open_graph_description', $post->ID );
		if ( empty( $description ) ) {
			$wpMetaDescription = get_post_meta( $post->ID, '_easy_wp_meta_description', true );
			if ( !empty( $wpMetaDescription ) ) {
				$description = $wpMetaDescription;
			}
		}
		?>
		<meta property="og:description" content="<?= $description ?>" />

		<?php
		$ogImage = get_field( 'open_graph_image', $post->ID );
        if ( !empty( $ogImage ) ) {
            $ogImage = $ogImage[ 'sizes' ][ 'open-graph' ];
            if ( empty( $ogImage ) ) {
                $ogImage = get_field( 'open_graph_fallback_image', 'option' );
                if ( !empty( $ogImage ) ) {
                    $ogImage = $ogImage[ 'sizes' ][ 'open-graph' ];
                }
            }
        }
		?>
		<meta property="og:image" content="<?= $ogImage ?>" />
		<meta property="og:image:width" content="600" />
		<meta property="og:image:height" content="315" />

		<?php $tagmanagerId = gmgbase_get_tagmanager_id(); ?>
		<?php if ( !empty( $tagmanagerId ) ): ?>
			<!-- Google Tag Manager -->
			<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','<?= $tagmanagerId ?>');			</script>
			<!-- End Google Tag Manager -->
		<?php endif; ?>

		<title><?= $pageTitle ?> | <?php bloginfo( 'name' ); ?></title>
		<?php wp_head(); ?>
	</head>

	<body class="<?= gmgbase_get_page_template() ?>">
        
		<?php if ( !empty( $tagmanagerId ) ): ?>
			<!-- Google Tag Manager (noscript) -->
			<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= $tagmanagerId ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
			<!-- End Google Tag Manager (noscript) -->
		<?php endif; ?>

        <?php $enableWelcome = get_field( 'enable_welcome', 'option' ); ?>
        <input id="enable-welcome" type="hidden" value="<?php echo $enableWelcome ? '1' : '0'; ?>">
        <input id="search-results-per-page" type="hidden" value="<?= get_field( 'search_results_per_page', 'option' ) ?>">

        <div class="header-menu">
            
            <div class="left-panel">

                <div class="content-container">

                    <div class="logo-social-container content-reveal">

                        <a href="<?= bloginfo( 'url' ) ?>">
                            <div class="logo-panel">
                                <svg class="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 270.961 53.832">
                                  <g id="Group_3" data-name="Group 3" transform="translate(-198.894 -267.095)">
                                    <g id="Group_2" data-name="Group 2" transform="translate(198.894 281.004)">
                                      <g id="Group_1" data-name="Group 1" transform="translate(0 0)">
                                        <path id="Path_1" data-name="Path 1" d="M227.232,297.652a1.2,1.2,0,0,1-1.223-.85c-1.542-4.413-2.871-5.956-6.912-5.956h-5.848V306.53H215c4.36,0,5.954-2.02,6.114-4.891a1,1,0,0,1,1.063-1.063c.585,0,.9.425.8,1.116-.054,1.01-.16,2.924-.16,6.167s.106,5.1.16,6.115c.106.691-.213,1.116-.8,1.116a1,1,0,0,1-1.063-1.063c-.213-3.03-1.754-4.838-6.114-4.838h-1.755v12.44c0,2.021.319,3.137,1.914,3.457.638.106,1.01.372,1.01.9s-.373.8-1.116.745c-1.648-.106-4.147-.212-7.763-.212s-6.007.106-7.284.212a1.818,1.818,0,0,1-.8-.106.643.643,0,0,1-.32-.638c0-.531.373-.744,1.01-.9,1.063-.267,1.329-1.169,1.383-2.712V293.4c0-2.074-.107-3.243-1.383-3.563-.638-.159-1.01-.372-1.01-.85s.267-.8.957-.8H219.1c3.775,0,5.955-.107,7.125-.213.691-.053,1.169.266,1.223.9.213,2.977.213,4.679.532,7.655C228.03,297.227,227.817,297.652,227.232,297.652Z" transform="translate(-198.894 -287.502)" fill="#47505c"/>
                                        <path id="Path_2" data-name="Path 2" d="M270.34,329.394c0,.532-.479.851-1.223.851h-.851c-3.03,0-8.348.373-10.208-4.838-1.542,3.828-5.53,5.529-8.932,5.529-5.689,0-9.038-2.924-9.2-7.284-.373-11.112,14.621-10.952,17.438-13.451v-.744c0-5.476.053-8.56-2.552-8.56-5.848,0,.372,9.836-8.135,9.3-6.114-.372-6.7-10.952,8.135-10.952,9.091,0,13.557,3.615,13.557,11.324,0,0,.16,11.377.16,13.344,0,1.436,0,3.669.8,4.466C269.756,328.809,270.34,328.863,270.34,329.394Zm-12.973-8.453V313.55c-1.86,1.116-6.805,4.041-6.22,8.4a2.9,2.9,0,0,0,3.03,2.659C255.772,324.609,257.367,323.386,257.367,320.941Z" transform="translate(-211.664 -291.012)" fill="#47505c"/>
                                        <path id="Path_3" data-name="Path 3" d="M303.187,329.742c0,.532-.426.8-1.116.745-1.169-.106-3.349-.212-6.858-.212s-5.689.106-6.858.212c-.691.054-1.116-.212-1.116-.745s.372-.744,1.01-.9c1.223-.32,1.382-1.436,1.382-3.457V309.06c0-2.02-.159-3.137-1.382-3.455-.638-.16-1.01-.426-1.01-.957s.319-.851.957-.957a42.619,42.619,0,0,0,11.325-3.508c.744-.373,1.276-.054,1.276.745v24.456c0,2.021.16,3.137,1.382,3.457C302.814,329,303.187,329.211,303.187,329.742Z" transform="translate(-226.392 -291.254)" fill="#47505c"/>
                                        <path id="Path_4" data-name="Path 4" d="M329.831,325.2c-1.435,1.915-3.456,2.924-7.018,2.924-5.1,0-8.188-2.18-8.188-7.656V299.787h-.851c-.851,0-1.063-.373-1.063-1.383,0-.957.213-1.276,1.063-1.276h.213a11.314,11.314,0,0,0,9.41-6.061,1.24,1.24,0,0,1,1.223-.851c.585,0,1.169.16,1.169,1.063v5.849h2.871c.8,0,1.063.319,1.063,1.276,0,1.01-.266,1.383-1.063,1.383H325.79V321c0,1.7.426,2.445,1.063,2.765a2.488,2.488,0,0,0,1.754,0c.585-.159,1.01-.159,1.329.16C330.2,324.243,330.2,324.669,329.831,325.2Z" transform="translate(-234.321 -288.201)" fill="#47505c"/>
                                        <path id="Path_5" data-name="Path 5" d="M376.092,325.778c0,.532-.425.8-1.116.745-1.169-.106-3.349-.212-6.858-.212s-5.689.106-6.858.212c-.691.054-1.116-.212-1.116-.745s.373-.744,1.01-.9c1.223-.32,1.382-1.436,1.382-3.457V308.073c0-3.722-.745-7.231-4.041-7.231s-4.466,3.456-4.466,7.019v13.556c0,2.021.16,3.137,1.382,3.457.638.159,1.01.372,1.01.9s-.426.8-1.116.745c-1.17-.106-3.35-.212-6.859-.212s-5.689.106-6.858.212c-.691.054-1.116-.212-1.116-.745s.373-.744,1.01-.9c1.223-.32,1.382-1.436,1.382-3.457V296.324c0-2.02-.16-3.137-1.382-3.456-.638-.159-1.01-.425-1.01-.957s.319-.851.957-.957a42.669,42.669,0,0,0,11.324-3.509c.745-.373,1.276-.054,1.276.744v12.229a9.769,9.769,0,0,1,8.932-4.891c7.55,0,10.74,4.36,10.74,12.547v13.344c0,2.021.159,3.137,1.382,3.457C375.72,325.034,376.092,325.246,376.092,325.778Z" transform="translate(-242.961 -287.29)" fill="#47505c"/>
                                        <path id="Path_6" data-name="Path 6" d="M423.517,297.652a1.2,1.2,0,0,1-1.223-.85c-1.542-4.413-2.871-5.956-6.912-5.956h-5.849V306.53h1.755c4.36,0,5.954-2.02,6.114-4.891a1,1,0,0,1,1.063-1.063c.585,0,.9.425.8,1.116-.053,1.01-.16,2.924-.16,6.167s.107,5.1.16,6.115c.106.691-.213,1.116-.8,1.116a1,1,0,0,1-1.063-1.063c-.213-3.03-1.754-4.838-6.114-4.838h-1.755v12.44c0,2.021.319,3.137,1.914,3.457.638.106,1.01.372,1.01.9s-.373.8-1.116.745c-1.648-.106-4.147-.212-7.763-.212s-6.007.106-7.283.212a1.821,1.821,0,0,1-.8-.106.643.643,0,0,1-.319-.638c0-.531.372-.744,1.01-.9,1.063-.267,1.33-1.169,1.383-2.712V293.4c0-2.074-.107-3.243-1.383-3.563-.638-.159-1.01-.372-1.01-.85s.266-.8.957-.8h19.247c3.775,0,5.955-.107,7.124-.213.691-.053,1.169.266,1.223.9.213,2.977.213,4.679.532,7.655C424.314,297.227,424.1,297.652,423.517,297.652Z" transform="translate(-259.989 -287.502)" fill="#47505c"/>
                                        <path id="Path_7" data-name="Path 7" d="M466.623,329.394c0,.532-.478.851-1.222.851h-.851c-3.031,0-8.348.373-10.209-4.838-1.541,3.828-5.529,5.529-8.932,5.529-5.689,0-9.038-2.924-9.2-7.284-.372-11.112,14.621-10.952,17.439-13.451v-.744c0-5.476.053-8.56-2.552-8.56-5.848,0,.373,9.836-8.134,9.3-6.115-.372-6.7-10.952,8.134-10.952,9.092,0,13.558,3.615,13.558,11.324,0,0,.16,11.377.16,13.344,0,1.436,0,3.669.8,4.466C466.039,328.809,466.623,328.863,466.623,329.394Zm-12.972-8.453V313.55c-1.861,1.116-6.805,4.041-6.221,8.4a2.9,2.9,0,0,0,3.03,2.659C452.056,324.609,453.651,323.386,453.651,320.941Z" transform="translate(-272.759 -291.012)" fill="#47505c"/>
                                        <path id="Path_8" data-name="Path 8" d="M494.392,316.418c1.914,6.22,7.762,9.357,14.514,7.5.585-.159,1.01-.159,1.329.16.266.319.266.744-.106,1.276a14.072,14.072,0,0,1-11.7,5.582c-8.719,0-15.206-6.487-15.844-15.259-.638-8.081,5.263-16.163,15.525-16.428,14.355-.373,14.461,11.749,8.932,12.121-8.454.532-2.5-10.9-8.879-10.474C493.966,301.212,492.318,309.665,494.392,316.418Z" transform="translate(-287.182 -291.008)" fill="#47505c"/>
                                        <path id="Path_9" data-name="Path 9" d="M542.379,325.2c-1.435,1.915-3.456,2.924-7.018,2.924-5.1,0-8.188-2.18-8.188-7.656V299.787h-.85c-.851,0-1.063-.373-1.063-1.383,0-.957.212-1.276,1.063-1.276h.212a11.316,11.316,0,0,0,9.411-6.061,1.239,1.239,0,0,1,1.223-.851c.585,0,1.169.16,1.169,1.063v5.849h2.871c.8,0,1.063.319,1.063,1.276,0,1.01-.266,1.383-1.063,1.383h-2.871V321c0,1.7.426,2.445,1.063,2.765a2.49,2.49,0,0,0,1.755,0c.585-.159,1.01-.159,1.329.16C542.752,324.243,542.752,324.669,542.379,325.2Z" transform="translate(-300.478 -288.201)" fill="#47505c"/>
                                        <path id="Path_10" data-name="Path 10" d="M574.967,308.606c-6.965,0-3.349-7.231-8.454-7.657-4.572-.372-5.316,4.307-3.137,6.062,5.955,4.891,17.279,5,16.588,14.3-.266,4.254-3.35,9.623-14.408,9.623-14.621,0-15.206-10.474-9.3-10.687,6.593-.266,3.243,9.038,9.3,9.038a3.954,3.954,0,0,0,3.456-6.22c-3.243-4.626-15.791-4.307-15.738-14.143,0-5.742,5.423-9.675,13.238-9.675C581.134,299.249,580.284,308.606,574.967,308.606Z" transform="translate(-309.034 -291.012)" fill="#47505c"/>
                                      </g>
                                    </g>
                                    <path id="Path_11" data-name="Path 11" d="M290.8,289.009l-9.492-9.491,5.357-5.358,4.134,4.134L302,267.1l5.357,5.357Z" transform="translate(-25.651)" fill="#f8f87c"/>
                                  </g>
                                </svg>
                            </div>
                        </a>

                        <div class="social-panel desktop">

                            <a class="channel-container" href="<?= faithfacts_get_social_link( 'twitter' ) ?>" target="_new">
                            <svg class="twitter channel" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 1227" width="16" height="16">
<path id="Path_4527" data-name="Path 4527" d="M714.163 519.284L1160.89 0H1055.03L667.137 450.887L357.328 0H0L468.492 681.821L0 1226.37H105.866L515.491 750.218L842.672 1226.37H1200L714.137 519.284H714.163ZM569.165 687.828L521.697 619.934L144.011 79.6944H306.615L611.412 515.685L658.88 583.579L1055.08 1150.3H892.476L569.165 687.854V687.828Z" transform="translate(-38 -2)" fill="white"/>
</svg>
                            </a>

                            <a class="channel-container" href="<?= faithfacts_get_social_link( 'instagram' ) ?>" target="_new">
                                <svg class="instagram channel" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.036 18.036">
                  <path id="Path_4528" data-name="Path 4528" d="M9.018,1.6a27.65,27.65,0,0,1,3.607.1,4.647,4.647,0,0,1,1.7.3,3.519,3.519,0,0,1,1.7,1.7,4.647,4.647,0,0,1,.3,1.7c0,.9.1,1.2.1,3.607a27.65,27.65,0,0,1-.1,3.607,4.647,4.647,0,0,1-.3,1.7,3.519,3.519,0,0,1-1.7,1.7,4.647,4.647,0,0,1-1.7.3c-.9,0-1.2.1-3.607.1a27.65,27.65,0,0,1-3.607-.1,4.647,4.647,0,0,1-1.7-.3,3.519,3.519,0,0,1-1.7-1.7,4.647,4.647,0,0,1-.3-1.7c0-.9-.1-1.2-.1-3.607a27.65,27.65,0,0,1,.1-3.607,4.647,4.647,0,0,1,.3-1.7,3.6,3.6,0,0,1,.7-1,1.694,1.694,0,0,1,1-.7,4.647,4.647,0,0,1,1.7-.3,27.65,27.65,0,0,1,3.607-.1m0-1.6A29.606,29.606,0,0,0,5.31.1a6.186,6.186,0,0,0-2.2.4,3.922,3.922,0,0,0-1.6,1,3.922,3.922,0,0,0-1,1.6,4.565,4.565,0,0,0-.4,2.2A29.606,29.606,0,0,0,0,9.018a29.606,29.606,0,0,0,.1,3.707,6.186,6.186,0,0,0,.4,2.2,3.922,3.922,0,0,0,1,1.6,3.922,3.922,0,0,0,1.6,1,6.186,6.186,0,0,0,2.2.4,29.606,29.606,0,0,0,3.707.1,29.606,29.606,0,0,0,3.707-.1,6.186,6.186,0,0,0,2.2-.4,4.2,4.2,0,0,0,2.605-2.605,6.186,6.186,0,0,0,.4-2.2c0-1,.1-1.3.1-3.707a29.606,29.606,0,0,0-.1-3.707,6.186,6.186,0,0,0-.4-2.2,3.922,3.922,0,0,0-1-1.6,3.922,3.922,0,0,0-1.6-1,6.186,6.186,0,0,0-2.2-.4A29.606,29.606,0,0,0,9.018,0m0,4.409A4.535,4.535,0,0,0,4.409,9.018,4.609,4.609,0,1,0,9.018,4.409m0,7.615A2.952,2.952,0,0,1,6.012,9.018,2.952,2.952,0,0,1,9.018,6.012a2.952,2.952,0,0,1,3.006,3.006,2.952,2.952,0,0,1-3.006,3.006m4.809-8.918a1.1,1.1,0,1,0,1.1,1.1,1.112,1.112,0,0,0-1.1-1.1" fill-rule="evenodd"/>
                </svg>
                            </a>

                            <a class="channel-container" href="<?= faithfacts_get_social_link( 'facebook' ) ?>" target="_new">
                                <svg class="facebook channel" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9.419 18.036">
                  <path id="Path_4526" data-name="Path 4526" d="M86.112,18.036V9.819h2.806l.4-3.206H86.112v-2c0-.9.3-1.6,1.6-1.6h1.7V.1c-.4,0-1.4-.1-2.5-.1a3.868,3.868,0,0,0-4.108,4.208v2.4H80V9.819h2.806v8.216Z" transform="translate(-80)" fill-rule="evenodd"/>
                </svg>
                            </a>

                            <a class="channel-container" href="<?= faithfacts_get_social_link( 'youtube' ) ?>" target="_new">
                                <svg class="youtube channel" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.65 18.035">
                  <path id="Icon_awesome-youtube" data-name="Icon awesome-youtube" d="M26.164,7.322A3.223,3.223,0,0,0,23.9,5.039C21.9,4.5,13.875,4.5,13.875,4.5s-8.021,0-10.021.539A3.223,3.223,0,0,0,1.586,7.322a33.81,33.81,0,0,0-.536,6.214,33.81,33.81,0,0,0,.536,6.214A3.175,3.175,0,0,0,3.854,22c2,.539,10.021.539,10.021.539S21.9,22.535,23.9,22a3.175,3.175,0,0,0,2.268-2.246,33.81,33.81,0,0,0,.536-6.214,33.81,33.81,0,0,0-.536-6.214ZM11.252,17.35V9.722l6.7,3.814-6.7,3.814Z" transform="translate(-1.05 -4.5)" />
                </svg>
                            </a>

                        </div> <!-- social-panel desktop -->

                    </div> <!-- logo-social-container -->

                    <div class="menu-container content-reveal">

                        <?php $menu = faithfacts_get_header_menu( 0 ); ?>

                        <div class="inner-container">

                            <div class="menu-title">
                                <?= $menu[ 'title' ] ?>
                            </div>

                            <?php if ( !empty( $menu[ 'items' ] ) ): ?>
                            <div class="menu-items">
                                <?php foreach( $menu[ 'items' ] as $itemCounter => $item ): ?>
                                    <div class="item">
                                        <?php
                                        $linkClass = '';
                                        if ( strpos( $item[ 'url' ], 'faith-in-action' ) !== false ) {
                                            $linkClass = 'fia';
                                        }
                                        ?>
                                        <a class="<?= $linkClass ?>" href="<?= $item[ 'url' ] ?>" target="<?= $item[ 'target' ] ?>">
                                            <?= $item[ 'label' ] ?>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>

                            <div class="social-panel mobile">

                                <a class="channel-container" href="<?= faithfacts_get_social_link( 'twitter' ) ?>" target="_new">
                                <svg class="twitter channel" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 1227" width="16" height="16">
<path id="Path_4527" data-name="Path 4527" d="M714.163 519.284L1160.89 0H1055.03L667.137 450.887L357.328 0H0L468.492 681.821L0 1226.37H105.866L515.491 750.218L842.672 1226.37H1200L714.137 519.284H714.163ZM569.165 687.828L521.697 619.934L144.011 79.6944H306.615L611.412 515.685L658.88 583.579L1055.08 1150.3H892.476L569.165 687.854V687.828Z" transform="translate(-38 -2)" fill="white"/>
</svg>
                                </a>

                                <a class="channel-container" href="<?= faithfacts_get_social_link( 'instagram' ) ?>" target="_new">
                                    <svg class="instagram channel" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.036 18.036">
                      <path id="Path_4528" data-name="Path 4528" d="M9.018,1.6a27.65,27.65,0,0,1,3.607.1,4.647,4.647,0,0,1,1.7.3,3.519,3.519,0,0,1,1.7,1.7,4.647,4.647,0,0,1,.3,1.7c0,.9.1,1.2.1,3.607a27.65,27.65,0,0,1-.1,3.607,4.647,4.647,0,0,1-.3,1.7,3.519,3.519,0,0,1-1.7,1.7,4.647,4.647,0,0,1-1.7.3c-.9,0-1.2.1-3.607.1a27.65,27.65,0,0,1-3.607-.1,4.647,4.647,0,0,1-1.7-.3,3.519,3.519,0,0,1-1.7-1.7,4.647,4.647,0,0,1-.3-1.7c0-.9-.1-1.2-.1-3.607a27.65,27.65,0,0,1,.1-3.607,4.647,4.647,0,0,1,.3-1.7,3.6,3.6,0,0,1,.7-1,1.694,1.694,0,0,1,1-.7,4.647,4.647,0,0,1,1.7-.3,27.65,27.65,0,0,1,3.607-.1m0-1.6A29.606,29.606,0,0,0,5.31.1a6.186,6.186,0,0,0-2.2.4,3.922,3.922,0,0,0-1.6,1,3.922,3.922,0,0,0-1,1.6,4.565,4.565,0,0,0-.4,2.2A29.606,29.606,0,0,0,0,9.018a29.606,29.606,0,0,0,.1,3.707,6.186,6.186,0,0,0,.4,2.2,3.922,3.922,0,0,0,1,1.6,3.922,3.922,0,0,0,1.6,1,6.186,6.186,0,0,0,2.2.4,29.606,29.606,0,0,0,3.707.1,29.606,29.606,0,0,0,3.707-.1,6.186,6.186,0,0,0,2.2-.4,4.2,4.2,0,0,0,2.605-2.605,6.186,6.186,0,0,0,.4-2.2c0-1,.1-1.3.1-3.707a29.606,29.606,0,0,0-.1-3.707,6.186,6.186,0,0,0-.4-2.2,3.922,3.922,0,0,0-1-1.6,3.922,3.922,0,0,0-1.6-1,6.186,6.186,0,0,0-2.2-.4A29.606,29.606,0,0,0,9.018,0m0,4.409A4.535,4.535,0,0,0,4.409,9.018,4.609,4.609,0,1,0,9.018,4.409m0,7.615A2.952,2.952,0,0,1,6.012,9.018,2.952,2.952,0,0,1,9.018,6.012a2.952,2.952,0,0,1,3.006,3.006,2.952,2.952,0,0,1-3.006,3.006m4.809-8.918a1.1,1.1,0,1,0,1.1,1.1,1.112,1.112,0,0,0-1.1-1.1" fill-rule="evenodd"/>
                    </svg>
                                </a>

                                <a class="channel-container" href="<?= faithfacts_get_social_link( 'facebook' ) ?>" target="_new">
                                    <svg class="facebook channel" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9.419 18.036">
                      <path id="Path_4526" data-name="Path 4526" d="M86.112,18.036V9.819h2.806l.4-3.206H86.112v-2c0-.9.3-1.6,1.6-1.6h1.7V.1c-.4,0-1.4-.1-2.5-.1a3.868,3.868,0,0,0-4.108,4.208v2.4H80V9.819h2.806v8.216Z" transform="translate(-80)" fill-rule="evenodd"/>
                    </svg>
                                </a>

                                <a class="channel-container" href="<?= faithfacts_get_social_link( 'youtube' ) ?>" target="_new">
                                    <svg class="youtube channel" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.65 18.035">
                      <path id="Icon_awesome-youtube" data-name="Icon awesome-youtube" d="M26.164,7.322A3.223,3.223,0,0,0,23.9,5.039C21.9,4.5,13.875,4.5,13.875,4.5s-8.021,0-10.021.539A3.223,3.223,0,0,0,1.586,7.322a33.81,33.81,0,0,0-.536,6.214,33.81,33.81,0,0,0,.536,6.214A3.175,3.175,0,0,0,3.854,22c2,.539,10.021.539,10.021.539S21.9,22.535,23.9,22a3.175,3.175,0,0,0,2.268-2.246,33.81,33.81,0,0,0,.536-6.214,33.81,33.81,0,0,0-.536-6.214ZM11.252,17.35V9.722l6.7,3.814-6.7,3.814Z" transform="translate(-1.05 -4.5)" />
                    </svg>
                                </a>

                            </div> <!-- social-panel mobile -->

                        </div> <!-- inner-container -->

                    </div> <!-- menu-container -->

                </div> <!-- content-container -->

            </div> <!-- left-panel -->

            <div class="right-panel">

                <div class="top-panel">

                    <div class="content-container">

                        <div class="menu-container content-reveal">

                            <?php $menu = faithfacts_get_header_menu( 1 ); ?>

                            <div class="inner-container">

                                <div class="menu-title">
                                    <?= $menu[ 'title' ] ?>
                                </div>

                                <?php if ( !empty( $menu[ 'items' ] ) ): ?>
                                <div class="menu-items">
                                    <?php foreach( $menu[ 'items' ] as $itemCounter => $item ): ?>
                                        <div class="item">
                                            <a href="<?= $item[ 'url' ] ?>" target="<?= $item[ 'target' ] ?>">
                                                <?= $item[ 'label' ] ?>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>

                            </div> <!-- inner-container -->

                        </div> <!-- menu-container -->

                    </div> <!-- content-container -->

                </div> <!-- top-panel -->

                <div class="bottom-panel">

                    <div class="content-container">

                        <div class="menu-container content-reveal">

                            <?php $menu = faithfacts_get_header_menu( 2 ); ?>

                            <div class="inner-container">

                                <div class="menu-title">
                                    <?= $menu[ 'title' ] ?>
                                </div>

                                <?php if ( !empty( $menu[ 'items' ] ) ): ?>
                                <div class="menu-items">
                                    <?php foreach( $menu[ 'items' ] as $itemCounter => $item ): ?>
                                        <div class="item">
                                            <a href="<?= $item[ 'url' ] ?>" target="<?= $item[ 'target' ] ?>">
                                                <?= $item[ 'label' ] ?>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                            </div> <!-- inner-container -->

                        </div> <!-- menu-container -->

                    </div> <!-- content-container -->

                </div> <!-- bottom-panel -->
            </div> <!-- right-panel -->

            <div class="close-container">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6L6.4 19Z"/></svg>
            </div>
        </div> <!-- header-menu -->

        <div class="search-overlay">

            <div class="top-panel">

                <div class="inner-container">

                    <div class="logo-panel">

                        <a href="<?= bloginfo( 'url' ) ?>">
                            <div class="logo-container">
                                <svg xmlns="http://www.w3.org/2000/svg" width="270.961" height="53.832" viewBox="0 0 270.961 53.832">
                                  <g id="Group_3" data-name="Group 3" transform="translate(-198.894 -267.095)">
                                    <g id="Group_2" data-name="Group 2" transform="translate(198.894 281.004)">
                                      <g id="Group_1" data-name="Group 1" transform="translate(0 0)">
                                        <path id="Path_1" data-name="Path 1" d="M227.232,297.652a1.2,1.2,0,0,1-1.223-.85c-1.542-4.413-2.871-5.956-6.912-5.956h-5.848V306.53H215c4.36,0,5.954-2.02,6.114-4.891a1,1,0,0,1,1.063-1.063c.585,0,.9.425.8,1.116-.054,1.01-.16,2.924-.16,6.167s.106,5.1.16,6.115c.106.691-.213,1.116-.8,1.116a1,1,0,0,1-1.063-1.063c-.213-3.03-1.754-4.838-6.114-4.838h-1.755v12.44c0,2.021.319,3.137,1.914,3.457.638.106,1.01.372,1.01.9s-.373.8-1.116.745c-1.648-.106-4.147-.212-7.763-.212s-6.007.106-7.284.212a1.818,1.818,0,0,1-.8-.106.643.643,0,0,1-.32-.638c0-.531.373-.744,1.01-.9,1.063-.267,1.329-1.169,1.383-2.712V293.4c0-2.074-.107-3.243-1.383-3.563-.638-.159-1.01-.372-1.01-.85s.267-.8.957-.8H219.1c3.775,0,5.955-.107,7.125-.213.691-.053,1.169.266,1.223.9.213,2.977.213,4.679.532,7.655C228.03,297.227,227.817,297.652,227.232,297.652Z" transform="translate(-198.894 -287.502)" fill="#231f20"/>
                                        <path id="Path_2" data-name="Path 2" d="M270.34,329.394c0,.532-.479.851-1.223.851h-.851c-3.03,0-8.348.373-10.208-4.838-1.542,3.828-5.53,5.529-8.932,5.529-5.689,0-9.038-2.924-9.2-7.284-.373-11.112,14.621-10.952,17.438-13.451v-.744c0-5.476.053-8.56-2.552-8.56-5.848,0,.372,9.836-8.135,9.3-6.114-.372-6.7-10.952,8.135-10.952,9.091,0,13.557,3.615,13.557,11.324,0,0,.16,11.377.16,13.344,0,1.436,0,3.669.8,4.466C269.756,328.809,270.34,328.863,270.34,329.394Zm-12.973-8.453V313.55c-1.86,1.116-6.805,4.041-6.22,8.4a2.9,2.9,0,0,0,3.03,2.659C255.772,324.609,257.367,323.386,257.367,320.941Z" transform="translate(-211.664 -291.012)" fill="#231f20"/>
                                        <path id="Path_3" data-name="Path 3" d="M303.187,329.742c0,.532-.426.8-1.116.745-1.169-.106-3.349-.212-6.858-.212s-5.689.106-6.858.212c-.691.054-1.116-.212-1.116-.745s.372-.744,1.01-.9c1.223-.32,1.382-1.436,1.382-3.457V309.06c0-2.02-.159-3.137-1.382-3.455-.638-.16-1.01-.426-1.01-.957s.319-.851.957-.957a42.619,42.619,0,0,0,11.325-3.508c.744-.373,1.276-.054,1.276.745v24.456c0,2.021.16,3.137,1.382,3.457C302.814,329,303.187,329.211,303.187,329.742Z" transform="translate(-226.392 -291.254)" fill="#231f20"/>
                                        <path id="Path_4" data-name="Path 4" d="M329.831,325.2c-1.435,1.915-3.456,2.924-7.018,2.924-5.1,0-8.188-2.18-8.188-7.656V299.787h-.851c-.851,0-1.063-.373-1.063-1.383,0-.957.213-1.276,1.063-1.276h.213a11.314,11.314,0,0,0,9.41-6.061,1.24,1.24,0,0,1,1.223-.851c.585,0,1.169.16,1.169,1.063v5.849h2.871c.8,0,1.063.319,1.063,1.276,0,1.01-.266,1.383-1.063,1.383H325.79V321c0,1.7.426,2.445,1.063,2.765a2.488,2.488,0,0,0,1.754,0c.585-.159,1.01-.159,1.329.16C330.2,324.243,330.2,324.669,329.831,325.2Z" transform="translate(-234.321 -288.201)" fill="#231f20"/>
                                        <path id="Path_5" data-name="Path 5" d="M376.092,325.778c0,.532-.425.8-1.116.745-1.169-.106-3.349-.212-6.858-.212s-5.689.106-6.858.212c-.691.054-1.116-.212-1.116-.745s.373-.744,1.01-.9c1.223-.32,1.382-1.436,1.382-3.457V308.073c0-3.722-.745-7.231-4.041-7.231s-4.466,3.456-4.466,7.019v13.556c0,2.021.16,3.137,1.382,3.457.638.159,1.01.372,1.01.9s-.426.8-1.116.745c-1.17-.106-3.35-.212-6.859-.212s-5.689.106-6.858.212c-.691.054-1.116-.212-1.116-.745s.373-.744,1.01-.9c1.223-.32,1.382-1.436,1.382-3.457V296.324c0-2.02-.16-3.137-1.382-3.456-.638-.159-1.01-.425-1.01-.957s.319-.851.957-.957a42.669,42.669,0,0,0,11.324-3.509c.745-.373,1.276-.054,1.276.744v12.229a9.769,9.769,0,0,1,8.932-4.891c7.55,0,10.74,4.36,10.74,12.547v13.344c0,2.021.159,3.137,1.382,3.457C375.72,325.034,376.092,325.246,376.092,325.778Z" transform="translate(-242.961 -287.29)" fill="#231f20"/>
                                        <path id="Path_6" data-name="Path 6" d="M423.517,297.652a1.2,1.2,0,0,1-1.223-.85c-1.542-4.413-2.871-5.956-6.912-5.956h-5.849V306.53h1.755c4.36,0,5.954-2.02,6.114-4.891a1,1,0,0,1,1.063-1.063c.585,0,.9.425.8,1.116-.053,1.01-.16,2.924-.16,6.167s.107,5.1.16,6.115c.106.691-.213,1.116-.8,1.116a1,1,0,0,1-1.063-1.063c-.213-3.03-1.754-4.838-6.114-4.838h-1.755v12.44c0,2.021.319,3.137,1.914,3.457.638.106,1.01.372,1.01.9s-.373.8-1.116.745c-1.648-.106-4.147-.212-7.763-.212s-6.007.106-7.283.212a1.821,1.821,0,0,1-.8-.106.643.643,0,0,1-.319-.638c0-.531.372-.744,1.01-.9,1.063-.267,1.33-1.169,1.383-2.712V293.4c0-2.074-.107-3.243-1.383-3.563-.638-.159-1.01-.372-1.01-.85s.266-.8.957-.8h19.247c3.775,0,5.955-.107,7.124-.213.691-.053,1.169.266,1.223.9.213,2.977.213,4.679.532,7.655C424.314,297.227,424.1,297.652,423.517,297.652Z" transform="translate(-259.989 -287.502)" fill="#231f20"/>
                                        <path id="Path_7" data-name="Path 7" d="M466.623,329.394c0,.532-.478.851-1.222.851h-.851c-3.031,0-8.348.373-10.209-4.838-1.541,3.828-5.529,5.529-8.932,5.529-5.689,0-9.038-2.924-9.2-7.284-.372-11.112,14.621-10.952,17.439-13.451v-.744c0-5.476.053-8.56-2.552-8.56-5.848,0,.373,9.836-8.134,9.3-6.115-.372-6.7-10.952,8.134-10.952,9.092,0,13.558,3.615,13.558,11.324,0,0,.16,11.377.16,13.344,0,1.436,0,3.669.8,4.466C466.039,328.809,466.623,328.863,466.623,329.394Zm-12.972-8.453V313.55c-1.861,1.116-6.805,4.041-6.221,8.4a2.9,2.9,0,0,0,3.03,2.659C452.056,324.609,453.651,323.386,453.651,320.941Z" transform="translate(-272.759 -291.012)" fill="#231f20"/>
                                        <path id="Path_8" data-name="Path 8" d="M494.392,316.418c1.914,6.22,7.762,9.357,14.514,7.5.585-.159,1.01-.159,1.329.16.266.319.266.744-.106,1.276a14.072,14.072,0,0,1-11.7,5.582c-8.719,0-15.206-6.487-15.844-15.259-.638-8.081,5.263-16.163,15.525-16.428,14.355-.373,14.461,11.749,8.932,12.121-8.454.532-2.5-10.9-8.879-10.474C493.966,301.212,492.318,309.665,494.392,316.418Z" transform="translate(-287.182 -291.008)" fill="#231f20"/>
                                        <path id="Path_9" data-name="Path 9" d="M542.379,325.2c-1.435,1.915-3.456,2.924-7.018,2.924-5.1,0-8.188-2.18-8.188-7.656V299.787h-.85c-.851,0-1.063-.373-1.063-1.383,0-.957.212-1.276,1.063-1.276h.212a11.316,11.316,0,0,0,9.411-6.061,1.239,1.239,0,0,1,1.223-.851c.585,0,1.169.16,1.169,1.063v5.849h2.871c.8,0,1.063.319,1.063,1.276,0,1.01-.266,1.383-1.063,1.383h-2.871V321c0,1.7.426,2.445,1.063,2.765a2.49,2.49,0,0,0,1.755,0c.585-.159,1.01-.159,1.329.16C542.752,324.243,542.752,324.669,542.379,325.2Z" transform="translate(-300.478 -288.201)" fill="#231f20"/>
                                        <path id="Path_10" data-name="Path 10" d="M574.967,308.606c-6.965,0-3.349-7.231-8.454-7.657-4.572-.372-5.316,4.307-3.137,6.062,5.955,4.891,17.279,5,16.588,14.3-.266,4.254-3.35,9.623-14.408,9.623-14.621,0-15.206-10.474-9.3-10.687,6.593-.266,3.243,9.038,9.3,9.038a3.954,3.954,0,0,0,3.456-6.22c-3.243-4.626-15.791-4.307-15.738-14.143,0-5.742,5.423-9.675,13.238-9.675C581.134,299.249,580.284,308.606,574.967,308.606Z" transform="translate(-309.034 -291.012)" fill="#231f20"/>
                                      </g>
                                    </g>
                                    <path id="Path_11" data-name="Path 11" d="M290.8,289.009l-9.492-9.491,5.357-5.358,4.134,4.134L302,267.1l5.357,5.357Z" transform="translate(-25.651)" fill="#4fa6d1"/>
                                  </g>
                                </svg>
                            </div> <!-- logo-container -->
                        </a>
                    </div> <!-- logo-panel -->

                    <div class="social-panel">

                        <a class="channel-container" href="<?= faithfacts_get_social_link( 'twitter' ) ?>" target="_new">
                        <svg class="twitter channel" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 1227" width="16" height="16">
<path id="Path_4527" data-name="Path 4527" d="M714.163 519.284L1160.89 0H1055.03L667.137 450.887L357.328 0H0L468.492 681.821L0 1226.37H105.866L515.491 750.218L842.672 1226.37H1200L714.137 519.284H714.163ZM569.165 687.828L521.697 619.934L144.011 79.6944H306.615L611.412 515.685L658.88 583.579L1055.08 1150.3H892.476L569.165 687.854V687.828Z" transform="translate(-38 -2)" fill="white"/>
</svg>
                        </a>

                        <a class="channel-container" href="<?= faithfacts_get_social_link( 'instagram' ) ?>" target="_new">
                            <svg class="instagram channel" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.036 18.036">
              <path id="Path_4528" data-name="Path 4528" d="M9.018,1.6a27.65,27.65,0,0,1,3.607.1,4.647,4.647,0,0,1,1.7.3,3.519,3.519,0,0,1,1.7,1.7,4.647,4.647,0,0,1,.3,1.7c0,.9.1,1.2.1,3.607a27.65,27.65,0,0,1-.1,3.607,4.647,4.647,0,0,1-.3,1.7,3.519,3.519,0,0,1-1.7,1.7,4.647,4.647,0,0,1-1.7.3c-.9,0-1.2.1-3.607.1a27.65,27.65,0,0,1-3.607-.1,4.647,4.647,0,0,1-1.7-.3,3.519,3.519,0,0,1-1.7-1.7,4.647,4.647,0,0,1-.3-1.7c0-.9-.1-1.2-.1-3.607a27.65,27.65,0,0,1,.1-3.607,4.647,4.647,0,0,1,.3-1.7,3.6,3.6,0,0,1,.7-1,1.694,1.694,0,0,1,1-.7,4.647,4.647,0,0,1,1.7-.3,27.65,27.65,0,0,1,3.607-.1m0-1.6A29.606,29.606,0,0,0,5.31.1a6.186,6.186,0,0,0-2.2.4,3.922,3.922,0,0,0-1.6,1,3.922,3.922,0,0,0-1,1.6,4.565,4.565,0,0,0-.4,2.2A29.606,29.606,0,0,0,0,9.018a29.606,29.606,0,0,0,.1,3.707,6.186,6.186,0,0,0,.4,2.2,3.922,3.922,0,0,0,1,1.6,3.922,3.922,0,0,0,1.6,1,6.186,6.186,0,0,0,2.2.4,29.606,29.606,0,0,0,3.707.1,29.606,29.606,0,0,0,3.707-.1,6.186,6.186,0,0,0,2.2-.4,4.2,4.2,0,0,0,2.605-2.605,6.186,6.186,0,0,0,.4-2.2c0-1,.1-1.3.1-3.707a29.606,29.606,0,0,0-.1-3.707,6.186,6.186,0,0,0-.4-2.2,3.922,3.922,0,0,0-1-1.6,3.922,3.922,0,0,0-1.6-1,6.186,6.186,0,0,0-2.2-.4A29.606,29.606,0,0,0,9.018,0m0,4.409A4.535,4.535,0,0,0,4.409,9.018,4.609,4.609,0,1,0,9.018,4.409m0,7.615A2.952,2.952,0,0,1,6.012,9.018,2.952,2.952,0,0,1,9.018,6.012a2.952,2.952,0,0,1,3.006,3.006,2.952,2.952,0,0,1-3.006,3.006m4.809-8.918a1.1,1.1,0,1,0,1.1,1.1,1.112,1.112,0,0,0-1.1-1.1" fill-rule="evenodd"/>
            </svg>
                        </a>

                        <a class="channel-container" href="<?= faithfacts_get_social_link( 'facebook' ) ?>" target="_new">
                            <svg class="facebook channel" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9.419 18.036">
              <path id="Path_4526" data-name="Path 4526" d="M86.112,18.036V9.819h2.806l.4-3.206H86.112v-2c0-.9.3-1.6,1.6-1.6h1.7V.1c-.4,0-1.4-.1-2.5-.1a3.868,3.868,0,0,0-4.108,4.208v2.4H80V9.819h2.806v8.216Z" transform="translate(-80)" fill-rule="evenodd"/>
            </svg>
                        </a>

                        <a class="channel-container" href="<?= faithfacts_get_social_link( 'youtube' ) ?>" target="_new">
                            <svg class="youtube channel" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.65 18.035">
              <path id="Icon_awesome-youtube" data-name="Icon awesome-youtube" d="M26.164,7.322A3.223,3.223,0,0,0,23.9,5.039C21.9,4.5,13.875,4.5,13.875,4.5s-8.021,0-10.021.539A3.223,3.223,0,0,0,1.586,7.322a33.81,33.81,0,0,0-.536,6.214,33.81,33.81,0,0,0,.536,6.214A3.175,3.175,0,0,0,3.854,22c2,.539,10.021.539,10.021.539S21.9,22.535,23.9,22a3.175,3.175,0,0,0,2.268-2.246,33.81,33.81,0,0,0,.536-6.214,33.81,33.81,0,0,0-.536-6.214ZM11.252,17.35V9.722l6.7,3.814-6.7,3.814Z" transform="translate(-1.05 -4.5)" />
            </svg>
                        </a>

                    </div> <!-- social-panel -->

                    <div class="close-panel">
                        <div class="close-container">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6L6.4 19Z"/></svg>
                        </div>
                    </div> <!-- close-panel -->

                </div> <!-- inner-container -->

            </div> <!-- top-panel -->
            
            <div class="main-panel">

                <div class="input-container">
                    <input class="terms" placeholder="Search by keyword" />
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m20 20l-4.05-4.05m0 0a7 7 0 1 0-9.9-9.9a7 7 0 0 0 9.9 9.9z"/></svg>
                </div>

                <?php $topics = get_field( 'topic_filters', 'option' ); ?>
                <?php if ( !empty ( $topics ) && count( $topics ) > 0 ): ?>

                <div class="filters-container">

                    <?php foreach ( $topics as $topicCounter => $topic ): ?>

                        <div class="filter <?= $topic->slug ?>" topic="<?= $topic->slug ?>">

                            <div class="arrow-container">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path class="<?= $topic->slug ?>" d="M6.4 18L5 16.6L14.6 7H6V5h12v12h-2V8.4Z"/></svg>
                            </div>

                            <div class="label <?= $topic->slug ?>">
                                <?= $topic->name ?>
                            </div>

                        </div>

                    <?php endforeach; ?>

                </div> <!-- filters-container -->

                <?php endif; ?>

                <div class="results-container">

                    <div class="results">
                    </div>

                    <div class="no-more">
                        There are no more results.
                    </div>

                    <div class="load-more-container">
                        <button class="load-more">
                            Load More
                        </button>
                    </div>

                    <div class="loading-container">
                        <div class="loader">
                        </div>
                    </div>

                </div> <!-- results-container -->

            </div> <!-- main-panel -->

        </div> <!-- search-overlay -->
