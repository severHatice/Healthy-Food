<!-- resources/views/comments/create.blade.php -->
<!-- recipe-details.blade.php -->
@extends('layouts.app') 

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
 
                <h2>{{ $recipe->title }}</h2>
                <p>{{ $recipe->description }}</p>
             
                @auth
                    <form method="POST" action="{{--route('comments.store') --}}">
                        @csrf
                        <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                        <div class="form-group">
                            <label for="comment">Ajouter un commentaire :</label>
                            <textarea class="form-control" name="comment" id="comment" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter le commentaire</button>
                    </form>
                @endauth

            
                <h3>Commentaires</h3>
                @foreach($recipe->comments as $comment)
                    <div class="card">
                        <div class="card-body">
                            <p>{{ $comment->content }}</p>
                            
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
