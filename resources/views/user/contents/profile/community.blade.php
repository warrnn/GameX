@for($i = 0; $i < 4; $i++)
<div class="flex items-center p-3 bg-gray-800 rounded-lg shadow-md max-w-full">
    
    <img
      class="w-32 h-32 rounded-lg object-cover"
      src="{{ asset('assets/images/potrait_dummy.jpeg') }}"
      alt="Game Thumbnail"
    />
  
    
    <div class="ml-8">
      <h2 class="text-base font-semibold text-white">Horizon Community</h2>
      <p class="text-sm text-gray-400">Joined on - 31 November 2024</p>
    </div>
  </div>
  
@endfor