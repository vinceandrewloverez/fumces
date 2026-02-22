<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student | My Tuition</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex bg-gray-50 font-sans">

   @include('layouts.sidebar.system-admin')

    <!-- Main Content -->
    <main class="flex-1 p-8 bg-gray-50">

        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-4xl font-bold text-gray-800">Payment Management</h1>
                <p class="text-gray-500 mt-1">Review, approve, and manage student tuition submissions</p>
            </div>
            <div class="flex gap-3">
                <button class="bg-white border border-gray-300 text-gray-700 px-6 py-3 rounded-xl hover:bg-gray-50 transition shadow-sm flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Export Report
                </button>
                <button class="bg-green-700 text-white px-6 py-3 rounded-xl hover:bg-green-800 transition shadow-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Search Student
                </button>
            </div>
        </div>
    
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-gray-500 font-medium text-sm">Total Collections</h3>
                <p class="text-2xl font-bold text-gray-800 mt-1">₱1.2M</p>
                <span class="text-green-700 text-xs font-bold">↑ 12% from last month</span>
            </div>
    
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-yellow-100">
                <h3 class="text-gray-500 font-medium text-sm">Awaiting Review</h3>
                <p class="text-2xl font-bold text-yellow-600 mt-1" id="adminPending">48</p>
                <span class="text-gray-400 text-xs italic">Requires immediate action</span>
            </div>
    
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-gray-500 font-medium text-sm">Total Unpaid Balance</h3>
                <p class="text-2xl font-bold text-red-500 mt-1">₱450,200</p>
                <span class="text-gray-400 text-xs italic">Across 124 students</span>
            </div>
    
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-gray-500 font-medium text-sm">Verification Rate</h3>
                <p class="text-2xl font-bold text-green-700 mt-1">94%</p>
                <span class="text-gray-400 text-xs italic">Avg. 24hr turnaround</span>
            </div>
        </div>
    
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-white">
                <h2 class="text-xl font-bold text-gray-800">Recent Submissions</h2>
                <div class="flex gap-2">
                    <select class="text-sm border-gray-200 rounded-lg focus:ring-green-500 focus:border-green-500">
                        <option>All Statuses</option>
                        <option>Pending</option>
                        <option>Approved</option>
                        <option>Rejected</option>
                    </select>
                </div>
            </div>
            
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Student Name</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Date Submitted</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Ref No.</th>
                        <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase">Proof</th>
                        <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    <tr class="hover:bg-green-50/30 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center text-green-700 font-bold text-xs mr-3">JD</div>
                                <div>
                                    <div class="text-sm font-bold text-gray-900">John Doe</div>
                                    <div class="text-xs text-gray-500">ID: 2024-0012</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">Feb 23, 2026</td>
                        <td class="px-6 py-4 text-sm font-bold text-gray-800">₱5,000.00</td>
                        <td class="px-6 py-4 text-sm text-gray-500 font-mono uppercase">GCash-9921</td>
                        <td class="px-6 py-4 text-center">
                            <button class="text-green-700 hover:text-green-800 text-sm font-medium flex items-center gap-1 mx-auto">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                Preview
                            </button>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-2">
                                <button class="px-3 py-1.5 bg-green-700 text-white rounded-lg text-xs font-bold hover:bg-green-800">Approve</button>
                                <button class="px-3 py-1.5 bg-red-50 text-red-600 rounded-lg text-xs font-bold hover:bg-red-100 border border-red-200">Reject</button>
                            </div>
                        </td>
                    </tr>
    
                    <tr class="bg-gray-50/50">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold text-xs mr-3">MS</div>
                                <div>
                                    <div class="text-sm font-bold text-gray-900">Maria Santos</div>
                                    <div class="text-xs text-gray-500">ID: 2024-0045</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">Feb 21, 2026</td>
                        <td class="px-6 py-4 text-sm font-bold text-gray-800">₱7,188.00</td>
                        <td class="px-6 py-4 text-sm text-gray-500 font-mono">ABC12345</td>
                        <td class="px-6 py-4 text-center italic text-gray-400 text-xs">Verified</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold">Approved by Admin</span>
                        </td>
                    </tr>
                </tbody>
            </table>
    
            <div class="p-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center text-sm text-gray-500">
                <span>Showing 1 to 10 of 48 requests</span>
                <div class="flex gap-2">
                    <button class="px-3 py-1 border rounded hover:bg-white">Prev</button>
                    <button class="px-3 py-1 border rounded hover:bg-white">Next</button>
                </div>
            </div>
        </div>
    
    </main>
</body>

</html>