<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Articles</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    </head>
    <body>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        if (isset($_GET['message'])) {
                        $message = $_GET['message'];
                    ?>
                    <div class="alert alert-success my-4"><?= $message ?></div>
                    <?php
                        }
                    ?>
                    <div class="card border-0">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h2>List Articles</h2>
                                <a href="add.php" class="btn btn-primary">Add Article</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Category</th>
                                        <th>Thumbnail</th>
                                        <th>Act</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include "koneksi.php";
                                        $no = 1;
                                        $query = mysqli_query($koneksi, "SELECT * FROM article");
                                            foreach ($query as $data) {
                                                ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data['title'] ?></td>
                                                    <td><?= $data['content'] ?></td>
                                                    <td><?= $data['category'] ?></td>
                                                    <td>
                                                        <img src="images/<?= $data['thumbnail'] ?>" class="img-fluid img-thumbnail">
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="edit.php? id=<?= $data['id'] ?>" class="btn btn-warning">Edit</a>
                                                            <a href="delete.php? id=<?= $data['id'] ?>" class="btn btn-danger">Delete</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
    </body>
</html>