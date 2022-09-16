
<!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Attendance</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                <li class="breadcrumb-item active">Attendance List</li>
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
                                <h6 class="text-left p-t-10 text-capitalize">Attendance List</h6>
                        </div>
                        <!-- <div class="col-md-7 align-self-center">
                                <button type="button" class="btn btn-outline-primary btnAdd" data-toggle="modal" data-target="#responsive-modal"><i class="fa fa-check-square-o"></i> Take Attendance</button>
                        </div> -->
                    </div>


                    <div class="table-responsive m-t-40">
                        
                        <table id="myTable" class="table table-bordered table-striped text-center table-hover text-uppercase classAttendanceList">
                            <thead>
                                <tr class="table-bordered bg-dark text-white">
                                    <th>NO.</th>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Attendance</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>                            

                    </div>

                    

                </div>
            </div>
        </div>
        
        <!-- ============================================================== -->
        <!-- End PAge Content -->

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
