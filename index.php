<!-- header -->
<?php include('layout/header.php'); ?>


<!-- Page Content -->
<div id="content" class="w-100 p-2">

    <h2 class="text-center">Personnel Details</h2>

    <table id="personnelTable" class="table w-100  border-1">
        <thead class="table-dark  ">
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Populate this section dynamically using PHP -->
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Personnel Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form onsubmit="return false;" id="personnelForm">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name <sup class="text-red">*</sup></label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name <sup class="text-red">*</sup></label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email <sup class="text-red">*</sup></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone <sup class="text-red">*</sup></label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Floating button with Font Awesome icon -->
<button class="btn btn-primary floating-button rounded-circle shadow" data-bs-toggle="modal" data-bs-target="#myModal">
    <i class="fas fa-plus"></i>
</button>
<!-- Edit Modal -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Personnel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Edit form -->
                <form onsubmit="return false;" id="editPersonnelForm">
                    <input type="hidden" name="dataId" id="dataId"> <!-- Hidden input for data-id -->
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name <sup class="text-red">*</sup></label>
                        <input type="text" class="form-control" id="efirst_name" name="first_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name <sup class="text-red">*</sup></label>
                        <input type="text" class="form-control" id="elast_name" name="last_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email <sup class="text-red">*</sup></label>
                        <input type="email" class="form-control" id="eemail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone <sup class="text-red">*</sup></label>
                        <input type="tel" class="form-control" id="ephone" name="phone" required>
                    </div>
                    <button type="submit" id="editSubmitBtn" class="btn btn-primary">Update</button>

                </form>
            </div>


        </div>
    </div>
</div>

<!-- JavaScript to handle modal and form -->
<script>
    $(document).ready(function () {
        // Handle the click event for .edit-icon elements
        $(".edit-icon").on("click", function () {
            // Get the data-id attribute value
            var dataId = $(this).data("id");
            // Find the closest row (parent tr)
            var $row = $(this).closest("tr");
            // Find the input element with the name "first_name" within that row (column 1)
            var firstName = $row.children().eq(1).text();
            var lastName = $row.children().eq(2).text();
            var email = $row.children().eq(3).text();
            var phone = $row.children().eq(4).text();
            $("#efirst_name").val(firstName);
            $("#elast_name").val(lastName);
            $("#eemail").val(email);
            $("#ephone").val(phone);
            // Set the value of the hidden input in the form
            $("#editPersonnelForm input[name='dataId']").val(dataId);

            // Open the EditModal
            $("#EditModal").modal("show");
        });

        // Add additional JavaScript code here for form submission, etc.
        $("#editSubmitBtn").click(function () {
            // Get values from input fields or wherever you have them
            var dataId = $("#dataId").val();
            var firstName = $("#efirst_name").val();
            var lastName = $("#elast_name").val();
            var email = $("#eemail").val();
            var phone = $("#ephone").val();

            // Create an object with the data to send
            var dataToSend = {
                dataId: dataId,
                first_name: firstName,
                last_name: lastName,
                email: email,
                phone: phone
            };

            // Send an AJAX POST request to your PHP script
            $.ajax({
                type: "POST",
                url: "ajax/edit.php",
                data: dataToSend,
                success: function (response) {
                    // Handle the response here

                    customAlert(response.message);
                    // Open the EditModal
                    $("#EditModal").modal("hide");

                    var $updatedRow = $("a[data-id=" + dataId + "]").closest("tr");

                    // Update the row in the DataTable
                    var dataTable = $('#personnelTable').DataTable();
                    var rowIndex = dataTable.row($updatedRow).index();
                    var rowData = dataTable.row(rowIndex).data();

                    // Update the relevant columns in the row data
                    rowData[1] = firstName;
                    rowData[2] = lastName;
                    rowData[3] = email;
                    rowData[4] = phone;

                    // Update the DataTable with the modified row data
                    dataTable.row(rowIndex).data(rowData).draw();


                },
                error: function () {
                    // Handle AJAX errors here
                    alert("An error occurred while processing the request.");
                }
            });
        });
    });


    $(document).ready(function () {
        $(".delete-icon").click(function (e) {
            e.preventDefault(); // Prevent the default link behavior

            var dataId = $(this).data("id");

            Swal.fire({
                title: "Confirm Deletion",
                text: "We don't have any soft delete. Are you sure you want to delete this data? This action cannot be undone.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Delete"
            }).then((result) => {
                if (result.isConfirmed) {
                    // User confirmed, send AJAX request to delete.php
                    $.ajax({
                        type: "POST",
                        url: "ajax/delete.php",
                        data: { dataId: dataId },
                        success: function (response) {
                            response = JSON.parse(response);
                            console.log(response.status);
                            if (response.status == "success") {
                                // Data deleted successfully
                                var $deletedRow = $("a[data-id=" + dataId + "]").closest("tr");

                                // Update the row in the DataTable
                                var dataTable = $('#personnelTable').DataTable();
                                var rowIndex = dataTable.row($deletedRow).index();
                                var rowData = dataTable.row(rowIndex).remove().draw();
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "The data has been deleted.",
                                    icon: "success"
                                });

                                // Optionally, remove the deleted row from the UI
                                // Example: $(this).closest("tr").remove();
                            } else {
                                // Error while deleting data
                                Swal.fire({
                                    title: "Error!",
                                    text: "An error occurred while deleting the data.",
                                    icon: "error"
                                });
                            }
                        },
                        error: function () {
                            // AJAX error
                            Swal.fire({
                                title: "Error!",
                                text: "An error occurred while processing the request.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        });
    });
</script>


<script>
    $(document).ready(function () {
        $("#personnelForm").submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting traditionally

            // Get form input values
            var firstName = $("#first_name").val();
            var lastName = $("#last_name").val();
            var email = $("#email").val();
            var phone = $("#phone").val();

            // Validate form data (add more validation as needed)
            if (firstName === '' || lastName === '' || email === '' || phone === '') {
                alert("Please fill in all required fields.");
                return; // Prevent AJAX request if validation fails
            }

            // Create an object with form data
            var formData = {
                first_name: firstName,
                last_name: lastName,
                email: email,
                phone: phone
            };

            $.ajax({
                type: "POST",
                url: "ajax/add.php",
                data: formData,
                success: function (response) {


                    let dataTable = $("#personnelTable").DataTable();
                    // Add the new row to the DataTable
                    dataTable.row.add([
                        sn, // Serial Number
                        response.data.first_name,
                        response.data.last_name,
                        response.data.email,
                        response.data.phone,
                        '<a href="#" class="btn btn-danger btn-sm delete-icon mx-2" data-id="' + response.data.id + '"><i class="fas fa-trash"></i></a>' +
                        '<a href="#" class="btn btn-primary btn-sm edit-icon" data-id="' + response.data.id + '"><i class="fas fa-edit"></i></a>'
                    ]).draw();

                    // Increment the serial number for the next row
                    sn++;

                    // Handle the response here
                    customAlert(response.message);
                    // Close the modal
                    $("#myModal").modal("hide");

                    // Clear the form after successful submission (optional)
                    $("#personnelForm")[0].reset();

                },
                error: function (xhr, textStatus, errorThrown) {
                    // Handle errors here, e.g., display an error message
                    console.error(errorThrown);
                }
            });
        });
    });



    // Initialize an empty table
    var $table = $('#personnelTable');
    let sn = 1;
    // Function to append rows to the table
    function appendRow(data) {
        var row = '<tr>' +
            '<td>' + sn + '</td>' +
            '<td>' + data.first_name + '</td>' +
            '<td>' + data.last_name + '</td>' +
            '<td>' + data.email + '</td>' +
            '<td>' + data.phone + '</td>' +
            '<td>' +
            '<a href="#" class="btn btn-danger btn-sm delete-icon mx-2" data-id="' + data.id + '"><i class="fas fa-trash"></i></a>' +
            '<a href="#" class="btn btn-primary btn-sm edit-icon" data-id="' + data.id + '"><i class="fas fa-edit"></i></a>' +
            '</td>' +
            '</tr>';

        $table.find('tbody').append(row);
        sn++;
    }

    // Fetch data using AJAX and append to the table
    $.ajax({
        url: 'ajax/view.php', // PHP script to fetch data
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            // Assuming data is an array of objects
            // console.log(data.data);
            for (var i = 0; i < data.data.length; i++) {
                appendRow(data.data[i]);
            }
            let dataTable = $("#personnelTable").DataTable();

        },
        error: function (error) {
            console.error('Error fetching data: ' + error);
        }
    });

</script>


<?php include('layout/footer.php'); ?>