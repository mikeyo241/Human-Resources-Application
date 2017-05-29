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
    <center>
        <div class="container-fluid">
            <a href="/"><h1>Human Resources System</h1></a>
            <br>
            <h2>Add Employee</h2>
        </div>
    <form action="/create" method="post">
        {{ csrf_field() }}   <!-- Laravel Generated Token to make sure the request is coming from the right server. -->
        <table>
            <thead>
                <tr>
                    <td class="text-center"><h4>Name</h4></td>
                    <td class="text-center"><h4>Age</h4></td>
                    <td class="text-center"><h4>Sex</h4></td>
                    <td class="text-center"><h4>Office</h4></td>
                    <td class="text-center"><h4>Supervisor</h4></td>
                </tr>
            </thead>
                <tr>
                    <td>
                        <input  name="name"  type="text" maxlength="65"   class="form-control" id="usr"   required>
                    </td>
                    <td>
                        <input  name="age"   min="1" max="150" type="number"  maxlength="3"  class="form-control" id="usr"   required>
                    </td>
                    <td>
                        <select name="sex"                  class="form-control" id="sel1"  required>
                            <option value="Male"  >Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </td>
                    <td>
                        <input  name="office" type="text" maxlength="25" class="form-control"  id="usr"    required>
                    </td>

                    <td>
                        <select name="supervisor" class="form-control"          id="sel1"   required>
                            <option value="0" selected >No Supervisor</option>
                            <!-- ** Pull all the current employees to make it easy to find the supervisor.   ** -->
                            @foreach($employees as $supervisor2)
                                <option value="{{$supervisor2->id}}">{{$supervisor2->name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <button type="submit" class="btn btn-info">Add Employee</button>
    </form>


<!--   *****   Begin Current Employee List   *********  -->
        @if ($employees->first())
    <div class="container-fluid">
        <h2>Current Employees</h2>
    </div>

        <table>
            <thead>
                <tr>
                    <td class="text-center"><h4>Name</h4></td>
                    <td class="text-center"><h4>Age</h4></td>
                    <td class="text-center"><h4>Sex</h4></td>
                    <td class="text-center"><h4>Office</h4></td>
                    <td class="text-center"><h4>Supervisor</h4></td>
                </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <form action="/update" method="post">
                        {{ csrf_field() }}
                        <input hidden name="id" value="{{$employee->id}}">
                        <td>
                            <input name="name" type="text"  maxlength="65" required class="form-control" id="usr" value="{{$employee->name}}" >
                        </td>
                        <td>
                            <input name="age" type="number" min="1" max="150" maxlength="3" required class="form-control" id="usr" value="{{$employee->age}}">
                        </td>
                        <td>
                            <select name="sex" class="form-control" id="sel1" required>
                                <option value="Male" @if ($employee->sex == 'Male') selected @endif >Male</option>
                                <option value="Female" @if ($employee->sex == 'Female') selected @endif>Female</option>
                            </select>
                        </td>
                        <td>
                            <input name="office" maxlength="25" type="text" class="form-control" required id="usr" value="{{$employee->office}}">
                        </td>
                        <td>
                            <select name="supervisor" class="form-control" required id="sel1">
                                <option value="0" @if ($employee->supervisor == 0) selected @endif >No Supervisor</option>
                                @foreach($employees as $supervisor)
                                    <option value="{{$supervisor->id}}"
                                            @if($supervisor->id == $employee->supervisor) selected @endif
                                            >{{$supervisor->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-info">Submit Changes</button>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-danger" name="del_id" value="{{$employee->id}}" formaction="confirm">Delete Employee</button>
                        </td>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
    </form>

        @else
            <div class="container-fluid">
                <h2>Currently No Employees</h2>
            </div>
        @endif
</center>
</body>
</html>