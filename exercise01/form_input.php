<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form nhập liệu học sinh</title>
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
    <h2>Nhập liệu học sinh</h2>
    <form method="post" action="form_output.php">
        <table>
            <?php for ($i = 1; $i <= 5; $i++): ?>
            <tr>
                <td>Tên học sinh <?php echo $i; ?>:</td> 
                <td><input type="text" name="name<?php echo $i; ?>" required></td>
            </tr>
            <tr>
                <td>Điểm học sinh <?php echo $i; ?>:</td>
                <td><input type="number" name="score<?php echo $i; ?>" step="0.01" required></td>
            </tr>
            <?php endfor; ?>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Submit">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
