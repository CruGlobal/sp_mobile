<?php get_header() ?>

  <header class="page_header">
    <!--<a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/letsgo.png" border="0" alt="" id="letsgo" /></a>-->
  	<h1 class="page_title"><?php the_title(); ?></h1>
	</header>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
    <?php the_content(); ?>
  </article>

<?php endwhile; else: endif; ?>

<?php get_footer() ?>