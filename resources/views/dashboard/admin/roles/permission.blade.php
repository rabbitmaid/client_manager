<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        
        <flux:heading size="xl" level="1">All Permissions for the {{ ucwords($role->name) }} role</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage all permissions for this role</flux:subheading>
        <flux:separator variant="subtle" />

        <div class="grid grid-cols-3 gap-x-7">
            <div class="relative overflow-x-auto">

                <flux:heading size="lg" level="3" class="mb-5">User Management</flux:heading>

                @foreach ($userPermissions as $permission)
                        {{-- Check if the permission is in rolePermissions --}}
                        @php
                            $rolePermissionNames = $rolePermissions->pluck('name')->toArray(); 
                            $isChecked = in_array($permission->name, $rolePermissionNames);
    
                        @endphp
    
                        @if($isChecked)
                            <flux:switch wire:model.live="{{ $permission->name }}" label="{{ $permission->name }}" align="left" class="mb-5" checked />
                        @else
                            <flux:switch wire:model.live="{{ $permission->name }}" label="{{ $permission->name }}" align="left" class="mb-5"  />
                        @endif
               
                @endforeach
    
            </div>
         
        </div>


    </div>
</x-layouts.app>
