<nav class="bg-white border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <a href="{{ route('applicants.create') }}" class="flex items-center">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
                <span class="ms-4 text-lg font-semibold text-gray-800">مهرجان ابداع قادرون</span>
            </div>

            <div class="flex items-center space-x-4">
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-gray-900 text-sm font-medium">
                    الرئيسية
                </a>
            </div>
        </div>
    </div>
</nav>
