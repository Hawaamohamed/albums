<?php

namespace App\Http\Controllers;

use App\DataTables\PictureDataTable;
use App\Http\Controllers\Controller;

use App\Http\Requests\Pictures\CreatePictureRequest;
use App\Http\Requests\Pictures\UpdatePictureRequest;
use App\Models\Picture; 
use App\Models\Album; 
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB; 


class PictureController extends Controller
{  
    public function index(PictureDataTable $pictureDataTable, $album_id)
    {
        $pictures = Picture::where('album_id', $album_id)->get(); 

        return view('pictures.index', compact('pictures', 'album_id'));
 
    }
 
    public function create($album_id)
    {

        return view('pictures.create')->with('album_id', $album_id);
    }

    
    public function store(CreatePictureRequest $request, $album_id)
    {  
              // Start of Upload Files
              if( $request->hasFile('picture')){
                foreach($request->picture as $index=>$picture){
                 if(!empty($picture)){
                 
                     $newpicture = "";   
                     $newpicture =  time().$picture->getClientOriginalName();
                     $picture->move('uploads/albums', $newpicture);
                      
                    $picture = Picture::create(
                    [
                        'picture' => $newpicture, 
                        'picture_name' => $request->picture_name[$index],  
                        'album_id'=> $album_id,
                    ]);
               } 
             } 
           }
           return back()->with('seccessMessage', 'Added Successfully');
       

    }
  
    public function destroy(Picture $picture, $id)
    {
        
        try {

            $picture = Picture::find($id);
            // Delete picture
            $picture->delete();

            DB::commit();
            
            return back()->with('seccessMessage', 'Deleted Successfully');
        
        } catch (\Throwable $th) {
            
            DB::rollBack();
            
            return back()->with('errorMessage', $exception->getMessage());
        
        }
    }

}
