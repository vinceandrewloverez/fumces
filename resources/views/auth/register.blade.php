<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - FUMCES</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen">

<div class="min-h-screen flex">

    <!-- Left Image Section -->
    <div class="hidden lg:flex w-1/2 relative">
        <img
            src="https://media.istockphoto.com/id/2096480418/photo/group-of-multi-cultural-children-friends-linking-arms-looking-down-into-camera.jpg"
            class="absolute inset-0 w-full h-full object-cover"
        >
        <div class="absolute inset-0 bg-green-900/30"></div>
    </div>

    <!-- Right Register Section -->
    <div class="w-full lg:w-1/2 flex items-center justify-center px-6">
        <div class="w-full max-w-md">

            <div class="text-center mb-6">
                <img src="{{ asset('images/fumces_logo.jpg') }}"
                    class="w-24 h-24 mx-auto rounded-full mb-2"
                >
                <h1 class="text-2xl font-semibold text-green-700">Create Account</h1>
            </div>

            <!-- Laravel Register Form -->
            <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-4">
                @csrf

                <!-- Name -->
                <div>
                    <label class="text-sm font-medium text-gray-700">Full Name</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        class="w-full px-4 py-2 border border-green-600 rounded-lg focus:ring-2 focus:ring-green-500"
                    >
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="text-sm font-medium text-gray-700">Email</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full px-4 py-2 border border-green-600 rounded-lg focus:ring-2 focus:ring-green-500"
                    >
                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <input
                            type="password"
                            name="password"
                            id="password"
                            required
                            class="w-full px-4 py-2 border border-green-600 rounded-lg focus:ring-2 focus:ring-green-500 pr-10"
                        >
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-green-700">
                            <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.969 9.969 0 012.223-3.703M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="space-y-1 mt-4">
                    <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <div class="relative">
                        <input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            required
                            class="w-full px-4 py-2 border border-green-600 rounded-lg focus:ring-2 focus:ring-green-500 pr-10"
                        >
                        <button type="button" id="toggleConfirmPassword" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-green-700">
                            <svg id="eyeOpenConfirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg id="eyeClosedConfirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.969 9.969 0 012.223-3.703M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- Submit -->
                <button
                    type="submit"
                    class="w-full bg-green-600 text-white py-2 rounded-lg font-semibold hover:bg-green-700"
                >
                    Register
                </button>
            </form>

            <!-- Divider -->
            <div class="flex items-center my-6">
                <div class="flex-1 h-px bg-gray-300"></div>
                <span class="px-3 text-sm text-gray-500">Already have an account?</span>
                <div class="flex-1 h-px bg-gray-300"></div>
            </div>

            <!-- Login Link -->
            <a href="{{ route('login') }}"
               class="block w-full text-center border border-green-600 text-green-700 py-2 rounded-lg font-semibold hover:bg-green-50">
                Log In
            </a>

        </div>
    </div>

</div>

<script>
    // Toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    const eyeOpen = document.getElementById('eyeOpen');
    const eyeClosed = document.getElementById('eyeClosed');

    togglePassword.addEventListener('click', () => {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        eyeOpen.classList.toggle('hidden');
        eyeClosed.classList.toggle('hidden');
    });

    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const passwordConfirm = document.getElementById('password_confirmation');
    const eyeOpenConfirm = document.getElementById('eyeOpenConfirm');
    const eyeClosedConfirm = document.getElementById('eyeClosedConfirm');

    toggleConfirmPassword.addEventListener('click', () => {
        const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordConfirm.setAttribute('type', type);
        eyeOpenConfirm.classList.toggle('hidden');
        eyeClosedConfirm.classList.toggle('hidden');
    });
</script>

</body>
</html>