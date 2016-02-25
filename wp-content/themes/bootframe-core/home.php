<?php
/**
 * BootFrame home template file.
 *
 *
 *
 * @since      BootFrame 1.0
 */

get_header(); ?>

<?php

smartlib_get_header(); //display header info or header image

?>
<section class="smartlib-content-section container">

	<div id="page" role="main" class="<?php echo bstarter__f('smartlib_content_layout_class', 'col-sm-16 col-md-12', 'frontpage' ) ?>">
		<div class="container" ng-app="diamondApp" ng-controller="startCtrl">
			<!--heading-->
			<div class="row">
				<h1>Ledarskapsdiamanten</h1>
			</div>		

			
			<section><!-- Graph section -->
				<div class="row">
					
				</div>
			</section><!-- Graph section -->
			


			<section><!-- Post section -->
				<div class="row">

					


					<div ng-repeat="post in allQuestionPosts" class="question-post-container">
						<div class="question-post-title-container col-xs-12">
							<h3>{{post.title}}</h3>
						</div>
						<div class="question-post-content-container col-xs-12">
							{{post.content}}
						</div>
					</div>
				</div>
			</section><!-- Post section -->
	
</div>

</div><!-- #page -->
<?php #do_action('smartlib_get_layout_sidebar', 'frontpage_content');//display homepage sidebar ?>
</section>
<?php get_footer(); ?>
