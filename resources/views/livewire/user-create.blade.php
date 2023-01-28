<form wire:submit.prevent="submitForm">
    <div class="flex mb-4 -mx-4">
        <div class="flex-1 px-4">
            <label for="name" class="lms-label">Name</label>
            <input wire:model.lazy="name" id="name" type="text" class="lms-input">

            @error('name')
                <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex-1 px-4">
            <label for="email" class="lms-label">Email</label>
            <input wire:model.lazy="email" id="email" type="email" class="lms-input">

            @error('email')
                <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex-1 px-4">
            <label for="password" class="lms-label">Password</label>
            <input wire:model.lazy="password" id="password" type="password" class="lms-input">

            @error('password')
                <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
            @enderror
        </div>
    </div>
    

    <div class="mb-4">
        <label for="role" class="lms-label">Role</label>
        <select wire:model.lazy="role" id="role" class="lms-input">
            <option value="">Select role</option>
            @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>

        @error('role')
        <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>

    @include('components.wire-loading-btn')
</form>
