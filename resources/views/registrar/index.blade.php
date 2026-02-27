<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex bg-gray-50 font-sans">

    <!-- Sidebar Placeholder -->
  @include('layouts.sidebar.registrar')

    <!-- Main Content -->
    <main class="flex-1 p-8 bg-gray-50 min-h-screen">

        <!-- Header -->
        <header class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div>
                <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">
                    Registrar Dashboard
                </h1>
                <p class="text-slate-500 mt-2">
                    Enrollment and academic overview
                </p>
            </div>

            <div class="text-right">
                <p class="text-slate-400 text-sm uppercase tracking-widest font-semibold">
                    Monday 3:45 PM
                </p>
                <p class="text-slate-800 font-bold">
                    March 02, 2026
                </p>
            </div>
        </header>

        <!-- QUICK STATISTICS -->
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                <p class="text-sm text-slate-400 font-medium">Total Enrolled Students</p>
                <h2 class="text-3xl font-extrabold text-slate-900 mt-2">1,245</h2>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                <p class="text-sm text-slate-400 font-medium">Pending Enrollments</p>
                <h2 class="text-3xl font-extrabold text-yellow-600 mt-2">38</h2>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                <p class="text-sm text-slate-400 font-medium">Sections</p>
                <h2 class="text-3xl font-extrabold text-slate-900 mt-2">52</h2>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                <p class="text-sm text-slate-400 font-medium">Teachers</p>
                <h2 class="text-3xl font-extrabold text-slate-900 mt-2">78</h2>
            </div>

        </section>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Grade Level Statistics -->
            <section class="lg:col-span-1 bg-white p-8 rounded-3xl shadow-sm border border-slate-200">
                <h2 class="text-xl font-bold text-slate-800 mb-6">
                    Enrollment per Grade Level
                </h2>

                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-slate-600 font-medium">Grade 7</span>
                        <span class="text-slate-900 font-bold">210</span>
                    </div>

                    <div class="flex justify-between items-center">
                        <span class="text-slate-600 font-medium">Grade 8</span>
                        <span class="text-slate-900 font-bold">195</span>
                    </div>

                    <div class="flex justify-between items-center">
                        <span class="text-slate-600 font-medium">Grade 9</span>
                        <span class="text-slate-900 font-bold">220</span>
                    </div>

                    <div class="flex justify-between items-center">
                        <span class="text-slate-600 font-medium">Grade 10</span>
                        <span class="text-slate-900 font-bold">205</span>
                    </div>

                    <div class="flex justify-between items-center">
                        <span class="text-slate-600 font-medium">Grade 11</span>
                        <span class="text-slate-900 font-bold">210</span>
                    </div>

                    <div class="flex justify-between items-center">
                        <span class="text-slate-600 font-medium">Grade 12</span>
                        <span class="text-slate-900 font-bold">205</span>
                    </div>
                </div>
            </section>

            <!-- Recent Enrollment Activity -->
            <section class="lg:col-span-2 bg-white p-8 rounded-3xl shadow-sm border border-slate-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-slate-800">
                        Recent Enrollment Activity
                    </h2>
                </div>

                <div class="space-y-4">

                    <div class="flex justify-between items-center p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <div>
                            <h3 class="font-semibold text-slate-800">
                                Juan Dela Cruz
                            </h3>
                            <p class="text-sm text-slate-500">
                                Grade 10 • March 01, 2026 09:15 AM
                            </p>
                        </div>
                        <span class="px-3 py-1 text-xs font-bold rounded-full bg-green-100 text-green-700">
                            Approved
                        </span>
                    </div>

                    <div class="flex justify-between items-center p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <div>
                            <h3 class="font-semibold text-slate-800">
                                Maria Santos
                            </h3>
                            <p class="text-sm text-slate-500">
                                Grade 9 • March 01, 2026 01:40 PM
                            </p>
                        </div>
                        <span class="px-3 py-1 text-xs font-bold rounded-full bg-yellow-100 text-yellow-700">
                            Pending
                        </span>
                    </div>

                    <div class="flex justify-between items-center p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <div>
                            <h3 class="font-semibold text-slate-800">
                                Mark Reyes
                            </h3>
                            <p class="text-sm text-slate-500">
                                Grade 8 • February 28, 2026 04:20 PM
                            </p>
                        </div>
                        <span class="px-3 py-1 text-xs font-bold rounded-full bg-red-100 text-red-700">
                            Rejected
                        </span>
                    </div>

                </div>
            </section>

        </div>

    </main>

</body>

</html>