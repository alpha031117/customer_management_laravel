@extends('layouts.app')

@section('title', 'Customer Management System')

@section('content')
    <div class="container vh-100 d-flex flex-column justify-content-center align-items-center">
        <!-- Hero Section -->
        <div class="d-flex justify-content-center mb-10">
            <img src="{{ asset('images/hero_image.gif') }}" alt="Hero Image" class="img-fluid"
                style="width: 500px; height: auto;">
        </div>
        <h1 class="text-center" style="font-size:xx-large;">Welcome to the <span class="fw-bold">Customer Management
                System</span></h1>
        <p class="lead text-center mb-3">This system allows you to manage your customers' information.</p>

        <!-- Add Customer Button -->
        <div class="d-flex justify-content-center mb-3">
            <a href="{{ route('customers.index') }}" class="btn btn-primary px-4">Customer List</a>
        </div>
    </div>

@endsection
