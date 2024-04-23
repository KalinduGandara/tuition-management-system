<x-app-layout>
    @foreach ($tuitionClasses as $tuitionClasse)
        <ul>
            <li>{{ $tuitionClasse->grade }}</li>
            <li>{{ $tuitionClasse->year }}</li>
            <li>{{ $tuitionClasse->center_id }}</li>
            <li>{{ $tuitionClasse->center->name }}</li>
            <li>{{ $tuitionClasse->center->address }}</li>
        </ul>
    @endforeach
</x-app-layout>
