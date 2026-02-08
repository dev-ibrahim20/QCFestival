<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-800">تعديل الصلاحية: {{ $permission->name }}</h1>
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

                    <form action="{{ route('permissions.update', $permission) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- اسم الصلاحية -->
                        <div class="mb-6">
                            <label for="name" class="block text-gray-700 font-semibold mb-2">اسم الصلاحية</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', $permission->name) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 @error('name') border-red-500 @enderror"
                                placeholder="مثال: applicant_view, disability_create"
                                required>
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-gray-500 text-sm mt-2">اسم الصلاحية يجب أن يكون فريد ومميز</p>
                        </div>

                        <!-- الأزرار -->
                        <div class="flex gap-4 justify-end">
                            <a href="{{ route('permissions.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-6 rounded-lg transition">
                                إلغاء
                            </a>
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-lg transition">
                                تحديث الصلاحية
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
