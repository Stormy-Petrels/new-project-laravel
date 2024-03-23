<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">Mental Health</span>
    </a>
    <ul class="side-menu top">
        
        <li>
            <a href="{{url('/admin/patients')}}">
                <i class='bx bxs-shopping-bag-alt' ></i>
                <span  class="text">Patients</span>
            </a>
        </li>
        <li>
            <a href="{{url('/admin/doctors')}}">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Doctors</span>
            </a>
        </li>
        <li>
            <a href="{{url('/admin/appointment')}}">
                <i class='bx bxs-message-dots' ></i>
                <span class="text">Appointments</span>
            </a>
        </li>

        <li class="active">
            <a href="{{url('/admin/dashboard')}}" >
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
       
    </ul>
    <ul class="side-menu">
        <li>
            <a href="#" class="logout">
                <i class='bx bxs-log-out-circle' ></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>