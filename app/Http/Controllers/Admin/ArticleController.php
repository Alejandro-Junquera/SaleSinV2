<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Articles;
use App\cicles;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Articles::where('deleted','=','true')->orderBy('created_at','desc')->paginate(5);
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cicles=cicles::all();
        return view('admin.articles.create', compact('cicles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image'=> 'required',
            'description' => 'required',
            'cicle_id'=> 'required',
        ]);
        $article = new Articles;
        $article->title = $request->get('title');
        $file = $request->file('image');
        //obtenemos el nombre del archivo
        $nombre =  time()."_".$file->getClientOriginalName();
        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('imagesStorage')->put($nombre,  \File::get($file));
        $article->image = $nombre;
        $article->description = $request->get('description');
        $article->cicle_id = $request->get('cicle_id');
        $article->save();
        
        return redirect()->route('admin.articles.index')->with('success', 'Article created successfully.');
  
    }

    public function storeTest(Request $request)
    {
            $data = request()->validate([
                'title' => '',
                'image' => '',
                'cicle_id'=> '',
                'description' => '',
            ]);
    
            Articles::create($data);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cicles=cicles::all();
        return view('admin.articles.edit', compact('cicles'))->with(['article'=>Articles::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $article=Articles::find($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'cicle_id' => 'required',
        ]);
        
        $file = $request->file('image'); 
        if($file!=''){
            //obtenemos el nombre del archivo
            $nombre =  time()."_".$file->getClientOriginalName();
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('imagesStorage')->put($nombre,  \File::get($file));
            $article->image = $nombre;
        }

        $article->update(
            [
                'title' => $request->get('title'),
                // $article->image = $nombre,
                'description' => $request->get('description'),
                'cicle_id' => $request->get('cicle_id'),
            ]
        );
       
        return redirect()->route('admin.articles.index')
                        ->with('success','Article updated successfully');
                        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Articles::find($id);
        $article->delete();

        return redirect('/articlesDelete/');

    }

    public function softDestroy($id)
    {
        $article = Articles::find($id);
        $article->deleted = '1';
        $article->save();
        return redirect()->route('admin.articles.index')
        ->with('success','Article deleted successfully');
    }
}
