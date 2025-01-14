<dialog id="edit_category{{ $loop->iteration }}" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box bg-neutral">
        <h3 class="text-lg font-bold">Edit Category Name</h3>
        <form action="{{ route('admin.editCategory', $category->id) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')
            <div class="flex flex-col space-y-2">
                <label for="category">Game Category</label>
                <input type="text" name="category" value="{{ $category->name }}" placeholder="Edit Category Name" class="input input-bordered w-full">
            </div>
            <button type="submit" class="btn w-full bg-teritary text-white hover:bg-accent hover:text-black transition mt-4">Edit Category</button>
        </form>
        <div class="modal-action">
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </form>
        </div>
    </div>
</dialog>