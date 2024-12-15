<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gary-800 leding-tight">
            {{__('Список заявлений')}}
        </h2>
    </x-slot>
    <div class="py-12">
        <x-nav-link :href="route('reports.create')">
            {{__('СОздать заявление')}}
        </x-nav-link>
        <div class=" max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($reports as $report)
                    <p>{{$report->created_at}}</p>
                    <p>{{$report->number}}</p>
                    <p>{{$report->descr}}</p>
                    <p>{{$report->status->name}}</p>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>