<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Главная
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Название олимпиады
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Описание
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Дата создания
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Количество зарегистрированных участников
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Страница олимпиады
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($olympiads as $olympiad)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $olympiad->title }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $olympiad->description }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $olympiad->created_at }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $olympiad->applications->count() }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('dashboard.show', $olympiad->id)  }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Регистрация</a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>





            </div>
        </div>
    </div>
</x-app-layout>
