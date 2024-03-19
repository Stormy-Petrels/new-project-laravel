<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title Here</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/patients/css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/patients/css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/patients/css/footer.css') }}">
</head>
<body>
    @include('layouts.patients.header')

    <div class="container">
        <div class="grid-container">
          <div class="columns">
            <div class="content">
              <span class="number">+ 5120</span>
              <br /><br /><br />
              <span class="description">Happy Patients</span>
            </div>
          </div>
          <div class="columns">
            <div class="content">
              <span class="number">+ 26</span>
              <br /><br /><br />
              <span class="description">Total Branches</span>
            </div>
          </div>
          <div class="columns">
            <div class="content">
              <span class="number">+ 50</span>
              <br /><br /><br />
              <span class="description">Senior Doctors</span>
            </div>
          </div>
          <div class="columns">
            <div class="content">
              <span class="number">+ 20</span>
              <br /><br /><br />
              <span class="description">Years Experience</span>
            </div>
          </div>
        </div>
    </div>

    @include('layouts.patients.footer')

</body>
</html>