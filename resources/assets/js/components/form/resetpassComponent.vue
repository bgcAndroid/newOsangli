<template>
    <div>


        <div class="login-container z-depth-2">
            <div class="alert alert-success text-center" v-if="msg">
                <strong>{{msg}}</strong>
            </div>
            <div class="alert alert-danger text-center" v-if="mailErr">
                <strong>{{mailErr}}</strong>
            </div>
            <div class="center">
                <h2 class="login-header">Forgot Password?</h2>
            </div>
            <div class="form-container">
                <form action="" @submit.prevent="resetPass" novalidate>
                    <div class="form-group text-center">
                        <input type="email" placeholder="Email" name="oldemail" class="form-control"
                               v-model="form.email">
                        <small class="text-danger" v-text="form.errors.get('email')"></small>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">Get Reset Link</button>

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
                    email: '',

                }),

                msg:'',
                mailErr:'',

            }
        },
        methods:{
            resetPass()
            {
                   this.form.post('/password/email')
                    .then(res=>{
                        // console.log(res);
                        if(res.data=="We have e-mailed your password reset link!" && res.status===200)
                        {
                            this.msg=res.data;
                            this.mailErr="";
                        }

                        if(res.data.email && res.status===200)
                        {
                            this.mailErr=res.data.email;
                            this.msg="";
                        }

                })
                .catch(error=>{
                    // console.log(error);
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
