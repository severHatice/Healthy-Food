{{-- @extends('users.user-dashboard.user-layout') --}}
@extends($ref == 'user-dashboard' ? 'users.user-dashboard.user-layout' : 'layout')


{{-- TODO: there is a problem in url we cannot pass from here to recipes page when clicked recipes on header --}}
@section('content')
    <section class="recipe-content">
        <div class="recipe-detail-container">
            <div class="row">
                <div id="recipe-inner-body" class="col-md-8 col-sm-7 col-xs-12" itemscope>
                    <div class="recipe-presentation">
                        <div class="recipe-single-img">

                            <h1 class="recipe-title">{{ $recipe->title }}</h1>

                            <div class="rating-like-container">
                                {{-- rating part --}}
                                <div class="star-rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <a href="#" class="rate-star" data-rating="{{ $i }}">
                                            <i class="fa fa-star {{ $i <= $recipe->averageRating() ? 'checked' : 'empty-stars' }}"
                                                data-rating-value="{{ $i }}"></i>
                                        </a>
                                    @endfor
                                    <span>{{ round($recipe->averageRating(), 1) }}/5 ({{ $recipe->ratings->count() }}
                                        ratings)</span>
                                </div>

                                {{-- like part --}}
                                <div class="like-icon" data-recipe-id="{{ $recipe->id }}">
                                    <button aria-label="Like">
                                        <i class="fa{{ $recipe->is_liked ? 's' : 'r' }} fa-heart"></i>
                                    </button>
                                    <span class="likes-count">{{ $recipe->is_liked }}
                                        {{ $recipe->is_liked == 1 ? 'like' : 'likes' }}</span>

                                </div>
                            </div>

                            <div class="item">
                                <img width="600px" height="400px"
                                    src="{{ asset('storage/' . json_decode($recipe->images)[0]) }}"
                                    alt="{{ $recipe->title }}" title="{{ $recipe->title }}">
                                <p class="recipe-calorie">Total Calories: {{ $recipe->total_calories }} kcal</p>
                            </div>
                            <div class="short-info">

                                {{-- <i class="icon-alarm-clock"></i> maybe? --}}
                                <span class="text">Prep Time: {{ $recipe->total_time }} minutes</span>

                            </div>
                        </div>
                    </div>

                    {{-- ingredients showed here --}}
                    @if (count($ingredientsList))
                        <div class="recipe-materials-div">
                            <h2 class="recipe-content-titles">Ingredients</h2>
                            <ul class="recipe-materials">
                                @foreach ($ingredientsList as $ingredient)
                                    {{-- automaticaly it create an empty input at the end of inputs ,by checking with if it is solved --}}
                                    @if ($ingredient)
                                        <li>{{ $ingredient }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h2 class="recipe-content-titles">Directions</h2>
                    <p class="recipe-description">{{ $mainDescription }}</p>
                    
                    {{--form for comments--}}

                    @auth
                    <form action="{{ route('recipe.comment',['recipe' => $recipe])}}" method="POST">
                        @csrf
                        <div class="flex h-12">
                            <input class="w-full bg-slate-50 rounded-lg px-5 text-slate-900 focus:outline focus:outline-2 focus:outline-indigo-500" type="text" name="comment" placeholder="Quelque chose à rajouter ? 🎉" autocomplete="off">
                            <button class="ml-2 w-12 flex justify-center items-center shrink-0 bg-indigo-700 rounded-full text-indigo-50">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                    @endauth

                    <div class="space-y-8">

                        @foreach ($recipe->comments as $comment)
                            <div class="flex bg-slate-50 p-6 rounded-lg">

                                {{-- <img class="w-10 h-10 sm:w-12 sm:h-12 object-cover rounded-full" 
                                    src="{{ Gravatar::get($comment->user->email) }}" 
                                    alt="Image de profil de {{ $comment->user->username }}">--}}

                                    <div class="ml-4 flex flex-col"> 
                                        <div class="flex flex-col sm:flex-row sm:items-center">
                                            <h2 class="font-bold text-slate-900 text-2xl">{{
                                            $comment->user->username }}</h2>
                                          <time class="mt-2 sm:mt-0 sm:ml-4 text-xs text-slate-400" datetime="{{ $comment->created_at->format('Y-m-d H:i:s') }}">
                                            {{ $comment->created_at->format('Y-m-d H:i:s') }}
                                        </time>
                                        
                                        </div>
                                        <p class="mt-4 text-slate-800 sm:leading-loose">{{ $comment->content }}

                                        </p>
                                     </div>
                        </div> 
                                     @endforeach

                    

                   
                    <div class="buttons-detail-recette ">
                        <div class="col-4 ">
                            <a href="{{ route('recipe.edit', $recipe->id) }}" class="btn-btn recipe-edit-btn w-100">Edit</a>
                        </div>
                        <form action="{{ route('recipe.delete', $recipe->id) }}" method="POST" class="col-4 mt-0 delete-btn-container">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="recipe-delete-btn w-100">Delete</button>
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>
  
    </section>

    {{-- show message coming from rate funct  --}}
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <script>
        if (!window.ratingEventAdded) {//added because we send 2 times post for rate endpoint to db
            document.addEventListener('DOMContentLoaded', function() {
                const rateStars = document.querySelectorAll('.rate-star');
                rateStars.forEach(star => {
                    star.addEventListener('click', function(e) {
                        // e.preventDefault();
                        let rating = this.dataset.rating;
                        let recipeId = "{{ $recipe->id }}";
                        let url = "{{ route('recipes.rate', $recipe->id) }}";
    
                        axios.post(url, {
                            rating: rating,
                            recipe_id: recipeId,
                            _token: "{{ csrf_token() }}"
                        })
                        .then(response => {
                            const newAverageRating = parseFloat(response.data.newAverageRating);
                            if (!isNaN(newAverageRating)) {
                                updateStarRating(newAverageRating);
                                updateRatingText(newAverageRating, response.data.ratingsCount);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                    });
                });
    
                function updateStarRating(newAverageRating) {
                    rateStars.forEach(star => {
                        let starRatingValue = parseInt(star.dataset.rating);
                        let icon = star.querySelector('i');
                        if (starRatingValue <= newAverageRating) {
                            icon.classList.add('checked');
                            icon.classList.remove('empty-stars');
                        } else {
                            icon.classList.remove('checked');
                            icon.classList.add('empty-stars');
                        }
                    });
                }
    
                function updateRatingText(newAverageRating, ratingsCount) {
                    const ratingSpan = document.querySelector('.star-rating + span');
                    if (ratingSpan) {
                        ratingSpan.textContent = newAverageRating.toFixed(1) + '/5 (' + ratingsCount + ' ratings)';
                        console.log("Rating text updated: ", ratingSpan.textContent);
                    }
                }
    
                window.ratingEventAdded = true;
            });
        }
    </script>
    
    
    
    // {{-- rating part update script --}}
    // {{-- <script>
    //     $(document).ready(function() {
    //         $('.rate-star').click(function(e) {
    //             e.preventDefault();
    //             let rating = $(this).data('rating');
    //             let recipeId = "{{ $recipe->id }}";
    //             let url = "{{ route('recipes.rate', $recipe->id) }}";

    //             $.ajax({
    //                 url: url,
    //                 type: 'POST',
    //                 data: {
    //                     "_token": "{{ csrf_token() }}",
    //                     "rating": rating,
    //                     "recipe_id": recipeId
    //                 },
    //                 success: function(response) {
    //                     console.log('Response successfully:', response);
    //                     if (response.newAverageRating !== undefined && response.ratingsCount !==
    //                         undefined) {
    //                         updateStarRating(response.newAverageRating);
    //                         $('.star-rating').next('span').text(response.newAverageRating
    //                             .toFixed(1) + '/5 (' + response.ratingsCount + ' ratings)');
    //                     } else {
    //                         console.error('response is not dans un format attended:', response);
    //                     }
    //                 },
    //                 error: function(xhr, status, error) {
    //                     console.error('There is an error for ajax response:', error);
    //                 }
    //             });
    //         });

    //         function updateStarRating(newAverageRating) {
    //             $('.star-rating i').each(function() {
    //                 let starRatingValue = parseInt($(this).data('rating-value'));
    //                 $(this).toggleClass('checked', starRatingValue <= newAverageRating);
    //             });
    //         }
    //     });
    // </script> --}}

    // {{-- when clicked icon heart to like it, we take event and connect db with ajax --}}
    <script>
        $(document).ready(function() {
            $('.like-icon button').click(function(e) {
                e.preventDefault();
                let recipeId = $(this).parent().data('recipe-id');
                let url = $(this).parent().hasClass('liked') ? '/recipes/' + recipeId + '/unlike' :
                    '/recipes/' + recipeId + '/like';
                let _this = $(this).parent();

                console.log('Sending AJAX request to:', url);

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        console.log('Success for like:', response);
                        let likeText = response.likes + ' ' + (response.likes === 1 || response
                            .likes === 0 ? 'like' :
                            'likes');
                        _this.find('.likes-count').text(likeText);

                        if (response.status === 'liked') {
                            _this.addClass('liked').find('i').removeClass('far').addClass(
                                'fas');
                        } else {
                            _this.removeClass('liked').find('i').removeClass('fas').addClass(
                                'far');
                        }
                    },


                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', error);
                        console.error('AJAX Error:', error);
                    }
                });
            });
        });
    </script>

@endsection
