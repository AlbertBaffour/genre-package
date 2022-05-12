<?php

namespace Yarm\Genre\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yarm\Genre\Models\Genre;

class GenreController extends Controller
{
    public function index(){
        $data['genres'] = Genre::orderBy('name', 'asc')->paginate(5);
        return view('genre::index',$data);

    }
    public function store(Request $request){
        $validator =Validator::make($request->all(),[
            'name' => 'required|min:2|unique:genres',
            'dwcode' => 'numeric',
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $genre = new Genre();
        $genre->name = $request->name;
        $genre->dwcode = $request->dwcode;
        $genre->enabled = $request->enabled?'true':'false';
        $genre->save();
        return response()->json(['success'=>'Genre created successfully']);
    }
    public function update(Request $request){
        $validator =Validator::make($request->all(),[
            'name' => 'required|min:2',
            'dwcode' => 'numeric',
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $genre = Genre::find($request->id);
        $genre->name = $request->name;
        $genre->dwcode = $request->dwcode;
        $genre->enabled = $request->enabled?'true':'false';
        $genre->save();
        return response()->json(['success'=>'Genre updated successfully']);
    }
    public function destroy($id){
        try {
            $genre = Genre::find($id);
            if(method_exists($genre,'refs'))$genre->refs()->detach();
            $genre->delete();
            return redirect('genre');
        } catch (\Throwable $e) {
            return back()->with('alert-danger', $e->getMessage());
        }
    }
}
