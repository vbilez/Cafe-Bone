<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Category;
use App\Tovar;

class CategorysController extends Controller
{

       public function __construct()
    {
       
        $this->middleware('auth', ['except' => ['show','shop','shoptovarcat','contacts','remont']]);
    }
   public function index()
    {
        $categories=Category::all();
        $count=Category::all()->count();
        return view('categorie.index',compact('categories',$categories, 'count', $count));
    }

    public function all()
    {
        $categories=Category::all();
        $count=Category::all()->count();
        return view('categorie.all',compact('categories',$categories, 'count', $count));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       
        return view('categorie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CategoryRequest $request)
    {  
        $rq=$request->all();

        if ($request->file('img')->isValid())
        {
            $file = $request->file('img');
           $file->move('./img',$file->getClientOriginalName());
            $rq['img']='/img/'.$file->getClientOriginalName();
        }
       $cat=new Category($rq);
       $cat->save();
       return redirect('/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function showbackup($id)
    {
        $tovars=Tovar::where("category","=",$id)->get();
        $cats= Category::lists('title','id');
        $category = Category::findOrFail($id);
            return view('shoptovarcat',compact('tovars',$tovars,'cats',$cats,'category',$category));
    }
  public function show($id,Request $request)
    {


$bt=[$request->min_price,$request->max_price];
if(($request->min_price=='')||($request->max_price==''))
{
 if($request->s=='')
 {    $tovars=Tovar::where("category","=",$id)->paginate(10);
 }
 else
 { $tovars=Tovar::where("category","=",$id)->where('title', 'like', '%'.$request->s.'%')->paginate(10);
 }
}
else 
{
     if($request->s=='')
     {
        $tovars=Tovar::where("category","=",$id)->whereBetween("price",$bt)->paginate(10);
     }
     else
     {  $tovars=Tovar::where("category","=",$id)->whereBetween("price",$bt)->where('title', 'like', '%'.$request->s.'%')->paginate(10);
     }

}
        $cats= Category::lists('title','id');
        
        $category = Category::findOrFail($id);
        return view('shoptovarcat2',compact('tovars',$tovars,'cats',$cats,'category',$category));


    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
          $categorie = Category::findOrFail($id);
    
        return view('categorie.edit',compact('categorie',$categorie));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update( $id,CategoryRequest $request)
    {
        $categorie = Category::findOrFail($id);
          $rq=$request->all();

        if($request->file('img')!==null){
            if ($request->file('img')->isValid())
            {
                $file = $request->file('img');
                $file->move('./img',$file->getClientOriginalName());
                $rq['img']='/img/'.$file->getClientOriginalName();
            }
        }
        if($request->file('img')===null)
        {
            $rq['img']= $categorie->img;
        }
          $categorie ->update($rq);
        //$this->syncTags($article,$request->input('taglist'));
        return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
          $art=Tovar::where('category','=',$id);
       $art->delete();
       //$cats= Categorie::lists('title','id');
       //$art->categorie()->sync($cats);
       $categorie= Category::findOrFail($id);
       $categorie->delete();
     
       return redirect('category');
    }

     public function shop()
    {
        $cat = Category::all();
      return view('shop',compact('cat',$cat));
    }   

        public function shoptovarcat()
    {
        $cat = Category::all();
        $tv = Tovar::all();
        return view('shoptovarcat',compact('cat',$cat,'tv',$tv));
    }
        public function contacts()
    {
        
        return view('contacts');
    }

      public function remont()
    {
        
        return view('remont');
    }
  

}
