@extends('template.master')
@section('title', 'Add Users')
@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Edit Users</h2>
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
									{{-- <h4 class="card-title mb-1">Create Users</h4> --}}
								
								</div>
								<div class="card-body pt-0">
									<form class="form-horizontal" method="POST" action="{{ route('user.update',$user->id) }}">
										@csrf
                                        @method('PATCH')
										<div class="form-group">
											<label for="">Name</label>
											<input type="text" class="form-control" name="name" id="inputName" value="{{ $user->name }}" placeholder="Name">
										</div>
										<div class="form-group">
											<label for="">Email</label>
											<input type="email" name="email" value="{{ $user->email }}" class="form-control" id="inputEmail3" placeholder="Email">
										</div>
										 {{-- <div class="form-group">
										<label>Pilih Role</label>
										<select name="group_id" class="form-control">
											<option value="">--Pilih Role--</option>
											@foreach ($roles as $item)
											<option value="{{$item->id}}">{{$item->name}}</option>
											@endforeach
										</select>
									</div> --}}
									
										<div class="form-group mb-0 mt-3 justify-content-end">
											<div>
												<button type="submit" class="btn btn-primary">Update</button>
												{{-- <button type="submit" class="btn btn-secondary">Cancel</button> --}}
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
				
					</div>
					<!-- row -->

                    	<div class="row row-sm">
						<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
							<div class="card  box-shadow-0">
								<div class="card-header">
									{{-- <h4 class="card-title mb-1">Create Users</h4> --}}
								
								</div>
								<div class="card-body pt-0">
									<form class="form-horizontal" method="POST" action="{{ route('user.password',$user->id) }}">
										@csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Password Lama</label>
                                            <input type="password" name="old_password" class="form-control"  placeholder="Password" required>
                                        </div>
										<div class="form-group">
											<label for="">Password</label>
											<input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
										</div>
										<div class="form-group">
											<label for="">Confirmation Password</label>
											<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password">
										</div>
										<div class="form-group mb-0 mt-3 justify-content-end">
											<div>
												<button type="submit" class="btn btn-primary">Update</button>
												{{-- <button type="submit" class="btn btn-secondary">Cancel</button> --}}
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
				
					</div>

@endsection