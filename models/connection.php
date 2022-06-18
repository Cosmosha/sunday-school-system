<?php


class Connection{


    //
    // ─── DATABASE CONNECTION ────────────────────────────────────────────────────────
    //

    static public function connect(){
            
        $link = new PDO("mysql:host=localhost; dbname=attendance","root", "born2Glory");

        $link -> exec("set names utf8");

        return $link;

    }


}


