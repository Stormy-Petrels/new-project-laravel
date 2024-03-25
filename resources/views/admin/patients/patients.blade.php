@extends('layouts.admin.admin')

@section('content')
<div class="head-title">
    <div class="left">
        <h1>Management patient</h1>
    </div>
    <a href="{{url('/admin/patients/create')}}"><button class="middle none center mr-4 rounded-lg bg-blue-500 py-3 px-6 font-sans text-sm font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none 
        active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
        data-ripple-light="true"> Add</button></a>
    
</div>

<table class="border-collapse w-full">
    <thead>
        <tr>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Patient name</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Email</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Phone</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Address</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Health conditional</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Note </th>

            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Status account</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($patients as $patient)
            
       
        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
            {{-- name --}}
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <div class="flex items-center">
                    <img src="{{ asset($patient->url_image) }} " alt="Avatar" class="w-10 h-10 rounded-full mr-2" >
                    <span>{{$patient->name}}</span>
                </div>
            </td>
            {{-- email --}}
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static" style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                {{$patient->email}}
            </td>
            {{-- phone --}}
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                {{$patient->phone}}
            </td>
            {{-- address --}}
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                {{$patient->address}}
            </td>
            {{-- health conditional --}}
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                {{$patient->health_condition}}
            </td>
            {{-- note --}}
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                {{$patient->note}}
            </td>

            {{-- <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="rounded py-1 px-3 text-xs font-bold 
                             {{ active ? 'bg-green-400' : 'bg-red-400' }}">
                    {{ active ? 'active' : 'inactive' }}
                </span>
            </td> --}}
            <td>
                <select class="block w-full p-3 text-gray-800 border border-b rounded-md">
                    <option value="active" class="bg-green-400 text-white font-bold">Active</option>
                    <option value="inactive" class="bg-red-400 text-white font-bold">Inactive</option>
                </select>
            </td>
          
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <a href="{{ route('edit.patient', $patient->user_id) }}">
                    <button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Update</button>
                </a>
                <form action="{{ route('delete_patient', ['user_id' => $patient->user_id]) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

      
@endsection