<div id="header">
    <div id="header-content">
        <img loading="lazy" src="assets/patients/images/logo.png" id="logo" />
        <div id="header-title">Mental Health Care</div>
    </div>
    <div id="header-actions">
        <img loading="lazy" src="assets/patients/images/location.png" id="location-icon" />
        <div id="header-location">Son Tra, Da Nang Viet Nam</div>

        <img loading="lazy" src="assets/patients/images/email.png" id="location-icon" />
        <div id="header-location">Hospital@hello.com</div>
        <a href="#" id="book-now"><b>BOOK NOW</b></a>
    </div>
</div>

<div class="menu">
    <div class="menu-1">
        <a href="{{ url('/home') }}" class="name1 {{ Request::is('home') ? 'active' : '' }}">Home</a>
        <a href="{{ url('/about-us') }}" class="name2 {{ Request::is('about-us') ? 'active' : '' }}">About Us</a>
        <a href="{{ url('/department') }}" class="name3 {{ Request::is('department') ? 'active' : '' }}">Department</a>
        <a href="{{ url('/doctors') }}" class="name4 {{ Request::is('doctors') ? 'active' : '' }}">Doctors</a>
        <a href="{{ url('/services') }}" class="name5 {{ Request::is('services') ? 'active' : '' }}">Services</a>
        <a href="{{ url('/contact-us') }}" class="name6 {{ Request::is('contact-us') ? 'active' : '' }}">Contact Us</a>
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>

        <div claa="ml-8" style="margin-left: 15rem;">            
            <div id="user-info">
                <img id="profile-image" src="https://static.thenounproject.com/png/4314581-200.png" alt="Profile Image" style="width: 40px; border-radius:50%; height: 40px; object-fit: cover;">
                <div id="profile-links" style="display: none; width: 20%">
                    <a href="#">Profile</a>
                        <a href="/favorite-doctors">Favorite Doctors</a>
                        <a href="#">Appointment History</a>
                        <a href="">Logout</a>
                </div>
            </div>
            
            <div id="sign-in-up" class="btn-group" role="group" aria-label="Sign In and Sign Up">
                <a href="/sign-in" id="sign-in-link" class="btn text-decoration-none">Sign In</a>
                <a href="/sign-up" id="sign-up-link" class="btn text-decoration-none">Sign Up</a> 
            </div>
        </div>
    </div>
</div>
<script>
    var user = localStorage.getItem('user-info');
    if (user) {
        user = JSON.parse(user); 
        document.getElementById('user-info').style.display = "block"; 
        if (user.image) {
            document.getElementById('profile-image').src = user.image; 
        }
        document.getElementById('sign-in-up').style.display = "none"; 
    } else {
        document.getElementById('user-info').style.display = "none";
        document.getElementById('sign-in-up').style.display = "block"; 
    }
</script>

<div class="container-section">
    <div class="container-section2">
        <img loading="lazy" src="assets/patients/images/photo 1.png" class="imgs" />
        <div class="container-section3">
            <div class="container-section4">
                <img loading="lazy" src="assets/patients/images/heart.png" class="img-2" />
                <div class="container-section5">LIVE YOUR LIKE</div>
            </div>
            <div class="container-section6">
                We Care About
                <span style="color: rgba(28, 187, 208, 1)">Your Health</span>
            </div>
            <div class="container-section7">
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                accusantium doloremque laudantium
            </div>
            <a href="contact-us" class="submit"><b>CONTACT US</b></a>
        </div>
    </div>
    


