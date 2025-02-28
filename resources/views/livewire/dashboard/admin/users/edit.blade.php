<section>

    <section class="mb-10">
        <flux:heading size="lg" level="3" class="mb-5">Edit User Details</flux:heading>

        <form wire:submit.prevent='update({{ $id }})'>
            <flux:field class="mb-5">
                <flux:input label="Name" wire:model="name" placeholder="John Smith" />
            </flux:field>
        
            <flux:field class="mb-5">
                    <flux:label>Email</flux:label>
                    <flux:input wire:model="email" type="email" placeholder="example@email.com" />
                    <flux:error name="email" />
            </flux:field>

            <flux:field class="mb-8">
                <flux:select label="Account" wire:model='is_active'>

                    <option value="active" {{ $is_active == 'active' ? 'selected': '' }}>Active</option>
                    <option value="not_active" {{ $is_active == 'not_active' ? 'selected': '' }}>Not Active</option>
                    
                </flux:select>
            </flux:field>
    
        
            <flux:button variant="primary" type="submit" class="block uppercase text-xs font-semibold tracking-widest cursor-pointer">Update</flux:button>
        
        </form>
    
    </section>


    <flux:separator variant="subtle" class="mb-5" />


    <section>

        <flux:heading size="lg" level="3" class="mb-5">Change Password</flux:heading>

        <form wire:submit.prevent='changePassword({{ $id }})'>

            <flux:field class="mb-5">
                    <flux:label>New Password</flux:label>
                    <flux:input type="password" wire:model='password' />
                    <flux:error name="password" />
            </flux:field>
        
            <flux:field class="mb-5">
                <flux:label>Confirm Password</flux:label>
                <flux:input type="password" wire:model='password_confirmation' />
                <flux:error name="password_confirmation" />
            </flux:field>
        
            <flux:button variant="primary" type="submit" class="block uppercase text-xs font-semibold tracking-widest cursor-pointer">Change Password</flux:button>
        
        </form>
    </section>

</section>