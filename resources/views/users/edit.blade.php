<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl font-bold text-gray-800 mb-6">تعديل المستخدم: {{ $user->name }}</h1>

                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                            <h3 class="text-red-800 font-semibold mb-2">حدثت أخطاء في الإدخال:</h3>
                            <ul class="list-disc list-inside text-red-700">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- الاسم -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">اسم المستخدم</label>
                            <input type="text" id="name" name="name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-200 focus:border-red-500 @error('name') border-red-500 @enderror"
                                value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- البريد الإلكتروني -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">البريد الإلكتروني</label>
                            <input type="email" id="email" name="email"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-200 focus:border-red-500 @error('email') border-red-500 @enderror"
                                value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- كلمة المرور (اختياري) -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">كلمة المرور (اتركها فارغة للاحتفاظ بالحالية)</label>
                            <input type="password" id="password" name="password"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-200 focus:border-red-500 @error('password') border-red-500 @enderror">
                            @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- تأكيد كلمة المرور -->
                        @if (true)
                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">تأكيد كلمة المرور</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-200 focus:border-red-500">
                            </div>
                        @endif

                        <!-- الأدوار -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">الأدوار</label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach ($roles as $role)
                                    <div class="flex items-center">
                                        <input type="checkbox" id="role_{{ $role->id }}" name="roles[]"
                                            value="{{ $role->name }}"
                                            class="h-4 w-4 text-red-600 rounded border-gray-300 focus:ring-red-500"
                                            {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                                        <label for="role_{{ $role->id }}" class="ml-2 block text-sm text-gray-700">
                                            {{ $role->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            @error('roles')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex gap-4 pt-4">
                            <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition">
                                تحديث المستخدم
                            </button>
                            <a href="{{ route('users.index') }}" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg transition text-center">
                                إلغاء
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
