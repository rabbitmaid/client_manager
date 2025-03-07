<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-r border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />


            @if(auth()->user()->hasRole(\App\Helpers\Roles::CLIENT))

                <a href="{{ route('client.dashboard') }}" class="mr-5 flex items-center space-x-2" wire:navigate>
                    <x-app-logo class="size-8" href="#"></x-app-logo>
                </a>

                <flux:navlist variant="outline">
                    <flux:navlist.group heading="Platform" class="grid">
                        <flux:navlist.item icon="home" :href="route('client.dashboard')" :current="request()->routeIs('client.dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                    </flux:navlist.group>
                </flux:navlist>

            @else

                <a href="{{ route('admin.dashboard') }}" class="mr-5 flex items-center space-x-2" wire:navigate>
                    <x-app-logo class="size-8" href="#"></x-app-logo>
                </a>

                <flux:navlist variant="outline">
                    <flux:navlist.group heading="Platform" class="grid">
                        <flux:navlist.item icon="home" :href="route('admin.dashboard')" :current="request()->routeIs('admin.dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                    </flux:navlist.group>
                </flux:navlist>

            @endif

            @can('manage users')

                {{--                 
                    <flux:navlist.group expandable heading="Users" :expanded="request()->routeIs('admin.dashboard.users*')" icon="user-group"  variant="outline">

                        <flux:navlist.item href="{{ route('admin.dashboard.users') }}" icon="user-group"  :current="request()->routeIs('admin.dashboard.users')" wire:navigate>All Users</flux:navlist.item>
                

                        @can('create users')
                            <flux:navlist.item href="{{ route('admin.dashboard.users.create') }}" icon="plus" :current="request()->routeIs('admin.dashboard.users.create')" wire:navigate>Add User</flux:navlist.item>
                        @endcan
                    </flux:navlist.group> 
                --}}

           

            <flux:navlist variant="outline">
                <flux:navlist.group heading="User Management" class="grid">
                    <flux:navlist.item icon="user" :href="route('admin.dashboard.users')" :current="request()->routeIs('admin.dashboard.users')" wire:navigate>{{ __('Users') }}</flux:navlist.item>
                    @can('create users')
                    <flux:navlist.item href="{{ route('admin.dashboard.users.create') }}" icon="plus" :current="request()->routeIs('admin.dashboard.users.create')" wire:navigate>Add User</flux:navlist.item>
                @endcan
                </flux:navlist.group>
            </flux:navlist>


            @endcan



            <flux:navlist variant="outline">
                <flux:navlist.group heading="Roles and Permissions" class="grid">
                    <flux:navlist.item icon="finger-print" :href="route('admin.dashboard.roles')" :current="request()->routeIs('admin.dashboard.roles')" wire:navigate>{{ __('Roles') }}</flux:navlist.item>
                    <flux:navlist.item icon="key" :href="route('admin.dashboard.permissions')" :current="request()->routeIs('admin.dashboard.permissions')" wire:navigate>{{ __('Permissions') }}</flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>




            <flux:spacer />


            <!-- Desktop User Menu -->
            <flux:dropdown position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-left text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item href="/settings/profile" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-left text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item href="/settings/profile" icon="cog" wire:navigate>Settings</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
