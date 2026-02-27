<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Portal | FUMCES Inc.</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body class="bg-slate-50 min-h-screen font-inter">

    @include('layouts.header')

    <section
        class="relative w-full min-h-[50vh] flex items-center justify-center bg-green-700 px-6 py-24 overflow-hidden">

        <div class="absolute inset-0 z-0 opacity-10">
            <div class="absolute inset-0"
                style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 32px 32px;"></div>
        </div>

        <div class="relative z-10 w-full max-w-7xl mx-auto flex flex-col items-center text-center">

            <span
                class="mb-6 inline-block px-4 py-1 border border-white/30 rounded text-xs font-bold tracking-[0.2em] text-white uppercase">
                Admissions Open 2026
            </span>

            <h1 class="text-white text-5xl md:text-7xl font-extrabold tracking-tight leading-[1.1] max-w-4xl">
                Start your academic journey here.
            </h1>

            <p class="mt-8 max-w-2xl text-lg md:text-xl text-white/80 leading-relaxed font-normal">
                We welcome students from all backgrounds. Apply for undergraduate, graduate, or transferee programs and
                take the first step toward your future.
            </p>

            <div class="mt-12 flex flex-col sm:flex-row items-center justify-center gap-4 w-full">
                <a href="#admissionForm"
                    class="w-full sm:w-auto px-10 py-4 bg-white text-green-700 font-bold rounded-md shadow-lg hover:bg-green-50 transition-colors flex items-center justify-center gap-2 tracking-wide">
                    APPLY NOW
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>


            </div>

            <div class="mt-20 w-full max-w-4xl pt-8 border-t border-white/10">
                <div
                    class="flex flex-wrap justify-center gap-8 md:gap-16 opacity-60 text-white text-xs font-bold tracking-widest uppercase">
                </div>
            </div>
        </div>
    </section>




    <div class="max-w-[1500px] mx-auto px-6 py-10">
        <div class="flex flex-col lg:flex-row gap-8">

            <aside class="lg:w-1/4">
                <div class="sticky top-10 bg-white rounded-3xl p-8 shadow-sm border border-slate-200">
                    <h2 class="text-2xl font-extrabold text-slate-800 mb-2">Enrollment</h2>
                    <p class="text-slate-500 text-sm mb-8">Academic Year 2026-2027</p>

                    <nav class="space-y-4">
                        @php $steps = ['Student Info', 'Family & Guardian', 'Economic Status', 'Academic History', 'Documents']; @endphp
                        @foreach($steps as $index => $label)
                            <div class="step-nav-item flex items-center gap-4 group" data-step="{{ $index + 1 }}">
                                <div
                                    class="step-nav-icon w-10 h-10 rounded-full border-2 border-slate-200 flex items-center justify-center font-bold text-slate-400 transition-all">
                                    {{ $index + 1 }}
                                </div>
                                <span class="step-nav-label font-semibold text-slate-400 transition-all">{{ $label }}</span>
                            </div>
                        @endforeach
                    </nav>
                </div>
            </aside>

            <main class="lg:w-3/4">
                <form id="admissionForm" action="{{ route('admissions.store') }}" method="POST"
                    enctype="multipart/form-data"
                    class="bg-white rounded-3xl shadow-sm border border-slate-200 p-8 md:p-12">
                    @csrf

                    <!-- Step 1 - Student Personal Information -->
                    <div class="step-content block" id="step-1">
                        <div class="mb-8 border-b border-slate-100 pb-4">
                            <h3 class="text-2xl font-bold text-slate-800">1. Student Personal Information</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                            <!-- first name -->
                            <div class="md:col-span-3 space-y-2">
                                <label class="text-sm font-semibold text-slate-700">First Name *</label>
                                <input type="text" name="studentFirstName" pattern="[A-Za-z\s]+"
                                    title="Only letters and spaces are allowed"
                                    oninput="this.value = this.value.replace(/[^A-Za-z\s]/g,'')"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none focus:border-green-600"
                                    required>
                            </div>
                            <!-- middle name -->
                            <div class="md:col-span-3 space-y-2">
                                <label class="text-sm font-semibold text-slate-700">Middle Name</label>
                                <input type="text" name="studentMiddleName" pattern="[A-Za-z\s]*"
                                    title="Only letters and spaces are allowed"
                                    oninput="this.value = this.value.replace(/[^A-Za-z\s]/g,'')"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none">
                            </div>
                            <!-- last name -->
                            <div class="md:col-span-3 space-y-2">
                                <label class="text-sm font-semibold text-slate-700">Last Name *</label>
                                <input type="text" name="studentLastName" pattern="[A-Za-z\s]+"
                                    title="Only letters and spaces are allowed"
                                    oninput="this.value = this.value.replace(/[^A-Za-z\s]/g,'')"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none" required>
                            </div> <!-- suffix -->
                            <div class="md:col-span-3 space-y-2">
                                <label class="text-sm font-semibold text-slate-700">Suffix</label>
                                <select name="studentSuffix"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none">
                                    <option value="">Select</option>
                                    <option value="Jr.">Jr.</option>
                                    <option value="Sr.">Sr.</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    <option value="V">V</option>
                                </select>
                            </div>
                            <!-- date of birth -->
                            <div class="md:col-span-4 space-y-2">
                                <label class="text-sm font-semibold text-slate-700 ml-1">Date of Birth *</label>
                                <input id="datePicker" type="text" name="dateOfBirth" placeholder="yyyy-mm-dd" class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none 
                                           transition-all duration-200 bg-white
                                           hover:border-green-400 
                                           focus:border-green-500 focus:ring-4 focus:ring-indigo-500/10" required>
                            </div>
                            <!-- gender -->
                            <div class="md:col-span-4 space-y-2">
                                <label class="text-sm font-semibold text-slate-700">Gender *</label>
                                <select name="gender"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none" required>
                                    <option value="">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <!-- address -->
                            <div class="md:col-span-12 space-y-2">
                                <label class="text-sm font-semibold text-slate-700">Complete Home Address *</label>
                                <textarea name="address" rows="2"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none"
                                    placeholder="House No, Street, Brgy, City, Province" required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2 - Family & Guardian Details -->
                    <div class="step-content hidden" id="step-2">
                        <div class="mb-8 border-b pb-4">
                            <h3 class="text-2xl font-bold text-slate-800 ">2. Family & Guardian Details</h3>
                        </div>
                        <div class="space-y-8">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="md:col-span-2 font-bold text-green-700 text-sm uppercase tracking-wider">
                                    Father's Information
                                </div>
                                <input type="text" name="fatherName" placeholder="Father's Full Name"
                                    pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed"
                                    oninput="this.value = this.value.replace(/[^A-Za-z\s]/g,'')"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none">
                                <input type="text" name="fatherOccupation" placeholder="Occupation"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="md:col-span-2 font-bold text-green-700 text-sm uppercase tracking-wider">
                                    Mother's Information
                                </div>
                                <input type="text" name="motherName" placeholder="Mother's Full Name"
                                    pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed"
                                    oninput="this.value = this.value.replace(/[^A-Za-z\s]/g,'')"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none">
                                <input type="text" name="motherOccupation" placeholder="Occupation"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 border-t pt-6">
                                <div class="md:col-span-2 font-bold text-slate-800 text-sm uppercase tracking-wider">
                                    Emergency Contact (Required) *
                                </div>
                                <input type="text" name="emergencyName" placeholder="Full Name" pattern="[A-Za-z\s]+"
                                    title="Only letters and spaces are allowed"
                                    oninput="this.value = this.value.replace(/[^A-Za-z\s]/g,'')"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none" required>
                                <input type="tel" name="phone" placeholder="Contact Number (09XXXXXXXXX)"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none" required>
                            </div>
                        </div>
                    </div>
                    <!-- Step 3 - Economic Status -->
                    <div class="step-content hidden" id="step-3">
                        <div class="mb-8 border-b pb-4">
                            <h3 class="text-2xl font-bold text-slate-800">3. Economic & Financial Status</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-slate-700">Monthly Household Income *</label>
                                <select name="socioeconomic_status"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none" required>
                                    <option value="">Select Range</option>
                                    <option value="low">Below ₱15,000</option>
                                    <option value="mid_low">₱15,000 - ₱35,000</option>
                                    <option value="middle">₱35,000 - ₱70,000</option>
                                    <option value="high">Above ₱70,000</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-slate-700">Housing Type *</label>
                                <select name="housing_type"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none" required>
                                    <option value="Owned">Owned</option>
                                    <option value="Rented">Rented / Living with Relatives</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-slate-700">
                                    No. of Siblings Enrolled here
                                </label>
                                <select name="siblings_count"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none bg-white">
                                    <option value="" disabled selected>Select number</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-slate-700">Applying for Discount?</label>
                                <select id="discount_intent" name="discount_intent"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none">
                                    <option value="0">No</option>
                                    <option value="1">Yes, I want to apply</option>
                                </select>
                            </div>

                            <!-- Discount Options -->
                            <div id="discount_options" class="hidden space-y-3 mt-4">
                                <label class="text-sm font-semibold text-slate-700">Select Discount Category</label>
                                <select name="discount_category"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none">
                                    <option value="">Select Category</option>
                                    <option value="incoming_g7">Incoming Grade 7 Students — 30% (Tuition only)</option>
                                    <option value="early_full">Early Payment Full Year — 10%</option>
                                    <option value="early_quarter">Early Payment Quarterly — 5%</option>
                                    <option value="sibling_2">Sibling Discount 2nd Child — 10%</option>
                                    <option value="sibling_3">Sibling Discount 3rd Child — 20%</option>
                                    <option value="sibling_4">Sibling Discount 4th Child — 30%</option>
                                    <option value="umc_member">United Methodist Church Members — 50%</option>
                                    <option value="umc_worker">United Methodist Church Workers — 100% (Quota 5 per year)
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Step 4 - Academic History -->
                    <div class="step-content hidden" id="step-4">
                        <div class="mb-8 border-b pb-4">
                            <h3 class="text-2xl font-bold text-slate-800">4. Academic History</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                            <div class="md:col-span-12 space-y-2">
                                <label class="text-sm font-semibold text-slate-700">Previous School Attended</label>
                                <input type="text" name="previousSchool"
                                    placeholder="Leave blank if first time enrolling"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none">
                            </div>
                            <div class="md:col-span-6 space-y-2">
                                <label class="text-sm font-semibold text-slate-700">Grade Level Applying For *</label>
                                <select name="year_level"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none" required>
                                    <option value="">Select Level</option>
                                    <option value="kinder1">Kinder 1</option>
                                    <option value="kinder2">Kinder 2</option>
                                    <option value="kinder3">Kinder 3</option>
                                    <option value="grade1">Grade 1</option>
                                    <option value="grade2">Grade 2</option>
                                    <option value="grade3">Grade 3</option>
                                    <option value="grade4">Grade 4</option>
                                    <option value="grade5">Grade 5</option>
                                    <option value="grade6">Grade 6</option>
                                    <option value="grade7">Grade 7</option>
                                    <option value="grade8">Grade 8</option>
                                    <option value="grade9">Grade 9</option>
                                    <option value="grade10">Grade 10</option>
                                </select>
                            </div>
                            <div class="md:col-span-6 space-y-2">
                                <label class="text-sm font-semibold text-slate-700">Academic Year *</label>
                                <select name="academic_year"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none focus:border-green-600"
                                    required>
                                    <option value="">Select Academic Year</option>
                                    <option value="2026-2027">2026 - 2027</option>
                                    <option value="2027-2028">2027 - 2028</option>
                                    <option value="2028-2029">2028 - 2029</option>
                                </select>
                            </div>
                            <div class="md:col-span-12 space-y-2">
                                <label class="text-sm font-semibold text-slate-700">Does the student have special
                                    learning needs?</label>
                                <textarea name="special_needs"
                                    placeholder="List any disabilities or conditions if applicable"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Step 5 - Documents -->
                    <div class="step-content hidden max-w-3xl mx-auto p-8 bg-white rounded-3xl shadow-sm border border-slate-100"
                        id="step-5">
                        <div class="mb-8 border-b border-slate-100 pb-6">
                            <h3 class="text-2xl font-bold text-green-700 tracking-tight">5. Enrollment Documents</h3>
                            <p class="text-slate-500 text-sm mt-2 font-medium uppercase tracking-wide">Document
                                Submission Phase</p>
                        </div>
                        <div class="mb-10 p-6 bg-green-50 rounded-2xl border border-green-100">
                            <h4
                                class="text-sm font-bold text-green-800 uppercase tracking-widest mb-4 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z">
                                    </path>
                                </svg>
                                Please upload the following requirements:
                            </h4>
                            <div class="grid md:grid-cols-2 gap-4 text-sm text-green-900/80">
                                <ul class="space-y-2 list-disc list-inside">
                                    <li>Report Card</li>
                                    <li>Birth Certificate (Photocopy)</li>
                                    <li>1x1 photo of the Applicant</li>
                                </ul>
                                <ul class="space-y-2 list-disc list-inside">
                                    <li>2x2 photo of the Father, Mother and Guardian (1 each)</li>
                                    <li class="font-bold text-green-800 mt-2 italic">For Transferees:</li>
                                    <li class="ml-4">Permanent Record</li>
                                    <li class="ml-4">Certificate of Good Moral Character</li>
                                </ul>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- PSA Birth Certificate -->
                            <div class="group">
                                <label class="block text-sm font-bold text-slate-700 mb-3 ml-1">
                                    PSA Birth Certificate <span class="text-red-500">*</span>
                                </label>
                                <input type="file" name="birth_certificate" accept=".pdf" required
                                    class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-3 file:px-8
                                    file:rounded-xl file:border-0
                                    file:text-sm file:font-bold
                                    file:bg-green-700 file:text-white
                                    hover:file:bg-green-800
                                    file:transition-colors file:cursor-pointer
                                    border border-slate-200 rounded-2xl p-1 bg-slate-50 shadow-inner transition-all focus:ring-2 focus:ring-green-500" />
                            </div>

                            <!-- Report Card / Transcript -->
                            <div class="group">
                                <label class="block text-sm font-bold text-slate-700 mb-3 ml-1">
                                    Report Card / Transcript <span class="text-red-500">*</span>
                                </label>
                                <input type="file" name="report_card" accept=".pdf" required
                                    class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-3 file:px-8
                                    file:rounded-xl file:border-0
                                    file:text-sm file:font-bold
                                    file:bg-green-700 file:text-white
                                    hover:file:bg-green-800
                                    file:transition-colors file:cursor-pointer
                                    border border-slate-200 rounded-2xl p-1 bg-slate-50 shadow-inner transition-all focus:ring-2 focus:ring-green-500" />
                            </div>

                            <!-- 1x1 Photo of Applicant -->
                            <div class="group">
                                <label class="block text-sm font-bold text-slate-700 mb-3 ml-1">
                                    1x1 Photo of Applicant <span class="text-red-500">*</span>
                                </label>
                                <input type="file" name="applicant_photo" accept=".jpg,.jpeg,.png" required
                                    class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-3 file:px-8
                                    file:rounded-xl file:border-0
                                    file:text-sm file:font-bold
                                    file:bg-green-700 file:text-white
                                    hover:file:bg-green-800
                                    file:transition-colors file:cursor-pointer
                                    border border-slate-200 rounded-2xl p-1 bg-slate-50 shadow-inner transition-all focus:ring-2 focus:ring-green-500" />
                            </div>

                            <!-- Father Photo -->
                            <div class="group">
                                <label class="block text-sm font-bold text-slate-700 mb-3 ml-1">
                                    2x2 Photo of Father <span class="text-red-500">*</span>
                                </label>
                                <input type="file" name="father_photo" accept=".jpg,.jpeg,.png" required
                                    class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-3 file:px-8
                                    file:rounded-xl file:border-0
                                    file:text-sm file:font-bold
                                    file:bg-green-700 file:text-white
                                    hover:file:bg-green-800
                                    file:transition-colors file:cursor-pointer
                                    border border-slate-200 rounded-2xl p-1 bg-slate-50 shadow-inner transition-all focus:ring-2 focus:ring-green-500" />
                            </div>

                            <!-- Mother Photo -->
                            <div class="group">
                                <label class="block text-sm font-bold text-slate-700 mb-3 ml-1">
                                    2x2 Photo of Mother <span class="text-red-500">*</span>
                                </label>
                                <input type="file" name="mother_photo" accept=".jpg,.jpeg,.png" required
                                    class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-3 file:px-8
                                    file:rounded-xl file:border-0
                                    file:text-sm file:font-bold
                                    file:bg-green-700 file:text-white
                                    hover:file:bg-green-800
                                    file:transition-colors file:cursor-pointer
                                    border border-slate-200 rounded-2xl p-1 bg-slate-50 shadow-inner transition-all focus:ring-2 focus:ring-green-500" />
                            </div>

                            <!-- Guardian Photo -->
                            <div class="group">
                                <label class="block text-sm font-bold text-slate-700 mb-3 ml-1">
                                    2x2 Photo of Guardian <span class="text-red-500">*</span>
                                </label>
                                <input type="file" name="guardian_photo" accept=".jpg,.jpeg,.png" required
                                    class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-3 file:px-8
                                    file:rounded-xl file:border-0
                                    file:text-sm file:font-bold
                                    file:bg-green-700 file:text-white
                                    hover:file:bg-green-800
                                    file:transition-colors file:cursor-pointer
                                    border border-slate-200 rounded-2xl p-1 bg-slate-50 shadow-inner transition-all focus:ring-2 focus:ring-green-500" />
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="mt-12 flex justify-between items-center gap-4">
                        <button type="button" id="prevBtn"
                            class="hidden px-8 py-3.5 text-slate-600 font-bold hover:bg-slate-100 rounded-xl transition-all">Back</button>
                        <button type="button" id="nextBtn"
                            class="ml-auto px-10 py-3.5 bg-green-700 text-white font-bold rounded-xl hover:bg-green-800 shadow-lg transition-all">Continue</button>
                            <button type="submit" 
                            id="submitBtn"
                            class="hidden w-full px-10 py-4 bg-yellow-400 text-green-900 font-black rounded-xl hover:bg-yellow-500 uppercase transition-all shadow-md active:scale-[0.98]">
                        Submit Application
                    </button>
                    </div>
                </form>
            </main>
        </div>
    </div>

    

    @include('layouts.footer')

    <script>
        flatpickr("#datePicker", { dateFormat: "Y-m-d" });

        let currentStep = 1;
        const totalSteps = 5;

        function updateProgress() {
            document.querySelectorAll('.step-nav-item').forEach((item, i) => {
                const icon = item.querySelector('.step-nav-icon');
                const label = item.querySelector('.step-nav-label');
                const stepNum = i + 1;

                if (stepNum === currentStep) {
                    icon.className = 'step-nav-icon w-10 h-10 rounded-full border-2 border-green-600 bg-green-600 text-white flex items-center justify-center font-bold';
                    label.className = 'step-nav-label font-bold text-green-700 transition-all';
                } else if (stepNum < currentStep) {
                    icon.className = 'step-nav-icon w-10 h-10 rounded-full border-2 border-green-600 bg-green-50 text-green-600 flex items-center justify-center font-bold';
                    label.className = 'step-nav-label font-semibold text-slate-800 transition-all';
                } else {
                    icon.className = 'step-nav-icon w-10 h-10 rounded-full border-2 border-slate-200 flex items-center justify-center font-bold text-slate-400';
                    label.className = 'step-nav-label font-semibold text-slate-400 transition-all';
                }
            });
        }

        function validateStep() {
            const currentTab = document.getElementById(`step-${currentStep}`);
            const inputs = currentTab.querySelectorAll('input[required], select[required], textarea[required]');
            let isValid = true;

            inputs.forEach(input => {
                if (!input.value.trim() || (input.type === 'file' && input.files.length === 0)) {
                    input.classList.add('border-red-500');
                    isValid = false;
                } else {
                    input.classList.remove('border-red-500');
                }
            });
            return isValid;
        }

        function showStep(s) {
            document.querySelectorAll('.step-content').forEach(c => c.classList.add('hidden'));
            document.getElementById(`step-${s}`).classList.remove('hidden');

            document.getElementById('prevBtn').classList.toggle('hidden', s === 1);
            document.getElementById('nextBtn').classList.toggle('hidden', s === totalSteps);
            document.getElementById('submitBtn').classList.toggle('hidden', s !== totalSteps);
            updateProgress();
        }

        document.getElementById('nextBtn').addEventListener('click', () => {
    if (validateStep()) {
        currentStep++;
        showStep(currentStep);
    }
});
        document.getElementById('prevBtn').addEventListener('click', () => {
            currentStep--;
            showStep(currentStep);
        });

        document.getElementById('submitBtn').addEventListener('click', () => {
            if (validateStep()) {
                document.getElementById('admissionForm').submit();
            }
        });

        updateProgress();

        const discountIntent = document.getElementById('discount_intent');
        const discountOptions = document.getElementById('discount_options');

        discountIntent.addEventListener('change', function () {
            if (this.value === "1") {
                discountOptions.classList.remove('hidden');
            } else {
                discountOptions.classList.add('hidden');
            }
        });
    </script>
</body>

</html>