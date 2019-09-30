
<?php get_header(); ?>

<section class="main-content">

	<div class="container">

		<div class="blog-section">

			<div class="blog-posts">

				<?php

				while ( have_posts() ) :

					the_post();
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
