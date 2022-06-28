<?php 

class Students {

    //
    // ─── SHOW JSON STUDENT TABLE ────────────────────────────────────────────────────
    //

    public static function ajaxStudentTable() {

        $item = null;
        $value = null;

        $student = ControllerStudents::ctrShowStudentList($item, $value);

        $jsonData = '{

            "data": [';
            
            


                $jsonData .='[

                    "",
                    "",
                    ""

                ],';
            
            
            

            $jsonData = substr($jsonData, 0, -1);
            $jsonData .= ']

        }';
        echo $jsonData;

    }

}