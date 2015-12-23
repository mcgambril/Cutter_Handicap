<!--
/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 7/28/2015
 * Time: 9:28 PM
 */
 -->

<div class="container">
    <div class="page-header">
        <?php foreach($getPlayerByIDQuery as $row) {
            echo '<h1>' . $row->playerName . ' - <small>Delete Player</small></h1>';
        }?>
    </div>

    <?php foreach($getPlayerByIDQuery as $row) {
        echo '<div class="panel panel-default">';
            echo '<!-- Default panel contents -->';
            echo '<div class="panel-heading">' . $row->playerName . '&#39s Current Information</div>';
            echo'<div class="table-responsive">';
                echo '<table class ="table table-condensed table-bordered" style="border-collapse:collapse;">';
                    echo '<thead>';
                        echo '<tr>';
                            echo '<th class="col-md-2">Name</th>';
                            echo '<th class="col-md-1">Handicap</th>';
                            echo '<th class="col-md-1">Handicap Index</th>';
                        echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                        echo '<tr>';
                            echo '<td class="col-md-2">' . $row->playerName . '</td>';
                            echo '<td class="col-md-1">' . $row->playerHandicap . '</td>';
                            echo '<td class="col-md-1">' . $row->playerHandicapIndex . '</td>';
                        echo '</tr>';
                    echo '</tbody>';
                echo '</table>';
            echo '</div>';
        echo '</div>';
    }?>

</div>

<?php echo validation_errors(); ?>

<?php echo form_open('player/submitDelete') ?>
<div class="form-group">
    <div class="container">
        <div class="row">
            <div class="text-center">
                <h3>Are you sure you want to Delete this player from the database?</h3>
                <?php echo '<input type = "hidden" name = "playerID" value = "' . $row->playerID . '" />'; ?>
                <input type="submit" class="btn btn-default" value="Yes. Delete Player" name="submitName">
                <a class="btn btn-default" href="<?php echo base_url("index.php/player/index"); ?>">Back</a>
            </div>
        </div>
    </div>
</div>
</form>