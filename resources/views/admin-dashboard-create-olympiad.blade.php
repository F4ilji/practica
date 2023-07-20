<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Панель администратора
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <form class="text-white" action="{{ route('olympiad.store') }}" method="POST">
                @csrf


                <h1 class="mt-5 text-2xl mb-6 font-bold">Создать олимпиаду</h1>

                <input required class="block w-1/3 mb-3 bg-gray-200 rounded text-black" placeholder="Название" type="text" name="title" id="">
                <textarea required class="block w-1/3 mb-3 bg-gray-200 rounded text-black" placeholder="Описание" name="description" id="" cols="30" rows="10"></textarea>
                <input class="py-2 px-5 border rounded-lg hover:bg-gray-700 duration-200" type="submit" value="Создать">
            </form>

        </div>
    </div>
</x-app-layout>
