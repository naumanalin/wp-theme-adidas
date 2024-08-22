<div class="hero-section" style="
background: 
            linear-gradient(rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5) 100%), 
            url('<?php echo esc_url(get_option('hero_background_image')); ?>') no-repeat center center;
background-size: cover, cover, auto; ">

    <div class="container">
        <div class="slider custom_slider_1">
            <?php 
            $hero_sliders = get_option( 'hero_sliders', array() );

            if ( !empty( $hero_sliders ) && is_array( $hero_sliders ) ) {
                foreach ( $hero_sliders as $slider ) {
                    // Ensure that each slider has the necessary fields before displaying
                    if ( !empty( $slider['heading'] ) || !empty( $slider['description'] ) || !empty( $slider['image'] ) || !empty( $slider['video'] ) ) {
                        ?>
                        <div class="slide-item flex">
                            <div class="content-box">
                                <?php if ( !empty( $slider['heading'] ) ) : ?>
                                    <h2 class="h1"><?php echo esc_html( $slider['heading'] ); ?></h2>
                                <?php endif; ?>
                                
                                <?php if ( !empty( $slider['description'] ) ) : ?>
                                    <p><?php echo esc_html( $slider['description'] ); ?></p>
                                <?php endif; ?>
                            </div>

                            <?php if ( !empty( $slider['image'] ) || !empty( $slider['video'] ) ) : ?>
                                <div class="play-box">
                                    <?php if ( !empty( $slider['image'] ) ) : ?>
                                        <img class="thumbnail" src="<?php echo esc_url( $slider['image'] ); ?>" alt="">
                                    <?php endif; ?>

                                    <?php if ( !empty( $slider['video'] ) ) : ?>
                                        <a class="play-btn" data-fancybox href="<?php echo esc_url( $slider['video'] ); ?>">
                                            <img src="<?= get_template_directory_uri(); ?>/assets/images/play-icon.png" alt="">
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </div>

    </div>
</div>