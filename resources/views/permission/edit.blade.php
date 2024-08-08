<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Permission / Edit') }}
            </h2>
            <a href="{{ route('permissions.index') }}"
                class="bg-slate-700 text-sm rounded-md px-3 text-white py-4">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('permission.update', $permission->id) }}" method="post">
                        @csrf
                        <div>
                            <label for="" class="text-sm font-medium">Name</label>
                            <div class="mb-3">
                                <input type="text" value="{{ old('name', $permission->name) }}"
                                    placeholder="Enter Name" class="border-gray-300 shadow-sm w-1/2 rounded-lg"
                                    name="name">
                                @error('name')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit"
                                class="bg-slate-700 text-sm rounded-md px-5 text-white py-4">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
