<template>
    <HeaderComponent></HeaderComponent>
 
    <div class="container-fluid">
         <div class="row">
            
             <SidebarComponent></SidebarComponent>
 
             <main  class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Clinics Patient</h1>
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
                                Patient name
                            </th>
                            <th scope="col">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="data in ClinicsPatient ">
                            <td>{{data.id}}</td>
                            <td>{{data.name}}</td>
                            <td v-if="data.doctor_id!=null"><button type="button" disabled class="btn btn-info">Booked</button></td>
                            <td v-else></td>
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
                ClinicsPatient : null
        };
    },
    created() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.get(`/api/getClinicPatient/${this.$route.params.id}/`)
                    .then(response => {
                        this.ClinicsPatient = response.data;
                        console.log(this.ClinicsPatient);
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            });
        },

    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            if(window.Laravel.user.user_type==1){
                window.location.href = "/clinics";
            }
        } 
        next();
    }

}

</script>