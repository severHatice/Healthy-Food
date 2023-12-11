<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerForm()
    {
        return view('users.auth.register');
    }

    public function register(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'gender' => 'required|in:male,female',
            'age' => 'required|integer',
            'weight' => 'required|numeric',
            'height' => 'required|numeric'
        ]);

        // Calculate daily calorie target based on user input
        $dailyCalorieTarget = $this->calculateDailyCalorieTarget(
            $validatedData['gender'],
            $validatedData['age'],
            $validatedData['weight'],
            $validatedData['height']
        );
        // Create new user with validated data
        User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'daily_calorie_target' => $dailyCalorieTarget,
            'admin' => false
        ]);

        return redirect('/login')->with('success', 'User successfully registered.');
    }
    //  calculate daily calorie target
    private function calculateDailyCalorieTarget($gender, $age, $weight, $height)
    {
        if ($gender === 'male') {
            return (10 * $weight) + (6.25 * $height) - (5 * $age) + 5;
        } else {
            return (10 * $weight) + (6.25 * $height) - (5 * $age) - 161;
        }
    }

    public function login()
    {
        return view('users.auth.login');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'User logged in Succesfully');
        }
        return back()->withErrors(['login' => 'Password or email incorrect']);
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'User loggeout succesfully');
    }

    // admin part get all users to manage
 // UserController.php

public function index(Request $request)
{
    $searchTerm = $request->input('searchform');
    $users = User::search($searchTerm)->paginate(3);
    return view('admin.users', compact('users'));
}

    // make admin the user //admin part
    public function updateAdminStatus(Request $request, $id)
    {
        $user = User::find($id);
        $user->admin = $request->has('admin');
        $user->save();

        return back()->with('success', 'User admin status updated.');
    }

    // oriante user form 
    public function editUserForm($id){
        $user=User::find($id);
        return view('admin.editUser',compact('user'));
    }

    // edit user as admin
    public function editUser(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email',
            // 'daily_calorie_target' => 'nullable|integer',
        ]);
    
        $user->update($validatedData);
    
        return back()->with('success', 'User updated successfully');
    }
    // delete user as admin
    public function deleteUserForm($id)
{
    $user = User::find($id);
    $user->delete();

    return back()->with('admin.adminpage')->with('success', 'User deleted successfully.');
}

    
}
