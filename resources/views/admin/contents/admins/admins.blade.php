@extends('admin.base')

@section('content')
  <section class="h-screen mx-8 lg:mx-20 mt-14">
    <div class="flex">
      <h1 class="text-4xl font-bold text-white text-center sm:text-start mx-auto lg:mx-0">Master Data of Admins</h1>
    </div>
    <div class="mt-4 flex">
      <button class="bg-teritary text-white px-3 py-2 rounded-lg mx-auto lg:mx-0">
        Add Admin +
      </button>
    </div>
    <div class="overflow-x-auto bg-primary rounded-lg p-4 mt-4 shadow-lg">
      <table id="adminTableAdmin" class="text-white stripe hover row-border order-column">
        <tbody>
          @foreach ($admins as $admin)
            <tr>
              <td>{{ $admin['user_id'] }}</td>
              <td>{{ $admin['address'] }}</td>
              <td>{{ $admin['phone'] }}</td>
              <td>
                <div class="flex space-x-2">
                  <button class="px-4 py-2 text-white bg-green-500 hover:bg-green-600 rounded shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                      <g fill="none" fill-rule="evenodd">
                        <path
                              d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                        <path fill="currentColor"
                              d="M21.546 5.111a1.5 1.5 0 0 1 0 2.121L10.303 18.475a1.6 1.6 0 0 1-2.263 0L2.454 12.89a1.5 1.5 0 1 1 2.121-2.121l4.596 4.596L19.424 5.111a1.5 1.5 0 0 1 2.122 0" />
                      </g>
                    </svg>
                  </button>
                  <button class="px-4 py-2 text-white bg-red-500 hover:bg-red-600 rounded shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                      <path fill="currentColor"
                            d="M3.64 2.27L7.5 6.13l3.84-3.84A.92.92 0 0 1 12 2a1 1 0 0 1 1 1a.9.9 0 0 1-.27.66L8.84 7.5l3.89 3.89A.9.9 0 0 1 13 12a1 1 0 0 1-1 1a.92.92 0 0 1-.69-.27L7.5 8.87l-3.85 3.85A.92.92 0 0 1 3 13a1 1 0 0 1-1-1a.9.9 0 0 1 .27-.66L6.16 7.5L2.27 3.61A.9.9 0 0 1 2 3a1 1 0 0 1 1-1c.24.003.47.1.64.27" />
                    </svg>
                  </button>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>

      </table>
    </div>
  </section>
@endsection
