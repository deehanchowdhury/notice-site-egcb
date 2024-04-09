<?php
$con = mysqli_connect("localhost","root","","egcb_notice");
$res = mysqli_query($con,"select * from notices join notice_types on notices.notice_type_id = notice_types.id order by notice_date desc");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
</head>
<body>
    <div class="container" style="margin-top:50px;">

    <table class="table table-striped table-hover table-dark">
        <thead class=".thead-dark">
            <tr>
                <th>No.</th>
                <th>Notice Title</th>
                <th>Date</th>
                <th>Type</th>
            </tr>
            
        </thead>
        <tbody>
            <?php $id = 0; while($row = mysqli_fetch_assoc($res)) { $id = $id + 1; ?>
            <tr>
                <td><?php echo $id?></td>
                <td><?php echo $row['title']?></td>
                <td><?php echo $row['notice_date']?></td>
                <td><?php echo $row['name']?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
    
    <script>
        $(document).ready( function() {
            $('.table').DataTable();       
        });
    </script>
    
</body>
</html>