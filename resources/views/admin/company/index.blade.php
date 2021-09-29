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
                    <table id="company_table" class="table display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Companies Name</th>
                                <th>Companies Email</th>
                                <th>Companies Website</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($company as $key =>  $companies )
                                <tr>
                                    <!-- <td>{{ $company->firstItem() + $key }}</td>
@if($companies->logo == '')
                                        <td>
                                            <p>No images</p>
                                        </td>
@else
                                        <td>
                                            <img class="img-fluid"
                                                src="{{ asset('storage/'.$companies->logo) }}">
                                        </td>
@endif-->

                                    <td>{{ $companies->name }}</td>
                                    <td>{{ $companies->email }}</td>
                                    <td>{{ $companies->website }}</td>
                                    <!-- <td>
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
                                    </td> -->
                                </tr>
                            @empty
                                <h2>List empty</h2>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- <div class="mt-3">
                        {{ $company->links() }}
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js">
</script>
<script src="{{ asset('js/backend/company.js') }}"></script>
@endsection
