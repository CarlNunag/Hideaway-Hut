<div class="sidebar-body">
            <ul class="sidebar-body-menu">
              
                <li>
                    <a class="active" href="admin-index.php"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                </li>

                <li>
                    <a href="admin-online-orders.php"><span class="icon home" aria-hidden="true"></span>Online Orders</a>
                </li>

                <li>
                    <a href="admin-walk-in-orders.php"><span class="icon home" aria-hidden="true"></span>Walk-in Orders</a>
                </li>

                <li>
                    <a href="admin-inventory.php">
                      <span class="icon home" aria-hidden="true">
                      </span>Inventory</a>
                </li>

                <li>
                    <a href="admin-updateinventory.php">
                        <span class="icon home" aria-hidden="true">
                    </span>Update Inventory</a>
                </li>
            </ul>
        </div>
























        <table class="posts-table" >
                <thead>
                  <tr class="users-table-info">
                    <th style="width: 3rem;">Order ID</th>
                    <th style="width: 3rem;">Quantity</th>
                    <th style="width: 6rem;">Delivery Address</th>
                    <th style="width: 3rem;">Subtotal</th>
                    <th style="width: 4.5rem;">Delivery Fee</th>
                    <th style="width: 6rem;">Amount Payable</th>
                    <th style="width: 6rem;">Payment Mode</th>
                    <th style="width: 5rem;">Rider Notes</th>
                    <th style="width: 5rem;">Order Status</th>
                    <th style="width: 5rem;">Contact Number</th>
                    <th style="width: 5rem;">Action</th>
                  </tr>
                </thead>
                <tbody>

                <?php
                            $count=1;
                            $sel_query="Select * from placedorders ORDER BY orderID;";
                            $result = mysql_query($sel_query);
                            while($row = mysql_fetch_assoc($result)) { ?>

                  <tr>
                    <td style="width: 3rem;">
                      <?php echo $row["orderID"]; ?>
                    </td>
                    
                    <td style="width: 3rem;">
                      <?php echo $row["productQuantity"]; ?>
                    </td>

                    <td style="width: 6rem">
                      <?php echo $row["deliveryAddress"]; ?>
                    </td>

                    <td vstyle="width: 3rem;">
                    <?php echo $row["subTotal"]; ?>
                    </td>

                    <td style="width: 4.5rem;">
                    <?php echo $row["deliveryFee"]; ?>
                    </td>

                    <td style="width: 6rem;">
                    <?php echo $row["amountPayable"]; ?>
                    </td>

                    <td style="width: 6rem;">
                    <?php echo $row["paymentMode"]; ?>
                    </td>

                    <td style="width: 5rem;">
                    <?php echo $row["riderNotes"]; ?>
                    </td>

                    <td style="width: 5rem;">
                    <?php echo $row["orderStatus"]; ?>
                    </td>

                    <td style="width: 5rem;">
                    <?php echo $row["contactNumber"]; ?>
                    </td>

                    <td style="width: 5rem;">
                      <span class="p-relative">
                        <button class="dropdown-btn transparent-btn" type="button" title="More info">
                          <div class="sr-only">More info</div>
                          <i data-feather="more-horizontal" aria-hidden="true"></i>
                        </button>
                        <ul class="users-item-dropdown dropdown">
                          <li><a href="update.php?id=<?php echo $row['orderID']; ?>">Update Status</a></li>
                          <li><a href="deleteonlineorders.php?id=<?php echo $row['orderID']; ?>">Remove</a></li>
                        </ul>
                      </span>
                    </td>
                    
                  </tr>

                  <?php $count++; } ?>

                </tbody>
              </table>









              font-size: 2rem;
    font-weight: bolder;