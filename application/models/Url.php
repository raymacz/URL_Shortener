<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Url
 *
 * @author owner
 */
class Url extends Eloquent {
    //put your code here
    public static $timestamps = false;
    
    public static $rules = array (
        'url' => 'required|url',
    );
    
    public static function validate($input) {
          // Validator::make($data, $rules, $messages); 
       $v =  Validator::make($input, static::$rules); //$input =  array('url' => $url, )
       
       return $v->fails() ? $v : TRUE;
    }
    public static function get_unique_short_url() {
            $shortened = base_convert(rand(10000,9000), 10, 36); //62 //base_convert($number, $frombase, $tobase)
          //  $shortened = 'asdf';
            if (static::where_shortened($shortened)->first()) {
               return get_unique_short_url();
            } 
            return $shortened;
        }
    
}
