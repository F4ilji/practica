<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Панель администратора
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <h1 class="text-3xl font-bold text-white">Заявки на олимпиаду {{ $olympiad->title }}</h1>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Название олимпиады
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Имя участника
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Дата создания заявки
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Действия
                        </th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($applications as $application)


                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $olympiad->title }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $application->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $application->created_at->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4 flex">
                                <form action="{{ route('application.accept', [$olympiad->id, $application->pivot->id]) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <input class="font-medium py-2 px-5 text-blue-600 dark:text-green-500 hover:bg-gray-700 hover:rounded-lg duration-150" type="submit" value="Принять">
                                </form>
                                <form action="{{ route('application.denied', [$olympiad->id, $application->pivot->id]) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <input class="font-medium py-2 px-5 text-blue-600 dark:text-red-500 hover:bg-gray-700 hover:rounded-lg duration-150" type="submit" value="Отклонить">
                                </form>
                            </td>
                        </tr>



                    @endforeach


                    </tbody>
                </table>
            </div>


        </div>
    </div>
</x-app-layout>
