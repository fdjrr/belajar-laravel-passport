<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <div class="card mb-3" style="width: 500px;">
            <div class="card-body">
                <p>Here are a list of your clients : </p>
                @foreach ($clients as $client)
                <div class="">
                    <h3>Client Name : {{ $client->name }}</h3>
                    <ul>
                        <li>Client ID : {{ $client->id }}</li>
                        <li>Redirect URI : {{ $client->redirect }}</li>
                        <li>Secret : {{ $client->secret }}</li>
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
        <div class="card" style="width: 500px;">
            <div class="card-body">
                <form action="/oauth/clients" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Redirect</label>
                        <input type="text" name="redirect" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Client</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
