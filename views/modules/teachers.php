
<!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Teachers</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                <li class="breadcrumb-item active">Teachers Details</li>
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
                                <h6 class="text-left p-t-10 text-capitalize">Teachers details</h6>
                        </div>
                        <div class="col-md-7 align-self-center">
                                <button type="button" class="btn btn-outline-primary btnAdd" data-toggle="modal" data-target="#responsive-modal"> <i class="fa fa-user-plus"></i> Add Teacher</button>
                        </div>
                    </div>
                    

                    <div class="table-responsive m-t-40">
                        
                        <table id="myTable" class="table table-bordered table-striped text-center table-hover text-uppercase teacherTable">
                            <thead>
                                <tr class="table-bordered bg-dark text-white">
                                    <th>NO.</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Profile</th>
                                    <th>Photo</th>
                                    <th>Occupation</th>
                                    <th>Phone</th>
                                    <th>Class</th> 
                                    <th>Status</th> 
                                    <th>Action</th>                                              
                                </tr>
                            </thead>

                        </table>                            

                    </div>

                    <!-- Add Teacher Modal Content -->
                    <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form role="form" id="classform" method="POST" enctype="multipart/form-data">

                                <div class="modal-header bg-info">
                                    <h4 class="modal-title text-white" id="myModalLabel"> Add Teacher Details </h4>
                                    <button type="button " class="close close-danager white-i" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                
                                    <div class="modal-body">
                                    
                                            <div class="row">

                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">First Name: <span class="text-danger">*</span></label>
                                                        <input type="text" onkeypress="validateInput(event)" class="form-control text-uppercase" name="fname" placeholder="first name" id="recipient-name" required>
                                                    </div>

                                                </div>

                                                    <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Surname: <span class="text-danger">*</span></label>
                                                        <input type="text" onkeypress="validateInput(event)"  class="form-control text-uppercase" name="lname" placeholder="Surname" id="recipient-name" required>
                                                    </div>

                                                    </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Gender: <span class="text-danger">*</span></label>
                                                            <select name="tgender" id="recipient-name" class="form-control tgender text-capitalize" id="tgender" required>
                                                                <option value="">Select Gender</option>
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>         
                                                            </select>
                                                    </div>

                                                </div>

                                                    <div class="col-6">

                                                        <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Email: <span class="text-danger">*</span></label>
                                                        <input type="email" onkeypress="validateEntry(event)" class="form-control text-lowercase" name="temail" placeholder="example@gmail.com" id="recipient-name" required>
                                                        </div>

                                                    </div>

                                            </div>


                                            <div class="row">

                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Occupation: <span class="text-danger">*</span></label>
                                                        <select name="toccupation" id="toccupation" required="" class="form-control text-capitalize" required>
                                                            <option value="">Select Profession</option>
                                                            <option value="Teacher">Teacher</option>
                                                            <option value="Lawyer">Lawyer</option>
                                                            <option value="Nurse">Nurse</option>
                                                            <option value="System Administrator">System Administrator</option>
                                                            <option value="Computer Programmer">Computer Programmer</option>
                                                            <option value="Banker">Banker</option>
                                                            <option value="Accountant">Accountant</option>
                                                            
                                                        </select>
                                                    </div>

                                                </div>

                                                    <div class="col-6">

                                                        <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Phone: <span class="text-danger">*</span></label>
                                                        <input type="tel" onkeypress="validateNum(event)" class="form-control" name="tphone" placeholder="Phone must be 10 digits" id="recipient-name" minlength="10"  maxlength="10" required>
                                                        </div>

                                                    </div>

                                            </div>



                                            <div class="row">

                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Class Assign: <span class="text-danger">*</span></label>
                                                        
                                                        <select name="tclassname" id="tclassname" required="" class="form-control text-capitalize" required>
                                                         <option value= "" >Select Class</option>
                                                        <?php  

                                                            $item = null;
                                                            $value = null;
                                                        
                                                            $class = ControllerClassRoom::ctrShowClassList($item, $value);

                                                            foreach ($class as $key => $value) {
                                                                # code...
                                                                echo '<option value="'.$value["class_id"].'">'.$value["class_name"].'</option>';
                                                            }
                                                        
                                                        ?>
                                                        </select>
                                                    </div>

                                                </div>

                                                    <div class="col-6">

                                                        <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Date Of Join: <span class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" onkeypress="validateNum(event)" id="datepicker-autoclose" name="tdoj" placeholder="mm/dd/yyyy" required>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="icon-calender"></i></span>
                                                            </div>
                                                        </div>
                                                        </div> 

                                                    </div>

                                            </div>

                                            
                                            <div class="row">

                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Profile Status: <span class="text-danger">*</span></label>
                                                        
                                                        <select name="tprofile" id="tprofile" required="" class="form-control text-capitalize" required>
                                                         <option value= "" >Select Profile</option>
                                                            <?php  


                                                                $table = "profile";
                                                                $item = null;
                                                                $value = null;

                                                                $profile = ModelClassRoom::mdlShowInfo($table, $item, $value);

                                                                foreach ($profile as $key => $value) {
                                                                    # code...
                                                                    echo '<option value="'.$value["profile_id"].'">'.$value["profile_name"].'</option>';
                                                                }
                                                            
                                                            ?>
                                                        </select>
                                                    </div>

                                                </div>

                                                    <div class="col-6">

                                                        <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Status: <span class="text-danger">*</span></label>
                                                        <select name="tstatus" id="tstatus" required="" class="form-control text-capitalize" required>
                                                         <option value= "" >Select availability status</option>
                                                            <?php  
                                                           
                                                                $table = "availability";
                                                                $item = null;
                                                                $value = null;

                                                                $status = ModelClassRoom::mdlShowInfo($table, $item, $value);

                                                                foreach ($status as $key => $value) {
                                                                    # code...
                                                                    echo '<option value="'.$value["status_id"].'">'.$value["status_name"].'</option>';
                                                                }
                                                                                                                            
                                                            ?>
                                                        </select>
                                                        </div> 

                                                    </div>

                                            </div>



                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">

                                                        <img src="views/img/teachers/default/default.png" alt="" class="img-thumbnail preview m-b-10" width="130px">
                                                        
                                                        <input type="file" name="newPhoto" id="newPics" class="newPics form-control"> 
                                                    
                                                        <label class="control-label">Upload Photo  <span class="text-danger">*</span> <small>Photo size should be less than 2 MB</small> </label>

                                                    </div>
                                                </div>
                                            </div>

                                            

                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary waves-effect ">Save Details</button>
                                        <button type="reset" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    </div>

                                    <?php
                                    
                                        $teacher = new ControllerTeacher();
                                        $teacher -> ctrAddTeacher();
                                    
                                    ?>

                                </form>
                                
                            </div>
                        </div>
                    </div>
                    <!-- /.modal -->

                    <!-- Edit Classroom Modal Content -->
                    <div id="editmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form role="form" id="editTeachForm" method="POST" enctype="multipart/form-data">

                                    <div class="modal-header bg-info">
                                        <h4 class="modal-title text-white" id="myModalLabel"> Edit Teacher Details </h4>
                                        <button type="button " class="close close-danager white-i" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                
                                    <div class="modal-body">
                                    
                                            <div class="row">

                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">First Name: <span class="text-danger">*</span></label>
                                                        <input type="text" onkeypress="validateInput(event)" class="form-control text-uppercase" name="editfname" id="editfname" placeholder="first name" id="recipient-name" required>
                                                        <input type="hidden" name="idTeacher" value="" id="idTeacher" required>
                                                    </div>

                                                </div>

                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Surname: <span class="text-danger">*</span></label>
                                                        <input type="text" onkeypress="validateInput(event)"  class="form-control text-uppercase" name="editlname" id="editlname" placeholder="Surname" id="recipient-name" required>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Gender: <span class="text-danger">*</span></label>
                                                            <select name="editgender" id="editgender" required="" class="form-control tgender text-capitalize" required>
                                                                <option value="">Select Gender</option>
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>         
                                                            </select>
                                                    </div>

                                                </div>

                                                    <div class="col-6">

                                                        <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Email: <span class="text-danger">*</span></label>
                                                        <input type="email" onkeypress="validateEntry(event)" class="form-control text-lowercase" name="editemail" id="editemail" placeholder="example@gmail.com" id="recipient-name" required>
                                                        </div>

                                                    </div>

                                            </div>


                                            <div class="row">

                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Occupation: <span class="text-danger">*</span></label>
                                                        <select name="editoccupation" id="editoccupation" required="" class="form-control text-capitalize" required>
                                                            <option value="">Select Profession</option>
                                                            <option value="Teacher">Teacher</option>
                                                            <option value="Lawyer">Lawyer</option>
                                                            <option value="Nurse">Nurse</option>
                                                            <option value="System Administrator">System Administrator</option>
                                                            <option value="Computer Programmer">Computer Programmer</option>
                                                            <option value="Banker">Banker</option>
                                                            <option value="Accountant">Accountant</option>
                                                            
                                                        </select>
                                                    </div>

                                                </div>

                                                    <div class="col-6">

                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Phone: <span class="text-danger">*</span></label>
                                                            <input type="tel" onkeypress="validateNum(event)" class="form-control" name="editphone" id="editphone" placeholder="Phone must be 10 digits" id="recipient-name" minlength="10"  maxlength="10" required>
                                                        </div>

                                                    </div>

                                            </div>



                                            <div class="row">

                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Class Assign: <span class="text-danger">*</span></label>
                                                        <select name="editclassroom" id="editclassroom" class="form-control text-capitalize" required>
                                                            <option value="">Select Class</option>
                                                            <?php  

                                                                $item = null;
                                                                $value = null;

                                                                $class = ControllerClassRoom::ctrShowClassList($item, $value);

                                                                foreach ($class as $key => $value) {
                                                                    # code...
                                                                    echo '<option value="'.$value["class_id"].'">'.$value["class_name"].'</option>';
                                                                }

                                                            ?>
                                                            
                                                        </select>
                                                    </div>

                                                </div>

                                                    <div class="col-6">

                                                        <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Date Of Join: <span class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control editdoj" onkeypress="validateNum(event)" id="datepicker" name="editdoj" placeholder="mm/dd/yyyy" required>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="icon-calender"></i></span>
                                                            </div>
                                                        </div>
                                                        </div> 

                                                    </div>

                                            </div>



                                            <div class="row">

                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Profile: <span class="text-danger">*</span></label>
                                                        
                                                        <select name="editprofile" id="editprofile" required="" class="form-control text-capitalize" required>
                                                         <option value= "" >Select Profile</option>
                                                            <?php  


                                                                $table = "profile";
                                                                $item = null;
                                                                $value = null;

                                                                $profile = ModelUsers::MdlShowUsers($table, $item, $value);

                                                                foreach ($profile as $key => $value) {
                                                                    # code...
                                                                    echo '<option value="'.$value["profile_id"].'">'.$value["profile_name"].'</option>';
                                                                }
                                                            
                                                            ?>
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="col-6">

                                                    <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Status: <span class="text-danger">*</span></label>
                                                    <select name="editstatus" id="editstatus" required="" class="form-control text-capitalize" required>
                                                        <option value= "" >Select availability Status</option>
                                                        <?php  

                                                            $table = "availability";
                                                            $item = null;
                                                            $value = null;

                                                            $profile = ModelUsers::MdlShowUsers($table, $item, $value);

                                                            foreach ($profile as $key => $value) {
                                                                # code...
                                                                echo '<option value="'.$value["status_id"].'">'.$value["status_name"].'</option>';
                                                            }
                                                                                                                        
                                                        ?>
                                                    </select>
                                                    </div> 

                                                </div>

                                            </div>



                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">

                                                        <img src="views/img/teachers/default/default.png" alt="" class="img-thumbnail preview m-b-10" width="130px">
                                                        
                                                        <input type="file" name="editPhoto" id="newPics" class="newPics form-control"> 
                                                    
                                                        <label class="control-label">Upload Photo  <span class="text-danger">*</span> <small>Photo size should be less than 2 MB</small> </label>

                                                        <input type="hidden" name="currentPic" id="currentPic">

                                                    </div>
                                                </div>
                                            </div>

                                            

                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary waves-effect ">Update Details</button>
                                        <button type="reset" class="btn btn-default waves-effect" id="reset" data-dismiss="modal">Close</button>
                                    </div>

                                    <?php
                                    
                                        $editTeacher = new ControllerTeacher();
                                        $editTeacher -> ctrEditTeacher();
                                    
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
        
        $deleteTeacher = new ControllerTeacher();
        $deleteTeacher -> ctrDeleteTeacher();
    
    ?>