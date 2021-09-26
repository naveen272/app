<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'demo');
// Downloads files
if (isset($_GET['file_path'])) {
    $id = $_GET['file_path'];
    // fetch file to download from database
    $sql = "SELECT * FROM employees WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $file = mysqli_fetch_assoc($result);
    $filepath = 'documents/'.$file['file_path'];
}
?>
<tbody>
      <tr>
      <td><a>Download</a></td>
    </tr>
  </tbody>
</html>