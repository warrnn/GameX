@extends('buyer.base')

@section('content')
<!-- @if(session('success'))
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
@endif -->

<section class="h-auto mx-8 md:mx-20 mt-12 pb-20">
    <div class="flex border-b-2 border-strike pb-4 items-center">
        <h1 class="text-2xl md:text-4xl font-bold text-white me-6">Community Detail</h1>
        <p class="ms-auto text-strike hidden md:block">100k Members</p>
        <button class="btn bg-teritary hover:bg-primary transition text-white ms-auto md:hidden" onclick="socials_modal.showModal()">Socials</button>
    </div>
    <div class="grid grid-cols-6">
        <div class="col-span-6 md:col-span-4 md:border-e-2 border-strike">
            <div class="flex flex-col md:flex-row items-center border-b-2 md:border-strike pb-8 mt-8">
                <img src="{{ asset('assets/images/landscape_dummy.jpg') }}" class="h-32 object-cover rounded-lg drop-shadow-lg" alt="Landscape Dummy">
                <h2 class="text-2xl md:text-3xl font-bold text-white ms-4 mt-6 md:mt-0">Far Cry 5</h2>
            </div>
            <div class="flex flex-col">
                <h2 class="text-3xl font-bold text-white my-6 text-center md:text-start">Community Posts</h2>
                <div class="flex flex-col md:me-8 space-y-4">
                    @for ($i = 0; $i < 12; $i++)
                        <div class="flex flex-col space-y-2 bg-primary rounded-lg p-6 drop-shadow-lg" data-aos="fade-up">
                        <h1 class="text-white font-bold text-xl">apaajaboleh</h1>
                        <h2 class="text-teritary font-semibold text-lg">Grand Theft Auto VI Community</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro dolore dicta nobis. Omnis, odit recusandae ex, voluptatibus placeat alias harum velit mollitia at cupiditate blanditiis. Nisi commodi minima impedit laudantium.</p>
                </div>
                @endfor
            </div>
        </div>
    </div>
    <div class="col-span-2 flex flex-col mt-8 w-full hidden md:block">
        <div class="flex justify-center w-full mb-6">
            <h2 class="text-2xl font-bold text-white">Socials</h2>
        </div>
        <div class="flex flex-col mx-8 space-y-4">
            @for ($i = 0; $i < 30; $i++)
                <div class="bg-primary rounded-lg drop-shadow-lg p-3">
                <h1 class="text-white font-bold text-lg text-center">apaajaboleh</h1>
        </div>
        @endfor
    </div>
    </div>
    </div>
</section>

<dialog id="socials_modal" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-4 top-4">✕</button>
        </form>
        <h3 class="text-lg font-bold text-center mb-6">Socials</h3>
        <div class="flex flex-col mx-8 space-y-4">
            @for ($i = 0; $i < 30; $i++)
                <div class="bg-primary rounded-lg drop-shadow-lg p-3">
                <h1 class="text-white font-bold text-lg text-center">apaajaboleh</h1>
        </div>
        @endfor
    </div>
    </div>
</dialog>
@endsection