@extends('layouts.patients.master')

@section('title', 'Mental Health Care')

@section('header')
  @parent 
@endsection

@section('content')
  <div class="row pt-5">
    <div class="col-lg-6 ps-5">
      <img src="assets/patients/images/photo3.png" class="mx-auto d-block ps-5" style="width: 95%; height: 85%">
    </div>
    <div class="col-lg-5">
      <div class="left-3">
        About
        <span style="color: rgba(28, 187, 208, 1)">Us</span>
      </div>
      <div class="ps-5 py-4">
        <p class="py-4">"With profound knowledge and meticulousness, doctors ensure all decisions are made accurately and carefully."</p>
        <a href="/contact-us" class="submit" class="    background-color: #e61f57;
        color: #fff;
        justify-content: center;
        padding: 15px 20px;
        border-radius: 30px;
        text-decoration: none;
        cursor: pointer;">GET CONTACT</a>
      </div>
    </div>
  </div>

  <div class="row" style=" border-radius: 20px; background-color: #1cbbd0; color: white; display: flex; padding: 50px 75px 0; margin: 50px; margin-left: 106px; width: 99%; height: 300px;">
    <div class="row">
        <h1 style="font: 600 55px sans-serif;">Our Mission</h1>
        <div class="row py-4" style="font: 400 20px sans-serif;">
          <p class="col-lg-6">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
          <p class="col-lg-6">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
        </div>
    </div>
  </div>

  <div class="row pt-5">
    <div class="col-lg-5">
      <img src="assets/patients/images/photo4.png" alt="" class="mx-auto d-block" style="width: 67%; height: 97%; padding-left: 3%">
    </div>

    <div class="col-lg-6">
      <div class="left-3 py-3">
        Out
        <span style="color: rgba(28, 187, 208, 1)">Mission</span>
      </div>
      <div class="right-1">
        <div class="right-2">
          <img loading="lazy" srcset="assets/patients/images/lightning.png" class="image1"/>
          <div class="right-3">Honesty</div>
        </div>
        <div class="right-4">
          Sed ut perspiciatis unde omnis iste natus error sit voluptatem
          accusantium doloremque laudantium.
        </div>
      </div>
      <div class="right-1">
        <div class="right-2">
          <img loading="lazy" srcset="assets/patients/images/tick.png" class="image1" />
          <div class="right-3">Highest Quality</div>
        </div>
        <div class="right-4">
          Sed ut perspiciatis unde omnis iste natus error sit voluptatem
          accusantium doloremque laudantium.
        </div>
      </div>
      <div class="right-1">
        <div class="right-2">
          <img loading="lazy" srcset="assets/patients/images/development_skill.png" class="image1" />
          <div class="right-3">Responsibility</div>
        </div>
        <div class="right-4">
          Sed ut perspiciatis unde omnis iste natus error sit voluptatem
          accusantium doloremque laudantium.
        </div>
      </div>
    </div>
  </div>
@endsection

@section('footer')
  @parent 
@endsection