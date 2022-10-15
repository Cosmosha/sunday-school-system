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
                    <h5 class="text-muted m-1 m-b-30 text-capitalize"><i class="ti-pin"></i> <?php echo $_SESSION["churchsociety"].' | '. $_SESSION["churchtown"];?></h5>
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
                                <?php $item =""; $value=""; $table = "student";  $student = ModelStudents::mdlShowStudentCountRow($table,$item,$value);?>
                                 <?php $percnt = ($student / $student) * 100; ?>
                                    <h2 class="m-b-0"><i class="mdi mdi-human-male-female text-info"></i></h2>
                                    <h3 class=""><?php  echo $student ?></h3>
                                    <h6 class="card-subtitle">Number of Students <span class="m-l-2 float-right font-weight-bold text-dark"> <?php echo number_format( (float)$percnt, 0,'.','');?>% </span></h6>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $percnt;?>%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
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
                                <?php $item ="gender"; $value="boy"; $table = "student";  $boys = ModelStudents::mdlShowStudentCountRow($table,$item,$value);?>
                                <?php $boyPercnt = ($boys / $student) * 100; ?>
                                    <h2 class="m-b-0"><i class="mdi mdi-human-male text-purple"></i></h2>
                                    <h3 class=""><?php echo $boys?></h3>
                                    <h6 class="card-subtitle">Number of Boys <span class="m-l-2 float-right font-weight-bold text-dark"> <?php echo number_format( (float)$boyPercnt, 0,'.','');?>% </span></h6></div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $boyPercnt?>%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
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
                                <?php $item ="gender"; $value="girl"; $table = "student";  $girls = ModelStudents::mdlShowStudentCountRow($table,$item,$value);?>
                                <?php $girlPercnt = ($girls / $student) * 100; ?>
                                    <h2 class="m-b-0"><i class="mdi mdi-human-female text-warning"></i></h2>
                                    <h3 class=""><?php echo $girls?></h3>
                                    <h6 class="card-subtitle">Number of Girls <span class="m-l-2 float-right font-weight-bold text-dark"> <?php echo number_format( (float)$girlPercnt, 0,'.','');?>% </span></h6></div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $girlPercnt?>%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
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
                                                <h4 class="card-title">Yearly Attendance Stats</h4>
                                            </div>
                                            <div class="ml-auto">
                                                <ul class="list-inline">

                                                    <li>
                                                        <h6 class=" text-info"><i class="fa fa-circle font-10 m-r-10"></i>Present</h6> 
                                                    </li>
                                                    <li>
                                                        <h6 class="text-danger"><i class="fa fa-circle font-10 m-r-10 "></i>Absent</h6> 
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div id="attendance" style="height: 355px;"></div>
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
                                        <h6 class="card-subtitle font-weight-bolder"><?php echo date('F Y')?></h6> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 align-self-center">
                                                <?php 
                                                
                                                    $table = "student_attendance";
                                                    $data = array('attendance_status' => 1, 
                                                                'currentmonth' => date("Ym"),
                                                                'church_id'=> $_SESSION["churchid"]);
                                                    
                                                    $result = ModelClassAttendance::mdlShowAttendanceMonthwise($table,$data);
                                                
                                                ?>

                                        <h2 class="font-light text-white"><sup><small><i class="ti-arrow-up"></i></small></sup> <?php echo $result?></h2>
                                    </div>
                                    <div class="col-6 p-t-10 p-b-20 text-right">
                                        <div class="spark-count" style="height:65px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-inverse card-danger">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="m-r-20 align-self-center">
                                        <h1 class="text-white"><i class="ti-bar-chart"></i></h1></div>
                                    <div>
                                        <h3 class="card-title">Student Absent</h3>
                                        <h6 class="card-subtitle font-weight-bolder"><?php echo date('F Y')?></h6> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 align-self-center">
                                    <?php 
                                                
                                                $table = "student_attendance";
                                                $data = array('attendance_status' => 0, 
                                                            'currentmonth' => date("Ym"),
                                                            'church_id'=> $_SESSION["churchid"]);
                                                
                                                $result = ModelClassAttendance::mdlShowAttendanceMonthwise($table, $data);
                                            
                                    ?>
                                    <h2 class="font-light text-white"><sup><small><i class="ti-arrow-down"></i></small></sup> <?php echo $result?> </h2>
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


                <!-- Yearly Attendance Stats  -->
                    <?php 
                    

                        $table = "student_attendance";
                        // $data = array('currentmonth' => date("Ym"),
                        // 'church_id'=> $_SESSION["churchid"]);
                        $data = array('church_id' => $_SESSION["churchid"]);

                        $answer = ModelClassAttendance::mdlShowAttendance($table, $data);

                        

                        foreach ($answer as $key => $value) {
                            # code...

                            $getYear [] = date("Y", strtotime($value["date_added"]));
                            //var_dump($getYear);
                            $result = [];

                            foreach(array_unique($getYear) as $uniqueValue)
                                $result[implode(",", array_keys($getYear, $uniqueValue))] = $uniqueValue;
                        
                            //print_r($result);
                        }

                        $chart_data = '';
                        
                        foreach ($result as $key => $value) {
                            # code...
                            $data = array('attendance_status' => "0", 
                            'getYear' => $value,
                            'church_id'=> $_SESSION["churchid"]);

                            //Absent Yearly
                            $absentSum = ModelClassAttendance::mdlShowAttendanceYearwise($table, $data);
                                // var_dump($ans);
                                // var_dump($value);
                            
                            //Present Yearly
                            $data1 = array('attendance_status' => "1", 
                            'getYear' => $value,
                            'church_id'=> $_SESSION["churchid"]);

                            $presentSum = ModelClassAttendance::mdlShowAttendanceYearwise($table, $data1);

                             
                            $chart_data.="{year: '".$value."', Present:".$presentSum.", Absent:".$absentSum.",}, "; 
                            $chart_dat = substr($chart_data, 0, -2);
                        }

                    ?>

                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                


                </div>


                <script>
                     Morris.Area({
                        element: 'attendance',
                            data: [
                                        <?php print_r($chart_dat); ?>,
                            ],
                            xkey: 'year',
                            ykeys: ['Present', 'Absent'],
                            labels: ['Present', 'Absent'],
                            pointSize: 3,
                            fillOpacity: 0,
                            pointStrokeColors: ['#1976d2', '#EE4B2B', '#1976d2'],
                            behaveLikeLine: true,
                            gridLineColor: '#e0e0e0',
                            lineWidth: 3,
                            hideHover: 'auto',
                            lineColors: ['#1976d2', '#EE4B2B', '#1976d2'],
                            resize: true

                        });
                </script>

                


            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->