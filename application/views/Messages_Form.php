
<html>
<body>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style.css'; ?>">
<script type="text/javascript">
  var c;
</script>
<div class="main_section">
   <div class="container-fluid">
      <div class="chat_container">
        <div class="col-sm-3 chat_sidebar">
          <div class="row">
            <div id="custom-search-input">
               <div class="input-group col-md-12">
                  <input type="text" class="  search-query form-control" placeholder="Conversation" />
                  <button class="btn btn-danger" type="button">
                  <span class=" glyphicon glyphicon-search"></span>
                  </button>
               </div>
            </div>
            <div class="dropdown all_conversation">
               <button class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fa fa-weixin" aria-hidden="true"></i>
               All Conversations
               <span class="caret pull-right"></span>
               </button>
            </div>
            <div class="member_list">
               <ul class="list-unstyled">
               <!-- There will be a loop to retrive the conversations -->
               <?php 
               if(isset($conversation)){
               foreach ($conversation as $row) {
                   # code...
                ?>
                  <li class="left clearfix" onclick="addClick(<?php echo $row['conversation_id']; ?>)">
                     <span class="chat-img pull-left">
                     <img src="" alt="" class="img-circle">
                     </span>
                     <div class="chat-body clearfix">
                        <div class="contact_sec">
                           <strong class="primary-font">
                           <?php 
                          if($this->session->userdata('role')=='admin'){
                            echo $row['developer_email'].' & '.$row['client_email'];
                          }
                          else{

                                 if($this->session->userdata('email')==$row['developer_email']){
                                  echo $row['client_email'];
                                 }
                                 else{
                                  echo $row['developer_email'];
                                 }

                          }

                          ?>
                            </strong> <span class="badge pull-right"></span>
                        </div>
                     </div>
                  </li>
                 <?php } } ?>
               </ul>
            </div>
          </div>
        </div>
         <!--chat_sidebar-->
       
         <div class="col-sm-9 message_section">
       <div class="row">
<!--new_message_head-->
       <div class="show_messages"></div>

       <?php if($this->session->userdata('role')!='admin'){ ?>
        <div class="message_write">
        <form id="msg_form">
          <textarea class="form-control" placeholder="type a message" id="message_area"></textarea>
          <button type="reset" class="pull-right btn btn-success" id="send_message">Send</button>
        </form>
        </div>
       <?php } ?>
       </div>
       </div>
         </div> <!--message_section-->
      </div>
   </div>
    <footer>
            <div class="row">
                <div class="col-lg-12">
                    <center><ul class="list-unstyled list-inline">
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Google+</a></li>
                    </ul></center>
                    <center><p>Copyrights @ Developers.com</p></center>
                </div>  
            </div>
        </footer>   
        <!--=======================-->
</div>
<script src="<?php echo base_url().'assets/js/script.js'; ?>"></script>
<script type="text/javascript">
function addClick(conversation_id){

    c=conversation_id;
        $.ajax({
                url: '<?php echo base_url(); ?>Messages_Controller/index',
                type: 'POST',
                dataType: 'html',
                data: {conversation_id: conversation_id},
            })
            .done(function(res) {
                $('.show_messages').html(res);
            })
            .fail(function() {
                console.log("error");
            });

}
</script>
<script type="text/javascript">
  setInterval(checkupdates,1000);
  function checkupdates(){
    if("undefined" !== typeof c){
            $.ajax({
                url: '<?php echo base_url(); ?>Admin_Controller/get_messages',
                type: 'POST',
                dataType: 'html',
                data: {conversation_id: c},
            })
            .done(function(res) {
                $('.show_messages').html(res);
            })
            .fail(function() {
                console.log("error");
            });
          }
  }

</script>
<!--jquery ajax function to send message -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#send_message').click(function(){
            var msg=$('#message_area').val();
            $.ajax({
                async: true, 
                url: '<?php echo base_url(); ?>Messages_Controller/send_message',
                type: 'POST',
                dataType: 'html',
                data: {con: c,
                    msg:msg},
            })
            .done(function(res) {
            })
            .fail(function() {
                console.log("error");
            });
            
        });
    });
</script>
</body>
</html>