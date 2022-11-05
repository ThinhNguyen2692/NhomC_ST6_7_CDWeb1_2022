<?php
    $month = date('m');
    $day = date('d');
    $year = date('Y');
    
    $today = $year . '-' . $month . '-' . $day;

?>
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                <h3 class="form-title">Phản hồi</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                 </div>
                <div class="modal-body">
                <form action="/guiphanhoiquanan" method="post">
                @csrf
                <div class="form-group">
                 <label for="recipient-name" class="col-form-label">Email:</label>
                 <input type="email" class="form-control" id="recipient-name" name="customer_email">
                </div>

                <div class="form-group">
                 <label for="recipient-name" class="col-form-label">Tên khách hàng:</label>
                 <input type="text" class="form-control" id="recipient-name" name="customer_name">
                </div>

                <div class="form-group">
                 <label for="recipient-name" class="col-form-label">Loại phản hồi</label>
                  <select class="form-control" id="recipient-name" name="feedback_type_id">   
                  <?php 
                    foreach($TypeFeedbacks as $item){?>
                        <option value="{{$item->feedback_type_id}}">{{$item->feedback_type_name}}</option>
                        <?php
                    }
                  ?>
                 </select>
                </div>

                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Phản hồi:</label>
                    <textarea class="form-control" id="recipient-name" name="feedback_content"></textarea>
                </div>
               
                 <div class="form-group">
                    <div class="captcha">
                     <label for="recipient-name" class="col-form-label">Mã phản hồi:</label>
                     <span>{!! captcha_img('math') !!}</span>
                     <button type="button" class="btn btn-danger" class="reload" id="reload">
                        &#x21bb;
                     </button>
                    </div>
                    <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                </div>
                <input type="date" hidden="true" value="<?php echo $today; ?>" class="form-control" id="date" name="date">
                <button type="button" class="btn btn-secondary modal-btnClose" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
                </div>
             </div>
        </div>
    </div>