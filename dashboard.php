<?php 
    include 'db.php';
    if (!isset($_SESSION["id"])) {
        header("Location:login.php");
    }
    $user_id=$_SESSION["id"];
    $sql=$conn->query("SELECT blog3.*, username from blog3 join user on blog3.u_id=user.id");
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>
      
    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>

        <h3 class="text-center my-4">DashBoard</h3>
        <div
            class="container text-center mt-4 "
        >
            <a
                name=""
                id=""
                class="btn btn-success"
                href="addblog.php"
                role="button"
                >Add Blog</a
            >
            <a
                name=""
                id=""
                class="btn btn-danger"
                href="logout.php"
                role="button"
                >Logout</a
            >        
        </div>
        
        <div class="container my-5">
            <div class="row">
                <?php while ($row = $sql->fetch_assoc()) { ?>
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="card text-center h-100">
                            <img style="height: 400px; object-fit: cover;" class="card-img-top" src="photos/<?= $row["img_name"] ?>" alt="Title" />
                            <div class="card-body">
                                <small class="text-muted d-block mb-2">
                                    By: <?= $row["username"] ?> | <?= $row["created_at"] ?>
                                </small>
                                <h4 class="card-title"><?= $row["title"] ?></h4>
                                <p class="card-text"><?= $row["content"] ?></p>
                            </div>

                            <?php if ($_SESSION["id"] == $row["u_id"]) { ?>
                                <div class="d-flex justify-content-center gap-2 mb-3">
                                    <a class="btn btn-warning" href="editblog.php?id=<?= $row["id"] ?>">Edit</a>
                                    <a class="btn btn-danger" href="deleteblog.php?id=<?= $row["id"] ?>">Delete</a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
