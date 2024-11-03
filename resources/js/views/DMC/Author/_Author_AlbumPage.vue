<template>
    <div>
        <div class="page-header d-print-none">
            <div class="tabler-container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            <span style="color: gray;">Events > </span>{{data_eventInformation.event_title}}
                        </h2>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="d-flex">
                            <b-button @click="viewAlbumInfo()" class="mr-1" variant="primary"  v-b-tooltip.hover title="Upload Photo">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-photo-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8h.01" /><path d="M12.5 21h-6.5a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v6.5" /><path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l4 4" /><path d="M14 14l1 -1c.67 -.644 1.45 -.824 2.182 -.54" /><path d="M16 19h6" /><path d="M19 16v6" /></svg>
                            </b-button>
                            <b-button @click="viewAlbumInfo()" class="mr-1" variant="warning"  v-b-tooltip.hover title="Upload Video">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-video-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 10l4.553 -2.276a1 1 0 0 1 1.447 .894v6.764a1 1 0 0 1 -1.447 .894l-4.553 -2.276v-4z" /><path d="M3 6m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" /><path d="M7 12l4 0" /><path d="M9 10l0 4" /></svg>    <!-- Upload Photo -->
                            </b-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="tabler-container-xl">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                Event Information
                                </h3>
                                <div class="card-actions">
                                    <b-button @click="editAlbumInfo()" class="mr-1" variant="success" v-b-tooltip.hover title="Edit Event">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="100"  height="100"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                    </b-button>
                                    <b-button @click="viewAlbumInfo()" class="mr-1" variant="danger"  v-b-tooltip.hover title="Delete Event">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                    </b-button>
                                </div>
                            </div>
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-5">Date:</dt>
                                    <dd class="col-7">{{data_eventInformation.event_date}}</dd>

                                    <dt class="col-5">Venue:</dt>
                                    <dd class="col-7">{{data_eventInformation.event_venue}}</dd>

                                    <dt class="col-5">Organizing Agency:</dt>
                                    <dd class="col-7">{{data_eventInformation.event_organizingAgency}}</dd>

                                    <dt class="col-5">Category:</dt>
                                    <dd class="col-7">{{data_eventInformation.event_category}}</dd>

                                    <dt class="col-5">Sector:</dt>
                                    <dd class="col-7">{{data_eventInformation.event_sector}}</dd>

                                    <dt class="col-5">Tags:</dt>
                                    <dd class="col-7">
                                        <span v-for="(event, index) in album_tags" :key="index">
                                            <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">
                                                {{event.album_tagName}}
                                            </a>
                                        </span>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row row-cards">
                            <div class="space-y">
                                <div class="card">
                                    <div class="row g-0">
                                        <div class="col-auto">
                                            <div class="card-body">
                                                <div class="avatar avatar-md" style="background-image: url(./static/jobs/job-1.jpg)"></div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card-body ps-0">
                                                <div class="row">
                                                    <div class="col">
                                                        <h4 class="mb-0"><a href="#">Lead Tailwind Developer</a></h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md">
                                                        <div class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                                                            <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" /><path d="M13 7l0 .01" /><path d="M17 7l0 .01" /><path d="M17 11l0 .01" /><path d="M17 15l0 .01" /></svg>
                                                            CMS Max</div>
                                                            <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11" /><path d="M9 7l4 0" /><path d="M9 11l4 0" /></svg>
                                                            Full-time</div>
                                                            <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" /></svg>
                                                            Remote / USA</div>
                                                        </div>
                                                        <div class="mt-3 list mb-0 text-secondary d-block d-sm-none">
                                                            <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" /><path d="M13 7l0 .01" /><path d="M17 7l0 .01" /><path d="M17 11l0 .01" /><path d="M17 15l0 .01" /></svg>
                                                            CMS Max</div>
                                                            <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11" /><path d="M9 7l4 0" /><path d="M9 11l4 0" /></svg>
                                                            Full-time</div>
                                                            <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" /></svg>
                                                            Remote / USA</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-auto">
                                                        <div class="mt-3 badges">
                                                            <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">PHP</a>
                                                            <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">Laravel</a>
                                                            <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">CSS</a>
                                                            <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">Vue</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <b-alert
                    :show="dismissCountDown"
                    dismissible
                    fade
                    variant="warning"
                    @dismiss-count-down="countDownChanged"
                    class="custom-alert"
                >
                    This alert will dismiss after {{ dismissCountDown }} seconds...
                </b-alert>
            </div>
        </div>

        
        
        <b-modal id="modal_albumInfo" ref="modal_albumInfo"  title="Event Information" size="lg" centered>
            <div class="card" id="createEventForm" >
                <div class="card-header">
                    <h3 class="card-title">EVENT INFORMATION</h3>
                </div>
                <div class="card-body">
                    <div class="row row-cards">
                        <div class="col-md-12">
                            <div class="mb-3">
                            <label class="form-label"><span style="color: red;">* </span>Event Title:</label>
                            <b-form-input v-model="data_eventInformation.event_title" placeholder="Enter Title..." required></b-form-input>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 mb-0">
                            <label class="form-label"><span style="color: red;">* </span>Short Description:</label>
                            <textarea class="form-control" v-model="data_eventInformation.event_description" rows="2" placeholder="Short description here.."></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="mb-3">
                            <label class="form-label"><span style="color: red;">* </span>Event Date:</label>
                            <b-form-datepicker required id="eventDate" v-model="data_eventInformation.event_date" class="mb-2"></b-form-datepicker>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="mb-3">
                            <label class="form-label"><span style="color: red;">* </span>Event Venue:</label>
                            <b-form-input required id="input-2" v-model="data_eventInformation.event_venue" placeholder="Enter Venue..."   ></b-form-input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                            <label class="form-label"><span style="color: red;">* </span>Organizing Agency/Office:</label>
                            <b-form-input v-model="data_eventInformation.event_organizingAgency" placeholder="Enter Organizing Agency/Office..." required></b-form-input>
                            </div>
                        </div>
                        <div class="ccol-sm-6 col-md-4">
                            <div class="mb-3">
                            <label class="form-label"><span style="color: red;">* </span>Category:</label>
                                <div class="col">
                                    <select class="form-select" v-model="data_eventInformation.event_category">
                                        <option selected disabled>Please select category</option>
                                        <option value="1">Assistant Secretaries</option>
                                        <option value="2">Deputy Directors</option>
                                        <option value="3">Directors</option>
                                        <option value="4">Executive Director</option>
                                        <option value="5">Group photo</option>
                                        <option value="6">Launch/ Events/Activities</option>
                                        <option value="7">Lecturers/Resource Speaker</option>
                                        <option value="8">MOA/MOU signing</option>
                                        <option value="9">Participants</option>
                                        <option value="10">Portraits</option>
                                        <option value="11">Product/Service</option>
                                        <option value="12">Project visits</option>
                                        <option value="13">Project/Program activities</option>
                                        <option value="14">Regional Directors</option>
                                        <option value="15">Secretaries</option>
                                        <option value="16">Service Directors</option>
                                        <option value="17">Undersecretaries</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="mb-3">
                                <label class="form-label"><span style="color: red;">* </span>Sector:</label>
                                <div class="col">
                                    <select class="form-select" v-model="data_eventInformation.event_sector">
                                        <option selected disabled>Please select sector</option>
                                        <option value="1">Collegial and Scientific Bodies</option>
                                        <option value="2">Regional Offices and S&T Provincial Centers</option>
                                        <option value="3">Research and Development Institutes</option>
                                        <option value="4">Scientific and Technological Services</option>
                                        <option value="5">Sectoral Planning Councils</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="color: black !important">
                            <div class="mb-3" style="color: black !important">
                                <label class="form-label"><span style="color: red;">* </span>Tags:</label>
                                <b-form-tags style="background-color: #151F2C !important" required input-id="tags-basic" name="tags" v-model="album_tags_new" placeholder="Add new tags separated by enter key..."></b-form-tags>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <template #modal-footer>
                <b-button variant="secondary" @click="$bvModal.hide('modal_albumInfo')">Close</b-button>
                <b-button variant="warning" value="1" @click="updateAlbum()">Update</b-button>
            </template>
        </b-modal>

        
                            
    </div>
</template>

<script type="text/javascript">
            
        import * as assets_service from '../../../services/assets_service.js';
        import * as auth_service from '../../../services/auth_service.js';

        export default {
            data() {
                return {
                    event_id : this.$route.params.id,
                    data_eventInformation: [],
                    data_eventInformation_length: 0,
                    event_tagsss: [],
                    album_tags: [],
                    album_tags_new:[],
                    data_eventInformation:{},
                    dismissSecs: 5,
                    dismissCountDown: 0,
                    showDismissibleAlert: false
                }
            },
            mounted(){
                this.loadEventDetails();
            },
            methods: {
                loadEventDetails: async function(data){

                    const response_eventDetails = await assets_service.getEventDetails(this.event_id);
                    this.data_eventInformation = response_eventDetails.data[0];
                    this.data_eventInformation_length = this.data_eventInformation.length;

                    const response = await assets_service.getTags_selected(this.data_eventInformation.album_id);
                    this.album_tags = response.data;
                    console.log( this.album_tags);

                },
                editAlbumInfo: async function(data){

                    const response_eventDetails = await assets_service.getEventDetails(this.event_id);
                    this.data_eventInformation = response_eventDetails.data[0];
                    this.data_eventInformation_length = this.data_eventInformation.length;

                    const response = await assets_service.getTags_selected(this.data_eventInformation.album_id);
                    this.album_tags_new = response.data.map(item => item.album_tagName);
                    console.log(this.album_tags_new);

                    this.$refs['modal_albumInfo'].show();
                },
                updateAlbum: async function() {
                    // console.log(this.data_eventInformation.event_title);
                    // console.log(this.data_eventInformation.event_description);
                    // console.log(this.data_eventInformation.event_date);
                    // console.log(this.data_eventInformation.event_venue);
                    // console.log(this.data_eventInformation.event_organizingAgency);
                    // console.log(this.data_eventInformation.event_category);
                    // console.log(this.data_eventInformation.event_sector);
                    // console.log(this.album_tags_new);

                    try{
                        let formData_ = new FormData();
                        formData_.append('event_title', this.data_eventInformation.event_title);
                        formData_.append('event_description', this.data_eventInformation.event_description);
                        formData_.append('event_date', this.data_eventInformation.event_date);
                        formData_.append('event_venue', this.data_eventInformation.event_venue);
                        formData_.append('event_organizingAgency', this.data_eventInformation.event_organizingAgency);
                        formData_.append('event_category', this.data_eventInformation.event_category);
                        formData_.append('event_sector', this.data_eventInformation.event_sector);
                        formData_.append('event_tags', this.album_tags_new);
                        
                        const response_ = await assets_service.updateAlbum(this.event_id, formData_);
                        this.$refs['modal_albumInfo'].hide();
                        console.log("Event Information updated successfully!");
                        this.dismissCountDown = this.dismissSecs
                    }
                    catch(error){
                        console.log("An error occurred!");
                    }
                }
            }
        }
</script>

<style>
    .custom-alert {
        position: fixed;
        bottom: 10px; /* Adjust to move closer or farther from the bottom */
        right: 10px; /* Adjust to move closer or farther from the right */
        z-index: 1050; /* Ensure it's on top of other elements */
        max-width: 300px; /* Optional: Control width */
        padding: 15px; /* Add padding for better spacing within the alert */
    }
</style>