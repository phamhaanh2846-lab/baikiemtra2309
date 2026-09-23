<?php

// Ket noi database
$conn = new mysqli("localhost", "root", "", "quanly_hocsinh");

if ($conn->connect_error) {
    die("Loi ket noi");
}

// Them hoc sinh
if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $grade = $_POST["grade"];

    $sql = "INSERT INTO students (id, name, age, grade)
            VALUES ('$id', '$name', '$age', '$grade')";

    $conn->query($sql);
}

// Lay danh sach
$students = [];

$result = $conn->query("SELECT * FROM students");

if (!$result) {
    die("Loi SQL: " . $conn->error);
}

while ($row = $result->fetch_assoc()) {
    $students[] = $row;
}

// Tim diem cao nhat
function findHighest($students) {
    $highest = $students[0];

    foreach ($students as $student) {
        if ($student["grade"] > $highest["grade"]) {
            $highest = $student;
        }
    }

    return $highest;
}
?>

<h2>Quan ly hoc sinh</h2>

<!-- Form nhap -->
<form method="post">
    ID: <input type="number" name="id"><br><br>
    Ho ten: <input type="text" name="name"><br><br>
    Tuoi: <input type="number" name="age"><br><br>
    Diem: <input type="number" name="grade" step="0.1"><br><br>

    <input type="submit" name="submit" value="Them">
</form>

<hr>

<h3>Danh sach hoc sinh</h3>

<?php
foreach ($students as $student) {
    echo "ID: " . $student["id"] . "<br>";
    echo "Ho ten: " . $student["name"] . "<br>";
    echo "Tuoi: " . $student["age"] . "<br>";
    echo "Diem: " . $student["grade"] . "<br>";
    echo "<hr>";
}

if (count($students) > 0) {
    $highest = findHighest($students);

    echo "<h3>Hoc sinh co diem cao nhat</h3>";
    echo "Ho ten: " . $highest["name"] . "<br>";
    echo "Diem: " . $highest["grade"];
}
?>