<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    // Alle teams ophalen
    public function GetAll() {
        return DB::table('rooms')->get();
    }

    public function GetItemsById($id) {
        return DB::table('room_items')->where('room_id', $id)->get();
    }
}
