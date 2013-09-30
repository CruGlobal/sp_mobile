<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();global $post; ?>

	<?php	if (in_category('stories')) { ?>

  <header class="page_header">
    <!--<a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/letsgo.png" border="0" alt="" id="letsgo" /></a>-->
  	<h1 class="page_title"><?php the_title(); ?></h1>
	</header>

  <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
    <img src="<?php the_field('story_photo'); ?>" border="0" alt="" />
    <p><?php the_field('story'); ?></p>
    <p><?php the_field('story_name'); ?> attended <?php the_field('story_project'); ?></p>
    <?php the_content(); ?>
  </article>
  
	<?php } else { ?>
  
  <?php
	$project_data = get_post();
	  if ($project_data->start_date) {
		  $start = DateTime::createFromFormat('Y-m-d', $project_data->start_date);
		  $end = DateTime::createFromFormat('Y-m-d', $project_data->end_date);
		  $start = $start->format('F d, Y');
		  $end = $end->format('F d, Y');
		}
		if ($project_data->job) {
			if($project_data->job == 'true'){
				$job = "Yes";
			}else{
				$job = "No";
			}
		}
	?>
  <header class="page_header">
  	<h1 class="page_title"><?php the_title(); ?></h1>
	</header>

  <ul class="stripes accordion">
    <li id="one"><h2 class="entry_title"><a href="#one">Description</a></h2><?php the_content(); ?></li>

    <?php if ($project_data->display_location) { ?>
    <li id="two"><h2 class="entry_title"><a href="#two">Location</a></h2><p><?php echo $project_data->display_location; ?></p></li>
		<?php } ?>
    <?php if ($project_data->start_date) { ?>
    <li id="three"><h2 class="entry_title"><a href="#three">Dates</a></h2><p><?php echo $start; ?> to <?php echo $end; ?></p></li>
		<?php } ?>
    <li id="four"><h2 class="entry_title"><a href="#four">Length</a></h2><p><?php echo $project_data->weeks; ?> weeks</p></li>
    <?php if ($project_data->student_cost) { ?>
    <li id="five"><h2 class="entry_title"><a href="#five">Cost</a></h2><p>$<?php echo $project_data->student_cost; ?></p></li>
		<?php } ?>
    <li id="six"><h2 class="entry_title"><a href="#six">Ministry Focus</a></h2><p><?php echo $project_data->primary_focus_name; ?></p></li>
    <?php if ($project_data->job) { ?>
    <li id="seven"><h2 class="entry_title"><a href="#seven">Can a student get a job?</a></h2><p><?php echo $job; ?></p></li>
		<?php } ?>
    <?php if ($project_data->url) { ?>
    <li id="eight"><h2 class="entry_title"><a href="#eight">Website</a></h2><p><a href="<?php echo $project_data->url; ?>" target="_blank"><?php echo $project_data->url; ?></a></p></li>
		<?php } ?>
    <?php if ($project_data->regional_info) { ?>
    <li id="nine"><h2 class="entry_title"><a href="#nine">Contact</a></h2><p><?php echo $project_data->regional_info; ?></p></li>
		<?php } ?>
  </ul>
  
  <?php } ?>

<?php endwhile; else: endif; ?>

<?php get_footer() ?>