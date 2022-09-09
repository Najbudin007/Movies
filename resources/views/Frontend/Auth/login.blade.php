@include('Frontend.layouts.header')

<div class="container contact mb-5">
    <div class="row">
<div class="col-md-3"></div>


        <div class="col-lg-6 mt-5">
            <div class="section-title mt-5">
                <h2>Login</h2>
                <h3><span>User Login</span></h3>
                <p>Please login to see you faviorte Movies</p>
              </div>

            <form action="{{route('login.submit')}}" method="post"  class="php-email-form">
                @csrf
        
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="User Email"
                        required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" id="password" placeholder="Password"
                        required>
                </div>

            <div class="row">
                <div class="col-md-9">
                    <p>Don't Have an account ? </p>
                </div>
                <div class="col-md-3">
                    <a href="" class="btn btn-sm btn-dark">Register</a>
                </div>
            </div>

              

                <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>

                <div class="text-center"><button type="submit">Sign In</button></div>
            </form>
        </div>

    </div>

</div>


@include('Frontend.layouts.footer')
