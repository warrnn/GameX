@extends('seller.base')

@section('content')
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session('success') }}',
        confirmButtonColor: '#8B1E3F',
    })
</script>
@endif
@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: '{{ session('error') }}',
        confirmButtonColor: '#8B1E3F',
    })
</script>
@endif

<script src="{{ asset('js/seller/manage_game.js') }}"></script>

<section class="h-auto my-12 w-full flex items-center justify-center">
    <div class="flex flex-col space-y-4 w-full max-w-4xl mx-4">
        <div class="flex justify-center mb-4">
            @if(!request()->route('game_id'))
            <h1 class="text-center text-2xl font-bold text-white">Add New Product</h1>
            @else
            <h1 class="text-center text-2xl font-bold text-white">Edit Product</h1>
            @endif
        </div>
        @if(!request()->route('game_id'))
        <form action="{{ route('seller.addGame') }}" method="POST" enctype="multipart/form-data" class="flex flex-col space-y-6">
            @csrf
            <div class="flex flex-col space-y-2">
                <label for="name" class="">Name<span class="text-red-500">*</span></label>
                <input type="text" id="name" name="name" placeholder="Game Name" class="input input-bordered w-full text-white" />
            </div>
            <div class="flex flex-col space-y-2">
                <label for="price" class="">Price<span class="text-red-500">*</span></label>
                <input type="number" id="price" name="price" placeholder="Game Price" class="input input-bordered w-full text-white" />
            </div>
            <div class="flex flex-col space-y-2">
                <label for="category" class="">Category<span class="text-red-500">*</span></label>
                <select id="category" name="category_id" class="select select-bordered w-full text-white">
                    <option disabled selected>Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="publisher" class="">Publisher<span class="text-red-500">*</span></label>
                <input type="text" id="publisher" name="publisher" placeholder="Game Publisher" class="input input-bordered w-full text-white" />
            </div>
            <div class="flex flex-col space-y-2">
                <label for="release_date" class="">Release Date<span class="text-red-500">*</span></label>
                <input type="date" id="release_date" name="release_date" class="input input-bordered w-full text-white" />
            </div>
            <div class="flex flex-col space-y-2">
                <label for="base" class="">Base<span class="text-red-500">*</span></label>
                <select id="base" class="select select-bordered w-full text-white" name="base">
                    <option disabled selected>Select Game Base</option>
                    <option value="DIGITAL">Digital</option>
                    <option value="PHYSICAL">Physical</option>
                </select>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="description" class="">Description<span class="text-red-500">*</span></label>
                <textarea id="description" name="description" rows="4" placeholder="Game Description / Explanation" class="textarea textarea-bordered w-full text-white"></textarea>
            </div>
            <div class="flex flex-col sm:flex-row justify-around w-full max-sm:space-y-4 sm:space-x-4">
                <div class="flex flex-col space-y-2 w-full">
                    <label for="portrait_image" class="">Portrait Image<span class="text-red-500">*</span></label>
                    <input type="file" name="portrait_image" id="portrait_image" class="file-input file-input-bordered w-full" />
                </div>
                <div class="flex flex-col space-y-2 w-full">
                    <label for="landscape_image" class="">Landscape Image<span class="text-red-500">*</span></label>
                    <input type="file" name="landscape_image" id="landscape_image" class="file-input file-input-bordered w-full" />
                </div>
            </div>
            <input type="submit" value="Add Product" class="btn w-full bg-teritary text-white hover:bg-accent hover:text-black transition">
        </form>
        @else
        <form action="{{  route('seller.updateGame', request()->route('game_id')) }}" method="POST" enctype="multipart/form-data" class="flex flex-col space-y-6">
            @csrf
            @method('PUT')
            <div class="flex flex-col space-y-2">
                <label for="name" class="">Name</label>
                <input type="text" id="name" name="name" value="{{ $game->name }}" placeholder="Game Name" class="input input-bordered w-full text-white" />
            </div>
            <div class="flex flex-col space-y-2">
                <label for="price" class="">Price</label>
                <input type="text" id="price" name="price" value="{{ $game->price }}" placeholder="Game Price" class="input input-bordered w-full text-white" />
            </div>
            <div class="flex flex-col space-y-2">
                <label for="category" class="">Category</label>
                <select id="category" name="category_id" class="select select-bordered w-full text-white">
                    <option disabled>Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        @if($category->id == $game->category_id) selected @endif>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="publisher" class="">Publisher</label>
                <input type="text" id="publisher" name="publisher" value="{{ $game->publisher }}" placeholder="Game Publisher" class="input input-bordered w-full text-white" />
            </div>
            <div class="flex flex-col space-y-2">
                <label for="release_date" class="">Release Date</label>
                <input type="date" id="release_date" name="release_date" value="{{ $game->release_date }}" class="input input-bordered w-full text-white" />
            </div>
            <div class="flex flex-col space-y-2">
                <label for="base" class="">Base</label>
                <select id="base" class="select select-bordered w-full text-white" name="base">
                    <option value="{{ $game->base }}">{{ $game->base }}</option>
                    <option value="DIGITAL">Digital</option>
                    <option value="PHYSICAL">Physical</option>
                </select>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="description" class="">Description</label>
                <textarea id="description" rows="4" name="description" placeholder="Game Description / Explanation" class="textarea textarea-bordered w-full text-white">{{ $game->description }}</textarea>
            </div>
            <div class="flex flex-col sm:flex-row justify-around w-full max-sm:space-y-4 sm:space-x-4">
                <div class="flex flex-col space-y-2 w-full">
                    <label for="portrait_image" class="">Portrait Image</label>
                    <input type="file" id="portrait_image" name="portrait_image" class="file-input file-input-bordered w-full" />
                </div>
                <div class="flex flex-col space-y-2 w-full">
                    <label for="landscape_image" class="">Landscape Image</label>
                    <input type="file" id="landscape_image" name="landscape_image" class="file-input file-input-bordered w-full" />
                </div>
            </div>
            <input type="submit" value="Update Product" class="btn w-full bg-teritary text-white hover:bg-accent hover:text-black transition">
        </form>
        @endif
    </div>
</section>
@endsection