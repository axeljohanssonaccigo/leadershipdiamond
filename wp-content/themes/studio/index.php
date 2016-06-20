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
						<div class="panel-group" id="questionAccordion">
							<div ng-repeat="post in allQuestionPosts | orderBy: 'index'" class="clearfix" ng-attr-id="{{ 'post-' + post.index }}">
								<div class="panel panel-default">


 <!-- question-post-container -->
								<!-- <div class="question-post-title-container center-vertical-outer"> -->
								<!-- center-vertical-inner -->
									<div class=" panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#questionAccordion" ng-href="{{ '#collapse-' + post.index }}" ng-click="focusOnQuestionPost(post)">
											{{post.title}}</a>
										</h4>
									</div>
								<!-- </div> -->

								<!-- question-post-content-container -->
								<div class=" panel-body" ng-show="post.inFocus">
									<div ng-attr-id="{{ 'collapse-' + post.index }}" class="panel-collapse collapse">
										{{post.solution}}
									</div>
								</div>
								<!-- <div class="focus-button-container" >
									<button ng-hide="post.inFocus" type="button" class="btn btn-success btn-lg" ng-click="focusOnQuestionPost(post)">{{howToHandle.title}}</button>
									<button ng-show="post.inFocus" type="button" class="btn btn-success btn-lg" ng-click="post.inFocus = false">{{close.title}}</button>
								</div>
								<div class="col-xs-12 solution-container ng-hide" ng-show="post.inFocus">
									<div class="row">
										<div class="col-xs-8">
											<h5></h5>
											{{post.solution}}
										</div>
										<div class="col-xs-4 video-player-container">
											<img src="http://localhost/leadershipdiamond/wp-content/uploads/2016/02/video-player.jpg">
										</div>
										<div class="col-xs-4 col-xs-offset-8 move-to-next-post-container">
											<button type="button" ng-click="" class="btn btn-success btn-block">{{goToNextPost.title}}</button>
										</div>
									</div>

								</div> -->
							</div>
							</div>
						</div>
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
