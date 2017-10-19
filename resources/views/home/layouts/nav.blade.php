@inject('car', 'App\Services\Home\CarService')
<div class="nav clearfix">
    <a href="/"></a>
    <a href="{{ route('home.category_list') }}"></a>
    <a href="{{ route('home.car') }}"><em>{{ $car->count() }}</em></a>
    <a href="{{ route('home.person') }}"></a>
</div>