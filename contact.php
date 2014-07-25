<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<?php include('assets/includes/form.inc.php'); ?>
<head>
	<meta charset="utf-8" />
  	<meta name="viewport" content="width=device-width" />
  	<title>Craig De Lorenzo - Actor NYC</title>
                
	<?php include('assets/includes/top.inc.php'); ?>

</head>
<body>

<?php include('assets/includes/head.inc.php'); ?>
  
  <div class="large-9 columns mainContainer">
  
    
    <!---- END Gallery CONTENT, START Contact CONTENT ------>
    
    <h2>Contact Me</h2>
    <div class="divider"style="width: 80%;"></div>
    <div class="clear"></div>
    
    <div class="large-6 columns">

    	<p><b>Robyn Bluestone Management</b><br>
		Ph: (908) 258-0267<br>
		Email: <a class="emailLink" href="mailto:robyn@Rbluestone.com">robyn@Rbluestone.com</a></p>
    
    	<form method="post" action="" id="contact">

			<fieldset>

			<!-- Name -->
	        <label for="name">* Name

			<!-- add a warning if the information is not filled in -->
	        <?php
			if (isset($missing) && in_array('name', $missing)) { ?>
	        <img src="assets/img/icons/cross.png" alt="Warning" width="15" height="15" />
	        <?php } ?>
	       	</label>
	        <br/>

			<input name="name" type="text" required tabindex="1"

			<?php if (isset($missing)) {
			echo 'value="'.htmlentities($_POST['name']).'"';
			} ?>>
			
			<!-- Email -->
	        <label for="email">* Email

			<?php
			if (isset($missing) && in_array('email', $missing)) { ?>
	        <img src="assets/img/icons/cross.png" alt="Warning" width="15" height="15" />
	        <?php } ?>
	        </label>
	        <br/>

			<input name="email"  type="email" required placeholder="you@yourhost.com" tabindex="2"
			<?php if (isset($missing)) {
			echo 'value="'.htmlentities($_POST['email']).'"';} ?>>
            
            <!-- Day Phone Number -->
	        <label for="dayphone">Phone Number (optional)

			<?php
			if (isset($missing) && in_array('dayphone', $missing)) { ?>
	        <?php } ?>
	        </label>
	        <br/>

			<input name="dayphone" type="tel" size="25" placeholder="(123) 456-7890" tabindex="3"
			<?php if (isset($missing)) {
			echo 'value="'.htmlentities($_POST['dayphone']).'"';} ?>>
            
         
	        <!-- Comments -->
	        <label for="enquiry" >Comments (optional)</label><br/>
	        <textarea name="comments" class="textbox" cols="40" rows="10" tabindex="4"></textarea>
            <input name="send" id="send" class="button success large-12 columns" type="submit" value="Send Email" tabindex="5" />

			</fieldset>
	        <!-- End of form -->
   	  </form>
    
    </div>
    
    <div class="large-6 columns"><img src="assets/img/home-slider/3.jpg" width="601" height="801" alt="Contact img"></div>
    
    

<?php include('assets/includes/footer.inc.php'); include('assets/includes/js.inc.php'); ?>
  
</body>
</html>