<?php
function takeMessage()
{
    global $connection;
    $messages = [];
    $i = 0;
    $query = "SELECT * FROM `chat`";
    $sort = 'time_desc';
    if (isset($_POST['sort'])) {
        $sort = $_POST['sort'];
    }
    switch ($sort) {
        case 'time_desc':
            $query .= " ORDER BY `time` DESC";
            break;
        case 'time_asc':
            $query .= " ORDER BY `time` ASC";
            break;
        case 'name_asc':
            $query .= " ORDER BY `login` ASC";
            break;
        case 'name_desc':
            $query .= " ORDER BY `login` DESC";
            break;
    }
    $query .= " limit 25";
    $select = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select)){
        $messages[] = $row;
    }
    $result = array_reverse($messages);
    while ($i < count($result)) {
        $login = $result[$i]['login'];
        $message = $result[$i]['message'];
        $time = $result[$i]['time'];
        $i++;
        echo  '
            <tr>
            <td>
        '.$login. ':' . '
        </td>
            <td>
        '.$message.'
            </td>
            <td style="font-size: 12px;">
            '.$time.'
            </td>
        </tr>
        ';
    }
}
