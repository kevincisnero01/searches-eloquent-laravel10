<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function filter(Request $request, Property $property)
    {
        if($request->id) $property = $property->where('id',$request->id);

        if($request->name) $property = $property->where('name', $request->name);

        return response()->json($property->get());
    }
}
