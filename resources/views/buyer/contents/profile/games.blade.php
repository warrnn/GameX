@for($i = 0; $i < 3; $i++)
<div class="flex flex-col sm:flex-row items-center p-4 bg-primary rounded-lg shadow-lg max-w-full">
    <img
      class="w-64 h-36 rounded-lg object-cover"
      src="{{ asset('assets/images/landscape_dummy.jpg') }}"
      alt="Game Thumbnail"
    />
  
    <div class="text-center sm:text-start sm:ms-8 mt-4 sm:mt-0">
      <h2 class="text-lg font-semibold text-white">Horizon Zero Dawn</h2>
      <p class="text-sm text-strike">Purchased on - 1 November 2024</p>
    </div>
  </div>
  
@endfor