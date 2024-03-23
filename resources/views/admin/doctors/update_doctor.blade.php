@extends('layouts.admin.admin')

@section('content')
<div class="head-title">
    <div class="left">
        <h1>Edit doctor</h1>
    </div>
    <a href="{{url('/admin/doctors')}}"><button class="middle none center mr-4 rounded-lg bg-blue-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none 
        active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"data-ripple-light="true"> Back</button></a>
</div>
<div class="flex items-center justify-center p-12">
    <div class="mx-auto w-full max-w-full">
        <form action="#" method="POST">
            <div class="-mx-3 flex flex-wrap">
                <div class="w-full px-3 sm:w-1/3">
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">Full name</label>
                        <input type="text" name="name" id="name" placeholder="Name" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                    </div>
                </div>
                <div class="w-full px-3 sm:w-1/3">
                    <div class="mb-5">
                        <label for="Email" class="mb-3 block text-base font-medium text-[#07074D]">Email</label>
                        <input type="text" name="Email" id="Email" placeholder="Email" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
                <div class="w-full px-3 sm:w-1/3">
                    <div class="mb-5">
                        <label for="phone" class="mb-3 block text-base font-medium text-[#07074D]">
                            Phone
                        </label>
                        <input type="text" name="phone" id="phone" placeholder="Phone" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
            </div>

            <div class="-mx-3 flex flex-wrap">
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="specilization" class="mb-3 block text-base font-medium text-[#07074D]">Specilization</label>
                        <input type="text" name="specilization" id="specilization" placeholder="Specilization" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="experience" class="mb-3 block text-base font-medium text-[#07074D]">Experience</label>
                        <input type="text" name="experience" id="experience" placeholder="Experience" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
            </div>

            <div>
                <button class="middle none center mr-4 rounded-lg bg-blue-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" data-ripple-light="true">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>

@endsection