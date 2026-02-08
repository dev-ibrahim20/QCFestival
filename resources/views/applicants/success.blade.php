@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-16 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-12 max-w-md text-center">
        <div class="mb-6">
            <svg class="w-16 h-16 mx-auto text-green-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
        </div>

        <h1 class="text-3xl font-bold text-gray-800 mb-4">تم بنجاح!</h1>

        <p class="text-gray-600 mb-8">
            شكراً لتقديمك الطلب. تم استقبال بياناتك بنجاح وسيتم التواصل معك قريباً.
        </p>

        <a href="{{ url('/') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition">
            العودة للصفحة الرئيسية
        </a>
    </div>
</div>
@endsection
