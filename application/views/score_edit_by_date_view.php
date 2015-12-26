<!--
/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 11/23/2015
 * Time: 1:53 PM
 */
 -->

<div class="page-header">
    <h1>Score - <small>Edit Scores for <?php echo $date ?></small></h1>
</div>

<?php echo validation_errors(); ?>

<?php echo form_open('score/submitEditScore') ?>
<div class="form-group">
    <!--<div class="container">-->
        <div class="row">
            <div class="col-md-2">
                <div class="col-md-2 fixed">
                    <br><br><br>
                    <input type="hidden" name="date" value="<?php echo $date ?>">
                    <input type="submit" class="btn btn-default col-md-12" value="Submit Changes" name="submit">
                    <br><br>
                    <a class="btn btn-default col-md-12" href="<?php echo base_url("index.php/score/chooseEditDate"); ?>">Back</a>
                </div>
            </div>

             <div class="col-md-10 relative">
                 <div class="panel panel-default">
                     <!-- Default panel contents -->
                     <div class="panel-heading">Existing Scores for <?php echo $date ?></div>

                     <div class="table-responsive">
                         <table class ="table table-condensed table-bordered" style="border-collapse:collapse;">
                             <thead>
                             <tr>
                                 <th class="col-md-2">Player</th>
                                 <th class="col-md-1">Date</th>
                                 <th class="col-md-2">Course</th>
                                 <th class="col-md-2">New Course</th>
                                 <th class="col-md-1">Score</th>
                                 <th class="col-md-1">New Score</th>
                                 <th class="col-md-1">Time</th>
                                 <th class="col-md-1">Delete?</th>
                             </tr>
                         </table>
                     </div>

                     <?php
                         foreach($getFullScoreInfoByDate as $row) {
                             echo'<div class="table-responsive">';
                                 echo '<table class ="table table-condensed table-bordered">';
                                     echo '<thead>';
                                     echo '</thead>';
                                     echo '<tbody>';
                                         echo '<tr>';
                                             echo '<td class="col-md-2">' . $row->playerName . '</td>';
                                             echo '<td class="col-md-1">' . $row->scoreDate . '</td>';
                                             echo '<td class="col-md-2">' . $row->courseName . '</td>';
                                             echo '<td class="col-md-2">';
                                                echo 'Yes <input type="checkbox" id="' . $row->playerID . '-course_change" name="' . $row->playerID . '-course_change" value="yes"/>';
                                                echo ' <select class="form-control" id="pick-course-' . $row->scoreID . '" name="course-' . $row->scoreID . '">';
                                                    foreach($getCoursesQuery as $r) {
                                                         echo '<option value="' . $r->courseID . '">' . $r->courseName . '</option>';
                                                    }
                                                echo '</select></td>';
                                             echo '<td class="col-md-1">' . $row->scoreScore . '</td>';
                                             echo '<td class="col-md-1">';
                                                echo '<input type="text" class="col-md-12" name="' . $row->playerID . '-new-score"  id="' . $row->playerID . '-new-score" ' . $row->playerID . 'score">';
                                             echo '</td>';
                                             if ($row->scoreTime == 0) {
                                                 echo '<td class="col-md-1">AM</td>';
                                             }
                                             else {
                                                 echo '<td class="col-md-1">PM</td>';
                                             }
                                             echo '<td class="col-md-1">';
                                                echo 'Delete? <input type="checkbox" class="delete_box" id="' . $row->scoreID . '-delete" name="' . $row->scoreID . '-delete"  value="delete"/>';
                                                //change the delete buttons to a delete check box and maybe highlight something red if checked just to be sure
                                             echo '</td>';
                                         echo '</tr>';
                                     echo '</tbody>';
                                 echo '</table>';
                             echo '</div>';
                         }
                     ?>
                 </div>
             </div>
         </div>
        </div>
    <!--</div>-->
</div>
</form>
