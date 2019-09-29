<?php get_header(); ?>

    <section class="main-content">

        <div class="container">

			<?php

			$home_page = get_post( get_option( 'page_on_front' ) );
			$news      = new WP_Query ( [ 'post_type' => 'news', 'posts_per_page' => 2 ] );
			?>

            <div class="about-us">
                <h3>About Us</h3>
                <p><?= get_post_meta( $home_page->ID, 'about', TRUE ) ?></p>
            </div><!--about-us end-->

            <div class="blog-section">

                <h3>Our News</h3>

                <div class="blog-posts">

					<?php

					while ( $news->have_posts() ) :

						$news->the_post();
						$post_id = get_the_ID();

						?>

                        <div class="blog-post">

							<?php if ( has_post_thumbnail( $post_id ) ): ?>

                                <div class="post-img">
                                    <img src="<?= wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' ) [0]; ?>"
                                         alt="">
                                </div><!--post-img end-->

							<?php endif; ?>

                            <div class="post-info">
                                <span class="posted-date"><?php the_date( 'd, M Y' ) ?></span>
								<?php the_content(); ?>
                            </div><!--post-info end-->

                        </div><!--blog-post end-->

					<?php endwhile; ?>

                </div><!--blog-posts end-->

            </div><!--blog-section end-->

            <div class="clearfix"></div>

			<?= apply_filters( 'the_content', $home_page->post_content ); ?>

        </div>

    </section><!--main-content end-->

<?php get_footer();
