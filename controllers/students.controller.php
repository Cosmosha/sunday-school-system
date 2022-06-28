<?php 


class ControllerStudents {

    static public function ctrAddStrudent() {

            
    //
    // ─── SHOW STUDENT LIST ───────────────────────────────────────────────────────
    //

        public static function ctrShowStudentList($item, $value){

            $table = "student";

            $result = ModelStudents::mdlShowStudents($table,$item,$value);

            return $result;

        }

    }

}