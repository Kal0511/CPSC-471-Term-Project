<?php
session_start();
if (isset($_SESSION['loggedin'])) {
  header('Location: login.php');
}
include('visitorData.php');
GetPersonData();
GetVisitorData();
GetHealthData();
GetVehicle();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VISITOR</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="visitor.css">
</head>

<body>
  <div id="page">
    <div class="modals">
      <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Health Record</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="visitorData.php" method="post">
              <div class="modal-body">
                <div class="item">
                  <div class="title">
                    Gender:

                  </div>

                  <div class="content">
                    <select class="form-control" id="GenderSelect" name="GenderSelect">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Unknown">Unknown</option>
                      <option selected="selected"><?= $_SESSION['gender'] ?></option>
                    </select>
                  </div>
                </div>

                <div class="item">
                  <div class="title">
                    Date:
                  </div>
                  <div class="content">
                    <input type="date" class="checkbox" id="Date" name="Date" value="<?php echo date($_SESSION['lasttestdate']); ?>">
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input class="btn btn-primary" type="submit" name="UpdateHealthData" value="Save">
              </div>
            </form>
          </div>
        </div>
      </div>



      <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Dependent</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="visitorData.php" method="post">
              <div class="modal-body">
                <div class="item">
                  <div class="title">
                    Name:
                  </div>
                  <div class="content">
                    <input type="text" class="form-control" id="Name" value='' name="dependent" required placeholder="">
                  </div>
                </div>



              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input class="btn btn-primary" type="submit" name="AddDependent" value="Save">
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Vechicle</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="visitorData.php" method="post">
              <div class="modal-body">

                <div class="item">
                  <div class="title">
                    License Plate:
                  </div>
                  <div class="content">
                    <input type="text" class="form-control" value=<?= $_SESSION['licence'] ?> required placeholder="" id="licence" name='licence'>
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input class="btn btn-primary" type="submit" name="UpdateVehicle" value="Save">
              </div>
            </form>
          </div>
        </div>
      </div>


      <div class="modal fade" id="modal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Personal Info</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="visitorData.php" method="post">
              <div class="modal-body">
                <div class="item">
                  <div class="title">
                    Name:
                  </div>
                  <div class="content">
                    <input type="text" class="form-control" value="<?= $_SESSION['name'] ?>" required placeholder="" id="desVal" name="name">
                  </div>
                </div>

                <div class="item">
                  <div class="title">
                    Address:
                  </div>
                  <div class="content">
                    <input type="text" class="form-control" value="<?= $_SESSION['address'] ?>" required placeholder="" id="addVal" name="address">
                  </div>
                </div>

                <div class="item">
                  <div class="title">
                    Phone
                  </div>
                  <div class="content">

                    <input type="text" class="form-control" value="<?= $_SESSION['phone'] ?>" required placeholder="" id="addVal" name="phone">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input class="btn btn-primary" type="submit" name="UpdatePerson" value="Save">
              </div>
            </form>
          </div>
        </div>
      </div>


      <div class="modal fade" id="modal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Visitor Status</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="item">
                <div class="title" style="width: 40%;">
                  Status of Current Visitor:
                </div>
                <div class="content">
                  <select class="form-control" id="StatusVal">
                    <option>Approved</option>
                    <option>Denied</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onClick="handleSave('Status')">Save</button>
            </div>
          </div>
        </div>
      </div>


    </div>
    <div class="info">
      <div class="left">
        <div class="top">
          <div class="avatar">
            <img src="./images/avatar.png" alt="">
          </div>
          <p>Welcome back, <?= $_SESSION['name'] ?>!</p>
          <p>Phone: <?= $_SESSION['phone'] ?></p>
          <p>Address: <?= $_SESSION['address'] ?></p>
          <button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal4">edit</button>
        </div>

        <div class="bottom">
        </div>
      </div>
      <div class="right">
        <header>
          Visitor Page

          <div class="btns_div">
            <a id="back" href="login.php">Log Out</a>
          </div>


        </header>
        <div class="item">
          <div class="icon">
            <img src="./images/health.png" alt="">
          </div>
          <div class="mid">
            <div class="title">
              Health Record:
            </div>
            <p>Gender: <?= $_SESSION['gender'] ?></p>
            <p>Last Test Date: <?= $_SESSION['lasttestdate'] ?></p>
            <div class="content" id="Health">

            </div>
          </div>
          <button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal1">edit</button>
        </div>
        <div class="item">
          <div class="icon">
            <img src="./images/health.png" alt="">
          </div>
          <div class="mid">
            <div class="title">
              Dependent:
            </div>
            <?php
            DisplayDependent();
            ?>
            <div class="content" id="Dependent">

            </div>
          </div>
          <button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal2">Add</button>
        </div>
        <div class="item">
          <div class="icon">
            <img src="./images/health.png" alt="">
          </div>
          <div class="mid">
            <div class="title">
              Vehicle:
            </div>
            <p>Plate Number: <?= $_SESSION['licence'] ?></p>

            <div class="content" id="Vehicle">

            </div>
          </div>
          <button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal3">edit</button>
        </div>
        <div class="item">
          <div class="icon">
            <img src="./images/health.png" alt="">
          </div>
          <div class="mid">
            <div class="title">
              Visitor Status:
            </div>
            <p> <?= $_SESSION['status'] == "Y" ? 'Approved' : 'Denied' ?></p>


          </div>
        </div>
      </div>
      <div class="submit_div">
      </div>
    </div>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="./utils.js"></script>
  <script>
    const info = {};

    function handleSave(val) {
      if (val == "Health") {
        const gender = $("#GenderSelect").val();
        const date = $("#Date").val();
        const name = $("#Name0").val();
        info.gender = gender;
        info.name = name;
        info.date = date;
        $("#Username").text(name);
        $("#Gender").text(gender)
        $('#modal1').modal('hide')
      }
      if (val == "Dependent") {
        const name = $("#Name").val();
        const relation = $("#Relation").val();

        info.relation = relation;
        $("#Dependent").text(relation);
        $('#modal2').modal('hide')
      }
      if (val == "Vechicle") {
        const licence = $("#licence").val();
        info.vechicle = licence;
        $("#Vechicle").text(licence);
        $('#modal3').modal('hide')
      }
      if (val == "Destination") {
        const address = $("#addVal").val();
        const destination = $("#desVal").val();
        info.stationAddress = address;
        info.destination = destination;
        $("#StationAddress").text(address);
        $("#Destination").text(destination);
        $('#modal4').modal('hide')
      }
      if (val == "Status") {
        const status = $("#StatusVal").val();
        info.status = status;
        $("#Status").text(status);
        $('#modal5').modal('hide')
      }
    }

    function handleSubmit() {
      SaveInfo(info);
    }
    (function() {
      'use strict';
      window.addEventListener('load', function() {}, false);
    })();
  </script>
</body>

</html>