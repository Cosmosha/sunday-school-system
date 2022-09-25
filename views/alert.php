<?php


class SweetAlert{

    // public $Message;

    // public static function __construct($message){
    //     self::$Message= $message;
    // }


    public static function alertSaved($message){

        echo '
                <script type= "text/javascript">
                 
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: "btn btn-success mb-4 mr-2",
                            cancelButton: "btn btn-danger mb-4 mr-2",
                            icon:"mb-2 mt-5"
                        },
                        buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire({

                        icon: "success",
                        title: "Saved!",
                        text: "' .$message.'",
                        showConfirmButton: true,
                        confirmButtonText: "Okay",
                        closeOnConfirm: false,

                });

                </script>
            ';

    }



    public static function alertUpdate($message){

        echo '
                <script type= "text/javascript">
                 

                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: "btn btn-success mb-4 mr-2",
                            cancelButton: "btn btn-danger mb-4 mr-2",
                            icon:"mb-2 mt-5"
                        },
                        buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire({

                        icon: "success",
                        title: "Updated!",
                        text: "' .$message.'",
                        showConfirmButton: true,
                        confirmButtonText: "Okay",
                        closeOnConfirm: false,

                });

                

                </script>
            ';

    }
    
    public static function alertDelete($message){

        echo '
                <script type= "text/javascript">
                 
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: "btn btn-success mb-4 mr-2",
                            cancelButton: "btn btn-danger mb-4 mr-2",
                            icon:"mb-2 mt-5"
                        },
                        buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire({

                        icon: "success",
                        title: "Deleted!",
                        text: "' .$message.'",
                        showConfirmButton: true,
                        confirmButtonText: "Okay",
                        closeOnConfirm: false,

                    });
                    
                </script>
            ';

    }


    public static function alertInvalidChar(){

        echo'
                <script type= "text/javascript">
                
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: "btn btn-success mb-4 mr-2",
                            cancelButton: "btn btn-danger mb-4 mr-2",
                            icon:"mb-2 mt-5"
                        },
                        buttonsStyling: false
                    })

                    swalWithBootstrapButton.fire(
                        "Invalid Character \n Detected!",
                        "Input should not have special characters",
                        "error"
                    );

                </script>
            ';

    }


    public static function alertErrorFilelds($message){

        echo'
                
                <script type="text/javascript">

                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: "btn btn-success mb-4 mr-2",
                            cancelButton: "btn btn-danger mb-4 mr-2",
                            icon:"mb-2 mt-5"
                        },
                        buttonsStyling: false
                    })

                    swalWithBootstrapButton.fire({

                        icon: "error",
                        text: "' .$message.'",
                        showConfirmButton: true,
                        confirmButtonText: "Okay",
                        closeOnConfirm: false,
        
                    });
                </script>
            ';

    }

    
    public static function alertDuplicateItem($message){

        echo'
                
                <script type= "text/javascript">
                            
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: "btn btn-success mb-4 mr-2",
                            cancelButton: "btn btn-danger mb-4 mr-2",
                            icon:"mb-2 mt-5"
                        },
                        buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire({

                        icon: "error",
                        title: "Oops!",
                        text: "' .$message.'",
                        showConfirmButton: true,
                        confirmButtonText: "Okay",
                        closeOnConfirm: false,

                    });

                </script>
            ';

    }



}