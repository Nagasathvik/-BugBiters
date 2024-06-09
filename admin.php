<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HOMEHUNT - Admin</title>
    <style>
      form {
    max-width: 600px;
    margin: 0 auto;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="file"],
input[type="text"],
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

button {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #333;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #555;
}
</style>
  <link rel="stylesheet" href="styles.css" />

  </head>
  <body>
    <main>
      <h1>Admin Dashboard</h1>
      <form
        id="house-form"
        action="upload.php"
        method="post"
        enctype="multipart/form-data"
      >
        <div class="form-group">
          <label for="house-images">Upload House Images (Max 3):</label>
          <input
            type="file"
            id="house-images"
            name="house-images[]"
            accept="image/*"
            multiple
          />
          <small id="image-error" style="color: red; display: none"
            >You can upload up to 3 images only.</small
          >
        </div>
        <div class="form-group">
          <label for="category">Category:</label>
          <select id="category" name="category">
            <option value="family">Family</option>
            <option value="bachelor">Bachelor</option>
          </select>
        </div>
        <div class="form-group">
          <label for="city">City:</label>
          <input type="text" id="city" name="city" autocomplete="off" />
        </div>
        <button type="submit">Submit</button>
      </form>
    </main>

    <footer>
      <div class="footer-content">
        <p>&copy; 2024 HOMEHUNT. All Rights Reserved.</p>
        <div class="footer-links">
          <a href="#contact">Contact Us</a>
          <a href="#privacy">Privacy Policy</a>
          <a href="#terms">Terms of Service</a>
        </div>
      </div>
    </footer>

    <script src="script.js"></script>
  </body>
</html>
