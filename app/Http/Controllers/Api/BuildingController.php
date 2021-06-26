<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Building;
use App\Models\Room;

class BuildingController extends BaseController
{
    /**
     * Get All Building Data
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = Building::all();
        return $this->sendResponse($buildings, 'All Buildings Retrieved  Successfully');
    }

    /**
     * Get Single data Building Data
     *@param  \App\Models\Building  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Building::where('id', '=', $id)->first();
        $rooms=Room::where('building_id','=',$id)->get();
        return $this->sendResponse($rooms, 'All Rooms in spacific building Retrieved  Successfully');
    }



    /**
     * Get Single data rooom Data
     *@param  \App\Models\Building  $id
     * @return \Illuminate\Http\Response
     */
    public function showRoom($id)
    {
        $room=Room::where('id','=',$id)->first();
        return $this->sendResponse($room, 'room Retrieved  Successfully');
    }
}
