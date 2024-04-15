<?php

namespace App\Http\Controllers;
use App\Repositories\DoctorRepository;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteDoctorsController extends Controller
{
    public function __construct(private DoctorRepository $doctorRepository)
    {
        
    }
    
    public function index()
    {
        // // Lấy dữ liệu từ model (truy vấn cơ sở dữ liệu)
        // $favoriteDoctors = Favorite::all();
        // // Load view và truyền dữ liệu vào view
        // return view('patients.favoriteDoctors', ['favoriteDoctors' => $favoriteDoctors]);

        $favoriteDoctors = $this->doctorRepository->getAllFavoriteDoctors();

   
        return view('patients.favoriteDoctors',['favoriteDoctors' => $favoriteDoctors]);
    }
}