<dialog id="edit_data_modal" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box bg-neutral text-white">
        <h3 class="text-lg font-bold">Edit Data</h3>
        <form action="{{ route('buyer.changeData') }}" method="POST" class="flex flex-col space-y-4">
            @csrf
            @method('PUT')
            <div class="flex flex-col space-y-2">
                <label for="">Email</label>
                <input type="email" name="email" value="{{ $current_user->email }}" placeholder="Edit Data" class="input input-bordered w-full">
            </div>
            <div class="flex flex-col space-y-2">
                <label for="">Old Password</label>
                <input type="password" name="oldpassword" placeholder="Input Your Old Password" class="input input-bordered w-full">
            </div>
            <div class="flex flex-col space-y-2">
                <label for="">New Password</label>
                <input type="password" name="newpassword" placeholder="Input Your New Password" class="input input-bordered w-full">
            </div>
            <button type="submit" class="btn w-full bg-teritary text-white hover:bg-accent hover:text-black transition">Update Data</button>
        </form>
        <div class="modal-action">
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </form>
        </div>
    </div>