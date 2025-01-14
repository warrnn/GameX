<dialog id="add_category" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box bg-neutral">
        <h3 class="text-lg font-bold">Add New Category</h3>
        <form action="{{ route('admin.addCategory') }}" method="POST" class="mt-4">
            @csrf
            <div class="flex flex-col space-y-2">
                <label for="category">Game Category</label>
                <input type="text" name="category" placeholder="Input New Category" class="input input-bordered w-full">
            </div>
            <button type="submit" class="btn w-full bg-teritary text-white hover:bg-accent hover:text-black transition mt-4">Add Category</button>
        </form>
        <div class="modal-action">
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </form>
        </div>
    </div>
</dialog>