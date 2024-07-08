@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>

                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                                {{ $error }}<br/>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('companies.update', $company->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" placeholder="ชื่อบริษัท" value="{{ $company->name }}">
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="address" placeholder="ที่อยู่" value="{{ $company->address }}">
                            <label for="address">Address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" placeholder="อีเมล" value="{{ $company->email }}">
                            <label for="email">Email</label>
                        </div>
                        @if($company->logo)
                        <div class="mb-3">
                            <img src="{{ asset('storage/'.$company->logo) }}" alt="{{ $company->name }}" width="100px" height="100px">
                        </div>
                        @endif
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="logo">
                            <label class="input-group-text" for="logo">Upload</label>
                        </div>                      
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="website" placeholder="เว็บไซต์" value="{{ $company->website }}">
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
