<!doctype html>
<?php
  include 'employeeModel.php';
  if (isset($_POST['add'])) {
    $employee = new Employee('', $_POST['name'], $_POST['work'], $_POST['salary']);
    if(Employee::insertToDatabase($employee)){
      header("location:index.php");
    }
  }
  if (isset($_POST['edit'])) {
    $employee = new Employee($_POST['id'], $_POST['name'], $_POST['work'], $_POST['salary']);
    if(Employee::editEmployee($employee)){
      header("location:index.php");
    }
  }
  if (isset($_POST['delete'])) {
    if(Employee::deleteEmployee($_POST['id'])){
      header("location:index.php?status=deleteSuccess");
    }
  }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Arkademy Bootcamp</title>
  </head>
  <body>
    <div class="container-fluid">
      <img src="https://s3-alpha-sig.figma.com/img/c575/73ce/d686cee9b4fecf36a1e813792073bdb0?Expires=1564963200&Signature=Wu~-YmwHemdyaS~RXgNdMYwDuHT-c16B5BusJWHZU3A~ucrzMsTCmo17zjfEZdwRZeuNupheqtmtp9FHHa~jKUUO9uo4WT9azNfP4gzpxeYc7FjK9sKe8SZFrzu0QZ8DoGF~iHGHMNyPFC24jLlESmmOqkSpsdTe~G2c9i7tlhBZ1GrGYeTixWyFVeTWJIMyEsYvcn8O8Ire7C~OSg9cz2vVObtotAOJ2vLnHwN4Pwtx4Ia21Zz8dn~05samnuZ5E-QESXDjV9HJSiUvADVBXMY-Y-EfDIUK0Q7nIV0v4yQNuFM598qIGi4BYr2GkVJbVkDGdN2vAFHvcM23y3tHUA__&Key-Pair-Id=APKAINTVSUGEWH5XD5UA" width="120px" style="display: inline-block;">
      <h2 style="display: inline-block;">Arkademy Bootcamp</h2>
    </div>
    <div class="container-fluid" align="center">      
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addEmployeeModal">Add</button>
      <div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addEmployeeModalLabel">Add Employee</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="POST">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="inputName" placeholder="Name...">
                </div>
                <div class="form-group">
                  <select class="form-control" name="work" id="selectWork">
                    <option>Work...</option>
                    <option value="1">Frontend Dev</option>
                    <option value="2">Backend Dev</option>
                  </select>
                </div>
                <div class="form-group">
                  <select class="form-control" name="salary" id="selectSalary">
                    <option>Salary...</option>
                    <option value="1">Rp.10.000.000</option>
                    <option value="2">Rp.12.000.000</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-warning" name="add">Add</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <table class="table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Work</th>
            <th scope="col">Salary</th>
            <th scope="col" colspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $employees = Employee::selectAllEmployees();
            while ($employee = $employees->fetch_assoc()) {
              $work = $employee['work'] == "Frontend Dev"?1:2;
              $salary = $employee['salary'] == "10000000"?1:2;              
              ?>
              <tr>
                <th scope="row"><?=$employee['name']?></th>
                <td><?=$employee['work']?></td>
                <td><?=$employee['salary']?></td>
                <td>
                  <button class="btn" data-toggle="modal" data-target="#deleteEmployeeModal" data-id="<?=$employee['id']?>" data-name="<?=$employee['name']?>"><i class="fa fa-trash-o" style="font-size:24px;color:red"></i></button>
                </td>
                <td>
                  <button class="btn" data-toggle="modal" data-target="#editEmployeeModal" data-id="<?=$employee['id']?>" data-name="<?=$employee['name']?>" data-work="<?=$work?>" data-salary="<?=$salary?>"><i class="fa fa-edit" style="font-size:24px;color:blue"></i></button>
                </td>
              </tr>        
              <?php
            }
          ?>
        </tbody>
      </table>
    </div>
    <button type="button" id="deleteSuccessBtn" style="display: none;" data-toggle="modal" data-target="#deleteSuccessModal"></button>
    <div class="modal fade" id="deleteSuccessModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" align="center">
            <i class="fa fa-check-circle-o" style="font-size:48px;color:green"></i>
            <h5>Data Telah Dihapus</h5>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="editEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editEmployeeModalLabel">Edit Employee</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="POST">
              <input type="hidden" name="id" id="employeeId">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="inputName" placeholder="Name...">
              </div>
              <div class="form-group">
                <select name="work" class="form-control" id="selectWork">
                  <option>Work...</option>
                  <option value="1">Frontend Dev</option>
                  <option value="2">Backend Dev</option>
                </select>
              </div>
              <div class="form-group">
                <select name="salary" class="form-control" id="selectSalary">
                  <option>Salary...</option>
                  <option value="1">Rp.10.000.000</option>
                  <option value="2">Rp.12.000.000</option>
                </select>
              </div>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="edit" class="btn btn-warning">Save changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="deleteEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" align="center">
            <h4></h4>
            <form action="" method="POST">
              <input type="hidden" name="id" id="employeeId">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-warning" name="delete">Ya</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
    <?php
      if (isset($_GET['status'])) {
        if ($_GET['status'] == "deleteSuccess") {
          ?>
          <script>
            document.getElementById("deleteSuccessBtn").click();
          </script>
          <?php
        }
      }
    ?>
    <script>
      $('#editEmployeeModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id')
        var name = button.data('name')
        var work = button.data('work')
        var salary = button.data('salary') 
        var modal = $(this)
        modal.find('.modal-title').text('Edit Employee ' + name)
        modal.find('.modal-body #inputName').val(name)
        modal.find('.modal-body #employeeId').val(id)
        $('#editEmployeeModal #selectWork').children(1)[work].selected = true
        $('#editEmployeeModal #selectSalary').children(1)[salary].selected = true
      })
      $('#deleteEmployeeModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id')
        var name = button.data('name') 
        var modal = $(this)
        modal.find('.modal-body h4').text('Apakah Anda Yakin Akan Menghapus Data ' + name + '?')
        $('#deleteEmployeeModal #employeeId').val(id)
      })
    </script>
  </body>
</html>
