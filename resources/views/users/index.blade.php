<x-app-layout>
    <x-slot:title>Master User</x-slot:title>
    <x-table title="User Tabel">
        <x-slot:data>
            @include('users.data-table')
        </x-slot:data>
    </x-table>
</x-app-layout>