@extends('template.master')
@section('title', 'Edit Profile')
@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Edit Profile</h2>
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
											<label for="">Nis</label>
											<input type="text" class="form-control" name="nis" id="inputName" value="{{ $user->nis }}" placeholder="Name">
										</div>
										<div class="form-group">
											<label for="">Name</label>
											<input type="text" class="form-control" name="name" id="inputName" value="{{ $user->name }}" placeholder="Name">
										</div>

										<div class="form-group">
											<label for="">Alamat</label>
											<textarea name="alamat" class="form-control" rows="10">{{$user->alamat}}</textarea>
										</div>

										<div class="form-group">
											<label for="">Email</label>
											<input type="email" name="email" value="{{ $user->email }}" class="form-control" id="inputEmail3" placeholder="Email">
										</div>

										<div class="form-group">
											<label for="">No Hp</label>
											<input type="number" name="no_hp" class="form-control" placeholder="Nomor Handphone" value="{{$user->no_hp}}">
										</div>

										<div class="form-group">
											<label>Jenis Kelamin</label>
											<select name="jenis_kelamin" class="form-control">
												<option value="Laki-laki" {{$user->jenis_kelamin == 'Laki-laki' ? 'selected' : ''}}>Laki-Laki</option>
												<option value="Perempuan" {{$user->jenis_kelamin == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
											</select>
										</div>


										<div class="form-group">
											<label>Agama</label>
											<select name="agama" class="form-control">
												<option value="Islam" {{$user->agama == 'Islam' ? 'selected' : ''}}>Islam</option>
												<option value="Kristen" {{$user->agama == 'Kristen' ? 'selected' : ''}}>Kristen</option>
												<option value="Budha" {{$user->agama == 'Budha' ? 'selected' : ''}}>Budha</option>
												<option value="Katolik" {{$user->agama == 'Katolik' ? 'selected' : ''}}>Katolik</option>
											</select>
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