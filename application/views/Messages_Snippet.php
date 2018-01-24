  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/messages.css'; ?>">
<div class="panel panel-success">
        <?php if(isset($results)){
                foreach ($results as $row) {?>
                    
                  <div class="panel-heading"> </div>
                  <div class="panel-body">
                  <span style="color:#15937D"><?php echo $row['sender']; ?></span>
                    <p class="lead"><?php echo $row['message']; ?></p>
                    <span class="pull-right"><?php echo $row['time']; ?></span>
                  </div>

            <?php 
            } }  ?>
       </div><!--chat_area-->