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
        return view('admin.patients.patients', compact('patients'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => [
                'required',
                'min:6',
                
            ],
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

        // if ($patient != null) {
        //     return Redirect::route('admin/patients')->with('success', 'Patient successfully added');
        // }

        if ($patient!=null) {
            // Chuyển hướng đến trang chủ và hiển thị thông báo
            return redirect('/admin/patients')->with('success', 'Patient deleted successfully');
        } 
        
    }

    public function edit($user_id)
    {   
        $patient = $this->patientRepository->get_patient_by_id($user_id);
       // dd($patient);
        return view('admin.patients.update_patient', compact('patient'));
    }

public function update(Request $request, string $id)
{
    $select = new AdminRepository();

    // Validate input data
    $validator = Validator::make($request->all(), [
        'name' => 'required|string',
        'new_password' => 'nullable|string|min:6',
        'phone' => 'required|string',
        'address' => 'required|string',
        'health_condition' => 'nullable',
        'note' => 'nullable',
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return response()->json([
            'message' => 'Validation error',
            'errors' => $validator->errors()
        ], 400);
    }

    // Proceed with updating the patient
    $password = $request->input('password');
    $newPassword = $request->input('new_password');
    if (!empty($newPassword)) {
        $password = $newPassword;
    }

    // Update user information
    $updateUser = new User(
        Role::Doctor,
        $request->input('name'),
        $password,
        '',
        $request->input('phone'),
        $request->input('address'),
        ''
    );
    
    $updatePatient = new Patient($id, $request->input('health_condition', null), $request->input('note', null));
    $patient = $select->update_patient($updateUser, $updatePatient);
    if ($patient!=null) {
        // Chuyển hướng đến trang chủ và hiển thị thông báo
        return redirect('/admin/patients')->with('success', 'Patient deleted successfully');
    } 
    if ($patient != null) {
        return response()->json([
            "message" => "Updated patient complete",
            "patient" => $patient
        ], 201);
    }
}




        
    public function create()
    {
        return view('admin.patients.create_patient');
    }

    public function destroy(string $userId)
    {
        $select = new PatientRepository();
         
        // Kiểm tra xem bệnh nhân có tồn tại hay không
        $existingPatient = $select->get_patient_by_id($userId);
        if ($existingPatient == null) {
            return response()->json([
                'message' => 'Patient not found'
            ], 404);
        }
    
        // Xóa bệnh nhân
        $result = $select->delete_patient($userId);
        if ($result) {
            // Chuyển hướng đến trang chủ và hiển thị thông báo
            return redirect('/admin/patients')->with('success', 'Patient deleted successfully');
        } else {
            return response()->json([
                'message' => 'Failed to delete patient'
            ], 500);
        }
    }
}