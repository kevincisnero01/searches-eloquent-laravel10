<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function filter(Request $request, Property $property)
    {

        $query = $property->newQuery();

        if($request->id) 
            $query->where('id',$request->id);

        if($request->name) 
            $query->where('name','like','%'.$request->name.'%');

        if($request->features)
        {
            $query->whereHas('features', function($q) use ($request){
                $q->whereIn('features.id', $request->features);
            });
        }

        return response()->json($query->get());
    }
}
