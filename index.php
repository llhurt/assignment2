<?php
include 'connection.php';
$id = 1;
if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
}
$nav_data = $connection->query("select id, item from scp");
$result = $connection->query("select * from scp where id=".$id);
$page_data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SCP Foundation</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <link href="styles.css" rel="stylesheet" />
  </head>
  <body class="container bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <div class="navbar-brand">
          <img
            src="images/nav_logo.png"
            alt="SCP Foundation Logo"
            class="logo"
          />
        </div>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav flex-wrap fs-3">
<?php

foreach ($nav_data as $nav_item) {
   if ($id==$nav_item['id']) {
    echo '<a class="active nav-link text-white" href="index.php?id='.$nav_item['id'].'">'.$nav_item['item'].'</a>';
    } else {
    echo '<a class="nav-link text-white" href="index.php?id='.$nav_item['id'].'">'.$nav_item['item'].'</a>';  
    }
}

?>
          </div>
        </div>
      </div>
    </nav>

    <div class="container mt-3">
      <div class="row mb-3">
<?php
echo '<div class="col-6">
      <h1 class="mt-2"><b>Item #: </b>'.$page_data['item'].'</h1>
    </div>
    <div class="col-6">
      <h2 class="float-end mt-2"><b>Object Class: </b>'.$page_data['class'].'</h2>
    </div>';
?>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-12">
                <div class="col-md-4">
                  <img
                    class="img-fluid float-start me-3 w-100 mb-3 mb-md-0"
                    src="<?php echo $page_data['image']; ?>"
                  />
                </div>
                <div class="col-md-12">
                  <div class="card-body">
                    <h5 class="card-title fs-4 fw-bold">
                      Special Containment Procedures
                    </h5>
<?php echo $page_data['containment']; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="accordion" id="accordionOne">
                <div class="accordion-item">
                  <h4 class="accordion-header" id="headingOne">
                    <button
                      class="accordion-button collapsed fs-4 fw-bold"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapseOne"
                      aria-expanded="false"
                      aria-controls="collapseOne"
                    >
                      Description
                    </button>
                  </h4>
                  <div
                    id="collapseOne"
                    class="accordion-collapse collapse"
                    aria-labelledby="headingOne"
                    data-bs-parent="#accordionOne"
                  >
                    <div class="accordion-body">
<?php echo $page_data['description']; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <a href="form.php"><button class="btn btn-primary" id="addBtn">Add new SCP File</button></a>
      <a href="form.php?id=<?php echo $id; ?>"><button class="btn btn-primary" id="updateBtn">Update this SCP File</button></a>
      <form id="delete-btn" method="post" action="connection.php" class="form-group">
        <input type="hidden" name="delete" value="<?php echo $id; ?>">
        <input type="submit" name="submit" value="Delete this SCP File" class="btn btn-primary">
      </form>

      

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
