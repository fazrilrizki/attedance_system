<x-app-layout>
    <x-slot:title>Master User</x-slot:title>
    <x-table title="User Tabel" createButton>
        <x-slot:data>
            @include('users.data-table')
        </x-slot:data>
    </x-table>
    @include('users._form-create')
</x-app-layout>