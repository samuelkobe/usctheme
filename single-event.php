<?php get_header(); ?>

<main role="main">
        
    <?php
        $cat_bg_colour = '';
        $categories = get_the_category();

        if ( ! empty( $categories ) ) {
            $cat_name = $categories[0]->name;
            $cat_slug_url = $categories[0]->cat_name;
            $cat_slug =  strtolower( $categories[0]->slug );
        }
        
        if ( $cat_slug == 'sunday-morning-service' ) {
            $cat_bg_colour = 'main';
        } elseif ($cat_slug == 'sunday-evening-service') {
            $cat_bg_colour = 'dark';
        } elseif ($cat_slug == 'friday-evening-programs') {
            $cat_bg_colour = 'accent';
        } elseif ($cat_slug == 'workshops') {
            $cat_bg_colour = 'neutral';
        } else {
            $cat_bg_colour = 'black';
        }

        $location_selected_option = get_field( 'location' );
        if ( $location_selected_option ) :
            $local_label = esc_html( $location_selected_option['label'] );
            $local_value = esc_html( $location_selected_option['value'] );
        endif;

        $button = 'button main mt-3 md:mt-6 mb-2';
        $button_highlighted = 'button accent ml-2';

        $active_event = false;
        $past_event = false;

        date_default_timezone_set(wp_timezone_string());

        $date_now = date('Y-m-d H:i:s');
        $time_now = strtotime($date_now);

        $event_start = strtotime(get_field( 'start_date', false, false )); // take data from user input and make it into a time stamp for the event start
        $event_end = strtotime(get_field( 'end_date', false, false ));  // take data from user input and make it into a time stamp for the event end

        if ($time_now > $event_end) {
            $past_event = true;
        }

        if($time_now > $event_start && $time_now < $event_end) {
            $active_event = true;
        }

        $formatted_event_start = date("l-M-d-g:i a", $event_start); // convert the time stamp into a viewable format that can later be chopped up.
        $arr_start = explode('-', $formatted_event_start); // explode the new formatted string that is the start date
        $displayed_date = $arr_start[0] . ", " . date('F d, Y | g:i a', $event_start); // assembled date with full month name

    ?>
    <section class="flex relative w-full lg:custom-h-screen custom-h-screen-65 min-h-96 lg:min-h-96 overflow-hidden bg-brand-<?php echo $cat_bg_colour; ?>">
        <div class="absolute left-0 top-0 h-full w-full bg-black z-10 opacity-20 pointer-events-none"></div>
        <div class="absolute left-0 bottom-0 h-3 w-full bg-brand-<?php echo $cat_bg_colour; ?> z-10 pointer-events-none"></div>
        
            <?php $event_image = get_field( 'event_image' ); ?>
            <?php if ( $event_image ) : ?>
                <img class="absolute top-16 left-0 w-full h-full object-cover mix-blend-luminosity" src="<?php echo esc_url( $event_image['url'] ); ?>" alt="<?php echo esc_attr( $event_image['alt'] ); ?>" />
            <?php endif; ?> 

        <div class="w-full py-8 md:py-16 mt-16 lg:mt-0 contained flex-col lg:flex-row items-center justify-start relative z-20 text-white object-reveal-short">

            <div class="w-full lg:w-2/3 order-2">

                <h1 class="font-black font-title my-3 lg:mt-6 lg:mb-4 text-3xl md:text-4xl lg:text-5xl xl:text-6xl leading-none lg:leading-tight xl:leading-snug"><?php the_title() ?></h1>
                <p class="font-normal lg:leading-normal text-base lg:text-lg xl:text-xl w-full tracking-wider"><?php echo $displayed_date; ?></p>

            </div>

        </div>
    </section>
    
    <section>
        <div class="contained py-6 lg:py-16 object-reveal-short">
            
            <div class="w-full mb-6 lg:mb-12">
                <p class="tracking-wider"><a class="text-brand-black" href="/service/<?php echo formatUrl($cat_slug_url) ; ?>"><?php echo $cat_name ?></a><?php echo " > " . get_the_title(); ?></p>
            </div>
            
            <div class="w-full relative">
                <p class="font-semibold text-xl lg:text-3xl text-brand-dark mb-1 lg:mb-2"><?php the_title() ; ?></p>
                <?php $timezone = date_default_timezone_get(); ?>
                <p class="font-semibold text-base lg:text-xl text-brand-main tracking-wider flex flex-col lg:flex-row">
                    <span><?php echo $displayed_date; ?></span>
                    <span class="text-xs py-1 lg:p-2"> (Timezone: <?php echo wp_timezone_string(); ?> PST)</span>
                </p>
                <p class="text-sm lg:text-base text-brand-accent mb-3 lg:mb-8"><?php echo $local_label; ?></p>
                <p class="text-base lg:text-xl text-brand-black w-full lg:w-5/6"><?php the_field( 'event_description' ); ?></p>

                <div class="mt-4 lg:mb-0 lg:absolute lg:top-0 lg:right-0">
                    <?php if($past_event == false) : ?>
                        <?php if($active_event == false) : ?>

                            <?php if ($local_value == 'zoom') { ?>
                                <a class="<?php echo $button; ?>" href="<?php the_field( 'zoom_registration_link' ); ?>" target="_blank">Register Now</a>
                            <?php } elseif ($local_value == 'usc') { ?>
                                <a class="<?php echo $button; ?>" href="mailto:<?php the_field( 'booking_request_contact_email' ); ?>?subject=<?php the_title() ; ?>: <?php echo $displayed_date; ?>&body=I would like to register for this event." target="_blank">Register Now</a>
                            <?php } elseif ($local_value == 'youtube') { ?>
                                <a class="button bg-red-600 mt-3 md:mt-6 mb-2" href="<?php the_field( 'youtube_link' ); ?>"  target="_blank">Watch on YouTube</a>
                            <?php } elseif ($local_value == 'booking') { ?>
                                <a class="<?php echo $button; ?>" href="mailto:<?php the_field( 'booking_request_contact_email' ); ?>?subject=<?php the_title() ; ?>: <?php echo $displayed_date; ?>&body=I would like to book my spot for this event." target="_blank">Book Now</a>
                            <?php } elseif ($local_value == 'tba') { ?>
                                <a class="<?php echo $button; ?>" href="mailto:<?php the_field( 'booking_request_contact_email' ); ?>?subject=<?php the_title() ; ?>: <?php echo $displayed_date; ?>&body=I would like to register for this event." target="_blank">Register Now</a>
                            <?php } else { ?>
                                <a class="<?php echo $button; ?>" href="mailto:<?php the_field( 'booking_request_contact_email' ); ?>?subject=<?php the_title() ; ?>: <?php echo $displayed_date; ?>&body=I would like to register for this event." target="_blank">Register Now</a>
                            <?php } ?>

                        <?php endif; ?>                       
                    <?php endif; ?>                       
                    <?php if($active_event == true) : ?>
                        <h3 class="text-xs lg:text-base text-brand-dark font-bold uppercase whitespace-nowrap mb-1">Meeting ID: <span class="text-xs normal-case">( Copy ID before clicking 'JOIN NOW' below )</span></h3>
                        <div class="flex flex-row items-center justify-start w-full lg:w-auto">
                            <input class="py-2 lg:py-3 rounded no-underline uppercase tracking-wider text-center lg:text-lg font-button mr-2 w-36 xl:w-40 font-bold text-sm xl:text-lg text-brand-accent border-2 border-brand-dark p-1 xl:p-2" type="text" value="<?php the_field( 'zoom_meeting_id' ); ?>" id="myInput" disabled>
                            <div class="tooltip">
                                <button class="bg-brand-dark p-2 text-center py-2 lg:py-3 px-4 lg:px-6 rounded no-underline text-white uppercase font-bold tracking-wider text-sm lg:text-lg font-button" onclick="myFunction()" onmouseout="outFunc()">
                                <span class="tooltiptext" id="myTooltip">Click to copy</span>
                                Copy ID
                                </button>
                            </div>
                            <div class="flex flex-row mr-0 lg:mr-4">
                                <a class="<?php echo $button_highlighted; ?>" href="https://zoom.us/join" target="_blank">Join Now</a>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if($active_event == false && $past_event == true) : ?>
                        <div class="w-full flex lg:justify-end">
                            <p class="text-brand-neutral text-base lg:text-lg">Event has past</p>
                        </div>  
                    <?php endif; ?>
                </div>

                <?php if ( have_rows( 'content_row' ) ) : ?>
                    <div class="w-full lg:w-2/3 mt-4 lg:mt-8">
                        <?php while ( have_rows( 'content_row' ) ) : the_row(); ?>
                            <p class="text-base lg:text-xl text-brand-neutral w-full font-semibold"><?php the_sub_field( 'title' ); ?></p>
                            <p class="text-sm lg:text-base text-brand-black w-full"><?php the_sub_field( 'content_block' ); ?></p>
                        <?php endwhile; ?>
                    </div>
                    <?php else : ?>
                        <?php // No rows found ?>
                    <?php endif; ?>

                <div class="flex flex-col lg:flex-row mt-4 lg:mt-8">
                    <div class="flex flex-row w-full lg:w-2/3 lg:items-end">
                        <p class="text-base lg:text-xl text-brand-black">Questions? Please email <a href="mailto:usc@wttsw.ca" target="_blank">usc@wttsw.ca</a></p>
                    </div>
                </div>

            </div>
            
        </div>
    </section>

<?php if ( get_field( 'include_speaker_toggle?' ) == 1 ) : ?>

    <?php if ( have_rows( 'speakers' ) ) : ?>
	    <?php while ( have_rows( 'speakers' ) ) : the_row(); ?>
	
            <section class="contained my-8 xl:my-16 object-reveal-short">

                <div class="w-full lg:mr-1/12 lg:w-11/12 lg:p-1/24 bg-white rounded shadow-2xl shadow-brand-main relative">
                
                    <h2 class="absolute top-4 left-4 z-10 pointer-events-none lg:pointer-events-auto lg:z-0 lg:top-0 lg:left-0 lg:relative mb-6 lg:mb-12 text-2xl lg:text-5xl font-semibold text-white lg:text-brand-<?php echo $cat_bg_colour; ?>">Speaker/Facilitator</h2>

                    <?php get_template_part('parts/_speaker_info'); ?>

                </div>

            </section>

        <?php endwhile; ?>
    <?php else : ?>
        <?php // No rows found ?>
    <?php endif; ?>

<?php else : ?>
	<?php // no speaker information ?>
<?php endif; ?>

<?php get_footer(); ?>

