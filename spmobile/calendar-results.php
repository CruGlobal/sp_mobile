<?php
/* Template Name: Calendar Results Page */
 get_header() ?>

<?php if ( have_posts() ) : ?>

  <header class="page_header">
  	<h1 class="page_title"><?php the_title(); ?></h1>
	</header>

<?php
$startDate = $_GET["startDate"];
$startMonth = $_GET["startMonth"];
$startYear = $_GET["startYear"];


$endDate = $_GET["endDate"];
$endMonth = $_GET["endMonth"];
$endYear = $_GET["endYear"];


$start = $startYear . '-' . $startMonth . '-' . $startDate; 
$end = $endYear . '-' . $endMonth . '-' . $endDate;


echo $start;
echo '<br/>';
echo $end;

?>
  
<?php 
<?php 
            query_posts( array( 
              // 'post_type'  => 'event',        // only query events
              'meta_key'    => 'project_start_date',  // load up the event_date meta
              'orderby'     => 'meta_value',  // sort by the event_date
              'order'       => 'asc',         // ascending, so earlier events first
              'posts_per_page' => '2',
              'meta_query'  => array(         // restrict posts based on meta values
                  'key'     => 'project_start_date',  // which meta to query
                  'value'   => date("Y/m/d h:i A"),  // value for comparison
                  'compare' => '>=',          // method of comparison
                  'type'    => 'DATE'         // datatype, we don't want to compare the string values
                ) // end meta_query array
              ) // end array
            ); // close query_posts call
                 ?>
?>  
  
  
<ul class="stripes">

<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <li>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br/>
      Start: <?php the_field('project_start_date'); ?>    -<?php // echo $userStart; ?><br/>
      End: <?php the_field('project_end_date'); ?> - <?php //echo $userEnd; ?><br/>
    </li>
<?php endwhile; else: ?>

</ul>

<?php endif; ?>

<?php get_footer() ?>