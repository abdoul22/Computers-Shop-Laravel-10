@include('layout')
<h1 class="show-details">Edit a Product</h1>
<div class="show">
<div>
    <form action="{{route('computers.update',['computer' => $computer->id])}}" method="post">
        @csrf
        @method('PUT')
        <div>
        <label for="name">Enter the name</label>
        <input  class="input-style" type="text" value="{{$computer->name}}" name="name" id="name">
        @error("name")
            <div class="error">{{$message}}</div>
        @enderror
        </div>
        <div>
        <label for="origin">Enter the country</label>
        <input class="input-style" value="{{$computer->origin}}" type="text" name="origin" id="origin ">
        @error("origin")
            <div class="error">{{$message}}</div>
        @enderror
        </div>
        <div>
        <label for="Price">Enter the Price</label>
        <input class="input-style"  type="text" name="price" value="{{$computer->price}}" id="Price">
        @error("price")
            <div class="error">{{$message}}</div>
        @enderror
        </div>
        <button type="submit">Edit</button>
    </form>
</div>
</div>

