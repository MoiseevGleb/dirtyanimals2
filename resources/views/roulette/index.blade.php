@extends('layouts.main')
@section('title', 'Dirty Animals | Roulette')

@section('content')
    <audio autoplay loop>
        <source src="{{ asset('storage/music/' . $music) }}" type="audio/mpeg">
    </audio>
    <div class="container">
        <div class="d-flex flex-column">
            <div class="row m-0 my-5">
                <div class="col-6 p-0">
                    <div class="roulette" style="width:500px; height:500px; background-color: #ccc; border-radius:50%; border:15px solid #dde; position: relative; overflow: hidden; transition: 5s;">
                        <div style="background-color: red; left:50%; height:50%; width:155px; position: absolute; clip-path: polygon(100% 0 , 50% 100% , 0 0 ); transform-origin:bottom; text-align:center; display:flex; align-items: center; justify-content: center; font-size:20px; font-weight:bold; font-family:sans-serif; color:#fff; left:157px;">1</div>
                        <div style="background-color: black; transform: rotate(36deg); height:50%; width:155px; position: absolute; clip-path: polygon(100% 0 , 50% 100% , 0 0 ); transform-origin:bottom; text-align:center; display:flex; align-items: center; justify-content: center; font-size:20px; font-weight:bold; font-family:sans-serif; color:#fff; left:157px;">2</div>
                        <div style="background-color: red; transform:rotate(72deg); height:50%; width:155px; position: absolute; clip-path: polygon(100% 0 , 50% 100% , 0 0 ); transform-origin:bottom; text-align:center; display:flex; align-items: center; justify-content: center; font-size:20px; font-weight:bold; font-family:sans-serif; color:#fff; left:157px;">3</div>
                        <div style="background-color: black; transform:rotate(108deg); height:50%; width:155px; position: absolute; clip-path: polygon(100% 0 , 50% 100% , 0 0 ); transform-origin:bottom; text-align:center; display:flex; align-items: center; justify-content: center; font-size:20px; font-weight:bold; font-family:sans-serif; color:#fff; left:157px;">4</div>
                        <div style="background-color: red; transform:rotate(144deg); height:50%; width:155px; position: absolute; clip-path: polygon(100% 0 , 50% 100% , 0 0 ); transform-origin:bottom; text-align:center; display:flex; align-items: center; justify-content: center; font-size:20px; font-weight:bold; font-family:sans-serif; color:#fff; left:157px;">5</div>
                        <div style="background-color: black; transform:rotate(180deg); height:50%; width:155px; position: absolute; clip-path: polygon(100% 0 , 50% 100% , 0 0 ); transform-origin:bottom; text-align:center; display:flex; align-items: center; justify-content: center; font-size:20px; font-weight:bold; font-family:sans-serif; color:#fff; left:157px;">6</div>
                        <div style="background-color: blue; transform:rotate(216deg); height:50%; width:155px; position: absolute; clip-path: polygon(100% 0 , 50% 100% , 0 0 ); transform-origin:bottom; text-align:center; display:flex; align-items: center; justify-content: center; font-size:20px; font-weight:bold; font-family:sans-serif; color:#fff; left:157px;">7</div>
                        <div style="background-color: black; transform:rotate(252deg); height:50%; width:155px; position: absolute; clip-path: polygon(100% 0 , 50% 100% , 0 0 ); transform-origin:bottom; text-align:center; display:flex; align-items: center; justify-content: center; font-size:20px; font-weight:bold; font-family:sans-serif; color:#fff; left:157px;">8</div>
                        <div style="background-color: darkgreen; transform:rotate(288deg); height:50%; width:155px; position: absolute; clip-path: polygon(100% 0 , 50% 100% , 0 0 ); transform-origin:bottom; text-align:center; display:flex; align-items: center; justify-content: center; font-size:20px; font-weight:bold; font-family:sans-serif; color:#fff; left:157px;">9</div>
                        <div style="background-color: blue; transform:rotate(324deg); height:50%; width:155px; position: absolute; clip-path: polygon(100% 0 , 50% 100% , 0 0 ); transform-origin:bottom; text-align:center; display:flex; align-items: center; justify-content: center; font-size:20px; font-weight:bold; font-family:sans-serif; color:#fff; left:157px;">10</div>
                    </div>
                    <div class="" style="content: '';
    color: #ffffff;
    position: absolute;
    clip-path: polygon(100% 0 , 50% 100% , 0 0 );
    width: 32px;
    height: 32px;
    right: -30px;
    top: 50%;
    transform: translateY(-50%);">

                    </div>
                </div>

                <div class="col-6 p-0">

                </div>

            </div>
            <div class="col-12 row g-2">

                <div class="col-3 rounded-3 border p-0 card">

                    <div class="card-img-top p-2 border-bottom text-center text-white" style="background-color: red">
                        Красный
                    </div>

                    <div class="card-body">

                    </div>

                </div>

                <div class="col-3 rounded-3 border p-0 card">

                    <div class="card-img-top p-2 border-bottom text-center text-white" style="background-color: black">
                        Черный
                    </div>

                    <div class="card-body">

                    </div>

                </div>

                <div class="col-3 rounded-3 border p-0 card">

                    <div class="card-img-top p-2 border-bottom text-center text-white"
                         style="background-color: dodgerblue">Синий
                    </div>

                    <div class="card-body">

                    </div>

                </div>

                <div class="col-3 rounded-3 border p-0 card">

                    <div class="card-img-top p-2 border-bottom text-center text-white"
                         style="background-color: forestgreen">Зеленый
                    </div>

                    <div class="card-body">

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
