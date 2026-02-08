<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-800">إضافة دور جديد</h1>
                    </div>

                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                            <h3 class="text-red-800 font-semibold mb-2">خطأ في الإدخال:</h3>
                            <ul class="text-red-700 text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf

                        <!-- اسم الدور -->
                        <div class="mb-6">
                            <label for="name" class="block text-gray-700 font-semibold mb-2">اسم الدور</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 @error('name') border-red-500 @enderror"
                                placeholder="أدخل اسم الدور"
                                required>
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- الصلاحيات -->
                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-4">الصلاحيات</label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 border border-gray-200 rounded-lg">
                                @foreach ($permissions as $permission)
                                    <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                                        <input
                                            type="checkbox"
                                            name="permissions[]"
                                            value="{{ $permission->id }}"
                                            {{ old('permissions') && in_array($permission->id, old('permissions', [])) ? 'checked' : '' }}
                                            class="w-4 h-4 text-red-600 rounded focus:ring-red-500 cursor-pointer">
                                        <span class="mr-3 text-gray-700 font-medium">{{ $permission->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- الأزرار -->
                        <div class="flex gap-4 justify-end">
                            <a href="{{ route('roles.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-6 rounded-lg transition">
                                إلغاء
                            </a>
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-lg transition">
                                إضافة الدور
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
