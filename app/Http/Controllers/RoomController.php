<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    // Alle teams ophalen
    public function GetAll($key) {
        return DB::table('rooms')->where('household_key', $key)->get();
    }

    public function GetItemsById($id) {
        return DB::table('room_items')->where('room_id', $id)->get();
    }

    public function CreateRoom($name) {
        DB::table('rooms')->insert([
            'name' => $name,
        ]);
        return 'success';
    }

    public function DeleteRoom($id) {
        DB::table('rooms')->where('id', $id)->delete();
        return 'success';
    }
}
