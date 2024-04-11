<table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
    <thead class="align-bottom">
        <tr>
            <th
                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                Nama</th>
            <th
                class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                Roles</th>
            <th
                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                Status</th>
            <th
                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                Dibuat Pada</th>
            <th
                class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap text-slate-400 opacity-70">
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $user)
            <tr>
                <td
                    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <div class="flex px-2 py-1">
                        <div>
                            <img src="{{ asset('template/assets/img/team-2.jpg') }}"
                                class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-9 w-9 rounded-xl"
                                alt="user1" />
                        </div>
                        <div class="flex flex-col justify-center">
                            <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ $user->name }}
                            </h6>
                            <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                {{ $user->email }}</p>
                        </div>
                    </div>
                </td>
                <td>
                    @foreach ($user->getRoleNames() as $userRoles)
                        <span class="bg-gradient-to-tl from-slate-600 to-slate-300 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">{{ $userRoles }}</span>
                    @endforeach
                </td>
                <td
                    class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <span
                        class="bg-gradient-to-tl {{ $user->is_active ? 'from-emerald-500 to-teal-400' :  'from-slate-600 to-slate-300' }} px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">{{ $user->is_active ? 'Aktif' : 'Tidak Aktif' }}</span>
                </td>
                <td
                    class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <span
                        class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $user->created_at_format }}</span>
                </td>
                <td
                    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <a href="javascript:;"
                        class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">
                        Edit </a>
                </td>
            </tr>
        @empty
            
        @endforelse
    </tbody>
</table>
