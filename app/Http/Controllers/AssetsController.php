<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Session;
// use Storage;
use App\Assets;
use App\Album;
use App\AlbumTags;
use App\AlbumStatus;
use App\Photo;
use App\Video;

class AssetsController extends Controller
{

    public function addEventData(Request $request){
        $data = new Album(); 
        $data->album_id = $request->album_id;
        $data->event_title = $request->event_title;
        $data->event_category = $request->event_category;
        $data->event_sector = $request->event_sector;
        $data->event_description = $request->event_description;
        $data->event_organizingAgency = $request->event_organizingAgency;
        $data->event_date = $request->event_date;
        $data->event_venue = $request->event_venue;
        $data->event_tags = $request->event_tags;
        
        $data->save();
    }

    public function addAlbumTags(Request $request){
        $data = new AlbumTags();
        $data->album_id = $request->album_id;
        $data->album_tagName = $request->album_tagName;
        
        $data->save();
    }

    public function addAlbumStatus(Request $request){
        $data = new AlbumStatus();
        $data->album_id = $request->album_id;
        $data->album_status = $request->album_status;
        
        $data->save();
    }
    
    public function addPhotoData(Request $request){
        foreach($request->photo_form as $item){
            $file_location = null;
                if ($item['photo_fileName'] && is_file($item['photo_fileName'])) {
                    
                    $file = $item['photo_fileName'];
                    $filePath = $item['photo_fileName']->store('public/images');
                    $filePathArray = explode('/', $filePath);
                    $file_newName = $filePathArray[2];

                    $data = new Photo(); 
                    $data->album_id = $item['album_id'];
                    // $data->photo_id = $item['photo_id'];
                    $data->photo_fileName = $file_newName;
                    $data->photo_personInvolved = $item['photo_personInvolved'];
                    $data->photo_title = $item['photo_title'];
                    $data->photo_category = $item['photo_category'];
                    $data->photo_description = $item['photo_description'];
                    $data->photo_photographer = $item['photo_photographer'];
                    $data->photo_tags = $item['photo_tags'];

                    $data->save();
            }
        }
    }

    public function addVideoData(Request $request){
        foreach($request->video_form as $item){

            $data = new Video(); 
            $data->album_id = $item['album_id'];
            // $data->video_id = $item['video_id'];
            $data->video_link = $item['video_link'];
            $data->video_youtubeID = $item['video_youtubeID'];
            $data->video_title = $item['video_title'];
            $data->video_personInvolved = $item['video_personInvolved'];
            $data->video_category = $item['video_category'];
            $data->video_duration = $item['video_duration'];
            $data->video_type = $item['video_type'];
            $data->video_description = $item['video_description'];
            $data->video_videographer = $item['video_videographer'];

            $data->save();
        }
        
        
    }

    public function countAlbumEntry(){
        $data = Album::count();
        return response()->json($data, 200);
    }

    public function countAlbumPhotoEntry(Request $album_id){
        $data = Photo::where('tbl_photo.photo_id', $album_id)
                            ->count();
        return response()->json($data, 200);
    }
    public function getAllListEvents(Request $request){
            $data = Assets::join('tbl_album_status','tbl_album.album_id', '=', 'tbl_album_status.album_id')
                    ->orderBy('tbl_album.created_at', 'desc')
                    ->get('*');
        
            return response()->json($data, 200);
    }


    public function getAllListDraft(Request $request){
            $data = Assets::join('tbl_album_status','tbl_album.album_id', '=', 'tbl_album_status.album_id')
                    ->where('tbl_album_status.album_status', "Saved as Draft")
                    ->orderBy('tbl_album.created_at', 'desc')
                    ->get('*');
        
            return response()->json($data, 200);
    }

    public function getAllListForRevision(Request $request){
            $data = Assets::join('tbl_album_status','tbl_album.album_id', '=', 'tbl_album_status.album_id')
                    ->where('tbl_album_status.album_status', "For Revision")
                    ->orderBy('tbl_album.created_at', 'desc')
                    ->get('*');
        
            return response()->json($data, 200);
    }

    public function getAllListForReview(Request $request){
            $data = Assets::join('tbl_album_status','tbl_album.album_id', '=', 'tbl_album_status.album_id')
                    ->where('tbl_album_status.album_status', "Submitted for Review")
                    ->orderBy('tbl_album.created_at', 'desc')
                    ->get('*');
        
            return response()->json($data, 200);
    }

    public function getAllListPublished(Request $request){
            $data = Assets::join('tbl_album_status','tbl_album.album_id', '=', 'tbl_album_status.album_id')
                    ->where('tbl_album_status.album_status', "Published")
                    ->orderBy('tbl_album.created_at', 'desc')
                    ->get('*');
        
            return response()->json($data, 200);
    }

    public function getAllListUnpublished(Request $request){
            $data = Assets::join('tbl_album_status','tbl_album.album_id', '=', 'tbl_album_status.album_id')
                    ->where('tbl_album_status.album_status', "Unpublished")
                    ->orderBy('tbl_album.created_at', 'desc')
                    ->get('*');
        
            return response()->json($data, 200);
    }

    // public function getAllListDraft(Request $request){
    //         $data = Assets::get('*');

    //         return response()->json($data, 200);
    // }


    public function getEventDetails(Request $request, $album_id){
              $data = Assets::where('tbl_album.id', $album_id)
                    ->get('*');
        return response()->json($data, 200);
    }

    public function getAllListPhoto(Request $request){
              $data = Photo::get('*');
        return response()->json($data, 200);
    }

    public function getListPhoto_selected(Request $request, $album_id){
        // return $request;
              $data = Photo::where('tbl_photo.album_id', $album_id)
                    ->get('*');
        return response()->json($data, 200);
    }

    public function getTags_selected(Request $request, $album_id){
              $data = AlbumTags::where('tbl_album_tags.album_id', $album_id)
                    ->get('*');
        return response()->json($data, 200);
    }

    public function getListVideo_selected(Request $request, $album_id){
        // return $request;
              $data = Video::where('tbl_video.album_id', $album_id)
                    ->get('*');
        return response()->json($data, 200);
    }

    public function getAllListVideo(Request $request){
              $data = Video::get('*');
        return response()->json($data, 200);
    }
    
    public function updateAlbum(Request $request, $id)
    {
        $data = Assets::where('id', $id)->first();

        //IN PROGRESS UPDATE
        $data->event_title = $request->event_title;
        $data->event_description = $request->event_description;
        $data->event_date = $request->event_date;
        $data->event_venue = $request->event_venue;
        $data->event_organizingAgency = $request->event_organizingAgency;
        $data->event_category = $request->event_category;
        $data->event_sector = $request->event_sector;
        $data->event_tags = $request->event_tags;
        $data->save();
    }
}
