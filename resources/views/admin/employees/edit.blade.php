@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employees') }}</div>
                <div>
                    @if($errors->any())
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li><strong>{{ $error }}</strong></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{ route('employees.update', $employee->id) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleFormControlInput1">First Name</label>
                            <input type="text" name="firstname" value="{{ $employee->firstname }}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input type="text" name="name" value="{{ $employee->name }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Company</label>
                            <select name="companies_id" class="form-control">
                                @foreach($company as $companies)
                                    <option value="{{ $companies->id }}"
                                        {{ $companies->id == $employee->companies_id ? 'selected' : '' }}>
                                        {{ $companies->name }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="email" name="email" value="{{ $employee->email }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Phone</label>
                            <input type="text" name="phone" value="{{ $employee->phone }}" class="form-control">
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
