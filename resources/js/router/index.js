import { createWebHistory, createRouter } from "vue-router";

import Login from "../pages/Login.vue";
import Dashboard from "../pages/Dashboard.vue";
import Clinics from "../pages/Clinics.vue";
import Doctor from "../pages/Doctor.vue";
import Patient from "../pages/Patient.vue";

export const routes = [

    {
        name:'/',
        path:'/',
        component: Login
    },
    {
        name:'login',
        path:'/login',
        component: Login
    },
    {
        name:'dashboard',
        path:'/Dashboard',
        component: Dashboard
    },
    {
        name:'Clinics',
        path:'/clinics',
        component: Clinics
    },
    {
        name: 'ClinicsDoctor',
        path: '/clinics/:id',
        component: Doctor
    },
    {
        name: 'ClinicsPatient',
        path: '/clinicsPatient/:id',
        component: Patient
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes: routes,
});

export default router;