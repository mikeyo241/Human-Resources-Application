<!DOCTYPE html>
<html lang="en">
<head>
    <Title>Human Resources System</Title>
    <meta name="author" content="Michael Allender Gardner" />
    <meta name="owner" content="Michael Allender Gardner" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-6">
            <div class="well">
                <h1 class="text-center">Are you sure you want to delete</h1>
                <h2 class="text-center">{{request('name')}}</h2>
                <form class="text-center" method="post">
                    {{ csrf_field() }}
                    <button type="submit" name="id" value="{{request('id')}}" formaction="deleteUser" class="btn btn-danger">Yes</button>
                    <button type="submit" formaction="cancel" class="btn btn-info">No</button>
                </form>
            </div>
        </div>
    </div>
</body>