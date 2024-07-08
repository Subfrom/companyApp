@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create') }}</div>

                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                                {{ $error }}<br/>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="ชื่อบริษัท">
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="address" name="address" placeholder="ที่อยู่">
                            <label for="address">Address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="อีเมล">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="logo" name="logo">
                            <label class="input-group-text" for="logo">Upload</label>
                        </div>                      
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="website" name="website" placeholder="เว็บไซต์">
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
