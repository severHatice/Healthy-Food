<!-- resources/views/recipes.blade.php -->

@extends('layout') {{-- قم بتحديد الملف الخاص بتخطيط التطبيق --}}
@section('content')

    <div class="container">
        <h1>Recipes</h1>

        @foreach ($recipes as $recipe)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $recipe['title'] }}</h5>
                    <p class="card-text">{{ $recipe['summary'] }}</p>
                    <p class="card-text">Ready in {{ $recipe['readyInMinutes'] }} minutes</p>
                    <p class="card-text">Servings: {{ $recipe['servings'] }}</p>
                    {{-- إضافة المزيد من التفاصيل حسب احتياجاتك --}}
                    <a href="{{ route('recipes.show', $recipe['id']) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        @endforeach

    </div>

@endsection
