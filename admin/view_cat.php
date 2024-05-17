 <?php include_once './inc/header.php';
         include_once './inc/nav.php';
        require_once './dBconn/functions.php';
    ?>
    <?php $view_cat = getCategories();?>

<div class="contain" style=" position: relative; left: 16%;">
                    <div class="col-lg-10">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Category</div>
                            </div>
                            <div class="ibox-body">
                            <table class="table table-bordered table-striped table-hover m-t-20" id="example-table" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th colspan="2" class="text-center">Label</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      
                                        <?php
                                            foreach ($view_cat as $category) {
                                                ?>
                                                <?php
                                                echo "<tr>";
                                                echo "<td>" . $category["id"] . "</td>";
                                                echo "<td>" . $category["category_name"] . "</td>"; 
                                                ?>
                                    
                                                                                                  
                                                    <td class="text-center">
                                                        <a href="#" class="btn btn-primary ">Edit </a>
                                                        <a class="btn btn-danger" name="delete" href="view_cat.php?delete=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
                                                        <a href="#" class="btn btn-success">Activate</a>
                                                    </td>
                                                    
                                                 </tr>
                                            <?php
                                              echo "</tr>";
                                           
                                            }
                                    ?>

                                        
                                    
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                        
                            </div>
                        </div>
                    </div>
                    
                </div>    
<?php include './inc/footer.php'; ?>