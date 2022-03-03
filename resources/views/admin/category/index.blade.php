@extends('template.master')
@section('title', 'Category')
@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Data Categories</h2>
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
                   
                    
                </div>
                <div class="card-body">
                  	<form class="form-horizontal" method="POST" action="{{ route('category.store') }}" >
						@csrf
                        <input id="method" type="hidden" name="method" value="post">
                            <input id="id" type="hidden" name="id">
					
						
						<div class="form-group">
							<input type="text" name="name" class="form-control{{ $errors->has('name') ? 'has-error':'' }}" id="name" name="name" placeholder="Nama..." value="{{ old('name') }}">
                             @if ($errors->has('name'))
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                @endif
						</div>
			
						<div class="modal-footer">
							<button class="btn ripple btn-primary" id="saveBtn" value="create" type="button">Save changes</button>
						
						</div>
                         </form>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                       
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap data-table" ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Slug</th>
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
   
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {

                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('category.index') }}",
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'name', name: 'name'},
                        {data: 'slug', name: 'slug'},
                        {data: 'action', name: 'action', class: 'text-center', 
                            orderable: true, searchable: true
                        },
                    ]
                });
                   
                
            } );
            function editForm(id) {
                $("#ket-form").text('Form Edit Data User');
                $("#btn-tambah").text('Simpan');
                $("#method").val('patch');
                $("#name").val(name);
                $("#id").val(id);
            }

            function deleteData(id) {
                let y = confirm('Apakah data mau di hapus?');
                if(y) $("#delete-form-"+id).submit();
                
            }
               

                
    </script>
       @include('sweetalert::alert')
    @endpush
 
@endsection