<template>

    <HeaderComponent></HeaderComponent>
 
     <div class="container-fluid">
         <div class="row">
            
             <SidebarComponent></SidebarComponent>
 
             <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Welcome to Ontology Dashboard</h1>
                </div>
                <p>Click on clinics on sidebar to view list of clinics</p>
             </main>
         </div>
     </div>
 </template>
 <script>
 import HeaderComponent from '../components/HeaderComponent.vue';
 import SidebarComponent from '../components/SidebarComponent.vue';
    export default {
        components: {
            HeaderComponent,
            SidebarComponent
        },
        data(){
            return {
                user_type:window.Laravel.user.user_type
            }
        },
        beforeRouteEnter(to, from, next) {
            if (!window.Laravel.isLoggedin) {
                window.location.href = "/";
            } 
            next();
        }
    }

</script>