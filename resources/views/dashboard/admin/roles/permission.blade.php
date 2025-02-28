<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        
        <flux:heading size="xl" level="1">All Permissions for the {{ ucwords($role->name) }} role</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage all permissions for this role</flux:subheading>
        <flux:separator variant="subtle" />

        <livewire:dashboard.admin.roles.permission :id="$role->id" />

    </div>
</x-layouts.app>
