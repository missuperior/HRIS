<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Attendance extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->model('Attendance_model');
        $this->load->model('Hris_model');
        $this->load->library('session');

        // for form validation
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    // For Index Page hris
    public function index() {

        $this->load->view('hris/login');
    }

    public function parse_raw_attendance() {


        // leave_flag  = 1 if In/Out is missing and set =2 if employee is actually absent
        // scheduled = 1 for regular working day and scheduled =0 for off day working
        $from = $_POST['from'];

        if ($from == 'manual') {

            $emp_id = $_POST['employee'];
            $date_p = $_POST['att_date'];
            $In_date = $_POST['dtime1'];
            $Out_date = $_POST['dtime2'];
            $company_id = $_POST['company'];
            $department_id = $_POST['department'];





            //$all_emp = $this->Attendance_model->getAllemployees($emp_id);

            $all_emp = $this->Attendance_model->getEmployeeShift($emp_id);

            if (!empty($all_emp)) {
                $timestamp = strtotime($date_p);
                $day_name = date('D', $timestamp);
                $off_days = explode('-', $all_emp['off_days']);

                $date = date("Y-m-d", strtotime($date_p));

                $emp_status = $this->calulateTimeinhours($In_date, $Out_date, $all_emp[0]['shiftId']);

                $ins_data['emp_id'] = $emp_id;
                $ins_data['datetime'] = $date;
                $ins_data['remarks'] = $emp_status['status'];


                $dt = new DateTime($In_date);
                $time = $dt->format('H:i:s');

                $ins_data['checkIn'] = $time;

                $dt = new DateTime($Out_date);
                $time = $dt->format('H:i:s');

                $ins_data['checkOut'] = $time;
                $ins_data['campus_id'] = $company_id;
                $ins_data['department_id'] = $department_id;
                $ins_data['scheduled'] = 1;
                $ins_data['work_hour'] = $emp_status['working_minutes'];
                $ins_data['shift_id'] = $all_emp[0]['shiftId'];
                $ins_data['type'] = 'Manual';
                $ins_data['emp_leave_id'] = '';
                $employee_ins[] = $ins_data;




                $is_data_exist = $this->Attendance_model->getEmployeeAbsentRecord($emp_id, $date);
                if ($is_data_exist) {
                    $this->Attendance_model->deleteAbsent($emp_id, $date);
                }
                $is_att_exist = $this->Attendance_model->getEmployeeAttendanceRecord($emp_id, $date);
                if ($is_att_exist) {


                    $this->Attendance_model->updateAttendance($is_att_exist[0]['id'], $ins_data);
                } else {
                    $this->Attendance_model->setEmployeeAttendanseStatus($employee_ins);
                }

                $this->session->set_userdata('success', "Succefully Mark Attendance");
            } else {
                $this->session->set_userdata('error_msg', "Shift is Not assigned to User");
            }
            redirect('attendance/emp_attendance_mark');
        } else {
            $today = date("n/j/Y");
            $date = date("Y-m-d");


            $i = 1; //9
            $today = '';
            //  $date = '2015-10-01';

            $all_emp = $this->Attendance_model->getAllemployees();

            for (; $i <= 1; $i++) {
                $today = $i . '/';



                $employee_ins = array();
                foreach ($all_emp as $emp) {

                    for ($day = 1; $day < 32; $day++) {
                        $absent_data = array();
                        //$emp['emp_id'] = 945;
                        $emp_id = $emp['emp_id'];

                        $timestamp = strtotime($today . $day . '/2016');
                        $day_name = date('D', $timestamp);
                        $off_days = explode('-', $emp['off_days']);


                        if (in_array(strtolower($day_name), $off_days)) {
                            $abs_emp = $this->Attendance_model->getRawAttendanceMarking($today . $day . '/2016', $emp_id);
                            $date = date("Y-m-d", strtotime($today . $day . '/2016'));

                            if (!empty($abs_emp)) {

                                $emp_In = $this->Attendance_model->getEmployeeCheckTime($emp['emp_id'], 'IN', $today . $day . '/2015');
                                $emp_Out = $this->Attendance_model->getEmployeeCheckTime($emp['emp_id'], 'OUT', $today . $day . '/2015');
                                if (!empty($emp_In) && !empty($emp_Out)) {

                                    $emp_status = $this->calulateTimeinhours($emp_In[0]['AttenTime'], $emp_Out[0]['AttenTime'], $emp_In[0]['shift_id']);
                                    $ins_data['emp_id'] = $emp['emp_id'];
                                    $ins_data['datetime'] = '2016/' . $today . $day;
                                    $ins_data['remarks'] = 'Over-time';
                                    $dt = new DateTime($emp_In[0]['AttenTime']);
                                    $time = $dt->format('H:i:s');

                                    $ins_data['checkIn'] = $time;

                                    $dt = new DateTime($emp_Out[0]['AttenTime']);
                                    $time = $dt->format('H:i:s');



                                    $ins_data['checkOut'] = $time;
                                    $ins_data['campus_id'] = $emp['record_company_name'];
                                    $ins_data['department_id'] = $emp['department_id'];
                                    $ins_data['scheduled'] = 0;
                                    $ins_data['work_hour'] = $emp_status['working_minutes'];
                                    $ins_data['shift_id'] = $emp['shift_id'];

                                    $ins_data['type'] = 'Auto';

                                    $employee_ins[] = $ins_data;
                                } else {
                                    
                                }
                            }
                        } else {

                            $abs_emp = $this->Attendance_model->getRawAttendanceMarking($today . $day . '/2015', $emp_id);
                            $date = date("Y-m-d", strtotime($today . $day . '/2015'));


                            if (!empty($abs_emp)) {
                                $emp_In = $this->Attendance_model->getEmployeeCheckTime($emp['emp_id'], 'IN', $today . $day . '/2015');
                                $emp_Out = $this->Attendance_model->getEmployeeCheckTime($emp['emp_id'], 'OUT', $today . $day . '/2015');

                                if (!empty($emp_In) && !empty($emp_Out)) {
                                    $emp_status = $this->calulateTimeinhours($emp_In[0]['AttenTime'], $emp_Out[0]['AttenTime'], $emp_In[0]['shift_id']);
                                    $ins_data['emp_id'] = $emp['emp_id'];
                                    $ins_data['datetime'] = '2015/' . $today . $day;
                                    $ins_data['remarks'] = $emp_status['status'];


                                    $dt = new DateTime($emp_In[0]['AttenTime']);
                                    $time = $dt->format('H:i:s');

                                    $ins_data['checkIn'] = $time;

                                    $dt = new DateTime($emp_Out[0]['AttenTime']);
                                    $time = $dt->format('H:i:s');

                                    $ins_data['checkOut'] = $time;
                                    $ins_data['campus_id'] = $emp['record_company_name'];
                                    $ins_data['department_id'] = $emp['department_id'];
                                    $ins_data['scheduled'] = 1;
                                    $ins_data['work_hour'] = $emp_status['working_minutes'];
                                    $ins_data['shift_id'] = $emp_In[0]['shift_id'];
                                    $ins_data['type'] = 'Auto';
                                    $ins_data['emp_leave_id'] = '';
                                    $employee_ins[] = $ins_data;
                                } else {

                                    $ins_data['emp_id'] = $emp['emp_id'];
                                    $ins_data['datetime'] = '2015/' . $today . $day;
                                    $ins_data['remarks'] = 'Absent';
                                    $ins_data['checkIn'] = '';
                                    $ins_data['checkOut'] = '';
                                    $ins_data['campus_id'] = $emp['record_company_name'];
                                    $ins_data['department_id'] = $emp['department_id'];
                                    //$ins_data['scheduled'] = !in_array($day_name, $off_days);
                                    $ins_data['shift_id'] = $emp['shift_id'];
                                    $ins_data['type'] = 'Auto';
                                    $ins_data['scheduled'] = 1;
                                    $ins_data['work_hour'] = '';
                                    $ins_data['emp_leave_id'] = '';
                                    $employee_ins[] = $ins_data;
                                }
                            } else {


                                $allreadyLeaveRecord = $this->Attendance_model->getEmployeeAbsentRecord($emp_id, $today . $day . '/2015');

                                if (!empty($allreadyLeaveRecord)) {
                                    $ins_data['emp_id'] = $emp['emp_id'];
                                    $ins_data['datetime'] = '2015/' . $today . $day;
                                    $ins_data['remarks'] = 'Leave';
                                    $ins_data['checkIn'] = '';
                                    $ins_data['checkOut'] = '';
                                    $ins_data['campus_id'] = $emp['record_company_name'];
                                    $ins_data['department_id'] = $emp['department_id'];
                                    //$ins_data['scheduled'] = !in_array($day_name, $off_days);
                                    $ins_data['shift_id'] = $emp['shift_id'];
                                    $ins_data['type'] = 'Auto';

                                    $ins_data['scheduled'] = 1;
                                    $ins_data['work_hour'] = '';
                                    $ins_data['emp_leave_id'] = $allreadyLeaveRecord[0]['emp_leave_id'];
                                } else {
                                    $ins_data['emp_id'] = $emp['emp_id'];
                                    $ins_data['datetime'] = '2015/' . $today . $day;
                                    $ins_data['remarks'] = 'Absent';
                                    $ins_data['checkIn'] = '';
                                    $ins_data['checkOut'] = '';
                                    $ins_data['campus_id'] = $emp['record_company_name'];
                                    $ins_data['department_id'] = $emp['department_id'];
                                    //$ins_data['scheduled'] = !in_array($day_name, $off_days);
                                    $ins_data['shift_id'] = $emp['shift_id'];
                                    $ins_data['type'] = 'Auto';

                                    $ins_data['scheduled'] = 1;
                                    $ins_data['work_hour'] = '';
                                    $ins_data['emp_leave_id'] = '';
                                }







                                $employee_ins [] = $ins_data;
                            }
                        }
                    }


//                echo '<pre>';
//                var_dump($employee_ins); die;
//
//                echo '<pre>';
//                var_dump($employee_ins); die;

                    $this->Attendance_model->setEmployeeAttendanseStatus($employee_ins);
                    //   $this->Attendance_model->add_absent($absent_data);

                    $employee_ins = array();
                    $absent_data = array();
                }
            }
        }




























//        $today = date("n/j/Y");
//        $date = date("Y-m-d");
//
//        $today = '04/';
//        //  $date = '2015-10-01';
//
//        $all_emp = $this->Attendance_model->getAllemployees();
//        $employee_ins = array();
//        foreach ($all_emp as $emp) {
//
//            for ($day = 23; $day < 32; $day++) {
//                //$emp['emp_id'] = 1;
//                $abs_emp = $this->Attendance_model->getRawAttendanceMarking($today . $day . '/2015', $emp['emp_id']);
//
//                
//                
//                $date = date("Y-m-d", strtotime($today . $day . '/2015'));
//
//                $timestamp = strtotime($today . $day . '/2015');
//                $day_name = date('D', $timestamp);
//
//                $off_days = explode('-', $abs_emp['off_days']);
//
//                if (!empty($abs_emp)) {
//
//                    //$day = 16;
//                    $emp_In = $this->Attendance_model->getEmployeeCheckTime($emp['emp_id'], 'IN', $today . $day . '/2015');
//                    $emp_Out = $this->Attendance_model->getEmployeeCheckTime($emp['emp_id'], 'OUT', $today . $day . '/2015');
//
//
//
//                    if (!empty($emp_In) && !empty($emp_Out)) {
//
//
//
//                        $emp_status = $this->calulateTimeinhours($emp_In[0]['AttenTime'], $emp_Out[0]['AttenTime'], $emp_In[0]['emp_shift']);
//                    }
//
//
//
//
//                    $ins_data['emp_id'] = $emp['emp_id'];
//                    $ins_data['datetime'] = '2015/' . $today . $day;
//                    $ins_data['remarks'] = $emp_status['status'];
//
//
//                    $dt = new DateTime($emp_In[0]['AttenTime']);
//                    $time = $dt->format('H:i:s');
//
//                    $ins_data['checkIn'] = $time;
//
//                    $dt = new DateTime($emp_Out[0]['AttenTime']);
//                    $time = $dt->format('H:i:s');
//
//
//
//                    $ins_data['checkOut'] = $time;
//                    $ins_data['campus_id'] = $emp['record_company_name'];
//                    $ins_data['department_id'] = $emp['department_id'];
//                    $ins_data['scheduled'] = !in_array($day_name, $off_days);
//                    $ins_data['work_hour'] = $emp_status['working_minutes'];
//                    $ins_data['shift_id'] = $emp_In[0]['emp_shift'];
//                    $employee_ins[] = $ins_data;
//                } else {
//
//                    $ins_data['emp_id'] = $emp['emp_id'];
//                    $ins_data['datetime'] = '2015/' . $today . $day;
//                    $ins_data['remarks'] = 'Absent';
//                    $ins_data['checkIn'] = '';
//                    $ins_data['checkOut'] = '';
//                    $ins_data['campus_id'] = $emp['record_company_name'];
//                    $ins_data['department_id'] = $emp['department_id'];
//                    //$ins_data['scheduled'] = !in_array($day_name, $off_days);
//                    $ins_data['shift_id'] = $emp['emp_shift'];
//                    $employee_ins [] = $ins_data;
//                }
//            }
//
//
//            $this->Attendance_model->setEmployeeAttendanseStatus($employee_ins);
//
//            $employee_ins = array();
//        }
    }

    public function department_date_wise_report() {
        //$this->login_check();
        $result['department'] = $this->Hris_model->getAllDepartments();
        $result['company'] = $this->Hris_model->getCampany();
        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('attendance/attendance_view', $result);
        $this->load->view('hris_ace/hris_footer');
    }

    public function employee_attendance_report() {

        $dept_id = $this->input->post('department');
        $comp_id = $this->input->post('company');
        $date = $this->input->post('att_date');
        $date2 = $this->input->post('end_date');

        $emp_data['emp_data'] = $this->Attendance_model->getEmployeeAttendanse($dept_id, $comp_id, $date, $date2);

        $this->load->view('hris_ace/hris_header');
        $this->load->view('attendance/employee_attendance_report', $emp_data);
        $this->load->view('hris_ace/hris_footer');

//    $this->load->view('hris_ace/hris_header');
//    $this->load->view('hris_ace/hris_side_menu');
//    $this->load->view('attendance/employee_attendance_report', $emp_data);
//    $this->load->view('hris_ace/hris_footer');
    }

    public function add_shift() {

        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('attendance/shiftAdd');
        $this->load->view('hris_ace/hris_footer');
    }

    public function saveShift() {

        $shiftData = array();
        if ($_POST['is_flex'] == 'on') {
            $shiftData['shift_type'] = 'flexible';
            $time_in_24_hour_format = date("H:i:s", strtotime($_POST['ftime1']));
            $shiftData['flexible_start'] = $time_in_24_hour_format;
            $time_in_24_hour_format = date("H:i:s", strtotime($_POST['ftime2']));
            $shiftData['flexible_end'] = $time_in_24_hour_format;
        } else {
            $shiftData['shift_type'] = 'regular';
            $shiftData['In'] = date("H:i:s", strtotime($_POST['dtime1']));
            $shiftData['Out'] = date("H:i:s", strtotime($_POST['dtime2']));
            ;
        }

        $offDays = '';
        $i = 0;
        foreach ($_POST['off-days'] as $value) {
            if ($i == 0) {
                $offDays = $offDays . $value;
            } else {
                $offDays = $offDays . '-' . $value;
            }
            $i++;
        }

        $shiftData['relaxation'] = $_POST['relaxation'];
        $shiftData['total_occuer'] = $_POST['relaxation-occur'];
        $shiftData['working_hours'] = $_POST['total_hours'];
        $shiftData['shift_schedule'] = $_POST['shift_schedule'];
        $shiftData['off_days'] = $offDays;

        $shiftData['title'] = $_POST['title'];

        $id = $this->Attendance_model->saveShift($shiftData);

        redirect('attendance/view_shift');
    }

    public function view_shift() {
        $data['shifts'] = $this->Attendance_model->getShift();

        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('attendance/shiftView', $data);
        $this->load->view('hris_ace/hris_footer');
    }

    public function edit_shift($id) {
        $data['shift'] = $this->Attendance_model->getShiftById($id);
        if (!empty($data['shift'])) {
            $data['offDays'] = explode('-', $data['shift'][0]['off_days']);
        }


        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('attendance/shiftEdit', $data);
        $this->load->view('hris_ace/hris_footer');
    }

    public function EditShift() {
        $shiftData = array();


        if ($_POST['is_flex'] == 'on') {
            $shiftData['shift_type'] = 'flexible';
            $time_in_24_hour_format = date("H:i:s", strtotime($_POST['ftime1']));
            $shiftData['flexible_start'] = $time_in_24_hour_format;
            $time_in_24_hour_format = date("H:i:s", strtotime($_POST['ftime2']));
            $shiftData['flexible_end'] = $time_in_24_hour_format;
            $shiftData['In'] = '';
            $shiftData['Out'] = '';
        } else {
            $shiftData['shift_type'] = 'regular';
            $shiftData['In'] = date("H:i:s", strtotime($_POST['dtime1']));
            $shiftData['Out'] = date("H:i:s", strtotime($_POST['dtime2']));
            $shiftData['flexible_start'] = '';
            $shiftData['flexible_end'] = '';
            ;
        }




//        if ($_POST['is_flex'] == 'on') {
//            $shiftData['shift_type'] = 'flexible';
//            $shiftData['flexible_start'] = $_POST['ftime1'];
//            $shiftData['flexible_end'] = $_POST['ftime2'];
//            $shiftData['In'] = '';
//            $shiftData['Out'] = '';
//        } else {
//            $shiftData['shift_type'] = 'regular';
//            $shiftData['In'] = $_POST['dtime1'];
//            $shiftData['Out'] = $_POST['dtime2'];
//            $shiftData['flexible_start'] = '';
//            $shiftData['flexible_end'] = '';
//        }

        $offDays = '';
        $i = 0;
        foreach ($_POST['off-days'] as $value) {
            if ($i == 0) {
                $offDays = $offDays . $value;
            } else {
                $offDays = $offDays . '-' . $value;
            }
            $i++;
        }

        $shiftData['relaxation'] = $_POST['relaxation'];
        $shiftData['total_occuer'] = $_POST['relaxation-occur'];
        $shiftData['working_hours'] = $_POST['total_hours'];
        $shiftData['shift_schedule'] = $_POST['shift_schedule'];
        $shiftData['off_days'] = $offDays;

        $shiftData['title'] = $_POST['title'];

        $id = $this->Attendance_model->saveShiftById($_POST['id'], $shiftData);

        redirect('attendance/view_shift');
    }

    public function delete_shift($id) {
        $id = $this->Attendance_model->deleteShiftById($id);

        redirect('attendance/view_shift');
    }

//    public function emp_shift() {
//        //$this->login_check();
//        $result['department'] = $this->Hris_model->getAllDepartments();
//        $result['company'] = $this->Hris_model->getCampany();
//
//        $this->load->view('hris_ace/hris_header');
//        $this->load->view('hris_ace/hris_side_menu');
//        $this->load->view('attendance/shift/employee_search', $result);
//        $this->load->view('hris_ace/hris_footer');
//    }
//    public function search_employee_for_shift() {
//        $dept_id = $this->input->post('department');
//        $comp_id = $this->input->post('company');
//        $dept_data = array(
//            'hr_employee_record.department_id' => $dept_id,
//            'hr_employee_record.record_company_name' => $comp_id
//        );
//
//        $result['employee'] = $this->Hris_model->searchEmpsal($dept_data);
//        $res = $result['employee'];
//        $result['shifts'] = $this->Hris_model->getShift();
//        if (!empty($res)) {
//
//            $this->load->view('attendance/shift/search_employee_for_shift'
//                    . '', $result);
//        } else {
//            $this->session->set_userdata('error_msg', "Record not Found");
//            redirect('hris/search_salary');
//        }
//    }
//    public function test() {
//
//        $data['emp_id'] = array();
//        $emp_ids = $_POST['emp_id'];
//
//        $shift_id = $_POST['shift'];
//        foreach ($emp_ids as $value) {
//
//            $return = $this->Attendance_model->EmployeeShift($value, array('hr_employee_record.shift_id' => $shift_id));
//            if ($return == 0) {
//                $this->session->set_userdata('error_msg', "Error While updating..");
//                redirect('attendance/emp_shift');
//            }
//        }
//        $this->session->set_userdata('success_msg', "Successfully Assigned shift");
//        redirect('attendance/emp_shift');
//    }

    function calulateTimeinhours($start, $end, $id) {
//        $id = 17;
//        $start = '8/8/2015 1:10:27 AM';
//        $end = '8/8/2015 10:45:09 PM';




        $data['shift'] = $this->Attendance_model->getShiftById($id);


        $shift_start = $data['shift'][0]['In'];
        $shift_end = $data['shift'][0]['Out'];
        $st = new DateTime($start);
        $et = new DateTime($end);

        $starttime = $st->format('h:i:s A');
        $endtime = $et->format('h:i:s A');


        $time_in_24_hour_format = date("H:i:s", strtotime($start));

        $time_out_24_hour_format = date("H:i:s", strtotime($end));


        $time_out_24_hour_format;
        if ($time_out_24_hour_format > $shift_end) {
            $time_out_24_hour_format = $shift_end;
        }



        if ($time_in_24_hour_format < $shift_start) {
            $time_in_24_hour_format = $shift_start;
        }

        $time_out_24_hour_format;
        $time_in = $st->format('m/d/Y') . ' ' . $time_in_24_hour_format;

        $time_out = $et->format('m/d/Y') . ' ' . $time_out_24_hour_format;



        $datetime1 = new DateTime($time_in);
        $datetime2 = new DateTime($time_out);
        $interval = $datetime1->diff($datetime2);



        $workinghours = (($interval->h) * 60) + $interval->i;

        $emp_status_arr['working_minutes'] = $workinghours;

        $diff = ($data['shift'][0]['working_hours'] * 60) - ($emp_status_arr['working_minutes']);


        if ($diff < 15 || $workinghours == ($data['shift'][0]['working_hours'] * 60)) {
            $emp_status_arr['status'] = 'on time';
        } else if ($diff >= 15 && $diff < 60) {
            $emp_status_arr['status'] = 'tardiness';
        } else if ($workinghours < ($data['shift'][0]['working_hours'] * 60) * 0.5) {
            $emp_status_arr['status'] = 'full absence';
        } else if (($workinghours > ($data['shift'][0]['working_hours'] * 60) * 0.5) && $workinghours < ($data['shift'][0]['working_hours'] * 60)) {
            $emp_status_arr['status'] = 'partial absence';
        }


        return $emp_status_arr;
    }

//     function calulateTimeinhours($start, $end, $id) {
//       
//                   $to_time = strtotime("2008-12-12 19:00:00");
//$from_time = strtotime("2008-12-13 04:00:00");
//echo round(abs($to_time - $from_time) / 60 / 60,2). " minute"; die;
//        
//        
//        
//        $id = 5;
//        $start = '12/16/2015 9:12:00 PM';
//        $end = '12/17/2015 4:00:22 AM';
//     
//        $data['shift'] = $this->Attendance_model->getShiftById($id);
//        $shift_start = $data['shift'][0]['In'];
//        $shift_end = $data['shift'][0]['Out'];
//        $st = new DateTime($start);
//        $et = new DateTime($end);
//        $starttime = $st->format('h:i:s A');
//        $endtime = $et->format('h:i:s A');
//       
//        $endtime = strtotime($end);
//        $starttime = strtotime($start);
//        
//       
//        //$starttime = date("H:i:s", strtotime($starttime));
//         //$time_in_24_hour_format = date("H:i:s", strtotime($start));
//       //  $time_out_24_hour_format = date("H:i:s", strtotime($end)); 
//       
//        if ($endtime > $shift_end) {
//            $time_out_24_hour_format = $shift_end;
//        }
//        if ($starttime < $shift_start) {
//            $time_in_24_hour_format = $shift_start;
//        }
//
//        $time_in = $time_in_24_hour_format;
//
//        $time_out = $time_out_24_hour_format;
//
//        list($hours, $minutes) = explode(':', $time_in);
//        $startTimestamp = mktime($hours, $minutes);
//
//
//        list($hours, $minutes) = explode(':', $time_out);
//        $endTimestamp = mktime($hours, $minutes);
//
//
////        if ($startTimestamp > $endTimestamp) {
////            $seconds = $startTimestamp - $endTimestamp;
////        } else {
////            $seconds = $endTimestamp - $startTimestamp;
////        }
//
//        
//         $start = '12/16/2015 9:12:00 PM';
//        $end = '12/17/2015 4:00:22 AM';
//        
//$now = new DateTime($start);
//$then = new DateTime($end);
//$diff = $then->diff($now);
//echo $diff->format('%i minutes %s seconds');
//        
//        die;
//        
//       $seconds = $endTimestamp - $startTimestamp;
//        $minutes = ($seconds / 60) % 60;
//        $hours = floor($seconds / (60 * 60));
//
//
//
//        $workinghours = $diff->format('%i') + $minutes;
//
//
//        $emp_status_arr['working_minutes'] = $workinghours;
//
//        $diff = ($data['shift'][0]['working_hours'] * 60) - ($workinghours);
//        if ($diff < 15 || $workinghours == ($data['shift'][0]['working_hours'] * 60)) {
//            $emp_status_arr['status'] = 'on time';
//        } else if ($diff >= 15 && $diff < 60) {
//            $emp_status_arr['status'] = 'tardiness';
//        } else if ($workinghours < ($data['shift'][0]['working_hours'] * 60) * 0.5) {
//            $emp_status_arr['status'] = 'full absence';
//        } else if (($workinghours > ($data['shift'][0]['working_hours'] * 60) * 0.5) && $workinghours < ($data['shift'][0]['working_hours'] * 60)) {
//            $emp_status_arr['status'] = 'partial absence';
//        }
//
//        echo '<pre>';
//        var_dump($emp_status_arr);
//        die;
//        return $emp_status_arr;
//    }


    public function emp_shift() {
        // $this->login_check();
        $result['department'] = $this->Hris_model->getAllDepartments();
        $result['company'] = $this->Hris_model->getCampany();

        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('attendance/shift/employee_search', $result);
        $this->load->view('hris_ace/hris_footer');
    }

    public function search_employee_for_shift() {
        $dept_id = $this->input->post('department');
        $comp_id = $this->input->post('company');

        $result['page_name'] = $this->input->post('page_from');



        if ($result['page_name'] == 'report') {
            $result['employee'] = $this->Attendance_model->searchEmpAttendance($dept_id, $comp_id);
            $this->load->view('attendance/reports/employee_search', $result);
        } elseif ($result['page_name'] != 'absent_mark') {
            $result['employee'] = $this->Attendance_model->searchEmpsal($dept_id, $comp_id);
            $result['shifts'] = $this->Attendance_model->getShift();
            if (!empty($result['employee'])) {
                $this->load->view('attendance/shift/search_employee_for_shift', $result);
            } else {
                $this->session->set_userdata('error_msg', "Record not Found");
                redirect('hris/search_salary');
            }
        } else {
            $result['employee'] = $this->Attendance_model->searchEmpAttendance($dept_id, $comp_id);

            $this->load->view('attendance/employee_search', $result);
        }
    }

    public function shift_assign() {

        $data['emp_id'] = array();
        $emp_ids = $_POST['emp_id'];

        $shift_id = $_POST['shift'];
        foreach ($emp_ids as $value) {

            $return = $this->Attendance_model->EmployeeShift($value, array('shift_id' => $shift_id));
            if ($return == 0) {
                $this->session->set_userdata('error_msg', "Error While updating..");
                redirect('attendance/emp_shift');
            }
        }
        $this->session->set_userdata('success_msg', "Successfully Assigned shift");
        redirect('attendance/emp_shift');
    }

    public function company_summery_form() {
        $result['company'] = $this->Hris_model->getCampany();
        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('attendance/reports/company_form', $result);
        $this->load->view('hris_ace/hris_footer');
    }

    public function department_form() {
        //$result['employee'] = $this->Attendance_model->searchEmpsal($dept_id, $comp_id);
        $result['company'] = $this->Hris_model->getCampany();
        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('attendance/reports/department_form', $result);
        $this->load->view('hris_ace/hris_footer');
    }

    public function employee_form() {
        //$result['employee'] = $this->Attendance_model->searchEmpsal($dept_id, $comp_id);
        $result['company'] = $this->Hris_model->getCampany();
        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('attendance/reports/employee_form', $result);
        $this->load->view('hris_ace/hris_footer');
    }

    public function get_att_company() {

        $company_id = $_POST['company'];
        $department_id = $_POST['department'];
        $employee_id = $_POST['employee'];
//        $start_date = '2015-05-01';
//        $end_date = '2015-05-30';

        $start_date = $_POST['att_date'];
        $end_date = $_POST['end_date'];
        //  $company_id = 28;
        // $employee_id = 71;
        $summery_report = $this->Hris_model->getSummeryReport($company_id, $department_id, $employee_id, $start_date, $end_date);

        $i = 0;


        foreach ($summery_report as $value) {

            $off_days = explode('-', $value['off_days']);

            $total_days = 0;
            $total_off = 0;
            $datediff = strtotime($end_date) - strtotime($start_date);


            $total_days = floor($datediff / (60 * 60 * 24));
            $start_date . '   ' . $end_date;

            foreach ($off_days as $offd) {
                $total_off = $total_off + $this->numWeekdays($start_date, $end_date, $offd);
            }

            $summery_report[$i]['working_days'] = $total_days - $total_off;
            $summery_report[$i]['total_working_hours'] = $summery_report[$i]['working_days'] * $value['working_hours'];
            $summery_report[$i]['actual_days'] = $value['actual_days'];
            $summery_report[$i]['WH'] = round($value['WH'] / 60, 1);

            $leaves = $this->Hris_model->getTotalLeaves($value['emp_id'], $start_date, $end_date);

            $summery_report[$i]['leave_days'] = $leaves[0]['TotalLeaves'];
            $i++;
        }




        $result['summery_report'] = $summery_report;
        $result['start_date'] = $start_date;
        $result['end_date'] = $end_date;

        $this->load->view('hris_ace/hris_header');
        $this->load->view('attendance/reports/company_attendance_report', $result);
        $this->load->view('hris_ace/hris_footer');
    }

    function numWeekdays($start_ts, $end_ts, $day, $include_start_end = false) {

        $start_ts = strtotime($start_ts);
        $end_ts = strtotime($end_ts);
        $day = strtolower($day);
        $current_ts = $start_ts;
        // loop next $day until timestamp past $end_ts
        while ($current_ts < $end_ts) {

            if (( $current_ts = strtotime('next ' . $day, $current_ts) ) < $end_ts) {
                $days++;
            }
        }

        // include start/end days
        if ($include_start_end) {
            if (strtolower(date('l', $start_ts)) == $day) {
                $days++;
            }
            if (strtolower(date('l', $end_ts)) == $day) {
                $days++;
            }
        }
        return (int) $days;
    }

    public function emp_detail_form() {
        $result['company'] = $this->Hris_model->getCampany();
        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('attendance/reports/employee_detail_form', $result);
        $this->load->view('hris_ace/hris_footer');
    }

    public function dep_detail_form() {
        $result['company'] = $this->Hris_model->getCampany();
        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('attendance/reports/department_detail_form', $result);
        $this->load->view('hris_ace/hris_footer');
    }

    public function get_detail_report() {
        $department_id = $_POST['department'];
        $employee_id = $_POST['employee'];


//        $start_date = '2015-05-01';
//        $end_date = '2015-05-30';
        $start_date = $_POST['att_date'];
        $end_date = $_POST['end_date'];
        // $department_id = 44;

        $summery_report = $this->Hris_model->getDetailReport($department_id, $employee_id, $start_date, $end_date);

        $result['summery_report'] = $summery_report;
        $result['start_date'] = $start_date;
        $result['end_date'] = $end_date;

        $this->load->view('hris_ace/hris_header');
        //$this->load->view('hris_ace/hris_side_menu');
        $this->load->view('attendance/reports/department_detail_attendance_report', $result);
        $this->load->view('hris_ace/hris_footer');
    }

    function emp_absent_mark() {
        $comp_id = $this->session->userdata('company_id');
        $result['company'] = $this->Hris_model->getCampany();
        $result['leaves'] = $this->Hris_model->getLeavesTypes($comp_id);
        // print_r($result); die;
        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('attendance/employee_form', $result);
        $this->load->view('hris_ace/hris_footer');
    }

    function createDateRange($startDate, $endDate, $format = "Y-m-d") {

        //echo $startDate." ".$endDate;
        date_default_timezone_set('Asia/Karachi');
        $begin = new DateTime($startDate);
        $end = new DateTime($endDate);

        //echo 'asda'; die;
        $interval = new DateInterval('P1D'); // 1 Day
        $dateRange = new DatePeriod($begin, $interval, $end);

        $range = array();
        foreach ($dateRange as $date) {
            $range[] = $date->format($format);
        }

//        print_r($range);
//        die;
        return $range;
    }

    private function isRegularDay($day, $shift) {
        $timestamp = strtotime($day);
        $day_name = date('D', $timestamp);


        $off_days = explode('-', $shift['off_days']);


        if (in_array(strtolower($day_name), $off_days)) {

            return false;
        } else {

            return true;
        }
    }

    function search_employee_by_code() {
        $code = $this->input->post('code');
        $company = $this->session->userdata('company_id'); 
        
        $result['employee'] = $this->Attendance_model->Employeebycode($code, $company);

        $this->load->view('attendance/pertical_emp_by_code', $result);
    }

    function save_emp_absent() {
        
        $department_id = $_POST['department'];
        $company = $_POST['company'];
     $employee_id = $_POST['employee']; 
        $leave_type = $_POST['leave_type'];


        $start_date = $_POST['att_date'];
        $end_date = $_POST['end_date'];

        $emp_shift = $this->Hris_model->getEmployeeShift($employee_id);

        


        $ins_data = array();
        $batch_data = array();
        if (!empty($start_date) && !empty($end_date)) {
            $period = $this->createDateRange($start_date, $end_date);
            $period[] = $end_date;

            foreach ($period as $value) {

                $leave_id = 0;

                if ($this->isRegularDay($value, $emp_shift[0])) {

                    $emp_leave_exist = $this->Attendance_model->getEmployeeAbsentRecord($employee_id, $value);

                    
                    
                    if ($emp_leave_exist) { 
                        //$ins_data['emp_leave_id'] = $emp_leave_exist[0]['emp_leave_id'];
                        $ins_data['leave_type'] = $leave_type;
                        $ins_data['leave_flag'] = 0;
                        $this->Hris_model->updateLeaves($emp_leave_exist[0]['emp_leave_id'], $ins_data);
                        
                        $ins_data = array();
                        $leave_id = $emp_leave_exist[0]['emp_leave_id'];
                    }

                    $emp_att = $this->Attendance_model->getEmployeeAttendanceRecord($employee_id, $value);

                    if ($emp_att) {
                        $ins_data['emp_id'] = $employee_id;
                        $ins_data['date'] = $value;
                        $ins_data['leave_type'] = $leave_type;
                        $ins_data['leave_flag'] = 0;
                        if ($leave_id == 0) {
                            $leave_id = $this->Hris_model->setAbsentEmployee($ins_data);
                        }

                        $ins_data = array();

                        $ins_data['emp_id'] = $employee_id;
                        $ins_data['datetime'] = $value;
                        $ins_data['remarks'] = 'Leave';

                        $ins_data['checkIn'] = '';
                        $ins_data['checkOut'] = '';
                     //   $ins_data['campus_id'] = $company;
                      //  $ins_data['department_id'] = $department_id;
                        $ins_data['scheduled'] = 1;
                        $ins_data['work_hour'] = 0;
                        $ins_data['shift_id'] = $emp_att[0]['shift_id'];
                        $ins_data['type'] = 'Manual';
                        $ins_data['emp_leave_id'] = $leave_id;

                        $this->Attendance_model->updateAttendance($emp_att[0]['id'], $ins_data);
                        $ins_data = array();
                    } else {
                        $ins_data['emp_id'] = $employee_id;
                        $ins_data['date'] = $value;
                        $ins_data['leave_type'] = $leave_type;
                        $ins_data['leave_flag'] = 0;
                        $leave_id = $this->Hris_model->setAbsentEmployee($ins_data);
                    }
                }
            }
        } else {




            $emp_leave_exist = $this->Attendance_model->getEmployeeAbsentRecord($employee_id, $start_date);

            if ($emp_leave_exist) {
                //$ins_data['emp_leave_id'] = $emp_leave_exist[0]['emp_leave_id'];
                $ins_data['leave_type'] = $leave_type;
                $ins_data['leave_flag'] = 0;
                $this->Hris_model->updateLeaves($emp_leave_exist[0]['emp_leave_id'], $ins_data);
                $ins_data = array();
                $leave_id = $emp_leave_exist[0]['emp_leave_id'];
            }
            $emp_att = $this->Attendance_model->getEmployeeAttendanceRecord($employee_id, $start_date);

            if ($emp_att) {


                if ($leave_id == 0) {
                    $ins_data['emp_id'] = $employee_id;
                    $ins_data['date'] = $start_date;
                    $ins_data['leave_type'] = $leave_type;
                    $ins_data['leave_flag'] = 0;
                    $leave_id = $this->Hris_model->setAbsentEmployee($ins_data);
                }



                $ins_data = array();


                $ins_data['emp_id'] = $employee_id;
                $ins_data['datetime'] = $start_date;
                $ins_data['remarks'] = 'Leave';

                $ins_data['checkIn'] = '';
                $ins_data['checkOut'] = '';
               // $ins_data['campus_id'] = $company;
               // $ins_data['department_id'] = $department_id;
                $ins_data['scheduled'] = 1;
                $ins_data['work_hour'] = 0;
                $ins_data['shift_id'] = $emp_att[0]['shift_id'];
                $ins_data['type'] = 'Manual';
                $ins_data['emp_leave_id'] = $leave_id;




                $this->Attendance_model->updateAttendance($emp_att[0]['id'], $ins_data);
                $ins_data = array();
            } else {
                $ins_data['emp_id'] = $employee_id;
                $ins_data['date'] = $start_date;
                $ins_data['leave_type'] = $leave_type;
                $ins_data['leave_flag'] = 0;
                $leave_id = $this->Hris_model->setAbsentEmployee($ins_data);
            }
        }


//        if (!empty($batch_data)) {
//
//
//            foreach ($batch_data as $bv) {
//
//                $is_exist = $this->Attendance_model->getEmployeeAbsentRecord($bv['emp_id'], $bv['date']);
//                if (!empty($is_exist)) {
//                    $this->Attendance_model->deleteAbsent($bv['emp_id'], $bv['date']);
//                }
//            }
//            $this->Hris_model->setAbsentEmployee($batch_data);
//        }

        $this->session->set_userdata('success_msg', "Successfully Marked Leaves");
        redirect('attendance/emp_absent_mark');
    }

    function emp_attendance_mark() {
        $result['company'] = $this->Hris_model->getCampany();

        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('attendance/employee_att_form', $result);
        $this->load->view('hris_ace/hris_footer');
    }

    function save_emp_attendance() {
        
    }

    function check_emp_att_status() {
        $emp_id = $_POST['emp_id'];
        $att_date = $_POST['att_date'];
        $flag = 0;

        $is_abs = $this->Attendance_model->getEmployeeAbsentRecord($emp_id, $att_date);
        if ($is_abs) {
            $flag = 1;
            echo 'Absent';
        } else {
            $att_emp = $this->Attendance_model->getEmployeeAttendanceRecord($emp_id, $att_date);
            if ($att_emp) {

                $flag = 1;
                $result['emp_status'] = $att_emp;
                $this->load->view('attendance/emp_status', $result);
            }
        }
        if ($flag == 0) {
            echo 'No Record is Found';
        }
    }

     function yearly_balance_report(){
        
        $department = $_POST['department'];
        $year = $_POST['year'];
        $company = $this->session->userdata('company_id');
        //$department = 96;
        
        if($department){
            $emp_yearly_report = $this->Attendance_model->EmployeeYearlyReport($department, '',$year,$company);
        }else{
            
            
            $emp_code = $_POST['code'];
            $emp_yearly_report = $this->Attendance_model->EmployeeYearlyReport('', $emp_code,$year,$company);
          
            
        }
        $company = 35;
           $result['leave_types'] = $this->Hris_model->getLeavesTypes($company);
         
//           echo '<pre>';
//           var_dump($result); die;
            
            $leave_report = array();
            $prev_emp_id = 0;
            foreach ($emp_yearly_report as $value) {
                if($prev_emp_id!=$value['emp_id']){
                    $prev_emp_id = $value['emp_id'];
                    $leave_report[$prev_emp_id]['code'] = $value['emp_code'];
                    $leave_report[$prev_emp_id]['employee_name'] = $value['employee_name'];
                }
                $leave_report[$prev_emp_id][$value['leavetype']] = $value['totalLeaves'];
            }

            $result['leave_report'] = $leave_report ; 
           
        $this->load->view('hris_ace/hris_header');
        $this->load->view('attendance/reports/yearly_wise_report', $result);
        $this->load->view('hris_ace/hris_footer');
        
    }
     function leave_balance_form() {
        $result['company'] = $this->Hris_model->getCampany();

        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('attendance/reports/leave_balance_form', $result);
        $this->load->view('hris_ace/hris_footer');
    }
     function leave_emp_form(){
        
        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('attendance/reports/date_wise_form');
        $this->load->view('hris_ace/hris_footer');
        
    }
    
    function emp_leave_date_wise(){
        $s_date = $_POST['start_date'];
        $e_date = $_POST['end_date'];
        $company_id = $this->session->userdata('company_id');
        $result['from'] = $s_date;
        $result['to'] = $e_date;
             
        $result['emp_leaves'] = $this->Attendance_model->getEmployeeLeaves($s_date, $e_date,$company_id);
        
        $this->load->view('hris_ace/hris_header');
        $this->load->view('attendance/reports/date_wise_report',$result);
        $this->load->view('hris_ace/hris_footer');
       
        
    }
    
}
