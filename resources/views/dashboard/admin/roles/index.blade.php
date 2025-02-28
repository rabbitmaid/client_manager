<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        
        <flux:heading size="xl" level="1">All Roles</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage all existing roles</flux:subheading>
        <flux:separator variant="subtle" />


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            <table class="dt-table display" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
    
                    @isset($roles)
    
                    @foreach($roles as $role)
                        
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->created_at->diffForHumans() }}</td>         
                            <td>
                           
                                    <flux:dropdown>
                                    
                                            <flux:button icon-trailing="chevron-down"  class="cursor-pointer">
                                                <flux:icon.adjustments-horizontal />
                                            </flux:button>
                                
                                    
                                            <flux:menu>
                                                <flux:menu.item href="{{ route('admin.dashboard.roles.permission', $role->id) }}"  icon="key" class="cursor-pointer">Permissions</flux:menu.item>
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
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            
        </div>


    </div>
</x-layouts.app>
