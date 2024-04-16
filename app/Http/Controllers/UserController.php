<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gender;




class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $usersQuery = User::query()->with('gender'); // Eager load the gender relationship
    
        if ($search) {
            $usersQuery->where(function ($query) use ($search) {
                $query->where('first_name', 'LIKE', "%{$search}%")
                    ->orWhere('last_name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
                    
                if (strtolower($search) == 'male' || strtolower($search) == 'female') {
                    $query->orWhereHas('gender', function ($query) use ($search) {
                        $query->where('gender', $search);
                    });
                }
            });
        }
    
        $users = $usersQuery->paginate(9); // Paginate the results
        $users->appends(['search' => $search]); // Append the search query to the pagination links
        return view('users.index', compact('users'));
    }
    
    

    public function create()
    {
        $genders = Gender::all();
        return view('users.create', compact('genders'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => ['required', 'max:255'],
            'middle_name' => ['nullable', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'suffix_name' => ['nullable', 'max:255'],
            'birth_date' => ['required', 'date'],
            'gender_id' => ['required', 'exists:genders,id'], // Ensure gender_id exists in the 'genders' table
            'address' => ['required', 'max:255'],
            'contact_number' => ['required'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'], // Increased minimum password length to 8
        ],[
            'gender_id.required' => 'Please select a gender.',
            'gender_id.exists' => 'Please select a valid gender.', // Error message for invalid gender_id
        ]);

        return dd($request);

        // $validatedData['password'] = bcrypt($validatedData['password']);

        // User::create($validatedData);

        // return redirect()->route('/users')->with('success', 'User added successfully.');
    }
    
    

    public function show($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Return the view with the user data
        return view('users.view', compact('user'));
    }

    public function edit($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Return the view with the user data
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            // Add validation rules for other fields
        ]);

        // Update the user with the new data
        $user->update($request->all());

        // Redirect back with a success message
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        // Find the user by ID and delete it
        $user = User::findOrFail($id);
        $user->delete();

        // Redirect back with a success message
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function login() {
        return view('login.login');
    }

    public function processLogin(Request $request) {
        $validated =$request->validate([
            'username' => ['required', 'max:12'],
            'password' => ['required', 'max:15']
        ]);

        $user = User::where('username', $validated['username'])
            ->first();

         if($user && Hash::check($validated['password'], $user->password) && auth()->attempt($validated)) {
            auth()->login($user);
            $request->session()->regenerate();
            return redirect('/users');
         }
         else {
            // Password does not match
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }
        public function logout(Request $request) {
            auth()->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/')->with('message_success', 'Your account has been successfully logged out,');
        }
        public function anotherProcessLogout(Request $request) {
            auth()->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/');

        }
}