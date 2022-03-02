@extends('template.master')
@section('title', 'Role')
@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Create Role</h2>
            {{-- <p class="mg-b-0">Sales monitoring dashboard template.</p> --}}
        </div>
    </div>
</div>
<!-- /breadcrumb -->

<!-- row -->
	<div class="row row-sm">
		<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
			<div class="card  box-shadow-0">
				<div class="card-header">
				</div>
				<div class="card-body pt-0">
					<form class="form-horizontal" method="POST" action="{{ route('role.store') }}" >
						@csrf
						<div class="form-group">
							<input type="text" name="name" class="form-control" id="inputName" placeholder="Name">
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
	<!-- row -->

@endsection