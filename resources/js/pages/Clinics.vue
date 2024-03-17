<template>
    <HeaderComponent></HeaderComponent>
 
    <div class="container-fluid">
         <div class="row">
            
             <SidebarComponent></SidebarComponent>
 
             <main  class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Clinics</h1>
                </div>
                <div v-if="Clinics === null" class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div v-else class="table-responsive small">
                    <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">
                                Clinic Name
                            </th>
                            <th v-if="user_type==0"scope="col">
                                See  Doctor
                            </th>
                            <th v-else scope="col">
                                See  Patient
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="data in Clinics ">
                            <td>{{data.id}}</td>
                            <td>{{data.clinic_name}}</td>
                            <td v-if="user_type==0">
                                <router-link :to="{name:'ClinicsDoctor', params: {id:data.id}}" class="btn btn-success">view</router-link>
                            </td>
                            <td v-else>
                                <router-link :to="{name:'ClinicsPatient', params: {id:data.id}}" class="btn btn-success">view</router-link>
                            </td>
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
            user_type:window.Laravel.user.user_type,
            Clinics : null
        };
    },
    created() {
            let url = (this.user_type == 0 ? '/api/getAllClinics' : '/api/getDoctorClinics/'+window.Laravel.user.id+'/');
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.get(url)
                    .then(response => {
                        this.Clinics = response.data;
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            });
        },

    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        } 
        next();
    }

}

</script>