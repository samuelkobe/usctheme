<?php if ( get_field( 'stream_toggle', 'option' ) == 1 ) : ?>
    <?php 
        $button = 'button accent mt-4 md:mt-6 mb-2';
    ?>

    <section class="container mx-auto mt-16 px-6 lg:p-12">

        <div class="flex flex-col p-6 lg:p-8 rounded border-4 border-brand-dark my-6 lg:my-0">
            
            <?php if ( have_rows( 'service_details', 'option' ) ) : ?>

                <?php while ( have_rows( 'service_details', 'option' ) ) : the_row(); ?>

                    <?php
                        $active_service = get_sub_field( 'service_type' );
                        if ( $active_service == 'Sunday Morning Service' ) { ?>
                            
                            <h1 class="text-brand-black font-title font-bold text-2xl xl:text-4xl mb-4 lg:mb-8">Active <?php the_sub_field( 'service_type' ); ?></h1>

                            <?php $active_service_sunday_morning = get_sub_field( 'active_service_sunday_morning' ); ?>

                            <?php if ( $active_service_sunday_morning ) : ?>

                                <?php $post = $active_service_sunday_morning; ?>
                                <?php setup_postdata( $post ); ?> 
                                
                                    <div class="flex-grow w-full flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-8">
                                        
                                        <div class="w-full lg:w-1/4">
                                            <?php $event_image = get_field( 'event_image' ); ?>
                                            <?php if ( $event_image ) : ?>
                                                <img class="w-full h-80 object-cover rounded duration-500 transition-all transform scale-100" src="<?php echo esc_url( $event_image['url'] ); ?>" alt="<?php echo esc_attr( $event_image['alt'] ); ?>" />
                                            <?php endif; ?>
                                        </div>

                                        <div class="w-full flex flex-col lg:w-3/4">
                                            <h2 class="font-title font-bold text-xl lg:text-2xl text-brand-dark mb-4">Active service title: <?php the_title(); ?></h2>

                                            <div class="flex flex-col sm:flex-row items-center justify-start">
                                                <h3 class="text-xs lg:text-base text-brand-dark font-bold uppercase whitespace-nowrap">Meeting ID:</h3>

                                                <div class="tooltip mt-4 sm:mt-0">
                                                    <input class="mx-2 py-2 lg:py-3 rounded no-underline uppercase tracking-wider text-center lg:text-lg font-button mr-2 w-36 xl:w-40 font-bold text-sm xl:text-lg text-brand-accent border-2 border-brand-dark p-1 xl:p-2" type="text" value="<?php the_field( 'zoom_meeting_id' ); ?>" id="myInput" disabled>
                                                    <button class="button border-2 border-brand-dark bg-brand-dark p-2 text-white rounded font-bold relative" onclick="myFunction()" onmouseout="outFunc()">
                                                    <span class="tooltiptext" id="myTooltip">Click to copy</span>
                                                    Copy Meeting ID
                                                    </button>
                                                </div>    
                                            </div>


                                            <p class="mt-4 lg:mt-6"><?php the_sub_field( 'service_content' ); ?></p>

                                            <div class="flex flex-row relative">
                                                <a class="<?php echo $button; ?>" href="https://zoom.us/join" target="_blank">Join Now</a>
                                            </div>
                                        </div>

                                    </div>

                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                            
                        <?php } elseif ( $active_service == 'Sunday Evening Service' ) { ?>

                            <h1 class="text-brand-black font-title font-bold text-2xl xl:text-4xl mb-4 lg:mb-8">Active <?php the_sub_field( 'service_type' ); ?></h1>

                            <?php $active_service_sunday_evening = get_sub_field( 'active_service_sunday_evening' ); ?>

                            <?php if ( $active_service_sunday_evening ) : ?>

                                <?php $post = $active_service_sunday_evening; ?>
                                <?php setup_postdata( $post ); ?> 
                                
                                    <div class="flex-grow w-full flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-8">
                                        
                                        <div class="w-full lg:w-1/4">
                                            <?php $event_image = get_field( 'event_image' ); ?>
                                            <?php if ( $event_image ) : ?>
                                                <img class="w-full h-80 object-cover rounded duration-500 transition-all transform scale-100" src="<?php echo esc_url( $event_image['url'] ); ?>" alt="<?php echo esc_attr( $event_image['alt'] ); ?>" />
                                            <?php endif; ?>
                                        </div>

                                        <div class="w-full flex flex-col lg:w-3/4">
                                            <h2 class="font-title font-bold text-xl lg:text-2xl text-brand-dark mb-4">Active service title: <?php the_title(); ?></h2>

                                            <div class="flex flex-col sm:flex-row items-center justify-start">
                                                <h3 class="text-xs lg:text-base text-brand-dark font-bold uppercase whitespace-nowrap">Meeting ID:</h3>

                                                <div class="tooltip mt-4 sm:mt-0">
                                                    <input class="mx-2 py-2 lg:py-3 rounded no-underline uppercase tracking-wider text-center lg:text-lg font-button mr-2 w-36 xl:w-40 font-bold text-sm xl:text-lg text-brand-accent border-2 border-brand-dark p-1 xl:p-2" type="text" value="<?php the_field( 'zoom_meeting_id' ); ?>" id="myInput" disabled>
                                                    <button class="button border-2 border-brand-dark bg-brand-dark p-2 text-white rounded font-bold relative" onclick="myFunction()" onmouseout="outFunc()">
                                                    <span class="tooltiptext" id="myTooltip">Click to copy</span>
                                                    Copy Meeting ID
                                                    </button>
                                                </div>    
                                            </div>

                                            <p class="mt-4 lg:mt-6"><?php the_sub_field( 'service_content' ); ?></p>

                                            <div class="flex flex-row relative">
                                                <a class="<?php echo $button; ?>" href="https://zoom.us/join" target="_blank">Join Now</a>
                                            </div>
                                        </div>

                                    </div>

                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                        <?php } else {
                            echo '<p class="py-4 text-lg text-red-700">Something went wrong, contact your web admin.</p>';
                        }
                    ?>

                <?php endwhile; ?>

            <?php endif; ?>

        </div>

    </section>
<?php else : ?>
	<?php // echo 'false'; ?>
<?php endif; ?>
