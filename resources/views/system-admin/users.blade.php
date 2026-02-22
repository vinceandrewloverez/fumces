<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>System Admin | User Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex bg-gray-50 font-sans">

    @include('layouts.sidebar.system-admin')

    <!-- Main Content -->
    <main class="flex-1 p-8 bg-gray-50">

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-4xl font-bold text-gray-800 tracking-tight">User Management</h1>
                <p class="text-gray-500 mt-1">Manage system access, roles, and account permissions</p>
            </div>
            {{-- Remove create link if route not defined --}}
            <a href="{{ route('system-admin.users.create') }}" class="bg-green-700 text-white px-6 py-3 rounded-xl hover:bg-green-800 transition shadow-lg flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                Add New User
            </a>
        </div>

        <!-- Stats Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

    <!-- Total Users -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-sm font-medium text-gray-500">Total Users</h3>
                <p class="mt-2 text-2xl font-bold text-gray-800">{{ $users->count() }}</p>
            </div>
            <div class="bg-green-100 text-green-700 p-3 rounded-full">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14v7m-7-7h14" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Active Users -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-sm font-medium text-gray-500">Active Users</h3>
                <p class="mt-2 text-2xl font-bold text-gray-800">
                    {{ $users->where('status', 'Active')->count() }}
                </p>
            </div>
            <div class="bg-blue-100 text-blue-700 p-3 rounded-full">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Student -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-sm font-medium text-gray-500">Students</h3>
                <p class="mt-2 text-2xl font-bold text-gray-800">
                    {{ $users->where('role', 'Student')->count() }}
                </p>
            </div>
            <div class="bg-yellow-100 text-yellow-700 p-3 rounded-full">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-2.21 0-4 1.79-4 4v4h8v-4c0-2.21-1.79-4-4-4zM6 20h12" />
                </svg>
            </div>
        </div>
    </div>

    <!-- New Users This Month -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-sm font-medium text-gray-500">New Users This Month</h3>
                <p class="mt-2 text-2xl font-bold text-gray-800">
                    {{ $users->filter(fn($u) => $u->created_at->month === now()->month)->count() }}
                </p>
            </div>
            <div class="bg-red-100 text-red-700 p-3 rounded-full">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
    </div>

</div>

<!-- Filters -->
<div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 mb-6 flex flex-col md:flex-row gap-4 items-center justify-between">
    <!-- Search Input -->
    <div class="relative w-full md:w-96">
        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </span>
        <input type="text" id="searchInput" placeholder="Search by name, email, or ID..."
               class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-xl leading-5 bg-gray-50 placeholder-gray-400 focus:outline-none focus:bg-white focus:ring-1 focus:ring-green-700 sm:text-sm transition">
    </div>

    <!-- Role Filter -->
    <div class="flex gap-2">
        <select id="roleFilter"
                class="text-sm border border-gray-200 rounded-xl bg-gray-50 px-4 py-2 focus:ring-green-700 outline-none">
            <option value="">All Roles</option>
            <option value="System Admin">System Admin</option>
            <option value="Student">Student</option>
            <option value="Registrar">Registrar</option>
            <option value="Teacher">Teacher</option>
            <option value="Admissions">Admissions</option>
            <option value="Cashier">Cashier</option>
        </select>
    </div>
</div>
        <!-- Users Table -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">User Info</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Email Address</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 id">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center text-green-700 font-bold mr-3 border border-green-200">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-gray-800">{{ $user->name }}</div>
                                        <div class="text-xs text-gray-400 font-mono">ID: #{{ $user->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                            <td class="px-6 py-4 role">
                                <span class="px-3 py-1 text-xs font-bold rounded-full bg-green-100 text-green-700">
                                    {{ $user->role ?? 'Student' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                    {{ $user->status ?? '' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <button 
                                type="button"
                                class="text-gray-400 hover:text-green-700 transition edit-button"
                                title="Edit User"
                                data-id="{{ $user->id }}"
                                data-name="{{ $user->name }}"
                                data-email="{{ $user->email }}"
                                data-role="{{ trim($user->role ?? 'Student') }}"
                                data-action="{{ route('system-admin.users.update', $user->id) }}"
                            >
                                <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                                <form action="{{ route('system-admin.users.destroy', $user->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-400 hover:text-red-600 transition" title="Delete User">
                                        <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>

    <!-- Add User Modal -->
<div id="addUserModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6 relative">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Add New User</h2>
        <form id="addUserForm" method="POST" action="{{ route('system-admin.users.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" name="name" class="w-full border border-green-700 rounded-xl px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-700" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" name="email" class="w-full border border-green-700 rounded-xl px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-700" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Role</label>
                <select name="role" class="w-full border border-green-700 rounded-xl px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-700 ">
                    <option value="Admin">Admin</option>
                    <option value="Student" selected>Student</option>
                    <option value="Registrar">Registrar</option>
                    <option value="Cashier">Cashier</option>
                    <option value="Admissions">Admissions</option>
                    <option value="System Admin">System Admin</option>
                    <option value="Teacher">Teacher</option>
                </select>
            </div>

            <div class="flex justify-end gap-2">
                <button type="button" id="closeAddModal" class="px-4 py-2 rounded-xl border border-gray-300 hover:bg-gray-100 transition">Cancel</button>
                <button type="submit" class="px-4 py-2 rounded-xl bg-green-700 text-white hover:bg-green-800 transition">Add User</button>
            </div>
        </form>
    </div>
</div>

    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6 relative">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Edit User</h2>
            <form id="editUserForm" method="POST" action="">
                @csrf
                @method('PATCH')
                <input type="hidden" name="user_id" id="editUserId">

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input type="text" name="name" id="editUserName" class="w-full border-gray-300 rounded-xl px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-700" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" name="email" id="editUserEmail" class="w-full border-gray-300 rounded-xl px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-700" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Role</label>
                    <select name="role" id="editUserRole" class="w-full border-gray-300 rounded-xl px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-700">
                        <option value="Admin">Admin</option>
                        <option value="Student">Student</option>
                        <option value="Registrar">Registrar</option>
                        <option value="Cashier">Cashier</option>
                        <option value="Admissions">Admissions</option>
                        <option value="System Admin">System Admin</option>
                        <option value="Teacher">Teacher</option>
                    </select>
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" id="closeModal" class="px-4 py-2 rounded-xl border border-gray-300 hover:bg-gray-100 transition">Cancel</button>
                    <button type="submit" class="px-4 py-2 rounded-xl bg-green-700 text-white hover:bg-green-800 transition">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- JS -->
    <script>
        const editButtons = document.querySelectorAll('.edit-button');
        const editModal = document.getElementById('editModal');
        const closeModal = document.getElementById('closeModal');

        const editUserForm = document.getElementById('editUserForm');
        const editUserId = document.getElementById('editUserId');
        const editUserName = document.getElementById('editUserName');
        const editUserEmail = document.getElementById('editUserEmail');
        const editUserRole = document.getElementById('editUserRole');

        editButtons.forEach(button => {
    button.addEventListener('click', () => {
        editUserId.value = button.dataset.id;
        editUserName.value = button.dataset.name;
        editUserEmail.value = button.dataset.email;

        // Directly set the select value to match the button dataset
        const role = button.dataset.role.trim(); // remove extra spaces
        editUserRole.value = role;

        editUserForm.action = button.dataset.action;
        editModal.classList.remove('hidden');
    });
});

        closeModal.addEventListener('click', () => editModal.classList.add('hidden'));
        editModal.addEventListener('click', e => {
            if (e.target === editModal) editModal.classList.add('hidden');
        });

    // Add User Modal JS
    const addUserButton = document.querySelector('a[href$="users/create"], #openAddUserModal'); // button that opens modal
    const addUserModal = document.getElementById('addUserModal');
    const closeAddModal = document.getElementById('closeAddModal');

    addUserButton.addEventListener('click', e => {
        e.preventDefault();
        addUserModal.classList.remove('hidden');
    });

    closeAddModal.addEventListener('click', () => addUserModal.classList.add('hidden'));
    addUserModal.addEventListener('click', e => {
        if(e.target === addUserModal) addUserModal.classList.add('hidden');
    });

    const searchInput = document.getElementById('searchInput');
const roleFilter = document.getElementById('roleFilter');
const rows = document.querySelectorAll('table tbody tr');

function filterTable() {
    const search = searchInput.value.toLowerCase();
    const role = roleFilter.value.toLowerCase();

    rows.forEach(row => {
        const name = row.querySelector('.name')?.textContent.toLowerCase() || '';
        const email = row.querySelector('.email')?.textContent.toLowerCase() || '';
        const userRole = row.querySelector('.role span')?.textContent.toLowerCase() || '';
        const id = row.querySelector('.id .font-mono')?.textContent.toLowerCase() || '';

        const matchesSearch = !search || name.includes(search) || email.includes(search) || id.includes(search);
        const matchesRole = !role || userRole.includes(role);

        row.style.display = (matchesSearch && matchesRole) ? '' : 'none';
    });
}

searchInput.addEventListener('input', filterTable);
roleFilter.addEventListener('change', filterTable);

</script>


</body>
</html>