
<?php wp_footer(); ?>


<div class="container-fluid footerMenu">
    <div class="row">
        <div class="socialIcons">
            <a href="<?php bloginfo('url'); ?>"><p class="footerHeading"><b>BENGAL<br/>LOGISTICS<br>
                    LIMITED</b></p>
            </a>


        </div>

        <div class="aboutUs">


            <?php
            $menu_args = array(
                'theme_location'  => 'footer_menu',
                'menu'            => '',
                'container'       => '',
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => '',
                'menu_id'         => '',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth'           => 0,
                'walker'          => ''
            );
            wp_nav_menu( $menu_args );
            ?>

        </div>


        <div class="management">
            <?php
            $menu_args = array(
                'theme_location'  => 'footer_menu1',
                'menu'            => '',
                'container'       => '',
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => '',
                'menu_id'         => '',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth'           => 0,
                'walker'          => ''
            );
            wp_nav_menu( $menu_args );
            ?>
        </div>
        <div class="services">
            <?php
            $menu_args = array(
                'theme_location'  => 'footer_menu2',
                'menu'            => '',
                'container'       => '',
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => '',
                'menu_id'         => '',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth'           => 0,
                'walker'          => ''
            );
            wp_nav_menu( $menu_args );
            ?>
        </div>
        <div class="newsEvents">

            <?php
            $menu_args = array(
                'theme_location'  => 'footer_menu3',
                'menu'            => '',
                'container'       => '',
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => '',
                'menu_id'         => '',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth'           => 0,
                'walker'          => ''
            );
            wp_nav_menu( $menu_args );
            ?>
        </div>
        <div class="others"><p class="footerHeading"></p>


            <!--<input type="text" placeholder="Search Here" class="inputBox"><a href="#"><img  class="searchIcon" src="images/search_icon.png" height="30px" width="30px"></a>-->


            <!----------------- Search Box ------------>
            <div>
                <form name="searchBox" id="searchBox" action="#" method="post"> <input type="text" placeholder="Search here..." name="query" id="query"/>
                    <input type="submit" name="sub" id="sub" value=" "/></form>

            </div>


            <p class="socialPages">SOCIAL PAGES</p>


            <a class="facebook" target="_blank" href="http://bengallogistics.blogspot.com/2013/10/bangladesh-at-glance-french-version.html"><span class="italian"></span>

            </a>
            <a class="twitter" target="_blank" href="http://twitter.com/"><span class="japanese"> </span>

            </a>
            <a class="googlePlus" target="_blank" href="http://bengaltours.com/images/German.pdf"><span class="german"> </span>

            </a>


        </div>
    </div>
</div>


                        <!--    Copy Right-->

<?php if ( is_active_sidebar( 'copyright_container' ) ) : ?>
    <?php dynamic_sidebar( 'copyright_container' ); ?>
<?php endif; ?>


<?php wp_footer(); ?>

</body>
</html>
