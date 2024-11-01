import { http, httpFile } from './http_service';

//ADD, STORE OR CREATE DATA
export function addEventData(data){
    return httpFile().post('/addEventData', data);
}

export function addAlbumTags(data){
    return httpFile().post('/addAlbumTags', data);
}

export function addAlbumStatus(data){
    return httpFile().post('/addAlbumStatus', data);
}

export function addPhotoData(data){
    return httpFile().post('/addPhotoData', data);
}

export function addVideoData(data){
    return httpFile().post('/addVideoData', data);
}

//GET OR DISPLAY RESULTS
export function getAllListEvents(){
    return http().get('/getAllListEvents');
}

export function getAllListDraft(){
    return http().get('/getAllListDraft');
}

export function getAllListForRevision(){
    return http().get('/getAllListForRevision');
}

export function getAllListForReview(){
    return http().get('/getAllListForReview');
}

export function getAllListPublished(){
    return http().get('/getAllListPublished');
}

export function getAllListUnpublished(){
    return http().get('/getAllListUnpublished');
}


export function getAllListPhoto(){
    return http().get('/getAllListPhoto');
}

export function getAllListVideo(){
    return http().get('/getAllListVideo');
}

export function countAlbumEntry(){
    return http().get('/countAlbumEntry');
}

export function countAlbumPhotoEntry(album_id){
    return httpFile().post(`/countAlbumPhotoEntry/${album_id}`);
}

export function getEventDetails(album_id){
    return httpFile().post(`/getEventDetails/${album_id}`);
}

export function getListPhoto_selected(album_id){
    return httpFile().post(`/getListPhoto_selected/${album_id}`);
}

export function getListVideo_selected(album_id){
    return httpFile().post(`/getListVideo_selected/${album_id}`);
}

export function getTags_selected(album_id){
    return httpFile().post(`/getTags_selected/${album_id}`);
}

export function updateAlbum(id, data){
    return httpFile().post(`updateAlbum/${id}`, data);
}