<?php
        if($this->session->userdata('name')!=null){
   ?>

<html>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/header.css'; ?>">
<body>
<div class="container-fluid">
	
  <nav class="navbar navbar-default nav-menu">
    <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".button-menu">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#"> LOGO </a>
	</div>
	<div class="collapse navbar-collapse button-menu">
		<ul class="nav navbar-nav ">
            <li><a href="#" class="glyphicon glyphicon-user icon-size">  Profile  </a></li>
            <li><a href="#"  class="glyphicon glyphicon-envelope" id="message">  Messages </a></li>
		</ul>
        <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-tasks"></span> 
                        <strong>  Orders  </strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                       </a>
                    <ul class="dropdown-menu">
                        <li>
                        <?php if($this->session->userdata('role')=='client') { ?>
                            <button href="#" class="btn btn-block" style="background-color: #3285D1;color: #FFFFFF" id="place_order_client" onclick="">
                        <span class="glyphicon glyphicon-send "></span>  Place Order </button>
                        <?php }
                        else{ ?>
                         <button href="#" class="btn btn-block" style="background-color: #3285D1;color: #FFFFFF" id="new_project" onclick="">
                        <span class="glyphicon glyphicon-send "></span>  New Project </button>
                        <?php } ?>
                            <button href="#" class="btn btn-block" style="background-color: #3285D1;color: #FFFFFF" id="recent_order">
                        <span class="glyphicon glyphicon-list-alt"></span>  Recent Orders </button>
                        </li>
                    </ul>
                </li>
            </ul>
        <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> 
                        <strong><?php echo $this->session->userdata('name'); ?></strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <span class="glyphicon glyphicon-user icon-size"></span>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-left"><strong><?php echo $this->session->userdata('name'); ?></strong></p>
                                        <p class="text-left small"><?php echo $this->session->userdata('email'); ?></p>
                                        <p class="text-left">
                                            <a href="<?php echo base_url().'Login_Controller/logout'; ?>" class="btn btn-primary btn-block btn-sm">Logout</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
             
	</div>

  </nav>
</div>
<div class="message_result"></div>

<script src="<?php echo base_url().'assets/js/jquery.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.js'; ?>"></script>
<script type="text/javascript">
    function place_order_function(){
         $.ajax({
                url: '<?php echo base_url(); ?>Project_Controller/index',
                type: 'POST',
                dataType: 'html',
            })
            .done(function(res) {
                $('.message_result').html(res);
            })
            .fail(function() {
                console.log("error");
            });
    }
</script>
<script type="text/javascript">
    function place_order_function(){
         $.ajax({
                url: '<?php echo base_url(); ?>Project_Controller/index',
                type: 'POST',
                dataType: 'html',
            })
            .done(function(res) {
                $('.message_result').html(res);
            })
            .fail(function() {
                console.log("error");
            });
    }
</script>
<script type="text/javascript">
//------------------------------------------------------------------------------------------
    $(document).ready(function(){
        $('#message').click(function(){
            $.ajax({
                url: '<?php echo base_url(); ?>Messages_Controller/get_conversation_controller',
                type: 'POST',
                dataType: 'html',
                data: {param1: 'value1'},
            })
            .done(function(res) {
                $('.message_result').html(res);
            })
            .fail(function() {
                console.log("error");
            });
            
        });
//------------------------------------------------------------------------------------------
        $('#place_order_client').click(function(){
            $.ajax({
                url: '<?php echo base_url(); ?>Project_Controller/index',
                type: 'POST',
                dataType: 'html',
            })
            .done(function(res) {
                $('.message_result').html(res);
            })
            .fail(function() {
                console.log("error");
            });
        });
//------------------------------------------------------------------------------------------
 $('#new_project').click(function(){
            $.ajax({
                url: '<?php echo base_url(); ?>Project_Controller/new_project',
                type: 'POST',
                dataType: 'html',
            })
            .done(function(res) {
                $('.message_result').html(res);
            })
            .fail(function() {
                console.log("error");
            });
        });
//------------------------------------------------------------------------------------------
        $('#recent_order').click(function(){
                $.ajax({
                url: '<?php echo base_url(); ?>Project_Controller/recent_projects_developer_client',
                type: 'POST',
                dataType: 'html',
            })
            .done(function(res) {
                $('.message_result').html(res);
            })
            .fail(function() {
                console.log("error");
            });
        });
//------------------------------------------------------------------------------------------
    });
</script>
</body>
</html>
<?php } ?>


