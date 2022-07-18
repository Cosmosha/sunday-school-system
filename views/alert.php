<?php


class SweetAlert{

    public static function alertSaved(){

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
                        text: "Record has been added.",
                        showConfirmButton: true,
                        confirmButtonText: "Okay",
                        closeOnConfirm: false,

                });

                </script>
            ';

    }



    public static function alertUpdate(){

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
                        text: "Record has been modified.",
                        showConfirmButton: true,
                        confirmButtonText: "Okay",
                        closeOnConfirm: false,

                });

                

                </script>
            ';

    }




    
    public static function alertDelete(){

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
                        text: "Record has been removed.",
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





    public static function alertErrorFilelds(){

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
                        title: "All Fileds are Required!",
                        showConfirmButton: true,
                        confirmButtonText: "Okay",
                        closeOnConfirm: false,
        
                    });
                </script>
            ';

    }

    public static function alertDuplicateItem(){

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
                        text: "Record already Exit.",
                        showConfirmButton: true,
                        confirmButtonText: "Okay",
                        closeOnConfirm: false,

                    });

                </script>
            ';

    }



    public static function alertUserSaved(){

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
                        text: "User has been added.",
                        showConfirmButton: true,
                        confirmButtonText: "Okay",
                        closeOnConfirm: false,

                });

                </script>
            ';

    }




    public static function alertUserUpdated(){

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
                        text: "User has been modified.",
                        showConfirmButton: true,
                        confirmButtonText: "Okay",
                        closeOnConfirm: false,

                });

                </script>
            ';

    }


    public static function alertDuplicateUser(){

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
                        text: "User Already Exit.",
                        showConfirmButton: true,
                        confirmButtonText: "Okay",
                        closeOnConfirm: false,

                    });

                </script>
            ';

    }



    public static function alertUserDelete(){

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
                        text: "User has been removed.",
                        showConfirmButton: true,
                        confirmButtonText: "Okay",
                        closeOnConfirm: false,

                    });
                    
                </script>
            ';

    }



}