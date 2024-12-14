@extends('seller.base')

@section('content')
<script src="{{ asset('js/seller/manage_game.js') }}"></script>

<!-- @if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: '{{ session('error') }}',
        confirmButtonColor: '#8B1E3F',
    })
</script>
@endif -->

<section class="h-auto my-12 w-full flex items-center justify-center">
    <div class="flex flex-col space-y-4 w-full max-w-4xl mx-4">
        <div class="flex justify-center mb-4">
            @if(!request()->has('id'))
            <h1 class="text-center text-2xl font-bold text-white">Add New Product</h1>
            @else
            <h1 class="text-center text-2xl font-bold text-white">Edit Product</h1>
            @endif
        </div>
        @if(!request()->has('id'))
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
        <form action="" class="flex flex-col space-y-6">
            <div class="flex flex-col space-y-2">
                <label for="name" class="">Name @if(!request()->has('id'))<span class="text-red-500">*</span>@endif</label>
                <input type="text" id="name" name="name" placeholder="Game Name" class="input input-bordered w-full text-white" />
            </div>
            <div class="flex flex-col space-y-2">
                <label for="price" class="">Price @if(!request()->has('id'))<span class="text-red-500">*</span>@endif</label>
                <input type="text" id="price" name="price" placeholder="Game Price" class="input input-bordered w-full text-white" />
            </div>
            <div class="flex flex-col space-y-2">
                <label for="category" class="">Category @if(!request()->has('id'))<span class="text-red-500">*</span>@endif</label>
                <select id="category" name="category_id" class="select select-bordered w-full text-white">
                    <option disabled selected>Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="publisher" class="">Publisher @if(!request()->has('id'))<span class="text-red-500">*</span>@endif</label>
                <input type="text" id="publisher" name="publisher" placeholder="Game Publisher" class="input input-bordered w-full text-white" />
            </div>
            <div class="flex flex-col space-y-2">
                <label for="release_date" class="">Release Date @if(!request()->has('id'))<span class="text-red-500">*</span>@endif</label>
                <input type="date" id="release_date" name="release_date" class="input input-bordered w-full text-white" />
            </div>
            <div class="flex flex-col space-y-2">
                <label for="base" class="">Base @if(!request()->has('id'))<span class="text-red-500">*</span>@endif</label>
                <select id="base" class="select select-bordered w-full text-white" name="base">
                    <option disabled selected>Select Game Base</option>
                    <option value="DIGITAL">Digital</option>
                    <option value="PHYSICAL">Physical</option>
                </select>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="description" class="">Description @if(!request()->has('id'))<span class="text-red-500">*</span>@endif</label>
                <textarea id="description" rows="4" name="description" placeholder="Game Description / Explanation" class="textarea textarea-bordered w-full text-white"></textarea>
            </div>
            <div class="flex flex-col sm:flex-row justify-around w-full max-sm:space-y-4 sm:space-x-4">
                <div class="flex flex-col space-y-2 w-full">
                    <label for="portrait_image" class="">Portrait Image @if(!request()->has('id'))<span class="text-red-500">*</span>@endif</label>
                    <input type="file" id="portrait_image" name="portrait_image" class="file-input file-input-bordered w-full" />
                </div>
                <div class="flex flex-col space-y-2 w-full">
                    <label for="landscape_image" class="">Landscape Image @if(!request()->has('id'))<span class="text-red-500">*</span>@endif</label>
                    <input type="file" id="landscape_image" name="landscape_image" class="file-input file-input-bordered w-full" />
                </div>
            </div>
            <input type="submit" value="Update Product" class="btn w-full bg-teritary text-white hover:bg-accent hover:text-black transition">
        </form>
        @endif
    </div>
</section>
@endsection