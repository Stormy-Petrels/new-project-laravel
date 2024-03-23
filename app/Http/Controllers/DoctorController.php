<?php

namespace App\Http\Controllers;

use App\Repositories\AdminRepository;
use Illuminate\Http\Request;
use App\Repositories\DoctorRepository;
use App\Repositories\UserRepository;
use  App\Repositories\PatientRepository;
use App\Models\Role;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;

class DoctorController extends Controller
{
    private $adminRepository;
    private $patientRepository;
    private $userRepository;
    private $doctorRepository;

    public function __construct(AdminRepository $adminRepository, PatientRepository $patientRepository, UserRepository $userRepository, DoctorRepository $doctorRepository)
    {
        $this->adminRepository = $adminRepository;
        $this->patientRepository = $patientRepository;
        $this->userRepository = $userRepository;
        $this->doctorRepository = $doctorRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = $this->doctorRepository->getAllDoctor();
        return $doctors;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $select = new AdminRepository();
        $insert_doctor = new DoctorRepository();
        $user = new User(
            Role::Doctor,
            $request->input('email'),
            $request->input('password'),
            $request->input('name'),
            $request->input('phone'),
            $request->input('address'),
            $request->input('url_image'),
        );
        $doctor = $select->addNewDoctor($user);
        $newDoctor = new Doctor($user->getId(), $request->input('specialization'), $request->input('description'));
        $insert_doctor->insert_doctor($newDoctor);

        if ($doctor != null) {
            return response()->json([
                "message" => "add doctor",
                "doctor" => $doctor
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $req = new DoctorReq($request);
        $select = new AdminRepository();
        $newUser = new User(
            Role::Doctor,
            $request->input('email'),
            $request->input('password'),
            $request->input('name'),
            $request->input('phone'),
            $request->input('address'),
            $request->input('url_image')
        );
        $newDoctor = new Doctor($id, $request->input('specialization'), $request->input('description'));
        $doctor = $select->updateDoctor($newUser, $newDoctor);

        if ($doctor != null) {
            return response()->json([
                "message" => "update doctor complete",
                "doctor" => $doctor
            ], 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $select = new AdminRepository();
        $delete = $select->deleteDoctor($id);

        if ($delete != null) {
            return response()->json([
                "message" => "delete doctor complete",
            ], 201);
        }
    }
}
