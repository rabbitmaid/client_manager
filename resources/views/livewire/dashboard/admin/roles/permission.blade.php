<div class="grid grid-cols-3 gap-x-7">
    <div class="relative overflow-x-auto">

        <flux:heading size="lg" level="3" class="mb-5">User Management</flux:heading>

        @foreach ($userPermissions as $permission)
                {{-- Check if the permission is in rolePermissions --}}
                @php
                    $rolePermissionNames = $rolePermissions->pluck('name')->toArray(); 
                    $isChecked = in_array($permission->name, $rolePermissionNames);
                    $dynamicName = str_replace(' ', '_', $permission->name);
                @endphp

                @if($isChecked)
                    <flux:switch wire:model.live="dynamicData.{{ $dynamicName }}" wire:change='setPermission' label="{{ $permission->name }}" align="left" class="mb-5" checked />
                @else
                    <flux:switch wire:model.live="dynamicData.{{ $dynamicName }}" wire:change='setPermission' label="{{ $permission->name }}" align="left" class="mb-5"  />
                @endif
       
        @endforeach

    </div>
 
</div>              