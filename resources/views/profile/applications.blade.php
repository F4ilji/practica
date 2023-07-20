<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Главная
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">


                @foreach($applications as $application)

                    <div class="bg-white dark:bg-gray-800 w-full border rounded-lg text-white mb-4">
                        <div class="py-4 px-10">
                            <h1>Номер заявки #{{ $application->id }}</h1>

                            <h1 class="py-4 text-4xl">{{ $application->olympiad->title }}</h1>




                                @if($application->state === 0)
                                    <div class="border py-2 px-6 inline-block text-white rounded-lg">В рассмотрении</div>

                                @elseif($application->state === 1)
                                    <div class="py-2 px-6 inline-block text-white bg-green-700 rounded-lg">Принятно</div>

                                @elseif($application->state === 2)

                                    <div class="py-2 px-6 inline-block text-white bg-red-700 rounded-lg">Отклонено</div>


                                @endif


                        </div>

                    </div>

                @endforeach



            </div>
        </div>
    </div>
</x-app-layout>
