<template>
    <div>


        <div class="login-container z-depth-2">
            <div class="alert alert-success text-center" v-if="msg">
                <strong>{{msg}}</strong>
            </div>
            <div class="alert alert-danger text-center" v-if="errmsg">
                <strong>{{errmsg}}</strong>
            </div>
            <div class="center">
                <h2 class="login-header">Reset Password</h2>
            </div>
            <div class="form-container">
                <form action="" @submit.prevent="resetPass" novalidate>
                    <input type="hidden" name="token" value="form.token" v-model="token">
                    <div class="form-group text-center">
                        <input type="email" placeholder="E-Mail Address" name="email" class="form-control"
                               v-model="details.email">
                        <small class="text-danger" v-if="errEmail">{{errEmail}}</small>
                    </div>
                    <div class="form-group  text-center">
                        <input type="password" placeholder="Password" name="password" class="form-control"
                               v-model="details.password">
                        <small class="text-danger" v-if="errPass">{{errPass}}</small>
                    </div>
                    <div class="form-group  text-center">
                        <input type="password" placeholder="Confirm Password" name="password_confirmation" class="form-control"
                               v-model="details.password_confirmation">
                        <!--<small class="text-danger" v-text="form.errors.get('password_confirmation')"></small>-->
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">Reset Password</button>

                </form>
            </div>
        </div>
    </div>
</template>


<script>

    export default {
        data() {
            return {
                details:{
                    email: '',
                    password: '',
                    password_confirmation: '',
                    token: this.token,
                },
                errEmail:'',
                errPass:'',
                msg:'',
                errmsg:'',
            }
        },
        props:['token'],
        methods:{
            resetPass()
            {
                axios.post('/password/reset', this.details)
                    .then(res=>{
                        if(res.status===200 && res.data=="Your password has been reset!")
                        {
                            this.msg=res.data;
                            this.errmsg="";
                            this.errPass="";
                            this.errEmail="";
                            window.location="/home";
                        }
                        if(res.status===200 && res.data.email)
                        {
                            this.errmsg=res.data.email;
                            this.msg="";
                            this.errPass="";
                            this.errEmail="";
                        }

                    })
                    .catch(error=>{
                        if(error.response.data.errors.email)
                        {
                            this.errEmail=error.response.data.errors.email[0];
                        }
                        else
                        {
                            this.errEmail="";
                        }
                        if(error.response.data.errors.password)
                        {
                            this.errPass=error.response.data.errors.password[0];
                        }
                        else
                        {
                            this.errPass="";
                        }
                    });
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
