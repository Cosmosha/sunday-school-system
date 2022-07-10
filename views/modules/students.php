
<!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Students</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                <li class="breadcrumb-item active">Students Details</li>
            </ol>
        </div>
        <!-- <div>
            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div> -->
    </div>


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
                                <h6 class="text-left p-t-10">Students Details</h6>
                        </div>
                        <div class="col-md-7 align-self-center">
                                <button type="button" class="btn btn-outline-primary btnAdd" data-toggle="modal" data-target="#responsive-modal"> <i class="fa fa-user-plus"></i> Add Student</button>
                        </div>
                    </div>
                    

                    <div class="table-responsive m-t-40">
                        
                        <table id="myTable" class="table table-bordered table-striped text-center table-hover text-uppercase studentTable">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>Stud. ID</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>Photo</th>
                                    <th>School</th> 
                                    <th>Guardian</th>
                                    <th>Phone</th>
                                    <th>House Address</th>  
                                    <th>Class</th>
                                    <th>Action</th>                                              
                                </tr>
                            </thead>

                        </table>                            

                    </div>

                    <!-- Add Student Modal Content -->
                    <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <form role="form" id="studentform" method="POST" enctype="multipart/form-data">

                                <div class="modal-header bg-info">
                                    <h4 class="modal-title text-white" id="myModalLabel"> Add Student Details </h4>
                                    <button type="button " class="close close-danager white-i" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                
                                    <div class="modal-body">
                                    
                                            <div class="row">

                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">First Name: <span class="text-danger">*</span></label>
                                                        <input type="text" onkeypress="validateInput(event)" class="form-control text-uppercase" name="student_fname" placeholder="first name" id="recipient-name" required>
                                                    </div>

                                                </div>

                                                    <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Surname: <span class="text-danger">*</span></label>
                                                        <input type="text" onkeypress="validateInput(event)"  class="form-control text-uppercase" name="student_lname" placeholder="Surname" id="recipient-name" required>
                                                    </div>

                                                    </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Gender: <span class="text-danger">*</span></label>
                                                            <select name="sgender" id="recipient-name" class="form-control sgender text-capitalize" id="sgender" required>
                                                                <option value="">Select Gender</option>
                                                                <option value="boy">Boy</option>
                                                                <option value="girl">Girl</option>         
                                                            </select>
                                                    </div>

                                                </div>

                                                    <div class="col-6">

                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Date Of Birth: <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" onkeypress="validateNum(event)" id="datepicker-autoclose" name="sdob" placeholder="mm/dd/yyyy" required>
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
                                                        <label for="recipient-name" class="control-label">Student Level: <span class="text-danger">*</span></label>
                                                        <select name="slevel" id="slevel" required="" class="form-control text-capitalize" required>
                                                            <option value="">Select Level</option>
                                                            <option value="Nurseryy">Nursery</option>
                                                            <option value="Primary">Primary</option>
                                                            <option value="Junior High">Junior High</option>
                                                            <option value="Senior High">Senior High</option>
                                                            <option value="Others">Others</option>                                                          
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="col-6">

                                                    <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Class/Form: <span class="text-danger">*</span></label>
                                                    <input type="number" onkeypress="validateNum(event)" class="form-control" name="sclass" placeholder="Enter Class Number" id="recipient-name" maxlength="3" required>
                                                    </div>

                                                </div>

                                            </div>


                                            
                                            <div class="row">

                                                <div class="col-6">
                                                            
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">School: <span class="text-danger">*</span></label>
                                                        <input type="text" onkeypress="validateInput(event)" class="form-control text-capitalize" name="school" placeholder="Name of School" id="recipient-name" required>
                                                    </div>

                                                </div>

                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">School Location (Region): <span class="text-danger">*</span></label>
                                                        
                                                        <select name="sregion" id="sregion" required="" class="form-control text-capitalize" required>
                                                            <!-- <option value= "" >Select Profile</option> -->
                                                            <?php  


                                                                $table = "region";
                                                                $item = null;
                                                                $value = null;

                                                                $region = ModelClassRoom::mdlShowInfo($table, $item, $value);

                                                                foreach ($region as $key => $value) {
                                                                    # code...
                                                                    echo '<option value="'.$value["region_id"].'">'.$value["region_name"].'</option>';
                                                                }
                                                            
                                                            ?>
                                                        </select>
                                                    </div>

                                                </div>

                                            </div>


                                            <div class="row">

                                                <div class="col-6">
                                                              
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Guardian: <span class="text-danger">*</span></label>
                                                        <input type="text" onkeypress="validateInput(event)" class="form-control text-capitalize" name="gname" placeholder="Guardian Name" id="recipient-name" required>
                                                    </div>

                                                </div>

                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Phone: <span class="text-danger">*</span></label>
                                                        <input type="tel" onkeypress="validateNum(event)" class="form-control" name="sphone" placeholder="Phone must be 10 digits" id="recipient-name" minlength="10"  maxlength="10" required>
                                                     </div>

                                                </div>

                                            </div>


                                            <div class="row">

                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Home Address: <span class="text-danger">*</span></label>
                                                        <input type="text" onkeypress="validateInput(event)" class="form-control text-capitalize" name="saddress" placeholder="Home Address" id="recipient-name" required>
                                                    </div>

                                                </div>

                                                    <div class="col-6">

                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Class Assign: <span class="text-danger">*</span></label>
                                                            
                                                            <select name="sclassname" id="sclassname" required="" class="form-control text-capitalize" required>
                                                            <option value= "" >Select Sunday School Class</option>
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
                                    
                                        $student = new ControllerStudents();
                                        $student->ctrAddStrudent();
                                    
                                    ?>

                                </form>
                                
                            </div>
                        </div>
                    </div>
                    <!-- /.modal -->



                    <!-- Edit Student Modal Content -->
                    <div id="editmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <form role="form" id="studentform" method="POST" enctype="multipart/form-data">

                                <div class="modal-header bg-info">
                                    <h4 class="modal-title text-white" id="myModalLabel"> Edit Student Details </h4>
                                    <button type="button " class="close close-danager white-i" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                
                                    <div class="modal-body">
                                    
                                            <div class="row">

                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">First Name: <span class="text-danger">*</span></label>
                                                        <input type="text" onkeypress="validateInput(event)" class="form-control text-uppercase" name="edit_fname" placeholder="first name" id="recipient-name" required>
                                                        <input type="hidden" name="idStudent" value="" id="idStudent" required>
                                                    </div>

                                                </div>

                                                    <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Surname: <span class="text-danger">*</span></label>
                                                        <input type="text" onkeypress="validateInput(event)"  class="form-control text-uppercase" name="edit_lname" id="edit_lname" placeholder="Surname" id="recipient-name" required>
                                                    </div>

                                                    </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Gender: <span class="text-danger">*</span></label>
                                                            <select name="edit_gender" id="recipient-name" class="form-control sgender text-capitalize" id="edit_gender" required>
                                                                <option value="">Select Gender</option>
                                                                <option value="boy">Boy</option>
                                                                <option value="girl">Girl</option>         
                                                            </select>
                                                    </div>

                                                </div>

                                                    <div class="col-6">

                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Date Of Birth: <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control editdob" onkeypress="validateNum(event)" id="datepicker" name="edit_dob" id="edit_dob" placeholder="mm/dd/yyyy" required>
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
                                                        <label for="recipient-name" class="control-label">Student Level: <span class="text-danger">*</span></label>
                                                        <select name="edit_level" id="edit_level" required="" class="form-control text-capitalize" required>
                                                            <option value="">Select Level</option>
                                                            <option value="Nurseryy">Nursery</option>
                                                            <option value="Primary">Primary</option>
                                                            <option value="Junior High">Junior High</option>
                                                            <option value="Senior High">Senior High</option>
                                                            <option value="Others">Others</option>                                                          
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="col-6">

                                                    <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Class/Form: <span class="text-danger">*</span></label>
                                                    <input type="number" onkeypress="validateNum(event)" class="form-control" name="edit_class" id="edit_class" placeholder="Enter Class Number" id="recipient-name" maxlength="3" required>
                                                    </div>

                                                </div>

                                            </div>


                                            
                                            <div class="row">

                                                <div class="col-6">
                                                            
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">School: <span class="text-danger">*</span></label>
                                                        <input type="text" onkeypress="validateInput(event)" class="form-control text-capitalize" id="edit_school" name="edit_school" placeholder="Name of School" id="recipient-name" required>
                                                    </div>

                                                </div>

                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">School Location (Region): <span class="text-danger">*</span></label>
                                                        
                                                        <select name="edit_region" id="edit_region" required="" class="form-control text-capitalize" required>
                                                            <!-- <option value= "" >Select Profile</option> -->
                                                            <?php  


                                                                $table = "region";
                                                                $item = null;
                                                                $value = null;

                                                                $region = ModelClassRoom::mdlShowInfo($table, $item, $value);

                                                                foreach ($region as $key => $value) {
                                                                    # code...
                                                                    echo '<option value="'.$value["region_id"].'">'.$value["region_name"].'</option>';
                                                                }
                                                            
                                                            ?>
                                                        </select>
                                                    </div>

                                                </div>

                                            </div>


                                            <div class="row">

                                                <div class="col-6">
                                                              
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Guardian: <span class="text-danger">*</span></label>
                                                        <input type="text" onkeypress="validateInput(event)" class="form-control text-capitalize" name="edit_gname" id="edit_gname" placeholder="Guardian Name" id="recipient-name" required>
                                                    </div>

                                                </div>

                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Phone: <span class="text-danger">*</span></label>
                                                        <input type="tel" onkeypress="validateNum(event)" class="form-control" name="edit_phone" id="edit_phone" placeholder="Phone must be 10 digits" id="recipient-name" minlength="10"  maxlength="10" required>
                                                     </div>

                                                </div>

                                            </div>


                                            <div class="row">

                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Home Address: <span class="text-danger">*</span></label>
                                                        <input type="text" onkeypress="validateInput(event)" class="form-control text-capitalize" name="edit_address" id="edit_address" placeholder="Home Address" id="recipient-name" required>
                                                    </div>

                                                </div>

                                                    <div class="col-6">

                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Class Assign: <span class="text-danger">*</span></label>
                                                            
                                                            <select name="edit_classname" id="edit_classname" required="" class="form-control text-capitalize" required>
                                                            <option value= "" >Select Sunday School Class</option>
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
                                        <button type="submit" class="btn btn-primary waves-effect ">Update Details</button>
                                        <button type="reset" class="btn btn-default waves-effect" id="reset" data-dismiss="modal">Close</button>
                                    </div>

                                    <?php
                                    
                                        $editstudent = new ControllerStudents();
                                        $editstudent->ctrEditStudent();
                                    
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