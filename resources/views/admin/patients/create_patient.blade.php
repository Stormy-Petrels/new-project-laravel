@extends('layouts.admin.admin')

@section('content')
<div class="head-title">
    <div class="left">
        <h1>Add new patient</h1>
    </div>
    <a href="{{url('/admin/patients')}}"><button class="middle none center mr-4 rounded-lg bg-blue-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none 
        active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
        data-ripple-light="true"> Back</button></a>
    
</div>
<div class="flex items-center justify-center p-12">
    <!-- Author: FormBold Team -->
    <!-- Learn More: https://formbold.com -->
    <div class="mx-auto w-full max-w-full">
      <form action="#" method="POST">
        <div class="-mx-3 flex flex-wrap">
          <div class="w-full px-3 sm:w-1/3">
            <div class="mb-5">
              <label
                for="name"
                class="mb-3 block text-base font-medium text-[#07074D]"
              >
                Full name
              </label>
              <input
                type="text"
                name="name"
                id="name"
                placeholder="Name"
                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
              />
            </div>
          </div>
          <div class="w-full px-3 sm:w-1/3">
            <div class="mb-5">
              <label
                for="Email"
                class="mb-3 block text-base font-medium text-[#07074D]"
              >
                Email
              </label>
              <input
                type="text"
                name="Email"
                id="Email"
                placeholder="Email"
                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
              />
            </div>
          </div>
          <div class="w-full px-3 sm:w-1/3">
            <div class="mb-5">
              <label
                for="phone"
                class="mb-3 block text-base font-medium text-[#07074D]"
              >
                Phone
              </label>
              <input
                type="text"
                name="phone"
                id="phone"
                placeholder="Phone"
                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
              />
            </div>
          </div>

        </div>

        <div class="-mx-3 flex flex-wrap">
            <div class="w-full px-3 sm:w-1/2">
              <div class="mb-5">
                <label
                  for="health-con"
                  class="mb-3 block text-base font-medium text-[#07074D]"
                >
                  Health conditional
                </label>
                <input
                  type="text"
                  name="health-con"
                  id="health-con"
                  placeholder=" Health conditional"
                  class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                />
              </div>
            </div>
            <div class="w-full px-3 sm:w-1/2">
                <div class="mb-5">
                  <label
                    for="note"
                    class="mb-3 block text-base font-medium text-[#07074D]"
                  >
                    Note
                  </label>
                  <input
                    type="text"
                    name="note"
                    id="note"
                    placeholder="Note"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                  />
                </div>
              </div>
  
          </div>
  
        
  
        <div>
          <button
          class="middle none center mr-4 rounded-lg bg-blue-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none 
          active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
          data-ripple-light="true"
          >
            Submit
          </button>
        </div>
      </form>
    </div>
  </div>


      
@endsection