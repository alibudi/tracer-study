@extends('template.master')
@section('title', 'Alumni')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
  <style>
    .dark-theme .dataTables_wrapper .dataTables_filter input {
    color: #000000;
}
  </style>
@endpush
@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Laporan Alumni</h2>
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
                    {{-- <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0"> <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">  <i class="fas fa-plus"> Add Users</i> </a></h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div> --}}
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Hp</th>
                                    <th>Agama</th>
                                    <th>Alamat</th>
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
   
    {{-- <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>     
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {

                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    dom: 'Bfrtip',
                    buttons: [ 'csv', 'excel', 'pdf', 'print'],
                    ajax: "{{ route('laporan-alumni.index') }}",
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'name', name: 'name'},
                        {data: 'email', name: 'email'},
                        {data: 'jenis_kelamin', name: 'jenis_kelamin'},
                        {data: 'no_hp', name: 'no_hp'},
                        {data: 'agama', name: 'agama'},
                        {data: 'alamat', name: 'alamat',  orderable: true, searchable: true},
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