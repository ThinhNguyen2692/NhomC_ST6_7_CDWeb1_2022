<x-layou-admin>
    <?php
       foreach ($Feedback as $item) { ?>
    <div class="container">
        <div class="pb-5"></div>
        <div class="title font-weight-bold h1 text-center pt-5">
            Trả Lời phản Hồi
        </div>
        <div class="sender-information">
            <div class="sender sender-name font-weight-bold"><?php echo htmlentities($item->customer_name)?></div>
            <div class="sender sender-mail">
                <\<?php echo htmlentities($item->customer_email)?>/>
            </div>
            <div class="sender sender-time"><?php echo htmlentities($item->response_time)?></div>
            <div class="sender-content"><?php echo htmlentities($item->feedback_content)?></div>
        </div>

        <div class="reply pt-5">
            <div class="reply-information-sender">
                <div class="reply-tile font-weight-bold">Trả lời:</div>
                <span class="reply-name ml-5"><?php if($item->fullname != null) echo htmlentities($item->fullname) ?></span>
                <span class="reply-time"><?php if($item->feedback_time != null) echo htmlentities($item->feedback_time) ?></span> <br>
            </div>
            @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <form action="/traloiphanhoi" method="post" class="form-reply">
                @csrf
                <input type="hidden" name="feedback_id" value="<?php echo htmlentities($item->id)?>">
                <div class="reply-tile font-weight-bold">Đến:</div>
                <span class="reply-name ml-3"><?php echo htmlentities($item->customer_name)?></span>
                <span class="reply-mail">(<?php echo htmlentities($item->customer_email)?>)</span>
                <div class="form-group">
                    <textarea class="form-control" id="recipient-name" name="feedback_content" placeholder="Nội dung:"><?php if($item->	reply != null) echo htmlentities($item->reply) ?></textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                    <span><i class="fas fa-address-book" style="margin-left: 3%; cursor: pointer;"></i></span>
                    <span><a href="/DeleteFeedback?id=<?php echo htmlentities($item->id)?>"><img src="{{ asset('/images/delete.png') }}" alt="" srcset="" style=" margin-left: 950px; width: 20px; height: 20px;"></a></span>
                </div>
            </form>

        </div>

    </div>
    <?php
       }
    ?>
</x-layou-admin>