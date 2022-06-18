
//
// ────────────────────────────────────────────────────────────────────────────────────────── I ──────────
//   :::::: G E T   J S O N   D A T A   F R O M   D B : :  :   :    :     :        :          :
// ────────────────────────────────────────────────────────────────────────────────────────────────────
//


$(document).ready(function(){

	
	//
	// ─── LOAD CLASSROOM JSON DATATABLE ──────────────────────────────────────────────
	//

	$('.classroomTable').DataTable( {
	    "ajax":"./ajax/datatable-classroom.ajax.php",
	    "deferRender": true,
	    "retrieve": true,
	    "processing": true ,

	} );



	//
	// ─── LOAD TEACHER JSON DATATABLE ────────────────────────────────────────────────
	//

	$('.teacherTable').DataTable( {
	    "ajax":"./ajax/datatable-teachers.ajax.php",
	    "deferRender": true,
	    "retrieve": true,
	    "processing": true ,

	} );



});







