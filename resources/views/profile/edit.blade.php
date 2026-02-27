<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Profile | FUMCES</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen flex bg-gray-50">

    @include('layouts.sidebar.profile')

    <main class="flex-1">
        <header
            class="sticky top-0 z-50 flex h-16 items-center justify-between border-b border-gray-100 bg-white/80 px-8 backdrop-blur-md">
            <h1 class="text-lg font-bold tracking-tight text-gray-900">
                Account Settings
            </h1>

            <a href="{{ route('welcome') }}"
                class="group flex items-center gap-2 rounded-full bg-green-700 px-5 py-2 shadow-sm transition-all hover:bg-green-800 hover:shadow-md active:scale-95 no-underline">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4 text-white transition-transform group-hover:-translate-x-1" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>

                <span class="text-sm font-semibold tracking-wide text-white">
                    Back
                </span>
            </a>
        </header>
        <div class="p-8 w-full">
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-800 rounded-xl">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white border border-gray-200 shadow-sm rounded-xl overflow-hidden w-full">

                <div
                    class="p-8 bg-gray-50/50 border-b border-gray-200 flex flex-col md:flex-row items-center gap-6 w-full">
                    <div class="relative group">
                        <img src="https://ui-avatars.com/api/?name=User&background=057E2E&color=fff&size=200"
                            class="w-24 h-24 rounded-2xl border-2 border-white shadow-md object-cover">
                        <label for="img_upload"
                            class="absolute -bottom-2 -right-2 bg-white border border-gray-200 p-1.5 rounded-lg shadow-md cursor-pointer hover:text-[#057E2E] transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            </svg>
                        </label>
                        <input type="file" id="img_upload" class="hidden" disabled>
                    </div>
                    <div class="text-center md:text-left">
                        <h2 class="text-2xl font-bold text-gray-900">{{ auth()->user()->name ?? '' }}</h2>
                        <p class="text-sm text-[#057E2E] font-semibold">{{$user->role}}</p>

                        @if(auth()->user()->student_id)
                            <p class="text-xs text-gray-400 mt-1 uppercase tracking-widest">Student ID:
                                {{ auth()->user()->student_id }}</p>
                        @elseif(auth()->user()->employee_id)
                            <p class="text-xs text-gray-400 mt-1 uppercase tracking-widest">Employee ID:
                                {{ auth()->user()->employee_id }}</p>
                        @else
                            <p class="text-xs text-gray-400 mt-1 uppercase tracking-widest">ID: Not Assigned</p>
                        @endif
                    </div>
                </div>

                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data"
                    class="divide-y divide-gray-100 w-full">
                    @csrf
                    @method('PATCH')

                    <div class="p-8 w-full">
                        <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-6">Personal Information
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full">

                            <!-- Full Name (Read Only) -->
                            <div class="space-y-1">
                                <label class="text-xs font-bold text-gray-700 uppercase">Full Name</label>
                                <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 bg-gray-100 text-gray-500 cursor-not-allowed text-sm"
                                    readonly>
                            </div>


                            <!-- Email (Editable) -->
                            <div class="space-y-1">
                                <label class="text-xs font-bold text-gray-700 uppercase">Address</label>
                                <input type="text" name="address" value="{{ old('address', auth()->user()->address) }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#057E2E] outline-none transition-all text-sm"
                                    required>
                            </div>

                            <!-- Email (Editable) -->
                            <div class="space-y-1">
                                <label class="text-xs font-bold text-gray-700 uppercase">Email Address</label>
                                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#057E2E] outline-none transition-all text-sm"
                                    required>
                            </div>

                            <!-- Contact (Editable) -->
                            <div class="space-y-1">
                                <label class="text-xs font-bold text-gray-700 uppercase">Contact Number</label>
                                <input type="text" name="contactNumber" id="contactNumber"
                                    value="{{ old('contactNumber', auth()->user()->contactNumber) }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#057E2E] outline-none transition-all text-sm"
                                    maxlength="11" oninput="checkContactNumber(this)">
                                <p id="contactError" class="text-xs text-red-600 mt-1 hidden"></p>
                            </div>



                        </div>
                    </div>

                    <!-- Save Button -->
                    <div class="p-8 bg-gray-50/30 flex justify-end w-full">
                        <button type="submit"
                            class="px-6 py-2 bg-[#057E2E] text-white text-sm font-bold rounded-lg shadow-md hover:bg-[#046324] transition">
                            Save Changes
                        </button>
                    </div>

                </form>
            </div>

            <div class="mt-8 p-6 bg-red-50 border border-red-100 rounded-xl flex justify-between items-center w-full">
                <div>
                    <p class="text-sm font-bold text-red-800">Deactivate Account</p>
                    <p class="text-xs text-red-600/70">Once deactivated, you will lose access to the FUMCES portal.</p>
                </div>
                <button class="text-sm font-bold text-red-600 hover:underline">Request Deactivation</button>
            </div>

        </div>
    </main>

    <script>
        function checkContactNumber(input) {
            const errorEl = document.getElementById('contactError');
            const value = input.value.replace(/\D/g, ''); // remove non-digit characters
            input.value = value; // keep only digits

            if (value.length > 11) {
                errorEl.textContent = "Contact number cannot exceed 11 digits.";
                errorEl.classList.remove('hidden');
            } else if (value.length < 11 && value.length > 0) {
                errorEl.textContent = "Contact number must be exactly 11 digits.";
                errorEl.classList.remove('hidden');
            } else {
                errorEl.textContent = "";
                errorEl.classList.add('hidden');
            }
        }
    </script>

</body>

</html>