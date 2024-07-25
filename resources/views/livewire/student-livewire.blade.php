<div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <h1 class="text-3xl text-black pb-6">Tables {{$title}}</h1>

        <div class="w-full mt-6">
            <p class="text-xl pb-3 flex items-center">
                @if ($create)
                @include('students.create')
                @endif
                @if ($update)
                @include('students.update')
                @endif
                @if ($create == false)
            <div>
                <button wire:click="form()" type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Add</button>
            </div>
            @endif
            </p>
            <div class="bg-white overflow-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Class</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Gender</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Action</td>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($students as $student)
                        <tr>
                            <td class="w-1/3 text-left py-3 px-4">{{$student->name??''}}</td>
                            <td class="w-1/3 text-left py-3 px-4">{{$student->class->name??''}}</td>
                            <td class="text-left py-3 px-4">{{($student->gender == 'L')?'Laki-Laki':'Perempuan'}}</td>
                            <td class="text-left py-3 px-4">
                                <button wire:click="edit({{$student->id}})" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</button>
                                <button wire:click="destroy({{$student->id}})" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>