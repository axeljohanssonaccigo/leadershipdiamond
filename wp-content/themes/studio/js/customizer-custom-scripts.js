/**
 * Theme Customizer custom scripts
 * Add upgrade to pro button in customizer
 */
(function($) {
    //Add Upgrade Button
    $('.preview-notice').prepend('<span id="studio_upgrade"><a target="_blank" class="button btn-upgrade" href="' + studio_misc_links.upgrade_link + '">' + studio_misc_links.upgrade_text + '</a></span>');
    jQuery('#customize-info .btn-upgrade, .misc_links').click(function(event) {
        event.stopPropagation();
    });     
})(jQuery);