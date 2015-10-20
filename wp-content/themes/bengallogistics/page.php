<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>


<div class="container-fluid">
<div class="row">
	<div class="innerPageBanner">
		<div class="topSocialIcons">
			<a href="https://www.facebook.com/bengaltoursltd?fref=ts" class="top_facebook" target="_blank"></a>
			<a href="https://www.twitter.com" class="top_twitter" target="_blank"></a>
			<a href="https://plus.google.com/" class="top_googlePlus" target="_blank"></a>
		</div>



							<!-------------------- Slider Bottom Container ---------------------->



		<?php if ( is_active_sidebar( 'slider_bottom_container' ) ) : ?>
			<?php dynamic_sidebar( 'slider_bottom_container' ); ?>
		<?php endif; ?>


	</div>
</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 innerPageContentLeftSide">



			<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();

			?>
						<h3><?php the_title();?></h3>
						<hr>



						<p><?php the_content();?></p>

			<?php

					endwhile;
				else :
					echo wpautop( 'Sorry, no posts were found' );
				endif;
			?>

			<hr>


		</div>

		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 innerPageContentRightSide">




			<div class="innerPage">

					<div class="latestNewsDiv">
						<div class="latestNewsHeading">Our Blog</div>
						<div class="whiteDiv"></div>
					</div>

					<ul>


						<?php

						$args = array( 'post_type' => 'latest-post', 'posts_per_page' => 4 );
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();

							$get_all_custom_data = get_post_meta( get_the_ID(), 'latest-news', true );
							foreach($get_all_custom_data as $get_all_custom){

								?>

								<li>
									<a target="_blank" href="<?php echo $get_all_custom['link'];?>">
										<div class="newsSection">
											<div class="newsImage1">

												<?php  set_post_thumbnail_size( 100, 124, true );?>
												<?php
												if ( has_post_thumbnail() ) {
													the_post_thumbnail();

												}

												?>
											</div>
											<div class="news">

												<p class="newsHeading"><?php echo $get_all_custom['news_heading'];?></p>
												<p class="newsDescription"><?php echo $get_all_custom['news_short_description'];?>

												</p>

											</div>
										</div>
									</a>

								</li>


								<?php
							}
						endwhile;

						?>



					</ul>

					<p class="newsViewMore"><a target="_blank" href="http://bengallogistics.blogspot.com/2015/04/back-water-in-country.html">View More</a></p>
				</div>


			</div>

	</div>
</div>

<?php get_footer(); ?>
