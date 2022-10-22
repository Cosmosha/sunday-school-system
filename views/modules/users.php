
<!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Utilities</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                <li class="breadcrumb-item active">System Users</li>
            </ol>
        </div>
        <!-- <div>
            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div> -->
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    
    

    
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                                    
                <!-- Column -->
                <div class="card">
                    <div class="card-body">
                    
                    <div class="row form-group text-right">
                        <div class="col-md-5 align-self-center">
                                <h6 class="text-left p-t-10 text-capitalize">System users</h6>
                        </div>
                        <div class="col-md-7 align-self-center">
                                <button type="button" class="btn btn-outline-primary btnAdd" data-toggle="modal" data-target="#responsive-modal"><i class="fa fa-plus"></i> Add User</button>
                        </div>
                    </div>
                    

                    <div class="table-responsive m-t-40">
                        
                        <table id="myTable" class="table table-bordered table-striped text-center table-hover text-uppercase userTable">
                            <thead>
                                <tr class="table-bordered bg-dark text-white">
                                    <th>NO.</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Status</th> 
                                    <th>Last Login</th> 
                                    <th>Action</th>                                             
                                </tr>
                            </thead>

                        </table>                            

                    </div>

                    <!-- Add User Modal Content -->
                    <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form role="form" id="classform" method="POST">

                                <div class="modal-header bg-info">
                                    <h4 class="modal-title text-white" id="myModalLabel"> Add User Account </h4>
                                    <button type="button " class="close close-danager white-i" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                

                                    <div class="modal-body">
                                    

                                        <div class="row">

                                            <div class="col-6">

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Name: <span class="text-danger">*</span></label>
                                                        <select name="username" id="username" required="" class="form-control username text-capitalize" required>
                                                            <option value="">Select From List</option>

                                                            <?php 
                                                            
                                                                $table = "teacher";
                                                                $item = "";
                                                                $value = "";

                                                                $teacher = ModelTeachers::mdlShowTeacher($table, $item, $value);

                                                                foreach ($teacher as $key => $user) {
                                                                    # code...
                                                                    echo '<option value="'.$user["teacher_id"].'">'.$user["teacher_firstname"].' '.$user["teacher_lastname"].'</option>';
                                                                }
                                                            
                        
                                                            ?>    
                                                        </select>
                                                </div>

                                            </div>

                                            <div class="col-6">

                                                <div class="form-group">
                                                     <label for="recipient-name" class="control-label">Email: <span class="text-danger">*</span></label>
                                                      <input type="email" onkeypress="validateEntry(event)" class="form-control user_email text-lowercase" name="user_email" id="user_email" placeholder="example@gmail.com" value="" id="recipient-name" readonly>
                                                </div>

                                            </div>

                                        </div>   
                                        
                                        
                                        <div class="row">

                                            <div class="col-6">

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Password: <span class="text-danger">*</span></label>
                                                    
                                                    <div class="controls">
                                                        <input type="password" onkeypress="validateEntry(event)" name="password" class="form-control" required data-validation-required-message="This field is required" minlength="5">
                                                    </div>
                                                    
                                                </div>

                                            </div>

                                            <div class="col-6">

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Confirm Password: <span class="text-danger">*</span></label>
                                                    
                                                    <div class="controls">
                                                         <input type="password" name="password2" data-validation-match-match="password" class="form-control" onkeypress="validateEntry(event)" minlength="5" required>
                                                    </div>
                                                   
                                                </div>

                                            </div>

                                        </div> 
                                        
                                        
                                        <div class="row">

                                            <div class="col-6">

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Permission Role: <span class="text-danger">*</span></label>
                                                        <select name="permission" id="permission" required="" class="form-control permission text-capitalize" required>
                                                            <option value="">Select Permission </option>
                                                            
                                                            <?php  
                                                            
                                                                $table = "permission";
                                                                $item = "";
                                                                $value = "";

                                                                $permission = ModelClassRoom::mdlShowInfo($table, $item, $value);
                                                                foreach ($permission as $key => $role) {
                                                                    # code...

                                                                    echo'<option value="'.$role["permission_id"].'">'.$role["permission_role"].'</option>';

                                                                }
                                                            
                                                            ?>      
                                                        </select>
                                                </div>

                                            </div>

                                            <div class="col-6">

                                            </div>

                                        </div>  
                                    
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary waves-effect">Save User</button>
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    </div>


                                    <?php 
                                    
                                        $users = new ControllerUsers();
                                        $users ->ctrAddUser(); 
                                    
                                    ?>

                                </form>
                                
                            </div>
                        </div>
                    </div>
                    <!-- /.modal -->


                    <!-- Edit User Modal Content -->
                    <div id="editmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;"> -->
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form role="form" id="edituserform" method="POST">

                                    <div class="modal-header bg-info">
                                        <h4 class="modal-title text-white" id="myModalLabel"> Edit User Account </h4>
                                        <button type="button " class="close close-danager white-i" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                
                                    <div class="modal-body">                                  
                                        <div class="row">
                                            <div class="col-6">

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Name: <span class="text-danger">*</span></label>
                                      
                                                        <input type="text" onkeypress="validateEntry(event)" class="form-control editusername text-lowercase" name="editusername" id="editusername" placeholder="full name" value="" id="recipient-name" readonly>
                                                </div>

                                            </div>

                                            <div class="col-6">

                                                <div class="form-group">
                                                     <label for="recipient-name" class="control-label">Email: <span class="text-danger">*</span></label>
                                                      <input type="email" onkeypress="validateEntry(event)" class="form-control user_email text-lowercase" name="edituser_email" id="edituser_email" placeholder="example@gmail.com" value="" id="recipient-name" readonly>
                                                </div>

                                            </div>

                                        </div>   
                                        
                                        
                                        <div class="row">

                                            <div class="col-6">

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Password: </label>
                                                    
                                                    <div class="controls">
                                                        <input type="password" onkeypress="validateEntry(event)" name="password" id="editpassword" class="form-control" minlength="5">
                                                        <input type="hidden" name="currentPassword" id="currentPassword">
                                                    </div>
                                                    
                                                </div>

                                            </div>

                                            <div class="col-6">

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Confirm Password: </label>
                                                    
                                                    <div class="controls">
                                                         <input type="password" name="password2" data-validation-match-match="password" id="editconfirmPass" class="form-control" onkeypress="validateEntry(event)" minlength="5" >
                                                    </div>
                                                   
                                                </div>

                                            </div>

                                        </div> 
                                        
                                        
                                        <div class="row">

                                            <div class="col-6">

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Permission Role: <span class="text-danger">*</span></label>
                                                        <select name="editpermission" id="editpermission" required="" class="form-control permission text-capitalize" required>
                                                            <option value="">Select Permission </option>
                                                            
                                                            <?php  
                                                            
                                                                $table = "permission";
                                                                $item = "";
                                                                $value = "";

                                                                $permission = ModelClassRoom::mdlShowInfo($table, $item, $value);
                                                                foreach ($permission as $key => $role) {
                                                                    # code...

                                                                    echo'<option value="'.$role["permission_id"].'">'.$role["permission_role"].'</option>';

                                                                }
                                                            
                                                            ?>      
                                                        </select>
                                                </div>

                                            </div>

                                            <div class="col-6">

                                            </div>

                                        </div>  
                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary waves-effect">Update Info</button>
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    </div>

                                    <?php  
                                    
                                        $updateUser = new ControllerUsers();
                                        $updateUser -> ctrUpdateUser();
                                    
                                    ?>

                                </form>
                                
                            </div>
                        </div>
                    </div>

                    <!-- /.modal -->


                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    
    <?php
                                    
        $deleteUser = new ControllerUsers();
        $deleteUser ->ctrDeleteUser();
    
    ?>