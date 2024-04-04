<?php

namespace App\Http\Controllers;
use App\Repositories\DoctorRepository;
use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\DB;


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

        // dd($favoriteDoctors);
        return view('patients.favoriteDoctors',['favoriteDoctors' => $favoriteDoctors]);
    }

    public function destroy(Request $request, $id) {  
        $favorite = DB::table('favorites')->where('id', $id)->first();
        DB::table('favorites')->where('id', $id)->delete();
        return redirect('/favorite-doctors');
    }
}

