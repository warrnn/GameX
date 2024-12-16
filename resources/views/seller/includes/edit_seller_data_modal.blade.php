<dialog id="edit_seller_data_modal" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box bg-neutral text-white">
        <h3 class="text-lg font-bold">Edit Seller Data</h3>
        <form action="{{ route('seller.changeData') }}" method="POST" class="flex flex-col space-y-4">
            @csrf
            @method('PUT')
            <div class="flex flex-col space-y-2">
                <label for="">Change Domicile</label>
                <select name="domicile" class="select select-bordered w-full text-white">
                    <option value="{{ $current_seller->domicile }}">{{ $current_seller->domicile }}</option>
                    @foreach ($kabKota as $data)
                    <option value="{{ str_replace(['Kota ', 'Kabupaten '], '', $data['text']) }}">{{ str_replace(['Kota ', 'Kabupaten '], '', $data['text']) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="">Change Address</label>
                <input type="text" name="address" value="{{ $current_seller->address }}" placeholder="New Address" class="input input-bordered w-full">
            </div>
            <div class="flex flex-col space-y-2">
                <label for="phone">Change Phone Number</label>
                <input type="text" name="phone" value="{{ $current_seller->phone }}" placeholder="New Phone Number" class="input input-bordered w-full">
            </div>
            <button type="submit" class="btn w-full bg-teritary text-white hover:bg-accent hover:text-black transition">Update Seller Data</button>
        </form>
        <div class="modal-action">
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </form>
        </div>
    </div>
</dialog>