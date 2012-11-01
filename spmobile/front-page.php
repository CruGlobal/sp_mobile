<?php get_header() ?>

<header id="home_header">
  <img src="<?php bloginfo('template_url'); ?>/images/logo.png" border="0" alt="" id="logo" />
  <img src="<?php bloginfo('template_url'); ?>/images/letsgo.png" border="0" alt="" />
</header>

<?php carousel(); ?>

<div id="home_search"><?php get_search_form(); ?></div>

<?php get_footer() ?>