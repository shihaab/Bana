<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use phpDocumentor\Reflection\Types\Boolean;

class HouseholdController extends Controller
{
    // Create a new member inside a household
    // Returns	The household name
    // Produces	Inserts the new member in the database
    // Path parameters
    //      KEY	
    //      Required: true
	//      Type: varchar
	//      Description: The keycode of the household
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
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);
        return $household->name;
    }

    // Logout the user 
    // Returns	Boolean, true if the cookie was successfully deleted
    // Produces	Deleting the household cookie
    public function Logout() {
        if (isset($_COOKIE['household'])) {
            unset($_COOKIE['household']); 
            setcookie('household', null, -1, '/'); 
            return true;
        } else {
            return false;
        }
    }

    public function ring($key) {
        $urls = array();
        
        $rooms = DB::table('rooms')->where('household_key', $key)->get();
        foreach ($rooms as $room) {
            $items = DB::table('room_items')->where('room_id', $room->id)->get();
            foreach ($items as $item) {
                array_push($urls, $item->url.'/'.$item->callout_id);
            }
        }
        return $this->Flash($urls,10,1);        
    }
    public function GetRequest($url) {
        $headers = ['headers' => ['accept' => "application/json"]];
        try {
            $client = new Client();
            $response =  $client->request('GET', $url, $headers);
            $response = json_decode($response->getBody(), true);
            if(!$response == null) {  $status = $response;}
            else{ $status = "API Error";}
        }catch (ClientException $e){
            $status = "API Error";
        }
        return $status;
    }
    public function Flash($urls,$x, $startAt) {
        $data = array();
        if($startAt == 1) {
            $boolean = true;
        }
        else {
            $boolean = false;
        }
        for ($i = 0; $i <= $x; $i++) {
            if($boolean){
                $newstate = '1';
            }
            else {
                $newstate = '0';
            }
            $boolean = !$boolean;
            foreach ($urls as $url) {
                $r = $this->GetRequest($url.'?v='.$newstate);
                array_push($data, $r);
            }
            usleep(250000); // wait one quater of a second
        }
        return $data;
    }
}
