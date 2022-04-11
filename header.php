<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		
		<meta property="og:title" content="<?php the_field( 'open_graph_title', 'option' ); ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:image" content="<?php if ( get_field( 'open_graph_image', 'option' ) ) { the_field( 'open_graph_image', 'option' ); } ?>" />
		<meta property="og:url" content="<?php the_field( 'open_graph_url', 'option' ); ?>" />
		<meta property="og:description" content="<?php bloginfo('description'); ?>" />

		<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
		<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

		<script src="https://unpkg.com/scrollreveal"></script>
		<script>
			ScrollReveal({ reset: true });
		</script>

		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>
		<?php if ( ! function_exists( 'wp_body_open' ) ) {
			function wp_body_open() {
				do_action( 'wp_body_open' );
			}
		} ?>

		<!-- wrapper -->
		<div id="content-wrapper" class="wrapper">

			<header id="header" class="flex flex-row w-full h-auto bg-white opacity-70 fixed top-0 z-50 header-onload" role="banner">

				<div class="contained w-full justify-around">
					<div class="flex flex-row items-center w-full h-16 lg:h-32 justify-between relative">

						<div class="flex flex-row items-center w-24 lg:w-48 xl:w-auto py-4 order-1 z-20">
							<?php if (has_custom_logo()) : ?>
								<div class="flex flex-row lg:mr-4"><?php the_custom_logo(); ?></div>
							<?php else : ?>
								<p class="text-base"><?php bloginfo('title');?></p>
								<p class="text-xs"><?php bloginfo('description');?></p>
							<?php endif; ?>
						</div>

						<div class="visible lg:invisible block lg:hidden order-2 lg:order-3 w-8 h-4 lg:w-0 justify-center items-center z-20">
							<!-- button -->
							<button id="menu-button" class="hamburger w-8 flex flex-col focus:outline-none" type="button" name="navigation button" aria-label="navigation button">
								<span class="w-8 h-1 bg-brand-main inline-block mb-2 transition-transform ease-out duration-200 origin-hamburger"></span>
								<span class="w-8 h-1 bg-brand-main inline-block transition-transform ease-out duration-200 origin-hamburger"></span>
							</button>
							<!-- /button -->
						</div>

						<div id="menu" class="fixed lg:relative top-0 right-0 order-3 lg:order-2 w-full lg:w-auto lg:h-auto lg:min-h-0 z-10 lg:z-20 flex flex-col lg:flex-row lg:justify-end shadow-lg lg:shadow-none p-6 pt-24 lg:p-0 transform translate-x-full lg:transform-none lg:translate-x-0 transition-transform duration-0 lg:duration-0 lg:opacity-100 bg-grey-light lg:bg-transparent">
							<nav class="flex flex-col lg:flex-row items-center justify-end text-grey-dark text-center lg:text-left" role="navigation">
								
								<?php webokstarter_nav(); ?>

								<div class="w-full lg:w-auto flex flex-col lg:flex-row items-center lg:items-start lg:ml-4 mb-20 lg:mb-0">

									<?php if ( get_field( 'header_button_1_toggle', 'option' ) == 1 ) : ?>
										<?php $button = 'button main small mt-4 lg:mt-0 lg:mx-2';?>
										<?php $extra_button_1 = get_field( 'extra_button_1', 'option' ); ?>
										<?php if ( $extra_button_1 ) : ?>
											<div class="flex flex-row relative">
												<a class="<?php echo $button; ?>" href="<?php echo esc_url( $extra_button_1['url'] ); ?>" target="<?php echo esc_attr( $extra_button_1['target'] ); ?>"><?php echo esc_html( $extra_button_1['title'] ); ?></a>
											</div>
										<?php endif; ?>
									<?php endif; ?>

									<?php if ( get_field( 'header_button_2_toggle', 'option' ) == 1 ) : ?>
										<?php $button = 'button main small mt-4 lg:mt-0 lg:mx-2';?>
										<?php $extra_button_2 = get_field( 'extra_button_2', 'option' ); ?>
										<?php if ( $extra_button_2 ) : ?>
											<div class="flex flex-row relative">
												<a class="<?php echo $button; ?>" href="<?php echo esc_url( $extra_button_2['url'] ); ?>" target="<?php echo esc_attr( $extra_button_2['target'] ); ?>"><?php echo esc_html( $extra_button_2['title'] ); ?></a>
											</div>
										<?php endif; ?>
									<?php endif; ?>


									<!-- <?php if ( get_field( 'stream_toggle', 'option' ) == 1 ) : // active serice is on ?>
										<?php if ( have_rows( 'service_details', 'option' ) ) : ?>
											<?php while ( have_rows( 'service_details', 'option' ) ) : the_row(); ?>
												<?php $button = 'button accent small mt-4 lg:mt-0 lg:mx-1';?>
												<?php $button_link = get_sub_field( 'button_link' ); ?>
												<?php if ( $button_link ) : ?>
													<div class="flex flex-row relative">
														<a class="<?php echo $button; ?>" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
													</div>
												<?php endif; ?>
											<?php endwhile; ?>
										<?php endif; ?>
									<?php endif; ?> -->
									
								</div>

							</nav>
						</div>

					</div>
				</div>
				
			</header>
