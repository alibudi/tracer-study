@extends('template.master')
@section('title', 'Add Users')
@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Create Users</h2>
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
									<form class="form-horizontal" method="POST" action="{{ route('user.store') }}">
										@csrf
										<div class="form-group">
											<label for="">Nis</label>
											<input type="number" class="form-control" name="nis" id="inputName" placeholder="Nis">
										</div>
										<div class="form-group">
											<label for="">Name</label>
											<input type="text" class="form-control" name="name" id="inputName" placeholder="Name">
										</div>
										<div class="form-group">
											<label for="">Alamat</label>
											<textarea name="alamat" class="form-control" rows="10"></textarea>
										</div>
										{{-- <div class="form-group">
											<label for="">Jenis Kelamin</label>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="Laki-laki" id="flexRadioDefault1">
												<label class="form-check-label" for="flexRadioDefault1">
												  Laki Laki
												</label>
											  </div>
											  <div class="form-check">
												<input class="form-check-input" type="radio" name="Perempuan" id="flexRadioDefault2" checked>
												<label class="form-check-label" for="flexRadioDefault2">
													Perempuan
												</label>
											  </div>
										</div> --}}
										<div class="form-group">
											<label for="">Email</label>
											<input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
										</div>

										<div class="form-group">
											<label for="">No Hp</label>
											<input type="number" name="no_hp" class="form-control" placeholder="Nomor Handphone">
										</div>

										<div class="form-group">
											<label for="">Pekerjaan</label>
											<input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan">
										</div>

										<div class="form-group">
											<label>Jenis Kelamin</label>
											<select name="jenis_kelamin" class="form-control">
												<option value="Laki-laki">Laki-Laki</option>
												<option value="Perempuan">Perempuan</option>
											</select>
										</div>

										<div class="form-group">
											<label for="">Lulus</label>
											<input type="text" name="tahun" class="form-control" id="inputEmail3" placeholder="Lulusan Tahun">
										</div>

										<div class="form-group">
											<label for="">Jurusan</label>
											<input type="text" name="jurusan" class="form-control" id="inputEmail3" placeholder="jurusan">
										</div>

										<div class="form-group">
											<label>Agama</label>
											<select name="agama" class="form-control">
												<option value="Islam">Islam</option>
												<option value="Kristen">Kristen</option>
												<option value="Budha">Budha</option>
												<option value="Katolik">Katolik</option>
											</select>
										</div>

									<div class="form-group">
										<label>Pilih Role</label>
										<select name="group_id" class="form-control">
											<option value="">--Pilih Role--</option>
											@foreach ($roles as $item)
											<option value="{{$item->id}}">{{$item->name}}</option>
											@endforeach
										</select>
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