<template>
    <HeaderComponent></HeaderComponent>
 
    <div class="container-fluid">
         <div class="row">
            
             <SidebarComponent></SidebarComponent>
 
             <main  class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Clinics Doctor</h1>
                </div>
                <div v-if="ClinicsDoctor === null" class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div v-else class="table-responsive small">
                    <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">
                                Doctor name
                            </th>
                            <th scope="col">
                                Click to Link to Doctor
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="data in ClinicsDoctor ">
                            <td>{{data.id}}</td>
                            <td>{{data.name}}</td>
                            <td><button type="button" class="btn btn-info" @click="sendBookingEmail(data.user_id,userid)">Link</button></td>
                        </tr>
                    </tbody>
                    </table>
                </div>
             </main>

         </div>
     </div>
    
</template>
<script>
import HeaderComponent from '../components/HeaderComponent.vue';
import SidebarComponent from '../components/SidebarComponent.vue';

export default {
    components:{
        HeaderComponent,
        SidebarComponent
    },
    data(){
        return  {
                ClinicsDoctor : null,
                userid:window.Laravel.user.id
        };
    },
    created() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.get(`/api/getClinicAllDoctors/${this.$route.params.id}/`)
                    .then(response => {
                        this.ClinicsDoctor = response.data;
                        console.log(this.ClinicsDoctor);
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            });
        },
    methods: {
        sendBookingEmail(id,userid){
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post(`/api/assignPatientToDoctors/`,{
                        doctorid:id,
                        user_id:userid
                    })
                    .then(response => {
                        this.ClinicsDoctor = response.data;
                        console.log(this.ClinicsDoctor);
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            });
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            if(window.Laravel.user.user_type==0){
                window.location.href = "/clinics";
            }
        } 
        next();
    }

}

</script>