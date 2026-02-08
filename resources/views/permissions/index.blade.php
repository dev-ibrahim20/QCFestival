<x-app-layout>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-3xl font-bold text-gray-800">إدارة الصلاحيات</h1>
                        <a href="{{ route('permissions.create') }}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition">
                            + إضافة صلاحية جديدة
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4">
                            <p class="text-green-800 font-semibold">{{ session('success') }}</p>
                        </div>
                    @endif

                    @if ($permissions->isEmpty())
                        <div class="text-center py-12">
                            <p class="text-gray-500 text-lg">لا توجد صلاحيات</p>
                        </div>
                    @else
                        <div class="overflow-x-auto border rounded-lg">
                            <table class="w-full">
                                <thead>
                                    <tr class="bg-gradient-to-r from-red-500 to-red-600 text-white">
                                        <th class="text-right px-6 py-4 font-bold w-16">#</th>
                                        <th class="text-right px-6 py-4 font-bold flex-1">اسم الصلاحية</th>
                                        <th class="text-center px-6 py-4 font-bold">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $index => $permission)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100 transition">
                                            <td class="text-right px-6 py-4 text-gray-700">{{ $index + 1 }}</td>
                                            <td class="text-right px-6 py-4 text-gray-800 font-medium">{{ $permission->name }}</td>
                                            <td class="px-6 py-4">
                                                <div class="flex gap-6 justify-center">
                                                    <a href="{{ route('permissions.edit', $permission) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-md text-sm font-semibold transition duration-200 shadow-sm hover:shadow-md w-24 text-center">
                                                        تعديل
                                                    </a>
                                                    <form action="{{ route('permissions.destroy', $permission) }}" method="POST" style="display: inline;" onsubmit="return confirm('هل أنت متأكد من حذف هذه الصلاحية؟');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"  class="bg-red-600 hover:bg-red-700 text-white px-6 py-2.5 rounded-md text-sm font-semibold transition duration-200 shadow-sm hover:shadow-md w-24 text-center">
                                                            حذف
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-6">
                            {{ $permissions->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
