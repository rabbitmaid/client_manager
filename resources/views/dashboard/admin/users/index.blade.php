<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        
        <flux:heading size="xl" level="1">All Users</flux:heading>
        <flux:subheading size="lg" class="mb-6">Here's what's new today</flux:subheading>
        <flux:separator variant="subtle" />


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            <table class="dt-table display" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Email Verification</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
    
                    @isset($users)
    
                    @foreach($users as $user)
                        
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->hasRole(\App\Helpers\Roles::ADMINISTRATOR))
                                    <flux:badge color="lime" class="uppercase text-xs">Admin</flux:badge>
                                @endif
    
                                @if($user->hasRole(\App\Helpers\Roles::CLIENT))
                                    <flux:badge color="orange" class="uppercase text-xs">Client</flux:badge>
                                @endif
    
                                @if($user->hasRole(\App\Helpers\Roles::STAFF))
                                    <flux:badge color="blue" class="uppercase text-xs">Staff</flux:badge>
                                @endif
                            </td>
                            <td>
                                @if($user->email_verified_at == NULL)
                                    <flux:badge color="red" class="uppercase text-xs">Not Verified</flux:badge>
                                @else 
                                    <flux:badge color="green" class="uppercase text-xs">Verified</flux:badge>
                                @endif
                            </td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                            <td>
                                <flux:dropdown>
                                    <flux:button icon-trailing="chevron-down">
                                        <flux:icon.adjustments-horizontal />
                                    </flux:button>

                                    <flux:menu>
                                        <flux:menu.item href="#"  icon="pencil" class="cursor-pointer">Edit</flux:menu.item>
                                        <flux:menu.separator />
                                        <flux:menu.item href="#" variant="danger" icon="trash" class="cursor-pointer">Delete</flux:menu.item>
                                    </flux:menu>
                                </flux:dropdown>
                            </td>
                        </tr>
    
                        
                    @endforeach
    
                @endisset
                   
            
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Email Verification</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            
        </div>


    </div>
</x-layouts.app>
