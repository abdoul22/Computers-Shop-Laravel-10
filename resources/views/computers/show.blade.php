@include('layout')
<h1 class="show-details">Product details</h1>
<div class="show">
<p>The product name is <strong> {{$computer['name']}}</strong></p>
<p>The last price is <strong> {{$computer['price']}}</strong></p>
<div>
    <a href="{{route('computers.edit', $computer->id)}}"><button>Edit</button></a>
    <form action="{{route('computers.destroy', $computer->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <input type="submit" value="delete">
    </form>
</div>
</div>

