<?php

namespace App\Http\Controllers;

use App\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maps = Map::all();
        return view('backend.maps.index',compact('maps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maps = Map::all();
        $dataMap  = Array();
        $dataMap['type']='FeatureCollection';
        $dataMap['features']=array();

        foreach($maps as $value){
            $feaures = array();
            $feaures['type']='Feature';
            $geometry = array("type"=>"Point","coordinates"=>[$value->long, $value->lat]);
            $feaures['geometry']=$geometry;
            $properties=array('title'=>$value->name,"description"=>$value->address);
            $feaures['properties']= $properties;
            array_push($dataMap['features'],$feaures);
        }

        $data = json_encode($dataMap);

        return view('backend.maps.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $map = new Map;
        $map->name = $request->name;
        $map->address = $request->address;
        $map->long = $request->lng;
        $map->lat = $request->lat;

        $map->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Map  $map
     * @return \Illuminate\Http\Response
     */
    public function show(Map $map)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Map  $map
     * @return \Illuminate\Http\Response
     */
    public function edit(Map $map)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Map  $map
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Map $map)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Map  $map
     * @return \Illuminate\Http\Response
     */
    public function destroy(Map $map)
    {
        //
    }
}
