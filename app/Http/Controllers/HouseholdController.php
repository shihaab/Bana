<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HouseholdController extends Controller
{
    public function CreateMember($key) {
        $household = DB::table('households')->where('keycode', (string) $key)->first(); // as object
        //whether ip is from share internet
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { //whether ip is from proxy
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else { //whether ip is from remote address
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }

        //set the cookie and make it last for 
        setcookie(
            "household",
            $household->keycode,
            time() + (10 * 365 * 24 * 60 * 60) // 10 year
        );
        DB::table('household_members')->insert([
            'household_id' => $household->id,
            'user_agent' => $_SERVER['HTTP_USER_AGENT'],
            'browser_language' => $_SERVER["HTTP_ACCEPT_LANGUAGE"],
            'ip' => $ip_address,
        ]);
        return $household->name;
    }

    public function Logout() {
        if (isset($_COOKIE['household'])) {
            unset($_COOKIE['household']); 
            setcookie('household', null, -1, '/'); 
            return true;
        } else {
            return false;
        }
    }
}
