<?php

$id = false;
if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
}

if ($id) {
    include 'connection.php';
    $record = $connection->query("select * from scp where id=".$id);
    $row = $record->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Create a Record</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <link href="styles.css" rel="stylesheet" />
  </head>
  <body class="container bg-light">
    <div class="container mt-3">
      <div class="row">
        <div class="col-12">
          <div class="card shadow mb-4">
            <div class="card-body">
                <form method="post" action="connection.php" class="form-group">
                    <?php if ($id) { echo '<input type="hidden" name="id" value="'.$row['id'].'">';} ?>
                    <label>Enter Item #</label>
                    <br>
                    <input type="text" name="item" placeholder="Item" class="form-control" value="<?php if ($id) {echo $row['item'];} ?>">
                    <br>
                    <label>Enter Object Class</label>
                    <br>
                    <input type="text" name="class" placeholder="Class" class="form-control" value="<?php if ($id) {echo $row['class'];} ?>">
                    <br>
                    <label>Enter Special Containment Procedures</label>
                    <br>
                    <textarea name="containment" placeholder="Special Containment Procedures" style="width:100%"><?php if ($id) {echo $row['containment'];} ?></textarea>
                    <br>
                    <br>
                    <label>Enter Description</label>
                    <br>
                    <textarea name="description" placeholder="Description" style="width:100%"><?php if ($id) {echo $row['description'];} ?></textarea>
                    <br>
                    <br>
                    <label>Enter Image Address</label>
                    <br>
                    <input type="text" name="image" placeholder="images/nameOfImage.jpg or similar" class="form-control" value="<?php if ($id) {echo $row['image'];} ?>">
                    <br><br>
                    <input type="submit" name="submit" value="Submit record" class="btn btn-dark">
                </form>
            </div>
          </div>
        </div>
      </div>
</div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
