@extends('admin.base')

@section('content')
  <section class="h-screen mx-8 lg:mx-20 mt-14">
    <div class="flex">
      <h1 class="text-4xl font-bold text-white text-center sm:text-start mx-auto lg:mx-0">Game Category</h1>
    </div>
    <div class="mt-4 flex">
      <button class="bg-teritary text-white px-3 py-2 rounded-lg mx-auto lg:mx-0">
        Add New Category +
      </button>
    </div>
    <div class="overflow-x-auto bg-primary rounded-lg p-4 mt-4 shadow-lg">
      <table id="adminTableCategory" class="text-white stripe hover row-border order-column">
        <tbody>
          @foreach ($categories as $category)
            <tr>
              <td>{{ $category->name }}</td>
              <td>
                <div class="flex space-x-2">
                  <button class="px-4 py-2 text-white bg-yellow-500 hover:bg-yellow-600 rounded shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                      <path fill="currentColor"
                            d="M20.71 7.04c.39-.39.39-1.04 0-1.41l-2.34-2.34c-.37-.39-1.02-.39-1.41 0l-1.84 1.83l3.75 3.75M3 17.25V21h3.75L17.81 9.93l-3.75-3.75z" />
                    </svg>
                  </button>
                  <button class="px-4 py-2 text-white bg-red-500 hover:bg-red-600 rounded shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                      <path fill="currentColor"
                            d="M19 4h-3.5l-1-1h-5l-1 1H5v2h14M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6z" />
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
