@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('companies.create') }}" class="btn btn-primary">Add Company</a>
    <div class="row justify-content-center">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Website</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->website }}</td>
                    <td><img src="{{ asset('storage/'.$company->logo) }}" alt="{{ $company->name }}" width="100"></td>
                    <td>
                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary">แก้ไข</a>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">ลบ</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
            {!! $companies->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
</div>
@endsection
