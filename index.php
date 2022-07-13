<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Find your Paper</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>ISHIKA GUPTA WEB DEVELOPMENT ASSIGNMENT </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                       Class: <input type="text" name="clas" required value="<?php if(isset($_GET['clas'])){echo $_GET['clas']; } ?>" class="form-control" placeholder="Range(1 to 12)">
                                       Subject: <input type="text" name="sub" required value="<?php if(isset($_GET['sub'])){echo $_GET['sub']; } ?>" class="form-control" placeholder="Enter Subject">
                                       Term: <input type="text" name="term" required value="<?php if(isset($_GET['term'])){echo $_GET['term']; } ?>" class="form-control" placeholder="Range(1 to 4)">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Suject</th>
                                    <th>Term</th>
                                    <th>Paper</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","questions");

                                    if(isset($_GET['clas'])&&isset($_GET['sub']))
                                    {
                                        $filtervalues = $_GET['clas'].$_GET['sub'].$_GET['term'];
                                        $query = "SELECT * FROM pdfs WHERE CONCAT(Class,Subject,Term) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['Class']; ?></td>
                                                    <td><?= $items['Subject']; ?></td>
                                                    <td><?= $items['Term']; ?></td>
                                                    <td><a href = " <?= $items['Paper']; ?>" target="_blank">Get Paper</a></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
