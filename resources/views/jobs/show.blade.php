<x-layout>
    <x-slot:heading>Jobs</x-slot:heading>
    <div>
        <p>{{$job['career']}} is a very good career option as it pays {{$job['salary']}}</p>

        @can('edit', $job)
            <x-button href="/jobs/{{$job['id']}}/edit">Edit</x-button>
        @endcan
    </div>
</x-layout>
