@extends('layouts.app')

@section('title', 'Add Customer')

@section('header')
<div class="container mb-3">
    <h1 class="text-left" style="font-size:x-large; font-weight:600;">Add Customer</h1>
</div>
@endsection

@section('content')
<div class="container">
    <!-- Customer Form -->
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control border border-secondary rounded-3 shadow-sm" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control border border-secondary rounded-3 shadow-sm" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control border border-secondary rounded-3 shadow-sm" id="address" name="address" required>
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control border border-secondary rounded-3 shadow-sm" id="phone_number" name="phone_number" required>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select border border-secondary rounded-3 shadow-sm" id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="birthday" class="form-label">Birthday</label>
            <input type="date" class="form-control border border-secondary rounded-3 shadow-sm" id="birthday" name="birthday" required>
        </div>

        <button type="submit" class="btn btn-primary rounded-3 px-4 py-2">Add Customer</button>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary rounded-3 px-4 py-2">Cancel</a>
    </form>
</div>
@endsection
