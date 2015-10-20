<?php
/**
* Template Name: Landing Page
 */

get_header();

?>
<?php
if ( function_exists( 'ot_get_option' ) ){

    $bg_slider = ot_get_option('home_slider',array());

}
?>
    <!------------------- Fixed Social Icon ------------------>

    <div class="topSocialIcons">
        <a href="https://www.facebook.com/bengaltoursltd?fref=ts" class="top_facebook" target="_blank"></a>
        <a href="https://www.twitter.com" class="top_twitter" target="_blank"></a>
        <a href="https://plus.google.com/" class="top_googlePlus" target="_blank"></a>
    </div>




    <!--------------------- Slider ----------------------->



    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

        <?php if ( is_active_sidebar( 'slider_bottom_container' ) ) : ?>
            <?php dynamic_sidebar( 'slider_bottom_container' ); ?>
        <?php endif; ?>



        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

            <?php

            if(!empty($bg_slider)){
                $active  = 1;
                foreach($bg_slider as $slider){

            ?>

                    <div class="item <?php if($active == 1){echo 'active';} ?>">
                        <img src="<?php echo $slider['image']; ?>" alt="...">
                        <div class="carousel-caption">
                            <?php echo $slider['description']; ?>
                        </div>
                    </div>

             <?php
                    $active++;
                }
            }

            ?>


        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>


    </div>


                    <!--------  At a glance container -------->


<?php if ( is_active_sidebar( 'at_a_glance_container' ) ) : ?>
    <?php dynamic_sidebar( 'at_a_glance_container' ); ?>
<?php endif; ?>



                        <!--------------- Our Recent Events  ------------------->


    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 recentEvents">
                <p class="recentEventsHeading">Our Recent Events</p>
                <div class="row">



                    <ul>



                        <?php

                        $args = array( 'post_type' => 'recent-post', 'posts_per_page' => 4 );
                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts() ) : $loop->the_post();

                            $get_all_custom_data = get_post_meta( get_the_ID(), 'recent-events', true );
                            foreach($get_all_custom_data as $get_all_custom){

                                ?>



                        <li><div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 firstRowEvent1">
<!--                                <a  target="_blank" href="http://bengallogistics.blogspot.com/2013/12/mice-meeting-incentive-conference.html?view=sidebar">-->

                                <a href="<?php the_permalink(); ?>" target="_blank" >
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
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 flightInformation"></div>
        </div>


    </div>





                         <!---------------- Logistics Slider --------------->

<?php
if ( function_exists( 'ot_get_option' ) ){

    $middle_slider = ot_get_option('logistics_slider',array());

}

?>



    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <div class="row">
                    <div class="slider">
                        <p class="sliderHeading">Logistics Support</p>


                        <div id="wrapper">
                            <div id="carousel">


                                <?php

                            if(!empty($middle_slider)) {


                                echo '<ul>';

                                foreach ($middle_slider as $mslider) {

                                    ?>


                                    <li><img src="<?php echo $mslider['image']; ?>" alt=""/><span>Image1</span>

                                        <p class="imageCaption"><?php echo $mslider['description']; ?></p>
                                    </li>


                                    <?php


                                }

                                echo '</ul>';
                            }

                                ?>


                                <div class="clearfix"></div>
                                <a id="prev" class="prev" href="#">&lt;</a>
                                <a id="next" class="next" href="#">&gt;</a>
                                <div id="pager" class="pager"></div>
                            </div>
                        </div>

                    </div>
                </div>

            <div class="row">

                    <?php if ( is_active_sidebar( 'tours_package_container' ) ) : ?>
                        <?php dynamic_sidebar( 'tours_package_container' ); ?>
                    <?php endif; ?>

            </div>

            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 latestNews">



                <div class="latestNewsDiv">
                <div class="latestNewsHeading">Our Blog</div>
                <div class="whiteDiv"></div>
                </div>


                <ul>


<?php

$args = array( 'post_type' => 'latest-post', 'posts_per_page' => 3 );
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

<!--        <li>-->
<!--                <a href="#">-->
<!--                    <div class="newsSection">-->
<!---->
<!--                        <div class="newsImage2"></div>-->
<!--                        <div class="news">-->
<!--                            <p class="newsHeading">Nulla Consequat</p>-->
<!--                            <p class="newsDescription">-->
<!--                                Lorem ipsum dolor sit amet, consectetuer-->
<!--                                adipiscing elit.-->
<!--                                Aenean commodo ligula eget-->
<!--                            </p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </a>-->
<!--        </li>-->
<!---->
<!--        <li>-->
<!--                <a href="#">-->
<!---->
<!--                    <div class="newsSection">-->
<!---->
<!--                        <div class="newsImage3"></div>-->
<!--                        <div class="news">-->
<!--                            <p class="newsHeading">Lorem Ipsum</p>-->
<!--                            <p class="newsDescription">-->
<!--                                Lorem ipsum dolor sit amet, consectetuer-->
<!--                                adipiscing elit.-->
<!--                                Aenean commodo ligula eget-->
<!--                            </p>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                </a>-->
<!--        </li>-->


        <?php
    }
endwhile;

?>


    </ul>
                <p class="newsViewMore"><a target="_blank" href="http://bengallogistics.blogspot.com/2015/04/back-water-in-country.html">View More</a></p>

            </div>

        </div>
    </div>









<?php

get_footer();

?>