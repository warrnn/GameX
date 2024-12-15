<dialog id="create_comm_modal" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box bg-neutral">
        <h3 class="text-lg font-bold mb-4">Create New Community</h3>
        <div class="py-2">
            <form action="" class="flex flex-col gap-4">
                <div class="space-y-2">
                    <label for="">Community Picture</label>
                    <input type="file" class="file-input file-input-bordered w-full" />
                </div>

                <div class="space-y-2">
                    <label for="">Community Name</label>
                    <input type="text" class="input input-bordered w-full" placeholder="Comunity Name" />
                </div>

                <div class="space-y-2">
                    <label for="">Related Game</label>
                    <select name="" id="" class="select select-bordered w-full">
                        @for ($i = 0; $i < 10; $i++)
                            <option value="">Game {{ $i }}</option>
                            @endfor
                    </select>
                </div>

                <div class="flex flex-col space-y-2">
                    <label for="">Community Picture</label>
                    <textarea type="text" class="textarea textarea-bordered" placeholder="Community Description"></textarea>
                </div>

                <input type="submit" value="Create" class="btn w-full hover:bg-accent hover:text-black transition">
            </form>
        </div>
        <div class="modal-action">
            <form method="dialog">
                <button class="btn">Close</button>
            </form>
        </div>
    </div>
</dialog>