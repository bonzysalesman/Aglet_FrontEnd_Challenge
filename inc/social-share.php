<?php
/**
 * @package Glauss
 * @since Glauss 1.0
 */


function glauss_header_socials() { ?>
	<span class="screen-reader-text"><?php esc_html_e( 'Header Socials', 'glauss' ); ?></span>
	
	<nav id="header-social">
	<ul class="unstyled">
		<?php $twitter = glauss_get_option('twitter'); 
		if (!empty ($twitter) && glauss_get_option('twitter')) { ?>
		<li>
			<a class="twitter" title="twitter" href="<?php echo esc_url( $twitter ); ?>">
				<i class="fa fa-twitter" aria-hidden="true"></i><span class="screen-reader-text">Twitter</span>
			</a>
		</li>
		<?php } ?>
		<?php $facebook = glauss_get_option('facebook'); 
		if (!empty ($facebook) && glauss_get_option('facebook')) { ?>
		<li>
			<a class="facebook" title="facebook" href="<?php echo esc_url( $facebook ); ?>">
				<i class="fa fa-facebook" aria-hidden="true"></i><span class="screen-reader-text">Facebook</span>
			</a>
		</li>
		<?php } ?>
		<?php $google_plus = glauss_get_option('google_plus'); 
		if (!empty ($google_plus) && glauss_get_option('google_plus')) { ?>
		<li>
			<a class="google" title="google+" href="<?php echo esc_url( $google_plus ); ?>">
				<i class="fa fa-google-plus" aria-hidden="true"></i><span class="screen-reader-text">Google+</span>
			</a>
		</li>
		<?php } ?>
		<?php $pinterest = glauss_get_option('pinterest'); 
		if (!empty ($pinterest) && glauss_get_option('pinterest')) { ?>
		<li>
			<a class="pinterest" title="pinterest" href="<?php echo esc_url( $pinterest ); ?>">
				<i class="fa fa-pinterest" aria-hidden="true"></i><span class="screen-reader-text">Pinterest</span>
			</a>
		</li>
		<?php } ?>
		<?php $dribbble = glauss_get_option('dribbble'); 
		if (!empty ($dribbble) && glauss_get_option('dribbble')) { ?>  
		<li>
			<a class="dribbble" title="dribbble" href="<?php echo esc_url( $dribbble ); ?>">
				<i class="fa fa-dribbble" aria-hidden="true"></i><span class="screen-reader-text">Dribbble</span>
			</a>
		</li>
		<?php } ?>
		<?php $linkedin = glauss_get_option('linkedin'); 
		if (!empty ($linkedin) && glauss_get_option('linkedin')) { ?>  
		<li>
			<a class="linkedin" title="linkedin" href="<?php echo esc_url( $linkedin ); ?>">
				<i class="fa fa-linkedin" aria-hidden="true"></i><span class="screen-reader-text">Linkedin</span>
			</a>
		</li>
		<?php } ?>
		<?php $flickr = glauss_get_option('flickr'); 
		if (!empty ($flickr) && glauss_get_option('flickr')) { ?>  
		<li>
			<a class="flickr" title="flickr" href="<?php echo esc_url( $flickr ); ?>">
				<i class="fa fa-flickr" aria-hidden="true"></i><span class="screen-reader-text">Flickr</span>
			</a>
		</li>
		<?php } ?>
		<?php $vimeo = glauss_get_option('vimeo'); 
		if (!empty ($vimeo) && glauss_get_option('vimeo')) { ?> 
		<li>
			<a class="vimeo" title="vimeo" href="<?php echo esc_url( $vimeo ); ?>">
				<i class="fa fa-vimeo-square" aria-hidden="true"></i><span class="screen-reader-text">Vimeo</span>
			</a>
		</li>
		<?php } ?>
		<?php $rss = glauss_get_option('rss'); 
		if (!empty ($rss) && glauss_get_option('rss')) { ?>
		<li>
			<a class="rss" title="rss" href="<?php echo esc_url( $rss ); ?>">
				<i class="fa fa-rss" aria-hidden="true"></i><span class="screen-reader-text">RSS</span>
			</a>
		</li>
		<?php } ?>
	</ul><!-- .header-social -->
	</nav><!-- #header_social -->
<?php }

function glauss_author_socials() { ?>
 
<?php } 

function glauss_footer_socials() { ?>
	<div id="footer-socials">
		<div class="social-bar">
			<div class="clearfix">
				<div class="row">
					<span class="screen-reader-text"><?php esc_html_e( 'Footer Socials', 'glauss' ); ?></span>
					
					<span class="social-bar-text"><?php echo ( esc_html( glauss_get_option ('footer_socials_text') ) );?></span>
					
					
					
					<?php $twitter = glauss_get_option('twitter'); 
					if (!empty ($twitter) && glauss_get_option('twitter')) { ?>
					<a class="twitter" title="twitter" href="<?php echo esc_url( $twitter ); ?>">
						<i class="fa fa-twitter" aria-hidden="true"></i><span class="screen-reader-text">Twitter</span>
					</a>
					<?php } ?>
					<?php $facebook = glauss_get_option('facebook'); 
					if (!empty ($facebook) && glauss_get_option('facebook')) { ?>
					<a class="facebook" title="facebook" href="<?php echo esc_url( $facebook ); ?>">
						<i class="fa fa-facebook" aria-hidden="true"></i><span class="screen-reader-text">Facebook</span>
					</a>
					<?php } ?>
					<?php $google_plus = glauss_get_option('google_plus'); 
					if (!empty ($google_plus) && glauss_get_option('google_plus')) { ?>
					<a class="google_plus" title="google+" href="<?php echo esc_url( $google_plus ); ?>">
						<i class="fa fa-google-plus" aria-hidden="true"></i><span class="screen-reader-text">Google+</span>
					</a>
					<?php } ?>
					<?php $pinterest = glauss_get_option('pinterest'); 
					if (!empty ($pinterest) && glauss_get_option('pinterest')) { ?>
					<a class="pinterest" title="pinterest" href="<?php echo esc_url( $pinterest ); ?>">
						<i class="fa fa-pinterest" aria-hidden="true"></i><span class="screen-reader-text">Pinterest</span>
					</a>
					<?php } ?>
					<?php $dribbble = glauss_get_option('dribbble'); 
					if (!empty ($dribbble) && glauss_get_option('dribbble')) { ?>  
					<a class="dribbble" title="dribbble" href="<?php echo esc_url( $dribbble ); ?>">
						<i class="fa fa-dribbble" aria-hidden="true"></i><span class="screen-reader-text">Dribbble</span>
					</a>
					<?php } ?>
					<?php $linkedin = glauss_get_option('linkedin'); 
					if (!empty ($linkedin) && glauss_get_option('linkedin')) { ?>  
					<a class="linkedin" title="linkedin" href="<?php echo esc_url( $linkedin ); ?>">
						<i class="fa fa-linkedin" aria-hidden="true"></i><span class="screen-reader-text">Linkedin</span>
					</a>
					<?php } ?>
					<?php $flickr = glauss_get_option('flickr'); 
					if (!empty ($flickr) && glauss_get_option('flickr')) { ?>  
					<a class="flickr" title="flickr" href="<?php echo esc_url( $flickr ); ?>">
						<i class="fa fa-flickr" aria-hidden="true"></i><span class="screen-reader-text">Flickr</span>
					</a>
					<?php } ?>
					<?php $vimeo = glauss_get_option('vimeo'); 
					if (!empty ($vimeo) && glauss_get_option('vimeo')) { ?> 
					<a class="vimeo" title="vimeo" href="<?php echo esc_url( $vimeo ); ?>">
						<i class="fa fa-vimeo-square" aria-hidden="true"></i><span class="screen-reader-text">Vimeo</span>
					</a>
					<?php } ?>
					<?php $rss = glauss_get_option('rss'); 
					if (!empty ($rss) && glauss_get_option('rss')) { ?>
					<a class="rss" title="rss" href="<?php echo esc_url( $rss ); ?>">
						<i class="fa fa-rss" aria-hidden="true"></i><span class="screen-reader-text">RSS</span>
					</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
<?php }

