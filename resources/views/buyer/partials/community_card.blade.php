@foreach ($communities as $community)
<a href="{{ route('buyer.detailCommunity', $community->id) }}" class="mt-5 w-fit hover:scale-[0.98] transition text-center" data-aos="fade-up">
    <img src="{{ asset('storage/' . $community->image_path) }}" alt="{{ $community->name }}" class="size-44 object-cover rounded-lg">
    <h1 class="text-white mt-5">{{ $community->name }}</h1>
    <p>{{ $community->member_count }} Members</p>
</a>
@endforeach
@if($communities->isEmpty())
<h1 class="text-strike mt-5 text-lg py-64">No Communities Found</h1>
@endif