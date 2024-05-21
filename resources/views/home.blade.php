@extends('layouts.app')

@section('title')
    FIDS display
@endsection

@section('content')
    <header class="my-10 mx-7">
        <h1 class="font-bold italic underline text-4xl flex items-center space-x-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M5.25 12a.75.75 0 01.75-.75h12a.75.75 0 010 1.5H6a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
            </svg>
            <span>
                FIDS Abdulrachman Saleh
            </span>
        </h1>
        <div class="px-10 flex space-x-6 mt-5 text-lg font-medium">
            <a href="{{ route('arrival') }}" class="block underline hover:text-blue-800">Arrival Schedule</a>
            <a href="{{ route('departure') }}" class="block underline hover:text-blue-800">Departure Schedule</a>
        </div>
    </header>
@endsection