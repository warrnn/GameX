@extends('seller.base')

@section('content')
<section class="h-screen mx-8 lg:mx-20 mt-14">
    <div class="flex">
        <h1 class="text-4xl font-bold text-white text-center sm:text-start mx-auto lg:mx-0">Manage Promotions</h1>
    </div>
    <div class="mt-4 flex">
        <button class="bg-teritary text-white px-3 py-2 rounded-lg mx-auto lg:mx-0">
            Add Discount +
        </button>
    </div>
    <div class="overflow-x-auto bg-primary rounded-lg p-4 mt-4 shadow-lg">
        <table id="promotionsTable" class="text-white stripe hover row-border order-column">
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