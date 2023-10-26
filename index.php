<?php include('connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create and Read operation</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
</head>

<body>
    
    <div class="container my-5">
         <div class="row">
            <div class="col-lg-5 mx-auto">
                <form action="backend.php" method="post" class="rooms">
                   <h3 class="text-center mb-4">Rooms Booking</h3>
                    <div class="mb-3">
                      <input type="text" name="room_number" class="form-control" placeholder="Room Number" required />
                    </div>
                    <div class="mb-3">
                        <input type="text" name="room_status" class="form-control" placeholder="Room Status" required />
                    </div>
                    <button type="submit" name="submit" class="btn btn-danger w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <form action="backend.php" method="post" class="reservation">
                    <h3 class="text-center mb-4">Rooms reservation time duration</h3>
                    <div class="mb-3">
                       <input type="text" name="customer_name" class="form-control" placeholder="Customer Name" required /> 
                    </div>
                    <div class="mb-3">
                       <input type="text" name="customer_phone" class="form-control" placeholder="Customer Phone Number" required /> 
                    </div>
                    <div class="mb-3">
                        <select name="room_number" class="form-control">    
                         <?php
                            $rooms = mysqli_query($db, "SELECT * FROM rooms ORDER By id desc");
                            while ($data = mysqli_fetch_assoc($rooms)) {
                         ?>

                         <option>Room <?php echo $data['room_number'] ?></option>

                         <?php
                            }
                         ?>
                        </select>
                    </div>
                    <div class="mb-3">
                       <input type="date" name="reservation_date" class="form-control" placeholder="Reservation Date" required /> 
                    </div>
                    <div class="mb-3">
                        <select name="reservation_duration" class="form-select">
                            <?php
                              
                              for ($i=1; $i <= 30 ; $i++) { 
                                echo "<option value = '$i'>$i day</option>";
                              }

                            ?>
                        </select>
                    </div>
                    <button type="submit" name="reservation" class="btn btn-danger w-100">Reserve</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped text-center align-middle mt-5">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Room Number</th>
                                <th>Room Status</th>
                                <th>Buttons</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $read = mysqli_query($db, "SELECT * FROM rooms");
                            
                            while ($data = mysqli_fetch_assoc($read)) {
                            ?>
                            <tr>
                                <td><?php echo $data['id'] ?></td>
                                <td><?php echo $data['room_number'] ?></td>
                                <td><?php echo $data['room_status'] ?></td>
                                <td>
                                    <button class="btn btn-danger mt-2">Edit</button>
                                    <button class="btn btn-dark mt-2">Delete</button>
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

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped text-center align-middle mt-5">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Customer name</th>
                                <th>Number</th>
                                <th>Rooms</th>
                                <th>Date</th>
                                <th>Time Duration</th>
                                <th>Buttons</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $read = mysqli_query($db, "SELECT * FROM reservation");
                            
                            while ($data = mysqli_fetch_assoc($read)) {
                            ?>
                            <tr>
                                <td><?php echo $data['id'] ?></td>
                                <td><?php echo $data['customer_name'] ?></td>
                                <td><?php echo $data['customer_phone'] ?></td>
                                <td><?php echo $data['room_number'] ?></td>
                                <td><?php echo $data['reservation_date'] ?></td>
                                <td><?php echo $data['reservation_duration'] ?></td>
                                <td>
                                    <button class="btn btn-danger mt-2">Edit</button>
                                    <button class="btn btn-dark mt-2">Delete</button>
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

  <script src="./assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>