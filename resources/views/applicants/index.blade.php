<x-app-layout>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-3xl font-bold text-gray-800">إدارة التقديمات</h1>
                        <div class="flex gap-3">
                            @hasanyrole('Admin|Manager')
                            <a href="{{ route('applicants.export') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition">
                                تحميل Excel
                            </a>
                            @endhasanyrole
                            <a href="{{ route('applicants.create') }}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition">
                                + تقديم جديد
                            </a>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4">
                            <p class="text-green-800 font-semibold">{{ session('success') }}</p>
                        </div>
                    @endif

                    @if ($applicants->isEmpty())
                        <div class="text-center py-12">
                            <p class="text-gray-500 text-lg">لا توجد تقديمات</p>
                        </div>
                    @else
                        <div class="overflow-x-auto border rounded-lg">
                            <table class="w-full table-fixed min-w-max">
                                <thead>
                                    <tr class="bg-gradient-to-r from-red-500 to-red-600 text-black">
                                        <th class="text-center px-4 py-4 font-bold w-12">#</th>
                                        <th class="text-right px-4 py-4 font-bold w-32">اسم المتقدم</th>
                                        <th class="text-right px-4 py-4 font-bold w-28">الجامعة</th>
                                        <th class="text-right px-4 py-4 font-bold w-24">الكلية</th>
                                        <th class="text-right px-4 py-4 font-bold w-24">القسم</th>
                                        <th class="text-right px-4 py-4 font-bold w-20">السنة</th>
                                        <th class="text-right px-4 py-4 font-bold w-28">الهاتف</th>
                                        <th class="text-right px-4 py-4 font-bold w-24">الرقم القومي</th>
                                        <th class="text-right px-4 py-4 font-bold w-24">تاريخ الميلاد</th>
                                        <th class="text-right px-4 py-4 font-bold w-16">السن</th>
                                        <th class="text-right px-4 py-4 font-bold w-28">المجال</th>
                                        <th class="text-right px-4 py-4 font-bold w-24">الإعاقة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($applicants as $applicant)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100 transition">
                                            <td class="text-center px-4 py-4 text-gray-700 font-bold">{{ $loop->iteration }}</td>
                                            <td class="text-right px-4 py-4 text-gray-800 font-semibold">{{ $applicant->name }}</td>
                                            <td class="text-right px-4 py-4 text-gray-700">{{ $applicant->university }}</td>
                                            <td class="text-right px-4 py-4 text-gray-700">{{ $applicant->college }}</td>
                                            <td class="text-right px-4 py-4 text-gray-700">{{ $applicant->section }}</td>
                                            <td class="text-right px-4 py-4 text-gray-700">{{ $applicant->academic_year }}</td>
                                            <td class="text-right px-4 py-4 text-gray-700">{{ $applicant->phone_number }}</td>
                                            <td class="text-right px-4 py-4 text-gray-700">{{ $applicant->national_id }}</td>
                                            <td class="text-right px-4 py-4 text-gray-700">{{ $applicant->date_of_birth }}</td>
                                            <td class="text-right px-4 py-4 text-gray-700 text-center">{{ $applicant->age }}</td>
                                            <td class="text-right px-4 py-4 text-gray-700">
                                                <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">
                                                    {{ $applicant->participating_field }}
                                                </span>
                                            </td>
                                            <td class="text-right px-4 py-4 text-gray-700">
                                                @if ($applicant->disability)
                                                    <span class="inline-block bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">
                                                        {{ $applicant->disability->name }}
                                                    </span>
                                                @else
                                                    <span class="text-gray-400">---</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-6">
                            {{ $applicants->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
