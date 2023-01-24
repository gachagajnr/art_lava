<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Art;
class ArtController extends Controller
{
    public function index()
	{
	    return Art::all();
	}
	public function show(Art $art)
	{
	    return $art;
	}
	  
	public function update(Request $request, Art $art)
	{
	    $art->update($request->all());
	    return response()->json($art, 200);
	}
	public function delete($id)
	{
		return Art::destroy($id);
	}
    public function store(Request $request)
    {
		$this->validate($request, [
        'name' => 'required|unique:products|max:255',
        'description' => 'required',
        'price' => 'integer',
        'category' => 'required',
        'availability' => 'boolean',
    ]);
	    $art = Art::create($request->all());
	    return response()->json($art, 201);
	}


	public function search($name){
		
		return Art::where('name', 'like', '%' . $name . '%')->get();
	}

}
