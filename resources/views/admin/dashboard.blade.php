@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')

@include('components.sidebar')

<div class="p-4 sm:ml-64">

    <header class="mt-10">
        <div class="w-full text-center">
            <h1 class="text-xl font-medium leading-relaxed uppercase border-b-2 border-gray-300">Display Dashboard</h1>
        </div>
    </header>

</div>

@endsection