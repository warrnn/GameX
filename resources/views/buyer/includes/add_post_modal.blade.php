<dialog id="add_post_modal" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box bg-neutral text-white">
        <h3 class="text-lg font-bold">Add New Post for this Community</h3>
        <form action="" class="flex flex-col space-y-4 mt-4">
            <div class="flex flex-col space-y-2">
                <label for="">What do you want to Share?</label>
                <textarea type="text" class="textarea textarea-bordered" placeholder="Type Your Post Here"></textarea>
            </div>
            <input type="submit" value="Post" class="btn w-full bg-teritary text-white hover:bg-accent hover:text-black transition">
        </form>
        <div class="modal-action">
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </form>
        </div>
    </div>
</dialog>