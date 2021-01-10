<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    // Get all rooms in a household
    // returns rooms as JSON
    // Path parameters	
    //      KEY	
    //      Required: true
    //      Type: varchar
    //      Description: The keycode of the household
    public function GetAll($key) {
        return DB::table('rooms')->where('household_key', $key)->get();
    }

    // Get all the items in a room
    // Returns	Items as JSON
    // Path parameters	
    //      ID	
    //      Required: true
	//      Type: int
	//      Description: The id of the room
    public function GetItemsById($id) {
        return DB::table('room_items')->where('room_id', $id)->get();
    }

    // Create a room inside the household
    // Returns	Text: Success
    // Produces	Inserts the new room into the database
    // Path parameters	
    //      NAME	
    //      Required: true
	//      Type: text
	//      Description: The name of the new room
    public function CreateRoom($name) {
        DB::table('rooms')->insert([
            'name' => $name,
            'household_key' => $_COOKIE['household'],
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);
        return 'success';
    }

    // Deletes a room
    // Returns	Text: Success
    // Produces	Deletes the room in the database
    // Path parameters	
    //      ID	
    //      Required: true
	//      Type: int
	//      Description: The id of the room
    public function DeleteRoom($id) {
        DB::table('rooms')->where('id', $id)->delete();
        return 'success';
    }
}
