<x-layout.app>
    <x-container>
        <x-card title="Edit link :: id {{ $link->id }}">
            <x-form :route="route('links.edit', $link)" put id="form">
                <x-input name="link" placeholder="Link" value="{{ old('link', $link->link) }}" />
                <x-input name="name" type="name" placeholder="Name" value="{{ old('name', $link->name) }}"/>
            </x-form>
            <x-slot:actions>
                <x-a :href="route('dashboard')">Cancel</x-a>
                <x-button form="form" type="submit">Update link</x-button>
            </x-slot:actions>
        </x-card>
    </x-container>
</x-layout.app>