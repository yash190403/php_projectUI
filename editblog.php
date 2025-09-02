<?php
    include "db.php";
    $id = isset($_GET["id"])?$_GET["id"]:null;
    if (isset($_GET["id"])) {
        $sql = $conn -> prepare("select * from blog2 where u_id = ?");
        $sql -> bind_param("i", $id);
        $sql -> execute();
        $result = $sql -> get_result() -> fetch_assoc();
    }

    if ($_SERVER["REQUEST_METHOD"]==="POST") {
        $title = $_POST["title"];
        $content = $_POST["content"];
        $image_name = $_FILES["image"] ["name"];
        move_uploaded_file($_FILES["image"] ["tmp_name"], "photos/$img_name");
        $sql = $conn -> prepare("update blog3 set title=?, content=?, img_name=? where u_id=?");
        $sql -> bind_param("sssi", $title, $content, $image_name, $id);
        $sql -> execute();
        header("Location:dashboard.php");
        
    }
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



<link rel="stylesheet" href="style.css">
        <style>
            
        </style>
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>

            <div
                class="container col-3 py-5"
            >
            <h3 class="text-center my-5">Edit Blog</h3>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input
                            type="text"
                            class="form-control"
                            name="title"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                            value="<?=$result["title"]?>"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Content</label>
                        <textarea class="form-control" name="content" id="" rows="3"><?=$result["content"]?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Choose file</label>
                        <input
                            type="file"
                            class="form-control"
                            name="image"
                            id=""
                            placeholder=""
                            aria-describedby="fileHelpId"
                            value="<?=$result["img_name"]?>"
                        />
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Submit
                    </button> 
                </form>
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
