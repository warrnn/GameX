<div class="flex flex-col gap-4">
    <!-- Item 1 -->
    <div class="border-b border-gray-600 pb-4 cursor-pointer" onclick="showModal('modal1')">
        <h2 class="text-white">Grand Theft Auto V</h2>
        <span class="text-green-500 text-sm">Completed</span>
    </div>

    <!-- Item 2 -->
    <div class="border-b border-gray-600 pb-4 cursor-pointer" onclick="showModal('modal2')">
        <h2 class="text-white">The Witcher 3</h2>
        <span class="text-yellow-500 text-sm">In Delivery</span>
    </div>

    <!-- Item 3 -->
    <div class="border-b border-gray-600 pb-4 cursor-pointer" onclick="showModal('modal3')">
        <h2 class="text-white">Borderlands</h2>
        <span class="text-red-500 text-sm">Cancelled</span>
    </div>

    <!-- Item 4 -->
    <div class="border-b border-gray-600 pb-4 cursor-pointer" onclick="showModal('modal4')">
        <h2 class="text-white">The Witcher 3</h2>
        <span class="text-yellow-500 text-sm">In Delivery</span>
    </div>

    <!-- Item 5 -->
    <div class="border-b border-gray-600 pb-4 cursor-pointer" onclick="showModal('modal5')">
        <h2 class="text-white">Borderlands</h2>
        <span class="text-blue-500 text-sm">Processed</span>
    </div>

    <!-- Item 6 -->
    <div class="border-b border-gray-600 pb-4 cursor-pointer" onclick="showModal('modal6')">
        <h2 class="text-white">Watch Dogs Legion</h2>
        <span class="text-green-500 text-sm">Completed</span>
    </div>

    <!-- See More -->
    <div class="text-center mt-4">
        <span class="text-white cursor-pointer">See More</span>
    </div>
</div>

<!-- pop up item 1 -->
<div id="modal1" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-primary p-6 rounded-lg text-white w-1/3">
        <button class="absolute top-2 right-2 text-white" onclick="closeModal('modal1')">X</button>
        <h3 class="text-xl font-semibold text-orange-500 mb-4">Grand Theft Auto V</h3>
        <h4 class="font-semibold">Seller</h4>
        <p>Name: Jeco</p>
        <p>Domicile: Malang</p>
        <p>Address: Jl. Suhat Blok ABC No. 124</p>

        <h4 class="font-semibold mt-4">Buyer</h4>
        <p>Name: Andreas</p>
        <p>Domicile: Surabaya</p>
        <p>Address: Jl. Ahmad Yani No. 116</p>

        <h4 class="font-semibold mt-4">Keterangan</h4>
        <p>Nomor Resi: abcdefgh123456</p>
        <p>Items: Grand Theft Auto V</p>
        <p>Transaction Date: 10 January 2024</p>
    </div>
</div>

<script>
    function showModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }
</script>