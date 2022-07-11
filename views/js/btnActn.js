
    //
    // ──────────────────────────────────────────────────────────────────────────────────── I ──────────
    //   :::::: O N   A C T I O N   B U T T O N   C L I C K : :  :   :    :     :        :          :
    // ──────────────────────────────────────────────────────────────────────────────────────────────
    //

$(document).ready(function(){


  //
  // ────────────────────────────────────────────────────────────────────────────────────────────────── I ──────────
  //   :::::: C L A S S R O O M   B U T T O N   C L I C K   A C T I O N : :  :   :    :     :        :          :
  // ────────────────────────────────────────────────────────────────────────────────────────────────────────────
  //

  //
  // ─── EDIT CLASSROOM ON BUTTON CLICK ─────────────────────────────────────────────
  //

    $(".classroomTable tbody").on("click", "i.btnEditClass", function(){

        var idClass = $(this).attr("idClass");

        console.log("idClass", idClass);
          
        var datas = new FormData();
        datas.append("idClass", idClass);

        $.ajax({

          url: "./ajax/classrooms.ajax.php",
            method: "POST",
            data: datas,
            Cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(result){

              console.log("result", result);

              $("#editname").val(result["class_name"]);
              $("#editcapacity").val(result["class_capacity"]);
              $("#idClass").val(result["class_id"]);

          }

        })

    });

  
    
    //
    // ─── DELETE CLASSROOM ON BUTTON CLICK ────────────────────────────
    //

    $(".classroomTable tbody").on("click", "i.btnDeleteClass", function(){

        var deleteClass = $(this).attr("deleteClass");  
        console.log("deleteClass", deleteClass);

        var datas = new FormData();
        datas.append("deleteClass", deleteClass);
        

          const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
        
              confirmButton: 'btn btn-success mb-4 mr-2',
              cancelButton: 'btn btn-danger mb-4 mr-2',
              icon:'mb-2 mt-5'
        
            },
            buttonsStyling: false
          })
          
          swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No, cancel!',
            confirmButtonText: 'Yes, delete it!',      
            // reverseButtons: true
          }).then((result) => {
            if (result.value) {
              
              window.location = "index.php?root=classroom&deleteClass="+deleteClass;

            } 
          })


    });


    //
    // ────────────────────────────────────────────────────────────────────────────────────────────── I ──────────
    //   :::::: T E A C H E R   B U T T O N   C L I C K   A C T I O N : :  :   :    :     :        :          :
    // ────────────────────────────────────────────────────────────────────────────────────────────────────────
    //


    //
    // ─── EDIT TEACHER ────────────────────────────────────────────────
    //

    $(".teacherTable").on("click", "i.btnEditTeacher", function(){

      var idTeacher = $(this).attr("idTeacher");
      console.log("idTeacher", idTeacher);

      var datas = new FormData();
      datas.append("idTeacher", idTeacher);

      $.ajax({

        url: "./ajax/teachers.ajax.php",
          method: "POST",
          data: datas,
          Cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(result){

           // console.log("result", result);

            $("#editfname").val(result["teacher_firstname"]);
            $("#idTeacher").val(result["teacher_id"]);
            $("#editlname").val(result["teacher_lastname"]);
            $("#editgender").val(result["teacher_gender"]);
            $("#editemail").val(result["teacher_email"]);
            $("#editphone").val("0"+result["teacher_phone"]);
            $(".editdoj").val(result["teacher_doj"]);
            $("#editoccupation").val(result["teacher_occupation"]);
            $("#editclassroom").val(result["class_id"]);
            $("#currentPic").val(result["teacher_photo"]);
            $("#editprofile").val(result["profile_id"]);
            $("#editstatus").val(result["status_id"]);


            if (result["teacher_photo"] !="") { 

              $('.preview').attr('src', result["teacher_photo"]);
              
            }else if (result["teacher_photo"] == "" && result["teacher_gender"] == "male" ) {
              var rootImage = "views/img/teachers/default/male.png";
              $('.preview').attr("src", rootImage);
            }else if (result["teacher_photo"] == "" && result["teacher_gender"] == "female") {
              var rootImage = "views/img/teachers/default/female.png";
              $(".preview").attr("src", rootImage);
            }else {
    
              var rootImage = "views/img/teachers/default/default.png";
              $('.preview').attr("src", rootImage);             
            }

        }

      })

    });



    //
    // ─── DELETE TEACHER ──────────────────────────────────────────────
    //

    $(".teacherTable tbody").on("click", "i.btnDeleteTeacher", function(){

        var deleteTeacher = $(this).attr("deleteTeacher");  
        var churchid = $(this).attr("churchid");
        var deletePhoto = $(this).attr("deletePhoto");
        var deletePhone = $(this).attr("deletePhone");

        console.log("deleteTeacher", deleteTeacher); 
        console.log("churchid", churchid);
        console.log("deletePhoto", deletePhoto);
        console.log("deletePhone", deletePhone);

        var datas = new FormData();
        datas.append("deleteTeacher", deleteTeacher);
        datas.append("churchid", churchid);
        datas.append("deletePhoto", deletePhoto);
        datas.append("deletePhone", deletePhone);


        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
      
            confirmButton: 'btn btn-success mb-4 mr-2',
            cancelButton: 'btn btn-danger mb-4 mr-2',
            icon:'mb-2 mt-5'
      
          },
          buttonsStyling: false
        })
        
        swalWithBootstrapButtons.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          cancelButtonText: 'No, cancel!',
          confirmButtonText: 'Yes, delete it!',      
          // reverseButtons: true
        }).then(function(result) {

       

          if (result.value) {
  
            window.location = "index.php?root=teachers&deleteTeacher="+deleteTeacher+"deletePhoto="+deletePhoto+"deletePhone="+deletePhone;
  
            //   $.ajax({
  
            //     url: "ajax/teachers.ajax.php",
            //     method: "POST",
            //     data: datas,
            //     cache: false,
            //     contentType: false,
            //     processData: false,
            //     success: function(result) {
            //       console.log("result", result);
                    
            //       swalWithBootstrapButtons.fire({

            //         icon: "success",
            //         title: "Deleted!",
            //         text: "Record has been removed.",
            //         showConfirmButton: true,
            //         confirmButtonText: "Okay",
            //         closeOnConfirm: false,

            //       }).then((result) => {

            //       if (result.value) {
            //           location.reload();
            //       }

            //       });

            //     }
            // });

          }
  
      })

    });





    //
    // ────────────────────────────────────────────────────────────────────────────────────────────── I ──────────
    //   :::::: S T U D E N T   B U T T O N   C L I C K   A C T I O N : :  :   :    :     :        :          :
    // ────────────────────────────────────────────────────────────────────────────────────────────────────────
    //

    // ─── Edit Studendt ───────────────────────────────────────────────

    $(".studentTable").on("click", "i.btnEditstudent", function(){

      var idStudent = $(this).attr("idstudent");
      console.log("idStudent", idStudent);

      var datas = new FormData();
      datas.append("idStudent", idStudent);

      $.ajax({

        url: "./ajax/students.ajax.php",
          method: "POST",
          data: datas,
          Cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(result){

           // console.log("result", result);

            $("#edit_fname").val(result["student_firstname"]);
            $("#edit_lname").val(result["student_lastname"]);
            $("#idStudent").val(result["student_id"]);
            $("#edit_gender").val(result["gender"]);
            $(".edit_dob").val(result["dob"]);
            $("#edit_level").val(result["student_level"]);
            $("#edit_phone").val("0"+result["phone"]);
            $("#edit_class").val(result["class_form"]);
            $("#edit_school").val(result["school_name"]);
            $("#edit_region").val(result["region_id"]);
            $("#currentPic").val(result["student_photo"]);
            $("#edit_gname").val(result["guardian_name"]);
            $("#edit_address").val(result["home_address"]);
            $("#edit_classname").val(result["class_id"]);


            if (result["student_photo"] != "") {

              $('.preview').attr('src', result["student_photo"]);
              
            }else if (result["student_photo"] == "" && result["gender"] == "boy") {

              var rootImage = "views/img/students/default/boy.png";
              $(".preview").attr("src", rootImage);
              
            }else if (result["student_photo"] == "" && result["gender"] == "girl") {

              var rootImage = "views/img/students/default/girl.png";
              $(".preview").attr("src", rootImage);
              
            }else {

              var rootImage = "views/img/students/default/default.png";
              $(".preview").attr("src", rootImage);

            }

        }

      })

    });




});















//
// ──────────────────────────────────────────────────────────────────────────── I ──────────
//   :::::: R E S T   B U T T O N   A C T I O N : :  :   :    :     :        :          :
// ──────────────────────────────────────────────────────────────────────────────────────
//

$(document).on("click", "button#reset", function(){

  var rootImage = "views/img/teachers/default/default.png";
  $('.preview').attr("src", rootImage);

})
