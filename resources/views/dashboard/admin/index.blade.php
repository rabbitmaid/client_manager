<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <flux:heading size="xl" level="1">Overview</flux:heading>
        <flux:subheading size="lg" class="mb-6">Welcome to Client Manager</flux:subheading>
        <flux:separator variant="subtle" />

        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 px-8 py-5">
                <flux:heading size="lg" level="3">Total Admins</flux:heading>
                <flux:subheading size="lg" class="mb-6">Number of existing administrators</flux:subheading>
                <flux:heading size="xl" class="mb-1">{{ $totalAdmins ?? 0 }}</flux:heading>
            </div>
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 px-8 py-5">
                {{-- <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" /> --}}

                <flux:heading size="lg" level="3">Total Staffs</flux:heading>
                <flux:subheading size="lg" class="mb-6">Number of existing staffs</flux:subheading>
                <flux:heading size="xl" class="mb-1">{{ $totalStaffs ?? 0 }}</flux:heading>
                
            </div>
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 px-8 py-5">
                <flux:heading size="lg" level="3">Total Clients</flux:heading>
                <flux:subheading size="lg" class="mb-6">Number of existing clients</flux:subheading>
                <flux:heading size="xl" class="mb-1">{{ $totalClients ?? 0 }}</flux:heading>
            </div>
        </div>
       {{--  <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
        </div> --}}
    </div>
</x-layouts.app>
