<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
      table, td, th {
        border: 1px solid;
      }

      table {
        width: 100%;
        border-collapse: collapse;
      }
    </style>
</head>
<body>
  <?php
    $data = [
      array('name' => 'Org 1', 'org_id' => 1, 'parent_id' => 0, 'col1' => "col1", 'col2' => 'col2', 'col3' => 'col3'),
      array('name' => 'Org 2', 'org_id' => 2, 'parent_id' => 0, 'col1' => "col1", 'col2' => 'col2', 'col3' => 'col3'),
      array('name' => 'Org 3', 'org_id' => 3, 'parent_id' => 1, 'col1' => "col1", 'col2' => 'col2', 'col3' => 'col3'),
      array('name' => 'Org 4', 'org_id' => 4, 'parent_id' => 1, 'col1' => "col1", 'col2' => 'col2', 'col3' => 'col3'),
      array('name' => 'Org 5', 'org_id' => 5, 'parent_id' => 2, 'col1' => "col1", 'col2' => 'col2', 'col3' => 'col3'),
      array('name' => 'Org 6', 'org_id' => 6, 'parent_id' => 2, 'col1' => "col1", 'col2' => 'col2', 'col3' => 'col3'),
      array('name' => 'Org 7', 'org_id' => 7, 'parent_id' => 3, 'col1' => "col1", 'col2' => 'col2', 'col3' => 'col3'),
      array('name' => 'Org 8', 'org_id' => 8, 'parent_id' => 3, 'col1' => "col1", 'col2' => 'col2', 'col3' => 'col3')
    ];

    function find_by_parent_id($data, $pid) {
      $result = [];
      foreach ($data as $item) {
        if ($item['parent_id'] == $pid) {
          array_push($result, $item);
        }
      }

      return $result;
    }

    function sort_data($data, $pid) {
      $items = find_by_parent_id($data, $pid);

      if (count($items) == 0) {
        return [];
      }

      $res = [];
      foreach ($items as $item) {
        array_push($res, $item);
        $res = array_merge($res, sort_data($data, $item['org_id']));
      }
      return $res;
    }

    $sorted_data = sort_data($data, 0);
  ?>
  <table class="collaptable">
    <tr>
      <th>name</th>
      <th>org_id</th>
      <th>parent_id</th>
      <th>col1</th>
      <th>col2</th>
      <th>col3</th>
    </tr>
    <?php foreach ($sorted_data as $item) { ?>
      <tr data-id="<?= $item['org_id'] ?>" data-parent="<?= $item['parent_id'] ?>">
        <td><?= $item['name']?></td>
        <td><?= $item['org_id']?></td>
        <td><?= $item['parent_id']?></td>
        <td><?= $item['col1']?></td>
        <td><?= $item['col2']?></td>
        <td><?= $item['col3']?></td>
      </tr>
    <?php } ?>
  </table>
  <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
  <script src="./jquery.aCollapTable.min.js"></script>
  <script>
    $('.collaptable').aCollapTable({ 
      // the table is collapased at start
      startCollapsed: true,

      // the plus/minus button will be added like a column
      addColumn: false, 

      // The expand button ("plus" +)
      plusButton: '<span class="i">+</span>', 

      // The collapse button ("minus" -)
      minusButton: '<span class="i">-</span>' 
    });
  </script>
</body>
</html>
