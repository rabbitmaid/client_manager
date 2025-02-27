<form wire:submit.prevent='create'>
    <flux:field class="mb-5">
        <flux:input label="Name" wire:model="name" placeholder="John Smith" />
    </flux:field>

    <flux:field class="mb-5">
            <flux:label>Email</flux:label>
            <flux:input wire:model="email" type="email" placeholder="example@email.com" />
            <flux:error name="email" />
    </flux:field>

    <flux:field class="mb-5">
            <flux:label>Password</flux:label>
            <flux:input type="password" wire:model='password' />
            <flux:error name="password" />
            <flux:description>Must be at least 8 characters long, include an uppercase letter, a number, and a special character.</flux:description>
    </flux:field>

    <flux:field class="mb-5">
        <flux:label>Confirm Password</flux:label>
        <flux:input type="password" wire:model='password_confirmation' />
        <flux:error name="password_confirmation" />
    </flux:field>

    <flux:field class="mb-8">
        <flux:select label="Role" wire:model='role'>
            <option selected value="{{ \App\Helpers\Roles::ADMINISTRATOR }}">administrator</option>
            <option value="{{ \App\Helpers\Roles::STAFF }}">staff</option>
            <option value="{{ \App\Helpers\Roles::CLIENT }}">client</option>
        </flux:select>
    </flux:field>

    <flux:button variant="primary" type="submit" class="block uppercase text-xs font-semibold tracking-widest cursor-pointer">Create</flux:button>

</form>