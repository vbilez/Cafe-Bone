<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\RecipeCreateRequest;
use App\Http\Requests\RecipeRequest;
use App\Recipe;
class RecipesController extends Controller
{
       public function __construct()
    {
       
        $this->middleware('auth', ['except' => ['show','index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $rc=Recipe::all();
       return view('recipe',compact("rc",$rc));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(RecipeCreateRequest $request)
  {

    $rq=$request->all();
if($request->preview!==null){
        if ($request->file('preview')->isValid())
        {
            $file = $request->file('preview');
           $file->move('./img',$file->getClientOriginalName());
            $rq['preview']='/img/'.$file->getClientOriginalName();
        }
       }
          if($request->preview===null){
        $rq['preview']='';
        }
    //$preview=implode(';',$url_img); //массив с ссылками переводим в строку, что бы сохранить в базу.
    //Сохраняем каждый параметр
    $item=new Recipe($rq);
    
    $item->save(); // Сохраняем все в базу. 
    return redirect('recipe');
  }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $recipe=Recipe::findOrFail($id);
       return view('recipe.show',compact('recipe',$recipe));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $recipe = Recipe::findOrFail($id);
    
        return view('recipe.edit',compact('recipe',$recipe));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecipeRequest $request, $id)
    {
         $recipe = Recipe::findOrFail($id);
          $rq=$request->all();

        if($request->file('preview')!==null){
            if ($request->file('preview')->isValid())
            {
                $file = $request->file('preview');
                $file->move('./img',$file->getClientOriginalName());
                $rq['preview']='/img/'.$file->getClientOriginalName();
            }
        }
        if($request->file('preview')===null)
        {
            $rq['preview']= $recipe->preview;
        }
          $recipe ->update($rq);
        //$this->syncTags($article,$request->input('taglist'));
        return redirect('viewrecipes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $recipe= Recipe::findOrFail($id);
       $recipe->delete();
       return redirect('viewrecipes');
    }

       public function viewrecipes()
  {
    $recipe= Recipe::all();
    // $categorys=Category::lists('title','id');
    return view('recipe.view',compact('recipe',$recipe));
  }
}
