<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TovarRequest;
use App\Http\Requests\TovarCreateRequest;
use App\Http\Controllers\Controller;
use App\Tovar;
use App\Category;
class TovarsController extends Controller
{
  public function add()
  {
    $categorys=Category::lists('title','id');
    return view('add',compact('categorys',$categorys));
  }

   public function view()
  {
  	$tovars= Tovar::all();
     $categorys=Category::lists('title','id');
    return view('view',compact('tovars',$tovars,'categorys',$categorys));
  }




  public function save(TovarCreateRequest $request)
  {

	//Обратабываем массивы с параметрами и их значениями.
		$root=$_SERVER['DOCUMENT_ROOT']."/images/"; //определяем папку для сохранения картинок

	//Сохраняем картинки
	$url_img=[]; // массив, который будет содержать ссылки на все картинки
	//foreach($request->file('preview') as $file) //обрабатываем массив с файлами
	//{
    // if(empty($request->file('preview')) continue; // если <input type="file"... есть, но туда ничего не загруженно, то пропускаем
    // $f_name=$request->file('preview')->getClientOriginalName(); //получаем имя файла
    // $url_img[]='/images/'.$f_name; //добавляем url картинки в массив
    // $request->file('preview')->move($root,$f_name); //перемещаем файл в папку
	//}

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
	$item=new Tovar($rq);
	
	$item->save(); // Сохраняем все в базу.	
	return redirect('viewtovars');
  }



  public function edit($id)
    {
          $tovar = Tovar::findOrFail($id);
    $categorys= Category::lists('title','id');
        return view('edit',compact('tovar',$tovar,'categorys',$categorys));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update( $id,TovarRequest $request)
    {
        $tovar = Tovar::findOrFail($id);
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
            $rq['preview']= $tovar->preview;
        }
          $tovar ->update($rq);
        //$this->syncTags($article,$request->input('taglist'));
        return redirect('viewtovars');
    }

  public function destroy($id)
    {
       $tovar= Tovar::findOrFail($id);
       $tovar->delete();
       return redirect('viewtovars');
    }


public function shoptovar($id)
    {
      
     $tovar=Tovar::findOrFail($id);
     $cats= Category::lists('title','id');
        return view('shoptovar',compact('tovar',$tovar,'cats',$cats));
    }
}
