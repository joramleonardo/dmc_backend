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
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="tabler-container-xl">
                <div class="row row-cards">
                    <div class="col-lg-12">
                        <div >
                            <b-tabs card>
                                <b-tab active>
                                    <template #title>
                                        Pending for Review
                                        <span v-if="totalRows_forReview != 0">
                                            <b-badge variant="danger">{{totalRows_forReview}}</b-badge>
                                        </span>
                                        <span v-else>
                                            <b-badge variant="secondary">0</b-badge>
                                        </span>
                                    </template>
                                    <div class="row row-cards">
                                        <b-table :items="list_forReview" :fields="fields_PENDING" striped hover>

                                            
                                        <template #cell(actions)="row">
                                            <!-- <router-link :to="reviewEventLink(row.item.album_id)" target="_blank" style="text-decoration: none;"> -->
                                            <!-- <router-link :to="reviewEventLink(row.item.album_id)" target="_blank" style="text-decoration: none;">
                                                
                                                <b-button variant="info">Review</b-button>
                                            </router-link>                                     -->
                                            <b-button @click="navigateToReview(row.item.album_id)" variant="info">
                                                View Details
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

        

    </div>
</template>


<script type="text/javascript">
    
        import * as assets_service from '../../../services/assets_service.js';
        import * as auth_service from '../../../services/auth_service.js';

        export default {
            data() {
                return {
                    fields_PENDING: [
                        { key: 'album_id', label: 'Album ID'},
                        { key: 'event_title', label: 'Event Title'},
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
                    list_forReview: [],
                    totalRows_forReview: '',
                    
                    finalTime: '',
                    finalDate: '',
                    finalDateTime: '',

                    eventDetails: {},
                    albumStatus:'',
                    
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
                        const response = await assets_service.getAllListForReview();
                        this.list_forReview = response.data;
                        console.log(this.list_forReview);
                        this.totalRows_forReview= this.list_forReview.length;
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

            }
        }
</script>


