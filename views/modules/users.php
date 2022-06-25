
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
                                <tr >
                                    <th>NO.</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Status</th> 
                                    <th>Last Login</th>                                              
                                </tr>
                            </thead>

                        </table>                            

                    </div>

                    <!-- Add Classroom Modal Content -->
                    <!-- <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <form role="form" id="classform" method="POST">

                                <div class="modal-header bg-info">
                                    <h4 class="modal-title text-white" id="myModalLabel"> Create Class Room </h4>
                                    <button type="button " class="close close-danager white-i" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                

                                    <div class="modal-body">
                                    
                                            <div class="form-group">
                                                <label for="recipient-name" class="control-label">Class Name: <span class="text-danger">*</span></label>
                                                <input type="text" onkeypress="validateInput(event)"  class="form-control" name="class_name" id="recipient-name" required>
                                            </div>


                                            <div class="form-group">
                                                <label for="recipient-name" class="control-label">Room Capacity: <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="class_capacity" id="recipient-name" required>
                                            </div>
                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary waves-effect">Save Class</button>
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    </div>


                                    <?php
                                    
                                        $classroom = new ControllerClassRoom();
                                        $classroom -> ctrAddClass();
                                    
                                    ?>

                                </form>
                                
                            </div>
                        </div>
                    </div> -->
                    <!-- /.modal -->

                    <!-- Edit Classroom Modal Content -->
                    <!-- <div id="editmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <form role="form" id="classform" method="POST">

                                    <div class="modal-header bg-info">
                                        <h4 class="modal-title text-white" id="myModalLabel"> Edit Class Room </h4>
                                        <button type="button " class="close close-danager white-i" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                
                                    <div class="modal-body">
                                     
                                            <div class="form-group">
                                                <label for="recipient-name" class="control-label">Class Name: <span class="text-danger">*</span></label>
                                                <input type="text" onkeypress="validateInput(event)"  class="form-control editname" value="" id="editname" name="editname" id="recipient-name" required>
                                                <input type="hidden" name="idClass" value="" id="idClass" required>
                                            </div>


                                            <div class="form-group">
                                                <label for="recipient-name" class="control-label">Room Capacity: <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control editcapacity"  id="editcapacity" name="editcapacity" value="" id="recipient-name" required>
                                            </div>
                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary waves-effect">Update Info</button>
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    </div>

                                    <?php
                                    
                                        $editclass = new ControllerClassRoom();
                                        $editclass -> ctrEditCLass();
                                    
                                    ?>

                                </form>
                                
                            </div>
                        </div>
                    </div> -->
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
                                    
        $deleteClass = new ControllerClassRoom();
        $deleteClass -> ctrDeleteClass();
    
    ?>