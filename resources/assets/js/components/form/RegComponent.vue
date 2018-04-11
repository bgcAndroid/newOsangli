<template>
    <div>
        
    <div class="alert alert-success text-center" v-if="msg">
            <strong>{{msg}}</strong>
    </div>
    <div class="login-container z-depth-2">
        <div class="center">
            <h2 class="login-header">Register</h2>
            <div class="img-icon">
                <i class="fas fa-user fa-2x"></i>
            </div>
        </div>
        <div class="form-container">
            <form action="" @submit.prevent="onsubmit" novalidate>
                <div class="form-group  text-center">
                    <input type="text" placeholder="First Name" name="name" class="form-control"
                           v-model="form.name">
                    <small class="text-danger" v-text="form.errors.get('name')"></small>
                </div>
                <div class="form-group  text-center">
                    <input type="text" placeholder="Last Name" name="lastName" class="form-control"
                           v-model="form.lastName">
                    <small class="text-danger" v-text="form.errors.get('lastName')"></small>
                </div>
                <div class="form-group  text-center">
                    <input type="text" placeholder="Mobile Number" name="mobile" class="form-control"
                           v-model="form.mobile">
                    <small class="text-danger" v-text="form.errors.get('mobile')"></small>
                </div>
                <div class="form-group text-center">
                    <input type="email" placeholder="Email" name="email" class="form-control"
                           v-model="form.email">
                    <small class="text-danger" v-text="form.errors.get('email')"></small>
                </div>
                <div class="form-group  text-center">
                    <input type="password" placeholder="Password" name="password" class="form-control"
                           v-model="form.password">
                    <small class="text-danger" v-text="form.errors.get('password')"></small>
                </div>
                <div class="form-group  text-center">
                    <input type="password" placeholder="Confirm Password" name="password_confirmation" class="form-control"
                           v-model="form.password_confirmation">
                    <small class="text-danger" v-text="form.errors.get('password_confirmation')"></small>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Submit</button>
                
            </form>
        </div>
    </div>
    </div>
</template>

<script>

    export default {
        data() {
            return {
                form:new Form({ 
                    name:'',
                    lastName:'',
                    mobile:'',
                    email: '',
                    password: '',
                    password_confirmation:''
                }),
                msg:'',
            }
        },
        methods:
        {
            onsubmit()
            {
                this.form.post('/register').then(res=>{
                    if(res){
                        this.msg="Please Check your email for verification link!"
                    }
                })              
            }
        }
    }
</script>

<style>
    .login-container {
        max-width: 350px;
        margin: 5% auto;
        border-radius: 15px;
    }

    .z-depth-2 {
        -webkit-box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.3);
        box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.3);
    }

    .center, .center-align {
        text-align: center;
    }

    .form-container {
        padding: 45px 35px;
    }

    body {
        background: #eee;
    }

    .login-header {
        padding-top: 30px;
        margin-bottom: 10px;
    }

    .btn {
        border-radius: 25px;
    }
    .form-control {
        border: 1px solid #8f959b;
        padding: 0.4rem 0.75rem 0.4rem 1.7rem;
        border-radius: 25px;

    }
</style>
