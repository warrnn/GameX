<dialog id="add_admin_modal" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box bg-neutral text-white">
        <h3 class="text-lg font-bold">Add New Admin</h3>
        <form action="{{ route('admin.addAdmin') }}" method="POST" class="mt-4">
            @csrf
            <div class="flex flex-col space-y-2">
                <label for="user" class="text-sm font-bold text-white">Select User</label>
                <select name="user" class="input input-bordered w-full">
                    <option disabled selected>Select User</option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn w-full bg-teritary text-white hover:bg-accent hover:text-black transition mt-4">Add User as Admin</button>
        </form>
        <div class="modal-action">
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </form>
        </div>
    </div>
</dialog>