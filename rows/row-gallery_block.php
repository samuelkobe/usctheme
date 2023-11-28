<section class="flex contained items-center justify-center object-reveal-short">

    <div class="w-full my-12 lg:my-24 h-25vh md:h-35vh xl:h-60vh min-h-240px md:min-h-480px xl:min-h-640px 2xl:min-h-720px swiperGallery swiper-wrapper-div overflow-x-hidden">
            <?php $gallery_images = get_sub_field( 'gallery' ); ?>
            <?php if ( $gallery_images ) :  ?>
                <div class="w-full h-full swiper-wrapper">
                    <?php foreach ( $gallery_images as $gallery_image ): ?>
                        <div class="swiper-slide w-full h-full flex flex-col bg-red-300">
                            <img class="w-full h-full shadow-xl object-cover" src="<?php echo esc_url( $gallery_image['url'] ); ?>" alt="<?php echo esc_attr( $gallery_image['alt'] ); ?>" />
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
                
            <div class="absolute bottom-2 z-50 swiper-navigation w-full h-16 flex justify-between">
                <div class="swiper-button-prev invisible md:visible pointer-events-auto"></div>
                <div class="swiper-button-next invisible md:visible pointer-events-auto"></div>
            </div>
        </div>

</section>
