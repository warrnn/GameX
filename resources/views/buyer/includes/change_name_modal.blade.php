<dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box bg-neutral">
        <h3 class="text-lg font-bold text-white">Change Name</h3>
        <form action="{{ route('buyer.changeName', $current_user->id) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')
            <div class="flex flex-col space-y-2 text-white">
                <label for="name">Name</label>
                <input type="text" name="name" class="input input-bordered w-full" value="{{ $current_user->name }}" placeholder="Enter your new name" />
            </div>
            <button type="submit" class="btn w-full bg-teritary text-white hover:bg-accent hover:text-black transition mt-4">Update Name</button>
        </form>
        <div class="modal-action">
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </form>
        </div>
    </div>
</dialog>