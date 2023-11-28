<?php get_header(); ?>

<main role="main">
    
    <?php get_template_part('parts/_page-hero'); ?>
    
    <section class="contained my-8 xl:my-16 object-reveal-short">
        <div class="w-full lg:w-5/6">

            <div class="w-full flex flex-col lg:flex-row">
                <div class="w-full lg:w-2/3 xl:w-3/4">
                    <h2 class="text-lg sm:text-xl xl:text-2xl xl:leading-snug font-title font-bold text-brand-dark text-left mb-4 lg:mb-6"><?php the_field( 'service_description_header' ); ?></h2>
                </div>
                <?php if ( get_field( 'service_cost_toggle' ) == 1 || get_field( 'service_time_toggle' ) == 1 ) : ?>
                    <div class="w-full lg:w-1/3 xl:1/4 flex flex-col mb-6">
                        <?php if ( get_field( 'service_cost_toggle' ) == 1 ) : ?>
                            <div class="w-full flex flex-row lg:justify-end">
                                    <p class="text-lg lg:text-xl text-brand-dark">Cost: <span class="text-black"><?php the_field( 'service_cost' ); ?></span></p>
                            </div>
                        <?php endif; ?>
                        <?php if ( get_field( 'service_time_toggle' ) == 1 ) : ?>
                            <div class="w-full flex flex-row lg:justify-end">
                                    <p class="text-lg lg:text-xl text-brand-dark">Time: <span class="text-black"><?php the_field( 'service_time' ); ?></span></p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <p class="font-sans text-brand-black text-base lg:text-lg w-full xl:w-5/6 2xl:w-3/4"><?php the_field( 'service_description_content' ); ?></p>

            <div class="w-full flex flex-col mt-6 lg:mt-8">
                <?php if ( get_field( 'service_location_toggle' ) == 1 ) : ?>
                    <h3 class="text-lg lg:text-xl text-brand-dark">Location:</h3> 
                    <p><?php the_field( 'service_location' ); ?></p>
                <?php endif; ?>
            </div>

            <?php if ( get_field( 'service_description_button' ) == 1 ) : ?>
                <?php $service_button = get_field( 'service_button' ); ?>
                <?php 
                    $button = 'button main mt-4 md:mt-8 mb-2';
                ?>
                <?php if ( $service_button ) : ?>
                    <div class="flex flex-row relative">
                        <a class="<?php echo $button; ?>"  href="<?php echo esc_url( $service_button['url'] ); ?>" target="<?php echo esc_attr( $service_button['target'] ); ?>"><?php echo esc_html( $service_button['title'] ); ?></a>
                    </div>
                <?php endif; ?>
            <?php else : ?>
                <?php // echo 'false'; ?>
            <?php endif; ?>
            
        </div>
    </section>
    
    <?php get_template_part('parts/_events_loop'); ?>

</main>

<?php get_footer(); ?>

