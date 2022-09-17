<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Crud</title>
</head>

<body>
    <div class="container pt-5">
        <form action="main/partials/_base.php" method="post">
            <div class="row">
                <div class="col-md-4">
                    <label for="username" class="form-label">MySql username</label>
                    <input required placeholder="username" type="text" name="username" id="username" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="password" class="form-label">MySql password</label>
                    <input required placeholder="password" type="password" name="password" id="password" class="form-control">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <label for="database" class="form-label">MySql database</label>
                    <input required placeholder="database name" type="text" name="database" id="database" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="table" class="form-label">MySql database-table</label>
                    <input required placeholder="table name" type="text" name="table" id="table" class="form-control">
                </div>
            </div>



            <!-- ==== Columns table ==== -->
            <div class="row mt-4">
                <div class="col-md-8">

                    <table class="table table-responsive-md table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Column name</th>
                                <th scope="col">type</th>
                                <th scope="col">size</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="main-table">
                            <tr>
                                <td>
                                    <input required type="text" class="form-control" name="column_name1" id="column_name1" placeholder="name">
                                </td>
                                <td>
                                    <select required class="form-control" name="type1" id="type1">
                                        <option>varchar</option>
                                        <option>integer</option>
                                    </select>
                                </td>
                                <td>
                                    <input required type="number" class="form-control" name="size1" id="size1" placeholder="space size">
                                </td>
                                <td>
                                    <button onclick="deleteRow(this)" class="btn btn-danger">—</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button onclick="addColumn()" type="button" class="btn btn-primary">Add Column</button>
                    <button onclick="" type="submit" class="btn btn-success">Submit</button>

                </div>
            </div>
        </form>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        let form = document.querySelector('.main-table');
        let n = 2;
        let m = 2;
        let o = 2;
        let p = 2;
        let q = 2;
        let r = 2;

        function addColumn() {
            let str = `<tr>
                    <td>
                        <input required type="text" class="form-control" name="column_name${r++}" id="column_name${n++}" placeholder="name">
                    </td>
                    <td>
                        <select class="form-control" name="type${o++}" id="type${m++}">
                            <option>varchar</option>
                            <option>integer</option>
                        </select>
                    </td>
                    <td>
                        <input required type="number" class="form-control" name="size${p++}" id="size${q++}" placeholder="space size">
                    </td>
                    <td>
                        <button onclick="deleteRow(this)" class="btn btn-danger">—</button>
                    </td>
                </tr>`

            form.innerHTML += str;
        }

        function deleteRow(data) {
            data.parentElement.parentElement.remove()
        }
    </script>
</body>

</html>