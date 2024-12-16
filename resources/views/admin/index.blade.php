<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gary-800 leding-tight">
            {{__('Одмин панель')}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class=" max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($reports as $report)
                    <p>{{$report->created_at}}</p>
                    <p>{{$report->user->fullName()}}</p>
                    <p>{{$report->number}}</p>
                    <p>{{$report->descr}}</p>
                    @if ($report->status_id == 1)
                        <form action="{{route('reports.update')}}" id="form-update-{{$report->id}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="id" value="{{$report->id}}">
                            <select name="status_id" onchange="document.getElementById('form-update-{{$report->id}}').submit()">
                                @foreach ($statuses as $status)
                                    <option value="{{$status->id}}">{{$status->name}}</option>
                                @endforeach
                            </select>
                        </form>
                        @else
                        <p>{{$report->status->name}}</p>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>