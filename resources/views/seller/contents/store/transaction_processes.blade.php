@extends('seller.base')

@section('content')
<style>
    label, #dt-search-0, #sellerTable_info {
        color: white;
    }
</style>

<script src="{{ asset('js/seller/datatables.js') }}"></script>

<section class="h-screen mx-8 lg:mx-20 mt-14">
    <div class="flex">
        <h1 class="text-4xl font-bold text-white text-center sm:text-start mx-auto lg:mx-0">Transaction Processes</h1>
    </div>
    <div class="overflow-x-auto">
        <table id="sellerTable" class="text-white">
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
                <tr>
                    <td>1</td>
                    <td>Game Name</td>
                    <td>Price</td>
                    <td>Category</td>
                    <td>Base</td>
                    <td>Potrait Image</td>
                    <td>Landscape Image</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
@endsection