<!-- Open the modal using ID.showModal() method -->
<dialog id="modal_seller_register" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box bg-neutral mx-4">
        <img src="{{ asset('assets/logo/text_light.png') }}" alt="GameX Logo" class="h-24 drop-shadow-lg mx-auto">
        <h1 class="text-center text-2xl font-bold text-white mb-8">Seller Registration</h1>
        <form action="{{ route('buyer.registAsSeller') }}" method="POST" class="flex flex-col gap-4">
            @csrf
            <select name="domicile" class="select select-bordered w-full text-white">
                <option selected disabled>Select Your Domicile</option>
                @foreach ($kabKota as $data)
                <option value="{{ str_replace(['Kota ', 'Kabupaten '], '', $data['text']) }}">{{ str_replace(['Kota ', 'Kabupaten '], '', $data['text']) }}</option>
                @endforeach
            </select>

            <label class="input input-bordered flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8z" />
                    <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" />
                </svg>
                <input type="text" name="address" class="grow border border-transparent focus:outline-none focus:ring-0 focus:border-transparent px-4 py-2 rounded" placeholder="Your Address" />
            </label>

            <label class="input input-bordered flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                </svg>
                <input type="tel" name="phone" class="grow border border-transparent focus:outline-none focus:ring-0 focus:border-transparent px-4 py-2 rounded" placeholder="Your Phone Number" />
            </label>

            <input type="submit" value="Register as Seller" class="btn w-full hover:bg-accent hover:text-black transition">
        </form>
        <div class="modal-action">
            <form method="dialog" class="mx-auto">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </form>
        </div>
    </div>
</dialog>