<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request){

        if($request->has('search')){
            $data = Book::where('judul', 'LIKE', '%'.$request->search.'%')->paginate(5);
        }else{
            $data = Book::paginate(5);
        }
        return view('databuku', compact('data'));
    }

    public function tambah(){
        return view('tambahdata');
    }

    public function insert(Request $request){
        $data = Book::create($request->all());
        if($request->hasFile('gambar')){
            $request->file('gambar')->move('gambarbuku/',$request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('buku')->with('success', 'Data berhasil ditambahkan!');

    }

    public function edit($id){
        $data = Book::find($id);
        // dd($data);
        return view('editdata', compact('data'));

    }

    public function update(Request $request, $id){
        $data = Book::find($id);
        $data->update($request->all());
        return redirect()->route('buku')->with('success', 'Data berhasil di update!');
    }

    public function delete($id){
        $data = Book::find($id);
        $data->delete();
        return redirect()->route('buku')->with('success', 'Data berhasil dihapus');
    }
}
