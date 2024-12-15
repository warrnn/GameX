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
    <h1 class="text-4xl font-bold text-white text-center sm:text-start mx-auto lg:mx-0">Seller Account Verification</h1>
  </div>
  <div class="overflow-x-auto bg-primary rounded-lg p-4 mt-4 shadow-lg">
    <table id="adminTableSeller" class="text-white stripe hover row-border order-column">
      <tbody>
        @foreach ($sellers as $seller)
        <tr>
          <td>{{ $seller->name }}</td>
          <td>{{ $seller->email }}</td>
          <td>{{ $seller->domicile }}</td>
          <td>{{ $seller->address }}</td>
          <td>{{ $seller->phone }}</td>
          <td class="{{ $seller->status == 'ACTIVE' ? 'text-green-500' : 'text-red-500' }}">{{ $seller->status }}</td>
          <td>
            @if ($seller->status == 'ACTIVE')
            <div class="tooltip tooltip-left tooltip-success text-white" data-tip="Already Verified">
              <button class="px-4 py-2 text-white bg-teritary rounded shadow" disabled>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                  <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708" />
                </svg>
              </button>
            </div>
            @else
            <form action="{{ route('admin.verifySeller', $seller->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="tooltip tooltip-left tooltip-warning text-white" data-tip="Verify user as seller">
                <button type="submit" class="px-4 py-2 text-white bg-green-500 hover:bg-green-600 rounded shadow">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <g fill="none" fill-rule="evenodd">
                      <path
                        d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                      <path fill="currentColor"
                        d="M21.546 5.111a1.5 1.5 0 0 1 0 2.121L10.303 18.475a1.6 1.6 0 0 1-2.263 0L2.454 12.89a1.5 1.5 0 1 1 2.121-2.121l4.596 4.596L19.424 5.111a1.5 1.5 0 0 1 2.122 0" />
                    </g>
                  </svg>
                </button>
              </div>
            </form>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>
  </div>
</section>
@endsection