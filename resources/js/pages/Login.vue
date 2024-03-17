<template>
    <div style="min-height: 100vh;" class="d-flex align-items-center py-4 bg-body-tertiary">
        <main class="form-signin w-100 m-auto">
           
            <form>
                <h1 class="mb-4 text-center"> Ontology</h1>
                <p class="mb-3 fw-normal text-center">Please sign in</p>

                <div class="form-floating mb-3" >
                    <input type="email" class="form-control" id="Email" placeholder="Email" v-model="formData.email" :class="{ 'is-invalid': v$.formData.email.$error }">
                    <div class="invalid-feedback" :style="{ display: v$.formData.email.$error ? 'block' : '' }">
                        <span v-for="error in v$.formData.email.$errors" :key="error.$uid">
                            {{ error.$message }} <br>
                        </span>
                    </div>
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="Password" placeholder="Password" v-model="formData.password" :class="{ 'is-invalid': v$.formData.password.$error }">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="invalid-feedback" :style="{ display: v$.formData.email.$error ? 'block' : '' }">
                    <div v-for="error in v$.formData.password.$errors" :key="error.$uid">
                        {{ error.$message }}
                    </div>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit" @click="handleSubmit">Sign in</button>
            </form>
            <div class="alert alert-danger mt-2" role="alert" v-if="loginErrorMessage">
                Username or password is incorrect!!
            </div>
        </main>
    </div>
</template>
<script>
import useValidate from '@vuelidate/core';
import { required, minLength, email } from '@vuelidate/validators';
    export default {
        data() {
            return {
                v$: useValidate(),
                loginErrorMessage:false,
                formData: {
                    email:"",
                    password:""
                }
            }
        },
        validations() {
                    return {
                        formData:{
                            email: { required, email },
                            password: {
                                required, 
                                minLength:minLength(6)
                            }
                        }
                    }
        },
        methods: {
            
            handleSubmit(e) {
                e.preventDefault()
                this.v$.$validate()
                console.log(this.v$.formData.$errors)
                if (!this.v$.formData.$invalid)  {
                    this.$axios.get('/sanctum/csrf-cookie').then(response => {
                        this.$axios.post('api/login', {
                            email: this.formData.email,
                            password: this.formData.password
                        })
                        .then(response => {
                            if (response.data.success) {
                                this.$router.go('/login')
                            } else {
                                this.loginErrorMessage = true
                            }
                        })
                        .catch(function (error) {
                            console.error(error);
                        });
                    })
                } else {
                    // Form is invalid, show error messages
                    console.log("Form is invalid. Please correct the errors.");
                }
            }
        },
        beforeRouteEnter(to,from, next){
            if (window.Laravel.isLoggedin) {
                    return next('Dashboard');
                
            }
            next();
        }
    }
</script>
<style>

    .removedDisplayNone{
        display:block
    }
</style>