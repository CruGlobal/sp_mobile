<?php if (!is_front_page()) {echo '</div>';} ?>

<footer id="main_footer">
<?php wp_nav_menu(array('theme_location' => 'bottom_buttons')); echo "\n"; ?>
<div class="clearboth"></div>
<div id="copyright">Copyright <?php echo date('Y'); ?> Cru</div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>