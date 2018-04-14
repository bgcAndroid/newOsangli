<template>
    <div class="login-container z-depth-2">
        <div class="center">
            <h2 class="login-header">Login</h2>
            <div class="img-icon">
                <i class="fas fa-user fa-5x"></i>
            </div>
            <div class="error text-danger">
              {{error}}
            </div>
        </div>
        <div class="form-container">
            <form action="" @submit.prevent="onsubmit">
                <div class="form-group">
                    <input type="email" placeholder="Email ID" name="email" class="form-control" required
                           v-model="details.email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required v-model="details.password">
                </div>
                <div class="form-check" style="margin-bottom: 10px">
                    <input type="checkbox" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Submit</button>
                <div class="center" style="margin-top: 5px">
                    <i class="fas fa-unlock-alt"></i>
                    <a href="#">Forgot Password</a>
                </div>
            </form>
        </div>
        <div class="form-footer center" style="padding-bottom: 10px">
            <a href="/register">Create New Account</a>
            <i class="fas fa-arrow-right"></i>
        </div>
    </div>
</template>

<script>

    export default {

        data() {
            return {
              details:{
                  email: '',
                password: ''
              },

              error:''

            }
        },
        methods: {
            onsubmit() {
                axios.post('/login', this.details)
                    .then(response=>{
                        if (response.data.message && response.status===200) {
                            window.location='/login';
                        }
                    })
                    .catch(error=> {
                        if (error.response.status === 422) {

                        }
                        this.error=error.response.data.message;
                        // console.log(error.response.data.message);

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
        /*background: linear-gradient(to right, #0033cc 0%, #3399ff 100%);*/
    }

    /*.btn:hover {*/

    /*background: linear-gradient(to left, #0033cc 0%, #3399ff 100%);*/
    /*}*/

    .form-control {
        border: 1px solid #8f959b;
        padding: 0.4rem 0.75rem 0.4rem 1.7rem;
        border-radius: 25px;

    }
</style>