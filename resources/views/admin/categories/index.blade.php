@extends('admin.layouts.app')

@section('title', 'Categories')

@section('content')

<div class="flex justify-between items-center mb-6">

    <h1 class="text-2xl font-bold">
        Categories
    </h1>

    <a href="{{ route('admin.categories.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded">
        Create Category
    </a>

</div>


<div class="bg-white rounded shadow overflow-hidden">

    <table class="w-full text-right">

        <thead class="bg-gray-100">
            <tr>
                <th class="p-4">Image</th>
                <th class="p-4">Name</th>
                <th class="p-4">Status</th>
                <th class="p-4">Actions</th>
            </tr>
        </thead>


        <tbody>

        @forelse($categories as $category)

            <tr class="border-b">

                <td class="p-4">

                    @if($category->image)

                        <img src="{{ asset('storage/'.$category->image) }}"
                             class="w-12 h-12 rounded object-cover">

                    @else

                        <span>
                            No Image
                        </span>

                    @endif

                </td>


                <td class="p-4">
                    {{ $category->name }}
                </td>


                <td class="p-4">

                    @if($category->status)

                        <span class="text-green-600">
                            Active
                        </span>

                    @else

                        <span class="text-red-600">
                            Inactive
                        </span>

                    @endif

                </td>


                <td class="p-4 flex gap-2">

                    <a href="{{ route('admin.categories.edit', $category) }}"
                       class="bg-yellow-500 text-white px-3 py-1 rounded">
                        Edit
                    </a>


                    <form action="{{ route('admin.categories.destroy', $category) }}"
                          method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="bg-red-600 text-white px-3 py-1 rounded">
                            Delete
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="4" class="p-4 text-center">
                    No categories found
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>


<div class="mt-5">
    {{ $categories->links() }}
</div>


@endsection