@inject('car', 'App\Services\Home\CarService')
<div class="nav clearfix">
    <a href="index.html"></a>
    <a href="{{ route('home.category_list') }}"></a>
    <a href="shopping-cart.html"><em>{{ $car->count() }}</em></a>
    <a href="personal-center.html"></a>
</div>