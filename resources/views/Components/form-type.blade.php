<label for="ca3rs">Vị trí công việc: </label> <br>
                        <select name="feedback_type_id">
                              <?php 
                    foreach($TypeFeedbacks as $item){?>
                        <option value="<?php echo htmlentities($item->feedback_type_id)?>"><?php echo htmlentities($item->feedback_type_name)?></option>
                        <?php
                    }
                  ?>
                        </select>