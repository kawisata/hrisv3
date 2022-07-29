<div>
    <div>
        @if($updateMode)
            @include('livewire.user.user-family-update')
        @else
            @include('livewire.user.user-family-create')
        @endif
    </div>
    <div class="mt-3 text-xs md:text-sm overflow-x-auto">
        @include('livewire.user.user-family-table')
    </div>
    @if($isOpen1)
        @include('livewire.user.add-user-family')
    @endif
</div>
