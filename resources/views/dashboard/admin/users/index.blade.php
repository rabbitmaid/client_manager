<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        
        <flux:heading size="xl" level="1">All Users</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage all existing users</flux:subheading>
        <flux:separator variant="subtle" />


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            <table class="dt-table display" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Email Verification</th>
                        <th>Account</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
    
                    @isset($users)
    
                    @foreach($users as $user)
                        
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach($user->getRoleNames() as $role)

                                    @if($role === (\App\Helpers\Roles::ADMINISTRATOR))
                                        <flux:badge color="lime" class="uppercase text-xs">Admin</flux:badge>
                                    @endif
        
                                    @if($role === (\App\Helpers\Roles::CLIENT))
                                        <flux:badge color="orange" class="uppercase text-xs">Client</flux:badge>
                                    @endif
        
                                    @if($role === (\App\Helpers\Roles::STAFF))
                                        <flux:badge color="blue" class="uppercase text-xs">Staff</flux:badge>
                                    @endif
                                    
                                @endforeach
                            </td>
                            <td>
                                @if($user->email_verified_at == NULL)
                                    <flux:badge color="red" class="uppercase text-xs">Not Verified</flux:badge>
                                @else 
                                    <flux:badge color="green" class="uppercase text-xs">Verified</flux:badge>
                                @endif
                            </td>
                            <td>
                                @if($user->is_active == false)
                                    <flux:badge color="red" class="uppercase text-xs">Not Active</flux:badge>
                                @else 
                                    <flux:badge color="green" class="uppercase text-xs">Active</flux:badge>
                                @endif
                            </td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                            <td>
                           
                                    <flux:dropdown>
                                    
                                            <flux:button icon-trailing="chevron-down"  class="cursor-pointer">
                                                <flux:icon.adjustments-horizontal />
                                            </flux:button>
                                
                                    
                                            <flux:menu>
                                                @can('update users')
                                                    <flux:menu.item href="{{ route('admin.dashboard.users.edit', $user->id) }}"  icon="pencil" class="cursor-pointer">Edit</flux:menu.item>
                                                @endcan

                                                <flux:menu.separator />

                                                @can('manage users roles')
                                                
                                                    <flux:menu.item href="{{ route('admin.dashboard.users.role', $user->id) }}" icon="finger-print" class="cursor-pointer">Roles</flux:menu.item>
                                                    
                                                @endcan

                                                <flux:menu.separator />

                                                @can('delete users')
                                                   <livewire:dashboard.admin.users.delete :id="$user->id" />
                                                @endcan
                                                    
                                            </flux:menu>
                                    
                                    </flux:dropdown>
                          
                            </td>
                        </tr>
    
                        
                    @endforeach
    
                @endisset
                   
            
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Email Verification</th>
                        <th>Account</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            
        </div>


    </div>
</x-layouts.app>
