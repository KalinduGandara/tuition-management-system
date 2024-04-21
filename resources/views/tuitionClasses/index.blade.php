<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @foreach ($tuitionClasses as $tuitionClasse)
        <ul>
            <li>{{ $tuitionClasse->grade }}</li>
            <li>{{ $tuitionClasse->year }}</li>
            <li>{{ $tuitionClasse->center_id }}</li>
            <li>{{ $tuitionClasse->center->name }}</li>
            <li>{{ $tuitionClasse->center->address }}</li>
        </ul>
    @endforeach
</body>

</html>
