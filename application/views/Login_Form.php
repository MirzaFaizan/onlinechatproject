  <!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=devidev-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>main</title>
	
	<!-- [ FONT-AWESOME ICON ] 
        =========================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="library/font-awesome-4.3.0/css/font-awesome.min.css">

	<!-- [ PLUGIN STYLESHEET ]
        =========================================================================================================================-->
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/owl.theme.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/magnific-popup.css">
        <link rel ="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/library/vegas/vegas.min.css">
	<!-- [ Boot STYLESHEET ]
        =========================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/library/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/library/bootstrap/css/bootstrap.css">
        <!-- [ DEFAULT STYLESHEET ] 
        =========================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style1.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/responsive.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/color/rose.css">
        
</head>
<body >
<!-- [ LOADERs ]
================================================================================================================================-->	
    <div class="preloader">
    <div class="loader theme_background_color">
        <span></span>
      
    </div>
</div>
<!-- [ /PRELOADER ]
=============================================================================================================================-->
<!-- [WRAPPER ]
=============================================================================================================================-->
<div class="wrapper">
 
 
 <section class="main-heading" style=" margin-top: -3%;" id="home">
       <div class="overlay">
           <div class="container">
               <div class="row">
                  
                   <div class="row">
					<div class="col-md-3 col-sm-3"></div>
					  <div class="col-md-6 center-block col-sm-6 ">
						<?php echo form_open('Login_Controller/login');?>
                         <!-- Password & confrim password -->
						<p style="color: red;[-=">
                         <?php  if(isset($error)){echo $error;} ?></p>
                         <div class="row">
                           <div class="col-md-6">
                           	<div class="form-group">
                           		<label for="email">E-mail</label>
                           		<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                           	</div>
                           </div>
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pass">Password</label>
                                    <input type="password" name="password" class="form-control" id="pass" placeholder="Enter Password">
                                </div>
                            </div>
                            
                            <center> 
                            Do not have account already?
                            <a href="<?php echo base_url(); ?>Signup_Controller/index">Signup</a>
                            <br>Client: 
                            <input type="radio" name="role" value="client" checked>
                            <br>
                            Developer: 
                            <input type="radio" name="role" value="developer">
                            <br>
                            <button type="submit" class="btn btn-custom-outline"> Login </button></center>
                        </div>
						<?php echo form_close(); ?>
					  </div>
					</div> <!-- End of form -->
                  
               </div>
           </div>
       </div>  
      
   </section>
    
 <!-- [/MAIN-HEADING]
 
 
 
 
 <!-- [FOOTER]
 ============================================================================================================================-->
 

 
 
 <!-- [/FOOTER]
 ============================================================================================================================-->
 
 
 
</div>
 

<!-- [ /WRAPPER ]
=============================================================================================================================-->

	<!-- [ DEFAULT SCRIPT ] -->
	<script src="<?php echo base_url(); ?>assets/library/modernizr.custom.97074.js"></script>
	<script src="<?php echo base_url(); ?>assets/library/jquery-1.11.3.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/library/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.easing.1.3.js"></script>	
	<!-- [ PLUGIN SCRIPT ] -->
      	<script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
        <!-- [ TYPING SCRIPT ] -->
         <script src="<?php echo base_url(); ?>assets/js/typed.js"></script>
         <!-- [ COUNT SCRIPT ] -->
         <script src="<?php echo base_url(); ?>assets/js/fappear.js"></script>
       <script src="<?php echo base_url(); ?>assets/js/jquery.countTo.js"></script>
	<!-- [ SLIDER SCRIPT ] -->  
        <script src="<?php echo base_url(); ?>assets/js/owl.carousel.js"></script>
         <script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/SmoothScroll.js"></script>
        
        <!-- [ COMMON SCRIPT ] -->
          <script src="<?php echo base_url(); ?>assets/library/vegas/vegas.min.js"></script>
	<script src="<?php echo base_url(); ?>assets//js/common.js"></script>
  
</body>
<script type="text/javascript">
 $(document).ready(function()
 {
  fullscreenslider();
 }
 );
</script>

</html>