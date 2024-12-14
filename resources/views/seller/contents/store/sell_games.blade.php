@extends('seller.base')

@section('content')
<!-- @if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session('success') }}',
        confirmButtonColor: '#8B1E3F',
    })
</script>
@endif -->

<section class="h-screen mx-8 lg:mx-20 mt-14">
    <div class="flex">
        <h1 class="text-4xl font-bold text-white text-center sm:text-start mx-auto lg:mx-0">Sell Games</h1>
    </div>
    <div class="mt-4 flex">
        <a href="{{ route('seller.manageGame') }}" class="bg-teritary text-white px-3 py-2 rounded-lg mx-auto lg:mx-0 hover:bg-accent transition">
            Add Product +
        </a>
    </div>
    <div class="overflow-x-auto bg-primary rounded-lg p-4 mt-4 shadow-lg">
        <table id="sellerTable" class="text-white stripe hover row-border order-column">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Base</th>
                    <th>Potrait Image</th>
                    <th>Landscape Image</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < 10; $i++)
                <tr>
                    <td>1</td>
                    <td>Game Name</td>
                    <td>Price</td>
                    <td>Category</td>
                    <td>Base</td>
                    <td>Potrait Image</td>
                    <td>Landscape Image</td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
</section>
@endsection