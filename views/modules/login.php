

<section id="wrapper">
        <div class="login-register" style="background-image:url(assets/images/background/church.jpg);">
        <h2 class="box-title m-b-20 text-center text-light h-title">Sunday School System</h2>
            <div class="login-box card">
                
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" method="POST">

                        <h3 class="box-title m-b-20 text-center h-title">Sign In</h3>
                        
                        <?php
                            
                            $login = new ControllerUsers();
                            $login -> ctrUserLogin();

                        ?>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="email" required="" name="useremail" placeholder="Email"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required="" name="userpassword" placeholder="Password"> </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-12 font-14 text-center">
                                <!-- <div class="checkbox checkbox-primary  pull-left p-t-0">
                                    <input id="checkbox-signup" name="remember" type="checkbox">
                                    <label for="checkbox-signup"> Remember me </label>
                                </div>  -->
								<a href="javascript:void(0)" id="to-recover" class="text-dark">
									<!-- <i class="fa fa-lock m-r-5"></i> --> Forgot Password?
								</a> 
							</div>
                        </div>

                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-danger btn-pinterest btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>
      

                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                <div class="login-footer p-t-20 text-center"> <hr> <strong>2022 © <a href="http://menosoftech.com" target="_blank">Menosoft Technology</a></strong> </div>
                            </div>
                        </div>

                    </form>
                    <form class="form-horizontal" id="recoverform" method="POST">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3 class="box-title m-b-20 text-center h-title">Reset Password</h3>
                                <p class="text-muted text-center">A reset password will be sent to your registered email. </p>

                                <?php
                            
                                    // $passrecover = new ControllerUsers();
                                    // $passrecover -> ctrRecoveryPassword();

                                ?>

                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="email" onkeypress="validateEnt(event)" name="passRest" required placeholder="Email"> 
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary  btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                <div>Do you remember now? <a href="login" class="text-info m-l-5"><b>Sign In</b></a></div>
                            </div>

                            <div class="col-sm-12 text-center">
                                <div class="login-footer p-t-20 text-center"> <hr> <strong>2022 © <a href="http://menosoftech.com" target="_blank">Menosoft Technology</a></strong> </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        
    </section>


    <!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->

    <!-- <footer class="footer text-center">
            <strong>© 2021. All Right Reserved | <a href="http://menosoftech.com" target="_blank">Menosoft Technology</a></strong>
    </footer> -->

<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->

