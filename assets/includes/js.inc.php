  <script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'assets/js/vendor/zepto' : 'assets/js/vendor/jquery') +
  '.js><\/script>')
  </script>
  
  <script type="text/javascript">

	$('a').click(function(){
		$('html, body').animate({
			scrollTop: $( $(this).attr('href') ).offset().top
		}, 500);
		return false;
	});
 
  </script>
  
  <script src="assets/js/foundation.min.js"></script>
    
    <script type="text/javascript">
		$(document).ready(function() {

			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
	
				closeBtn  : true,
				arrows    : true,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

		});
	</script>
  
  <script>
    $(document).foundation();
  </script>