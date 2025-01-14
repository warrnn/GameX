@extends('buyer.base')

@section('content')
@if (session('success'))
<script>
  Swal.fire({
    icon: 'success',
    title: '{{ session('
    success ') }}',
    confirmButtonColor: '#8B1E3F',
  })
</script>
@endif
@if (session('info'))
<script>
  Swal.fire({
    icon: 'info',
    title: '{{ session('
    info ') }}',
    confirmButtonColor: '#8B1E3F',
  })
</script>
@endif
@if (session('error'))
<script>
  Swal.fire({
    icon: 'error',
    title: '{{ session('
    error ') }}',
    confirmButtonColor: '#8B1E3F',
  })
</script>
@endif

<section class="max-w-4xl mx-auto p-8">
  <section class="flex flex-col lg:flex-row items-center justi space-x-6">
    <button class="flex justify-center relative group bg-white rounded-full">
      <img alt="User avatar" src="https://avatar.iran.liara.run/public/17"
        class="h-48 w-48 rounded-full transition-all duration-300 ease-in-out group-hover:opacity-0" />
      <img alt="Hover icon"
        src="https://static.vecteezy.com/system/resources/previews/026/703/358/non_2x/illustration-of-change-image-icon-in-dark-color-and-white-background-vector.jpg"
        class="h-48 w-48 rounded-full absolute top-0 left-0 transition-all duration-300 ease-in-out opacity-0 group-hover:opacity-100 scale-75" />
    </button>

    <div>
      <div class="flex mt-4 lg:mt-0">
        <div class="flex mx-auto lg:mx-0">
          <h1 class="text-2xl font-bold text-white">
            {{ $current_user->name }}
          </h1>
          <button class="ms-2" onclick="my_modal_5.showModal()">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="24" height="24"
              viewBox="0 0 24 24">
              <path fill="currentColor" d="m18.988 2.012l3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287l-3-3L8 13z" />
              <path fill="currentColor"
                d="M19 19H8.158c-.026 0-.053.01-.079.01c-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2z" />
            </svg>
          </button>
          @include('buyer.includes.change_name_modal')
        </div>
      </div>


      <div class="flex flex-col lg:flex-row items-center space-y-2 lg:space-y-0 lg:space-x-4 mt-2 text-white">
        <div class="flex items-center space-x-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 640 512">
            <path fill="currentColor"
              d="M192 64C86 64 0 150 0 256s86 192 192 192h256c106 0 192-86 192-192S554 64 448 64zm304 104a40 40 0 1 1 0 80a40 40 0 1 1 0-80M392 304a40 40 0 1 1 80 0a40 40 0 1 1-80 0M168 200c0-13.3 10.7-24 24-24s24 10.7 24 24v32h32c13.3 0 24 10.7 24 24s-10.7 24-24 24h-32v32c0 13.3-10.7 24-24 24s-24-10.7-24-24v-32h-32c-13.3 0-24-10.7-24-24s10.7-24 24-24h32z" />
          </svg>
          <span>
            {{ $games_count }} Games
          </span>
        </div>
        <div class="flex items-center space-x-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <g fill="currentColor">
              <path fill-rule="evenodd"
                d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0a3.75 3.75 0 0 1-7.5 0m7.5 3a3 3 0 1 1 6 0a3 3 0 0 1-6 0m-13.5 0a3 3 0 1 1 6 0a3 3 0 0 1-6 0m4.06 5.368A6.75 6.75 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498a.75.75 0 0 1-.372.568A12.7 12.7 0 0 1 12 21.75a12.7 12.7 0 0 1-6.337-1.684a.75.75 0 0 1-.372-.568a6.8 6.8 0 0 1 1.019-4.38"
                clip-rule="evenodd" />
              <path
                d="m5.082 14.254l-.036.055a8.3 8.3 0 0 0-1.271 5.08a9.7 9.7 0 0 1-1.765-.44l-.115-.04a.56.56 0 0 1-.373-.487l-.01-.121Q1.5 18.15 1.5 18a3.75 3.75 0 0 1 3.582-3.746m15.144 5.135a8.3 8.3 0 0 0-1.308-5.135a3.75 3.75 0 0 1 3.57 4.047l-.01.121a.56.56 0 0 1-.373.486l-.115.04q-.851.302-1.764.441" />
            </g>
          </svg>
          <span>
            {{ $communities_count }} Communities
          </span>
        </div>
      </div>

      <div class="flex items-center space-x-4 mt-4 lg:mt-12">
        <button class="bg-teritary text-white px-3 py-1 rounded hover:bg-accent transition"
          onclick="edit_data_modal.showModal()">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path fill="currentColor"
              d="m9.25 22l-.4-3.2q-.325-.125-.612-.3t-.563-.375L4.7 19.375l-2.75-4.75l2.575-1.95Q4.5 12.5 4.5 12.338v-.675q0-.163.025-.338L1.95 9.375l2.75-4.75l2.975 1.25q.275-.2.575-.375t.6-.3l.4-3.2h5.5l.4 3.2q.325.125.613.3t.562.375l2.975-1.25l2.75 4.75l-2.575 1.95q.025.175.025.338v.674q0 .163-.05.338l2.575 1.95l-2.75 4.75l-2.95-1.25q-.275.2-.575.375t-.6.3l-.4 3.2zm2.8-6.5q1.45 0 2.475-1.025T15.55 12t-1.025-2.475T12.05 8.5q-1.475 0-2.488 1.025T8.55 12t1.013 2.475T12.05 15.5" />
          </svg>
        </button>
        @include('buyer.includes.edit_data_modal')
        </dialog>
        @if ($isSeller)
        <a href="{{ route('seller.sellGames') }}"
          class="bg-teritary text-white px-3 py-1 rounded hover:bg-accent transition">
          Seller Mode
        </a>
        @else
        <button onclick="modal_seller_register.showModal()"
          class="bg-teritary text-white px-3 py-1 rounded hover:bg-accent transition">
          Register As Seller
        </button>
        @include('buyer.includes.seller_regist_modal')
        @endif
        <a href="{{ route('buyer.logout') }}"
          class="bg-teritary text-white px-3 py-1 rounded hover:bg-red-600 transition text-center">
          Log Out
        </a>
      </div>
    </div>
  </section>

  {{-- Tabs --}}
  <section class="mt-4">
    <div class="flex justify-center lg:justify-start mb-4">
      <ul class="flex flex-wrap justify-center -mb-px text-sm font-medium text-center" id="default-styled-tab"
        data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-accent border-accent"
        data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
        role="tablist">
        <li class="me-2" role="presentation">
          <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-styled-tab"
            data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile"
            aria-selected="false">Owned Games</button>
        </li>
        <li class="me-2" role="presentation">
          <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
            id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab"
            aria-controls="dashboard" aria-selected="false">Joined Communities</button>
        </li>
        <li class="me-2" role="presentation">
          <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
            id="settings-styled-tab" data-tabs-target="#styled-settings" type="button" role="tab"
            aria-controls="settings" aria-selected="false">Physical Game History</button>
        </li>
      </ul>
    </div>
    <div id="default-styled-tab-content">
      <div class="hidden p-4 rounded-lg drop-shadow-lg space-y-4" id="styled-profile" role="tabpanel"
        aria-labelledby="profile-tab">
        @if (isset($digital_games) && $digital_games->isNotEmpty())
        @foreach ($digital_games as $game)
        <div
          class="flex flex-col sm:flex-row items-center p-4 bg-primary rounded-lg shadow-lg max-w-full hover:scale-[0.98] transition">
          <img class="w-64 h-36 rounded-lg object-cover" src="{{ asset('storage/' . $game->landscape_image_path) }}"
            alt="Game Thumbnail" />

          <div class="text-center sm:text-start sm:ms-8 mt-4 sm:mt-0">
            <h2 class="text-lg font-semibold text-white">{{ $game->name }}</h2>
            <p class="text-sm text-strike">Purchased on {{ \Carbon\Carbon::parse($game->owned_date)->format('d F Y') }}</p>
          </div>
        </div>
        @endforeach
        @else
        <p>No games available.</p>
        @endif
      </div>
      <div class="hidden p-4 rounded-lg drop-shadow-lg space-y-4" id="styled-dashboard" role="tabpanel"
        aria-labelledby="dashboard-tab">
        @if (isset($communities) && $communities->isNotEmpty())
        @foreach ($communities as $community)
        <div
          class="flex flex-col sm:flex-row items-center p-3 bg-primary rounded-lg shadow-md max-w-full hover:scale-[0.98] transition">
          <img class="w-32 h-32 rounded-lg object-cover"
            src="{{ asset('storage/' . $community->image_path) }}" alt="Game Thumbnail" />
          <div class="text-center sm:text-start sm:ms-8 mt-4 sm:mt-0">
            <h2 class="text-base font-semibold text-white">{{ $community->name }}</h2>
            <p class="text-sm text-strike">Joined on {{ \Carbon\Carbon::parse($community->join_date)->format('d F Y') }}</p>
          </div>
        </div>
        @endforeach
        @else
        <p>No Communities Joined.</p>
        @endif
      </div>
      <div class="hidden p-4 rounded-lg drop-shadow-lg space-y-4" id="styled-settings" role="tabpanel"
        aria-labelledby="settings-tab">
        @if (isset($physical_games) && $physical_games->isNotEmpty())
        @foreach($physical_games as $game)
        <div tabindex="0" class="collapse bg-primary text-white">
          <div class="collapse-title text-xl font-medium">
            <h3>{{ $game->name }}</h3>
            @if($game->status == 'PROCESS')
            <p class="text-blue-500">PROCESS</p>
            @elseif($game->status == 'SUCCESS')
            <p class="text-green-500">SUCCESS</p>
            @elseif($game->status == 'DELIVERY')
            <p class="text-yellow-500">DELIVERY</p>
            @elseif($game->status == 'FAILED')
            <p class="text-red-500">FAILED</p>
            @endif
          </div>
          <div class="collapse-content mx-4 space-y-4">
            <div>
              <h4 class="font-semibold text-lg mb-1">Seller</h4>
              <p>Name : {{ $game->seller_name }}</p>
              <p>Domicile : {{ $game->domicile }}</p>
              <p>Address : {{ $game->address }}</p>
            </div>
            <div>
              <h4 class="font-semibold text-lg mb-1">Buyer</h4>
              <p>Name : {{ $buyer_for_transactions->where('game_id', $game->id)->first()->buyer_name }}</p>
              <p>Domicile : {{ $buyer_for_transactions->where('game_id', $game->id)->first()->domicile }}</p>
              <p>Address : Jl. {{ $buyer_for_transactions->where('game_id', $game->id)->first()->address }}</p>
            </div>
            <div>
              <h4 class="font-semibold text-lg mb-1">Detail</h4>
              @if ($game->shipping_number)
              <p>Shipping Number : {{ $game->shipping_number }}</p>
              @else
              <p>Shipping Number : -</p>
              @endif
              <p>Items : {{ $game->name }}</p>
              <p>Transaction Date : {{ \Carbon\Carbon::parse($game->transaction_date)->format('d F Y') }}</p>
            </div>
          </div>
        </div>
        @endforeach
        @else
        <p>No Physical Games Purchased.</p>
        @endif
      </div>
    </div>
  </section>
</section>
@endsection