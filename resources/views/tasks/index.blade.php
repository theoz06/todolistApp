<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <title>To Do List</title>
    <style>
        .completed {
            text-decoration: line-through;
            color: #6B7280;
        }
        .task-item {
            transition: all 0.3s ease;
        }
        .task-item:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        @keyframes gradient {
            0% {background-position: 0% 50%}
            50% {background-position: 100% 50%}
            100% {background-position: 0% 50%}
        }
        .animated-gradient {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen py-8 px-4">
    <div class="max-w-md mx-auto">
        <!-- Header dengan gelombang SVG -->
        <div class="relative rounded-t-2xl overflow-hidden animated-gradient text-white">
            <div class="relative z-10 p-6 pt-10 pb-12">
                <div class="flex items-center justify-center mb-4">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                        <i class="fas fa-check-double text-2xl"></i>
                    </div>
                </div>
                <h1 class="text-3xl font-bold text-center mb-1">To Do List</h1>
                <p class="text-center text-white text-opacity-80 font-light">Kelola tugas-tugas Anda dengan mudah</p>
            </div>
        </div>

        <!-- Container Utama -->
        <div class="bg-white rounded-b-2xl shadow-lg -mt-4">
            <!-- Form Input -->
            <div class="p-6 border-b border-gray-100">
                <form method="POST" action="/task" class="flex gap-2">
                    @csrf
                    <input type="text" name="title" placeholder="Tambah tugas baru..."
                        class="flex-1 border-0 bg-gray-50 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition" />
                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-medium transition flex items-center justify-center gap-2 min-w-20">
                        <i class="fas fa-plus"></i>
                        <span>Tambah</span>
                    </button>
                </form>
            </div>

            <!-- List Tugas -->
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold text-gray-700">Daftar Tugas</h2>
                    <div class="flex items-center gap-2">
                        <span class="text-xs bg-indigo-100 text-indigo-800 py-1 px-2 rounded-full font-medium">
                            <i class="fas fa-filter mr-1"></i> Semua
                        </span>
                    </div>
                </div>

                <ul>
                    @foreach ($tasks as $task)
                        <li class="flex items-center justify-between p-3 mb-2 bg-gray-50 hover:bg-gray-100 rounded-xl task-item transition">
                            <div class="flex items-center gap-3 flex-1">
                                <form method="POST" action="/task{{ $task->id }}">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="w-6 h-6 rounded-full border-2 {{ $task->is_done ? 'bg-green-500 border-green-500' : 'border-gray-300' }} flex items-center justify-center hover:border-green-500 transition">
                                        <i class="fas fa-check text-xs {{ $task->is_done ? 'text-white' : 'text-transparent' }}"></i>
                                    </button>
                                </form>
                                <span class="{{ $task->is_done ? 'completed' : '' }}">{{ $task->title }}</span>
                            </div>
                            <form method="POST" action="/task{{ $task->id }}">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-gray-400 hover:text-red-500 hover:bg-red-50 p-2 rounded-full transition">
                                    <i class="fas fa-trash-alt text-sm"></i>
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>

                <!-- Empty state -->
                <div class="text-center py-8 hidden">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-check text-gray-300 text-xl"></i>
                    </div>
                    <h3 class="text-gray-500 font-medium mb-1">Tidak ada tugas</h3>
                    <p class="text-gray-400 text-sm">Tambahkan tugas baru untuk memulai</p>
                </div>
            </div>

            <!-- Footer -->
            <div class="bg-gray-50 px-6 py-4 rounded-b-2xl border-t border-gray-100 flex justify-between items-center text-xs text-gray-500">
                <span>
                    <i class="fas fa-lightbulb text-yellow-400 mr-1"></i>
                    Pro Tip: Klik tombol untuk menandai tugas selesai
                </span>
                <span>
                    <i class="fas fa-code mr-1"></i> Dibuat dengan <i class="fas fa-heart text-red-500 mx-1"></i>
                </span>
            </div>
        </div>
    </div>
</body>
</html>
