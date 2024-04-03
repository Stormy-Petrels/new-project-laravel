{{-- Xây dựng layout bằng tính kế thừa --}}
@extends('layouts.patients.master')
@section('title', 'Mental Health Care')

@section('header')
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
            <div>
                <div id="user-info">

                    <script>
                        var user = localStorage.getItem('user-info');
                        if (user) {
                            user = JSON.parse(user); // Chuyển đổi dữ liệu thành đối tượng JSON
                            if (user.image) {
                                document.getElementById('profile-image').src = user.image; // Thiết lập src cho hình ảnh
                            }
                        }
                    </script>
                
                    <img id="profile-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-Z16m8LamczQtv32mpIB0V2dvphxoWNQUam3qelv703soHZccCy_cKV_02g&s" alt="Profile Image" style="width: 50px; border-radius:50%; height: 50px; object-fit: cover;">
                
                    <div id="profile-links" style="display: none; width: 20%">
                        <a href="#">Profile</a>
                            <a href="/favorite-doctors">Favorite Doctors</a>
                            <a href="#">Appointment History</a>
                            <a href="">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <body>
        <div class="container">
            <main>
                <section id="favorite-doctors">
                    <h2 class="p-4">List Favorite Doctors</h2>
                    <ul id="doctor-list">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%">STT</th>
                                    <th width="15%">Name Doctor</th>
                                    <th width="15%">User ID</th>
                                    <th width="15%">Doctor ID</th>
                                    <th width="5%">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($favoriteDoctors))
                                    @foreach ($favoriteDoctors as $key => $item)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$item->doctor_name}}</td>
                                            <td>{{$item->user_id}}</td>
                                            <td>{{$item->doctor_id}}</td>
                                            <td>
                                                <a onclick="return confirm('Bạn có chắc chắc muốn xóa?')" href="" class="btn btn-danger btn-sm">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">Không có người dùng</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </ul>
                </section>
            </main>
        </div>
    </body>
@endsection

@section('footer')
    <div class="footer">
        <div class="div-2">
            <div class="div-3">
                <div class="div-4">
                    <img loading="lazy" src="assets/patients/images/logo.png" style="width:50px;"/>
                    <div class="div-5">Mental Health Care</div>
                </div>
                <div class="div-6">
                    <img loading="lazy" src="assets/patients/images/location.png" class="img-2" />
                    <div class="div-7">Son Tra, Da Nang Viet Nam</div>
                </div>
                <div class="div-8">
                    <img loading="lazy" src="assets/patients/images/email.png" class="img-3" />
                    <div class="div-9">Hospital@hello.com</div>
                </div>
                <div class="div-10">
                    <img loading="lazy" src="assets/patients/images/phone.png" class="img-4" />
                    <div class="div-11">(+487) 384 9452</div>
                </div>
            </div>
            <div class="div-12">
                <div class="div-13">Service</div>
                <div class="div-14">
                    Web Design
                    <br />
                    Development
                    <br />
                    SEO
                </div>
            </div>
            <div class="div-15">
                <div class="div-16">Hospital</div>
                <div class="div-17">
                    Service
                    <br />
                    Features
                    <br />
                    Our Team
                    <br />
                    Portfolio
                    <br />
                    Blog
                    <br />
                    Contact Us
                </div>
            </div>
            <div class="div-18">
                <div class="div-19">Our Social Media</div>
                <div class="div-20">
                    Instagram
                    <br />
                    Facebook
                    <br />
                    Twitter
                </div>
            </div>
        </div>
    </div>
@endsection


