@for($i = 0; $i < 3; $i++)
<div class="flex items-center p-4 bg-gray-800 rounded-lg shadow-lg max-w-full">
    <img
      class="w-64 h-36 rounded-lg object-cover"
      src="{{ asset('assets/images/landscape_dummy.jpg') }}"
      alt="Game Thumbnail"
    />
  
    <div class="ml-12">
      <h2 class="text-lg font-semibold text-white">Horizon Zero Dawn</h2>
      <p class="text-sm text-gray-400">Purchased on - 1 November 2024</p>
    </div>
  </div>
  
@endfor