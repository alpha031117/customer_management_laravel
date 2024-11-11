<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        // Get the search keyword, gender, and birthday filter from the request
        $search = $request->get('search');
        $gender = $request->get('gender');
        $birthday = $request->get('birthday');

        // Initialize the query
        $query = Customer::query();

        // Apply the search filter (search by name or email)
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
        }

        // Apply the gender filter
        if ($gender) {
            $query->where('gender', $gender);
        }

        // Apply the birthday filter (customers born after 2000)
        if ($birthday) {
            $query->where('birthday', '>', Carbon::createFromDate(2000, 1, 1));
        }

        // Fetch customers with pagination
        $customers = $query->paginate(10);

        return view('customers.CustomerList', compact('customers'));
    }

    public function create()
    {
        // Return the view to create a new customer
        return view('customers.CustomerAdd');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:customers',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'gender' => 'required|in:male,female,other',
            'birthday' => 'required|date',
        ]);

        // Create a new customer and store in the database
        Customer::create($validated);

        // Redirect to the customer list
        return redirect()->route('customers.index')->with('success', 'Customer added successfully!');
    }
}

?>
