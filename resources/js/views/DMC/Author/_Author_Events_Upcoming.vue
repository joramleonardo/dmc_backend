<template>
    <div>
        <div class="page-header d-print-none">
            <div class="tabler-container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col-auto ms-auto d-print-none">
                        <div class="d-flex">
                            <b-button size="sm" @click="addAlbumInfo()" class="mr-1" variant="primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                    Add Upcoming Event
                            </b-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="tabler-container-xl">
                <div class="row row-cards">
                    <div class="col-lg-12">
                        <div >
                            <b-tabs card>
                                <!-- Pending For Review -->
                                <b-tab active>
                                    <template #title>
                                        List of Upcoming Events
                                        <span v-if="totalRows_upcomingEvents != 0">
                                            <b-badge variant="danger">{{totalRows_upcomingEvents}}</b-badge>
                                        </span>
                                        <span v-else>
                                            <b-badge variant="secondary">0</b-badge>
                                        </span>
                                    </template>
                                    <div class="row row-cards" v-if="totalRows_upcomingEvents == 0">
                                        <div class="col-sm-6 col-lg-4" >
                                            <div class="row row-cards">
                                                <div class="h3 m-0">
                                                    NO DATA AVAILAVLE
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-cards" v-else>
                                        <b-table :items="list_upcomingEvents" :fields="fields_upcomingEvents" striped hover>
                                            <template #cell(actions)="row">
                                                <b-button variant="success">
                                                    Edit
                                                </b-button>
                                                <b-button variant="warning">
                                                    Unpublish
                                                </b-button>
                                            </template>
                                        </b-table>
                                    </div>
                                </b-tab>
                            </b-tabs>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <b-modal id="modal_addAlbumInfo" ref="modal_addAlbumInfo"  title="ADD UPCOMING EVENT" size="xl" centered hide-footer>
            <div class="card" id="createEventForm" >
                <div class="card-header">
                    <h3 class="card-title">Fill-out information</h3>
                </div>
                <div class="card-body">
                    <div class="row row-cards">
                        <div class="col-md-6">
                            <div class="mb-3 mb-0">
                            <label class="form-label"><span style="color: red;">* </span>Event Title:</label>
                            <textarea class="form-control" v-model="ticketData.eventTitle" placeholder="Enter Title.." required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                            <label class="form-label"><span style="color: red;">* </span>Organizing/Requesting Agency (Do not abbreviate):</label>
                            <b-form-input required id="input-2" v-model="ticketData.organizingAgency" placeholder="Enter Organizing/Requesting Agency..."   ></b-form-input>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                            <label class="form-label"><span style="color: red;">* </span>Date/s of Event (e.g. 01 JAN 2025):</label>
                            <b-form-input required id="input-2" v-model="ticketData.dateOfEvent" placeholder="Enter Date/s of Event..."   ></b-form-input>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                            <label class="form-label"><span style="color: red;">* </span>Location of Event (Function room, Hotel name, City):</label>
                            <b-form-input required id="input-2" v-model="ticketData.locationOfEvent" placeholder="Enter Location..."   ></b-form-input>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 mb-0">
                            <label class="form-label"><span style="color: red;">* </span>Event Brief Description (rationale, objectives, target audience, etc.):</label>
                            <textarea class="form-control" v-model="ticketData.briefDescription" rows="2" placeholder="Enter Brief Description.." required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                            <label class="form-label"><span style="color: red;">* </span>Event Banner (if available)</label>
                            <b-form-file placeholder="Choose a file or drop it here..." drop-placeholder="Drop file here..." v-model="ticketData.eventBanner">
                            </b-form-file>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <b-button variant="success" value="1" @click="saveUpcomingEvent()">Publish Upcoming Event</b-button>
                </div>
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
                    fields_upcomingEvents: [
                        { key: 'event_title', label: 'Event Title'},
                        { key: 'event_date', label: 'Date'},
                        { key: 'event_location', label: 'Location'},
                        { key: 'actions', label: 'Action' }
                    ],
                    pageOptions: [5, 10, 15, { value: 100, text: "Show a lot" }],
                    totalRows: 0,
                    currentPage: 20,
                    perPage: 10,
                    filterOn: [],
                    filter: null,
                    sortDirection: 'desc',
                    sortBy: 'id',
                    sortDesc: true,
                    displayName: '',
                    forReview: [],
                    forRevision: [],

                    list_upcomingEvents: [], totalRows_upcomingEvents: '',


                    finalTime: '',
                    finalDate: '',
                    finalDateTime: '',

                    eventDetails: {},
                    albumStatus:'',
                    ticketData:{
                        status:'',
                        reference_code:''
                    },
                    selected_event_duration: 'Please select event duration',
                    options_event_duration: [
                        { value: 'Please select event duration', text: 'Please select event duration', disabled: true},
                        { value: 'One day event', text: 'One day event' },
                        { value: 'Multiple days event (2 days and more)', text: 'Multiple days event (2 days and more)' },
                    ],

                }
            },
            mounted(){
                this.userData();
                this.createDate();
                this.loadForReviewList();
            },
            methods: {
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
                },
                createDate(){
                    const date = new Date();
                    const months = [
                        'January',
                        'February',
                        'March',
                        'April',
                        'May',
                        'June',
                        'July',
                        'August',
                        'September',
                        'October',
                        'November',
                        'December'
                        ];
                    const monthIndex = date.getMonth()
                    const monthName = months[monthIndex]
                    let currentDay= String(date.getDate()).padStart(2, '0');
                    let currentMonth = String(date.getMonth()+1).padStart(2,"0");
                    let currentYear = date.getFullYear();
                    let getHours = date.getHours();
                    let getMinutes = date.getMinutes();
                    let getSeconds = date.getSeconds();
                    let newformat = getHours >= 12 ? 'PM' : 'AM';
                    getHours = getHours % 12;
                    getHours = getHours ? getHours : 12;
                    getMinutes = getMinutes < 10 ? '0' + getMinutes : getMinutes;
                    this.finalTime = getHours + ":" + getMinutes + ":" + getSeconds + " " + newformat;
                    this.finalDate = monthName + " " + currentDay + " " + currentYear;
                    this.finalDateTime = monthName + " " + currentDay + " " + currentYear + " " + getHours + ":" + getMinutes + " " + newformat;
                },
                loadForReviewList: async function() {
                    try{
                        const response = await assets_service.getAllUpcomingEvents();
                        this.list_upcomingEvents = response.data;
                        console.log("hello");
                        console.log(this.list_upcomingEvents);
                        this.totalRows_upcomingEvents= this.list_upcomingEvents.length;
                    } catch(error) {
                        this.flashMessage.error({
                        message: 'Some error occured! Please try again.',
                        time: 5000
                        });
                    }
                },
                async reviewEventLink(album_id) {
                    return {
                        name: 'view-album', // Replace 'album' with the actual route name for the new page
                        params: { id: album_id }
                    };
                },
                async navigateToReview(album_id) {
                    const link = await this.reviewEventLink(album_id);
                    this.$router.push(link);
                },
                addAlbumInfo() {
                    this.$refs['modal_addAlbumInfo'].show();
                },
                saveUpcomingEvent: async function() {

                    if (
                        this.ticketData.eventTitle === undefined ||
                        this.ticketData.dateOfEvent === undefined  ||
                        this.ticketData.locationOfEvent === undefined  ||
                        this.ticketData.organizingAgency === undefined  ||
                        this.ticketData.briefDescription === undefined  ||
                        this.ticketData.eventBanner === undefined

                    ){

                            this.$toast.open({
                                message: 'Required Fields!',
                                type: 'error', // Options: 'success', 'info', 'error', 'default'
                                position: 'bottom-right', // Options: 'top', 'top-right', 'top-left', 'bottom', 'bottom-right', 'bottom-left'
                                duration: 5000,
                            });
                    }
                    else{

                        try{

                            // CREATE EVENT
                            let formData_eventData = new FormData();
                                formData_eventData.append('eventTitle', this.ticketData.eventTitle);
                                formData_eventData.append('dateOfEvent', this.ticketData.dateOfEvent);
                                formData_eventData.append('locationOfEvent', this.ticketData.locationOfEvent);
                                formData_eventData.append('organizingAgency', this.ticketData.organizingAgency);
                                formData_eventData.append('briefDescription', this.ticketData.briefDescription);
                                formData_eventData.append('eventBanner', this.ticketData.eventBanner);
                            const response_eventData = await assets_service.addUpcomingEventData(formData_eventData);



                        }catch (error) {
                            this.$toast.open({
                                message: 'An error occured!',
                                type: 'error', // Options: 'success', 'info', 'error', 'default'
                                position: 'bottom-right', // Options: 'top', 'top-right', 'top-left', 'bottom', 'bottom-right', 'bottom-left'
                                duration: 5000,
                            });
                        }

                        this.selected_category_album = 'Please select event duration';
                        this.ticketData.dateOfEvent = '';
                        this.ticketData.locationOfEvent = '';
                        this.ticketData.organizingAgency = '';
                        this.ticketData.briefDescription = '';
                        this.ticketData.listOfOfficials = '';
                        this.ticketData.eventBanner = '';
                        this.ticketData.eventProgram = '';
                        this.ticketData.specialRequest = '';

                        this.$toast.open({
                            message: 'Upcoming Event was Published successfully!',
                            type: 'success', // Options: 'success', 'info', 'error', 'default'
                            position: 'bottom-right', // Options: 'top', 'top-right', 'top-left', 'bottom', 'bottom-right', 'bottom-left'
                            duration: 5000,
                        });

                        // this.loadAllEvents();
                        // this.loadDraftList();
                        this.$refs.modal_addAlbumInfo.hide();

                    }
                },

            }
        }
</script>


