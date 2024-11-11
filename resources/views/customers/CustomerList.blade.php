@extends('layouts.app')

@section('title', 'Customer List')

@section('content')
<div class="container mt-2">
    <h1 class="text-left" style="font-size:x-large; font-weight:600;">Customer List</h1>
    <!-- Add Customer Button -->
    <div class="flex mb-3 justify-content-end">
        <a href="{{ route('customers.create') }}" class="btn btn-success">Add Customer</a>
    </div>
    <div class="row mb-3 justify-content-end">
        <!-- Filter Form -->
        <div class="col-md-4">
            <form action="{{ route('customers.index') }}" method="GET" class="d-flex justify-content-end gap-3">
                <!-- Gender Filter -->
                <select name="gender" class="form-control">
                    <option value="">Gender</option>
                    <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ request('gender') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
    
                <!-- Birthday Filter (Born after 2000) -->
                <select name="birthday" class="form-control" style="width: 5px;">
                    <option value="">Born After 2000</option>
                    <option value="yes" {{ request('birthday') == 'yes' ? 'selected' : '' }}>Yes</option>
                </select>
    
                <!-- Search Button -->
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>

    <!-- Table for displaying customer data -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Gender</th>
                <th scope="col">Birthday</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->phone_number }}</td>
                    <td>{{ ucfirst($customer->gender) }}</td>
                    <td>{{ \Carbon\Carbon::parse($customer->birthday)->format('M d, Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-end">
        {{ $customers->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
