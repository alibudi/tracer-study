@extends('template.master')
@section('title', 'Kuesioner')
@section('content')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
  
@endpush
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Data kuesioner</h2>
            {{-- <p class="mg-b-0">Sales monitoring dashboard template.</p> --}}
          
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
                        <h4 class="card-title mg-b-0"> <a href="{{ route('kuesioner.create') }}" class="btn btn-primary btn-sm">  <i class="fas fa-plus"> Add kuesioner</i> </a></h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>

    @push('js')
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
  
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script> 
{{-- 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>      --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script> --}}
        <script type="text/javascript">
            $(document).ready(function() {

                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('kuesioner.index') }}",
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'question', name: 'question'},
                        {data: 'action', name: 'action', class: 'text-center', 
                            orderable: true, searchable: true
                        },
                    ]
                });
                   
                
            } );

            function deleteData(id) {
                let y = confirm('Apakah data mau di hapus?');
                if(y) $("#delete-form-"+id).submit();
                
            }
               

                
    </script>
    @endpush
@endsection