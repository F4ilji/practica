<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-white">



            <h1 class="font-bold text-4xl">{{ $olympiad->title }}</h1>

            <hr class="mt-6 mb-6">

            <p class="text-xl mb-10">{{ $olympiad->description }}</p>


            @if($olympiad->applications->contains(auth()->user()))

                <form action="{{ route('application.delete', $olympiad) }}" method="post">
                    @csrf
                    @method('delete')
                    <input class="text-xl border py-3 px-10 rounded-full hover:text-[#131826] duration-200 hover:bg-white" type="submit" value="Убрать заявку">
                </form>

            @else



                <form action="{{ route('application.store') }}" method="post">
                    @csrf

                    <input value="{{ $olympiad->id }}" name="olympiad_id" type="hidden">
                    <input class="text-xl border py-3 px-10 rounded-full hover:text-[#131826] duration-200 hover:bg-white" type="submit" value="Записаться">
                </form>



            @endif



















        </div>
    </div>
</x-app-layout>
