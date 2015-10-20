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


            <div class="recentEventsImage">

<!--                --><?php // set_post_thumbnail_size( 100, 124, true );?>
                <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail();

                }

                ?>
            </div>


            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();

                    ?>
                    <h3><?php the_title();?></h3>
                    <hr>

                    <?php the_content();
                    ?>
                    <?php

                endwhile;
            else :
                echo wpautop( 'Sorry, no posts were found' );
            endif;
            ?>

            <hr>


        </div>

        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 eventsPageContentRightSide">


            <img src="">


            <div class="recentEventsInnerPage">

                <div class="row">



                    <ul>



                        <?php

                        $args = array( 'post_type' => 'recent-post', 'posts_per_page' => 4 );
                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts() ) : $loop->the_post();

                            $get_all_custom_data = get_post_meta( get_the_ID(), 'recent-events', true );
                            foreach($get_all_custom_data as $get_all_custom){

                                ?>



                                <li><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 innerPageFirstRowEvent1">
                                        <a href="<?php the_permalink();?>">


                                            <div class="events1">
                                                <div class="events1date">


                                                    <p class="date"><?php echo $get_all_custom['date'];?></p>
                                                    <p class="month"><?php echo $get_all_custom['month'];?></p>
                                                </div>
                                                <div class="year">
                                                    <p class="eventsYear"><?php echo $get_all_custom['year'];?></p>
                                                </div>
                                            </div>
                                            <div class="eventNotice">
                                                <p class="eventsName"><?php the_title();?></p>
                                                <p class="eventsLocation1"><?php echo $get_all_custom['short_description'];?></p>
                                                <div class="eventsShortDescription">
                                                    <?php echo $get_all_custom['selected_description'];?>
                                                </div>
                                            </div>
                                        </a>
                                    </div></li>



                                <?php
                            }
                        endwhile;

                        ?>



                    </ul>
                </div>
            </div>

        </div>

    </div>
</div>



<?php get_footer(); ?>
