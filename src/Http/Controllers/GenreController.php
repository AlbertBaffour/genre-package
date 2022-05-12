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
            return redirect('genre')->withErrors($validator)->withInput();
        }
        $genre = new Genre();
        $genre->name = $request->name;
        $genre->dwcode = $request->dwcode;
        $genre->enabled = $request->enabled?'true':'false';
        $genre->save();
        return redirect('genre');
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
