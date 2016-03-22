<div class="flagsidebar">
	<?php if ( is_active_sidebar( 'sidebar-flag' ) ):
	dynamic_sidebar( 'sidebar-flag' );
	endif; ?>
<div class="elevator-control"><label class="hidden">Back to Top</label></div>
</div>
<?php wp_footer();?>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
   $(document).ready(function(){
	   $(window).bind('scroll', function() {
			var titleHeight = $(".site-title").height();
			var navPadding = $(".site-title").css("padding-top");
			navPadding = navPadding.substring(0, navPadding.length - 2);
			var scrollDistance = parseInt(titleHeight) + parseInt(navPadding);
			var navHeight = $("nav").height();
			var sidebarHeight = $(".flagsidebar").height();
			var elevatorButtonHeight = $(".elevator-control").height();
			var elevatorButtonPadding = $(".elevator-control").css("padding-top");
			var scrollSearch = parseInt(titleHeight) + parseInt(navHeight)*2;

			var scrollElevator = parseInt(titleHeight) + parseInt(navPadding) + parseInt(navHeight) + parseInt(sidebarHeight) - parseInt(elevatorButtonHeight) - parseInt(elevatorButtonPadding);
		
			if ($(window).scrollTop() > scrollDistance) {
				$('nav').addClass('navfixed');
				$('.site-title').addClass('site-title-fixed');
				 
			}
			else {
				$('nav').removeClass('navfixed');
				$('.site-title').removeClass('site-title-fixed');
			}
		
			if ($(window).scrollTop() > scrollSearch) {
				$('.widget_search').addClass('searchfixed');
			}
			else {
				$('.widget_search').removeClass('searchfixed');
			}


			if ($(window).scrollTop() > scrollElevator) {
				$('.elevator-control').addClass('elevator-control-fixed');
			}
			 else {
				$('.elevator-control').removeClass('elevator-control-fixed');
			}
			 
		});
	});
</script>

<!-- elevator.js -->
<script src='<?php echo get_template_directory_uri(); ?>/js/elevator.min.js'></script>

<script>
window.onload = function() {
  var elevator = new Elevator({
    element: document.querySelector('.elevator-control'),
    mainAudio: '<?php echo get_template_directory_uri(); ?>/sound/elevator.mp3',
    endAudio: '<?php echo get_template_directory_uri(); ?>/sound/ding.mp3'
  });
}
</script>

</body>
</html>