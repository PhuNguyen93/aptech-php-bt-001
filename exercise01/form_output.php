<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kết quả xếp loại học sinh</title>
    <style>
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    $students = [];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        for ($i = 1; $i <= 5; $i++) {
            $name = test_input($_POST["name$i"]);
            $score = test_input($_POST["score$i"]);
            if (empty($name) || empty($score)) {
                echo "All fields are required";
                return;
            }
            if (!is_numeric($score)) {
                echo "Scores must be numeric";
                return;
            }
            $students[] = ['name' => $name, 'score' => (float)$score];
        }

        // usort($students, function($a, $b) {
        //     return $b['score'] <=> $a['score'];
        // });

        function getGrade($score) {
            if ($score >= 8) return "Xuất sắc";
            if ($score >= 6.5) return "Khá";
            if ($score >= 5) return "Trung bình";
            return "Yếu";
        }

        $totalScore = 0;
        echo "<h2>Kết quả xếp loại học sinh:</h2>";
        echo "<table>
                <tr>
                    <th>Tên</th>
                    <th>Điểm</th>
                    <th>Xếp loại</th>
                </tr>";
        foreach ($students as $student) {
            $totalScore += $student['score'];
            echo "<tr>
                    <td>{$student['name']}</td>
                    <td>{$student['score']}</td>
                    <td>" . getGrade($student['score']) . "</td>
                  </tr>";
        }
        $averageScore = $totalScore / count($students);
        echo "<tr>
                <td>Điểm trung bình của cả lớp</td>
                <td>" . $averageScore . "</td>
              </tr>";
        echo "</table>";
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <a href="form_input.php">Quay lại trang nhập liệu</a>
</body>
</html>
