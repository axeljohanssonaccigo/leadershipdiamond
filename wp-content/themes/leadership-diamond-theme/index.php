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

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="">
                <div ng-hide="loading">

                    <!-- Heading -->
                    <section id="heading">
                        <div class="row">
                            <div class="heading-container">
                                <div class="heading-title">
                                    LEDARSKAPSDIAMANTEN
                                </div>
                                <div class="heading-second">
                                    Ledarskapets operativsystem - allt annat är applikationer.
                                </div>
                            </div>
                            <img class="diamond" src="../wp-content/themes/leadership-diamond-theme/img/diamond.svg" />
                        </div>
                    </section>

                    <section id="graph">
                        <!-- Graph section -->
                        <div class="row">

                            Diamanten är en universell förklaringsmodell, struktur, verktyg och språk som utvecklats av Prof. Peter Koestenbaum. Han har samlat eviga sanningar som filosofer från Sokrates och Platon till von Wrigt och ……. samt de landvinningar som psykologin nått och analyserat näringslivets behov genom mångårigt styrelsearbete i stora, internationella företag. Resultatet är strukturerat i Ledarskapsdiamanten som nu används i hela världen av de främsta organisationerna. Diamanten är heltäckande och har blivit grundbulten i förståelsen av hur ledare fungerar och kan utvecklas och kallas därför för Ledarskapets Operativsystem (som ett Windows 10). Allt annat är applikationer eller tillämpningar. Förståelsen av Diamanten gör att rätt applikationer nu kan sättas in till rätt personer och skapa fördjupning och fortsatt utveckling. Alla appar passar som handsken till Diamanten och kan därför lätt ”klicka in”. (hit ska alla som klickar vidare kunna läsa som en första beskrivning. Härefter går vi vidare med förklaring av fråga efter fråga) Ex:


                        </div>
                    </section>
                    <!-- Graph section -->

                    <section>
                        <!-- Post section -->
                        <div class="row">
                            <uib-accordion close-others="oneAtATime">
                                <uib-accordion-group heading="{{post.title}}" ng-repeat="post in allQuestionPosts | orderBy: 'index'" ng-attr-id="{{ 'post-' + post.index }}" ng-click="registerQuestionClick(post)" class="page-scroll">
                                    {{post.solution}}
                                    <div class="btns">
                                        <div ng-show="post.index < allQuestionPosts.length" class="next-btn-cont col-md-6">
                                            <button type="button" class="btn next-btn btn-success waves-effect waves-light" ng-click="moveToNextPost(post)">{{goToNextPost.title}} ▼</button>
                                        </div>
                                        <div class="leader-btn-cont col-md-6">
                                            <button type="button" class="btn leader-btn waves-effect waves-light">
                                                Till Ledarskapsdiamanten! ▼
                                            </button>
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
                                <div class="course-title">
                                    LEDARSKAPSDIAMANTEN
                                </div>
                                <div ng-repeat="course in allCourses | orderBy: 'courseIndex'" class="course-container col-sm-6  col-xs-12">
                                    <div class="course-title-container">
                                        <!--{{course.title}} |-->{{course.level}}
                                    </div>
                                    <div class="course-content-container">
                                        {{course.content}}
                                    </div>
                                </div>
                                <div class="course-btn">
                                    <button class="btn">
                                        Kontakta oss!
                                    </button>
                                </div>
                            </div>

                            <img class="diamond pos-1" src="../wp-content/themes/leadership-diamond-theme/img/diamond.svg" />
                            <div class="shadow pos-1"></div>
                            <img class="diamond pos-2" src="../wp-content/themes/leadership-diamond-theme/img/diamond.svg" />
                            <div class="shadow pos-2"></div>
                            <img class="diamond pos-3" src="../wp-content/themes/leadership-diamond-theme/img/diamond.svg" />
                            <div class="shadow pos-3"></div>
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
                                            <h4>{{postInFocus.title}}</h4>
                                        </div>
                                        <div class="question-post-content-container">
                                            {{postInFocus.content}}
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <h4>Detta problem och dess lösning återfinns i Ledarskapsdiamanten!</h4>

                                    </div>
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
                        <div ng-if="currentLanguage.name !== lang.name">
                            <a class="btn-floating btn-large red" href="{{lang.url}}">{{lang.name}}</a>
                        </div>
                        <!-- <div ng-if="currentLanguage.name === lang.name">
                            {{lang.name}}
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- startCtrl-->
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->

    <?php //get_sidebar(); ?>
        <?php get_footer(); ?>