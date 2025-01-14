<dialog id="create_comm_modal" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box bg-neutral">
        <h3 class="text-lg font-bold mb-4">Create New Community</h3>
        <div class="py-2">
            <form action="{{ route('buyer.addCommunity') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4">
                @csrf
                <div class="space-y-2">
                    <label for="">Community Picture</label>
                    <input type="file" name="image" class="file-input file-input-bordered w-full" />
                </div>

                <div class="space-y-2">
                    <label for="">Community Name</label>
                    <input type="text" name="name" class="input input-bordered w-full" placeholder="Comunity Name" />
                </div>

                <div class="space-y-2">
                    <label for="">Related Game</label>
                    <input type="text" name="related_game" class="input input-bordered w-full" placeholder="Related Game" />
                </div>

                <div class="flex flex-col space-y-2">
                    <label for="">Community Description</label>
                    <textarea type="text" name="description" class="textarea textarea-bordered" placeholder="Community Description"></textarea>
                </div>

                <input type="submit" value="Create" class="btn w-full bg-teritary text-white hover:bg-accent hover:text-black transitio">
            </form>
        </div>
        <div class="modal-action">
            <form method="dialog">
                <button class="btn">Close</button>
            </form>
        </div>
    </div>
</dialog>