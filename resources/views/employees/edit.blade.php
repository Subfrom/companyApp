@extends('layouts.app')
<link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
<script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script>
<style>
    .dselect-wrapper
    {
        margin-bottom: 3px;
    }
</style>

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
                    <form action="{{ route('employees.store') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="ชื่อ" value="{{ $employee->first_name }}">
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="นามสกุล" value="{{ $employee->last_name }}">
                            <label for="last_name">Last Name</label>
                        </div>
                        <select class="form-select" id="company_id" name="company_id">
                            <option selected>เลือกบริษัท</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}" @if($company->id == $employee->company_id) selected @endif>{{ $company->name }}</option>
                            @endforeach
                        </select>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="อีเมล" value="{{ $employee->email }}">
                            <label for="email">Email</label>
                        </div>    
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="เบอร์" value="{{ $employee->phone }}">
                            <label for="phone">Phone</label>
                        </div>
                        <a href="{{ route('employees.index') }}" class="btn btn-secondary">ยกเลิก</a>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const config = {
    search: true, // Toggle search feature. Default: false
    creatable: false, // Creatable selection. Default: false
    clearable: false, // Clearable selection. Default: false
    maxHeight: '360px', // Max height for showing scrollbar. Default: 360px
    size: 'lg', // Can be "sm" or "lg". Default ''
    placeholder: 'Select', // Placeholder text. Default: 'Select'

}
dselect(document.querySelector('#company_id'), config);

</script>

@endsection
