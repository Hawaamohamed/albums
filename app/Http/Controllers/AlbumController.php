<?php

namespace App\Http\Controllers;

use App\DataTables\AlbumDataTable;
use App\Http\Controllers\Controller;

use App\Http\Requests\Albums\CreateAlbumRequest;
use App\Http\Requests\Albums\UpdateAlbumRequest;
use App\Http\Requests\Pictures\CreatePictureRequest;
use App\Models\Album; 
use App\Models\Picture; 
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB; 
  

class AlbumController extends Controller
{ 
    public function index(AlbumDataTable $albumDataTable)
    {
         
        return $albumDataTable->render('albums.index');

    }

    public function create()
    {
         
        return view('albums.create');
    }

     
    public function store(CreateAlbumRequest $request)
    {   
                $album = Album::create(
                [
                    'name' => $request->name 
                ]
            );
 
            // Start of Upload Files
            if( $request->hasFile('picture')){
                foreach($request->picture as $index=>$picture){
                 if(!empty($picture) && !empty($request->picture_name[$index])){
                 
                     $newpicture = "";   
                     $newpicture =  time().$picture->getClientOriginalName();
                     $picture->move('uploads/albums', $newpicture);
                       
                    $picture = Picture::create(
                    [
                        'picture' => $newpicture, 
                        'picture_name' => $request->picture_name[$index],  
                        'album_id'=> $album->id,
                    ]);
               } 
             } 
           }
            return back()->with('seccessMessage', 'Added Successfully');
        
    }
 
    public function edit( $id)
    { 
        $album = Album::where('id', $id)->first(); 

        return view('albums.edit')->with('album', $album);
         
    }
 
    public function update(UpdateAlbumRequest $request, $id)
    { 
  
        $album = Album::where('id', $id)->first();
        $album->name = $request->name;
        $album->save();

        return back()->with('seccessMessage', 'Updated Successfully');
      
    }

    
     

    public function destroy($id)
    {
       
        try {

            $album = Album::find($id);
            // Delete album
            $album->delete();

            DB::commit();
            
            return back()->with('seccessMessage', 'Deleted Successfully');
        
        } catch (\Throwable $th) {
            
            DB::rollBack();
            
            return back()->with('errorMessage', $exception->getMessage());
        
        }
    }
   
    public function move($from_id, $to_id)
    { 
        $pictures = Picture::where('album_id', $from_id)->get();
        if(!empty($pictures))
        {
            foreach($pictures as $picture)
            {
                $picture->album_id = $to_id;
                $picture->save(); 
            }
        }
        return redirect()->back();
    }
   
    

}
