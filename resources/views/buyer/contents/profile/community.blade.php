@for($i = 0; $i < 4; $i++)
<div class="flex flex-col sm:flex-row items-center p-3 bg-primary rounded-lg shadow-md max-w-full hover:scale-[0.98] transition">
  <img
    class="w-32 h-32 rounded-lg object-cover"
    src="{{ asset('storage/' . $community->landscape_image_path) }}"
    alt="Game Thumbnail" />
    <div class="text-center sm:text-start sm:ms-8 mt-4 sm:mt-0">
      <h2 class="text-base font-semibold text-white">{{ $community->name }}</h2>
      <p class="text-sm text-strike">Joined on - 31 November 2024</p>
    </div>
  </div>
  @endfor