<script src="<?php echo base_url().'assets/js/validation.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.js'; ?>"></script>
    <script type="text/javascript">
        function checkDate(){
            return isValidDate(document.getElementById('project_deadline'));
        }
        function validation(){
            if(checkDate()){
                alert('Fine');
            }
            else{
                alert('Something went wrong');
            }
        }

    </script>



     <div class="container">
     <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>New Project </strong></h3>
                </div>
                <div class="panel-body">
                    <form class="form-control" action="<?php echo base_url('Project_Controller/insert_new_project');?>" method="post" role="form">
                        <div class="form-group">
                            <div class="row">
                                <label for="project_name" class="control-label col-md-5">Project Name: </label>
                                <input type="text" class="form-control col-md-7" id="project_name" name="project_name" placeholder="Project Name " required/>
                            </div>
                        </div>

                        <div class="form-group">
                        <div class="row">
                            <label for="client_email" class="control-label col-md-5">Client Email:</label>
                                <input type="email" class=" form-control col-md-7" id="client_email" name="client_email" placeholder="Client Name " required/>
                            </div>
                        </div>

                        <div class="form-group">
                        <div class="row">
                            <label for="project_budget" class="control-label col-md-5">Project Budget:</label>
                                <input type="number" class="form-control col-md-7" id="project_budget" name="project_budget" placeholder="Project Budget" number required/>
                            </div>
                        </div>

                        <div class="form-group">
                        <div class="row">
                            <label for="project_deadline" class="control-label col-md-5">Deadline: </label>
                            <input type="date" class="form-control date col-md-7" id="project_deadline" name="project_deadline" placeholder="1994-03-30" required>
                        </div>
                        <hr>
                        <div class="form-group last">
                            <div class="row">
                                <button type="submit" class="btn btn-success btn-sm col-md-3 col-md-offset-9"> Save Project </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>