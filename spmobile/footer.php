<?php if (!is_front_page()) {echo '</div>';} ?>

<footer id="main_footer">
<?php wp_nav_menu(array('theme_location' => 'bottom_buttons')); echo "\n"; ?>
<div class="clearboth"></div>
<div id="copyright">Copyright <?php echo date('Y'); ?> Cru</div>

<div id="desktopswitch"><a href="http://www.gosummerproject.com?fullsite=1" style="width: auto; text-align: center; border: none; box-shadow: none; display: block; font-family: arial; font-size: 22px; text-shadow: none; padding: 10px 0 0 0;">Go to Full Site</a></div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>