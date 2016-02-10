<div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">
    <ul class="breadcrumb">
      <li>
        <i class="icon-home home-icon"></i>
        <a href="#">Dashboard</a>

        <span class="divider">
          <i class="icon-angle-right arrow-icon"></i>
        </span>
      </li>

      <li>
        Vacancy Management

        <span class="divider">
          <i class="icon-angle-right arrow-icon"></i>
        </span>
      </li>
      <li class="active">Vacancy Detail</li>
    </ul><!--.breadcrumb-->

  </div>

    <div class="page-content">
        
        <div class="page-header position-relative">
            <h1>
                Vacancy Detail          
            </h1>
        </div><!--/.page-header-->
        <table class="table table-striped table-bordered table-hover">
                            <tbody>                            
                            <tr>                                                                        
                              <th>Company Name</th>
                              <td><?php echo $vacancybyid[0]['company_name']; ?></td>
                            </tr>
                            
                            <tr>                                                                        
                              <th>Department_Name</th>
                              <td><?php echo $vacancybyid[0]['department_name']; ?></td>
                            </tr>
                            
                            <tr>                                                                        
                              <th>Designation</th>
                              <td><?php echo $vacancybyid[0]['designation_title']; ?></td>
                            </tr>
                            
                            <tr>                                                                        
                              <th>City</th>
                              <td><?php echo $vacancybyid[0]['city_name']; ?></td>
                            </tr>
                            
                            <tr>                                                                        
                              <th>Degree & Experience  </th>
                              <td><?php echo $vacancybyid[0]['dgree_name'].' </br> ' .$vacancybyid[0]['min_experience'].'<strong>  - </strong> '.$vacancybyid[0]['max_experience'].' Year'; ?></td>
                            </tr>
                            
                            <tr>                                                                        
                              <th>Shift & Timing</th>
                              <td><?php echo $vacancybyid[0]['job_type_time'].$vacancybyid[0]['job_shift'];   ?></td>
                            </tr>
                            
                            <tr>                                                                        
                              <th>Gender & Age</th>
                              <td><?php echo $vacancybyid[0]['gender'].'</br>'.$vacancybyid[0]['min_age'].'<strong>  - </strong>'.$vacancybyid[0]['max_age'].' year'; ?></td>
                            </tr>
                            
                            <tr>                                                                        
                              <th>Total Vacancy</th>
                              <td><?php echo $vacancybyid[0]['count_vacancy']; ?></td>
                            </tr>
                            
                            <tr>                                                                        
                              <th>Traveling</th>
                              <td>                             
                                <?php echo $vacancybyid[0]['traveling']; ?>
                              </td>
                            </tr>
                            <?php if($vacancybyid[0]['salery_visible'] == 'on'){ ?>
                            <tr>                                                                        
                              <th>Salary Package</th>
                              <td><?php echo $vacancybyid[0]['min_salery'].'<strong>  - </strong>'.$vacancybyid[0]['max_salery'].' Rs/-'; ?></td>
                            </tr>
                            <?php } ?>
                             <tr>                                                                        
                              <th>Job Open</th>
                              <td><?php echo date("l jS \of F Y", strtotime($vacancybyid[0]['s_date'])).'<strong> To </strong>'.date("l jS \of F Y", strtotime($vacancybyid[0]['e_date'])); ?></td>
                            </tr>
                             <tr>                                                                        
                              <th>Job Detail's</th>
                              <td><?php echo $vacancybyid[0]['vecancy_detail']; ?></td>
                            </tr>
                          </tbody>
                        </table>
           
        </div><!--/.page-content-->

        
    </div><!--/.main-content-->
 
 