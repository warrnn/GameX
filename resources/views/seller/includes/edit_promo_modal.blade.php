<dialog id="edit_discount_modal{{ $loop->iteration }}" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box bg-neutral">
        <h3 class="text-lg">Edit <strong>{{ $sale->name }}</strong> Discount</h3>
        <form action="{{ route('seller.updateDiscount', $sale->id) }}" method="POST" class="flex flex-col space-y-4 mt-2">
            @csrf
            @method('PUT')
            <div class="flex flex-col space-y-2">
                <div class="join rounded-lg border border-strike text-white">
                    <input type="number" name="discount" min="10" max="100" value="{{ $sale->discount }}" class="input input-bordered rounded-lg w-full join-item" placeholder="Input Game Discount" />
                    <div class="">
                        <div class="btn join-item">%</div>
                    </div>
                </div>
            </div>
            <input type="submit" value="Update Discount" class="btn w-full bg-teritary text-white hover:bg-accent hover:text-black transition mt-4">
        </form>
        <div class="modal-action">
            <form method="dialog">
                <button class="btn">Close</button>
            </form>
        </div>
    </div>
</dialog>