<?php get_header() ?>

<?php if ( have_posts() ) : ?>

  <header class="page_header">
    <!--<a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/letsgo.png" border="0" alt="" id="letsgo" /></a>-->
  	<h1 class="page_title"><?php single_cat_title();?></h1>
	</header>
  
  <ul class="videos">
<?php while ( have_posts() ) : the_post(); ?>
    <li><a href="<?php the_field('video_url'); ?>" target="_blank"><img src="<?php the_field('video_thumbnail'); ?>" alt="<?php the_title(); ?>" border="0" /><h2><?php the_title(); ?></h2><p><?php the_field('video_details'); ?></p></a></li>
<?php endwhile; else: ?>
  </ul>

<?php endif; ?>

<?php get_footer() ?>