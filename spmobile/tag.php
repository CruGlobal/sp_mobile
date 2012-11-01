<?php get_header() ?>

<?php if ( have_posts() ) : ?>

  <header class="page_header">
  	<!--<h1 class="page_title"><?php single_cat_title(); ?> Projects</h1>-->
    <h1 class="page_title"><?php single_tag_title(); ?> Projects</h1>
	</header>
  
  <ul class="stripes">
<?php while ( have_posts() ) : the_post(); ?>
    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php endwhile; else: ?>
  </ul>

<?php endif; ?>

<?php get_footer() ?>