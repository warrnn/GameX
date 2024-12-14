@extends('admin.base')

@section('content')
<section class="h-screen mx-8 lg:mx-20 mt-14">
    <div class="flex">
        <h1 class="text-4xl font-bold text-white text-center sm:text-start mx-auto lg:mx-0">Users</h1>
    </div>
    <div class="overflow-x-auto bg-primary rounded-lg p-4 mt-4 shadow-lg">
        <table id="adminTableUser" class="text-white stripe hover row-border order-column">
            <tbody>
                @foreach($data['users'] as $user)
                    <tr>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>
                            <button>
                                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                    Click Me
                                  </button>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">No users found.</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</section>
@endsection