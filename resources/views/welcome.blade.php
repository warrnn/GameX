<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameX Store</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.0/dist/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css">
</head>

<body class="bg-gray-900 text-white">
    <!-- Navbar -->
    <nav class="flex justify-between items-center bg-gray-800 p-4">
        <div class="text-2xl font-bold text-red-500">Game<span class="text-white">X</span></div>
        <ul class="flex space-x-4">
            <li><a href="#" class="hover:text-red-500">Store</a></li>
            <li><a href="#" class="hover:text-red-500">Community</a></li>
            <li><a href="#" class="hover:text-red-500">Games</a></li>
            <li><a href="#" class="text-red-500 font-bold">Profile</a></li>
        </ul>
    </nav>

    <!-- Content -->
    <div class="container mx-auto py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Game Card -->
            <div class="bg-gray-800 p-4 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold mb-4">Horizon Zero Dawn</h2>
                <img src="https://via.placeholder.com/300x150" alt="Horizon Zero Dawn" class="rounded mb-4">
                <p class="text-lg font-bold">IDR 729.000</p>
            </div>

            <!-- Form -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                <form>
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-bold">Name</label>
                        <input type="text" id="name" class="w-full p-2 bg-gray-700 text-white rounded"
                            placeholder="Your Name">
                    </div>
                    <div class="mb-4">
                        <label for="city" class="block text-sm font-bold">City</label>
                        <input type="text" id="city" class="w-full p-2 bg-gray-700 text-white rounded"
                            placeholder="Your City">
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-bold">Address</label>
                        <input type="text" id="address" class="w-full p-2 bg-gray-700 text-white rounded"
                            placeholder="Your Address">
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-bold">Phone</label>
                        <input type="tel" id="phone" class="w-full p-2 bg-gray-700 text-white rounded"
                            placeholder="Your Phone">
                    </div>
                    <div class="mb-4">
                        <label for="payment-proof" class="block text-sm font-bold">Payment Proof</label>
                        <input type="file" id="payment-proof" class="w-full p-2 bg-gray-700 text-white rounded">
                    </div>
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-center py-4">
        <div class="text-red-500 font-bold">Game<span class="text-white">X</span></div>
        <p>© 2024, GameX, Inc.</p>
        <a href="#" class="text-sm hover:underline">Admin</a>
    </footer>
</body>

</html>