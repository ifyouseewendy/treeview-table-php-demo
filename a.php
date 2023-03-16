
<?php $items_level_1 = find_by_parent_id($data, $0); ?>
<?php foreach ($items_level_1 as $item) { ?>
  <tbody>
    <tr>
      <td data-toggle="toggle">
        <?php echo $item['org_id'] ?>
      </td>
      <td>
        <?php echo $item['parent_id'] ?>
      </td>
      <td>
        <?php echo $item['col1'] ?>
      </td>
      <td>
        <?php echo $item['col2'] ?>
      </td>
      <td>
        <?php echo $item['col3'] ?>
      </td>
    </tr>
    <?php $items_level_2 = find_by_parent_id($data, $item['org_id']); ?>
    <?php foreach ($items_level_2 as $item2) { ?>
    <tr class="hide">
      <td>Central America</td>
      <td>$7,685.00</td>
      <td>$3,544.00</td>
      <td>$5,834.00</td>
      <td>$10,583.00</td>
    </tr>
    <tr class="hide">
      <td>Australia</td>
      <td>$7,685.00</td>
      <td>$3,544.00</td>
      <td>$5,834.00</td>
      <td>$10,583.00</td>
    </tr>
  </tbody>
?>
  $item
}
