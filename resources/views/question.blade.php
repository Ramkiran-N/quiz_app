@extends('layout')
<div class="question-p bg-q-gradient d-flex col-12  justify-content-center min-vh-100 ">
    <div class="col-12 container mt-5 text-center">
        <div class="row">
            <div class="col-6 text-start">
                <span class="rounded-circle bg-primary p-3 fs-5">{{$data['id']}}</span>
            </div>
            <div class="col-6 text-end">
                <span id="timer" class="bg-light p-3">00:30</span>
            </div>
        </div>
        <div class=" py-5 question-container w-100 text-light">
            <div class="w-75 mx-auto">
                <div class="question bg-quiz rounded p-3 w-100">
                    <h3>{{$data['question']}}</h3>
                </div>
                <div class="col-12 my-3 d-flex flex-wrap">
                    @foreach($data['choices'] as $key=>$item)
                    <a href="/category/{{$data['category']}}/{{$data['id']+1}}/{{$key+1}}" class="col-6 p-2 my-1 text-light text-decoration-none choice">
                        <div class="bg-quiz p-2 rounded-pill" >
                             <h5>{{$item}}</h5>
                        </div>
                    </a >
                    @endforeach
                </div>
            </div>
        </div>
        <a href='{{route('reset')}}' class="p-2 bg-quiz rounded text-decoration-none text-light">Reset</a>
    </div>
</div>