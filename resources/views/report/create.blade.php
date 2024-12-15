<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gary-800 leding-tight">
            {{__('Создание нового заявления')}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class=" max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('reports.store')}}">
                    @csrf
                    <div>
                        <x-input-label for="number" :value="__('Номер автомобиля')"/>
                        <x-text-input id="number" class="block mt-1" type="text" name="number" required/>
                        <x-input-error :messages="$errors->get('number')" class="mt-2"/>
                    </div>
                    <div>
                        <x-input-label for="descr" :value="__('Номер автомобиля')"/>
                        <x-text-input id="descr" class="block mt-1" rows="10" cols="35" name="descr"/>
                        <x-input-error :messages="$errors->get('descr')" class="mt-2"/>
                    </div>
                    <div>
                        <x-primary-button class="ms-3">
                            {{__('Создать')}}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>