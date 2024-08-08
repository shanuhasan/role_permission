<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Permission') }}
            </h2>
            <a href="{{ route('permission.create') }}"
                class="bg-slate-700 text-sm rounded-md px-3 text-white py-2">Create</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr class="border-b">
                                <th class="px-6 py-3 text-left" width="60">#</th>
                                <th class="px-6 py-3 text-left">Name</th>
                                <th class="px-6 py-3 text-left" width="180">Created At</th>
                                <th class="px-6 py-3 text-center" width="180">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @if ($permissions->isNotEmpty())
                                @foreach ($permissions as $item)
                                    <tr class="border-b">
                                        <td class="px-6 py-3 text-left">{{ $item->id }}</td>
                                        <td class="px-6 py-3 text-left">{{ $item->name }}</td>
                                        <td class="px-6 py-3 text-left">
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('d M y') }}</td>
                                        <td class="px-6 py-3 text-center">
                                            <a href="{{ route('permission.edit', $item->id) }}"
                                                class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">Edit</a>
                                            <a href="javascript:void(0);"
                                                onclick="deletePermission({{ $item->id }})"
                                                class="bg-red-600 text-sm rounded-md text-white px-3 py-2 hover:bg-red-500">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <br />
                    {!! $permissions->links() !!}
                </div>
            </div>
        </div>
    </div>
    <x-slot name="script">
        <script type="text/javascript">
            function deletePermission(id) {
                if (confirm("Are you sure you want to delete?")) {
                    $.ajax({
                        url: "{{ route('permission.destroy') }}",
                        type: "delete",
                        data: {
                            id: id
                        },
                        dataType: "json",
                        headers: {
                            'x-csrf-token': "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            window.location.href = "{{ route('permissions.index') }}";
                        }
                    });
                }
            }
        </script>
    </x-slot>
</x-app-layout>
