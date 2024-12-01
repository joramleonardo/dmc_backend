import { http, httpFile } from './http_service';

//ADD, STORE OR CREATE DATA
export function addEventData(data){
    return httpFile().post('/addEventData', data);
}

export function addComment(data){
    return httpFile().post('/addComment', data);
}

export function addAlbumTags(data){
    return httpFile().post('/addAlbumTags', data);
}

export function addPhotoData(data){
    return httpFile().post('/addPhotoData', data);
}

export function addPhotoTags(data){
    return httpFile().post('/addPhotoTags', data);
}

export function addVideoTags(data){
    return httpFile().post('/addVideoTags', data);
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

export function getAllListForReview(){
    return http().get('/getAllListForReview');
}

export function getAllListUnderReview(){
    return http().get('/getAllListUnderReview');
}

export function getAllListForRevision(){
    return http().get('/getAllListForRevision');
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

export function getAlbumStatus(album_id){
    return httpFile().post(`/getAlbumStatus/${album_id}`);
}

export function getTrackingLog(album_id){
    return httpFile().post(`/getTrackingLog/${album_id}`);
}

export function getCommentLog(album_id){
    return httpFile().post(`/getCommentLog/${album_id}`);
}

export function countAlbumEntry(){
    return http().get('/countAlbumEntry');
}

export function countAlbumPhotoEntry(album_id){
    return httpFile().post(`/countAlbumPhotoEntry/${album_id}`);
}

export function countAlbumComment(album_id){
    return httpFile().post(`/countAlbumComment/${album_id}`);
}

export function countAlbumVideoEntry(album_id){
    return httpFile().post(`/countAlbumVideoEntry/${album_id}`);
}

export function checkAlbumTagsExists(album_id, tag_name){
    return httpFile().post(`/checkAlbumTagsExists/${album_id}/${tag_name}`);
}

export function getEventDetails(album_id){
    return httpFile().post(`/getEventDetails/${album_id}`);
}

export function getListPhoto_selected(album_id){
    return httpFile().post(`/getListPhoto_selected/${album_id}`);
}

export function getPhotoDetails(id){
    return httpFile().post(`/getPhotoDetails/${id}`);
}

export function getVideoDetails(id){
    return httpFile().post(`/getVideoDetails/${id}`);
}

export function getAlbumID(id){
    return httpFile().post(`/getAlbumID/${id}`);
}

export function getListVideo_selected(album_id){
    return httpFile().post(`/getListVideo_selected/${album_id}`);
}

export function getAlbumTags_selected(album_id){
    return httpFile().post(`/getAlbumTags_selected/${album_id}`);
}

export function getPhotoTags_selected(photo_id){
    return httpFile().post(`/getPhotoTags_selected/${photo_id}`);
}

export function getVideoTags_selected(video_id){
    return httpFile().post(`/getVideoTags_selected/${video_id}`);
}



export function deleteAlbum(albumID, data){
    return httpFile().post(`deleteAlbum/${albumID}`, data);
}


export function updateAlbum(albumID, data){
    return httpFile().post(`updateAlbum/${albumID}`, data);
}

export function updatePhoto(photo_id, data){
    return httpFile().post(`updatePhoto/${photo_id}`, data);
}

export function updateVideo(photo_id, data){
    return httpFile().post(`updateVideo/${photo_id}`, data);
}





export function addTrackingLog(data){
    return httpFile().post('/addTrackingLog', data);
}

export function addAlbumStatus_withAuthor(data){
    return httpFile().post('/addAlbumStatus_withAuthor', data);
}

export function updateAlbumStatus(albumID, data){
    return httpFile().post(`updateAlbumStatus/${albumID}`, data);
}

export function updateAlbumStatus_withPublisher(albumID, data){
    return httpFile().post(`updateAlbumStatus_withPublisher/${albumID}`, data);
}