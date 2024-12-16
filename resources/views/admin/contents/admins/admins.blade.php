@extends('admin.base')

@section('content')
<!-- @if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session('success') }}',
        confirmButtonColor: '#8B1E3F',
    })
</script>
@endif
@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: '{{ session('error') }}',
        confirmButtonColor: '#8B1E3F',
    })
</script>
@endif -->

<section class="h-screen mx-8 lg:mx-20 mt-14">
  <div class="flex">
    <h1 class="text-4xl font-bold text-white text-center sm:text-start mx-auto lg:mx-0">Master Data of Admins</h1>
  </div>
  <div class="mt-4 flex">
    <button class="bg-teritary text-white px-3 py-2 rounded-lg mx-auto lg:mx-0" onclick="add_admin_modal.showModal()">
      Add Admin +
    </button>
    @include('admin.includes.add_admin_modal')
  </div>
  <div class="overflow-x-auto bg-primary rounded-lg p-4 mt-4 shadow-lg">
    <table id="adminTableAdmin" class="text-white stripe hover row-border order-column">
      <tbody>
        @foreach ($admins as $admin)
        <tr>
          <td>{{ $admin->user_id }}</td>
          <td>{{ $admin->name }}</td>
          <td>{{ $admin->email }}</td>
          <td>
            <div class="flex space-x-2">
              <form action="{{ route('admin.deleteAdmin', $admin->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 text-white bg-teritary hover:bg-red-600 rounded shadow">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                  </svg>
                </button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>
  </div>
</section>
@endsection