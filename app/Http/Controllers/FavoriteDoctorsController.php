<?php

namespace App\Http\Controllers;
use App\Repositories\DoctorRepository;
use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\DB;
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
  
    

    public function destroy(Request $request, $id) {  
        $favorite = Favorite::find($id);
        if ($favorite) {
            $favorite->delete();
            return redirect('/favorite-doctors')->with('success', 'Favorite doctor deleted successfully');
        } else {
            return redirect('/favorite-doctors')->with('error', 'Favorite doctor not found');
        }
    }
  
}