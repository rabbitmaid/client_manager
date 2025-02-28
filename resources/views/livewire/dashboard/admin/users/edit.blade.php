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
                <flux:select label="Role" wire:model='roles' class="h-auto" multiple>

                    @foreach ($savedRoles as $savedRole)
                        @if(in_array($savedRole->name, $roles))
                            <option selected value="{{ $savedRole->name }}">{{ $savedRole->name }}</option>
                        @else
                            <option value="{{ $savedRole->name }}">{{ $savedRole->name }}</option>
                        @endif
                    @endforeach
                    
                </flux:select>
            </flux:field>
        
            <flux:button variant="primary" type="submit" class="block uppercase text-xs font-semibold tracking-widest cursor-pointer">Update</flux:button>
        
        </form>
    
    </section>


    <section>

        <flux:heading size="lg" level="3" class="mb-5">Change Password</flux:heading>

        <form wire:submit.prevent='changePassword'>
        
            <flux:field class="mb-5">
                    <flux:label>New Password</flux:label>
                    <flux:input type="password" wire:model='password' />
                    <flux:error name="password" />
                    <flux:description>Must be at least 8 characters long, include an uppercase letter, a number, and a special character.</flux:description>
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