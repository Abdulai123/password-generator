<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class genPassword extends Controller
{
   
 
   protected $uppercase  = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   protected $lowercase  = 'abcdefghijklmnopqrstuvwxyz';
   protected $numbers    = '0123456789';
   protected $characters = '~@#$%^&*()_+-=[]\{}|;:/<>?';


    /**
     * generate
     *
     * @param  integer  $pl Password Length Defualt = 16
     * @param  bool     $u  Include Uppercase Letters
     * @param  bool     $l  Include Lowercase Letters
     * @param  bool     $n  Include Numbers
     * @param  bool     $c  Include Characters
     * @return string  generated password
     */
    protected function generate($pl = 16, $u = true, $l = true, $c = true, $n = true){

        $storeJoinedStrings = '';
        
        if ($u === false) {
            $storeJoinedStrings .= $this->lowercase . $this->numbers . $this->characters;

        }elseif ($l === false) {
            $storeJoinedStrings .= $this->uppercase . $this->numbers . $this->characters;

        }elseif ($n === false) {
            $storeJoinedStrings .= $this->uppercase . $this->lowercase . $this->characters;

        }elseif ($c === false) {
            $storeJoinedStrings .= $this->uppercase . $this->lowercase . $this->numbers;

        }else{
            $storeJoinedStrings .= $this->uppercase . $this->lowercase . $this->numbers . $this->characters;
        }

        $randomPassword = '';
        for ($i=0; $i < $pl; $i++) { 
                $randomPassword .= $storeJoinedStrings[rand(0, strlen($storeJoinedStrings) - 1)];
        }

        return $randomPassword;
    }



    public function generateStrongPassword(Request $request){
        sleep(rand(1, 3));
        $data = ['A_Z', 'a_z', 'characters', '0_9'];

        $input = [];
        $total_selected = 0;

        foreach ($data as $key => $value) {
            if ($request->has($value)) {
                $input[] = true;
                $total_selected += 1;
            }else {
                $input[] = false;
            }
        }
        
        $default_password_length = !empty($request->input('password_length')) ? $request->input('password_length') : 16;
        $password = $this->generate($default_password_length, $input[0], $input[1], $input[2], $input[3]);

        return view('welcome', ['password' => $password, 'strength' => $total_selected]);
    }
}
