<x-applicants-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-red-100">
                <div class="p-6 bg-white border-b border-red-100">
                    <div class="mb-8 text-center">
                        <div class="inline-block bg-white rounded-xl px-6 py-5 shadow-sm transform -translate-y-2">
                            <h1 style="size: bold" class="text-3xl sm:text-4xl font-extrabold text-red-600">مهرجان ابداع قادرون</h1>
                        </div>
                    </div>

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

                    <form action="{{ route('applicants.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- اسم الطالب/الطالبة -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">اسم الطالب/الطالبة</label>
                            <input type="text" id="name" name="name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-200 focus:border-red-500 @error('name') border-red-500 @enderror"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <!-- الجامعة -->
                        <div>
                            <label for="university" class="block text-sm font-medium text-gray-700 mb-2">الجامعة</label>
                            <input type="text" id="university" name="university"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-200 focus:border-red-500 @error('university') border-red-500 @enderror"
                                value="{{ old('university') }}" required>
                            @error('university')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- الكلية -->
                        <div>
                            <label for="college" class="block text-sm font-medium text-gray-700 mb-2">الكلية</label>
                            <input type="text" id="college" name="college"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-200 focus:border-red-500 @error('college') border-red-500 @enderror"
                                value="{{ old('college') }}" required>
                            @error('college')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- القسم -->
                        <div>
                            <label for="section" class="block text-sm font-medium text-gray-700 mb-2">القسم</label>
                            <input type="text" id="section" name="section"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-200 focus:border-red-500 @error('section') border-red-500 @enderror"
                                value="{{ old('section') }}" required>
                            @error('section')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- السنة الدراسية -->
                        <div>
                            <label for="academic_year" class="block text-sm font-medium text-gray-700 mb-2">السنة الدراسية</label>
                            <input type="text" id="academic_year" name="academic_year" placeholder="مثال: الأولى - الثانية - الثالثة"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-200 focus:border-red-500 @error('academic_year') border-red-500 @enderror"
                                value="{{ old('academic_year') }}" required>
                            @error('academic_year')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- رقم الهاتف -->
                        <div>
                            <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-2">رقم الهاتف (11 رقم)</label>
                            <input type="text" id="phone_number" name="phone_number" placeholder="01001234567"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-200 focus:border-red-500 @error('phone_number') border-red-500 @enderror"
                                value="{{ old('phone_number') }}" pattern="01[0-9]{9}" minlength="11" maxlength="11" inputmode="numeric" oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,11)" required>
                            @error('phone_number')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- رقم الواتساب -->
                        <div>
                            <label for="whatsapp_number" class="block text-sm font-medium text-gray-700 mb-2">رقم الواتساب (11 رقم)</label>
                            <input type="text" id="whatsapp_number" name="whatsapp_number" placeholder="01001234567"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-200 focus:border-red-500 @error('whatsapp_number') border-red-500 @enderror"
                                value="{{ old('whatsapp_number') }}" pattern="01[0-9]{9}" minlength="11" maxlength="11" inputmode="numeric" oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,11)" required>
                            @error('whatsapp_number')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- الرقم القومي -->
                        <div>
                            <label for="national_id" class="block text-sm font-medium text-gray-700 mb-2">الرقم القومي (14 رقم)</label>
                            <input type="text" id="national_id" name="national_id" placeholder="29901011234567"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-200 focus:border-red-500 @error('national_id') border-red-500 @enderror"
                                value="{{ old('national_id') }}" pattern="[0-9]{14}" minlength="14" maxlength="14" inputmode="numeric" oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,14)" required>
                            @error('national_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- تاريخ الميلاد -->
                        <div>
                            <label for="date_of_birth" class="block text-sm font-medium text-gray-700 mb-2">تاريخ الميلاد</label>
                            <input type="date" id="date_of_birth" name="date_of_birth"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-200 focus:border-red-500 @error('date_of_birth') border-red-500 @enderror"
                                value="{{ old('date_of_birth') }}" required>
                            @error('date_of_birth')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- العمر -->
                        <div>
                            <label for="age" class="block text-sm font-medium text-gray-700 mb-2">العمر</label>
                            <input type="number" id="age" name="age"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-red-200 focus:border-red-500"
                                value="{{ old('age') }}" readonly>
                        </div>

                        <!-- المجال المشارك -->
                        <div>
                            <label for="participating_field" class="block text-sm font-medium text-gray-700 mb-2">المجال المشارك</label>
                            <input type="text" id="participating_field" name="participating_field"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-200 focus:border-red-500 @error('participating_field') border-red-500 @enderror"
                                value="{{ old('participating_field') }}" required>
                            @error('participating_field')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- نوع الإعاقة -->
                        <div>
                            <label for="disability_id" class="block text-sm font-medium text-gray-700 mb-2">نوع الإعاقة (اختياري)</label>
                            <select id="disability_id" name="disability_id"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-200 focus:border-red-500 @error('disability_id') border-red-500 @enderror">
                                <option value="">-- لا يوجد إعاقة --</option>
                                @foreach ($disabilities as $disability)
                                    <option value="{{ $disability->id }}" {{ old('disability_id') == $disability->id ? 'selected' : '' }}>
                                        {{ $disability->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('disability_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- الأزرار -->
                        <div class="flex gap-4 pt-4">
                            <button type="submit" class="flex-1 bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition">
                                إرسال الطلب
                            </button>
                            <a href="{{ url('/') }}" class="flex-1 bg-white border border-red-200 hover:bg-red-50 text-red-700 font-bold py-2 px-4 rounded-lg transition text-center">
                                إلغاء
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-applicants-layout>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const nid = document.getElementById('national_id');
    const dob = document.getElementById('date_of_birth');
    const age = document.getElementById('age');

    function calculateAge(birthDate) {
        const today = new Date();
        const birth = new Date(birthDate);
        let calculatedAge = today.getFullYear() - birth.getFullYear();
        const monthDiff = today.getMonth() - birth.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birth.getDate())) {
            calculatedAge--;
        }
        return calculatedAge >= 0 ? calculatedAge : '';
    }

    function extractDobFromNID(value) {
        const v = (value || '').replace(/\D/g, '');
        if (v.length < 14) return null; // need full 14 digits

        const centuryCode = v.charAt(0);
        const yearPart = v.substr(1, 2);
        const monthPart = v.substr(3, 2);
        const dayPart = v.substr(5, 2);

        let baseYear = 1900;
        if (centuryCode === '2') baseYear = 1900;
        else if (centuryCode === '3') baseYear = 2000;
        else if (centuryCode === '1') baseYear = 1800;

        const year = baseYear + parseInt(yearPart, 10);
        const month = parseInt(monthPart, 10);
        const day = parseInt(dayPart, 10);

        if (isNaN(year) || isNaN(month) || isNaN(day)) return null;
        if (month < 1 || month > 12) return null;
        if (day < 1 || day > 31) return null;

        const mm = String(month).padStart(2, '0');
        const dd = String(day).padStart(2, '0');
        return `${year}-${mm}-${dd}`;
    }

    // Calculate age when date_of_birth changes
    if (dob && age) {
        dob.addEventListener('change', function () {
            if (this.value) {
                age.value = calculateAge(this.value);
            } else {
                age.value = '';
            }
        });
    }

    // Extract DOB from NID and calculate age
    if (nid && dob) {
        nid.addEventListener('input', function () {
            // keep only digits and limit to 14
            this.value = this.value.replace(/\D/g, '').slice(0, 14);
            const parsed = extractDobFromNID(this.value);
            if (parsed) {
                dob.value = parsed;
                if (age) {
                    age.value = calculateAge(parsed);
                }
            }
        });
    }
});
</script>
