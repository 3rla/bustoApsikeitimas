<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-blue-100 to-purple-100 flex justify-center items-center min-h-screen p-4">

    <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-md transition-all duration-300 hover:shadow-3xl">
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">Register</h2>

        <!-- Registration Form -->
        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name Fields -->
            <div class="flex space-x-4">
                <!-- First Name -->
                <div class="flex-1">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                    <input id="name"
                        class="w-full p-3 rounded-md border border-gray-300 @error('name') border-red-500 @enderror"
                        type="text" name="name" placeholder="Enter your first name" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Last Name -->
                <div class="flex-1">
                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                    <input id="last_name"
                        class="w-full p-3 rounded-md border border-gray-300 @error('last_name') border-red-500 @enderror"
                        type="text" name="last_name" placeholder="Enter your last name"
                        value="{{ old('last_name') }}">
                    @error('last_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input id="email"
                    class="w-full p-3 rounded-md border border-gray-300 @error('email') border-red-500 @enderror"
                    type="email" name="email" placeholder="Enter your email" required value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone Number -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                <input id="phone"
                    class="w-full p-3 rounded-md border border-gray-300 @error('phone') border-red-500 @enderror"
                    type="tel" name="phone" placeholder="Enter your phone number" value="{{ old('phone') }}">
                @error('phone')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <livewire:registration-password />

            <!-- Terms and Conditions Checkbox -->
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input type="checkbox" name="terms" id="terms"
                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" required>
                </div>
                <div class="ml-3 text-sm">
                    <label for="terms" class="font-medium text-gray-700">I agree to the <a href="#"
                            class="text-blue-600 hover:underline">Terms and Conditions</a></label>
                </div>
            </div>
            @error('terms')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            <!-- Signup Button -->
            <button type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded-md hover:bg-blue-700 transition duration-300 transform hover:scale-105">
                {{ __('Register') }}
            </button>

            <!-- Already have an account -->
            <p class="text-center text-sm text-gray-600 mt-4">
                Already have an account? <a href="{{ route('login') }}"
                    class="text-blue-600 hover:underline font-medium">Login</a>
            </p>
        </form>

        <!-- Divider -->
        <div class="flex items-center my-8">
            <hr class="flex-grow border-t border-gray-300">
            <span class="mx-4 text-gray-500 text-sm font-medium">Or</span>
            <hr class="flex-grow border-t border-gray-300">
        </div>

        <!-- Social Login Button -->
        <a href="#"
            class="flex items-center justify-center bg-white border border-gray-300 text-gray-700 py-3 rounded-md hover:bg-gray-50 transition duration-300 transform hover:scale-105">
            <svg class="h-6 w-6 mr-2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                    fill="#4285F4" />
                <path
                    d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                    fill="#34A853" />
                <path
                    d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                    fill="#FBBC05" />
                <path
                    d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                    fill="#EA4335" />
                <path d="M1 1h22v22H1z" fill="none" />
            </svg>
            Sign up with Google
        </a>
    </div>

</body>

</html>
