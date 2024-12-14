<!-- Open the modal using ID.showModal() method -->
<dialog id="modal_login" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box bg-neutral">
        <img src="{{ asset('assets/logo/logo_light.png') }}" alt="GameX Logo" class="h-52 drop-shadow-lg mx-auto">
        <form action="{{ route('guest.login')}}" method="POST" class="flex flex-col gap-4">
            @csrf
            <label class="input input-bordered flex items-center gap-2">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 16 16"
                    fill="currentColor"
                    class="h-4 w-4 opacity-70">
                    <path
                        d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                    <path
                        d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                </svg>
                <input type="text" name="email" class="grow border border-transparent focus:outline-none focus:ring-0 focus:border-transparent px-4 py-2 rounded" placeholder="Email" />
            </label>

            <label class="input input-bordered flex items-center gap-2">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 16 16"
                    fill="currentColor"
                    class="h-4 w-4 opacity-70">
                    <path
                        fill-rule="evenodd"
                        d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                        clip-rule="evenodd" />
                </svg>
                <input type="password" name="password" class="grow border border-transparent focus:outline-none focus:ring-0 focus:border-transparent px-4 py-2 rounded" placeholder="Password" />
            </label>

            <input type="submit" value="Log In" class="btn w-full hover:bg-accent hover:text-black transition">
        </form>
        <div class="modal-action">
            <form method="dialog" class="mx-auto">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </form>
        </div>
    </div>
</dialog>