@extends('layout')
<div class="result-p bg-q-gradient d-flex col-12  justify-content-center min-vh-100 ">
    <div class="col-12 container mt-5 text-center">
        <h1 class="">Result</h1>
        <div class="d-flex flex-column py-5 question-container justify-content-center w-100 text-light">
            @foreach($data as $item)
            <div class="row ">
                <div class="col-12 col-md-6 my-2">
                    <div class="question bg-quiz rounded p-2 w-100">
                        <h3>{{$item['question']}}</h3>
                    </div>
                </div>
                <div class="col-12 col-md-6 my-2">
                    @if($item['userAnswer'] != null)
                    <div class="question bg-quiz rounded-pill p-2 w-100">
                        <h3>{{$item['userAnswer']}}</h3>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
          <div class="row  justify-content-center mt-3">
            <div class="question bg-quiz rounded-pill p-3 col-sm-6 col-md-4">
                <h3>{{$text}}</h3>
            </div>
          </div>
        </div>
           
    </div>
    
</div>