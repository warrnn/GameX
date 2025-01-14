<dialog id="add_promo_modal" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box bg-neutral">
        <h3 class="text-lg font-bold mb-4">Add Discount</h3>
        <form action="{{ route('seller.addDiscount') }}" method="POST" class="flex flex-col space-y-4">
            @csrf
            <div class="flex flex-col space-y-2">
                <label for="">Select Game</label>
                <select name="game_id" id="" class="select select-bordered w-full text-white">
                    <option disabled selected>Select Game</option>
                    @foreach ($selled_games as $game)
                    <option value="{{ $game->id }}">{{ $game->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="">Discount</label>
                <div class="join rounded-lg border border-strike text-white">
                    <input type="number" name="discount" min="10" max="100" class="input input-bordered rounded-lg w-full join-item" placeholder="Input Game Discount" />
                    <div class="">
                        <div class="btn join-item">%</div>
                    </div>
                </div>
            </div>
            <input type="submit" value="Set Discount" class="btn w-full bg-teritary text-white hover:bg-accent hover:text-black transition">
        </form>
        <div class="modal-action">
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </form>
        </div>
    </div>
</dialog>