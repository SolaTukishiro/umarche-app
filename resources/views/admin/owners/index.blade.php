<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            オーナー一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{--エロクアント
                    @foreach ($e_all as $e_owner)
                        {{$e_owner->name}}
                        {{$e_owner->created_at->diffForHumans()}}
                    @endforeach
                    <br>
                    クエリビルダ
                    @foreach($q_get as $q_owner)
                        {{$q_owner->name}}
                        {{Carbon\carbon::parse($q_owner->created_at)->diffForHumans()}}
                    @endforeach
                    --}}
                    <section class="text-gray-600 body-font">
                    <div class="container px-5 mx-auto">
                        <x-flash-message status="info" />
                        <div class = "flex justify-end mb-4">
                            <button onclick="location.href='{{route('admin.owners.create')}}'" class="flex text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">新規登録する</button>
                        </div>
                        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">name</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">email</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">CreatedDate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($owners as $owner)
                                    <tr>
                                        <td class="px-4 py-3">{{$owner->name}}</td>
                                        <td class="px-4 py-3">{{$owner->email}}</td>
                                        <td class="px-4 py-3">{{$owner->created_at->diffForHumans()}}</td>
                                        <td class="w-10 text-center">
                                            <button onclick="location.href='{{route('admin.owners.edit', ['owner'=>$owner->id])}}'" class="flex mx-auto text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded">編集する</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
