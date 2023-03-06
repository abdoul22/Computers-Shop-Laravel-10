@include('layout')
<h1 class="show-details">Create a new product</h1>
<div class="show">
<div>
    <form action="{{route('computers.store')}}" method="post">
        @csrf
        <div>
        <label for="name">Enter the name</label>
        <input  class="input-style" type="text" value="{{old('name')}}" name="name" id="name">
        @error("name")
            <div class="error">{{$message}}</div>
        @enderror
        </div>
        <div>
        <label for="name">Enter the country</label>
        <input class="input-style" value="{{old('origin')}}" type="text" name="origin" id="name">
        @error("origin")
            <div class="error">{{$message}}</div>
        @enderror
        </div>
        <div>
        <label for="name">Enter the Price</label>
        <input class="input-style"  type="text" name="price" value="{{old('price')}}" id="Price">
        @error("price")
            <div class="error">{{$message}}</div>
        @enderror
        </div>
        <button type="submit">Create</button>
    </form>
</div>
</div>

