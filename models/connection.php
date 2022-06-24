<?php


class Connection{


    //
    // ─── DATABASE CONNECTION ────────────────────────────────────────────────────────
    //

    static public function connect(){
            
        try {
            //code...
            $link = new PDO("mysql:host=localhost; dbname=attendance","root", "born2Glory");

            $link -> exec("set names utf8");

            return $link;
        } catch (\Throwable $th) {
            //throw $th;
            echo "Error Server Connection : " . $th->getMessage();
        }
    }


}


