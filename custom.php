<?php
 
/**
 * Custom Functions
*/

/Add hero image above post/page content
 
// Create new image size for our hero image
add_image_size( 'hero-image', 1400, 400, TRUE ); // creates a hero image size
 
// Hook after header area
add_action( 'genesis_after_header', 'bw_hero_image' );

function bw_hero_image() {
// If it is a page and has a featured thumbnail, but is not the front page do the following...
    if (has_post_thumbnail() && is_page() ) {
    	// Get hero image and save in variable called $background
    	$image_desktop = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'hero-image' );
    	$image_tablet = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'large' );
    	$image_mobile = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'medium' );

    	$bgdesktop = $image_desktop[0];
        $bgtablet = $image_tablet[0];
        $bgmobile = $image_mobile[0];

// You can change above-post-hero to any class you want and adjust CSS styles
    	$featured_class = 'above-post-hero';

 ?> 
<div class='<?php echo $featured_class; ?>'></div>
<style>
	<?php echo ".$featured_class "; ?> {background-image:url( <?php echo $bgmobile; ?>);height:176px;}
		
		@media only screen and (min-width : 480px) {       
        <?php echo ".$featured_class "; ?> {background-image:url(<?php echo $bgtablet;?>);height:276px;}
		}
		@media only screen and (min-width : 992px) {       
        <?php echo ".$featured_class "; ?> {background-image:url(<?php echo $bgdesktop;?>);height:400px;}
		}
</style>
<?php
    } 
}
view raw
