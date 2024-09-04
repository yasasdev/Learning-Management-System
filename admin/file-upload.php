<?php include('includes/header.php'); ?>

<form action="upload.php" method="post" enctype="multipart/form-data">
<div class="container mt-5">
        <div class="upload-container">
            <div class="col-md-4 mb-3 text-center">
                <h2 style="color: black;">Learning Management System</h2> <br><br>
                <h4>Upload your PDF here</h4>
                <input type="file" name="pdf" id="pdf" class="form-control" accept=".pdf" />
            </div>
        </div>
        <div class="text-center">
            <button type="button" id="uploadButton" class="btn btn-primary mt-3">Upload PDF</button>
            
            <a href="display-pdf.php">
                <button type="button" id="uploadButton" class="btn btn-warning mt-3">
                    Download PDF
                </button>
            </a>
        </div>
        <div id="message" class="mt-3 text-center"></div>
    </div>
</form>

<script>
    document.getElementById('uploadButton').addEventListener('click', function() {
        var formData = new FormData();
        var pdfFile = document.getElementById('pdf').files[0];

        if (pdfFile) {
            formData.append('pdf', pdfFile);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'upload.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    var messageDiv = document.getElementById('message');
                    if (response.status === 'success') {
                        messageDiv.innerHTML = '<div class="alert alert-success">' + response.message + '</div>';
                    } else {
                        messageDiv.innerHTML = '<div class="alert alert-danger">' + response.message + '</div>';
                    }
                } else {
                    alert('An error occurred!');
                }
            };
            xhr.send(formData);
        } else {
            alert('Please select a PDF file to upload.');
        }
    });
</script>

<?php include('includes/footer.php'); ?>