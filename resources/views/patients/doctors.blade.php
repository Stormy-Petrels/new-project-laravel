@extends('layouts.patients.master')
@section('title', 'Mental Health Care')

@section('header')
  @parent 
@endsection
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
</style>
<script src="https://cdn.tailwindcss.com"></script>

<style>

    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        width: 100%;
        margin-left: 0px;
    }

    .header {   
       width: 100%;
    }

    .title,
    .sub_title {
        text-align: center;
    }

    .titles{
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .title{
        font-size: 50px;
        font-weight: bolder;
        font-family: Georgia, "Times New Roman", Times, serif;
        margin-top: 80px;
    }

    .sub_title {
        font-size: 22px;
        margin-top: 20px;
    }


    .imgDoctor {
        width: 100%;
    }

    .max-w-sm {
        margin: 10px;
    }

    /* Doctor list styles */
    .title_lists {
        text-align: center;
        padding: 20px 0;
    }

    .lists_card {
        width: 100%;
        display: flex;
        flex-wrap: wrap;

    }

    .max-w-sm {
        width: calc(25% - 20px);
        margin-bottom: 20px;
        box-sizing: border-box;
    }

    .rounded-t-lg {
        width: 100%;
    }

    .listPage {
        padding: 10px;
        text-align: center;
        list-style: none;
    }

    .listPage li {
        background-color: #ffffffBD;
        padding: 5px 15px 5px 15px;
        display: inline-block;
        margin: 0 10px;
        cursor: pointer;
        border-radius: 5px;
    }

    .listPage .active {
        background-color: black;
        color: #fff;
    }
    .color{
        color: #1CBBD0;
    }

    @media only screen and (max-width: 768px) {
        .title {
            font-size: 30px;
        }

        .sub_title {
            font-size: 16px;
            top: 20px;
            left: 0;
            width: 100%;
        }

        .lists_doctor {
            font-size: 36px;
        }

        .max-w-sm {
            width: calc(50% - 20px);
        }
    }
</style>
@section('content')
<div class="container" style="margin-left: -15px;">
        <div class="header">
            <h1 class="title"  style="width: 100%;"><span class="color">Team of doctors </span>of different specialties</h1>
            <p class="sub_title">
                We would like to extend our warm greetings and express our gratitude for your interest in our services. This website was created with the aim of providing you with excellent experiences and high-quality services.
            </p>
        </div>
        <div class="lists_card">
            <?php foreach ($doctors as $doctor) : ?>
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 d-flex flex-column justify-content-between">
                    <a href="#">
                        <img class="rounded-t-lg h-80 object-cover" src="{{asset('assets/admin/images/'.$doctor->url_image)}}" alt="" />
                    </a>
                    <div class="p-5" onclick="redirectBooking('{{$doctor->id}}')">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Bs. {{$doctor->name}}</h5>
                    </div>
                     <!-- Thêm biểu tượng yêu thích -->
                    <button type="button" class="btn btn-danger" onclick="addToFavorites('{{$doctor->id}}')">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                        Like
                    </button>
                </div>
            <?php endforeach; ?>
        </div>
        <ul class="listPage"></ul>
        </div>
@endsection
@section('JScontent')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function redirectBooking(doctorId) {
    window.location.href = 'doctor/' + doctorId + '/booking';
}

let thisPage = 1;
let limit = 8;
let list = document.querySelectorAll('.lists_card .max-w-sm');

function loadItem() {
    let beginGet = limit * (thisPage - 1);
    let endGet = limit * thisPage - 1;
    list.forEach((item, key) => {
        if (key >= beginGet && key <= endGet) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
    listPage();
}

function listPage() {
    let count = Math.ceil(list.length / limit);
    let listPageContainer = document.querySelector('.listPage');
    listPageContainer.innerHTML = '';

    if (thisPage > 1) {
        let prev = document.createElement('li');
        prev.innerText = 'PREV';
        prev.setAttribute('onclick', "changePage(" + (thisPage - 1) + ")");
        listPageContainer.appendChild(prev);
    }

    for (let i = 1; i <= count; i++) {
        let newPage = document.createElement('li');
        newPage.innerText = i;
        if (i === thisPage) {
            newPage.classList.add('active');
        }
        newPage.setAttribute('onclick', "changePage(" + i + ")");
        listPageContainer.appendChild(newPage);
    }

    if (thisPage < count) {
        let next = document.createElement('li');
        next.innerText = 'NEXT';
        next.setAttribute('onclick', "changePage(" + (thisPage + 1) + ")");
        listPageContainer.appendChild(next);
    }
}

function addToFavorites(doctorId) {
    const userInfo = localStorage.getItem("user-info");
    if (userInfo !== null) {
        const userData = JSON.parse(userInfo);
        const userId = userData.roleId;
        
        axios.post('/doctor/favorite',{userId, doctorId})
        .then(res => {
            console.log(res.data)
        })
        .catch(err => {
            console.error('Has error:', err)
        })
    }
    
}

function changePage(i) {
    thisPage = i;
    loadItem();
}

loadItem();
</script>
@endsection
@section('footer')
  @parent 
@endsection