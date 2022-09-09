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
                <div class="row">
                    <div class="col form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                            required>
                    </div>
                    <div class="col form-group">
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Your Email" required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                        required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
        </div>

    </div>

</div>


@include('Frontend.layouts.footer')
