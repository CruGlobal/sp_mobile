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
$userStart = $startDate . '/' . $startMonth . '/' . $startYear;
$endDate = $_GET["endDate"];
$endMonth = $_GET["endMonth"];
$endYear = $_GET["endYear"];
$userEnd = $endDate . '/' . $endMonth . '/' . $endYear;

if (get_field('project_start_date')) {
	$start = DateTime::createFromFormat('Ymd', get_field('project_start_date'));
	$end = DateTime::createFromFormat('Ymd', get_field('project_end_date'));
}

?>
  
  <ul class="stripes">
  
<?php 
$args = array(
    'meta_query' => array(
        array(
            'key' => 'project_start_date',
            'value' => DateTime::createFromFormat('Ymd', $userStart),
            'compare' => '>='
        ),
// this array results in no return for both arrays
        array(
            'key' => 'project_end_date',
            'value' => DateTime::createFromFormat('Ymd', $userEnd),
            'compare' => '<=' 
        )
    )
);
$the_query  = new WP_Query( $args );

/*
DAVID DAVID DAVID ... LOOK HERE!
I don't know why, but the ACF field isn't even being recognized as its value should be echoed on line 64. That's as far as I got troubleshooting this thing after you left. In Elliot's response to my question about this, he talks about using the get_posts() function which I don't think is a part of our current attempted solution. Should we look into that?
*/

print_r ($args);

echo "<br /><br />";

echo $userStart . " - " . $start;
echo "<br />";
echo $userEnd . " - " . $end;

echo DateTime::createFromFormat('dmY', $userStart);
echo DateTime::createFromFormat('dmY', $userEnd);

echo the_field('project_start_date');
?>


<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>



    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                  <?php endwhile; else: ?>
  </ul>

<?php endif; ?>

<?php get_footer() ?>