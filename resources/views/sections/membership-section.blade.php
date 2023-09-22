<div class="section section-fluid-240">
    <div class="container">
        <div class="calculate-box">
            <!-- Section Title Start -->
            <div class="section-title text-center" data-aos="fade-up">
                <h2 class="title">Join Us</h2>
                <p>
                    If you want to be a member of our private garden/club fill in your details to request membership today.
                </p>
            </div>
            <!-- Section Title End -->
            <div class="calculate-form" data-aos="fade-up" data-aos-delay="300">
                <form action="{{ route('membership.create') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="row mb-n6">
                        <div class="col-lg-6 mb-6">
                            <input type="text" placeholder="First Name" name="first_name" required>
                        </div>
                        <div class="col-lg-6 mb-6">
                            <input type="text" placeholder="Last Name" name="last_name" required>
                        </div>
                        <div class="col-lg-6 mb-6">
                            <input type="text" placeholder="Email" name="email" required>
                        </div>
                        <div class="col-lg-6 mb-6">
                            <input type="text" placeholder="Phone Number" name="phone" required>
                        </div>
                        <div class="col-lg-6 mb-6">
                            <input type="text" placeholder="City" name="city" required>
                        </div>
                        <div class="col-lg-6 mb-6">
                            <input type="text" placeholder="Address" name="address" required>
                        </div>
                        <div class="col-12 text-center mb-6">
                            <button type="submit" class="btn btn-primary btn-hover-dark btn-width-200-60">
                                Request Now
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
