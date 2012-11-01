<?php get_header() ?>

<?php if ( have_posts() ) : ?>

  <header class="page_header">
    <!--<a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/letsgo.png" border="0" alt="" id="letsgo" /></a>-->
  	<h1 class="page_title"><?php single_cat_title();?></h1>
	</header>
  
  <ul class="stories">
<?php while ( have_posts() ) : the_post(); ?>
    <li><a href="<?php the_permalink(); ?>"><img src="<?php the_field('story_photo'); ?>" alt="<?php the_field(); ?>" border="0" width="150" height="150" /><h2><span><?php the_field('story_name'); ?></span> <?php the_field('story_struggle'); ?></h2><p><?php the_field('story_excerpt'); ?></p></a></li>
<?php endwhile; else: ?>
  </ul>

<?php endif; ?>

<?php get_footer() ?>