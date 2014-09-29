<?php
  include "lessc.inc.php";
  try {lessc::ccompile(dirname(__FILE__) . '/css/style.less', dirname(__FILE__) . '/css/style.less.css');}
	catch (exception $ex) {exit('lessc fatal error:<br />'.$ex->getMessage());}
	
	if (in_category('stories')) {$storyClass = 'single-story ';}
	
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=640px">
  <!-- <meta name="viewport" content="width=640,maximum-scale=640,user-scalable=no" /> -->
  <title><?php 
    global $page, $paged;
    wp_title( '|', true, 'right' );
    // Add the blog name.
    bloginfo( 'name' );
    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ($site_description && ( is_home() || is_front_page()))
      echo " | $site_description";
    // Add a page number if necessary:
    if ( $paged >= 2 || $page >= 2 )
      echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
    ?></title>
  
  <script type="text/javascript" src="http://use.typekit.com/drd0hmi.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
  
  <link href="<?php bloginfo('template_url'); ?>/css/reset.css" type="text/css" rel="stylesheet" />
  <link href="<?php bloginfo('template_url'); ?>/css/style.less.css" type="text/css" rel="stylesheet" />
  <link href="<?php bloginfo( 'pingback_url' ); ?>" rel="pingback" />
  
  <!-- CAROUSEL -->
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/touchcarousel/touchcarousel.css" />
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/touchcarousel/black-and-white-skin/black-and-white-skin.css" />
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/touchcarousel/jquery.touchcarousel-1.1.min.js"></script>
  
  <script>
	  $(function() {
	    var winHeight = $(window).height();
		  var conHeight = winHeight - <?php
		  if ((is_category('video') || is_category('stories') || (is_single() && in_category('stories'))) || (!is_page_template('project-template.php') && !is_page_template('calendar-results.php') && !is_category() && !is_single() && !is_tag())) {
			  echo "164";
		  } else {echo "100";}?> - 175 - 39;
		  $("#maincontent").css("height",conHeight);
		});
	</script>
  
  <?php wp_head(); ?>

</head>

<body id="<?php if (!is_search()) {echo $post->post_name;} ?>" <?php body_class($storyClass); ?> onload="setTimeout(function() { window.scrollTo(0, 1) }, 100);">

<div id="site_wrapper">

<?php if (!is_front_page()) {	?>

<script type="text/javascript" language="javascript">
$(function() {  
    $("#drop-down_button").click(function() {  
        $(".drop-down_up").toggleClass("drop-down_down");  
    });  
});
</script>

  <div id="carousel_drop-down" class="drop-down_up">
		<?php carousel(); ?>
    <a href="#" id="drop-down_button">Search Projects</a>
  </div>

	<?php //if (is_404() || in_category('stories') || in_category('video') || (is_page() && !is_page_template('project-template.php')) || is_search() || is_single() && !in_category(array( 12,13 ))) { ?>
    <a href="<?php echo home_url('/'); ?>" id="letsgo"><img src="<?php bloginfo('template_url'); ?>/images/cru.png" border="0" alt="" /></a>
	<?php //} ?>

	<div id="maincontent" <?php if (!is_page_template('project-template.php') && !is_page_template('calendar-results.php') && !is_category() && !is_single() && !is_tag()) {?>style="margin-top: 164px;"<?php } ?>>
<?php } ?>