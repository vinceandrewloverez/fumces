<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student | My Tuition</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex bg-gray-50 font-sans">

   @include('layouts.sidebar.student')

    <!-- Main Content -->
    <main class="flex-1 p-8">

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-4xl font-bold text-gray-800">My Tuition</h1>
                <p class="text-gray-500 mt-1">Manage your payments and billing history</p>
            </div>
            <button id="openSubmitModal"
                class="bg-green-700 text-white px-6 py-3 rounded-xl hover:bg-green-800 transition shadow-lg flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Submit Payment Proof
            </button>
        </div>

        <!-- Success/Error Messages -->
        <div id="message" class="hidden mb-6 p-4 rounded shadow-sm"></div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-500 font-medium text-sm">Total Approved</h3>
                        <p class="text-2xl font-bold text-gray-800 mt-1" id="totalPaid">₱7,188.00</p>
                    </div>
                    <div class="bg-green-100 p-2 rounded-full text-green-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div id="balanceCard"
                class="bg-white p-6 rounded-2xl shadow-sm border border-red-100 relative overflow-hidden hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-500 font-medium text-sm">Remaining Balance</h3>
                        <p class="text-2xl font-extrabold text-red-600 mt-1" id="remainingBalance">₱8,550.00</p>
                    </div>
                    <div class="bg-red-100 text-red-600 p-2 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-500 font-medium text-sm">Pending Verifications</h3>
                        <p class="text-2xl font-bold text-gray-800 mt-1" id="pendingCount">2</p>
                    </div>
                    <div class="bg-yellow-100 p-2 rounded-full text-yellow-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tuition Breakdown -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-10">
            <div class="lg:col-span-1 bg-green-700 text-white p-8 rounded-2xl shadow-lg flex flex-col justify-between">
                <div>
                    <h3 class="text-green-100 font-medium uppercase tracking-wider text-xs">Annual School Fees</h3>
                    <p class="text-4xl font-bold mt-2">₱15,738.00</p>
                </div>

                <div class="space-y-3 mt-8">
                    <div class="flex justify-between text-sm border-b border-green-600/50 pb-2">
                        <span class="text-green-200">Tuition Fee:</span>
                        <span class="text-gray-100 font-medium">₱7,188.00</span>
                    </div>
                    <div class="flex justify-between text-sm border-b border-green-600/50 pb-2">
                        <span class="text-green-200">Miscellaneous Fee:</span>
                        <span class="text-gray-100 font-medium">₱8,550.00</span>
                    </div>
                    <div class="flex justify-between text-sm pt-2 italic text-green-300">
                        <span>Paid to Date:</span>
                        <span id="paidToDate">₱7,188.00</span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                    <h2 class="font-bold text-gray-800 tracking-tight">Breakdown of Miscellaneous Fees</h2>
                    <span class="text-[10px] font-bold px-2 py-1 rounded-lg bg-green-100 text-green-700 uppercase">Itemized</span>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-2">
                        <div class="space-y-2">
                            <div class="flex justify-between text-sm border-b border-gray-50 py-1"><span class="text-gray-500">Registration Fee</span><span class="font-medium text-gray-800">₱2,000</span></div>
                            <div class="flex justify-between text-sm border-b border-gray-50 py-1"><span class="text-gray-500">Medical and Dental</span><span class="font-medium text-gray-800">₱600</span></div>
                            <div class="flex justify-between text-sm border-b border-gray-50 py-1"><span class="text-gray-500">ID Fee</span><span class="font-medium text-gray-800">₱250</span></div>
                            <div class="flex justify-between text-sm border-b border-gray-50 py-1"><span class="text-gray-500">AV / Computer Fee</span><span class="font-medium text-gray-800">₱2,000</span></div>
                            <div class="flex justify-between text-sm border-b border-gray-50 py-1"><span class="text-gray-500">Athletes / Energy Fee</span><span class="font-medium text-gray-800">₱1,200</span></div>
                        </div>
                        <div class="space-y-2">
                            <div class="flex justify-between text-sm border-b border-gray-50 py-1"><span class="text-gray-500">HGP Modules</span><span class="font-medium text-gray-800">₱400</span></div>
                            <div class="flex justify-between text-sm border-b border-gray-50 py-1"><span class="text-gray-500">Learning / Testing Mats</span><span class="font-medium text-gray-800">₱1,000</span></div>
                            <div class="flex justify-between text-sm border-b border-gray-50 py-1"><span class="text-gray-500">Insurance / Handbook</span><span class="font-medium text-gray-800">₱350</span></div>
                            <div class="flex justify-between text-sm border-b border-gray-50 py-1"><span class="text-gray-500">Org & Membership Fees</span><span class="font-medium text-gray-800">₱450</span></div>
                            <div class="flex justify-between text-sm pt-2 mt-1">
                                <span class="font-bold text-gray-800">Sub-Total Misc</span>
                                <span class="font-bold text-green-700">₱8,550.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment History Table -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                <h2 class="text-xl font-bold text-gray-800">Payment History</h2>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Date Submitted</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Method</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Reference No.</th>
                        <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Proof</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white" id="paymentHistory">
                    <!-- Sample Static Row -->
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-sm text-gray-600">Feb 23, 2026</td>
                        <td class="px-6 py-4 text-sm font-bold text-gray-800">₱7,188.00</td>
                        <td class="px-6 py-4 text-sm text-gray-600">Online Transfer</td>
                        <td class="px-6 py-4 text-sm text-gray-500 font-mono">ABC12345</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold">Approved</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium underline">View File</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </main>
</body>

</html>