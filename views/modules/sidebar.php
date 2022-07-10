       
       
       <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar ">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->

                    <div class="profile-img">

                    <?php

                        //SET Profile Picture or Gender Avatar
                    
                        if ($_SESSION["photo"] != "") {
                            # code...

                            echo '<img src=" '.$_SESSION["photo"].' " alt="teacher"/>';

                        }elseif ($_SESSION["photo"] == "" && $_SESSION["gender"]== "male") {
                            # code...

                            echo '<img src="views/img/teachers/default/male.png" alt="teacher"/>';

                        }elseif ($_SESSION["photo"] == "" && $_SESSION["gender"]== "female") {
                            # code...

                            echo '<img src="views/img/teachers/default/female.png" alt="teacher"/>';

                        }else {
                            # code...
                            echo '<img src="views/img/teachers/default/default.png" alt="teacher"/>';
                        }
                    
                    
                    ?>

                     <!-- <img src="assets/images/users/1.jpg" alt="teacher"/>  -->
                             <!-- this is blinking heartbit-->
                            <!-- <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div> -->
                    </div>
                    <!-- User profile text-->
                    <div class="profile-text"> 
                            <!-- <h5><?php echo ucwords($_SESSION["fname"])?></h5> -->
                            <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                             <a href="#" class="" data-toggle="tooltip" title="Inbox"><i class="mdi mdi-gmail"></i></a>
                            <a href="logout" class="" data-toggle="tooltip" title="Logout"><i class="fa fa-power-off power-off"></i></a>

                        <div class="dropdown-menu animated flipInY">
                        <!-- text--> 
                        <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                        <!-- text-->  
                        <div class="dropdown-divider"></div>
                        <!-- text-->  
                        <a href="#" class="dropdown-item"><i class="ti-settings"></i> New Password</a>
                        <!-- text--> 
                        <div class="dropdown-divider"></div>
                        <!-- text-->  
                        <a href="logout" class="dropdown-item power-off"><i class="fa fa-power-off"></i> Logout</a>
                        <!-- text-->  
                        </div>
                    </div>
                </div>
                <!-- End User profile text-->

                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                         <li class="nav-devider"></li>

                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="dashboard"> Home </a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-city"></i><span class="hide-menu">CLASS ROOM</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="classroom">Room Details</a></li>
                            </ul>
                        </li>


                        
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-multiple-plus"></i><span class="hide-menu">TEACHERS 
                            <span class="label label-rouded label-success font-weight-bolder pull-right" id="teacherNotify">  <?php  $table = "teacher";  $teacher = ModelTeachers::mdlShowTeacherRow($table); echo $teacher?>  </span> </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="teachers">Teachers List</a></li>
                                <!-- <li><a href="app-email-detail.html">Attendance Detail</a></li>
                                <li><a href="app-compose.html">Compose Mail</a></li> -->
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-human-male-female"></i><span class="hide-menu"> STUDENTS <span class="label label-rouded label-info pull-right" id="studentNotify">  <?php $item = ""; $value = "";  $table = "student";  $student = ModelStudents::mdlShowStudentCountRow($table,$item,$value); echo $student?>  </span> </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="students"> Students List </a></li>
                                <!-- <li><a href="ui-user-card.html">User Cards</a></li> -->

                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-human-greeting"></i><span class="hide-menu">ATTENDANCE</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="attendanceList">Attendance List</a></li>
                                <!-- <li><a href="form-layout.html">Form Layouts</a></li>
                                <li><a href="form-addons.html">Form Addons</a></li> -->

                            </ul>
                        </li>
                        <!-- <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-calendar-multiple"></i><span class="hide-menu">EVENTS</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="calender">Calendar</a></li>

                            </ul>
                        </li> -->
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-widgets"></i><span class="hide-menu">UTILITIES</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="users">System Users</a></li>
                                <li><a href="permissions">Permissions</a></li>
                                
                            </ul>
                        </li>
                        
                         
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

