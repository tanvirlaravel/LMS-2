<form wire:submit.prevent="formSubmit">
    <div class="mb-4">
        <label for="name" class="lms-label">Name</label>
        <input wire:model.lazy="name" id="name" type="text" class="lms-input">

        @error('name')
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>

    <h3 class="font-semibold">Permissions</h3>
    <div class="flex mb-2 -mx-4 flex-warp">
        @foreach ($permissions as $permission)
            <div class="w-1/3 px-4 mb-4">
                <label class="inline-flex items-center">
                    <input wire:model.lazy="selectedPermissions" type="checkbox" class="form-checkbox"
                        value="{{ $permission->name }}">
                    <span class="ml-2">{{ $permission->name }}</span>
                </label>
            </div>
        @endforeach

    </div>

    @error('selectedPermissions')
        <div class="mt-2 mb-4 text-sm text-red-500">{{ $message }}</div>
    @enderror

    @include('components.wire-loading-btn')
</form>
