
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
                <li class="breadcrumb-item active">Class List</li>
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
                                <h6 class="text-left p-t-10 text-capitalize">Class List</h6>
                        </div>
                        <div class="col-md-7 align-self-center">
                                <button type="button" class="btn btn-outline-primary btnAdd" data-toggle="modal" data-target="#responsive-modal"><i class="fa fa-check-square-o"></i> Take Attendance</button>
                        </div>
                    </div>


                    <div class="table-responsive m-t-40">
                        
                        <table id="myTable" class="table table-bordered table-striped text-center table-hover text-uppercase attendanceTable">
                            <thead>
                                <tr class="table-bordered bg-dark text-white">
                                    <th>NO.</th>
                                    <th>Stud. ID</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>Photo</th>                                
                                    <th>Guardian</th>
                                    <th>Phone</th>
                                    <th>House Address</th>  
                                    <th>Class</th>
                                             
                                </tr>
                            </thead>


                        </table>                            

                    </div>

                    <!-- Take Attendance Modal Content -->
                    <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <form role="form" id="classform" method="POST">

                                <div class="modal-header bg-info">
                                    <h4 class="modal-title text-white" id="myModalLabel"> Take Class Attendance </h4>
                                    <button type="button " class="close close-danager white-i" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                

                                    <div class="modal-body">
                                    
                                       <div class="table-responsive m-t-40">

                                            <table id="myTable" class="table table-bordered table-striped text-center table-hover text-uppercase classAttendacneTable" width="100%">
                                                
                                                <thead>
                                                    
                                                    <tr class="table-bordered">
                                                    
                                                        <th style="width:10px">NO.#</th>
                                                        <th>Stud. ID</th>
                                                        <th>Name</th>
                                                        <th>Gender</th>
                                                        <th>Attendance</th>  

                                                    </tr> 

                                                </thead>

                                                 <tbody></tbody> 

                                            </table>

                                        </div>

                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="submit" class="btn btn-primary waves-effect">Save Attendance</button>
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    </div>


                                    <?php
                                    
                                        $attend = new ControllerAttendance();
                                        $attend ->ctrTakeAttendacne();
                                    
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

    <script>
        
        $("document").ready(function(){

            var churchid = '<?php echo $_SESSION["churchid"] ?>';
            var classid = '<?php echo $_SESSION["classid"] ?>';
            var teacherid = '<?php echo $_SESSION["teacherid"] ?>';
            var churchcode = '<?php echo $_SESSION["churchcode"] ?>';
            var studID = churchcode+'/CM/00';

            // console.log("churchid", churchid);
            // console.log("Class_id", classid);
            // console.log("Student_ID", studID); 

            var datas = new FormData();
            datas.append("Churchid", churchid);
            datas.append("Classid", classid);
            datas.append("Teacherid", teacherid);
            

                $.ajax({

                    url: "./ajax/class-attendance.ajax.php",
                    method: "POST",
                    data: datas,
                    Cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(result){

                        // console.log(result);


                        var html = '';
   
                        for(let count = 0; count < result.length; count++){

                            html += '<tr>';
                            html += '<td> '+(count+1)+' </td>';
                            html += '<td> '+studID+''+result[count].student_id +'</td>';
                            html += '<td> '+ result[count].student_firstname+' '+result[count].student_lastname +' </td>';
                            html += '<td> '+result[count].gender +' </td>';
                            html += '<td> <div class="switch"><label>Absent <input type="checkbox"  id="attend" name="attend[]"><span class="lever"></span>Present</label></div>  <input type="hidden" name="studentid[]" value="'+result[count].student_id +'"> <input type="hidden" name="teacherid" value="<?php echo $_SESSION["teacherid"] ?>"> <input type="hidden" name="churchid" value="<?php echo $_SESSION["churchid"] ?>"> <input type="hidden" name="classid" value="'+result[count].class_id +'"> </td>';
                        }

                        $(".classAttendacneTable tbody").html(html);

                        $($this).closest('tr').html(html);
                    }

                })
        

        });







    </script>