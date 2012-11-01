<?php
/* Template Name: Project Page */
 get_header() ?>

  <?php if (is_page('focus')) { ?>
  <header class="page_header">
  	<h1 class="page_title"><?php the_title(); ?></h1>
	</header>
  <?php } ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php if (is_page(array('environment','geography','length','options','focus'))) {
      $rows = get_field('sub-categories');
      if($rows) {
			  echo '<ul id="sub-categories" class="stripes">';
				foreach($rows as $row) {
					echo '<li><a href="' . $row['sub-category_link'] . '"><img src="' . $row['sub-category_icon'] . '" border="0" alt="" />' . $row['sub-category_title'] . '</a></li>';
				}
				echo '</ul>';
			}
		} ?>
    
    <?php /*
if (is_page('focus')) {
			$tags = get_tags();
			if ($tags) {
			  echo '<ul id="focus_list" class="stripes">';
				foreach ($tags as $tag) {
				echo '<li><a href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $tag->name ) . '" ' . '>' . $tag->name.'</a></li> ';
				}
			  echo '</ul>';
			}
		}
*/ ?>
    
    <?php if (is_page('calendar')) { ?>
      <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			  <?php the_content(); ?>
      </article>
		<? } ?>
  
  <!--<p style="font-size: smaller; text-align: right;"><a href="<?php echo home_url('/'); ?>">home</a></p>-->

<?php endwhile; else: endif; ?>

<?php get_footer() ?>