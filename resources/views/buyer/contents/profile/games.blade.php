@forelse($games as $game)
  <div class="flex flex-col sm:flex-row items-center p-4 bg-primary rounded-lg shadow-lg max-w-full hover:scale-[0.98] transition">
    <img
      class="w-64 h-36 rounded-lg object-cover"
      src="{{ asset('storage/' . $game->landscape_image_path) }}"
      alt="Game Thumbnail"
    />

    <div class="text-center sm:text-start sm:ms-8 mt-4 sm:mt-0">
      <h2 class="text-lg font-semibold text-white">{{ $game->name }}</h2>
      <p class="text-sm text-strike">Purchased on </p>
    </div>
  </div>
@empty
  <p>No games owned yet.</p>
@endforelse


