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
		<div class="container" ng-app="diamondApp" ng-controller="startCtrl" >
			<div ng-hide="loading">
				<!--heading-->
				<div class="row">
				</div>


				<section><!-- Graph section -->
					<div class="row">


					</div>
				</section><!-- Graph section -->

				<section><!-- Post section -->
					<div class="row">
						<uib-accordion close-others="oneAtATime">
						<uib-accordion-group heading="{{post.title}}" ng-repeat="post in allQuestionPosts | orderBy: 'index'" ng-attr-id="{{ 'post-' + post.index }}">
							{{post.solution}}
						</uib-accordion-group>
					</uib-accordion>
					</div>
				</section><!-- Post section -->

				<section><!-- Course offers section -->
					<div class="row">
						<div class="course-section clearfix col-xs-12">
							<div ng-repeat="course in allCourses | orderBy: 'courseIndex'" class="course-container col-xs-12">
								<div class="course-title-container">
									{{course.title}} | {{course.level}}
								</div>
								<div class="course-content-container">
									{{course.content}}
								</div>
							</div>
						</div>
					</div>
				</section><!-- Course offers section -->

				<section><!-- Leadership Diamond section -->
					<div class="row ng-hide" >

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
								<div class="col-xs-12 col-sm-6">
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
				</section><!-- Leadership Diamond section -->

			</div>
		</div>


	</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
