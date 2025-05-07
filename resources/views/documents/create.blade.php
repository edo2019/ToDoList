<!DOCTYPE html>
<html>

<head>
    <title>Upload Document</title>
</head>

<body>
    <h1>Upload New Document</h1>

    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Document Name:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="document">PDF File:</label>
            <input type="file" name="document" id="document" accept=".pdf" required>
        </div>

        <button type="submit">Upload</button>
    </form>
</body>

</html>