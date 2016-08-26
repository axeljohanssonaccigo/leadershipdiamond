<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Studio
 */


 define( 'WP_USE_THEMES', false ); get_header(); ?>
    <style id="style"></style>
    <!-- lang-picker -->
    <div class="lang-picker waves-effect waves-light display-none-mobile faded-out" ng-class="{'fadein': allLoaded}">
        <div ng-repeat="lang in languages" ng-animate=" 'animate' ">
            <div ng-if="currentLanguage.name !== lang.name">
                <a href="{{lang.url}}"> <img src="../wp-content/themes/leadership-diamond-theme/img/planet-earth2.svg" />
                    <div class="lang-name">{{lang.name}}</div>
                </a>
            </div>
        </div>
    </div>
    <!-- Kostenbaum Institue --->
    <div class="koestenbaum waves-effect waves-light display-none-mobile faded-out" ng-class="{'fadein': allLoaded}"> <a href="http://www.pib.net" target="_blank">Koestenbaum<br> <span>Institute</span></a> </div>
    <!-- hamburger nav -->
    <div class="navbar-1 display-none-desk" ng-class="{'fadein': allLoaded}">
        <nav class="nav-1 is-close">
            <ul class="nav-list">
                <?php wp_nav_menu( array( 'items_wrap' => '%3$s', 'container' => '', 'link_before' => '<span class="nav-text">', 'link_after' => '</span>', 'walker' => new Custom_Walker_Nav_Menu() ) ); ?> </ul>
            <div class="lang-picker waves-effect waves-light">
                <div ng-repeat="lang in languages" ng-animate=" 'animate' ">
                    <div ng-if="currentLanguage.name !== lang.name">
                        <a href="{{lang.url}}"> <img src="../wp-content/themes/leadership-diamond-theme/img/planet-earth2.svg" />
                            <div class="lang-name">{{lang.name}}</div>
                        </a>
                    </div>
                    <!-- <div ng-if="currentLanguage.name===l ang.name">{{lang.name}}</div> --></div>
            </div>
            <div class="koestenbaum waves-effect waves-light"> <a href="#">Koestenbaum<br> <span>Institute</span></a> </div>
            <div class="nav-action">
                <button>×</button>
            </div>
        </nav>
    </div>
    <!-- hamburger nav END-->
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main" ng-class="{'fadein': allLoaded}" ng-cloak>
            <!--<div ng-class="{'is-loaded': allLoaded, 'is-not-loaded full-screen-cover': !allLoaded}" class="parent-valign">
                 <div class="child-valign">
                    <div class="shadow scaling pos-x"></div> <img class="diamond-loader floating" src="../wp-content/themes/leadership-diamond-theme/img/diamond.svg" /> </div>
            </div> -->
            <div>
                <!-- Heading -->
                <section id="heading">
                    <div class="row">
                        <div class="heading-container">
                            <div class="heading-second">{{leadershipOS.content}}</div>
                            <div class="heading-title"> {{leadershipdiamond.content}}<span class="copyright">®</span> </div>
                            <div class="heading-second"> {{nothingButApps.content}}! </div>
                        </div> <img class="diamond display-none-mobile" src="../wp-content/themes/leadership-diamond-theme/img/Diamond-new.svg" />
                        <div class="shadow pos-0 display-none-mobile"></div>
                    </div> <a href="#graph" class="btn-floating btn-large waves-effect waves-light heading-btn">▼</a> </section>
                <section id="graph">
                    <!-- Graph section -->
                    <div class="row">
                        <div class="row-container">
                            <div class="col-md-12">
                                <div class="graphs-container">
                                    <h1>{{whyTheDiamond.content}}</h1>
                                    <div class="row">
                                        <div class="col-md-5 col-xs-12"> <img class="graph" src="../wp-content/themes/leadership-diamond-theme/img/Graph-1-NEW.svg" /> </div>
                                        <div class="col-md-7 col-xs-12">
                                            <div class="number"> {{graphTexts.graph1.content}}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-xs-12 float-right no-float-mobile"> <img class="graph" src="../wp-content/themes/leadership-diamond-theme/img/Graph-2-NEW.svg"> </div>
                                        <div class="col-md-7 col-xs-12">
                                            <div class="number right">{{graphTexts.graph2.content}}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-xs-12"> <img class="graph" src="../wp-content/themes/leadership-diamond-theme/img/Graph-3-NEW2.svg"> </div>
                                        <div class="col-md-7 col-xs-12">
                                            <div class="number">{{graphTexts.graph3.content}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row wheel-row">
                        <div class="row-container">
                            <h2 class="center">Ledarskapshjulet</h2>
                            <div class="col-md-12 col-xs-12"> <img class="graph-wheel" src="../wp-content/themes/leadership-diamond-theme/img/Hjulet-NEW.svg"> </div>
                            <!--
                            <div class="text-center"> <a href="#post-1" class="btn leader-btn waves-effect waves-light">{{firstExample.content}}</a> </div>-->
                            <div class="wheel-text">{{wheelText.content}}</div>
                            <a href="#question" class="btn-floating btn-large waves-effect waves-light heading-btn">▼</a> </div>
                    </div>
                </section>
                <!-- Graph section -->
                <section id="question">
                    <!-- Post section -->
                    <div class="row">
                        <div class="heading">
                            <h1>{{commonProblems.content}}</h1> </div>
                        <uib-accordion close-others="oneAtATime">
                            <?php 
                            query_posts('&meta_key=wpcf-index&orderby=meta_value&order=ASC');
                                if ( have_posts() ) {
                                    while ( have_posts() ) {
                                        the_post();
                                        $post_index = get_post_meta($post->ID,'wpcf-index',true);
                                        $posts_size = sizeof($posts);
                                        ?>
                                <uib-accordion-group id="post-<?php echo $post_index; ?>" class="page-scroll">
                                    <uib-accordion-heading>
                                        <?php the_title(); ?>
                                            <div class="read-more-button display-none-mobile"> {{readMore.content}} <img src="../wp-content/themes/leadership-diamond-theme/img/magnifier-book.svg" /> </div>
                                    </uib-accordion-heading>
                                    <?php the_content();?>
                                        <div class="btns">
                                            <div class="next-btn-cont col-md-6" ng-show="<?php echo $post_index; ?> < <?php echo $posts_size; ?>"> <a class="btn next-btn btn-success waves-effect waves-light" href="#post-<?php echo $post_index+1; ?>">{{goToNextPost.content}} ▼</a> </div>
                                            <div class="leader-btn-cont col-md-6" ng-class="{'col-md-offset-3': <?php echo $post_index; ?> == <?php echo $posts_size; ?>}"> <a class="btn leader-btn waves-effect waves-light" href="#diamond" ng-click="setLatestClickedPostId('post-<?php echo $post_index; ?>')"> {{goToDiamond.content}}! ▼ </a> </div>
                                        </div>
                                </uib-accordion-group>
                                <?php } // end while
                                } // end if
                                ?>
                        </uib-accordion>
                        <a href="#diamond" class="btn-floating btn-large waves-effect waves-light heading-btn">▼</a>
                    </div>
                </section>
                <!-- Post section -->
                <section id="diamond">
                    <!-- Leadership Diamond section -->
                    <div class="row">
                        <div class="diamond-section clearfix">
                            <div class="question-card ">
                                <div class="diamond-title"> {{leadershipdiamond.content}}<span class="copyright">®</span> </div>
                                <div class="diamond-about-text col-md-12">
                                    <div class="peter-image-caption">
                                        <img align="right" src="../wp-content/themes/leadership-diamond-theme/img/PeterK.JPG" class="peter-image">
                                        <p>Prof. Peter Koestenbaum</p>
                                    </div>
                                    {{diamondAboutText.content}}

                                </div>
                                <div class="about-buttons-cont ">
                                    <div class="waves-effect waves-light col-md-6 col-xs-12 leader-btn-cont">
                                        <a href="http://www.pib.net" class="btn leader-btn waves-effect waves-light" target="_blank">Koestenbaum&nbsp;Institute</a>
                                    </div>
                                    <div class="leader-btn-cont col-xs-12 col-md-6" ng-show="aQuestionWasClicked">
                                        <a class="btn leader-btn waves-effect waves-light" href="#{{latestClickedPostId}}"> {{backToLatestProblem.content}} ▲</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> <a href="#course" class="btn-floating btn-large waves-effect waves-light heading-btn">▼</a></section>
                <section id="course">
                    <!-- Course offers section -->
                    <div class="row">
                        <div class="course-section clearfix">
                            <div class="course-title"> {{coursesPrograms.content}} </div>

                            <div ng-repeat="course in allCourses | orderBy: 'courseIndex'" class="course-container col-sm-6 col-xs-12">
                                <div class="course-card" ng-class="{'push-down': $last}">
                                    <div class="course-title-container"> {{course.title}} </div>
                                    <div class="course-content-container"> {{course.content}} </div>
                                </div>
                            </div>
                            <div class="contact-form-placeholder">
                                <h3 class="contact-form-title"> {{formHeading1.content}}<br>{{formHeading2.content}}</h3>
                                <div ng-if="currentLanguage.name === 'English'">
                                    <?php echo do_shortcode( '[contact-form-7 id="213" title="Contact form - English"]' );  ?>
                                </div>
                                <div ng-if="currentLanguage.name === 'Svenska'">
                                    <?php echo do_shortcode( '[contact-form-7 id="214" title="Contact form - Svenska"]' );  ?>
                                </div>
                            </div>
                        </div> <img class="diamond pos-1" src="../wp-content/themes/leadership-diamond-theme/img/Diamond-new.svg" />
                        <div class="shadow pos-1"></div> <img class="diamond pos-2" src="../wp-content/themes/leadership-diamond-theme/img/Diamond-new.svg" />
                        <div class="shadow pos-2"></div> <img class="diamond pos-3" src="../wp-content/themes/leadership-diamond-theme/img/Diamond-new.svg" />
                        <div class="shadow pos-3"> </div>
                    </div>
                </section>
                <!-- Course offers section -->
                <!-- To diamond -->
                <div class="to-diamond display-none-mobile">
                    <div class="btn-floating btn-large waves-effect waves-light to-diamond-btn">
                        <a href="#diamond"><img src="../wp-content/themes/leadership-diamond-theme/img/Diamond-new-outline.svg" /></a>
                    </div>
                </div>
            </div>
            <!-- startCtrl-->
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->
    <?php get_footer(); ?>