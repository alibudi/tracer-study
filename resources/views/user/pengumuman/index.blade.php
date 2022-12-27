@extends('template.master')
@section('title', 'Pengumuman')
@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Pengumuman</h2>
        </div>
    </div>
    <div class="center-content">
        <div>
             @if(session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
              <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
                <span class="alert-inner--text"><strong>Success!</strong> {{ session('success') }}!</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
            @endif
            @if(session('errors'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
               @foreach ($errors->all() as $error)
                  <span class="alert-inner--text"><strong>Error!</strong> {{ $error }}!</span>
                 @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
            @endif
        </div>
    </div>
</div>
<!-- /breadcrumb -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                              @foreach ($pengumuman as $item)
                                    <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $item->title }}</td>
                                    {{-- <td>{{ $item->email }}</td> --}}
                                    <td class="text-center">
                                        <a class="btn btn-info btn-xs" href="{{route('pengumuman.show',$item->id)}}"><div class="fas fa-eye"></div></a>
                                  
                                    </td>
                                </tr>
                               
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
@endsection