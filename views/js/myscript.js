

//
// ─── LOGOUT IF IDLE ─────────────────────────────────────────────────────────────
//



$(function()
{

        function timeChechker() {
            setInterval(function(){

            var storedTimeStamp = sessionStorage.getItem("lastTimeStamp");
            timeCompare(storedTimeStamp);

            }, 3000);
        }

        function timeCompare(timeString){

            var currentTime = new Date();
            var pastTime = new Date(timeString);
            var timeDiff =  currentTime - pastTime;
            var minPast  =  Math.floor((timeDiff/60000));

            function setAction(){

                if (minPast > 15) // Time is greater than 15 mins.
                {
                    sessionStorage.removeItem("lastTimeStamp");
                    window.location = "logout";
                    return false;
                
                 } //else {
                //     // console.log(currentTime + " - "+ pastTime + " - "+ timeDiff + " - " + minPast + " Min Pas");
                // }
                
            }


            if (window.location.pathname !== "/sundayschool/logout") {
                setAction();
                return false;
            }else{
                window.stop();
            }


        }

        $(document).mousemove(function(e)
        {
            e.preventDefault();
            var timeStamp = new Date();
            sessionStorage.setItem("lastTimeStamp", timeStamp);
        });

        timeChechker();

});


//
// ─── VALIDATE PASSWORD INUPT ─────────────────────────────────────────────────────────────
//

function validateEntry (e) {
    var regex = new RegExp ("^[a-zA-Z0-9@+-_!.]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

    if (regex.test(str)) {
        return true;
    }

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success mb-4 mr-2",
            cancelButton: "btn btn-danger mb-4 mr-2",
            icon:"mb-2 mt-5"
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire(
        'Invalid Character \n Detected!',
        '',
        'error'
    );

    e.preventDefault();
    return false;
}



//
// ─── VALIDATE GENERAL INPUT ─────────────────────────────────────────────────────
//

function validateInput (e) {
    var regex = new RegExp ("^[a-zA-Z ]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

    if (regex.test(str)) {
        return true;
    }

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success mb-4 mr-2",
            cancelButton: "btn btn-danger mb-4 mr-2",
            icon:"mb-2 mt-5"
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire(
        'Invalid Character \n Detected!',
        '',
        'error'
    );

    e.preventDefault();
    return false;
}


//
// ─── NUMBER VALIDATION ──────────────────────────────────────────────────────────
//

function validateNum (e) {
    var regex = new RegExp ("^[0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

    if (regex.test(str)) {
        return true;
    }

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success mb-4 mr-2",
            cancelButton: "btn btn-danger mb-4 mr-2",
            icon:"mb-2 mt-5"
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire(
        'Invalid Character \n Detected!',
        'Numbers Only',
        'error'
    );

    e.preventDefault();
    return false;
}




//
// ─── UPLOAD IMAGE ───────────────────────────────────────────────────────
//


$(document).ready(function(){

    $(".newPics").change(function(){

        var newImage = this.files[0];
    
        /*===============================================
        =            validating image format            =
        ===============================================*/
        
        if (newImage["type"] != "image/jpeg" && newImage["type"] != "image/png"){
    
            $(".newPics").val("");
    
                swal.fire({
                    icon: "error",
                    title: "Image Upload Error",
                    text: "Image must be JPEG or PNG!",
                    showConfirmButton: true,
                    confirmButtonText: "Close"
                });
    
        }else if (newImage["size"] > 2000000 ) {

            $(".newPics").val("");
    
                swal.fire({
                    icon: "error",
                    title: "Image Upload Error",
                    text: "Image Size Must be less than 2MB",
                    showConfirmButton: true,
                    confirmButtonText: "Close"
                });
            
        }else{
            var imageData = new FileReader;
            imageData.readAsDataURL(newImage);

            $(imageData).on("load", function(event){
                
                var rootImage = event.target.result;

                $(".preview").attr("src", rootImage);

            });
        }
            
        /*=====  End of validating image format  ======*/
        
    })

});




//
// ─── SET IMAGE ON GENDER SELECT ─────────────────────────────────────────────────
//

$(document).ready(function(){

    //Set Gender Image for Teachers

    $(".tgender").change(function(){

    
        var gender = $(this).val();
    
        if (gender == "male") {
    
            var rootImage = "views/img/teachers/default/male.png";
            $(".preview").attr("src", rootImage);
            
        }else if (gender == "female") {
    
            var rootImage = "views/img/teachers/default/female.png";
            $(".preview").attr("src", rootImage);
            
        } else {
    
            var rootImage = "views/img/teachers/default/default.png";
            $(".preview").attr("src", rootImage);
            
        }
    
    });

    // Set Gender Image for Student

    $(".sgender").change(function(){

        var gender = $(this).val();
        
        if (gender == "boy") {
            
            var rootImage = "views/img/students/default/boy.png";
            $(".preview").attr("src", rootImage);

        }else if(gender == "girl") {
            
            var rootImage = "views/img/students/default/girl.png";
            $(".preview").attr("src", rootImage);

        }else {

            var rootImage = "views/img/students/default/default.png";
            $(".preview").attr("src", rootImage);

        }

    });



});

