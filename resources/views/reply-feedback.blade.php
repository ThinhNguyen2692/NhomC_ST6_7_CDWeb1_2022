<x-layou-admin>
    <div class="container">
        <div class="pb-5"></div>
        <div class="title font-weight-bold h1 text-center pt-5">
            Trả Lời phản Hồi
        </div>
        <style>
            .sender,
            .reply-tile {
                display: inline-block;
            }

            .sender-time {
                margin-left: 87%;
            }

            .sender-content {
                border: 1px #ced4da solid;
                border-radius: 10px;
                padding: 20px;
            }
        </style>
        <div class="sender-information">
            <div class="sender sender-name font-weight-bold">Nguyễn Văn A</div>
            <div class="sender sender-mail">
                <\nguyenvana@gmail.com />
            </div>
            <div class="sender sender-time">10h22(10/07/2022)</div>

            <div class="sender-content">Lorem ipsum dolor sit amet consectetur, adipisicing elit. In voluptas commodi repudiandae quidem exercitationem ex mollitia odit corporis cupiditate omnis nihil sint, id sed, nam doloremque assumenda voluptatum nisi rerum?</div>

        </div>

        <div class="reply pt-5">
            <div class="reply-information-sender">
                <div class="reply-tile font-weight-bold">Trả lời:</div>
                <span class="reply-name ml-5">Nhân Viên: Nguyễn Thi B</span>
                <span class="reply-time">đã trả lời vào ngày 10h25(10/07/2022)</span> <br>
            </div>

            <style>
                textarea#recipient-name{
                    border: none;
                }
                .form-reply{
                    border: #ced4da 1px solid;
                    padding: 10px;
                }
            </style>
            <form action="" class="form-reply">
            <div class="reply-tile font-weight-bold">Đến:</div>
                <span class="reply-name ml-3">Nguyễn Thi A</span>
                <span class="reply-mail">(nguyenvana@gmail.com)</span>
                <div class="form-group">
                    <textarea class="form-control" id="recipient-name" name="feedback_content" placeholder="Nội dung:"></textarea>
                </div>
                <div>
                    <div class="btn btn-primary">Gửi</div>
                    <span><i class="fas fa-address-book" style="margin-left: 3%; cursor: pointer;"></i></span>
                    <span><i class="fas fa-address-book" style="margin-left: 88%; cursor: pointer;"></i></span>
                </div>
            </form>

        </div>

    </div>
</x-layou-admin>