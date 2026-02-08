<x-app-layout>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-3xl font-bold text-gray-800">إدارة المستخدمين</h1>
                        @hasanyrole('Admin|Manager')
                        <a href="{{ route('users.create') }}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition">
                            + إضافة مستخدم جديد
                        </a>
                        @endhasanyrole
                    </div>

                    @if (session('success'))
                        <div class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4">
                            <p class="text-green-800 font-semibold">{{ session('success') }}</p>
                        </div>
                    @endif

                    @if ($users->isEmpty())
                        <div class="text-center py-12">
                            <p class="text-gray-500 text-lg">لا توجد مستخدمين</p>
                        </div>
                    @else
                        <div class="overflow-x-auto border rounded-lg">
                            <table class="w-full">
                                <thead>
                                    <tr class="bg-gradient-to-r from-red-500 to-red-600 text-black">
                                        <th class="text-right px-6 py-4 font-bold">اسم المستخدم</th>
                                        <th class="text-right px-6 py-4 font-bold">البريد الإلكتروني</th>
                                        <th class="text-right px-6 py-4 font-bold">الأدوار</th>
                                        <th class="text-center px-6 py-4 font-bold">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
                                            <td class="text-right px-6 py-4 text-gray-800 font-semibold">{{ $user->name }}</td>
                                            <td class="text-right px-6 py-4 text-gray-700 text-sm">{{ $user->email }}</td>
                                            <td class="text-right px-6 py-4">
                                                <div class="flex flex-wrap gap-2 justify-end">
                                                    @forelse ($user->roles as $role)
                                                        <span class="inline-block bg-gradient-to-r from-blue-100 to-blue-50 text-blue-800 text-xs px-3 py-1.5 rounded-full border border-blue-200 font-medium">
                                                            {{ $role->name }}
                                                        </span>
                                                    @empty
                                                        <span class="text-gray-400 italic">بدون أدوار</span>
                                                    @endforelse
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex gap-3 justify-center">
                                                    @hasrole('Admin')
                                                    <a href="{{ route('users.edit', $user) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-md text-sm font-semibold transition duration-200 shadow-sm hover:shadow-md w-24 text-center">
                                                        تعديل
                                                    </a>
                                                    @endhasrole
                                                    @hasrole('Admin')
                                                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display: inline;" onsubmit="return confirm('هل أنت متأكد من حذف هذا المستخدم؟');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"  class="bg-red-600 hover:bg-red-700 text-white px-6 py-2.5 rounded-md text-sm font-semibold transition duration-200 shadow-sm hover:shadow-md w-24 text-center">
                                                            حذف
                                                        </button>
                                                    </form>
                                                    @endhasrole
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-6">
                            {{ $users->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
