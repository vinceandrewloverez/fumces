<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex bg-gray-50 font-sans">

    @include('layouts.sidebar.student')

    <!-- Main Content -->
    <main class="flex-1 p-8 bg-gray-50 min-h-screen">

        <header class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div>
                <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">Student Portal</h1>
                <div class="flex items-center gap-3 mt-2 text-sm font-medium text-slate-500">
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full uppercase tracking-wider text-xs">A.Y. 2025-2026</span>
                    <span>•</span>
                    <span>Second Semester</span>
                </div>
            </div>
            <div class="text-right">
                <p class="text-slate-400 text-sm uppercase tracking-widest font-semibold">
                    {{ now()->setTimezone('Asia/Manila')->format('l g:i a') }}
                </p>                </p>                <p class="text-slate-800 font-bold">
                    {{ now()->format('F d, Y') }}
                </p>            </div>
        </header>
    
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <section class="lg:col-span-1 space-y-6">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-200 relative overflow-hidden">
                    
                    @foreach($admissions as $admission)
                    <div class="w-20 h-20 bg-gradient-to-tr bg-green-700 rounded-2xl flex items-center justify-center text-white text-2xl font-bold mb-6 shadow-lg">
                        {{ strtoupper(substr($admission->studentFirstName ?? '', 0, 1) . substr($admission->studentLastName ?? '', 0, 1)) }}
                    </div>
                @endforeach

                    @if($admissions->isEmpty())
                    <p>No admissions found.</p>
                @else
                    @foreach($admissions as $admission)
                        <h2 class="text-2xl font-bold text-slate-800">
                            {{ $admission->studentFirstName }} {{ $admission->studentLastName }}
                        </h2>
                        <!-- Other admission info here -->
                    @endforeach
                @endif                    <p class="text-slate-500 font-medium">SN: 2022-10847</p>
                    
                    <hr class="my-6 border-slate-100">
                    
                    <div class="space-y-4">
                        <div class="flex justify-between">
                            <span class="text-slate-400">Grade Level</span>
                            @foreach($admissions as $admission)
                            <p class="text-slate-700 font-semibold text-right">
                                {{
                                    match($admission->year_level) {
                                        'kinder1' => 'Kinder 1',
                                        'kinder2' => 'Kinder 2',
                                        'kinder3' => 'Kinder 3',
                                        'grade1'  => 'Grade 1',
                                        'grade2'  => 'Grade 2',
                                        'grade3'  => 'Grade 3',
                                        'grade4'  => 'Grade 4',
                                        'grade5'  => 'Grade 5',
                                        'grade6'  => 'Grade 6',
                                        'grade7'  => 'Grade 7',
                                        'grade8'  => 'Grade 8',
                                        'grade9'  => 'Grade 9',
                                        'grade10' => 'Grade 10',
                                        default => 'N/A',
                                    }
                                }}
                            </p>                        @endforeach
                                            </div>
                        <div class="flex justify-between">
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-slate-400">Cumulative Average Grade</span>
                            <span class="text-2xl font-black text-green-600">97</span>
                        </div>
                    </div>
                </div>
            </section>
    
            <div class="lg:col-span-2 space-y-8">
                
                <section class="bg-white p-8 rounded-3xl shadow-sm border border-slate-200">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-slate-800">Current Term Performance</h2>
                        <button class="text-green-600 text-sm font-semibold hover:underline">View Transcript</button>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                            <p class="text-xs font-bold text-slate-400 uppercase mb-1">CS 211</p>
                            <p class="text-sm font-bold text-slate-700 truncate">Data Structures</p>
                            <div class="mt-4 flex items-end justify-between">
                                <span class="text-2xl font-black text-slate-900">1.25</span>
                                <span class="text-xs font-bold text-green-600 mb-1">Excellent</span>
                            </div>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                            <p class="text-xs font-bold text-slate-400 uppercase mb-1">CS 202</p>
                            <p class="text-sm font-bold text-slate-700 truncate">OOP</p>
                            <div class="mt-4 flex items-end justify-between">
                                <span class="text-2xl font-black text-slate-900">1.50</span>
                                <span class="text-xs font-bold text-green-600 mb-1">Superior</span>
                            </div>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                            <p class="text-xs font-bold text-slate-400 uppercase mb-1">MATH 201</p>
                            <p class="text-sm font-bold text-slate-700 truncate">Discrete Math</p>
                            <div class="mt-4 flex items-end justify-between">
                                <span class="text-2xl font-black text-slate-900">1.75</span>
                                <span class="text-xs font-bold text-green-500 mb-1">Very Good</span>
                            </div>
                        </div>
                    </div>
                </section>
    
                <section class="bg-white p-8 rounded-3xl shadow-sm border border-slate-200">
                    <h2 class="text-xl font-bold text-slate-800 mb-6">Today's Schedule</h2>
                    <div class="space-y-4">
                        <div class="flex items-center p-4 bg-green-50 rounded-2xl border border-green-100">
                            <div class="pr-6 border-r border-green-200 text-green-700 font-bold">
                                07:30
                            </div>
                            <div class="pl-6">
                                <h3 class="font-bold text-slate-800">Data Structures & Algorithms</h3>
                                <p class="text-sm text-slate-500 font-medium">Room GK-301 • M-W-F</p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-white rounded-2xl border border-slate-100">
                            <div class="pr-6 border-r border-slate-200 text-slate-400 font-bold">
                                10:00
                            </div>
                            <div class="pl-6">
                                <h3 class="font-bold text-slate-800 text-opacity-80">Discrete Mathematics</h3>
                                <p class="text-sm text-slate-400">Room MB-205 • M-W-F</p>
                            </div>
                        </div>
                    </div>
                </section>
    
            </div>
        </div>
    </main>



</body>

</html>