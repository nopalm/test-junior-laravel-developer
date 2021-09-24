@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Company') }}</div>
                <div class="mt-2 mb-2 ml-2">
                    <a class="btn btn-success" href="{{ route('company.create') }}">Add Company</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Companies Logo</th>
                                <th scope="col">Companies Name</th>
                                <th scope="col">Companies Email</th>
                                <th scope="col">Companies Website</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($company as $key =>  $companies )
                                <tr>
                                    <th scope="row">{{ $company->firstItem() + $key }}</th>
                                    <td><img class="img-fluid"
                                            src="{{ asset('storage/img_logo/'.$companies->logo) }}">
                                    </td>
                                    <td>{{ $companies->name }}</td>
                                    <td>{{ $companies->email }}</td>
                                    <td>{{ $companies->website }}</td>
                                    <td>
                                        <a href="{{ route('company.edit',$companies->id) }}"
                                            class="btn btn-primary">Edit</a>

                                        <form
                                            action="{{ route('company.destroy', $companies->id) }}"
                                            method="POST" onsubmit="return confirm('Are u sure Delete this item?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete<i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <h2>List empty</h2>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $company->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
