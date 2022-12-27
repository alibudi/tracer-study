@extends('template.master')
@section('content')
    <!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Kuesioner</h2>
            {{-- <p class="mg-b-0">Sales monitoring dashboard template.</p> --}}
        </div>
    </div>
</div>
<!-- /breadcrumb -->

<div class="row mb-5">
    <div class="col-md-12">
        <form action="{{route('add')}}" method="POST">
        @csrf
        <div class="heading-section text-center">
         <h4> {{ Session::get('nextq') }}. {{ $question->question }}</h4>
         {{-- <h4>{{ $question->question }}</h4> --}}
         <input type="hidden" name="kuesioner_id" value="{{$question->id}}">
         <input name="value" value="{{ $question->a }}" type="radio" > (A)<small> {{ $question->a }}</small><br>
         <input name="value" value="{{ $question->b }}" type="radio" > (B)<small> {{ $question->b }}</small><br>
         <input name="value" value="{{ $question->c }}" type="radio" > (C)<small> {{ $question->c }}</small><br>
         <input name="value" value="{{ $question->d }}" type="radio" > (D)<small> {{ $question->d }}</small><br>
        </div>  
        <button type="submit" value="submit" style="float: right" class="btn btn-primary">NEXT</button>
    </form>



    {{-- <form class="form-horizontal" method="POST" action="{{ route('add') }}" >
        @csrf
        <div class="form-group">
            <input type="text" name="kuesioner_id" value="{{$question->id}}" class="form-control">
            <input type="text" name="value" class="form-control" placeholder="Name">
        </div>

        <div class="form-group mb-0 mt-3 justify-content-end">
            <div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form> --}}
 

</div>
</div>
@endsection