{{-- @props(['recipes'])
 <div class="menu-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Special Menu</h2>
                    <p class="heading-text">Lorem Ipsum is simply dummy text of the printing and typesetting</p>
  
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <button class="active" data-filter="All">All</button>
                        <button data-filter="Breakfast">Breakfast</button>
                        <button data-filter="Lunch">Lunch</button>
                        <button data-filter="Dinner">Dinner</button>
                        <button data-filter="Dessert">Dessert</button>                    
                    </div>
                    @include('partials._search')
                </div>
            </div>
        </div>
        <div class="row special-list">
            {{ $slot }}
        </div>
    </div>
    <div class="users-pagination">
        <div class="visibility: collapse">
        {{ $recipes->links() }}
    </div>
</div>


<script>
function filterRecipes(category) {
    console.log("Filtering recipes for category: ", category);
    axios.get('/recipes/category/' + category)
        .then(function (response) {
            console.log("Response received: ", response);
            document.querySelector('.special-list').innerHTML = response.data;
        })
        .catch(function (error) {
           
        });
}

  
    document.querySelectorAll('.filter-button-group button').forEach(function(button) {
    button.addEventListener('click', function() {
        let category = button.dataset.filter; 
        filterRecipes(category);
    });
});


</script>

 --}}
