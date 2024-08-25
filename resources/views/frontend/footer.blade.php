<footer style="background-color: #040404; padding: 20px 0; color: white;">
    <div class="container">
        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <h4 style="font-size: 1.2rem; color: #dcdcdc; font-weight: bold; margin-bottom: 15px;">NSE-Non Stop Earning</h4>
                <p style="font-size: 0.875rem; line-height: 1.6; color: #dcdcdc; margin: 0;">
                    It’s a Bangladeshi trusted online platform. You will need a good smartphone and good internet connection to work here. It is a very easy process and you can learn this process in your own mother tongue. Here you make your career smoothly.
                </p>
            </div>

            <!-- Middle Column -->
            <div class="col-lg-2 col-md-6 col-sm-12 mb-4">
                <h4 style="font-size: 1.2rem; color: #dcdcdc; font-weight: bold; margin-bottom: 15px;">Quick Links</h4>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 6px;"><a href="{{ route('faqs') }}" style="text-decoration: none; color: #ffffff; font-size: 1rem; transition: color 0.3s;">FAQ's</a></li>
                    <li style="margin-bottom: 6px;"><a href="{{ route('contact') }}" style="text-decoration: none; color: #ffffff; font-size: 1rem; transition: color 0.3s;">Support Center</a></li>
                    <li style="margin-bottom: 6px;"><a href="{{ route('terms') }}" style="text-decoration: none; color: #ffffff; font-size: 1rem; transition: color 0.3s;">Terms and Conditions</a></li>
                </ul>
            </div>

            <!-- Right Column -->
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <h4 style="font-size: 1.2rem; color: #dcdcdc; font-weight: bold; margin-bottom: 15px;">Contact Us</h4>
                <p style="font-size: 0.875rem; line-height: 1.6; color: #dcdcdc; margin: 0;"><strong>Address:</strong> Bonani Dhaka- Rode-12</p>
                <p style="font-size: 0.875rem; line-height: 1.6; color: #dcdcdc; margin: 0;"><strong>Mobile:</strong> +8809638329402</p>
                <p style="font-size: 0.875rem; line-height: 1.6; color: #dcdcdc; margin: 0;"><strong>Email:</strong> <a href="mailto:nonstopearning738@gmail.com" style="color: #ffffff; text-decoration: none;">nonstopearning738@gmail.com</a></p>
            </div>

            <!-- Support Team Column -->
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <h4 style="font-size: 1.2rem; color: #dcdcdc; font-weight: bold; margin-bottom: 15px;">Support Team</h4>
                <div class="social-icons" style="margin-top: 15px;">
                    <a href="https://www.facebook.com/profile.php?id=100087135843709" target="_blank" style="color: #ffffff; margin-right: 15px; font-size: 1.5rem; text-decoration: none; transition: color 0.3s;" title="Facebook"><i class="fab fa-facebook"></i></a>
                    <a href="https://youtube.com/@antton7382?si=fnuPYESw7YmrvnT_" target="_blank" style="color: #ffffff; font-size: 1.5rem; text-decoration: none; transition: color 0.3s;" title="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="text-center" style="margin-top: 30px; font-size: 0.875rem; color: #f4f1f1;">
            <p>&copy; 2019 - 2024 NonstopEarning&reg; All rights reserved</p>
        </div>
    </div>
</footer>



<!-- Include Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- End Newsletter Popup -->
    
     <!-- Including Jquery -->
     <script src="/assets/js/vendor/jquery-3.3.1.min.js"></script>
     <script src="/assets/js/vendor/modernizr-3.6.0.min.js"></script>
     <script src="/assets/js/vendor/jquery.cookie.js"></script>
     <script src="/assets/js/vendor/wow.min.js"></script>
     <!-- Including Javascript -->
     <script src="/assets/js/bootstrap.min.js"></script>
     <script src="/assets/js/plugins.js"></script>
     <script src="/assets/js/popper.min.js"></script>
     <script src="/assets/js/lazysizes.js"></script>
     <script src="/assets/js/main.js"></script>
     <!--For Newsletter Popup-->
     <script>
		jQuery(document).ready(function(){  
		  jQuery('.closepopup').on('click', function () {
			  jQuery('#popup-container').fadeOut();
			  jQuery('#modalOverly').fadeOut();
		  });
		  
		  var visits = jQuery.cookie('visits') || 0;
		  visits++;
		  jQuery.cookie('visits', visits, { expires: 1, path: '/' });
		  console.debug(jQuery.cookie('visits')); 
		  if ( jQuery.cookie('visits') > 1 ) {
			jQuery('#modalOverly').hide();
			jQuery('#popup-container').hide();
		  } else {
			  var pageHeight = jQuery(document).height();
			  jQuery('<div id="modalOverly"></div>').insertBefore('body');
			  jQuery('#modalOverly').css("height", pageHeight);
			  jQuery('#popup-container').show();
		  }
		  if (jQuery.cookie('noShowWelcome')) { jQuery('#popup-container').hide(); jQuery('#active-popup').hide(); }
		}); 
		
		jQuery(document).mouseup(function(e){
		  var container = jQuery('#popup-container');
		  if( !container.is(e.target)&& container.has(e.target).length === 0)
		  {
			container.fadeOut();
			jQuery('#modalOverly').fadeIn(200);
			jQuery('#modalOverly').hide();
		  }
		});
	</script>
    <!--End For Newsletter Popup-->
</div>
</body>

<!-- belle/index.html   11 Nov 2019 12:20:55 GMT -->
</html>
