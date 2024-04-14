@extends('layouts.patients.master')
@section('title', 'Mental Health Care')

@section('header')
  @parent 
@endsection

@section('content')
<section class="contact-us-section">
  <h2 class="contact-us-heading">
    <span style="color: rgba(28, 187, 208, 1)">Contact</span> Us
  </h2>
  <p class="ps-3 py-3">
    "With profound knowledge and meticulousness, doctors ensure all decisions are made accurately and carefully."
  </p>
  <div class="contact-us-content">
    <div class="contact-us-columns">
      <div class="contact-us-image-column">
        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/7f02f77db223ace5568b6e8f1f5d02f265faa691e024b1d5a5bdf906012d12ae?apiKey=cceb8282e0e64aaeb0533b2dfea39e76&" alt="Contact us" class="contact-us-image">
      </div>
      <div class="contact-us-form-column">
        <div class="contact-us-form-heading">
          Free <span style="color: rgba(28, 187, 208, 1)">Consultation</span>
        </div>
        <form style="width: 110%;">
          <div class="contact-us-form-row py-5">
            <input type="text" id="fullName" placeholder="Full name" class="contact-us-form-input">
            <input type="text" id="interest" placeholder="I'm interested" class="contact-us-form-input">
          </div>
          <div class="contact-us-form-row">
            <input type="email" id="email" placeholder="Email" class="contact-us-form-input">
            <input type="tel" id="phone" placeholder="Phone number" class="contact-us-form-input">
          </div>
          <button type="submit" class="contact-us-form-submit">Get a Free Consultation</button>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection

@section('footer')
  @parent 
@endsection