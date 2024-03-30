<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Repositories\AdminRepository;
class AdminAppointmentController extends Controller
{  
    private $adminRepository ;
    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }
    
    public function index()
    { 
       $appointments = $this->adminRepository->get_appointments();
       return view('admin.appointments.appointment', compact('appointments'));
    }
}




    