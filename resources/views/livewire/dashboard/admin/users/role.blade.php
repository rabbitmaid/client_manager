<section>

    @foreach ($savedRoles as $savedRole)
        @if(in_array($savedRole->name, $roles))
            
            @if($savedRole->name === \App\Helpers\Roles::ADMINISTRATOR)
                <flux:switch wire:model.live="{{ $savedRole->name }}" wire:change="setAdministrator" label="{{ strtoupper( $savedRole->name ) }}"  align="left" class="mb-3" checked />
            @endif

            @if($savedRole->name === \App\Helpers\Roles::CLIENT)
                <flux:switch wire:model.live="{{ $savedRole->name }}" wire:change="setClient" label="{{ strtoupper( $savedRole->name ) }}"  align="left" class="mb-3" checked />
            @endif

            @if($savedRole->name === \App\Helpers\Roles::STAFF)
                <flux:switch wire:model.live="{{ $savedRole->name }}" wire:change="setStaff" label="{{ strtoupper( $savedRole->name ) }}"  align="left" class="mb-3" checked />
            @endif

        @else

             @if($savedRole->name === \App\Helpers\Roles::ADMINISTRATOR)
                <flux:switch wire:model.live="{{ $savedRole->name }}" wire:change="setAdministrator" label="{{ strtoupper( $savedRole->name ) }}"  align="left" class="mb-3" />
            @endif

            @if($savedRole->name === \App\Helpers\Roles::CLIENT)
                <flux:switch wire:model.live="{{ $savedRole->name }}" wire:change="setClient" label="{{ strtoupper( $savedRole->name ) }}"  align="left" class="mb-3" />
            @endif

            @if($savedRole->name === \App\Helpers\Roles::STAFF)
                <flux:switch wire:model.live="{{ $savedRole->name }}" wire:change="setStaff" label="{{ strtoupper( $savedRole->name ) }}"  align="left" class="mb-3" />
            @endif

        @endif
    @endforeach

</section>
