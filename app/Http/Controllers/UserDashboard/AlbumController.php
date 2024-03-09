<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlbumValidator;
use App\Models\Album;
use App\Models\Picture;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{
    
    public function index()
    {
       $albums = Album::all();

       return view('users-dashboard.pages.albums.index', compact('albums'));
    }

    
    public function create()
    {
        return view('users-dashboard.pages.albums.create');
    }

    
    public function store(AlbumValidator $request)
    {
        try {

            DB::beginTransaction();

            $album = Album::create([
                'name' => $request->name,
                'user_id' => auth()->id()
            ]);

            $this->storePictures($request->pictures, $album->id);

            DB::commit();

            return redirect()->route('albums.index')->with('success', 'album has been added successfully');
        
        } catch (Exception $ex) {

            DB::rollBack();
            return redirect()->route('albums.index')->with('error', 'Operation Failed Try Again');

        }

    }

    
    public function show(Album $album)
    {
        return view('users-dashboard.pages.albums.show', compact('album'));
    }

   
    public function edit(Album $album)
    {
        return view('users-dashboard.pages.albums.edit', compact('album'));
    }

    
    public function update(Request $request, Album $album)
    {
        try {

            DB::beginTransaction();

            $album->update([
                'name' => $request->name,
            ]);

            $this->storePictures($request->pictures, $album->id);

            DB::commit();

            return redirect()->route('albums.index')->with('success', 'album has been updated successfully');
        
        } catch (Exception $ex) {

            DB::rollBack();

            return redirect()->route('albums.index')->with('error', 'Operation Failed Try Again');
        }
    }

    
    public function destroy(Album $album)
    {
        try {

            foreach($album->pictures as $picture) {

                if(file_exists($picture->path)) {
                    unlink($picture->path);
                }

            }

            DB::beginTransaction();

            $album->pictures()->delete();

            $album->delete();

            DB::commit();

            return redirect()->route('albums.index')->with('success', 'album has been deleted successfully');

        } catch (Exception $ex) {

            DB::rollBack();
            return redirect()->route('albums.index')->with('error', 'Operation Failed Try Again');

        }

    }


    public function movePictures(Request $request, Album $album)
    {
        $request->validate(['album' => 'required']);

        try {

            DB::beginTransaction();

            $album->pictures()->update(['album_id' => $request->album]);

            $album->delete();

            DB::commit();

            return redirect()->route('albums.index')->with('success', 'album have been deleted and move pictures successfully');

        } catch (Exception $ex) {

            DB::rollBack();
            return redirect()->route('albums.index')->with('error', 'Operation Failed Try Again');

        }
    }

    
    public function removeSingleImage($pictureId) 
    {
        $picture = Picture::find($pictureId);

        if($picture) {

            $albumPicturesCount = Picture::where('album_id', $picture->album_id)->count();

            if($albumPicturesCount > 1) {

                if(file_exists($picture->path)) {
                    unlink($picture->path);
                }

                $picture->delete();

                return response()->json(['success' => 'success', 'status' => 200]);

            }

        }

        return response()->json(['error' => 'Album must have at least one picture', 'status' => 404]);
    }

    private function storePictures($pictures, $albumId)
    {
        foreach($pictures as $image) {

            $picture = new Picture;

            $picture->name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $picture->path = 'uploads/' . $image->store('pictures', 'public_directory');
            $picture->album_id = $albumId;

            $picture->save();

        }
    }

    
}
