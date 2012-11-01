<?php get_header() ?>

  <header class="page_header">
    <!--<a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/letsgo.png" border="0" alt="" id="letsgo" /></a>-->
  	<h1 class="page_title"><?php the_title(); ?></h1>
	</header>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <?php if (is_page('faq')) {
      $rows = get_field('faq');
      if($rows) {
			  echo '<ul class="stripes accordion">';
				$i = 1;
				foreach($rows as $row) {
					echo '<li id="faq' . $i . '"><h2 class="entry_title"><a href="#faq' . $i . '">' . $row['faq_question'] . '</a></h2><p>A: ' . $row['faq_answer'] .'</p></li>';
					$i = $i + 1;
				}
				echo '</ul>';
			}
	} else { ?>

  <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
    <?php the_content(); ?>
  </article>
  
  <?php } ?>

<?php endwhile; else: endif; ?>

<?php get_footer() ?>