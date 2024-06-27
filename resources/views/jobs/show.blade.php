<x-layout>
    <x-slot:heading>
        Job Page
    </x-slot:heading>

    <h2 class='font-bold text-lg'>{{ $job['title'] }}</h2>

    <p class='text-sm text-gray-600'>This jobs pays {{ $job['salary'] }} per year</p>

</x-layout>
