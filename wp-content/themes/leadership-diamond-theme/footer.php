<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Studio
 */

/** 
 * studio_after_content hook
 *
 * @hooked studio_content_end - 10
 *
 */
do_action( 'studio_after_content' ); 
?>
    
    <?php get_sidebar( 'footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
        <div id="footerContainer">
            <div class="site-info">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-6 col-md-5 col-md-offset-1">
                            <h3>{{contact.title}}</h3>
                            <ul>
                                <li ng-repeat="contact in allContacts  | orderBy: 'index'">
                                    <a href="{{contact.url}}" target="_blank">{{contact.title}}</a>
                                </li>
                            </ul>
                            
                        </div>
                        <div class="col-xs-6 col-md-5">
                            <h3>{{leadershipPartners.title}}</h3>
                            <ul>
                                <li ng-repeat="partner in allPartners  | orderBy: 'index'">
                                    <a href="{{partner.url}}" target="_blank">{{partner.title}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
		      </div><!-- .site-info -->
        </div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php 
/** 
 * studio_after hook
 *
 */
do_action( 'studio_after' );

wp_footer(); ?>

</body>
</html>
