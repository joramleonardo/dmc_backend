<template>
    <div>
        <div class="page-header d-print-none">
            <div class="tabler-container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Events
                        </h2>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="d-flex">
                            <b-button size="sm" @click="viewAlbumInfo()" class="mr-1" variant="primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                    Add Event
                            </b-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="tabler-container-xl">
                <div class="row row-cards">
                    <div class="col-sm-6 col-lg-4" v-for="(event, index) in list_allEvents" :key="index">
                        <router-link v-bind:to="{name : 'album', params: { id: event.id}}"  target="_blank" style="text-decoration: none;">
                            <div class="card card-sm">
                                <a class="d-block">
                                    <img src="images/no_img.jpg" class="card-img-top">
                                </a>
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div style="font-size: 12px; font-weight: 600;">
                                            <div>{{event.event_title}}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div style="margin-top: 1%;">
                                            <div v-if="event.album_status === 'Saved as Draft' ">
                                                <span class="badge bg-azure text-azure-fg">Draft</span>
                                            </div>
                                            <div v-if="event.album_status === 'Submitted for Review' ">
                                                <span class="badge bg-orange text-orange-fg">Under Review</span>
                                            </div>
                                            <div v-if="event.album_status === 'Published' ">
                                                <span class="badge bg-green text-green-fg">Published</span>
                                            </div>
                                            <div v-if="event.album_status === 'Unpublished' ">
                                                <span class="badge bg-red text-red-fg">Unpublished</span>
                                            </div>
                                            <div v-if="event.album_status === 'For Revision' ">
                                                <span class="badge bg-yellow text-yellow-fg">For Revision</span>
                                            </div>
                                        </div>
                                        <div class="ms-auto">
                                            <a class="text-secondary">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-photo"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8h.01" /><path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z" /><path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" /><path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3" /></svg>
                                                467
                                            </a>
                                            <a class="ms-3 text-secondary">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-video"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 10l4.553 -2.276a1 1 0 0 1 1.447 .894v6.764a1 1 0 0 1 -1.447 .894l-4.553 -2.276v-4z" /><path d="M3 6m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" /></svg>
                                                67
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>                           
                        </router-link>
                    </div>
                </div>
            </div>
        </div>

        <b-modal id="modal_albumInfo" ref="modal_albumInfo"  title="Event Information" size="lg" centered ok-only >
            
            <div class="card" id="createEventForm" >
                <div class="card-header">
                    <h3 class="card-title">EVENT INFORMATION</h3>
                </div>
                <div class="card-body">
                    <div class="row row-cards">
                        <div class="col-md-12">
                            <div class="mb-3">
                            <label class="form-label"><span style="color: red;">* </span>Event Title:</label>
                            <b-form-input v-model="ticketData.eventTitle" placeholder="Enter Title..." required></b-form-input>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 mb-0">
                            <label class="form-label"><span style="color: red;">* </span>Short Description:</label>
                            <textarea class="form-control" v-model="ticketData.eventDescription" rows="2" placeholder="Short description here.."></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="mb-3">
                            <label class="form-label"><span style="color: red;">* </span>Event Date:</label>
                            <b-form-datepicker required id="eventDate" v-model="ticketData.eventDate" class="mb-2"></b-form-datepicker>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="mb-3">
                            <label class="form-label"><span style="color: red;">* </span>Event Venue:</label>
                            <b-form-input required id="input-2" v-model="ticketData.eventVenue" placeholder="Enter Venue..."   ></b-form-input>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3">
                            <label class="form-label"><span style="color: red;">* </span>Organizing Agency/Office:</label>
                            <b-form-input v-model="selected_agency" placeholder="Enter Organizing Agency/Office..." required></b-form-input>
                            </div>
                        </div>
                        <div class="ccol-sm-6 col-md-3">
                            <div class="mb-3">
                            <label class="form-label"><span style="color: red;">* </span>Category:</label>
                                <div class="col">
                                    <select class="form-select" v-model="selected_category_album">
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
                                    <select class="form-select" v-model="selected_sector">
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
                                <b-form-tags style="background-color: #151F2C !important" required input-id="tags-basic" name="tags" v-model="ticketData.eventTags" placeholder="Add new tags separated by enter key..."></b-form-tags>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <b-button variant="warning" value="1" @click="createTicket_external(1)">Save as Draft</b-button>
                    <b-button variant="primary" value="2" @click="createTicket_external(2)">Submit to Publisher</b-button>
                    <b-button variant="danger" >Reset</b-button>
                </div>
            </div>
        </b-modal>

        <b-modal id="modal_savedSuccessfully" ref="modal_savedSuccessfully" centered title="Success" hide-footer no-close-on-backdrop
        :header-bg-variant="headerBG_savedSuccessfully" :header-text-variant="headerText_savedSuccessfully">
            <div>
                <h5>Album was created successfully!</h5>
            </div>
            <div>
                <b-button class="mt-3" variant="primary" @click="reloadPage()">Okay</b-button>
            </div>
        </b-modal>

    </div>
</template>


<script type="text/javascript">
    
        import * as assets_service from '../../../services/assets_service.js';
        import * as auth_service from '../../../services/auth_service.js';

        export default {
            data() {
                return {
                    displayName: '',
                    buttonValue: '',
                    albumStatus:'',
                    headerBG_requiredfields: 'danger',
                    headerText_requiredfields: 'light',
                    headerBG_ConfirmCreateAlbum: 'info',
                    headerText_ConfirmCreateAlbum: 'light',
                    headerBG_savedSuccessfully: 'success',
                    headerText_savedSuccessfully: 'light',
                    tabIndex: 0,
                    tabIndex_photo: 0,
                    photoData: [],
                    photo_tabs: [
                        {
                            photo_fileName: null,
                            photo_personInvolved: '',
                            photo_title: '',
                            photo_category: '',
                            photo_description: '',
                            photo_photographer: ''
                        }
                    ],
                    vidClip_tabs: [
                        {
                            video_link: null,
                            video_title: '',
                            video_personInvolved: '',
                            video_category: '',
                            video_duration: '',
                            video_type: '',
                            video_description: '',
                            video_videographer:''
                        }
                    ],
                    photo_tabCounter: 1,
                    vidClip_tabCounter: 1,
                    album_id: 1,
                    photo_id: 1,
                    video_id: 1,
                    value: ['Secretaries', 'tag1', 'tag2'],
                    form: {
                        email: '',
                        name: '',
                        food: null,
                        checked: []
                    },
                    selected_category_album: null,
                    options_category_album: [
                        { value: null, text: 'Please select category', disabled: true},
                        { value: '1', text: 'Assistant Secretaries' },
                        { value: '2', text: 'Deputy Directors' },
                        { value: '3', text: 'Directors' },
                        { value: '4', text: 'Executive Director' },
                        { value: '5', text: 'Group photo' },
                        { value: '6', text: 'Launch/ Events/Activities' },
                        { value: '7', text: 'Lecturers/Resource Speaker' },
                        { value: '8', text: 'MOA/MOU signing' },
                        { value: '9', text: 'Participants' },
                        { value: '10', text: 'Portraits' },
                        { value: '11', text: 'Product/Service' },
                        { value: '12', text: 'Project visits' },
                        { value: '13', text: 'Project/Program activities' },
                        { value: '14', text: 'Regional Directors' },
                        { value: '15', text: 'Secretaries' },
                        { value: '16', text: 'Service Directors' },
                        { value: '17', text: 'Undersecretaries' }
                    ],
                    selected_category_album: null,
                    options_category_album: [
                        { value: null, text: 'Please select category', disabled: true},
                        { value: '1', text: 'Anniversary' },
                        { value: '2', text: 'Awarding Ceremonies' },
                        { value: '3', text: 'Building Inauguration' },
                        { value: '4', text: 'Conference' },
                        { value: '5', text: 'Convention' },
                        { value: '6', text: 'Exhibits' },
                        { value: '7', text: 'Forum' },
                        { value: '8', text: 'MOA Signing' },
                        { value: '9', text: 'MOU Signing' },
                        { value: '10', text: 'NSTW' },
                        { value: '11', text: 'NYSTIF' },
                        { value: '12', text: 'Program Launch' },
                        { value: '13', text: 'Prject Launch' },
                        { value: '14', text: 'Project Visit' },
                        { value: '15', text: 'RSTW' },
                        { value: '16', text: 'Scholarship' },
                        { value: '17', text: 'Scientific Meeting' },
                        { value: '18', text: 'Training/Seminar' }
                    ],
                    selected_category_photo: null,
                    options_category_photo: [
                        { value: null, text: 'Please select category', disabled: true},
                        { value: '1', text: 'Assistant Secretaries' },
                        { value: '2', text: 'Deputy Directors' },
                        { value: '3', text: 'Directors' },
                        { value: '4', text: 'Executive Director' },
                        { value: '5', text: 'Group photo' },
                        { value: '6', text: 'Launch/ Events/Activities' },
                        { value: '7', text: 'Lecturers/Resource Speaker' },
                        { value: '8', text: 'MOA/MOU signing' },
                        { value: '9', text: 'Participants' },
                        { value: '10', text: 'Portraits' },
                        { value: '11', text: 'Product/Service' },
                        { value: '12', text: 'Project visits' },
                        { value: '13', text: 'Project/Program activities' },
                        { value: '14', text: 'Regional Directors' },
                        { value: '15', text: 'Secretaries' },
                        { value: '16', text: 'Service Directors' },
                        { value: '17', text: 'Undersecretaries' }
                    ],
                    options_category_type: [
                        { value: null, text: 'Please select video type', disabled: true},
                        { value: '1', text: 'Full Video' },
                        { value: '2', text: 'Video Clip' },
                    ],
                    selected_category_video: null,
                    options_category_video: [
                        { value: null, text: 'Please select category', disabled: true},
                        { value: '1', text: 'Anniversaries' },
                        { value: '2', text: 'Awarding Ceremonies' },
                        { value: '3', text: 'Competition/ Contests' },
                        { value: '4', text: 'Exhibits' },
                        { value: '5', text: 'Lectures, Discussion, Seminar, Training' },
                        { value: '6', text: 'MOA/MOU signing' },
                        { value: '7', text: 'NSTW' },
                        { value: '8', text: 'NYSTIF' },
                        { value: '9', text: 'Program Launch' },
                        { value: '10', text: 'Project Launch' },
                        { value: '11', text: 'Project/Program activities' },
                        { value: '12', text: 'RSTW' },
                        { value: '13', text: 'Same day edits' },
                        { value: '14', text: 'Speeches' },
                        { value: '15', text: 'Others' }
                    ],
                    selected_sector: null,
                    options_sector: [
                        { value: null, text: 'Please select sector', disabled: true},
                        { value: '1', text: 'Collegial and Scientific Bodies' },
                        { value: '2', text: 'Regional Offices and S&T Provincial Centers' },
                        { value: '3', text: 'Research and Development Institutes' },
                        { value: '4', text: 'Scientific and Technological Services' },
                        { value: '5', text: 'Sectoral Planning Councils' }
                    ],
                    selected_allAgency: null,
                    options_allAgency: [
                        { value: null, text: 'Please select organizing agency/office', disabled: true},
                        { value: '1', text: 'Food and Nutrition Research Institute' },
                        { value: '2', text: 'Forest Product Research and Industries Development Commission' },
                        { value: '3', text: 'Forest Products Research and Development Institute' },
                        { value: '4', text: 'Gender and Development and Regional Support Service' },
                        { value: '5', text: 'Industrial Technology Development Institute ' },
                        { value: '6', text: 'Metals Industry Research and Development Center' },
                        { value: '7', text: 'National Academy of Science and Technology' },
                        { value: '8', text: 'National Research Council of the Philippines' },
                        { value: '9', text: 'Office of the Secretary' },
                        { value: '10', text: 'Office of the Undersecretary for Regional Operations' },
                        { value: '11', text: 'Office of the Undersecretary for Research and Development' },
                        { value: '12', text: 'Office of the Undersecretary for Scientific and Technical Services' },
                        { value: '13', text: 'Office of the Undersecretary for Special Concerns' },
                        { value: '14', text: 'Philippine Atmospheric, Geophysical and Astronomical Services Administration' },
                        { value: '15', text: 'Philippine Council for Agriculture and Resources and Research Development' }
                    ],
                    selected_agency: null,
                    options_agency: [
                        { value: null, text: 'Please select organizing agency/office', disabled: true},
                        { value: '1', text: 'Attached Agencies' },
                        { value: '2', text: 'Regional Offices' },
                        { value: '3', text: 'Provincial S&T Centers (PSTCs)' }
                    ],
                    show: true,
                    ticketData:{
                        status:'',
                        reference_code:''
                    },
                    list_allEvents: [],
                    totalRows_allEvents: '',
                }
            },
            mounted(){
                this.userData();
                this.loadAllEvents();
            },
            methods: {
                // open_requiredfields(){
                //     this.$refs.modal_requiredfields.show()
                // },
                close_requiredfields(){
                    this.$refs.modal_requiredfields.hide()
                },
                openConfirmCreateAlbum(val){
                    this.buttonValue = val;
                    console.log(this.buttonValue);
                
                    if (this.ticketData.eventTitle === undefined || 
                        this.selected_category_album === null  ||  
                        this.selected_sector === null  ||  
                        this.ticketData.eventDescription === undefined  ||  
                        this.selected_agency === null  ||  
                        this.ticketData.eventDate === undefined  ||  
                        this.ticketData.eventVenue === undefined  ||  
                        this.ticketData.eventTags === undefined  ){

                            this.$refs.modal_requiredfields.show()
                    }
                    else{
                        this.$refs.modal_ConfirmCreateAlbum.show()
                    }
                },
                hide_ConfirmCreateAlbum() {
                    this.$refs.modal_ConfirmCreateAlbum.hide()
                },
                reloadPage() {
                    this.$refs.modal_savedSuccessfully.hide();
                    this.$refs.modal_albumInfo.hide();
                    this.loadAllEvents();
                    // window.location.reload();
                },
                createTicket_external: async function(value) {

                    if (value == "1"){
                        this.albumStatus = "Saved as Draft"
                    }
                    else if (value == "2"){
                        this.albumStatus = "Submitted for Review"
                    }
                    else if (value == "3"){
                        this.albumStatus = "Published"
                    }
                    else if (value == "4"){
                        this.albumStatus = "Unpublished"
                    }
                    else if (value == "5"){
                        this.albumStatus = "For Revision"
                    }

                    console.log(this.albumStatus);

                    try{
                        // Generate Album ID
                        const const_1 = await assets_service.countAlbumEntry();
                        let totalAlbumEntry = const_1.data;
                        if (totalAlbumEntry ==0 ){
                            this.album_id = "PA2024-0001";
                        }
                        else if (totalAlbumEntry <= 9 ){
                            let i = totalAlbumEntry + 1;
                            this.album_id = "PA2024-000" + i;
                        }
                        else if (totalAlbumEntry > 9){
                            let i = totalAlbumEntry + 1;
                            this.album_id = "PA2024-00" + i;
                        }
                        
                        // Create an Album
                        let formData_eventData = new FormData();
                        formData_eventData.append('album_id', this.album_id);
                        formData_eventData.append('event_title', this.ticketData.eventTitle);
                        formData_eventData.append('event_category', this.selected_category_album);
                        formData_eventData.append('event_sector', this.selected_sector);
                        formData_eventData.append('event_description', this.ticketData.eventDescription);
                        formData_eventData.append('event_organizingAgency', this.selected_agency);
                        formData_eventData.append('event_date', this.ticketData.eventDate);
                        formData_eventData.append('event_venue', this.ticketData.eventVenue);
                        formData_eventData.append('event_tags', this.ticketData.eventTags);
                        const response_eventData = await assets_service.addEventData(formData_eventData);
                        
                        // Save tags
                        let formData_albumTags = new FormData();
                        let tagList = [];
                        tagList = this.ticketData.eventTags;

                        for (let i = 0; i < tagList.length; i ++) {
                            let tagName = tagList.slice(i, i+1);

                            formData_albumTags.append('album_id', this.album_id);
                            formData_albumTags.append('album_tagName', tagName);

                            const response_albumTags = await assets_service.addAlbumTags(formData_albumTags);
                        }

                        
                        // Save Album Status 
                        let formData_albumStatus = new FormData();
                        formData_albumStatus.append('album_id', this.album_id);
                        formData_albumStatus.append('album_status', this.albumStatus);
                        const response_albumStatusData = await assets_service.addAlbumStatus(formData_albumStatus);


                        


                    }catch (error) {
                        
                    }
                    this.$refs.modal_savedSuccessfully.show()
                },
                changeStatus: async function (){

                    if (this.buttonValue == "1"){
                        this.albumStatus = "Saved as Draft"
                    }
                    else if (this.buttonValue == "2"){
                        this.albumStatus = "Submitted for Review";
                    }
                    else if (this.buttonValue == "3"){
                        this.albumStatus = "Published";
                    }
                    else if (this.buttonValue == "4"){
                        this.albumStatus = "Unpublished";
                    }
                    else if (this.buttonValue == "5"){
                        this.albumStatus = "For Revision";
                    }

                    try{
                        
                        let formData_albumStatus = new FormData();
                        formData_albumStatus.append('album_id', this.album_id);
                        formData_albumStatus.append('album_status', this.albumStatus);
                        const response_albumStatusData = await assets_service.addAlbumStatus(formData_albumStatus);
                    }catch(error){

                    }
                },
                loadAllEvents: async function() {
                    try{
                        const response_allEvents = await assets_service.getAllListEvents();
                        this.list_allEvents = response_allEvents.data;
                        this.totalRows_allEvents = this.list_allEvents.length;
                        console.log(this.list_allEvents);
                    } catch(error) {
                        this.flashMessage.error({
                        message: 'Some error occured! Please try again.',
                        time: 5000
                        });
                    }
                },
                countAlbumPhotoEntry: async function(){
                    
                        // const const_2 = assets_service.countAlbumPhotoEntry(this.album_id);
                        // let totalAlbumPhotoEntry = const_1.data;
                        // return totalAlbumPhotoEntry;
                        return "hello";
                        // if (totalAlbumPhotoEntry <= 9){
                        //     let i = totalAlbumPhotoEntry++;
                        //     this.photo_id_id = "PH2024-0000" + i;
                        // }
                        // else if (totalAlbumPhotoEntry > 9){
                        //     let i = totalAlbumPhotoEntry++;
                        //     this.photo_id_id = "PH2024-000" + i;
                        // }
                },
                clearEntry(index){
                    this.photo_tabs.splice(index,1);
                },
                viewAlbumInfo() {
                    
                    this.$refs['modal_albumInfo'].show();
                },
                userData: async function(){
                    try{

                        
                        const response = await auth_service.getUserData();
                        this.displayName=response.data.user.name;
                    } catch(error) {
                        this.flashMessage.error({
                        message: 'Some error occured! Please try again.',
                        time: 5000
                        });
                    }
                }
            }
        }
</script>


