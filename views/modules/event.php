


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
                <li class="breadcrumb-item active">Event Calendar</li>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card-body">
                                        <h4 class="card-title m-t-10">Events List for this Month</h4>
                                        <div class="row">
                                        <a href="#" data-toggle="modal" data-target="#add-new-event" class="btn m-t-10 btn-info btn-block waves-effect waves-light">
                                                        <i class="ti-plus"></i> Add Event 
                                                </a>
                                            <div class="col-md-12 col-sm-12 col-xs-12 mt-2">
                                                <div id="calendar-events" class="">
                                                    <div class="calendar-events" data-class="bg-inverse"><i class="fa fa-circle text-inverse"></i> My Event One</div>
                                                    <!-- <div class="calendar-events" data-class="bg-success"><i class="fa fa-circle text-success"></i> My Event Two</div>
                                                    <div class="calendar-events" data-class="bg-danger"><i class="fa fa-circle text-danger"></i> My Event Three</div>
                                                    <div class="calendar-events" data-class="bg-warning"><i class="fa fa-circle text-warning"></i> My Event Four</div> -->
                                                </div>
                                                <!-- checkbox -->
                                                <!-- <div class="checkbox m-t-20">
                                                    <input id="drop-remove" type="checkbox">
                                                    <label for="drop-remove">
                                                        Remove after drop
                                                    </label>
                                                </div> -->
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body b-l calender-sidebar">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BEGIN MODAL -->
            <div class="modal fade none-border" id="my-event">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">

                        <div class="modal-header bg-info">
                             <h4 class="modal-title text-white" id="myModalLabel"> Add / Update Event</h4>
                             <button type="button " class="close close-danager white-i" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>

                        <div class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                            <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete Event</button>
                            <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal Add Category -->
            <div id="add-new-event" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <form role="form" id="addEventform" method="POST">

                            <div class="modal-header bg-info">
                                <h4 class="modal-title text-white" id="myModalLabel"> Add Event</h4>
                                <button type="button " class="close close-danager white-i" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                                                    

                            <div class="modal-body">
                                
                               <div class="form-group">
                               
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">Event Title</label>
                                            <input class="form-control form-white text-capitalize" onkeypress="validateEntry(event)"  type="text" name="eventname"  required/>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Event Priority Color</label>
                                            <select class="form-control form-white text-capitalize"  name="eventcolor" required>
                                                <option value="">Select Colour</option>
                                                <option value="success">Green</option>
                                                <option value="danger">Red</option>
                                                <option value="info">Light Blue</option>
                                                <option value="primary">Blue</option>
                                                <option value="warning">Yellow</option>
                                                <option value="inverse">Black</option>
                                            </select>
                                        </div>
                                    </div>
                               
                               </div>


                                
                               <div class="form-group">

                                    <div class="row">
                                        <div class="col-6">
                                             <label for="event_start">Start Date</label>
                                            <input class="form-control" type="datetime-local" name="eventstart" id="event_start" required>
                                        </div>
                                        <div class="col-6">
                                             <label for="end_start">End Date</label>
                                            <input class="form-control" type="datetime-local" name="eventend" id="event_end" required>
                                        </div>
                                    </div>

                               </div>

                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary waves-effect">Save Event</button>
                                <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                            </div>

                            <?php 
                              
                                $addEvent = new ControllerEvent();
                                $addEvent->ctrAddEvent();

                            ?>

                        </form>
                    </div>
                </div>
            </div>
        <!-- END MODAL -->



        <!-- ============================================================== -->

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->



