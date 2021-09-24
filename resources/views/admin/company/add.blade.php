@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Company') }}</div>
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
                    <form action="{{ route('company.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Companies Name</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Companies Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Logo</label>
                            <input type="file" name="logo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Website</label>
                            <textarea class="form-control" name="website" id="exampleFormControlTextarea1"
                                rows="3">{{ old('website') }}</textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
