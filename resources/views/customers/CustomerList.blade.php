@extends('layouts.app')

@section('title', 'Customer List')

@section('content')
    <div class="container mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-10 mb-10">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Library</li>
            </ol>
        </nav>

        <h1 class="text-left fw-bold" style="font-size: 50px; font-weight:600;">Customer List</h1>
        <!-- Add Customer Button -->
        <div class="flex mb-3 justify-content-end">
            <a href="{{ route('customers.create') }}" class="btn btn-secondary">Add Customer</a>
        </div>
        <div class="row mb-3 justify-content-end">
            <!-- Filter Form -->
            <div class="col-md-4">
                <form action="{{ route('customers.index') }}" method="GET" class="d-flex justify-content-end gap-3">
                    <!-- Gender Filter -->
                    <select name="gender" class="form-control" style="width: 400px;">
                        <option value="">All Gender</option>
                        <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    </select>

                    <!-- Birthday Filter (Born after 2000) -->
                    <select name="birthday" class="form-control" style="width: 450px;">
                        <option value="">Born After 2000</option>
                        <option value="yes" {{ request('birthday') == 'yes' ? 'selected' : '' }}>Yes</option>
                    </select>

                    <!-- Search Button -->
                    <button type="submit" class="btn btn-primary" style="width: 320px;">Search</button>
                </form>
            </div>
        </div>

        <!-- Table for displaying customer data -->
        <table class="table table-hover mt-10">
            <thead>
                <tr class="text-xl">
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Birthday</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr style="height: 40px;">
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->phoneNumber }}</td>
                        <td>{{ ucfirst($customer->gender) }}</td>
                        <td>{{ \Carbon\Carbon::parse($customer->birthday)->format('M d, Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-end mt-10">
            {{ $customers->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
