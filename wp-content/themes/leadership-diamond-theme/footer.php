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
            <div id="footerContainer" class="container">
                <div class="site-info">
                    <div class="row">
                        <div> </div>
                        <div class="col-xs-12 col-md-5 col-md-offset-1">
                            <h3>Koestenbaum Institute</h3>
                            <ul>
                                <li ng-repeat="entry in footerContent"> <a ng-if="entry.footerGroup == 1 && entry.link != '#'" href="{{entry.link}}" target="_blank">{{entry.title}}</a> <span ng-if="entry.footerGroup == 1 && entry.link == '#'">{{entry.title}}</span> </li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-md-5">
                            <h3>{{leadershipPartners.title}}</h3>
                            <ul>
                                <div ng-repeat="group in groupNames">
                                    <div class="group-name-heading" ng-if="group !== 'none'">{{group}}</div>
                                    <li ng-repeat="entry in footerContent"> <a ng-if="entry.footerGroup == 2 && entry.subGroup == group && entry.link != '#'" href="{{entry.link}}" target="_blank">{{entry.title}}</a> <span ng-if="entry.footerGroup == 2 && entry.subGroup == group && entry.link == '#'">{{entry.title}}</span> </li>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- .site-info -->
            </div>
        </footer>
        <!-- #colophon -->
        </div>
        <!-- #page -->
        <?php 
/** 
 * studio_after hook
 *
 */
do_action( 'studio_after' );

wp_footer(); ?>
            </body>

            </html>