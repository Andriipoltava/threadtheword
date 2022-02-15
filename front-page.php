<?php get_header(); ?>

<section class="banner" id="banner">
	<?php if ( have_rows( 'slider_items' ) ): ?>
        <div class="row hero-slider" style="overflow: hidden;visibility: hidden;">
			<?php while ( have_rows( 'slider_items' ) ): the_row(); ?>
                    <?php if( $slider_link = get_sub_field('slider_link') ) :
                        $link_url = $slider_link['url'];
	                    $link_title = $slider_link['title'];
                        $link_target = $slider_link['target'] ? $slider_link['target'] : '_self';
                        ?>
                        <?php if( $slider_image = get_sub_field('slider_image') ): ?>
                                    <a class="banner__image" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                        <?php if( $slider_hover_text = get_sub_field('slider_hover_text') ): ?>
                                            <div class="banner__btn"><?php echo $slider_hover_text; ?></div>
                                        <?php endif; ?>
                                        <div class="slider-titles-container">
                                            <?php if( $slider_first_title = get_sub_field('slider_first_title') ): ?>
                                                <div class="slider-title-first"> <?php echo $slider_first_title; ?> </div>
                                            <?php endif; ?>

	                                        <?php if( $slider_second_title = get_sub_field('slider_second_title') ): ?>
                                                <div class="slider-title-second"> <?php echo $slider_second_title; ?> </div>
	                                        <?php endif; ?>

	                                        <?php if( $slider_third_title = get_sub_field('slider_third_title') ): ?>
                                                <div class="slider-title-third"> <?php echo $slider_third_title; ?> </div>
	                                        <?php endif; ?>
                                        </div>
                                            <img class="contact-info__icon"
                                                 src="<?php echo esc_url($slider_image['url']); ?>"
                                                 alt="<?php echo esc_attr($slider_image['alt']); ?>"/>
                                    </a>
                        <?php endif; ?>
                    <?php endif; ?>
			<?php endwhile; ?>
        </div>
	<?php endif; ?>
</section>


    <section class="info">
        <div class="container">
            <div class="info__text"><?php the_content(); ?></div>

            <?php if ( have_rows( 'baby_blankets_items' ) ): ?>
                <div class="row d-flex-center">
                    <?php while ( have_rows( 'baby_blankets_items' ) ): the_row(); ?>
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                <?php if( $blanket_image = get_sub_field('blanket_image') ): ?>
                                    <?php if( $blanket_link = get_sub_field('blanket_link') ) :
                                        $link_url = $blanket_link['url'];
                                        $link_title = $blanket_link['title'];
                                        $link_target = $blanket_link['target'] ? $blanket_link['target'] : '_self';
                                        ?>
                                        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                            <div class="image-container">
                                            <img
                                                 src="<?php echo esc_url($blanket_image['url']); ?>"
                                                 alt="<?php echo esc_attr($blanket_image['alt']); ?>"/>

                                            <?php if( $blanket_title = get_sub_field('blanket_title') ): ?>
                                                <div class="blankets-title">
                                                    <p> <?php echo $blanket_title; ?> </p>
                                                </div>
                                            <?php endif; ?>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

            </div>
        </div>
    </section>

<section class="custom-buttons">
	<div class="container">
        <?php if ( have_rows( 'custom_buttons' ) ): ?>
			<div class="row d-flex-center">
                <?php while ( have_rows( 'custom_buttons' ) ): the_row(); ?>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <?php if( $blanket_image = get_sub_field('blanket_image') ): ?>
                            <?php if( $blanket_link = get_sub_field('blanket_link') ) :
                                $link_url = $blanket_link['url'];
                                $link_title = $blanket_link['title'];
                                $link_target = $blanket_link['target'] ? $blanket_link['target'] : '_self';
                                ?>
								<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
									<div class="image-container">
										<img
												src="<?php echo esc_url($blanket_image['url']); ?>"
												alt="<?php echo esc_attr($blanket_image['alt']); ?>"/>

                                        <?php if( $blanket_title = get_sub_field('blanket_title') ): ?>
											<div class="blankets-title">
												<p> <?php echo $blanket_title; ?> </p>
											</div>
                                        <?php endif; ?>
									</div>
								</a>
                            <?php endif; ?>
                        <?php endif; ?>
					</div>
                <?php endwhile; ?>
			</div>
        <?php endif; ?>
	</div>
</section>

    <section class="material">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="material__tile tile">
                        <?php if( $home_subtitle_block_1 = get_field('home_subtitle_block_1') ): ?>
                            <h3 class="tile__subtitle"><?php echo $home_subtitle_block_1; ?></h3>
                        <?php endif; ?>
	                    <?php if( $home_title_block_1 = get_field('home_title_block_1') ): ?>
                            <h2 class="tile__title"><?php echo $home_title_block_1; ?></h2>
	                    <?php endif; ?>
	                    <?php if( $home_desc_block_1 = get_field('home_desc_block_1') ): ?>
                            <p class="tile__desc"><?php echo $home_desc_block_1; ?></p>
	                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="unique">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-12">
                    <div class="unique__video">
                        <?php the_field('home_video_block_2'); ?>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-12">
                    <div class="unique__tile tile">
	                    <?php if( $home_subtitle_block_2 = get_field('home_subtitle_block_2') ): ?>
                            <h3 class="tile__subtitle"><?php echo $home_subtitle_block_2; ?></h3>
	                    <?php endif; ?>
	                    <?php if( $home_title_block_2 = get_field('home_title_block_2') ): ?>
                            <h2 class="tile__title"><?php echo $home_title_block_2; ?></h2>
	                    <?php endif; ?>
	                    <?php if( $home_desc_block_2 = get_field('home_desc_block_2') ): ?>
                            <p class="tile__desc"><?php echo $home_desc_block_2; ?></p>
	                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="howtoorder">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-12">
                    <div class="tile">
	                    <?php if( $home_subtitle_block_3 = get_field('home_subtitle_block_3') ): ?>
                            <h3 class="tile__subtitle"><?php echo $home_subtitle_block_3; ?></h3>
	                    <?php endif; ?>
	                    <?php if( $home_title_block_3 = get_field('home_title_block_3') ): ?>
                            <h2 class="tile__title"><?php echo $home_title_block_3; ?></h2>
	                    <?php endif; ?>
	                    <?php if( $home_desc_block_3 = get_field('home_desc_block_3') ): ?>
                            <p class="tile__desc"><?php echo $home_desc_block_3; ?></p>
	                    <?php endif; ?>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-12">
                    <div class="howtoorder__image">
                        <img src="<?php the_field('home_image_block_3'); ?>" alt="howtoorder" width="360px" height="474px">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php if( $home_quote_desc = get_field('home_quote_desc') ): ?>
        <section class="quote">
            <div class="container">
                <div class="quote__text"><?php echo $home_quote_desc; ?></div>
            </div>
        </section>
    <?php endif; ?>


<?php get_footer(); ?>