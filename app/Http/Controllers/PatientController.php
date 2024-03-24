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
use App\Models\Patient;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class PatientController extends Controller
{
    private $adminRepository;
    private $doctorRepository;
    private $userRepository;
    private $patientRepository;

    public function __construct(AdminRepository $adminRepository, PatientRepository $patientRepository, UserRepository $userRepository, DoctorRepository $doctorRepository)
    {
        $this->adminRepository = $adminRepository;
        $this->patientRepository = $patientRepository;
        $this->userRepository = $userRepository;
        $this->doctorRepository = $doctorRepository;
    }


    public function index()
    {
        $patients = $this->patientRepository->get_info_patients();
        // dd($patients);
        return view('admin.patients.patients', compact('patients'));
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
            'name' => 'required',
            'phone' => ['required', 'regex:/^0\d{9}$/'],
            'address' => 'required',
            'url_image' => 'required|mimes:png,jpg,jpeg,webp,gif',
            'health_condition' => 'nullable',
            'note' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 400);
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $select = new AdminRepository();
        $insert_patient = new PatientRepository();
        $user = new User(
            Role::Patient,
            $request->input('email'),
            $request->input('password'),
            $request->input('name'),
            $request->input('phone'),
            $request->input('address'),
            $request->file('url_image')->move('assets/admin/images' . $request->file('url_image')->getClientOriginalExtension())
        );
        $patient = $select->add_new_user($user);
        $new_patient = new Patient(
            $user->getId(),
            $request->input('health_condition') ?? '',
            $request->input('note') ?? ''
        );
        $insert_patient->add_new_patient($new_patient);

        if ($patient != null) {
            return Redirect::route('admin/patients/patients')->with('success', 'Patient successfully added');
        }
    }

    public function edit($user_id)
    {   
        $patient = $this->patientRepository->get_patient_by_id($user_id);
        dd($patient);
        //return view('admin.patients.update-patient', compact('patient'));
    }


    public function update(Request $request, string $id)
    {

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

    public function create()
    {
        return view('admin.patients.create_patient');
    }





    // public function updatePatient(Request $request)
    // {
    //    $req = new PatientReq($request);
    //    $select = new AdminRepository();
    //    $newPatient = new User(Role::Patient,
    //    $req->email, 
    //    $req->password,
    //    $req->fullName, 
    //    $req->address,
    //    $req->phone,
    //    $req->imageurl,
    // );
    //    $patient = $select->updatePatient($newPatient);
    //     if ($patient != null) {
    //         return response()->json([
    //             "message" => "update patient complete",
    //             "patient" => $patient
    //         ], 200);
    //     }
    // }

    // public function deletePatient($patientID)
    // {
    //     $admin = new AdminRepository();
    //     $admin->deletePatient($patientID);
    //     if ($admin != null) {
    //         return response()->json([
    //             "message" => "delete patient complete"
    //         ], 200);
    //     }
    // }
}