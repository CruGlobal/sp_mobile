<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();global $post; ?>

	<?php	if (in_category('stories')) { ?>

  <header class="page_header">
    <!--<a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/letsgo.png" border="0" alt="" id="letsgo" /></a>-->
  	<h1 class="page_title"><?php the_title(); ?></h1>
	</header>

  <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
    <img src="<?php the_field('story_photo'); ?>" border="0" alt="" />
    <h2>What made you realize God was calling you to go on summer project?</h2>
    <p><?php the_field('story_calling'); ?></p>
    <h2>What obstacle did you encounter along the way?</h2>
    <p><?php the_field('story_obstacle'); ?></p>
    <h2>What was the turning point?</h2>
    <p><?php the_field('story_turningpoint'); ?></p>
    <h2>What practical steps did you take during the process?</h2>
    <p><?php the_field('story_practicalsteps'); ?></p>
    <h2>What do you recommend to others who face a similar obstacle?</h2>
    <p><?php the_field('story_recommendation'); ?></p>
    <p><?php the_field('story_name'); ?> attended <?php the_field('story_project'); ?></p>
    <?php the_content(); ?>
  </article>
  
	<?php } else { ?>
  
  <?php
	  /*if (get_field('project_start_date')) {
		  $start = DateTime::createFromFormat('m/d/Y', get_field('project_start_date'));
		  $end = DateTime::createFromFormat('m/d/Y', get_field('project_end_date'));
		  $start = $start->format('F d, Y');
		  $end = $end->format('F d, Y');
		}*/
	?>

  <header class="page_header">
  	<h1 class="page_title"><?php the_title(); ?></h1>
	</header>

  <ul class="stripes accordion">
    <li id="one"><h2 class="entry_title"><a href="#one">Description</a></h2><?php the_content(); ?></li>

    <?php if (get_field('project_location')) { ?>
    <li id="two"><h2 class="entry_title"><a href="#two">Location</a></h2><p><?php the_field('project_location'); ?></p></li>
		<?php } ?>
    <?php if (get_field('project_start_date')) { ?>
    <li id="three"><h2 class="entry_title"><a href="#three">Dates</a></h2><p><?php the_field('project_start_date'); ?> to <?php the_field('project_end_date'); ?></p></li>
		<?php } ?>
    <li id="four"><h2 class="entry_title"><a href="#four">Length</a></h2><p><?php
    foreach((get_the_category()) as $category) {
      if ($category->category_parent == "11") {
			  if ($category->cat_ID == "14") {echo 'A little bit of time: 1-2 Weeks';}
			  elseif ($category->cat_ID == "15") {echo 'About a month: 3-5 Weeks';}
			  else {echo 'The whole summer: 7-12 Weeks';}
			}
		} ?></p></li>
    <?php if (get_field('project_cost')) { ?>
    <li id="five"><h2 class="entry_title"><a href="#five">Cost</a></h2><p><?php the_field('project_cost'); ?></p></li>
		<?php } ?>
    <li id="six"><h2 class="entry_title"><a href="#six">Ministry Focus</a></h2><p><?php the_tags('', ', ', ''); ?></p></li>
    <?php if (get_field('project_job')) { ?>
    <li id="seven"><h2 class="entry_title"><a href="#seven">Can a student get a job?</a></h2><p><?php the_field('project_job'); ?></p></li>
		<?php } ?>
    <?php if (get_field('project_website')) { ?>
    <li id="eight"><h2 class="entry_title"><a href="#eight">Website</a></h2><p><a href="<?php the_field('project_website'); ?>" target="_blank"><?php the_field('project_website'); ?></a></p></li>
		<?php } ?>
    <?php if (get_field('project_contact')) { ?>
    <li id="nine"><h2 class="entry_title"><a href="#nine">Contact</a></h2><?php the_field('project_contact'); ?></li>
		<?php } ?>
  </ul>
  
  <?php } ?>

<?php endwhile; else: endif; ?>

<?php get_footer() ?>