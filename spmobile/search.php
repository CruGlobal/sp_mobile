<?php
	global $wp_query;

	$posts = $sm->search($_GET);

	$wp_query->posts = $posts;

	get_header();
?>
<?php if ( have_posts() ) : ?>

  <header class="page_header">
    <!--<a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/letsgo.png" border="0" alt="" id="letsgo" /></a>-->
		<h1 class="page_title">We found…<!-- Search Results for "<?php //echo get_search_query(); ?>" --></h1>
	</header>

<?php while ( have_posts() ) : the_post(); ?>

  <article>
		<a href="<?php sp_permalink(); ?>"><h2 class="entry_title"><?php the_title(); ?></h2><?php //the_excerpt(); ?></a>
  </article>

<?php endwhile; ?>
<?php get_search_form(); ?>
<?php else : ?>

  <header class="page_header">
    <!--<a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/letsgo.png" border="0" alt="" id="letsgo" /></a>-->
    <h1 class="page_title">Nothing Found</h1>
  </header>
  
  <article>
    <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
		<?php get_search_form(); ?>
	</article>

<?php endif; ?>

<?php get_footer() ?>