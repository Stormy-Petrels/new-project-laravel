@extends('layouts.admin.admin')

@section('content')
<div class="head-title">
    <div class="left">
        <h1>Management appointment</h1>
    </div>
    
    
</div>

<table class="border-collapse w-full">
    <thead>
        <tr>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Patient name</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Patient phone</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Doctor name</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Doctor phone</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Duration</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Date</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Health conditional</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Note </th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Status</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($appointments as $appointment)
            
       
        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
           
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                {{$appointment->patient_name}}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                {{$appointment->patient_phone}}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                {{$appointment->doctor_name}}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                {{$appointment->doctor_phone}}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                {{ date('H:i', strtotime($appointment->time_start)) }}-{{ date('H:i', strtotime($appointment->time_end)) }}
            </td>

            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                {{ date('d-m-Y', strtotime($appointment->date_booking)) }}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                {{$appointment->health_condition}}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                {{$appointment->note}}
            </td>
          
            <td   class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                {{-- @if (strtotime($appointment->date_booking . ' ' . $appointment->time_end) > time())
                    <span class="rounded py-1 px-3 text-xs font-bold bg-yellow-500 text-white">
                        Processing
                    </span>
                @else
                    <span class="rounded py-1 px-3 text-xs font-bold bg-green-500 text-white">
                        Completed
                    </span>
                @endif --}}
                <div>time ht: <span id="current-time">hi</span></div>
            </td>
          @endforeach
            
        </tr>


       
        
        
    </tbody>
</table>
      <script>
        function updateTime() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "server_time.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var serverTime = parseInt(xhr.responseText);
                    // Cập nhật thời gian trong DOM
                    document.getElementById("current-time").innerHTML = new Date(serverTime * 1000).toLocaleString();
                }
            };
            xhr.send();
        }
        setInterval(updateTime, 1000)
      </script>
@endsection