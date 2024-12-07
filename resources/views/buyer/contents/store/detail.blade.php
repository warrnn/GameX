@extends('buyer.base')

@section('content')
<section class="h-auto mx-8 sm:mx-16">
    <section class="h-auto pb-32 mt-12">
        <!-- Title -->
        <div>
            <h1 class="text-4xl font-bold text-white">Horizon: Zero Down</h1>
        </div>
        <div class="h-auto grid lg:grid-cols-6 gap-6 mt-4">
            <!-- Landscape Game Display -->
            <div class="lg:col-span-4">
                <div>
                    <img src="{{ asset('assets/images/landscape_dummy.jpg') }}" class="w-full h-full object-cover rounded-lg drop-shadow-lg" alt="Potrait Dummy">
                </div>
                <div class="mt-4">
                    <h3 class="text-lg font-bold text-white">Category</h3>
                    <div class="mt-2 w-fit text-sm">
                        <p class="text-white bg-teritary px-2 py-1 rounded-lg">Action</p>
                    </div>
                </div>
            </div>
            <!-- Buy Now Button & Information -->
            <div class="lg:col-span-2">
                <div>
                    <h2 class="text-2xl font-bold text-white">IDR 729.000</h2>
                </div>
                <div class="mt-1">
                    <a href="{{ route('buyer.payment', 'lorem') }}" class="btn w-full mt-2 bg-accent text-white hover:bg-teritary transition">Buy Now</a>
                </div>
                <div class="mt-4 space-y-2">
                    <div class="flex border-b border-white p-2">
                        <p class="text-sm">Seller</p>
                        <p class="ms-auto text-white font-bold truncate max-w-52 text-sm">Guerilla</p>
                    </div>
                    <div class="flex border-b border-white p-2">
                        <p class="text-sm">Publisher</p>
                        <p class="ms-auto text-white font-bold truncate max-w-52 text-sm">PlayStation Publishing LLC</p>
                    </div>
                    <div class="flex border-b border-white p-2">
                        <p class="text-sm">Release Date</p>
                        <p class="ms-auto text-white font-bold truncate max-w-52 text-sm">08 July 2020</p>
                    </div>
                    <div class="flex border-b border-white p-2">
                        <p class="text-sm">Base</p>
                        <p class="ms-auto text-white font-bold truncate max-w-52 text-sm">Digital</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-8 lg:mt-4">
            <p class="text-strike">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam veritatis rerum tempore nulla, earum aut culpa obcaecati? Ullam accusamus a nam corrupti, tenetur sunt repellendus voluptatem recusandae quae officia quia odit quod? Alias consequatur, nulla deleniti non labore reprehenderit aliquam rem, temporibus vero, facilis minima. Nesciunt obcaecati porro eius, numquam aspernatur id asperiores quisquam laudantium, dicta qui cumque error officiis earum voluptatum voluptates optio! Consequuntur, sed. Aut ipsam iure veritatis iusto iste voluptatibus quod corporis quaerat facilis obcaecati, ea esse cupiditate aperiam hic odit ipsa tenetur nostrum. Ducimus rerum voluptatibus quidem, vel magni consequatur iste dolorem exercitationem, cumque optio quae.</p>
        </div>
    </section>
</section>
@endsection