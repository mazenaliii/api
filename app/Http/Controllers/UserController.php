<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class UserController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:user', ['except' => ['login', 'register']]);
    }
    /**
     * Get a JWT via given credentials.
     *
     * 
     */
    
    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->createNewToken($token);
    }
    /**
     * Register a User.
     *
     * 
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            're_password' => 'required|same:password',
        ]);

        $user = User::create ([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            're_password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     */
    public function logout() {
        auth()->guard('users')->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }
    /**
     * Refresh a token.
     *
     * 
     */
   public function refresh()
    {
        return response()->json([
            'user' => Auth::user(),
            'authorization' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

    /**
     * Get the authenticated User.
     *
     * 
     */
    public function userProfile() {
        return response()->json(auth()->user());
    }
    /**
     * Get the token array structure.
     *
     * 
     */
    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}