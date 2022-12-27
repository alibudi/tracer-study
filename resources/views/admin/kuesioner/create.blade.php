@extends('template.master')
@section('content')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Create Kuesioner</h2>
            {{-- <p class="mg-b-0">Sales monitoring dashboard template.</p> --}}
        </div>
    </div>
</div>
<!-- /breadcrumb -->
<div class="row row-sm">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
        <div class="card  box-shadow-0">
            <div class="card-header">
                Pertanyaan
            </div>
            <div class="card-body pt-0">
                <form class="form-horizontal" method="POST" action="{{ route('kuesioner.store') }}" >
                    @csrf
                      <div class="row">
                           <input type="text" name="question"  class="form-control">
                       </div>
                       <div class="row">
                           <div class="col-md-6"><label for="">A:</label></div>
                           <div class="col-md-6"><label for="">B:</label></div>
                       </div>
                        <div class="row">
                             <div class="col-md-6"><input type="text" name="a" class="form-control"></div>
                             <div class="col-md-6"><input type="text" name="b" class="form-control"></div>
                        </div>

                        <div class="row">
                           <div class="col-md-6"><label for="">C:</label></div>
                           <div class="col-md-6"><label for="">D:</label></div>
                       </div>
                        <div class="row">
                             <div class="col-md-6"><input type="text" name="c" class="form-control"></div>
                             <div class="col-md-6"><input type="text" name="d" class="form-control" ></div>
                        </div>
                        <br>
                        {{-- <div class="row">
                            <div class="col-md-3">
                                <select name="answer" class="form-control" id="">
                                    <option value="{{ $question->answer }}" >{{ $question->answer }}</option>
                                    <option value="a">A</option>
                                    <option value="b">B</option>
                                    <option value="c">C</option>
                                    <option value="d">D</option>
                                </select>
                            </div>
                        </div> --}}

                        
                    </div>
            
                    <div class="form-group mb-0 mt-3 justify-content-end">
                        <div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            {{-- <button type="submit" class="btn btn-secondary">Cancel</button> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection