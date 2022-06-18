            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles m-b-0">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- Row -->
            <div class="row page-titles" style="background:url(assets/images/background/userbg.jpg) no-repeat center top">
                <div class="col-lg-12 text-center">
                    <h1 class="m-t-30 p-l-50"><?php echo ucwords($_SESSION["churchname"])?></h1>
                    <h1 class="text-muted m-t-30 p-l-50 m-3 text-capitalize"> Children's Ministry</h1>
                    <h5 class="text-muted m-1 m-b-30 text-capitalize"><i class="ti-pin"></i> Anaji estate Circuit | Takoradi</h5>
                </div>
            </div>
            <!-- Row -->
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
               
                <!-- Row -->
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="m-b-0"><i class="mdi mdi-human-male-female text-info"></i></h2>
                                    <h3 class="">2456</h3>
                                    <h6 class="card-subtitle">Number of Students</h6></div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="m-b-0"><i class="mdi mdi-human-male text-purple"></i></h2>
                                    <h3 class="">245</h3>
                                    <h6 class="card-subtitle">Number of Boys</h6></div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 56%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="m-b-0"><i class="mdi mdi-human-female text-warning"></i></h2>
                                    <h3 class="">580</h3>
                                    <h6 class="card-subtitle">Number of Girls</h6></div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 76%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                    
                
                <!-- Row -->
                <div class="row">
                        <!-- Column -->
                        <div class="col-lg-8 col-xlg-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex flex-wrap">
                                                <div>
                                                    <h4 class="card-title">Yearly Attendance</h4>
                                                </div>
                                                <div class="ml-auto">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <h6 class="text-muted text-success"><i class="fa fa-circle font-10 m-r-10 "></i>Absent</h6> </li>
                                                        <li>
                                                            <h6 class="text-muted  text-info"><i class="fa fa-circle font-10 m-r-10"></i>Present</h6> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div id="earning" style="height: 355px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-lg-4 col-xlg-3">
                            <div class="card card-inverse card-info">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="m-r-20 align-self-center">
                                            <h1 class="text-white"><i class="ti-bar-chart-alt"></i></h1></div>
                                        <div>
                                            <h3 class="card-title">Student Present</h3>
                                            <h6 class="card-subtitle">March  2022</h6> </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 align-self-center">
                                            <h2 class="font-light text-white"><sup><small><i class="ti-arrow-up"></i></small></sup> 35487</h2>
                                        </div>
                                        <div class="col-6 p-t-10 p-b-20 text-right">
                                            <div class="spark-count" style="height:65px"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-inverse card-success">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="m-r-20 align-self-center">
                                            <h1 class="text-white"><i class="ti-bar-chart"></i></h1></div>
                                        <div>
                                            <h3 class="card-title">Student Absent</h3>
                                            <h6 class="card-subtitle">March  2022</h6> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 align-self-center">
                                        <h2 class="font-light text-white"><sup><small><i class="ti-arrow-down"></i></small></sup> 35487</h2>
                                        </div>
                                        <div class="col-6 p-t-10 p-b-20 text-right align-self-center">
                                            <div class="spark-count" style="height:65px"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>
                    <!-- Row -->


                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                


                </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->