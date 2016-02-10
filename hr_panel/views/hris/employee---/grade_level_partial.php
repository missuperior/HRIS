    <table class="table table-striped table-bordered table-hover">
                                        <tr>
                                            <th>Sr #</th>
                                            <th>Grade</th>
                                            <th>Level</th>
                                            <th>Min</th>
                                            <th>Mid</th>
                                            <th>Max</th>
                                            <th>Created By</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php
                                        $i = 1;
                                        foreach ($salary as $value) {
                                            echo '<tr>';
                                            echo '<td>' . $i . '</td>';
                                            echo '<td>' . $value['class'] . '</td>';
                                            echo '<td>' . $value['title'] . '</td>';
                                            echo '<td>' . $value['min'] . '</td>';
                                            echo '<td>' . $value['mid'] . '</td>';
                                            echo '<td>' . $value['max'] . '</td>';
                                            echo '<td>' . $value['hris_username'] . '</td>';
                                            echo '<td>' . $value['created_date'] . '</td>';
                                            ?>

                                            <td><a href="<?php echo base_url() ?>hris/delete_salary/<?php echo $value['salary_id']; ?>" onclick="return confirm('Are you sure?');">Delete</a></td>

<?php } ?>
                                    </table>