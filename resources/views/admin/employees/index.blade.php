@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employees') }}</div>
                <div class="mt-2 mb-2 ml-2">
                    <a class="btn btn-success" href="{{ route('employees.create') }}">Add
                        Employees</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Company</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($employees as $key => $employer )
                                <tr>
                                    <th scope="row">{{ $employees->firstItem() + $key }}</th>
                                    <td>{{ $employer->name }}</td>
                                    <td>{{ $employer->companies->name }}</td>
                                    <td>{{ $employer->email }}</td>
                                    <td>{{ $employer->phone }}</td>
                                    <td>
                                        <a href="{{ route('employees.edit',$employer->id) }}"
                                            class="btn btn-primary">Edit</a>

                                        <form
                                            action="{{ route('employees.destroy', $employer->id) }}"
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
                        {{ $employees->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
