<?php

namespace App\Http\Controllers;
use App\Repositories\DoctorRepository;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Banner;

class FavoriteDoctorsController extends Controller
{
    public function __construct(private DoctorRepository $doctorRepository)
    {
        
    }
    
    public function index()
    {
        $favoriteDoctors = $this->doctorRepository->getAllFavoriteDoctors();
        $banners=Banner::all();
        return view('patients.favoriteDoctors',compact('banners', 'favoriteDoctors'));
    }
}