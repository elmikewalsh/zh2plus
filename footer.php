	<span class="social-title"><?php echo get_option('zh2plus_social_links_title'); ?>&nbsp;</span>
	 <?php wp_nav_menu( array('theme_location'  => 'social_menu' ,'sort_column' => 'menu_order', 'container_class' => 'social', 'after' => '&nbsp;<li class="menu-divider">|</li>' ) ); ?></p>

<?php if (get_theme_mod('zh2plus_backto_top')) { ?><div class="pagetoplink"><a href="#pagetop"><?php echo __('Back To Top'); ?></a></div><?php } ?>

    <p><?php wp_nav_menu( array('theme_location'  => 'footer_menu' ,'sort_column' => 'menu_order', 'container_class' => 'footer', 'after' => '&nbsp;<li class="menu-divider">::</li>' ) ); ?></p>
	</div>  <!-- /end .container -->

	<?php wp_footer(); ?>

</body>
</html>