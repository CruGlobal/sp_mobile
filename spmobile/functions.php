<?php
	global $sm;
	include $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/spmobile/includes/class.summer-project.php';
	$sm = new SummerProject();

// activate menus
if (function_exists('add_theme_support')) {
  add_theme_support('menus');
}

add_action( 'init', 'register_menus' );

function register_menus() {
  register_nav_menus(
    array(
      'bottom_buttons' => __( 'Bottom Buttons' ),
    )
  );
}

// remove the generator from the head
remove_action('wp_head', 'wp_generator');

// carousel
function carousel() {
  echo '<div id="carousel" class="touchcarousel black-and-white">';
  echo '<ul class="touchcarousel-container">';
  echo '<li class="touchcarousel-item"><a href="/projects/focus"><img src="/wp-content/themes/spmobile/images/icon_focus.png" />Focus</a></li>';
  echo '<li class="touchcarousel-item"><a href="/projects/geography"><img src="/wp-content/themes/spmobile/images/icon_geo.png" />Geography</a></li>';
  echo '<li class="touchcarousel-item"><a href="/projects/environment"><img src="/wp-content/themes/spmobile/images/icon_env.png" />Environment</a></li>';
  echo '<li class="touchcarousel-item"><a href="/projects/options"><img src="/wp-content/themes/spmobile/images/icon_options.png" />Options</a></li>';
  echo '<li class="touchcarousel-item"><a href="/projects/length"><img src="/wp-content/themes/spmobile/images/icon_length.png" />Length</a></li>';
  echo '<li class="touchcarousel-item"><a href="/projects/calendar"><img src="/wp-content/themes/spmobile/images/icon_calendar.png" />Calendar</a></li>';
  echo '</ul>'; 
  echo '</div>';
	echo '<script>';
	echo 'jQuery(function($) {';
	echo '$("#carousel").touchCarousel({';
	echo 'directionNav: false,';
	echo '});';
	echo '});';
	echo '</script>';	
}

/**
* This will take the small project id and make a url out of it
*/
function sp_permalink() {
	global $post;
	echo '/projects/' . $post->ID;
}

function sp_template_redirect() {
	global $wp, $wp_query, $sm;

	if(array_intersect(array_keys($wp->query_vars),$sm->keys)) {
		header('HTTP/1.1 200 OK');

		$wp_query->is_404    = false;
		$wp_query->is_search = true;
		$wp_query->is_page   = true;
		include(TEMPLATEPATH . '/search.php');
		exit;
	}
	elseif(strpos($wp->request,'projects/') === 0) {
		header('HTTP/1.1 200 OK');

		$wp_query->is_404    = false;
		$wp_query->is_search = false;
		$wp_query->is_page   = false;
		$wp_query->is_single = true;

		$wp_query->post = $sm->get_post(substr($wp->request,strlen('projects/')));

		$wp_query->posts[0] = $wp_query->post;

		$wp_query->query_vars['page']     = 0;
		$wp_query->query_vars['name']     = $wp_query->post->ID;
		$wp_query->query_vars['pagename'] = $wp_query->post->post_title;

		$wp_query->queried_object = $wp_query->post;

		include(TEMPLATEPATH . '/single.php');
		exit;
	}
}
add_action('template_redirect', 'sp_template_redirect');

/**
* Allow WP to use the SummerProject->keys
* 
* @param mixed $vars
*/
function sp_custom_rewrite_query_vars($vars) {
	global $sm;

	foreach($sm->keys as $key) {
		array_push($vars, $key);
	}
	return $vars;
}
add_filter('query_vars','sp_custom_rewrite_query_vars');
?>