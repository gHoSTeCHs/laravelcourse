<x-layout>
    <x-slot:heading>Jobs</x-slot:heading>
    <div>
        <p>{{$job['career']}} is a very good career option as it pays {{$job['salary']}}</p>
        <x-button href="/jobs/{{$job['id']}}/edit">Edit</x-button>
    </div>
</x-layout>
