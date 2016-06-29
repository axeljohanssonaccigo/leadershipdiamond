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

get_header(); ?>
    <div id="primary" class="content-area" ng-cloak>
        <main id="main" class="site-main" role="main">
            <div class="">
                <div ng-hide="loading">
                    <!-- Heading -->
                    <section id="heading">
                        <div class="row">
                            <div class="heading-container">
                                <div class="heading-title"> {{leadershipdiamond.title}} </div>
                                <div class="heading-second"> {{leadershipOS.title}} - {{nothingButApps.title}}. </div>
                            </div> <img class="diamond" src="../wp-content/themes/leadership-diamond-theme/img/diamond.svg" />
                            <div class="shadow pos-0"></div>
                        </div>
                    </section>
                    <section id="graph">
                        <!-- Graph section -->
                        <div class="row">
                            <div class="col-md-4"> <img src="https://bytesizemoments.com/wp-content/uploads/2014/04/placeholder3.png"> </div>
                            <div class="col-md-4"> <img src="https://bytesizemoments.com/wp-content/uploads/2014/04/placeholder3.png"> </div>
                            <div class="col-md-4"> <img src="https://bytesizemoments.com/wp-content/uploads/2014/04/placeholder3.png"> </div>
                            <div class="col-md-12">
                                <div style="width: 720px; margin: 50px auto 0px; text-align:justify;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam.
                                    <br>
                                    <br> In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor. Morbi lectus risus, iaculis vel, suscipit quis, luctus non, massa. Fusce ac turpis quis ligula lacinia aliquet. Mauris ipsum. Nulla metus metus, ullamcorper vel, tincidunt sed, euismod in, nibh. Quisque volutpat condimentum velit.
                                    <br>
                                    <br> Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante. Sed lacinia, urna non tincidunt mattis, tortor neque adipiscing diam, a cursus ipsum ante quis turpis. Nulla facilisi. Ut fringilla. Suspendisse potenti. Nunc feugiat mi a tellus consequat imperdiet. Vestibulum sapien. Proin quam. Etiam ultrices. Suspendisse in justo eu magna luctus suscipit. </div>
                            </div>
                        </div>
                    </section>
                    <!-- Graph section -->
                    <section>
                        <!-- Post section -->
                        <div class="row">
                            <uib-accordion close-others="oneAtATime">
                                <uib-accordion-group heading="{{post.title}}" ng-repeat="post in allQuestionPosts | orderBy: 'index'" ng-attr-id="{{ 'post-' + post.index }}" class="page-scroll" ng-click="registerQuestionClick(post)"> {{post.solution}}
                                    <div class="btns">
                                        <div ng-show="post.index < allQuestionPosts.length" class="next-btn-cont col-md-6">
                                            <button type="button" class="btn next-btn btn-success waves-effect waves-light" ng-click="$event.stopPropagation(); moveToNextPost(post)">{{goToNextPost.title}} ▼</button>
                                        </div>
                                        <div class="leader-btn-cont col-md-6">
                                            <button type="button" class="btn leader-btn waves-effect waves-light" ng-click="$event.stopPropagation(); goToCourses()"> {{goToDiamond.title}}! ▼ </button>
                                        </div>
                                    </div>
                                </uib-accordion-group>
                            </uib-accordion>
                        </div>
                    </section>
                    <!-- Post section -->
                    <section id="course">
                        <!-- Course offers section -->
                        <div class="row">
                            <div class="course-section clearfix col-xs-12">
                                <div class="course-title"> {{leadershipdiamond.title}} </div>
                                <div class="diamond-about-text col-md-12"> {{diamondAboutText.title}} </div>
                                <div ng-repeat="course in allCourses | orderBy: 'courseIndex'" class="course-container col-sm-6  col-xs-12">
                                    <div class="course-title-container"> {{course.title}} </div>
                                    <div class="course-level-container ng-hide"> {{course.level}} </div>
                                    <div class="course-content-container"> {{course.content}} </div>
                                </div>
                                <div class="course-btn">
                                    <button class="btn"> Kontakta oss! </button>
                                </div>
                            </div> <img class="diamond floating pos-1" src="../wp-content/themes/leadership-diamond-theme/img/diamond.svg" />
                            <div class="shadow scaling pos-1"></div> <img class="diamond floating pos-2" src="../wp-content/themes/leadership-diamond-theme/img/diamond.svg" />
                            <div class="shadow scaling pos-2"></div> <img class="diamond floating pos-3" src="../wp-content/themes/leadership-diamond-theme/img/diamond.svg" />
                            <div class="shadow scaling pos-3"></div>
                        </div>
                    </section>
                    <!-- Course offers section -->
                    <section>
                        <!-- Leadership Diamond section -->
                        <div class="row ng-hide">
                            <div id="diamond-solver" ng-show="postInFocus !== null">
                                <div class="question-post-container clearfix post-in-focus">
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="question-post-title-container">
                                            <h4>{{postInFocus.title}}</h4> </div>
                                        <div class="question-post-content-container"> {{postInFocus.content}} </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <h4>Detta problem och dess lösning återfinns i Ledarskapsdiamanten!</h4> </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="container-fluid off-white-section">
						<div class="container">
							<div class="row">

							</div>
						</div>
					</div> -->
                    </section>
                    <!-- Leadership Diamond section -->
                </div>
                <div class="lang-picker fixed-action-btn" style="bottom: 25px; right: 25px;">
                    <div ng-repeat="lang in languages">
                        <div ng-if="currentLanguage.name !== lang.name"> <a class="btn-floating btn-large red" href="{{lang.url}}">{{lang.name}}</a> </div>
                        <!-- <div ng-if="currentLanguage.name === lang.name">
                            {{lang.name}}
                        </div> --></div>
                </div>
            </div>
            <!-- startCtrl-->
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->
    <?php //get_sidebar(); ?>
        <?php get_footer(); ?>