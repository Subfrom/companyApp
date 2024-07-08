@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create') }}</div>

                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" placeholder="ชื่อบริษัท">
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="address" placeholder="ที่อยู่">
                            <label for="address">Address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" placeholder="อีเมล">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="logo">
                            <label class="input-group-text" for="logo">Upload</label>
                        </div>                      
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="website" placeholder="เว็บไซต์">
                            <label for="website">Website</label>
                        </div>
                        <a href="{{ route('companies.index') }}" class="btn btn-secondary">ยกเลิก</a>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
